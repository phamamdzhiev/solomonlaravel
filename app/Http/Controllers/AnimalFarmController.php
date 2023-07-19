<?php

namespace App\Http\Controllers;

use App\Models\AnimalFarm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AnimalFarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $animalFarms = AnimalFarm::all()->sortByDesc('id');
        return View::make('admin.animal-farms.index', compact('animalFarms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return View::make('admin.animal-farms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'owner' => 'required',
            'farm_number' => 'required',
            'region' => 'required',
            'city' => 'required',
            'vet' => 'required',
        ]);

        AnimalFarm::create($request->all());
        return redirect()->route('animal-farms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(AnimalFarm $animalFarm)
    {
        return view('admin.animal-farms.edit', compact('animalFarm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, AnimalFarm $animalFarm)
    {
        $request->validate([
            'owner' => 'required',
            'farm_number' => 'required',
            'region' => 'required',
            'city' => 'required',
            'vet' => 'required',
        ]);

        $animalFarm->update($request->all());
        return redirect()->route('animal-farms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(AnimalFarm $animalFarm)
    {
        $animalFarm->delete();
        return redirect()->route('animal-farms.index');
    }
}
