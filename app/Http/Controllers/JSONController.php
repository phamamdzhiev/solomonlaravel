<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class JSONController extends Controller
{
    public function destroy($id)
    {
        $path = public_path('storage/data/marka_model.json');

        if (!File::exists($path)) {
            return back();
        }

        $items = json_decode(File::get($path), true) ?? [];

        // remove item
        $items = array_values(array_filter($items, function ($item) use ($id) {
            return $item['id'] != $id;
        }));

        File::put($path, json_encode($items, JSON_PRETTY_PRINT));

        return back()->with('success', 'ОК!');
    }

    public function store(Request $request)
    {
        $path = public_path('storage/data/marka_model.json');

        $data = File::exists($path)
            ? json_decode(File::get($path), true)
            : [];

        $data[] = [
            'id' => time(),
            'name' => $request->name,
            'price' => $request->price,
            'date' => now()->timestamp
        ];

        File::put($path, json_encode($data, JSON_PRETTY_PRINT));

        return back();
    }


    public function update(Request $request, $id)
    {
        $path = public_path('storage/data/marka_model.json');

        $data = json_decode(File::get($path), true);

        foreach ($data as &$row) {
            if ($row['id'] == $id) {
                $row['name'] = $request->name;
                $row['price'] = $request->price;
                $row['date'] = now()->timestamp;
            }
        }

        File::put($path, json_encode($data, JSON_PRETTY_PRINT));

        return back();
    }


    public function create()
    {
        $path = public_path('storage/data/marka_model.json');

        $items = [];

        if (File::exists($path)) {
            $items = json_decode(File::get($path), true) ?? [];
        }

        return view('admin.json.create', compact('items'));
    }
}
