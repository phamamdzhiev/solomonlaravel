<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(): Factory|View|Application
    {
        $products = Product::all();
        return view('admin.admin', compact('products'));
    }

    public function editProduct($id): Factory|View|Application
    {
        $product = Product::find($id);
        return view('admin.edit', compact('product'));
    }

    /**
     * @throws \Exception
     */
    public function editProductSave(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'price' => 'numeric'
        ]);

        try {
            Product::where('id', $id)->update([
                'name' => $request->input('name'),
                'desc' => $request->input('desc'),
                'price' => $request->input('price'),
                'position' => $request->input('position'),
                'features' => $request->input('features') === 'on' ? 1 : 0,
            ]);
            return redirect()->route('app_admin');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @throws \Exception
     */
    public function storeProduct(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'price' => 'numeric',
            'file' => 'required|mimes:jpg,png,jpeg',
            'position' => 'numeric'
        ]);

        if (!$request->hasFile('file')) {
            throw new \Exception('Missing product image');
        }
        $image = $request->file('file');

        try {
            $image->storeAs('/public/products', $image->getClientOriginalName());

            Product::create([
                'name' => $request->input('name'),
                'price' => $request->input('price') ?? 'Няма',
                'desc' => $request->input('desc') ?? 'Няма',
                'position' => $request->input('position') ?? 1,
                'features' => $request->input('features') === 'on' ? 1 : 0,
                'image_path' => $image->getClientOriginalName()
            ]);

            return redirect()->back()->with('message', 'Успешно добавихте продкукт!');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @throws \Exception
     */
    public function deleteProduct($id): RedirectResponse
    {
        try {
            DB::table('products')->where('id', '=', $id)->delete();

            return redirect()->back()->with('message', 'Успешно изтрихте продукт!');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
