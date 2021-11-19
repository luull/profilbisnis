<?php

namespace App\Http\Controllers;

use App\Bisnis;
use App\BisnisDefault;
use App\Member;
use App\Produk;
use App\ProdukDefault;
use App\Wa_template_Default;
use Illuminate\Http\Request;

class bisnisController extends Controller
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
        $wa_template = str_replace(' ', '%20', session('data')->wa_template->beli);
        $no_wa = session('data')->wa;
        $data = session('data');
        $bisnis = session('data')->bisnis;
        $theme = session('themes');
        if (session('level_member') > 0) {
            $link = "bisnis";
        } else {
            $link = "bisnis1";
        }

        $bisnis_default = BisnisDefault::all();
        $view = "templates.$theme.bisnis";

        return view($view, compact('bisnis', 'data', 'bisnis_default', 'link'));
    }

    public function detilBisnis(Request $req)
    {

        if (!session('username') || session('username') == null) {
            //  session(['member_id'=>ENV('MEMBER_ID')]);
            return view('welcome');
        }
        $a_data = array(
            session('data')->id, request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'],
        );
        save_page_traffic_member($a_data);
        $idnya = Bisnis::where('slug', $req->id)->first()->id;
        $bisnis = Bisnis::where('slug', $req->id)->firstOrFail();
        $produk = $bisnis->produk;
        $jproduk = count($produk);
        $count_produk = Produk::where('bisnis_id', $idnya)->count();
        $theme = session('themes');
        $link = "bisnis";
        $view = "templates.$theme.detil_bisnis";
        return view($view, compact('bisnis', 'jproduk', 'link', 'count_produk'));
    }
    public function detilBisnis1(Request $req)
    {

        if (!session('username') || session('username') == null) {
            //  session(['member_id'=>ENV('MEMBER_ID')]);
            return view('welcome');
        }
        $a_data = array(
            session('data')->id, request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'],
        );
        save_page_traffic_member($a_data);
        $idnya = BisnisDefault::where('slug', $req->id)->first()->id;
        $bisnis = BisnisDefault::where('slug', $req->id)->firstOrFail();
        $produk = $bisnis->produk;
        $jproduk = count($produk);
        $count_produk = ProdukDefault::where('bisnis_id', $idnya)->count();
        $theme = session('themes');
        $view = "templates.$theme.detil_bisnis";
        $link = "bisnis1";
        return view($view, compact('bisnis', 'jproduk', 'link', 'count_produk'));
    }
    public function produkBisnis(Request $req)
    {
        if (!session('username') || session('username') == null) {
            //  session(['member_id'=>ENV('MEMBER_ID')]);
            return view('welcome');
        }
        $search = $req->search;
        if ($search) {
            $a_data = array(
                session('data')->id, request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'],
            );
            save_page_traffic_member($a_data);
            $bisnis = Bisnis::where('slug', $req->id)->first();
            $idnya = Bisnis::where('slug', $req->id)->first()->id;
            $nama_bisnis = $bisnis->nama;
            $produk = ProdukDefault::where('nama_brg', 'LIKE', '%' . $search . '%')->where('bisnis_id', $idnya)->get();
            $data = session('data');
            $no_wa = $data->wa;
            $wa_template = str_replace(" ", "%20", $data->wa_template->beli);
            $link = "produk";
            $theme = session('themes');
            $view = "templates.$theme.produk_bisnis";
        } else {
            $a_data = array(
                session('data')->id, request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'],
            );
            save_page_traffic_member($a_data);
            $bisnis = Bisnis::where('slug', $req->id)->first();
            $nama_bisnis = $bisnis->nama;
            $produk = $bisnis->produk;
            $data = session('data');
            $no_wa = $data->wa;
            $wa_template = str_replace(" ", "%20", $data->wa_template->beli);
            $link = "produk";
            $theme = session('themes');
            $view = "templates.$theme.produk_bisnis";
        }
        return view($view, compact('produk', 'nama_bisnis', 'no_wa', 'wa_template', 'link', 'search'));
    }
    public function produkBisnis1(Request $req)
    {
        if (!session('username') || session('username') == null) {
            //  session(['member_id'=>ENV('MEMBER_ID')]);
            return view('welcome');
        }
        $search = $req->search;
        if ($search) {
            $a_data = array(
                session('data')->id, request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'],
            );
            save_page_traffic_member($a_data);
            $dt_wa_template = Wa_template_Default::first();

            $bisnis = BisnisDefault::where('slug', $req->id)->first();
            $idnya = BisnisDefault::where('slug', $req->id)->first()->id;
            $nama_bisnis = $bisnis->nama;
            $produk = ProdukDefault::where('nama_brg', 'LIKE', '%' . $search . '%')->where('bisnis_id', $idnya)->get();
            $data = session('data');
            $no_wa = $data->wa;
            $wa_template1 = str_replace(' ', '%20', $dt_wa_template->beli);
            $wa_template = str_replace(' ', '%20', session('data')->wa_template->beli);
            $link = "produk1";
            $theme = session('themes');
            $view = "templates.$theme.produk_bisnis";
        } else {

            $a_data = array(
                session('data')->id, request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'],
            );
            save_page_traffic_member($a_data);
            $dt_wa_template = Wa_template_Default::first();

            $bisnis = BisnisDefault::where('slug', $req->id)->first();
            $nama_bisnis = $bisnis->nama;
            $produk = $bisnis->produk;
            $data = session('data');
            $no_wa = $data->wa;
            $wa_template1 = str_replace(' ', '%20', $dt_wa_template->beli);
            $wa_template = str_replace(' ', '%20', session('data')->wa_template->beli);
            $link = "produk1";
            $theme = session('themes');
            $view = "templates.$theme.produk_bisnis";
        }
        return view($view, compact('produk', 'nama_bisnis', 'no_wa', 'wa_template', 'wa_template1', 'link', 'search'));
    }
}
