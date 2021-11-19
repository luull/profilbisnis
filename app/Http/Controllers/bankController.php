<?php

namespace App\Http\Controllers;

use App\Bank_member;
use Illuminate\Http\Request;

class bankController extends Controller
{

    public function listbank_admin()
    {
        if (session('member_id') == null || session('username') == null) {
            return redirect(env('APP_URL') . '/');
        }

        $bank = new Bank_member;
        $banks = $bank::where('member_id', session('member_id'))->get();
        $data = session('data');
        $a_data = array(
            session('data')->id, request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'],
        );
        save_page_traffic_member($a_data);
        return view('admin.bank', compact('banks', 'data'));
    }
}
