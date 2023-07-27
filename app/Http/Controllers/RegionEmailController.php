<?php

namespace App\Http\Controllers;

use App\Models\RegionEmail;
use Illuminate\Http\Request;

class RegionEmailController extends Controller
{
    public function index()
    {
        $regionEmails = RegionEmail::with('region')->get();

        return view('admin.region-emails.index', compact('regionEmails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.region-emails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'region_id' => 'required|exists:regions,id'
        ]);

        RegionEmail::create($request->all());
        return redirect()->route('region-email.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RegionEmail $regionEmail)
    {
        return view('admin.region-emails.edit', compact('regionEmail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegionEmail $regionEmail)
    {
        $request->validate([
            'email' => 'required|email',
            'region_id' => 'required|exists:regions,id'
        ]);

        $regionEmail->update($request->all());
        return redirect()->route('region-email.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegionEmail $regionEmail)
    {
        $regionEmail->delete();
        return redirect()->route('region-email.index');
    }
}
