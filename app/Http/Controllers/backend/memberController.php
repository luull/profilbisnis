<?php

namespace App\Http\Controllers\backend;

use App\Agenda;
use App\App_setting;
use App\Bank_member;
use App\Banner;
use App\Bisnis;
use App\City;
use App\Gallery_photo;
use App\Http\Controllers\Controller;
use App\Kartu_nama;
use App\KategoriPekerjaan;
use Illuminate\Http\Request;
use App\Member;
use App\Produk;
use App\Province;
use App\Subdistrict;
use App\SubKategoriPekerjaan;
use App\Testimoni;
use App\Themes;
use App\Wa_template;
use App\welcome_note;
use App\Youtube;
use App\YoutubeDefault;
use App\Level_member;
use App\BannerDefault;
use App\Wa_template_Default;
use Exception;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Http;

class memberController extends Controller
{
    public function index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }


        $member = Member::orderBy('tgl_daftar', 'DESC')->get();
        return view('backend.member', compact('member'));
    }

    public function delete(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if (session('backend_akses') < 3) {

            $dt = Member::find($req->id);
            if ($dt) {

                $gbr = $dt->foto;
                $hsl = $dt->delete();

                if ($hsl) {
                    return redirect()->back()->with(['message' => 'Data berhasil dihapus', 'alert' => 'success']);
                } else {
                    return redirect()->back()->with(['message' => 'Data gagal dihapus', 'alert' => 'danger']);
                }
            } else {
                return redirect()->back()->with(['message' => 'Data tidak ditemukan ', 'alert' => 'danger']);
            }
        }
    }
    public function find(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if (session('backend_akses') < 3) {

            $hsl = Member::find($req->id);
            if ($hsl) {
                $data_level = $hsl->data_level;
                return response()->json(['hasil' => $hsl, 'level_admin' => $hsl->level_akses, 'data_level' => $data_level]);
            } else {
                return response()->json(['message' => 'Data tidak ditemukan', 'error' => true]);
            }
        }
    }
    public function findusername(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if (session('backend_akses') < 3) {

            $hsl = Member::where('username', $req->username)->first();
            if ($hsl) {
                return response()->json(['hasil' => true]);
            } else {
                return response()->json(['hasil' => false]);
            }
        }
    }
    public function input_member(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }

        $kartu_nama = Kartu_nama::all();
        $themes = Themes::all();
        $province = Province::all();
        $kategori_pekerjaan = KategoriPekerjaan::get();
        $level_member = Level_member::all();
        $compact = array(
            'themes', 'kartu_nama', 'province',
            'kategori_pekerjaan',  'level_member'
        );
        return view('backend.member_input_profile', compact($compact));
    }
    public function edit_member(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }

        $id = $req->id;

        if (!empty($id)) {
            $profil = Member::find($id);
            $kartu_nama = Kartu_nama::all();
            $themes = Themes::all();
            $province = Province::all();
            $kategori_pekerjaan = KategoriPekerjaan::get();
            $sub_kategori_pekerjaan = SubKategoriPekerjaan::get();
            $city = City::where('province_id', $profil->propinsi)->get();
            $subdistrict = Subdistrict::where('city_id', $profil->kota)->get();
            $level_member = Level_member::all();
            $compact = array(
                'profil', 'themes', 'kartu_nama', 'province', 'city', 'subdistrict',
                'kategori_pekerjaan', 'sub_kategori_pekerjaan', 'level_member'
            );
            return view('backend.member_edit_profile', compact($compact));
        }
    }
    public function update_member(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if (session('backend_akses') < 3) {

            if ($req) {
                $hsl = Member::find($req->id)->update([
                    'nama' => $req->nama,
                    'member_id' => $req->member_id,
                    'sponsor' => $req->sponsor,
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
                    'themes_id' => $req->themes,
                    'level' => $req->level,
                    'biografi' => $req->biografi,
                    'kartu_nama_id' => $req->kartu_nama,
                    'kategori_pekerjaan' => $req->kategori_pekerjaan,
                    'sub_kategori_pekerjaan' => $req->sub_kategori_pekerjaan,
                    'tentang_web' => $req->tentang_web,
                    'tgl_update' => date('Y-m-d h:i:s'),
                    'petugas_update' => session('backend_user_id'),





                ]);
                if ($hsl) {
                    $des = "Update Data Profil, ID Member " . $req->id . " Nama Member " . $req->nama;
                    $a_data = array(
                        session('backend_user_id'), request()->url(),
                        request()->headers->get('referer'),
                        $_SERVER['REMOTE_ADDR'],
                        $des,
                    );
                    save_event_log_admin($a_data);
                    return redirect()->back()->with(['message' => 'Data Member berhasil diupdate', 'alert' => 'success']);
                } else {
                    return redirect()->back()->with(['message' => 'Data Member gagal diupdate', 'alert' => 'error']);
                }
            }
        }
    }
    public function create_member(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $banner = BannerDefault::first();
        if (session('backend_akses') < 3) {

            if ($req) {
                $hsl = Member::create([
                    'username' => $req->username,
                    'password' => bcrypt($req->password),
                    'member_id' => $req->member_id,
                    'sponsor' => $req->sponsor,
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
                    'themes_id' => $req->themes,
                    'biografi' => $req->biografi,
                    'kartu_nama_id' => $req->kartu_nama,
                    'kategori_pekerjaan' => $req->kategori_pekerjaan,
                    'sub_kategori_pekerjaan' => $req->sub_kategori_pekerjaan,
                    'tentang_web' => $req->tentang_web,
                    'foto' => 'images/no-pic.jpg',
                    'logo' => 'images/logo.png',
                    'logo_kecil' => 'images/logo-kecil.png',
                    'tgl_daftar' => date('Y-m-d h:i:s'),
                    'tgl_input' => date('Y-m-d h:i:s'),
                    'petugas_input' => session('backend_user_id'),






                ]);
                if ($hsl) {
                    $m = Member::where('username', $req->username)->first();
                    $wtd = Wa_template_Default::find(1);
                    $h = Wa_template::create([
                        'member_id' => $m->id,
                        'beli' => $wtd->beli,
                        'daftar' => $wtd->daftar,
                        'kontak' => $wtd->kontak,


                    ]);
                    $bd = BannerDefault::first();
                    $b = Banner::create([
                        'member_id' => $m->id,
                        'judul' => $banner->judul,
                        'sub_judul1' => $banner->sub_judul1,
                        'sub_judul2' => $banner->sub_judul2,
                        'tombol' => $banner->tombol,
                        'link' => $banner->link,
                        'background' => $banner->background,
                        'gambar' => $banner->gambar,
                    ]);
                    $des = "Input Data Member, ID Member " . $req->id . " Nama Member " . $req->nama . "/" . $req->member_id;
                    $a_data = array(
                        session('backend_user_id'), request()->url(),
                        request()->headers->get('referer'),
                        $_SERVER['REMOTE_ADDR'],
                        $des,
                    );
                    save_event_log_admin($a_data);
                    return redirect()->back()->with(['message' => 'Data Member berhasil diinput', 'alert' => 'success']);
                } else {
                    return redirect()->back()->with(['message' => 'Data Member gagal diinput', 'alert' => 'error']);
                }
            }
        }
    }
    public function update(Request $request)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if (session('backend_akses') < 3) {

            if (!empty($request->id)) {
                $validasi = $request->validate([
                    'edit_uid' => 'required',
                    'edit_nama' => 'required',
                    'edit_telp' => 'required',
                    'edit_email' => 'required',
                    'edit_akses' => 'required',


                ]);

                if ($validasi) {

                    $hsl = Member::where('id', $request->id)
                        ->update([
                            'uid' => $request->edit_uid,
                            'nama' => $request->edit_nama,
                            'telp' => $request->edit_telp,
                            'email' => $request->edit_email,
                            'akses' => $request->edit_akses,

                        ]);
                    if ($hsl) {
                        return redirect()->back()->with(['message' => 'Data Berhasil diubah', 'alert' => 'success']);
                    } else {
                        return redirect()->back()->with(['message' => 'Data gagal diubah', 'alert' => 'danger']);
                    }
                } else {
                    return redirect()->back()->with(['message' => 'Data yang diubah belum lengkap ', 'alert' => 'danger']);
                }
            } else {
                return redirect()->back()->with(['message' => 'Data yang diubah belum lengkap,idnya kosong ', 'alert' => 'danger']);
            }
        }
    }
    public function create(Request $request)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if (session('backend_akses') < 3) {

            $validasi = $request->validate([
                'uid' => 'required',
                'pwd' => 'required',
                'nama' => 'required',
                'telp' => 'required',
                'email' => 'required'
            ]);
            if ($validasi) {
                $foto = 'images/no-pic.jpg';

                $hsl = Member::create([
                    'uid' => $request->uid,
                    'pwd' => $request->pwd,
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'telp' => $request->telp,
                    'foto' => $foto
                ]);
                if ($hsl) {
                    return redirect()->back()->with(['message' => 'Data Berhasil Ditambahkan ', 'alert' => 'success']);
                } else {
                    return redirect()->back()->with(['message' => 'Data gagal ditambahkan', 'alert' => 'danger']);
                }
            } else {
                return redirect()->back()->with(['message' => 'Data belum lengkap', 'alert' => 'danger']);
            }
        }
    }
    public function member_bisnis(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        session(['member_id' => $req->id]);
        session(['login_sukses' => true]);
        $ket = "Accessed By Backend (" . session('backend_username') . "/" . session('backend_nama') . ")";
        $a_data = array(
            session('backend_user_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], $ket,
        );
        save_event_log_admin($a_data);
        $datas = Bisnis::where('member_id', session('backend_member_id'))->get();
        return view('admin.bisnis', compact('datas'));
    }
    public function member_produk(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        session(['member_id' => $req->id]);
        session(['login_sukses' => true]);
        $ket = "Accessed By Backend (" . session('backend_username') . "/" . session('backend_nama') . ")";
        $a_data = array(
            session('backend_user_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], $ket,
        );
        save_event_log_admin($a_data);
        $bisnis = Bisnis::where('member_id', session('backend_member_id'))->get();
        $datas = DB::select('select a.id as id,bisnis_id,nama,nama_brg,a.slug,a.harga
        ,a.foto,a.keterangan_singkat from produk a inner join bisnis b on a.bisnis_id=b.id where a.member_id=? and b.member_id=? order by a.id desc ', [session('backend_member_id'), session('backend_member_id')]);
        return view('admin.produk', compact('datas', 'bisnis'));
    }
    public function member_banner(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        session(['member_id' => $req->id]);
        session(['login_sukses' => true]);
        $ket = "Accessed By Backend (" . session('backend_username') . "/" . session('backend_nama') . ")";
        $a_data = array(
            session('backend_user_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], $ket,
        );
        save_event_log_admin($a_data);
        $data = Banner::where('member_id', session('backend_member_id'))->get();

        return view('admin.banner', compact('data'));
    }
    public function member_bank(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        session(['member_id' => $req->id]);
        session(['login_sukses' => true]);
        $ket = "Accessed By Backend (" . session('backend_username') . "/" . session('backend_nama') . ")";
        $a_data = array(
            session('backend_user_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], $ket,
        );
        save_event_log_admin($a_data);
        $banks = Bank_member::where('member_id', session('backend_member_id'))->get();
        return view('admin.bank', compact('banks'));
    }
    public function member_agenda(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        session(['member_id' => $req->id]);
        session(['login_sukses' => true]);
        $ket = "Accessed By Backend (" . session('backend_username') . "/" . session('backend_nama') . ")";
        $a_data = array(
            session('backend_user_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], $ket,
        );
        save_event_log_admin($a_data);
        $data = Agenda::where('member_id', session('backend_member_id'))->get();
        return view('admin.agenda', compact('data'));
    }
    public function member_photo(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        session(['member_id' => $req->id]);
        session(['login_sukses' => true]);
        $ket = "Accessed By Backend (" . session('backend_username') . "/" . session('backend_nama') . ")";
        $a_data = array(
            session('backend_user_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], $ket,
        );
        save_event_log_admin($a_data);
        $data = Gallery_photo::where('member_id', session('backend_member_id'))->get();
        return view('admin.photo', compact('data'));
    }
    public function member_video(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        session(['member_id' => $req->id]);
        session(['login_sukses' => true]);
        $ket = "Accessed By Backend (" . session('backend_username') . "/" . session('backend_nama') . ")";
        $a_data = array(
            session('backend_user_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], $ket,
        );
        save_event_log_admin($a_data);
        $data = Youtube::where('member_id', session('backend_member_id'))->get();
        return view('admin.video', compact('data'));
    }
    public function member_ubah_password(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $member_id = $req->id;

        return view('backend.ubah_password_member', compact('member_id'));
    }
    public function proses_ubah_password_member(Request $req)
    {
        $req->validate([
            'password' => 'min:6|required_with:password1|same:password1',
            'password1' => 'required|min:6',
            'id' => 'required'
        ]);
        $hsl = Member::where('id', $req->id)->update([
            'password' => bcrypt($req->password)
        ]);
        if ($hsl) {
            $ket = "Change Password Accessed By Backend (" . session('backend_username') . "/" . session('backend_nama') . ")";
            $a_data = array(
                session('backend_user_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], $ket,
            );
            save_event_log_admin($a_data);
            return  redirect()->back()->with(['message' => 'Password Berhasil diubah', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Password Gagal diubah', 'alert' => 'error']);
        }
    }
    public function member_profil(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        session(['member_id' => $req->id]);
        session(['login_sukses' => true]);
        $ket = "Accessed By Backend (" . session('backend_username') . "/" . session('backend_nama') . ")";
        $a_data = array(
            session('backend_user_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], $ket,
        );
        save_event_log_admin($a_data);
        $profil = Member::find($req->id);
        $kartu_nama = Kartu_nama::all();
        $themes = Themes::all();
        $province = Province::all();
        $city = City::where('province_id', $profil->propinsi)->get();
        $subdistrict = Subdistrict::where('city_id', $profil->kota)->get();
        return view('admin.profile', compact('profil', 'themes', 'kartu_nama', 'province', 'city', 'subdistrict'));
    }
    public function member_testimoni(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        session(['member_id' => $req->id]);
        session(['login_sukses' => true]);
        $ket = "Accessed By Backend (" . session('backend_username') . "/" . session('backend_nama') . ")";
        $a_data = array(
            session('backend_user_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], $ket,
        );
        save_event_log_admin($a_data);
        $produk = Produk::where('member_id', session('backend_member_Id'))->get();
        $data = Testimoni::select('testimoni.*', 'produk.nama_brg')->leftjoin('produk', 'produk.id', '=', 'testimoni.produk_id')
            ->where('testimoni.member_id', session('backend_member_id'))->get();
        return view('admin.testimoni', compact('data', 'produk'));
    }
    public function member_wa_template(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        session(['member_id' => $req->id]);
        session(['login_sukses' => true]);
        $ket = "Accessed By Backend (" . session('backend_username') . "/" . session('backend_nama') . ")";
        $a_data = array(
            session('backend_user_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], $ket,
        );
        save_event_log_admin($a_data);
        $data = Wa_template::where('member_id', session('backend_member_id'))->first();
        if ($data) {
            $kontak = $data->kontak;
            $daftar = $data->daftar;
            $beli = $data->beli;
        } else {
            $kontak = "";
            $daftar = "";
            $beli = "";
        }

        return view('admin.wa_templates', compact('beli', 'daftar', 'kontak'));
    }
    public function member_welcome(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        session(['member_id' => $req->id]);
        session(['login_sukses' => true]);
        $ket = "Accessed By Backend (" . session('backend_username') . "/" . session('backend_nama') . ")";
        $a_data = array(
            session('backend_user_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], $ket,
        );
        save_event_log_admin($a_data);
        $judul = '';
        $sub_judul = '';
        $welcome_note = '';
        $wn = welcome_note::where('member_id', session('backend_member_id'))->get();
        if (count($wn) > 0) {
            $judul = $wn[0]->judul;
            $sub_judul = $wn[0]->sub_judul;
            $welcome_note = $wn[0]->welcome_note;
        }
        $profil = session('backend_data');

        return view('admin.welcome_note', compact('judul', 'sub_judul', 'welcome_note'));
    }

    public function import_member1(Request $req)
    {
        //Import hasil dari proses registrasi Mitra di Mitsal
        try {

            $app = App_setting::first();
            if (empty($req->id)) {
                echo "Nomor Mitra belum diisi";
                exit;
            }
            $url = $app->url_import;
            $useradmin = '81';
            $password = $req->p;
            //$pass = '82118d2b07f7b38e7a9949588a58edc0';
            $response = Http::get($url, [
                'id' => $req->id,
                'pass' => $req->pass,

            ]);


            $data = $response->json();
            $x = 0;
            $y = 0;
            if ($data != null) {

                foreach ($data as $req) {
                    $moto = $app->moto;

                    //"Hidup Mulia Atau Mati Syahid";
                    if (count($data) > 0) {
                        $cek_username = Member::where('username', $req['member_id'])->first();
                        if ($cek_username) {
                            echo 'Username ' . $req['member_id'] . ' sudah terdaftar';
                            exit;
                        } else {

                            $pekerjaan = $app->job;
                            $jabatan = $app->job_title;
                            $tentang_web = $app->about_web;
                            $propinsi = $app->province_default;
                            if (!empty($req['propinsi'])) {

                                $dt_prop = Province::where('province', $req['propinsi'])->first();
                                if ($dt_prop) {
                                    $propinsi = $dt_prop->id;
                                }
                            }
                            $kota = $app->city_default;
                            if (!empty($req['kota'])) {

                                $dt_city = City::where('province_id', $propinsi)->where('city_name', ucwords($req['kota']))->first();
                                if ($dt_city) {
                                    $kota = $dt_city->city_id;
                                }
                            }
                            $kecamatan = $app->subdistrict;

                            if (!empty($req['kecamatan'])) {

                                $dt_kec = Subdistrict::where('province_id', $propinsi)->where('subdistrict_name', ucwords($req['kecamatan']))->first();
                                if ($dt_kec) {
                                    $kecamatan = $dt_kec->subdistrict_id;
                                }
                            } else {
                                if (!empty($kota) && !empty($propinsi)) {
                                    $dt_kec = Subdistrict::where('province_id', $propinsi)->where('city_id', $kota)->first();
                                    if ($dt_kec) {
                                        $kecamatan = $dt_kec->subdistrict_id;
                                    }
                                }
                            }

                            if (!empty($req['kelurahan'])) {
                                $kelurahan = $req['kelurahan'];
                            } else {
                                $kelurahan = '';
                            }
                            if (substr($req['telp'], 0, 2) != '62') {
                                $wa = "62" . substr($req['telp'], 1);
                            } else {
                                $wa = $req['telp'];
                            }
                            $hsl = Member::create([
                                'username' => $req['member_id'],
                                'password' => bcrypt($password),
                                'member_id' => $req['hu_id'],
                                'sponsor' => $req['sponsor'],
                                'nama' => $req['nama'],
                                'ktp' => $req['ktp'],
                                'alamat' => $req['alamat'],
                                'kelurahan' => $kelurahan,
                                'kecamatan' => $kecamatan,
                                'kota' => $kota,
                                'propinsi' => $propinsi,
                                'negara' => 'Indonesia',
                                'kd_pos' => $req['kd_pos'],
                                'email' => $req['email'],
                                'telp' => $req['telp'],
                                'hp' => $req['telp'],
                                'wa' => $wa,
                                'ig' => '',
                                'fb' => $req['fb'],
                                'twitter' => '',
                                'tube' => '',
                                'website' => $app->app_domain,
                                'map' => '',
                                'latitude' => 0,
                                'longitude' => 0,
                                'moto' => $moto,
                                'perusahaan' => $app->company_name,
                                'jabatan' => $jabatan,
                                'pekerjaan' => $pekerjaan,
                                'themes_id' => $app->themes_default,
                                'kartu_nama_id' => $app->card_default,
                                'kategori_pekerjaan' => 2,
                                'sub_kategori_pekerjaan' => 21,
                                'tentang_web' => $tentang_web,
                                'foto' => 'images/no-pic.jpg',
                                'logo' => 'images/logo.png',
                                'logo_kecil' => 'images/logo-kecil.png',
                                'tgl_daftar' => date('Y-m-d h:i:s'),
                                'tgl_input' => date('Y-m-d h:i:s'),
                                'petugas_input' => $useradmin,

                            ]);

                            if ($hsl) {
                                $m = Member::where('username', $req['member_id'])->first();
                                $wtd = Wa_template_Default::find(1);
                                $h = Wa_template::create([
                                    'member_id' => $m->id,
                                    'beli' => $wtd->beli,
                                    'daftar' => $wtd->daftar,
                                    'kontak' => $wtd->kontak,


                                ]);
                                $bd = BannerDefault::first();

                                $b = Banner::create([
                                    'member_id' => $m->id,
                                    'judul' => 'Sukses Hanya Dari Rumah',
                                    'sub_judul1' => 'Apa Bisa Sukses Hanya Dari Rumah saja?',
                                    'sub_judul2' => 'Ya kita bisa sukses hanya dari rumah saja tampa mengeluarkan biaya besar',
                                    'tombol' => 'Mulai',
                                    'link' => '#about',
                                    'background' => '',
                                    'gambar' => '',
                                ]);

                                $x++;
                            } else {
                                $y++;
                            }
                        }
                    }
                }
                $msg = 'Proses registrasi di ' . $app->app_name . ' sukses, berikut link Profil Bisnisnya : \r\n
                            ' . $app->app_url . '/' . $req['member_id'] . '\r\n
                            Username : ' . $req['member_id'] . '\r\n
                            Password : ' . $password;
            } else {
                $msg = "Proses Import Gagal, Data di import tidak ditemukan";
            }

            return $msg;
        } catch (Exception $e) {
            echo 'Proses Import Gagal ' . $e->getMessage();
        }
    }
    public function import_member2(Request $req)
    {
        //Proses Import Hasil RO Paket Profil Bisnisi

        try {

            $app = App_setting::first();
            if (empty($req->id)) {
                echo "Nomor Mitra belum diisi";
                exit;
            }
            $url = $app->url_import;
            // $url = 'https://shadnework.com/back-office/import_ro_mysuperboss.php';
            $useradmin = '82';
            $password = $req->p;
            //$pass = '82118d2b07f7b38e7a9949588a58edc0';
            $response = Http::get($url, [
                'id' => $req->id,
                'pass' => $req->pass,

            ]);

            $username = $req->u;
            $data = $response->json();
            $x = 0;
            $y = 0;
            if ($data != null) {

                foreach ($data as $req) {
                    $moto = $app->moto;
                    if (empty($username)) {
                        $username = $req['member_id'];
                    }
                    //"Hidup Mulia Atau Mati Syahid";
                    if (count($data) > 0) {
                        $cek_username = Member::where('username', $username)->first();
                        if ($cek_username) {
                            echo 'Username ' . $username . ' sudah terdaftar';
                            exit;
                        } else {

                            $pekerjaan = $app->job;
                            $jabatan = $app->job_title;
                            $tentang_web = $app->about_web;
                            $propinsi = $app->province_default;
                            if (!empty($req['propinsi'])) {

                                $dt_prop = Province::where('province', $req['propinsi'])->first();
                                if ($dt_prop) {
                                    $propinsi = $dt_prop->id;
                                }
                            }
                            $kota = $app->city_default;
                            if (!empty($req['kota'])) {

                                $dt_city = City::where('province_id', $propinsi)->where('city_name', ucwords($req['kota']))->first();
                                if ($dt_city) {
                                    $kota = $dt_city->city_id;
                                }
                            }
                            $kecamatan = $app->subdistrict;

                            if (!empty($req['kecamatan'])) {

                                $dt_kec = Subdistrict::where('province_id', $propinsi)->where('subdistrict_name', ucwords($req['kecamatan']))->first();
                                if ($dt_kec) {
                                    $kecamatan = $dt_kec->subdistrict_id;
                                }
                            } else {
                                if (!empty($kota) && !empty($propinsi)) {
                                    $dt_kec = Subdistrict::where('province_id', $propinsi)->where('city_id', $kota)->first();
                                    if ($dt_kec) {
                                        $kecamatan = $dt_kec->subdistrict_id;
                                    }
                                }
                            }

                            if (!empty($req['kelurahan'])) {
                                $kelurahan = $req['kelurahan'];
                            } else {
                                $kelurahan = '';
                            }
                            if (substr($req['telp'], 0, 2) != '62') {
                                $wa = "62" . substr($req['telp'], 1);
                            } else {
                                $wa = $req['telp'];
                            }
                            $hsl = Member::create([
                                'username' => $username,
                                'password' => bcrypt($password),
                                'member_id' => $req['hu_id'],
                                'sponsor' => $req['sponsor'],
                                'nama' => $req['nama'],
                                'ktp' => $req['ktp'],
                                'alamat' => $req['alamat'],
                                'kelurahan' => $kelurahan,
                                'kecamatan' => $kecamatan,
                                'kota' => $kota,
                                'propinsi' => $propinsi,
                                'negara' => 'Indonesia',
                                'kd_pos' => $req['kd_pos'],
                                'email' => $req['email'],
                                'telp' => $req['telp'],
                                'hp' => $req['telp'],
                                'wa' => $wa,
                                'ig' => '',
                                'fb' => $req['fb'],
                                'twitter' => '',
                                'tube' => '',
                                'website' => $app->app_domain,
                                'map' => '',
                                'latitude' => 0,
                                'longitude' => 0,
                                'moto' => $moto,
                                'perusahaan' => $app->company_name,
                                'jabatan' => $jabatan,
                                'pekerjaan' => $pekerjaan,
                                'themes_id' => $app->themes_default,
                                'kartu_nama_id' => $app->card_default,
                                'kategori_pekerjaan' => 2,
                                'sub_kategori_pekerjaan' => 21,
                                'tentang_web' => $tentang_web,
                                'foto' => 'images/no-pic.jpg',
                                'logo' => 'images/logo.png',
                                'logo_kecil' => 'images/logo-kecil.png',
                                'tgl_daftar' => date('Y-m-d h:i:s'),
                                'tgl_input' => date('Y-m-d h:i:s'),
                                'petugas_input' => $useradmin,

                            ]);

                            if ($hsl) {
                                $m = Member::where('username', $username)->first();
                                $wtd = Wa_template_Default::find(1);
                                $h = Wa_template::create([
                                    'member_id' => $m->id,
                                    'beli' => $wtd->beli,
                                    'daftar' => $wtd->daftar,
                                    'kontak' => $wtd->kontak,


                                ]);
                                $bd = BannerDefault::first();

                                $b = Banner::create([
                                    'member_id' => $m->id,
                                    'judul' => 'Sukses Hanya Dari Rumah',
                                    'sub_judul1' => 'Apa Bisa Sukses Hanya Dari Rumah saja?',
                                    'sub_judul2' => 'Ya kita bisa sukses hanya dari rumah saja tampa mengeluarkan biaya besar',
                                    'tombol' => 'Mulai',
                                    'link' => '#about',
                                    'background' => '',
                                    'gambar' => '',
                                ]);

                                $x++;
                            } else {
                                $y++;
                            }
                        }
                    }
                }
                $msg = 'Proses registrasi di ' . $app->app_name . ' sukses, berikut link Profil Bisnisnya : \r\n
                            ' . $app->app_url . '/' . $username . '\r\n
                            Username : ' . $username . '\r\n
                            Password : ' . $password;
            } else {
                $msg = "Proses Import Gagal, Data di import tidak ditemukan";
            }

            return $msg;
        } catch (Exception $e) {
            echo 'Proses Import Gagal ' . $e->getMessage();
        }
    }
    public function preview_import_member(Request $req)
    {
        try {
            if (empty(session('backend_user_id'))) {
                return redirect(env('APP_URL') . '/backend');
            }
            if (session('backend_akses') < 3) {
                $app = App_setting::first();
                $banner = BannerDefault::first();
                $id = $req->id;
                $url = env('URL_IMPORT');
                $response = Http::get($url, [
                    'id' => $id,
                    'pass' => '82118d2b07f7b38e7a9949588a58edc0',
                ]);
                $data = $response->json();
                if ($data != null) {

                    foreach ($data as $req) {
                    }
                    $cek_username = Member::where('member_id', $id)->first();
                    if ($cek_username) {
                        $pesan = 'Username ' . $req['member_id'] . ' sudah terdaftar';
                        return redirect('/backend/import')->with(['message' => $pesan, 'alert' => 'danger']);
                    } else {

                        if (!empty($req['propinsi'])) {

                            $dt_prop = Province::where('province', $req['propinsi'])->first();
                            if ($dt_prop) {
                                $propinsi = $dt_prop->id;
                                if (!empty($req['kota'])) {

                                    $dt_city = City::where('province_id', $propinsi)->where('city_name', ucwords($req['kota']))->first();
                                    if ($dt_city) {
                                        $kota = $dt_city->city_id;
                                    } else {
                                        $kota = '';
                                    }
                                }

                                if (!empty($req['kecamatan'])) {

                                    $dt_kec = Subdistrict::where('province_id', $propinsi)->where('subdistrict_name', ucwords($req['kecamatan']))->first();
                                    if ($dt_kec) {
                                        $kecamatan = $dt_kec->subdistrict_id;
                                    } else {
                                        $kecamatan = '';
                                    }
                                } else {
                                    if (!empty($kota) && !empty($propinsi)) {
                                        $dt_kec = Subdistrict::where('province_id', $propinsi)->where('city_id', $kota)->first();
                                        if ($dt_kec) {
                                            $kecamatan = $dt_kec->subdistrict_id;
                                        } else {
                                            $kecamatan = '';
                                        }
                                    } else {
                                        $propinsi = '';
                                        $kota = '';
                                    }
                                }
                            } else {
                                $propinsi = '';
                                return redirect()->back()->with(['message' => 'Propinsi tidak ditemukan', 'alert' => 'danger']);
                            }
                        }

                        if (!empty($req['kelurahan'])) {
                            $kelurahan = $req['kelurahan'];
                        } else {
                            $kelurahan = '';
                        }
                        if (substr($req['telp'], 0, 2) != '62') {
                            $wa = "62" . substr($req['telp'], 1);
                        } else {
                            $wa = $req['telp'];
                        }
                        $allprovince = Province::all();
                        $allcity = City::all();
                        $allsubdis = Subdistrict::all();
                        return view('backend.preview_import_member', compact('data', 'propinsi', 'kota', 'kecamatan', 'kelurahan', 'wa', 'allprovince', 'allcity', 'allsubdis'));
                    }
                } else {
                    $pesan = "Data yang akan diimport kosong";
                    return redirect('/backend/import')->with(['message' => $pesan, 'alert' => 'danger']);
                }
            }
        } catch (Exception $e) {
            $pesan = "Proses Import Gagal " . $e->getMessage();
            return redirect('/backend/import')->with(['message' => $pesan, 'alert' => 'danger']);
        }
    }
    public function import_member(Request $req)
    {

        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if (session('backend_akses') < 3) {
            $app = App_setting::first();
            $banner = BannerDefault::first();
            $id = $req->hu_id;
            $moto = $app->moto;
            $cek_username = Member::where('username', $req->member_id)->first();
            if ($cek_username) {
                $pesan = 'Username ' . $req->member_id . ' sudah terdaftar';
                return redirect('/backend/import')->with(['message' => $pesan, 'alert' => 'danger']);
            } else {

                $pekerjaan = $app->job;
                $jabatan = $app->job_title;
                $tentang_web = $app->abut_web;
                $perusahaan = $app->company_name;

                $hsl = Member::create([
                    'username' => $req->member_id,
                    'password' => bcrypt(trim($req->member_id) . date('Y')),
                    'member_id' => $req->hu_id,
                    'sponsor' => $req->sponsor,
                    'nama' => $req->nama,
                    'ktp' => substr($req->ktp, 0, 16),
                    'alamat' => $req->alamat,
                    'kelurahan' => $req->kelurahan,
                    'kecamatan' => $req->kecamatan,
                    'kota' => $req->kota,
                    'propinsi' => $req->propinsi,
                    'negara' => 'Indonesia',
                    'kd_pos' => $req->kd_pos,
                    'email' => $req->email,
                    'telp' => $req->telp,
                    'hp' => $req->telp,
                    'wa' => $req->wa,
                    'ig' => '',
                    'fb' => $req->fb,
                    'twitter' => '',
                    'tube' => '',
                    'website' => $app->app_domain,
                    'map' => '',
                    'latitude' => 0,
                    'longitude' => 0,
                    'moto' => $moto,
                    'perusahaan' => $perusahaan,
                    'jabatan' => $jabatan,
                    'pekerjaan' => $pekerjaan,
                    'themes_id' => $app->themes_default,
                    'kartu_nama_id' => $app->card_default,
                    'kategori_pekerjaan' => 2,
                    'sub_kategori_pekerjaan' => 21,
                    'tentang_web' => $tentang_web,
                    'foto' => 'images/no-pic.jpg',
                    'logo' => 'images/logo.png',
                    'logo_kecil' => 'images/logo-kecil.png',
                    'tgl_daftar' => date('Y-m-d h:i:s'),
                    'tgl_input' => date('Y-m-d h:i:s'),
                    'petugas_input' => session('backend_user_id'),






                ]);
                if ($hsl) {
                    $m = Member::where('username', $req->member_id)->first();
                    $wtd = Wa_template_Default::find(1);
                    $h = Wa_template::create([
                        'member_id' => $m->id,
                        'beli' => $wtd->beli,
                        'daftar' => $wtd->daftar,
                        'kontak' => $wtd->kontak,


                    ]);
                    $bd = BannerDefault::first();

                    $b = Banner::create([
                        'member_id' => $m->id,
                        'judul' => $banner->judul,
                        'sub_judul1' => $banner->sub_judul1,
                        'sub_judul2' => $banner->sub_judul2,
                        'tombol' => $banner->tombol,
                        'link' => $banner->link,
                        'background' => $banner->background,
                        'gambar' => $banner->gambar,
                    ]);
                    $des = "Input Data Member, ID Member " . $req->hu_id . " Nama Member " . $req->nama . "/" . $req->member_id;
                    $a_data = array(
                        session('backend_user_id'), request()->url(),
                        request()->headers->get('referer'),
                        $_SERVER['REMOTE_ADDR'],
                        $des,
                    );
                    save_event_log_admin($a_data);
                    $pesan = 'Proses import sukses, berikut link profilmembernya : <br>
                        <a href="' . $app->app_url . '/' . $req->member_id . '">' . $app->app_url . '/' . $req->member_id . '</a><br>
                        Username : ' . $req->member_id . '<br>
                        Password : ' . $req->member_id . '2021';
                    return redirect('/backend/import')->with(['message' => $pesan, 'alert' => 'success']);
                } else {
                    $pesan = 'Proses Import Error';
                    return redirect()->back()->with(['message' => $pesan, 'alert' => 'danger']);
                }
            }
        }
    }
    public function import_member_view()
    {
        return view('backend.import_member');
    }

    public function import_member_satu(Request $req)
    {

        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if (session('backend_akses') < 3) {
            $app = App_setting::first();
            $banner = BannerDefault::first();
            $id = $req->id;
            $url = env('URL_IMPORT');
            $response = Http::get($url, [
                'id' => $id,
                'pass' => '82118d2b07f7b38e7a9949588a58edc0',

            ]);
            $data = $response->json();
            foreach ($data as $req) {
            }
            $moto = $app->moto;
            if (count($data) > 0) {
                $cek_username = Member::where('username', $req['member_id'])->first();
                if ($cek_username) {
                    $pesan = 'Username ' . $req['member_id'] . ' sudah terdaftar';
                    return redirect()->back()->with(['message' => $pesan, 'alert' => 'danger']);
                } else {

                    $pekerjaan = $app->job;
                    $jabatan = $app->job_title;
                    $tentang_web = $app->abut_web;
                    $propinsi = $app->province_default;
                    $kecamatan = $app->subdistrict;
                    $kota = $app->city_default;
                    $perusahaan = $app->company_name;
                    if (!empty($req['propinsi'])) {

                        $dt_prop = Province::where('province', $req['propinsi'])->first();
                        if ($dt_prop) {
                            $propinsi = $dt_prop->id;
                        }
                    }
                    if (!empty($req['kota'])) {

                        $dt_city = City::where('province_id', $propinsi)->where('city_name', ucwords($req['kota']))->first();
                        if ($dt_city) {
                            $kota = $dt_city->city_id;
                        }
                    }

                    if (!empty($req['kecamatan'])) {

                        $dt_kec = Subdistrict::where('province_id', $propinsi)->where('subdistrict_name', ucwords($req['kecamatan']))->first();
                        if ($dt_kec) {
                            $kecamatan = $dt_kec->subdistrict_id;
                        }
                    } else {
                        if (!empty($kota) && !empty($propinsi)) {
                            $dt_kec = Subdistrict::where('province_id', $propinsi)->where('city_id', $kota)->first();
                            if ($dt_kec) {
                                $kecamatan = $dt_kec->subdistrict_id;
                            }
                        }
                    }

                    if (!empty($req['kelurahan'])) {
                        $kelurahan = $req['kelurahan'];
                    } else {
                        $kelurahan = '';
                    }
                    $hsl = Member::create([
                        'username' => $req['member_id'],
                        'password' => bcrypt(trim($req['member_id']) . date('Y')),
                        'member_id' => $req['hu_id'],
                        'sponsor' => $req['sponsor'],
                        'nama' => $req['nama'],
                        'ktp' => substr($req['ktp'], 0, 16),
                        'alamat' => $req['alamat'],
                        'kelurahan' => $kelurahan,
                        'kecamatan' => $kecamatan,
                        'kota' => $kota,
                        'propinsi' => $propinsi,
                        'negara' => 'Indonesia',
                        'kd_pos' => $req['kd_pos'],
                        'email' => $req['email'],
                        'telp' => $req['telp'],
                        'hp' => $req['telp'],
                        'wa' => $req['telp'],
                        'ig' => '',
                        'fb' => $req['fb'],
                        'twitter' => '',
                        'tube' => '',
                        'website' => $app->app_domain,
                        'map' => '',
                        'latitude' => 0,
                        'longitude' => 0,
                        'moto' => $moto,
                        'perusahaan' => $perusahaan,
                        'jabatan' => $jabatan,
                        'pekerjaan' => $pekerjaan,
                        'themes_id' => $app->themes_default,
                        'kartu_nama_id' => $app->card_default,
                        'kategori_pekerjaan' => 2,
                        'sub_kategori_pekerjaan' => 21,
                        'tentang_web' => $tentang_web,
                        'foto' => 'images/no-pic.jpg',
                        'logo' => 'images/logo.png',
                        'logo_kecil' => 'images/logo-kecil.png',
                        'tgl_daftar' => date('Y-m-d h:i:s'),
                        'tgl_input' => date('Y-m-d h:i:s'),
                        'petugas_input' => session('backend_user_id'),






                    ]);
                    if ($hsl) {
                        $m = Member::where('username', $req['member_id'])->first();
                        $wtd = Wa_template_Default::find(1);
                        $h = Wa_template::create([
                            'member_id' => $m->id,
                            'beli' => $wtd->beli,
                            'daftar' => $wtd->daftar,
                            'kontak' => $wtd->kontak,


                        ]);
                        $bd = BannerDefault::first();

                        $b = Banner::create([
                            'member_id' => $m->id,
                            'judul' => $banner->judul,
                            'sub_judul1' => $banner->sub_judul1,
                            'sub_judul2' => $banner->sub_judul2,
                            'tombol' => $banner->tombol,
                            'link' => $banner->link,
                            'background' => $banner->background,
                            'gambar' => $banner->gambar,
                        ]);
                        $des = "Input Data Member, ID Member " . $req['hu_id'] . " Nama Member " . $req['nama'] . "/" . $req['member_id'];
                        $a_data = array(
                            session('backend_user_id'), request()->url(),
                            request()->headers->get('referer'),
                            $_SERVER['REMOTE_ADDR'],
                            $des,
                        );
                        save_event_log_admin($a_data);
                        $pesan = 'Proses import sukses, berikut link profilmembernya : <br>
                        <a href="' . $app->app_url . '/' . $req['member_id'] . '">' . $app->app_url . '/' . $req['member_id'] . '</a><br>
                        Username : ' . $req['member_id'] . '<br>
                        Password : ' . $req['member_id'] . '2021';
                        return redirect()->back()->with(['message' => $pesan, 'alert' => 'success']);
                    } else {
                        $pesan = 'Proses Import Error';
                        return redirect()->back()->with(['message' => $pesan, 'alert' => 'danger']);
                    }
                }
            }
        }
    }
    public function cpanel(Request $req)
    {
        if (!empty($req->id)) {
            $admin_data = Member::where('username', $req->id)->first();
            session(['login_sukses' => true]);
            session(['admin_member_id' => $admin_data->id]);
            session(['admin_username' => $req->id]);

            session(['admin_photo' => $admin_data->foto]);
            session(['admin_logo' => $admin_data->logo]);
            session(['admin_level' => $admin_data->level]);
            session(['admin_logo_kecil' => $admin_data->logo_kecil]);
            session(['admin_admin_data' => $admin_data]);
            $bisnis = $admin_data->bisnis;
            session(['admin_bisnis' => $bisnis]);
            session(['admin_data' => $admin_data]);
            $a_data = array(
                session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], '',
            );
            save_event_log_member($a_data);
            return view('admin.dashboard', compact('admin_data', 'bisnis'));


            $admin_data = session('admin_data');
            $des = "";
            $a_data = array(
                session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'],
                $des,
            );
            save_event_log_member($a_data);
            $bisnis = session('admin_bisnis');
            return view('admin.dashboard', compact('admin_data', 'bisnis'));
        }
    }
}
