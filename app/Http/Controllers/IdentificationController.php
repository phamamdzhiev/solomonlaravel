<?php

namespace App\Http\Controllers;

use App\Models\AnimalFarm;
use App\Models\Identification;
use App\Models\LetterHead;
use App\Models\LetterHeadsRows;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IdentificationController extends Controller
{
    public function index(Request $request)
    {
        $edit = $request->boolean('edit');
        $identificatorID = $request->query('identificatorID');

        $identificator = $edit && $identificatorID
            ? Identification::findOrFail($identificatorID)
            : null;

        $query = Identification::query();

        // Filtering by fields if provided in query params
        $fillableFields = ['name', 'model'];

        foreach ($fillableFields as $field) {
            if ($request->filled($field)) {
                $query->where($field, 'LIKE', '%' . $request->input($field) . '%');
            }
        }

        $identifications = $query
            ->latest()
            ->paginate(50)
            ->appends($request->all());

        return view('admin.identifications.index', [
            'identificator' => $identificator,
            'identifications' => $identifications,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
        ], [
            'name.required' => 'Идентификаторът е задължителен',
            'name.max' => 'Идентификаторът трябва да е до :max символа',
            'model.required' => 'Моделът е задължителен',
            'model.max' => 'Моделът трябва да е до :max символа',
        ]);

        DB::transaction(function () use ($data) {
            \App\Models\Identification::create($data);
        });

        return back()->with('success', '<UNK>');
    }

    public function update(Identification $identification, Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
        ], [
            'name.required' => 'Идентификаторът е задължителен',
            'name.max' => 'Идентификаторът трябва да е до :max символа',
            'model.required' => 'Моделът е задължителен',
            'model.max' => 'Моделът трябва да е до :max символа',
        ]);

        $identification->update($data);

        return to_route('identification.index')->with('success', '<UNK>');
    }

    public function destroy(Identification $identification)
    {

        $identification->delete();

        return back()->with('success', '<UNK>');
    }

    public function babh(Request $request)
    {
        $request->validate([
            'identificator_ids' => 'required|exists:identifications,id',
            'identificator_id_quantity' => 'required'
        ], [
            'identificator_ids.required' => 'Моля изберете поне един идентификатор!',
            'identificator_ids.exists' => 'Невалиден идентификатор!'
        ]);

        $itemIds = $request->input('identificator_ids');

        $selectedAnimalFarms = Identification::whereIn('id', $itemIds)->get();

        if ($selectedAnimalFarms->count() === 0) {
            abort(404);
        }

        $identificator_id_quantity = $request->input('identificator_id_quantity');

        $duplicatedAnimalFarms = collect();

        foreach ($selectedAnimalFarms as $aid) {
            $quantity = $identificator_id_quantity[$aid->id] ?? 1;

            for ($i = 0; $i < $quantity; $i++) {
                $duplicatedAnimalFarms->push($aid);
            }
        }

        return view('admin.identifications.create-babh', [
            'selectedAnimalFarms' => $duplicatedAnimalFarms
        ]);
    }


    public function generateBabhPDF(Request $request)
    {
        $data = $request->all();

//        $data = $request->validate([
//            'identificator_ids' => 'required|exists:identifications,id',
//            'name' => 'required|string|max:255',
//            'model' => 'required|string|max:255',
//            'num_from' => 'required',
//            'num_to' => 'required',
//            'quantity' => 'required',
//            'date' => 'required',
//            'emails' => 'nullable'
//        ],
//            [
//                'identificator_ids.required' => 'Моля изберете поне един идентификатор!',
//                'identificator_ids.exists' => 'Невалиден идентификатор!'
//            ]);


        $withEmail = $request->query('withEmail') == '1';
        $data['letterhead_number'] = '0000';

        try {
            if ($withEmail) {
                $letterHead = new LetterHead();
                $letterHead->type = 'babh';
                $letterHead->save();

                $data['letterhead_number'] = $letterHead->babh_number ?? '0';

                foreach ($data['identificator_ids'] as $key => $id) {
                    $letterHeadRow = new LetterHeadsRows();
                    $letterHeadRow->num_from = $data['num_from'][$key];
                    $letterHeadRow->num_to = $data['num_to'][$key];
                    $letterHeadRow->quantity = $data['quantity'][$key];
                    $letterHeadRow->date = $data['date'][$key];
                    $letterHeadRow->letter_head_id = $letterHead->id;
                    $letterHeadRow->farm_id = null;
                    $letterHeadRow->save();
                }
            }

            app(HTMLToPDFController::class)->generatePdf($data, $withEmail, 'admin.letterhead.babh');

            return to_route('identification.index')->with('success', 'Генерирана справка БАБХ');
        } catch (\Throwable $e) {
            dd($e->getMessage());
            return to_route('identification.index')->with('error', $e->getMessage());
        }
    }
}
