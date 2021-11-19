<?php

namespace App\Http\Controllers\backend;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Level_admin;
use Illuminate\Http\Request;
use App\Welcome_note_default;
use Illuminate\Support\Facades\DB;

class profileController extends Controller
{
    public function index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $backend_profil = session('backend_data');
        $level_admin = Level_admin::all();
        return view('backend.profile_admin', compact('backend_profil', 'level_admin'));
    }


    public function update(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $data = session('backend_data');
        $id = session('backend_data')->id;
        $hsl = Admin::find($id)->update([
            'nama' => $req->nama,
            'telp' => $req->telp,
            'email' => $req->email,
            'akses' => $req->akses

        ]);
        if ($hsl) {
            $data = Admin::find($id);
            session(['data' => $data]);
            $des = "Update Admin, User ID " . $id;
            $a_data = array(
                session('backend_user_id'), request()->url(),
                request()->headers->get('referer'),
                $_SERVER['REMOTE_ADDR'],
                $des,
            );
            save_event_log_admin($a_data);
            return redirect()->back()->with(['message' => 'Data Profile berhasil diupdate', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Data Profile gagal diupdate', 'alert' => 'error']);
        }
    }

    public function welcome_note()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $dt = Welcome_note_default::first();
        $wn = "";
        $sub_judul = "";
        $judul = "";
        if ($dt) {
            $wn = $dt->welcome_note;
            $sub_judul = $dt->sub_judul;
            $judul = $dt->judul;
        }
        return view('backend.welcome_note', compact('wn', 'sub_judul', 'judul'));
    }
    public function update_welcome_note(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $cek = Welcome_note_default::all();
        if (count($cek) > 0) {
            $hsl = DB::update('update default_welcome_note set welcome_note =?,sub_judul=?, judul=?', [$req->welcome_note, $req->sub_judul, $req->judul]);
        } else {
            $hsl = welcome_note_default::create([
                'welcome_note' => $req->welcome_note,
                'sub_judul' => $req->sub_judul,
                'judul' => $req->judul,
            ]);
        }
        if ($hsl) {
            return redirect()->back()->with(['message' => 'Data welcome berhasil diupdate', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Data welcome gagal diupdate', 'alert' => 'error']);
        }
    }

    public function ubah_password()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        return view('backend.ubah_password');
    }
    public function proses_ubah_password(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $data = session('backend_data');

        $req->validate([
            'password' => 'min:6|required_with:password1|same:password1',
            'password1' => 'required|min:6'
        ]);
        $hsl = Admin::find($data->id)->update([
            'pwd' => bcrypt($req->password)
        ]);
        if ($hsl) {
            $des = "Update Password, User ID " . session('backend_user_id');
            $a_data = array(
                session('backend_user_id'), request()->url(),
                request()->headers->get('referer'),
                $_SERVER['REMOTE_ADDR'],
                $des,
            );
            save_event_log_admin($a_data);
            return  redirect()->back()->with(['message' => 'Password Berhasil diubah', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Password Gagal diubah', 'alert' => 'error']);
        }
    }

    public function upload_foto()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        return view('backend.photo_profil');
    }
    public function proses_upload_foto(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $req->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);



        if ($req->hasFile('foto')) {
            $data = session('backend_data');
            $file_foto = str_replace($data->nama, " ", "") . $data->id . "." . $req->foto->getClientOriginalExtension();
            $namafile = "/photos/" . $file_foto;
            if (file_exists(public_path() . '/' . $namafile)) {
                unlink(public_path() . '/' . $namafile);
            }
            $file = $req->file('foto');
            $extension = $file->getClientOriginalExtension();
            $name = $file_foto;
            $hasil = $file->move(public_path() . '/photos/', $name);
            if ($hasil) {
                Admin::find($data->id)->update([
                    'foto' => $namafile
                ]);
                session(['backend_photo' => $namafile]);
                $des = "Upload Foto Profil Admin Sukses, User ID " . session('backend_user_id') . " File Foto " . $namafile;

                $a_data = array(
                    session('backend_user_id'), request()->url(),
                    request()->headers->get('referer'),
                    $_SERVER['REMOTE_ADDR'],
                    $des,
                );
                save_event_log_admin($a_data);
                return  redirect()->back()->with(['message' => 'Upload Foto Berhasil', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Upload Foto Gagal', 'alert' => 'error']);
            }
        }
    }
}
