<?php

namespace App\Http\Controllers;

use App\BisnisDefault;
use App\Konfigurasi;
use App\Member;
use App\ProdukDefault;
use App\Wa_template;
use App\Wa_template_Default;
use App\welcome_note;
use App\Welcome_note_default;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function test()
    {
        return view('test');
    }
    public function index()
    {

        if (session('member_id') == null || session('username') == null) {
            return redirect(env('APP_URL') . '/');
        }

        $data = Member::where('username', session('username'))->first();
        if (!$data) {
            return redirect(env('APP_URL'));
        }

        $wa_template_default = Wa_template_Default::first();
        $produk_display = DB::table('default_produk')
            ->join('display', 'display.produk_id', '=', 'default_produk.id')
            ->select('default_produk.nama_brg', 'default_produk.foto', 'default_produk.slug', 'display.id')
            ->orderBy('display.id', 'DESC')
            ->get();
        $bisnis_default = BisnisDefault::orderBy('id', 'DESC')->get();
        $produk_default = ProdukDefault::skip(0)->take(6)->get();
        session(['member_id' => $data->id]);
        session(['level' => $data->level]);
        session(['data' => $data]);
        session(['themes' => $data->themes->name]);
        $member = session('data');
        $welcome_note = $member->welcome_note;
        $welcome_note_default = Welcome_note_default::first();
        $wp = replace_dt_member($welcome_note_default->welcome_note, $member);
        $bisnis = $member->bisnis;
        $produk = $member->produk->skip(0)->take(6)->orderBy('id', 'DESC')->get();
        $banner = $member->banner;
        $konfigurasi = Konfigurasi::first();
        session(['konfigurasi' => $konfigurasi]);
        $theme = session('themes');
        $view = "templates.$theme.welcome";
        return view($view, compact('member', 'bisnis', 'produk', 'banner', 'theme', 'bisnis_default', 'produk_default', 'welcome_note', 'welcome_note_default', 'wp', 'wa_template_default', 'produk_display'));
    }
    public function replika(request $req)
    {
        if (empty($req->id) && session('username') == null) {
            return redirect('/');
        } else {
            session(['username' => $req->id]);
        }

        $data = Member::where('username', session('username'))->first();
        if (!$data) {
            return redirect(env('APP_URL'));
        }
        $a_data = array(
            $data->id, $req->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'],
        );
        save_page_traffic_member($a_data);
        $data->update([
            'hits' => $data->hits + 1
        ]);
        $wa_template_default = Wa_template_Default::first();
        $produk_display = DB::table('default_produk')
            ->join('display', 'display.produk_id', '=', 'default_produk.id')
            ->select('default_produk.nama_brg', 'default_produk.foto', 'default_produk.slug', 'default_produk.keterangan_singkat', 'default_produk.harga', 'display.id')
            ->orderBy('display.id', 'DESC')
            ->get();
        $bisnis_default = BisnisDefault::orderBy('id', 'DESC')->get();
        $produk_default = ProdukDefault::orderBy('id', 'DESC')->skip(0)->take(6)->get();
        session(['member_id' => $data->id]);
        session(['no_member' => $data->member_id]);
        session(['level' => $data->level]);
        session(['data' => $data]);
        session(['themes' => $data->themes->template]);
        $member = session('data');

        $qr = QrCode::size(100)->generate(env('APP_URL') . '/' . session('username'));
        session(['qrcode' => $qr]);
        $welcome_note = $member->welcome_note;
        $welcome_note_default = Welcome_note_default::first();
        $wp = replace_dt_member($welcome_note_default->welcome_note, $member);
        $wa_template = Wa_template::where('member_id', $data->id)->first();
        if ($wa_template) {
            $wa_kontak = $wa_template->kontak;
        } else {
            $wa_kontak = $wa_template_default->kontak;
        }
        $bisnis = $member->bisnis;
        $produk = $member->produk;
        $banner = $member->banner;
        $konfigurasi = Konfigurasi::first();
        session(['konfigurasi' => $konfigurasi]);
        $theme = session('themes');
        $view = "templates.$theme.welcome";
        return view($view, compact('member', 'bisnis', 'produk', 'banner', 'theme', 'bisnis_default', 'produk_default', 'welcome_note', 'welcome_note_default', 'wp', 'wa_template_default', 'wa_kontak', 'produk_display'));
    }
    function dashboard_backend()
    {
        $backend_data = session('backend_data');
        return view('backend.dashboard', compact('backend_data'));
    }
    function kartu()
    {
        return view('cards.download');
    }
}
