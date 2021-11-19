<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\YoutubeDefault;

class videoController extends Controller
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
        $gvideo = YoutubeDefault::all();
        $video = session('data')->youtube;
        $view = "templates.$theme.galeri_video";
        return view($view, compact('video', 'gvideo'));
    }
}
