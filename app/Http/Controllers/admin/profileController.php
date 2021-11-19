<?php

namespace App\Http\Controllers\admin;

use App\City;
use App\Http\Controllers\Controller;
use App\KategoriPekerjaan;
use App\Level_member;
use Illuminate\Http\Request;
use App\Member;
use App\Kartu_nama;
use App\Province;
use App\Subdistrict;
use App\SubKategoriPekerjaan;
use App\welcome_note;

class profileController extends Controller
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
        $province = Province::all();
        $kartu_nama = Kartu_nama::all();
        $kategori_pekerjaan = KategoriPekerjaan::get();
        $sub_kategori_pekerjaan = SubKategoriPekerjaan::get();
        $city = City::where('province_id', $profil->propinsi)->get();
        $subdistrict = Subdistrict::where('city_id', $profil->kota)->get();
        $level_member = Level_member::all();

        $compact = array(
            'profil', 'province', 'kartu_nama', 'city', 'subdistrict',
            'kategori_pekerjaan', 'sub_kategori_pekerjaan', 'level_member'
        );
        return view('admin.profile', compact($compact));
    }

    public function show_admin()
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $a_data = array(
            session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], "",
        );
        save_event_log_member($a_data);
        $profil = session('data');
        return view('backend.profile_admin', compact('profil'));
    }
    public function update(Request $req)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $a_data = array(
            session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], "",
        );
        save_event_log_member($a_data);
        if ($req) {
            $hsl = Member::find(session('admin_member_id'))->update([
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
                'kartu_nama_id' => $req->kartu_nama,
                'pekerjaan' => $req->pekerjaan,
                'kategori_pekerjaan' => $req->kategori_pekerjaan,
                'sub_kategori_pekerjaan' => $req->sub_kategori_pekerjaan,
                'tentang_web' => $req->tentang_web,
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

                return redirect()->back()->with(['message' => 'Data Profile berhasil diupdate', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data Profile gagal diupdate', 'alert' => 'error']);
            }
        }
    }
    public function welcome_note()
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $a_data = array(
            session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], "",
        );
        save_event_log_member($a_data);
        $judul = '';
        $sub_judul = '';
        $welcome_note = '';
        $wn = welcome_note::where('member_id', session('admin_member_id'))->get();
        if (count($wn) > 0) {
            $judul = $wn[0]->judul;
            $sub_judul = $wn[0]->sub_judul;
            $welcome_note = $wn[0]->welcome_note;
        }
        $profil = session('data');

        return view('admin.welcome_note', compact('judul', 'sub_judul', 'welcome_note'));
    }
    public function update_welcome_note(Request $req)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $a_data = array(
            session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], "",
        );
        save_event_log_member($a_data);
        welcome_note::where('member_id', session('admin_member_id'))->delete();
        $hsl = welcome_note::create([
            'member_id' => session('admin_member_id'),
            'welcome_note' => $req->welcome_note,
            'judul' => $req->judul,
            'sub_judul' => $req->sub_judul
        ]);
        if ($hsl) {
            $des = "Update Data Welcome Note, ID Member " . session('admin_member_id');
            $a_data = array(
                session('admin_member_id'), request()->url(),
                request()->headers->get('referer'),
                $_SERVER['REMOTE_ADDR'],
                $des,
            );
            save_event_log_member($a_data);
            return redirect()->back()->with(['message' => 'Data welcome berhasil diupdate', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Data welcome gagal diupdate', 'alert' => 'error']);
        }
    }

    public function upload_foto()
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $des = "Upload Foto Profil, ID Member " . session('admin_member_id');
        $a_data = array(
            session('admin_member_id'), request()->url(),
            request()->headers->get('referer'),
            $_SERVER['REMOTE_ADDR'],
            $des,
        );
        save_event_log_member($a_data);
        return view('admin.photo_profil');
    }
    public function proses_upload_foto(Request $req)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $req->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);



        if ($req->hasFile('foto')) {
            $namafile = session('admin_member_id') . "/photos/" . session('admin_member_id') . "." . $req->foto->getClientOriginalExtension();
            if (file_exists(public_path() . '/' . $namafile)) {
                unlink(public_path() . '/' . $namafile);
            }
            $file = $req->file('foto');
            $extension = $file->getClientOriginalExtension();
            $name = session('admin_member_id') . '.' . $extension;
            $hasil = $file->move(public_path() . '/' . session('admin_member_id') . '/photos/', $name);
            if ($hasil) {
                Member::find(session('admin_member_id'))->update([
                    'foto' => $namafile
                ]);
                session(['photo' => $namafile]);
                $des = "Upload Foto Profil Sukses, ID Member " . session('admin_member_id') . " File Foto " . $namafile;
                $a_data = array(
                    session('admin_member_id'), request()->url(),
                    request()->headers->get('referer'),
                    $_SERVER['REMOTE_ADDR'],
                    $des,
                );
                save_event_log_member($a_data);
                return  redirect()->back()->with(['message' => 'Upload Foto Berhasil', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Upload Foto Gagal', 'alert' => 'error']);
            }
        }
    }

    public function ubah_password()
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $a_data = array(
            session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], "",
        );
        save_event_log_member($a_data);
        return view('admin.ubah_password');
    }
    public function proses_ubah_password(Request $req)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $a_data = array(
            session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], "",
        );
        save_event_log_member($a_data);
        $req->validate([
            'password' => 'min:6|required_with:password1|same:password1',
            'password1' => 'required|min:6'
        ]);
        $hsl = Member::where('id', session('admin_member_id'))->update([
            'password' => bcrypt($req->password)
        ]);
        if ($hsl) {
            $des = "Update Password, ID Member " . session('admin_member_id');
            $a_data = array(
                session('admin_member_id'), request()->url(),
                request()->headers->get('referer'),
                $_SERVER['REMOTE_ADDR'],
                $des,
            );
            save_event_log_member($a_data);
            return  redirect()->back()->with(['message' => 'Password Berhasil diubah', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Password Gagal diubah', 'alert' => 'error']);
        }
    }

    public function city_list(Request $req)
    {
        $city = City::where('province_id', $req->id)->get();
        if (count($city) > 0) {
            $data = array(
                'code' => 200,
                'result' => $city
            );
            $code = 200;
        } else {
            $code = 404;
            $data = array(
                'code' => 404,
                'error' => 'Province ID not Found'
            );
        }

        return  response()->json($data, $code);
    }
    public function subdistrict_list(Request $req)
    {
        $kec = Subdistrict::where('city_id', $req->id)->get();
        if (count($kec) > 0) {
            $data = array(
                'code' => 200,
                'result' => $kec
            );
            $code = 200;
        } else {
            $code = 404;
            $data = array(
                'code' => 404,
                'error' => 'City ID not Found'
            );
        }

        return  response()->json($data, $code);
    }
}
