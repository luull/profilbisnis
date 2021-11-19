<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;

class profileController extends Controller
{
    public function index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $admin_profil = session('admin_data');
        return view('admin.profile', compact('admin_profil'));
    }

    public function show_admin()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $backend_profil = session('backend_data');
        dd($backend_profil);
        return view('backend.profile_admin', compact('backend_profil'));
    }
    public function update(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if ($req) {
            $id = $req->id;
            $hsl = Member::find($id)->update([
                'nama' => $req->nama,
                'ktp' => $req->ktp,
                'alamat' => $req->alamat,
                'kelurahan' => $req->kelurahan,
                'kecamatan' => $req->kecamatan,
                'kota' => $req->kota,
                'propinsi' => $req->propinsi,
                'negara' => 'Indonesia',
                'kd_pos' => $req->kd_pos,
                'email' => $req->email,
                'telp' => $req->telp,
                'hp' => $req->hp,
                'wa' => $req->wa,
                'ig' => $req->ig,
                'fb' => $req->fb,
                'twitter' => $req->twitter,
                'tube' => $req->tube,
                'website' => $req->website,
                'map' => $req->map,
                'latitude' => $req->latitude,
                'longitude' => $req->longitude,
                'moto' => $req->moto,
                'perusahaan' => $req->perusahaan,
                'jabatan' => $req->jabatan,
                'pekerjaan' => $req->pekerjaan,
                'themes' => $req->themes,





            ]);
            if ($hsl) {
                $member = Member::find($id)->first();
                session(['data_member' => $member]);
                return redirect()->back()->with(['message' => 'Data Profile Member berhasil diupdate', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data Profile Member gagal diupdate', 'alert' => 'error']);
            }
        }
    }
    public function welcome_note(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }

        $dt = Member::select('welcome_note')->where('id', $req->id)->first();
        $wn = $dt->welcome_note;
        return view('admin.welcome_note', compact('wn'));
    }
    public function update_welcome_note(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }

        $hsl = Member::find($req->id)->update([
            'welcome_note' => $req->welcome_note
        ]);
        if ($hsl) {
            return redirect()->back()->with(['message' => 'Data welcome berhasil diupdate', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Data welcome gagal diupdate', 'alert' => 'error']);
        }
    }

    public function upload_foto(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        return view('admin.photo_profil');
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
            $namafile = $req->id . "/photos/" . $req->id . "." . $req->foto->getClientOriginalExtension();
            if (file_exists(public_path() . '/' . $namafile)) {
                unlink(public_path() . '/' . $namafile);
            }
            $file = $req->file('foto');
            $extension = $file->getClientOriginalExtension();
            $name = $req->id . '.' . $extension;
            $hasil = $file->move(public_path() . '/' . $req->id . '/photos/', $name);
            if ($hasil) {
                Member::find($req->id)->update([
                    'foto' => $namafile
                ]);
                session(['photo' => $namafile]);
                return  redirect()->back()->with(['message' => 'Upload Foto Berhasil', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Upload Foto Gagal', 'alert' => 'error']);
            }
        }
    }

    public function ubah_password()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        return view('admin.ubah_password');
    }
    public function proses_ubah_password(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $req->validate([
            'password' => 'min:6|required_with:password1|same:password1',
            'password1' => 'required|min:6'
        ]);
        $hsl = Member::where('id', $req->id)->update([
            'password' => bcrypt($req->password)
        ]);
        if ($hsl) {
            return  redirect()->back()->with(['message' => 'Password Berhasil diubah', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Password Gagal diubah', 'alert' => 'error']);
        }
    }
}
