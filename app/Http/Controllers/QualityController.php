<?php

namespace App\Http\Controllers;

use App\Models\Quality;
use Illuminate\Http\Request;

class QualityController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $qualities = Quality::all()->sortBy('position');
        return view('admin.quality.index', compact('qualities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.quality.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $quality = new Quality();

        $quality->title = $request->input('title');
        $quality->description = $request->input('description');
        $quality->position = $request->input('position', 1);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('/public/qualities', $image->getClientOriginalName());
            $quality->image = $image->getClientOriginalName();
        }

        $quality->save();

        return to_route('admin-quality.index')->with('status', 'Успешно дабавихте "качество"!');
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
    public function edit($id)
    {
        $quality = Quality::findOrFail($id);
        return view('admin.quality.edit', compact('quality'));
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
        $quality = Quality::findOrFail($id);

        $quality->title = $request->input('title');
        $quality->description = $request->input('description');
        $quality->position = $request->input('position', 1);

        if ($request->hasFile('image')) {
            //delete old
//            $imagePath = asset('storage/qualities/' . $quality->image);
//
//            if (file_exists($imagePath)) {
//                unlink($imagePath);
//            }

            $image = $request->file('image');
            $image->storeAs('/public/qualities', $image->getClientOriginalName());
            $quality->image = $image->getClientOriginalName();
        }

        $quality->save();

        return to_route('admin-quality.index')->with('status', 'Успешно редактирахте "качество"!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $quality = Quality::findOrFail($id);
        $quality->delete();
        return to_route('admin-quality.index')->with('status', 'Успешно изтрихте "качество"!');
    }
}
