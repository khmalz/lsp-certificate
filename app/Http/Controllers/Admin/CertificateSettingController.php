<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stamp;
use App\Http\Controllers\Controller;
use App\Http\Requests\CertificateSettingRequest;
use Illuminate\Support\Facades\File;

class CertificateSettingController extends Controller
{
    public function edit()
    {
        $stamp = Stamp::first();
        return view('dashboard.certificate.setting.edit', compact('stamp'));
    }

    public function update(CertificateSettingRequest $request, Stamp $stamp)
    {
        $datas = $request->validated();

        if ($request->hasFile('ceo_signature')) {
            if ($stamp->ceo_signature) {
                File::delete(public_path("assets/img/" . $stamp->ceo_signature));
            }

            $ceo_signature = $request->file('ceo_signature');
            $datas['ceo_signature'] = $ceo_signature->store('signatures');
        }

        if ($request->hasFile('teacher_signature')) {
            if ($stamp->teacher_signature) {
                File::delete(public_path("assets/img/" . $stamp->teacher_signature));
            }

            $teacher_signature = $request->file('teacher_signature');
            $datas['teacher_signature'] = $teacher_signature->store('signatures');
        }

        $stamp->update([
            'ceo_name' => $datas['ceo_name'],
            'teacher_name' => $datas['teacher_name'],
            'ceo_signature' => $datas['ceo_signature'] ?? $stamp->ceo_signature,
            'teacher_signature' => $datas['teacher_signature'] ?? $stamp->teacher_signature,
        ]);

        return to_route('certificate.index')->with('success', 'Sukses mengedit setting untuk sertifikat');
    }
}
