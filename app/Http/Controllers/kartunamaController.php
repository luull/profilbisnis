<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Jorenvh\Share\ShareFacade;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Share;

class kartunamaController extends Controller
{
    public function index(Request $req)
    {


        $data = Member::where('username', $req->id)->firstOrFail();
        if ($data) {
            session(['member_id' => $data->id]);
            session(['level' => $data->level]);
            session(['data' => $data]);
            session(['username' => $data->username]);
            session(['member_id' => $data->id]);
            session(['no_member' => $data->member_id]);
            session(['themes' => $data->themes->template]);
            $member = session('data');
            $username = $req->id;
            $theme = session('themes');
            $kartu_nama_template = $data->kartu_nama->template;
            $view = "cards.$kartu_nama_template";
            $ref = request()->headers->get('referer');
            if (empty($ref)) {
                $ref = "";
            }
            $a_data = array(
                $data->id, request()->url(), $ref, $_SERVER['REMOTE_ADDR'],
            );
            save_page_traffic_member($a_data);
            $qr = QrCode::size(50)->generate(env('APP_URL') . '/' . session('username'));
            $socialShare = ShareFacade::page(env('APP_URL') . '/' . session('username'), 'Kartu Nama ' . session('username'))
                ->whatsapp()
                ->facebook()
                ->twitter()
                ->telegram()->getRawLinks();
            return view($view, compact('data', 'username', 'qr', 'socialShare'));
        } else {

            return redirect(env('APP_URL'));
        }
    }
    public function kartu_nama(Request $req)
    {
        dd($req->id);
    }
}
