<?php

namespace App\Http\Controllers;

use App\Mail\FormOrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormOrderController extends Controller
{
    public function index()
    {
        return view('formorder.formorder');
    }

    /**
     * @throws \Exception
     */
    public function create(Request $request
    ): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application {
        try {
            if (app()->environment('production')) {
                foreach ([env('MAIL_FROM_ADDRESS'), $request->input('email')] as $mail) {
                    Mail::to($mail)->send(new FormOrderMail($request->all())); // TODO: request all to be changed
                }
            } else {
                Mail::to(env('TEST_FROM_ADDRESS'))->send(
                    new FormOrderMail($request->all())
                );
            }

            return view('formorder.formorder-generated')->with(
                'data',
                $request->all()
            ); // TODO: request all to be changed
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
