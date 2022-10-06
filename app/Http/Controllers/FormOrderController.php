<?php

namespace App\Http\Controllers;

use App\Models\FormOrder;
use Illuminate\Http\Request;

class FormOrderController extends Controller
{
    public function index()
    {
        return view('formorder.formorder');
    }

    /**
     * @throws \Exception
     */
    public function create(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        try {
            FormOrder::create([]);

            return view('formorder.formorder-generated');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
