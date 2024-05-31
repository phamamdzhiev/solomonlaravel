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
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\IpUtils;

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
            'mobile' => 'required',
            'email' => 'required|email',
            'message' => 'required|max:500',
        ], [
            'name.required' => 'Името е задължително!',
            'mobile.required' => 'Телефонът е задължителен!',
            'email.required' => 'Имейлът е задължителен!',
            'email.email' => 'Имейлът не е валиден!',
            'message.max' => 'Съобщението не трябва да бъде по-дълго от :max символа!',
            'message.required' => 'Съобщението е задължително!'
        ]);

        try {
            $m = Messages::create([
                'name' => $request->input('name'),
                'mobile' => $request->input('mobile'),
                'email' => $request->input('email'),
                'message' => $request->input('message')
            ]);

            $message = sprintf(
                'Ново запитване от %s. Съобщение: %s. ДАННИ ЗА ОБРАТНА ВРЪЗКА: тел - %s, имейл - %s',
                $m->name,
                $m->message,
                $m->mobile,
                $m->email,
            );

            try {
                if (app()->environment('production')) {
                    Mail::raw($message, function ($email) use ($m) {
                        $email->to(env('MAIL_FROM_ADDRESS'))
                            ->from(env('MAIL_FROM_ADDRESS'), 'Ново запитване')
                            ->subject($m->name);
                    });
                } else {
                    Mail::raw($message, function ($email) use ($m) {
                        $email->to(env('TEST_FROM_ADDRESS'))
                            ->from(env('TEST_FROM_ADDRESS'), 'Ново запитване')
                            ->subject($m->name);
                    });
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('status', 'ПРОБЛЕМ ОПИТАЙТЕ ОТНОВО!');
            }


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

        $recaptcha_response = $request->input('g-recaptcha-response');

        if (is_null($recaptcha_response)) {
            return redirect()->back()->with('error', 'Please Complete the Recaptcha to proceed');
        }

        $url = "https://www.google.com/recaptcha/api/siteverify";

        $body = [
            'secret' => config('app.GOOGLE_SECRET_KEY'),
            'response' => $recaptcha_response,
            'remoteip' => IpUtils::anonymize($request->ip()) //anonymize the ip to be GDPR compliant. Otherwise just pass the default ip address
        ];

        $response = Http::asForm()->post($url, $body);

        $result = json_decode($response);

        if ($response->successful() && $result->success == true) {
            try {
                Order::create([
                    'client_name' => $request->input('name'),
                    'client_mobile' => $request->input('mobile'),
                    'client_email' => $request->input('email'),
                    'quantity' => $request->input('quantity'),
                    'product_id' => $request->input('product_id'),
                    'message' => $request->input('message'),
                ]);

                if (app()->environment('production')) {
                    foreach ([env('MAIL_FROM_ADDRESS'), $request->input('email')] as $mail) {
                        Mail::to($mail)->send(
                            new NewOrder(
                                $request->input('name'),
                                $request->input('quantity'),
                                $request->input('mobile'),
                                $request->input('product_name'),
                                $request->input('message'),
                                $request->input('email')
                            )
                        );
                    }
                } else {
                    Mail::to(env('TEST_FROM_ADDRESS'))->send(
                        new NewOrder(
                            $request->input('name'),
                            $request->input('quantity'),
                            $request->input('mobile'),
                            $request->input('product_name'),
                            $request->input('message'),
                            $request->input('email')
                        )
                    );
                }

                return redirect()->back()->with('status', 'Успешно направена поръчка!');
            } catch (\Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

        return redirect()->back()->with('error', 'Please Complete the Recaptcha to proceed');
    }
}
