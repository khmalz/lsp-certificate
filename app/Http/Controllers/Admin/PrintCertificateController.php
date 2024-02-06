<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stamp;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class PrintCertificateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Certificate $certificate)
    {
        $stamp = Stamp::first();
        $certificate->load('participant.training');

        $pdf = Pdf::loadView('dashboard.certificate.templates.certif' . $certificate->type, compact('certificate', 'stamp'));
        return $pdf->download("certificate-{$certificate->participant->name}.pdf");
    }
}
