<?php

namespace App\Http\Controllers;

use App\Konfigurasi;
use App\Member;
use App\Produk;
use App\ProdukDefault;
use App\Testimoni;
use App\TestimoniDefault;
use App\Wa_template_Default;
use App\Wa_templates;
use Jorenvh\Share\ShareFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class produkController extends Controller
{
    public function index(Request $req)
    {

        if (!session('username') || session('username') == null) {
            //  session(['member_id'=>ENV('MEMBER_ID')]);
            return view('welcome');
        }
        $search = $req->search;
        if ($search) {
            $produk_default = ProdukDefault::where('nama_brg', 'LIKE', '%' . $search . '%')->get();
            $a_data = array(
                session('data')->id, request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'],
            );
            save_page_traffic_member($a_data);
            $dt_wa_template = Wa_template_Default::first();
            $wa_template1 = str_replace(' ', '%20', $dt_wa_template->beli);
            $wa_template = str_replace(' ', '%20', session('data')->wa_template->beli);
            $no_wa = session('data')->wa;
            $produk = Produk::where('nama_brg', 'LIKE', '%' . $search . '%')->get();
            $theme = session('themes');
            $view = "templates.$theme.produk";
        } else {
            $produk_default = ProdukDefault::all();
            $a_data = array(
                session('data')->id, request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'],
            );
            save_page_traffic_member($a_data);
            $dt_wa_template = Wa_template_Default::first();
            $wa_template1 = str_replace(' ', '%20', $dt_wa_template->beli);
            $wa_template = str_replace(' ', '%20', session('data')->wa_template->beli);
            $no_wa = session('data')->wa;
            $produk = session('data')->produk;
            $theme = session('themes');
            $view = "templates.$theme.produk";
        }
        return view($view, compact('produk', 'no_wa', 'wa_template', 'produk_default', 'wa_template1', 'search'));
    }
    public function detilProduk(Request $req)
    {
        $produk = Produk::where('slug', $req->id)->first();
        $idnya = Produk::where('slug', $req->id)->first()->id;
        if (!$produk) {
            $produk = ProdukDefault::where('slug', $req->id)->first();
        }

        $data = Member::where('username', $req->member)->firstOrFail();
        session(['member_id' => $data->id]);
        session(['data' => $data]);
        session(['username' => $data->username]);
        session(['wa' => $data->wa]);
        session(['no_member' => $data->member_id]);
        session(['themes' => $data->themes->template]);
        $konfigurasi = Konfigurasi::first();
        session(['konfigurasi' => $konfigurasi]);
        $testimoni = Testimoni::where('produk_id', $idnya)->count();
        $wa_template = str_replace(' ', '%20', $data->wa_template->beli);
        $no_wa = $data->wa;
        $theme = session('themes');
        $view = "templates.$theme.detil_produk";
        return view($view, compact('produk', 'wa_template', 'no_wa', 'testimoni'));
    }
    public function detilProduk1(Request $req)
    {
        $clsproduk = new ProdukDefault();
        $dt_wa = Wa_template_Default::first();
        $produk = $clsproduk::where('slug', $req->id)->first();
        $idnya = $clsproduk::where('slug', $req->id)->first()->id;
        if (!$produk) {
            $produk = ProdukDefault::where('slug', $req->id)->first();
        }
        $data = Member::where('username', $req->member)->firstOrFail();
        session(['member_id' => $data->id]);
        session(['data' => $data]);
        session(['username' => $data->username]);
        session(['wa' => $data->wa]);
        session(['no_member' => $data->member_id]);
        session(['themes' => $data->themes->template]);
        $konfigurasi = Konfigurasi::first();
        session(['konfigurasi' => $konfigurasi]);
        $shareProduct = ShareFacade::page(URL::current())
            ->whatsapp()
            ->facebook()
            ->twitter()
            ->telegram()->getRawLinks();
        $testimoni = TestimoniDefault::where('produk_id', $idnya)->count();
        $wa_template = str_replace(' ', '%20', $dt_wa->beli);
        $no_wa = session('wa');
        $theme = session('themes');
        $view = "templates.$theme.detil_produk";
        return view($view, compact('produk', 'wa_template', 'no_wa', 'testimoni', 'shareProduct'));
    }
}
