<?php

namespace App\Http\Controllers;

use App\Mail\FormLazerMail;
use App\Models\Formlazer;
use App\Models\PageContent;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormLazerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $page = PageContent::findOrFail(PageController::GREEN_LINE);

        if (!$page->is_active) {
            return redirect('/');
        }

        return view('formlazer.formlazer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     * @throws \Exception
     */
    public function create(Request $request): View|Factory|Application
    {
        try {
            $formlazer = Formlazer::create([
                'odbh' => $request->input('odbh'),
                'obshtina' => 'N/a',
                'no' => $request->input('no'),
                'vet' => $request->input('vet'),
                'vet_tel' => $request->input('vet-tel'),
                'mail' => $request->input('mail'),
                'city' => $request->input('city'),
                'names' => $request->input('names'),
                'egn' => $request->input('egn'),
                'ekont' => $request->input('ekont'),
                'client_mobile' => $request->input('client_mobile'),
                'invoice' => $request->input('invoice') ?? 'N/a',
                'field1' => json_encode($request->input('field1')),
                'field2' => json_encode($request->input('field2')),
                'field3' => json_encode($request->input('field3')),
            ]);

            if (app()->environment('production')) {
                foreach ([env('MAIL_FROM_ADDRESS'), $request->input('mail')] as $mail) {
                    Mail::to($mail)->send(new FormLazerMail($formlazer));
                }
            }  else {
                Mail::to(env('TEST_FROM_ADDRESS'))->send(new FormLazerMail($formlazer));
            }


            return view('formlazer.formlazer-generated')->with('data',$formlazer);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
