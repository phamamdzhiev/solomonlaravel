<?php

namespace App\Http\Controllers;

use App\Mail\NewOrder;
use App\Models\Messages;
use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function fetchProducts(int $condition): \Illuminate\Database\Query\Builder
    {
        return DB::table('products')
            ->where('features', '=', $condition)
            ->orderBy('position');
    }

    public function index(): Factory|View|Application
    {
        $featuredProducts = $this->fetchProducts(1)->get();
        $products = $this->fetchProducts(0)->get();

        return view('index.index', compact('featuredProducts', 'products'));
    }

    public function showProduct($id): Factory|View|Application
    {
        $product = Product::findOrFail($id);
        return view('product.product', compact('product'));
    }

    /**
     * @throws Exception
     */
    public function storeMessage(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        try {
            Messages::create([
                'name' => $request->input('name'),
                'mobile' => $request->input('mobile'),
                'email' => $request->input('email'),
                'message' => $request->input('message')
            ]);

            return redirect()->back()->with('status', 'Успешно изпратихте Вашето запитване');
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function storeOrder(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'quantity' => 'required|integer|min:1',
            'email' => 'email',
            'product_name' => 'required',
            'product_id' => 'required',
            'message' => 'required',
        ]);

        try {
            Order::create([
                'client_name' => $request->input('name'),
                'client_mobile' => $request->input('mobile'),
                'client_email' => $request->input('email'),
                'quantity' => $request->input('quantity'),
                'product_id' => $request->input('product_id'),
                'message' => $request->input('message'),
            ]);

            Mail::to(env('MAIL_FROM_ADDRESS'))
                ->send(new NewOrder($request->input('name'), $request->input('quantity'),$request->input('mobile'), $request->input('product_name'), $request->input('message')));

            return redirect()->back()->with('status', 'Успешно направена поръчка!');
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
