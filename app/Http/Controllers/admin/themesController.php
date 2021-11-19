<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Member;
use App\Themes;
use Illuminate\Http\Request;

class themesController extends Controller
{
    public function index()
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $a_data = array(
            session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], "",
        );
        save_event_log_member($a_data);
        $profil = Member::find(session('admin_member_id'));
        session(['data' => $profil]);
        $a_data = array(
            session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], "",
        );
        $themes = Themes::all();
        $compact = array(
            'themes', 'profil'
        );
        return view('admin.themes', compact($compact));
    }
    public function updateThemes(Request $req)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        if ($req) {
            $hsl = Member::find(session('admin_member_id'))->update([

                'themes_id' => $req->themes,
                'tgl_update' => date('Y-m-d h:i:s'),
                'petugas_update' => session('admin_member_id'),
            ]);
            if ($hsl) {

                $des = "Update Data Profil, ID Member " . session('admin_member_id') . " Nama Member " . $req->nama;
                $a_data = array(
                    session('admin_member_id'), request()->url(),
                    request()->headers->get('referer'),
                    $_SERVER['REMOTE_ADDR'],
                    $des,
                );
                save_event_log_member($a_data);

                return redirect()->back()->with(['message' => 'Data Themes berhasil diupdate', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data Themes gagal diupdate', 'alert' => 'error']);
            }
        }
    }
}
