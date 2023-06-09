<?php

namespace App\Http\Controllers;

use App\Banner;
use App\City;
use App\KategoriPekerjaan;
use App\Member;
use App\Province;
use App\Subdistrict;
use App\SubKategoriPekerjaan;
use App\Token;
use App\Bill_token;
use App\Bank;
use App\Wa_template;
use App\Wa_template_Default;
use Illuminate\Http\Request;

class registerController extends Controller
{

    public function index()
    {
        if (session('blocked') == 0) {

            if (empty(session('counter_login'))) {
                session(['counter_login' => 0]);
            }

            return view('register.verify');
        } else {
            return view('admin.login-blocked');
        }
    }
    public function login(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'g-recaptcha-response' => 'required|captcha'
        ]);
        $token = $request->token;
        $hsl = Token::where('token', $token)->first();
    
        if ($hsl) {
            if ($hsl->status == 1) {
                return redirect('/register/verify')->with('message', 'Token Telah digunakan ');
            }else{
                session(['token_data' => $hsl]);
                return redirect('/register');
                
            }
        } else {
            return redirect()->back()->with('message', 'Token salah ');
            $ctr_login = session('counter_login');
            $ctr_login++;
            session(['counter_login' => $ctr_login]);
            if (session('counter_login') > 5) {
                session(['blocked' => 1]);
                return view('admin.login-blocked');
            } else {
                session(['blocked' => 0]);
                return redirect('/register/verify')->with('message', 'Token salah ');
            }
        }
      
       
    }
    public function register()
    {
        if (empty(session('token_data'))) {
            return redirect('/register/verify');
        } else {
            $token = session('token_data');
            $id = session('token_data')->id;
            $pembeli = Member::where('id', session('token_data')->pembeli)->first();
            $province = Province::all();
            $city = City::all();
            $subdistrict = Subdistrict::all();
            $kategori_pekerjaan = KategoriPekerjaan::get();
            $sub_kategori_pekerjaan = SubKategoriPekerjaan::get();
            $compact = array(
                'province',
                'kategori_pekerjaan',
                'city',
                'subdistrict',
                'sub_kategori_pekerjaan',
                'pembeli'
            );
            return view('register.sign_up', compact($compact));
        }
    }
    public function create(Request $req)
    {
        if (empty(session('token_data'))) {
            return redirect(env('APP_URL') . '/register/verify');
        }
        $id = session('token_data')->id;
        $id_referal = session('token_data')->pembeli;
        $token = session('token_data')->token;
        $level = session('token_data')->type;
        if ($req) {
            $hsl = Member::create([
                'level' => $level,
                'username' => $req->username,
                'password' => bcrypt($req->password),
                'member_id' => $req->member_id,
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
                'moto' => $req->moto,
                'perusahaan' => $req->perusahaan,
                'jabatan' => $req->jabatan,
                'pekerjaan' => $req->pekerjaan,
                'tentang_web' => $req->tentang_web,
                'map' => $req->map,
                'themes_id' => '13',
                'kartu_nama_id' => '1',
                'kategori_pekerjaan' => $req->kategori_pekerjaan,
                'sub_kategori_pekerjaan' => $req->sub_kategori_pekerjaan,
                'id_referal' => $id_referal,
                'token' => $token,
                'foto' => 'images/no-pic.jpg',
                'logo' => 'images/logo.png',
                'logo_kecil' => 'images/logo-kecil.png',
                'tgl_daftar' => date('Y-m-d h:i:s'),
                'tgl_input' => date('Y-m-d h:i:s'),
                'petugas_input' => session('backend_user_id'),
            ]);
            $update = Token::find($id)->update([
                'status' => '2',
                'terpakai' => $req->username,
                'tgl_dipakai' => date('Y-m-d h:i:s')
            ]);

            if ($hsl && $update) {
                $m = Member::where('username', $req->username)->first();
                $wtd = Wa_template_Default::find(1);
                $h = Wa_template::create([
                    'member_id' => $m->id,
                    'beli' => $wtd->beli,
                    'daftar' => $wtd->daftar,
                    'kontak' => $wtd->kontak,


                ]);
                $b = Banner::create([
                    'member_id' => $m->id,
                    'judul' => 'Judul Banner',
                    'sub_judul1' => 'Sub Judul Banner1',
                    'sub_judul2' => 'Sub Judul Banner2',
                    'tombol' => 'Mulai',
                    'link' => '#bisnis',
                    'gambar' => '',
                    'background' => '',

                ]);
                $req->session()->flush();
                return redirect('/c-panel')->with(['message' => 'Data Berhasil Ditambahkan ', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data gagal ditambahkan', 'alert' => 'danger']);
            }
        } else {
            return redirect()->back()->with(['message' => 'Data belum lengkap', 'alert' => 'danger']);
        }
    }
    public function option()
    {
        $getbank = Bank::all();
        return view('register.option', compact('getbank'));
    }
    public function register_common(Request $request){
        if (substr($request->phone, 0, 2) != '62') {
            $wa = "62" . substr($request->phone, 1);
        } else {
            $wa = $request->phone;
        }
        $karakter2 = 'ABCDEFGHIJKLMNOP0123456789';
        $bukti = '';
        if ($request->hasfile('bukti')) {
            $file = $request->file('bukti');
            $originName = $file->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $name = $fileName . '.' . $extension;
            $file->move(public_path() . '/strangers/', $name);
            $bukti = "strangers/$name";
        }
        $hsl =  Bill_token::create([
            'id_token' => substr(str_shuffle($karakter2), 0, 4),
            'pembeli' => $request->pembeli,
            'type' => $request->type,
            'phone' => $wa,
            'status' => 0,
            'qty' => 1,
            'bukti' => $bukti,
            'total' => $request->total,
            'tgl_beli' => date('Y-m-d h:i:s'),
        ]);
        if ($hsl) {
            return redirect()->back()->with(['message' => 'Pendaftaran Berhasil, Mohon menunggu Validasi Admin, Link akan dikirim via Whatsapp', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Pembelian Gagal, silahkan coba kembali', 'alert' => 'danger']);
        }
    }
}
