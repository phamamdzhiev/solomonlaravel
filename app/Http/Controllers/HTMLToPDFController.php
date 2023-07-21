<?php

namespace App\Http\Controllers;

use App\Models\AnimalFarm;
use App\Models\LetterHead;
use App\Models\LetterHeadsRows;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Mail;

class HTMLToPDFController extends Controller
{
    private function sendLetterHeadToEmail(string $pdf, array|null $data): void
    {
        $emailArray = explode(',', $data['emails']);
        $emailArray = array_map('trim', $emailArray);
        $emailArray = array_filter($emailArray);

        if (app()->environment() !== 'production') {
            foreach ($emailArray as $email) {
                Mail::send(
                    'mailables.letterhead-mail',
                    [],
                    function (\Illuminate\Mail\Message $message) use ($pdf, $email, $data) {
                        $message->to($email)
                            ->from(config('mail.from.address'), 'Справка ОДБХ')
                            ->subject('Справка - Образец 18 - ' . $data['letterhead_number'])
                            ->attachData($pdf, sprintf('spravka_%s.pdf', $data['letterhead_number']));
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
            $this->sendLetterHeadToEmail($pdfContents, $data);
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

        $withEmail = $request->query('withEmail') == '1';
        $result['letterhead_number'] = '0000';

        try {
            if ($withEmail) {
                $letterHead = new LetterHead();
                $letterHead->save();

                $result['letterhead_number'] = $letterHead->id;

                foreach ($result['farm_ids'] as $key => $id) {
                    $letterHeadRow = new LetterHeadsRows();
                    $letterHeadRow->num_from = $result['num_from'][$key];
                    $letterHeadRow->num_to = $result['num_to'][$key];
                    $letterHeadRow->quantity = $result['quantity'][$key];
                    $letterHeadRow->date = $result['date'][$key];
                    $letterHeadRow->farm_id = $id;
                    $letterHeadRow->letter_head_id = $letterHead->id;
                    $letterHeadRow->save();
                }
            }

            $this->generatePdf($result, $withEmail);
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
