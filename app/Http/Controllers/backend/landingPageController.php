<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Landing_page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Themes;

class landingPageController extends Controller
{
    public function index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $themes = Themes::all();
        $datas = Landing_page::where('member_id', session('backend_user_id'))->get();
        return view('backend.landing_page', compact('datas', 'themes'));
    }
    public function create(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $validasi = $req->validate([
            'nama' => 'required',
            'section1' => 'required',
            'themes_id' => 'required',

        ]);

        if ($validasi) {
            $bg1 = "";
            if ($req->hasfile('bg1')) {

                $file = $req->file('bg1');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/' . session('member_id') . '/images/', $name);
                $bg1 = "/" . session('backend_user_id') . "/images/$name";
            }
            $bg2 = "";
            if ($req->hasfile('bg2')) {

                $file = $req->file('bg2');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/' . session('backend_user_id') . '/images/', $name);
                $bg2 = "/" . session('backend_user_id') . "/images/$name";
            }
            $bg3 = "";
            if ($req->hasfile('bg3')) {

                $file = $req->file('bg3');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/' . session('backend_user_id') . '/images/', $name);
                $bg3 = "/" . session('backend_user_id') . "/images/$name";
            }
            $bg4 = "";
            if ($req->hasfile('bg4')) {

                $file = $req->file('bg4');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/' . session('backend_user_id') . '/images/', $name);
                $bg4 = "/" . session('backend_user_id') . "/images/$name";
            }
            $paralax1 = 0;
            $paralax2 = 0;
            $paralax3 = 0;
            $paralax4 = 0;
            for ($i = 0; $i < count($req->paralax); $i++) {
                if ($req->paralax[$i] == 1) {
                    $paralax1 = 1;
                }
                if ($req->paralax[$i] == 2) {
                    $paralax2 = 1;
                }

                if ($req->paralax[$i] == 3) {
                    $paralax3 = 1;
                }

                if ($req->paralax[$i] == 4) {
                    $paralax4 = 1;
                }
            }
            $hsl = Landing_page::create([
                'member_id' => session('backend_user_id'),
                'nama' => $req->nama,
                'slug' => Str::slug($req->nama),
                'section1' => $req->section1,
                'bg1' => $bg1,
                'bg_color1' => $req->bg_color1,
                'paralax1' => $paralax1,
                'section2' => $req->section2,
                'bg2' => $bg2,
                'bg_color2' => $req->bg_color2,
                'paralax2' => $paralax2,
                'section3' => $req->section3,
                'bg3' => $bg3,
                'bg_color3' => $req->bg_color3,
                'paralax3' => $paralax3,
                'section4' => $req->section4,
                'bg4' => $bg4,
                'bg_color4' => $req->bg_color4,
                'paralax3' => $paralax4,
                'themes_id' => $req->themes_id,
                'hits' => 0,
            ]);
            if ($hsl) {
                $des = "Input Landing Page, ID Member " . session('member_id') . " nama landing Page " . $req->nama;
                $a_data = array(
                    session('backend_user_id'), request()->url(),
                    request()->headers->get('referer'),
                    $_SERVER['REMOTE_ADDR'],
                    $des,
                );
                save_event_log_member($a_data);
                return redirect('/backend/landing-page')->with(['message' => 'Data Berhasil Ditambahkan ', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data gagal ditambahkan', 'alert' => 'danger']);
            }
        }
    }
    public function update(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $validasi = $req->validate([
            'nama' => 'required',
            'section1' => 'required',
            'themes_id' => 'required',

        ]);
        if ($validasi) {
            if ($req->hasfile('bg1')) {

                $file = $req->file('bg1');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/' . session('backend_user_id') . '/images/', $name);
                $bg1 = "/" . session('backend_user_id') . "/images/$name";
            } else {
                $bg1 = $req->bg1_edit;
            }
            if ($req->hasfile('bg2')) {

                $file = $req->file('bg2');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/' . session('backend_user_id') . '/images/', $name);
                $bg2 = "/" . session('backend_user_id') . "/images/$name";
            } else {
                $bg2 = $req->bg2_edit;
            }
            $bg3 = "";
            if ($req->hasfile('bg3')) {

                $file = $req->file('bg3');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/' . session('backend_user_id') . '/images/', $name);
                $bg3 = "/" . session('backend_user_id') . "/images/$name";
            } else {
                $bg3 = $req->bg3_edit;
            }
            $bg4 = "";
            if ($req->hasfile('bg4')) {

                $file = $req->file('bg4');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/' . session('backend_user_id') . '/images/', $name);
                $bg4 = "/" . session('backend_user_id') . "/images/$name";
            } else {
                $bg4 = $req->bg4_edit;
            }
            $paralax1 = 0;
            $paralax2 = 0;
            $paralax3 = 0;
            $paralax4 = 0;
            for ($i = 0; $i < count($req->paralax); $i++) {
                if ($req->paralax[$i] == 1) {
                    $paralax1 = 1;
                }
                if ($req->paralax[$i] == 2) {
                    $paralax2 = 1;
                }

                if ($req->paralax[$i] == 3) {
                    $paralax3 = 1;
                }

                if ($req->paralax[$i] == 4) {
                    $paralax4 = 1;
                }
            }
            $hsl = Landing_page::find($req->edit_id)->update([
                'member_id' => session('backend_user_id'),
                'nama' => $req->nama,
                'slug' => Str::slug($req->nama),
                'section1' => $req->section1,
                'bg1' => $bg1,
                'bg_color1' => $req->bg_color1,
                'paralax1' => $paralax1,
                'section2' => $req->section2,
                'bg2' => $bg2,
                'bg_color2' => $req->bg_color2,
                'paralax2' => $paralax2,
                'section3' => $req->section3,
                'bg3' => $bg3,
                'bg_color3' => $req->bg_color3,
                'paralax3' => $paralax3,
                'section4' => $req->section4,
                'bg4' => $bg4,
                'bg_color4' => $req->bg_color4,
                'paralax4' => $paralax4,
                'themes_id' => $req->themes_id,
            ]);
            if ($hsl) {
                $des = "Edit Landing Page, ID Member " . session('backend_user_id') . " nama landing Page " . $req->nama;
                $a_data = array(
                    session('backend_user_id'), request()->url(),
                    request()->headers->get('referer'),
                    $_SERVER['REMOTE_ADDR'],
                    $des,
                );
                save_event_log_member($a_data);
                return redirect('/backend/landing-page')->with(['message' => 'Data Berhasil Diupdate ', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data gagal Diupdate', 'alert' => 'danger']);
            }
        }
    }
    public function delete(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $hsl = Landing_page::find($req->id)->delete();
        if ($hsl) {
            return redirect()->back()->with(['message' => 'Data berhasil dihapus', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Data gagal dihapus', 'alert' => 'danger']);
        }
    }
    public function find(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $hsl = Landing_page::find($req->id);
        if ($hsl) {
            return response()->json($hsl);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan', 'error' => true]);
        }
    }
}
