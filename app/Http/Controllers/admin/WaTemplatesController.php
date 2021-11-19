<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Wa_template;

class WaTemplatesController extends Controller
{
    public function index()
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $data = Wa_template::where('member_id', session('admin_member_id'))->first();
        if ($data) {
            $kontak = $data->kontak;
            $daftar = $data->daftar;
            $beli = $data->beli;
        } else {
            $kontak = "";
            $daftar = "";
            $beli = "";
        }

        return view('admin.wa_templates', compact('beli', 'daftar', 'kontak'));
    }

    public function update(Request $request)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $validasi = $request->validate([
            'beli' => 'required',
            'kontak' => 'required',
            'daftar' => 'required'
        ]);

        if ($validasi) {

            $hsl = Wa_template::where('member_id', session('admin_member_id'))->update([
                'beli' => $request->beli,
                'kontak' => $request->kontak,
                'daftar' => $request->daftar,
            ]);
            if ($hsl) {
                $des = "Update data Wa template, ID Member " . session('admin_member_id') . " dan ID Wa Template " . $request->id;
                $a_data = array(
                    session('admin_member_id'), request()->url(),
                    request()->headers->get('referer'),
                    $_SERVER['REMOTE_ADDR'],
                    $des,
                );
                save_event_log_member($a_data);
                return redirect()->back()->with(['message' => 'Data Berhasil diubah', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data gagal diubah', 'alert' => 'danger']);
            }
        } else {
            return redirect()->back()->with(['message' => 'Data yang diubah belum lengkap ', 'alert' => 'danger']);
        }
    }
}
