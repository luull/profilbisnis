<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Wa_template_Default;

class WaTemplatesController extends Controller
{
    public function index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $data = Wa_template_Default::first();
        if ($data) {
            $kontak = $data->kontak;
            $daftar = $data->daftar;
            $beli = $data->beli;
            $id = $data->id;
        } else {
            $kontak = "";
            $daftar = "";
            $beli = "";
            $id = 1;
        }

        return view('backend.wa_templates', compact('beli', 'daftar', 'kontak', 'id'));
    }

    public function update(Request $request)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $validasi = $request->validate([
            'beli' => 'required',
            'kontak' => 'required',
            'daftar' => 'required'
        ]);

        if ($validasi) {

            $hsl = Wa_template_Default::find($request->id)->update([
                'beli' => $request->beli,
                'kontak' => $request->kontak,
                'daftar' => $request->daftar,
            ]);
            if ($hsl) {
                return redirect()->back()->with(['message' => 'Data Berhasil diubah', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data gagal diubah', 'alert' => 'danger']);
            }
        } else {
            return redirect()->back()->with(['message' => 'Data yang diubah belum lengkap ', 'alert' => 'danger']);
        }
    }
}
