<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class HTMLToPDFController extends Controller
{
    public function generatePdf()
    {
        $public = public_path('storage');
        $options = new Options();
        $dompdf = new Dompdf();

        $options->set('isRemoteEnabled', true);

        $dompdf->setOptions($options);
        $dompdf->setPaper('A4');
        $dompdf->getOptions()->setChroot($public);

        $html = view('admin.letterhead.letterhead')->render();

        $dompdf->loadHtml($html);

        $dompdf->render();

        $dompdf->stream('filename.pdf', ['Attachment' => false]);
    }

    public function index()
    {


    }
}
