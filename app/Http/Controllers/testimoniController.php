<?php

namespace App\Http\Controllers;

use App\Konfigurasi;
use App\Member;
use App\Testimoni;
use App\TestimoniDefault;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Jorenvh\Share\ShareFacade;

class testimoniController extends Controller
{
    public function index(Request $req)
    {
        if (session('member_id') == null || session('username') == null) {
            return redirect(env('APP_URL') . '/');
        }

        $a_data = array(
            session('data')->id, request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'],
        );
        save_page_traffic_member($a_data);
        $data1 = TestimoniDefault::select('default_testimoni.*', 'default_produk.nama_brg', 'default_produk.slug')
            ->join('default_produk', 'default_produk.id', '=', 'default_testimoni.produk_id')
            ->where('default_produk.slug', '=', $req->slug)
            ->get();
        $data = Testimoni::select('testimoni.*', 'produk.nama_brg', 'produk.slug')
            ->join('produk', 'produk.id', '=', 'testimoni.produk_id')
            ->where('produk.slug', '=', $req->slug)
            ->get();
        $nama_produk = "";
        $nama_produk1 = "";
        if ($data1->count() > 0) {
            $nama_produk1 = $data1[0]->nama_brg;
        } else {
            if ($data->count() > 0) {
                $nama_produk = $data[0]->nama_brg;
            }
        }
        if ($data1->count() > 0 || $data->count() > 0) {
            $theme = session('themes');
            $view = "templates.$theme.testimoni";
            return view($view, compact('data', 'nama_produk', 'data1'));
        } else {

            $theme = session('themes');
            $view = "templates.$theme.not_found";
            $message = "Data tidak ditemukan";
            return view($view, compact('message'));
        }
    }
    public function detil(Request $req)
    {
        $data = Testimoni::select('testimoni.*', 'produk.nama_brg', 'produk.slug')
            ->join('produk', 'produk.id', '=', 'testimoni.produk_id')
            ->where('testimoni.id', '=', $req->id)
            ->get();
        if ($data->count() > 0) {
            $datasession = Member::where('username', $req->member)->firstOrFail();
            session(['member_id' => $datasession->id]);
            session(['data' => $datasession]);
            session(['username' => $datasession->username]);
            session(['wa' => $datasession->wa]);
            session(['no_member' => $datasession->member_id]);
            session(['themes' => $datasession->themes->template]);
            $shareTestimoni = ShareFacade::page(URL::current())
                ->whatsapp()
                ->facebook()
                ->twitter()
                ->telegram()->getRawLinks();
            $nama_produk = $data[0]->nama_brg;
            $konfigurasi = Konfigurasi::first();
            session(['konfigurasi' => $konfigurasi]);
            $theme = session('themes');
            $view = "templates.$theme.testimoni_detil";
            return view($view, compact('data', 'nama_produk', 'shareTestimoni'));
        } else {

            $theme = session('themes');
            $view = "templates.$theme.not_found";
            $message = "Data tidak ditemukan";
            return view($view, compact('message'));
        }
    }
    public function detil1(Request $req)
    {
        $data = TestimoniDefault::select('default_testimoni.*', 'default_produk.nama_brg', 'default_produk.slug')
            ->join('default_produk', 'default_produk.id', '=', 'default_testimoni.produk_id')
            ->where('default_testimoni.id', '=', $req->id)
            ->get();
        if ($data->count() > 0) {
            $datasession = Member::where('username', $req->member)->firstOrFail();
            session(['member_id' => $datasession->id]);
            session(['data' => $datasession]);
            session(['username' => $datasession->username]);
            session(['wa' => $datasession->wa]);
            session(['no_member' => $datasession->member_id]);
            session(['themes' => $datasession->themes->template]);
            $shareTestimoni = ShareFacade::page(URL::current())
                ->whatsapp()
                ->facebook()
                ->twitter()
                ->telegram()->getRawLinks();
            $nama_produk = $data[0]->nama_brg;
            $konfigurasi = Konfigurasi::first();
            session(['konfigurasi' => $konfigurasi]);
            $theme = session('themes');
            $view = "templates.$theme.testimoni_detil";
            return view($view, compact('data', 'nama_produk', 'shareTestimoni'));
        } else {

            $theme = session('themes');
            $view = "templates.$theme.not_found";
            $message = "Data tidak ditemukan";
            return view($view, compact('message'));
        }
    }
}
