<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $offices = Office::all()->sortByDesc('position');
        return view('admin.offices.index', compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.offices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $result = $request->validate([
            'map' => 'required',
            'description' => 'nullable',
            'position' => 'nullable|min:1',
            'image' => 'nullable',
        ]);

        try {
            $office = new Office();

            if ($request->hasFile('image')) {
                $fileWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($fileWithExt, PATHINFO_FILENAME);
                $ext = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $ext;
                $request->file('image')->storeAs('public/assets/office', $fileNameToStore);
                $office->image = $fileNameToStore;
            }

            $office->map = $request['map'];
            $office->description = $result['description'];
            $office->position = $result['position'] ?? 1;

            $office->save();

            return redirect()->route('office.index')->with('message', 'Успешно добавихте офис!');
        } catch (\Throwable $e) {
            dd($e->getMessage());
            return redirect()->route('office.index')->with('message', 'Има проблем опитайте отново!');
        }
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $office = Office::findOrFail($id);
        return view('admin.offices.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $result = $request->validate([
            'map' => 'required',
            'description' => 'nullable',
            'position' => 'nullable|min:1',
            'image' => 'nullable',
        ]);

        try {
            $office = Office::findOrFail($id);

            if ($request->hasFile('image')) {
                $fileWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($fileWithExt, PATHINFO_FILENAME);
                $ext = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $ext;
                $request->file('image')->storeAs('public/assets/office', $fileNameToStore);
                $office->image = $fileNameToStore;
            }

            $office->map = $request['map'];
            $office->description = $result['description'];
            $office->position = $result['position'] ?? 1;

            $office->save();

            return redirect()->route('office.index')->with('message', 'Успешно редактирахте офис!');
        } catch (\Throwable $e) {
            return redirect()->route('office.index')->with('message', 'Има проблем опитайте отново!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $office = Office::findOrFail($id);

            $imagePath = '/public/assets/office/' . $office->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $office->delete();

            return redirect()->route('office.index')->with(['message' => 'Успешно изтрит офис!']);
        } catch (\Exception $e) {
            return redirect()->route('office.index')->with(['error' => 'Има проблем, опитайте отново!'], 500);
        }
    }


    public function deleteImage($id)
    {
        try {
            $office = Office::findOrFail($id);
            $office->image = null;
            $office->save();

            $imagePath = '/public/assets/office/' . $office->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            return redirect()->back()->with(['message' => 'Успешно премахнахте снимка на офис!']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Има проблем, опитайте отново!'], 500);
        }
    }
}
