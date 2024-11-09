<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PDFController extends Controller
{
    public function generatePDF()
    {
        $data = [
            'title' => 'Exemple de titre',
            'date' => date('m/d/Y')
        ];

        $pdf = Pdf::loadView('myPDF', $data);

        return $pdf->download('exemple.pdf');
    }
}
