<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Kartu_nama;
use App\Konfigurasi;
use App\Themes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class konfigurasiController extends Controller
{
    public function index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $datas = Konfigurasi::all();
        return view('backend.konfigurasi', compact('datas'));
    }
    public function update(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $id = $req->id;
        $hsl = Konfigurasi::find($id)->update([
            'app_name' => $req->app_name,
            'app_url' => $req->app_url,
            'app_domain' => $req->app_domain,
            'copyright' => $req->copyright,
            'text_join' => $req->text_join,
            'poweredby' => $req->poweredby,
            'company_name' => $req->company_name,
            'url_join' => $req->url_join,
            'url_import' => $req->url_import,

        ]);
        if ($hsl) {
            $data = Konfigurasi::find($id);
            session(['konfigurasi_backend' => $data]);
            dd($data);
            $des = "Update Konfigurasi Website";
            $a_data = array(
                session('backend_user_id'), request()->url(),
                request()->headers->get('referer'),
                $_SERVER['REMOTE_ADDR'],
                $des,
            );
            save_event_log_admin($a_data);
            return redirect()->back()->with(['message' => 'Data Konfigurasi berhasil diupdate', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Data Konfigurasi gagal diupdate', 'alert' => 'error']);
        }
    }
}
