<?php

namespace App\Http\Controllers;

use App\Models\AnimalFarm;
use App\Models\LetterHead;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Mail;

class HTMLToPDFController extends Controller
{
    private function generateLetterHeadNumber(): string
    {
        $lastFourDigitFromTime = time() % 10000;
        return rand(1, 9) . $lastFourDigitFromTime . rand(10, 99);
    }

    private function sendLetterHeadToEmail(string $pdf, string|null $emails): void
    {
        if (!$emails) {
            abort(400, 'Emails are empty');
        }

        $emailArray = explode(';', $emails);
        $emailArray = array_map('trim', $emailArray);
        $emailArray = array_filter($emailArray);

        if (app()->environment() === 'production') {
            foreach ($emailArray as $email) {
                Mail::send(
                    'mailables.letterhead-mail',
                    [],
                    function (\Illuminate\Mail\Message $message) use ($pdf, $email) {
                        $message->to($email)
                            ->from(config('mail.from.address'), 'Справка')
                            ->subject('Справка ОДБХ')
                            ->attachData($pdf, 'spravka.pdf');
                    }
                );
            }
        }
    }

    public function generatePdf(array $data = [], $withEmail = false)
    {
        if (empty($data)) {
            abort(400, 'Data is empty. PDF cannot be generated');
        }

        $options = new Options();
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf();
        $dompdf->setOptions($options);
        $dompdf->setPaper('A4');

        $html = view('admin.letterhead.letterhead', compact('data'))->render();

        $dompdf->loadHtml($html);

        $dompdf->render();

        if ($withEmail) {
            //set pdf to email(s)
            $pdfContents = $dompdf->output(['compress' => 0]);
            $this->sendLetterHeadToEmail($pdfContents, $data['emails']);
        }

        $dompdf->stream('filename.pdf', ['Attachment' => false]);
    }

    /**
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $result = $request->validate([
            'owner' => 'required',
            'farm_number' => 'required',
            'vet' => 'required',
            'region' => 'required',
            'city' => 'required',
            'num_from' => 'required',
            'num_to' => 'required',
            'quantity' => 'required',
            'date' => 'required',
            'farm_ids' => 'required|exists:animal_farms,id',
            'emails' => 'nullable'
        ], [
            'farm_ids.required' => 'Моля изберете поне един обект!',
            'farm_ids.exists' => 'Невалиден обект!'
        ]);

        // set letterhead number
        $result['letterhead_number'] = $this->generateLetterHeadNumber();

        try {
            foreach ($result['farm_ids'] as $key => $id) {
                $letterHead = new LetterHead();
                $letterHead->letterhead_number = $result['letterhead_number'];
                $letterHead->num_from = $result['num_from'][$key];
                $letterHead->num_to = $result['num_to'][$key];
                $letterHead->quantity = $result['quantity'][$key];
                $letterHead->date = $result['date'][$key];
                $letterHead->farm_id = $id;
                $letterHead->save();
            }
            $this->generatePdf($result, $request->query('withEmail') == '1');
        } catch (\Throwable $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function index(Request $request)
    {
        $request->validate([
            'farm_ids' => 'required|exists:animal_farms,id',
        ], [
            'farm_ids.required' => 'Моля изберете поне един обект!',
            'farm_ids.exists' => 'Невалиден обект!'
        ]);

        $itemIds = $request->input('farm_ids');
        $selectedAnimalFarms = AnimalFarm::whereIn('id', $itemIds)->get();

        if ($selectedAnimalFarms->count() === 0) {
            abort(404);
        }

        return view('admin.letterhead.generate-letterhead', compact('selectedAnimalFarms'));
    }
}
