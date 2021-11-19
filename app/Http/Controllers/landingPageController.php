<?php

namespace App\Http\Controllers;

use App\Landing_page;
use Illuminate\Http\Request;

class landingPageController extends Controller
{
    public function index(Request $req)
    {
        if (session('member_id') == null || session('username') == null) {
            return redirect(env('APP_URL') . '/');
        }

        $slug = $req->slug;

        if (!empty($slug)) {
            $data = Landing_page::where('member_id', $req->id)->where('slug', $slug)->get();
            if ($data) {
                $hits = $data[0]->hits + 1;
                $themes = $data[0]->themes->name;
                $data[0]->update(
                    [
                        'hits' => $hits,
                    ]
                );
                return view('landing-page', compact('data', 'themes'));
            }
        }
    }
}
