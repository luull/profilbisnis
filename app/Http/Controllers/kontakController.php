<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class kontakController extends Controller
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
        $data = session('data');
        $theme = session('themes');
        $view = "templates.$theme.kontak";
        return view($view, compact('data'));
    }
}
