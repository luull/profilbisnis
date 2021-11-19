<?php

namespace App\Http\Controllers;

use App\Gallery_photo;
use App\Gallery_photo_Default;
use Illuminate\Http\Request;
use APP\Member;

class fotoController extends Controller
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
        $gphoto = Gallery_photo_Default::all();
        $photos = session('data')->gallery_photo;
        $view = "templates.$theme.galeri_foto";
        return view($view, compact('photos', 'gphoto'));
    }
}
