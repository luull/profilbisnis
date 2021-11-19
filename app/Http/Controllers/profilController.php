<?php

namespace App\Http\Controllers;

use App\KategoriPekerjaan;
use Illuminate\Http\Request;
use App\Member;
use App\SubKategoriPekerjaan;

class profilController extends Controller
{
    public function index()
    {
        if (session('member_id') == null || session('username') == null) {
            return redirect(env('APP_URL') . '/');
        }

        $a_data = array(
            session('data')->id, request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'],
        );
        save_page_traffic_member($a_data);
        $theme = session('themes');
        $profil = session('data');
        $view = "templates.$theme.profile";
        return view($view, compact('profil'));
    }
    public function show_admin()
    {
    }
    public function sub_kategori_pekerjaan(Request $req)
    {
        $id = $req->id;
        if (!empty($id)) {
            $hsl = SubKategoriPekerjaan::where('kategori_id', $id)->get();
            if ($hsl) {
                $data = array(
                    'code' => 200,
                    'result' => $hsl
                );
                $code = 200;
            } else {
                $code = 404;
                $data = array(
                    'code' => 404,
                    'error' => 'Sub Kategori Pekerjaan tidak ditemukan'
                );
            }

            return  response()->json($data, $code);
        }
    }
    public function kategori_pekerjaan(Request $req)
    {
        $id = $req->id;
        if (!empty($id)) {
            $hsl = KategoriPekerjaan::find($id);
            if ($hsl) {
                $data = array(
                    'code' => 200,
                    'result' => $hsl
                );
                $code = 200;
            } else {
                $code = 404;
                $data = array(
                    'code' => 404,
                    'error' => 'Kategori Pekerjaan tidak ditemukan'
                );
            }

            return  response()->json($data, $code);
        }
    }
}
