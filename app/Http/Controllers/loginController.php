<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Member;
use App\Lupa_password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{

    public function index()
    {
        if (session('blocked') == 0) {

            if (empty(session('counter_login'))) {
                session(['counter_login' => 0]);
            }

            return view('admin.login');
        } else {
            return view('admin.login-blocked');
        }
    }
    public function backend()
    {
        if (session('blocked_backend') == 0) {

            if (empty(session('counter_login_backend'))) {
                session(['counter_login_backend' => 0]);
            }
            return view('backend.login');
        } else {

            return view('admin.login-blocked');
        }
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        /*$request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
*/
        $uid = $request->username;
        $pwd = $request->password;
        $data = Member::where('username', $uid)->first();
        if ($data) {
            if (Hash::check($pwd, $data->password)) {
                session(['login_sukses' => true]);
                session(['login_sukses' => true]);
                session(['admin_member_id' => $data->id]);
                session(['admin_username' => $uid]);
                session(['admin_photo' => $data->foto]);
                session(['admin_logo' => $data->logo]);
                session(['admin_level' => $data->level]);
                session(['admin_logo_kecil' => $data->logo_kecil]);
                session(['admin_data' => $data]);
                $bisnis = $data->bisnis;
                session(['admin_bisnis' => $bisnis]);

                $a_data = array(
                    session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], '',
                );
                // dd(session('admin_data'));
                save_event_log_member($a_data);
                return view('admin.dashboard', compact('data', 'bisnis'));
            } else {
                $ctr_login = session('counter_login');
                $ctr_login++;
                session(['counter_login' => $ctr_login]);
            }
        } else {
            $ctr_login = session('counter_login');
            $ctr_login++;
            session(['counter_login' => $ctr_login]);
        }
        if (session('counter_login') > 5) {
            session(['blocked' => 1]);
            return view('admin.login-blocked');
        } else {
            session(['blocked' => 0]);
            return redirect('/c-panel')->with('message', 'Username atau Password salah ');
        }
    }

    public function login_backend(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'g-recaptcha-response' => 'required|captcha'
        ]);
        /*$request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);*/

        $uid = $request->username;
        $pwd = $request->password;
        $data = Admin::where('uid', $uid)->first();
        if ($data) {
            if (Hash::check($pwd, $data->pwd)) {
                session(['login_backend_sukses' => true]);
                session(['user_id' => $data->id]);
                session(['username' => $data->uid]);
                session(['photo' => $data->foto]);
                session(['data' => $data]);
                session(['telp' => $data->telp]);
                session(['email' => $data->email]);
                session(['akses' => $data->akses]);
                session(['nama' => $data->nama]);
                $des = "Login Backend";
                $a_data = array(
                    $data->id, request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], $des
                );
                
                save_event_log_admin($a_data);
                return view('backend.dashboard', compact('data'));
            } else {


                $ctr_login = session('counter_login_backend');
                $ctr_login++;
                session(['counter_login_backend' => $ctr_login]);

                //redirect('login')->with('message','Username atau Password salah');
            }
        } else {

            $ctr_login = session('counter_login_backend');
            $ctr_login++;
            session(['counter_login_backend' => $ctr_login]);
        }
        if (session('counter_login_backend') > 5) {
            session(['blocked_backend' => 1]);
            return view('backend.login-blocked');
        } else {
            session(['blocked_backend' => 0]);
            return redirect('/backend')->with('message', 'Username atau Password salah ');
        }
    }

    public function logout(Request $request)
    {
        $username = session('username');
        if (!empty($username)) {

            $des = "Username $username";
            $a_data = array(
                session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'],
                $des,
            );
            save_event_log_member($a_data);
        }
        $request->session()->flush();

        return redirect('/' . $username);
    }
    public function logout_backend(Request $request)
    {
        if (!empty(session('user_id'))) {

            $a_data = array(
                session('user_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], 'Log Out'
            );
            save_event_log_admin($a_data);
        }
        $request->session()->flush();
        return redirect('/backend');
    }
    public function dashboard()
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
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

    public function reset()
    {
        session(['blocked' => 0]);
        session(['counter_login' => 0]);
        return view('admin.login');
    }
    public function reset_backend()
    {
        session(['blocked_backend' => 0]);
        session(['counter_login_backend' => 0]);
        return view('backend.login');
    }
    public function lupa_password_backend(Request $req)
    {
        $req->validate([
            'username' => 'required'
        ]);
        $uid = $req->username;
        $data = Admin::select('email')->where('uid', $uid)->first();
        if ($data) {
            $email = $data->email;
            Lupa_password::where('member_id', $uid)->delete();
            DB::insert('insert into lupa_password (member_id, email,start,expired) values(?,?,now(),DATE_ADD(now(),INTERVAL 10 MINUTE))', [$uid, $email]);
            // DB::update('update lupa_password set `start`=now(),expired=DATE_ADD(now(),INTERVAL 10 MINUTE) where member_id=?', [$uid]);
            $isiemail = 'Ada permintaan perubahan password dari ' . env('APP_DOMAIN') . '<br/>
            Silahkan Klik link dibawah ini, untuk mengganti  password Backend Anda<br/>
            <a href="' . env('APP_URL') . '/ubah_password_backend/' . md5($uid . $email) . '">Ubah Password</a>';
            $headers  = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
            $headers .= 'From: ' . env('APP_NAME') . ' <' . env('APP_NAME') . '@' . strtolower(env('APP_DOMAIN')) . '>' . "\r\n";
            mail($email, "Proses Lupa Password di BackEnd " . env('APP_DOMAIN'), $isiemail, $headers) or die('Email tidak bisa terkirim');
            return redirect('/lupa_password_backend')->with(['pesan' => ' Link Lupa Password telah dikirim ke email Anda,
           Link tersebut akan habis masa pakainya selama 10 menit ', 'alert' => 'success']);
        } else {
            return redirect('/lupa_password_backend')->with(['pesan' => 'Username tidak ditemukan', 'alert' => 'danger']);
        }
    }


    public function lupa_password(Request $req)
    {
        $req->validate([
            'username' => 'required||alpha_num'
        ]);
        $uid = $req->username;
        $data = Member::select('email')->where('username', $uid)->first();
        if ($data) {
            $email = $data->email;
            Lupa_password::where('member_id', $uid)->delete();
            DB::insert('insert into lupa_password (member_id, email,start,expired) values(?,?,now(),DATE_ADD(now(),INTERVAL 10 MINUTE))', [$uid, $email]);
            // DB::update('update lupa_password set `start`=now(),expired=DATE_ADD(now(),INTERVAL 10 MINUTE) where member_id=?', [$uid]);
            $isiemail = 'Ada permintaan perubahan password dari c-panel ' . env('APP_DOMAIN') . '<br/>
            Silahkan Klik link dibawah ini, untuk mengganti password c-panel Anda<br/>
            <a href="' . env('APP_URL') . '/ubah_password/' . md5($uid . $email) . '">Ubah Password</a>';
            $headers  = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
            $headers .= 'From: ' . env('APP_NAME') . ' <' . env('APP_NAME') . '@' . strtolower(env('APP_DOMAIN')) . '>' . "\r\n";
            mail($email, "Proses Lupa Password di  " . env('APP_DOMAIN'), $isiemail, $headers) or die('Email tidak bisa terkirim');
            return redirect('/lupa_password')->with(['pesan' => ' Link Lupa Password telah dikirim ke email Anda,
           Link tersebut akan habis masa pakainya selama 10 menit ', 'alert' => 'success']);
        } else {
            return redirect('/lupa_password')->with(['pesan' => 'Username tidak ditemukan', 'alert' => 'danger']);
        }
    }


    public function ubah_password_member()
    {

        return view('ubah_password');
    }
    public function proses_ubah_password_backend(Request $req)
    {
        $req->validate([
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|min:6'
        ]);
        $pass = bcrypt($req->password);

        $hasil = Admin::where('uid', $req->username)->update([
            'pwd' => $pass
        ]);
        if ($hasil) {
            return redirect('/backend')->with(['message' => 'Proses Ubah  Password Sukses ', 'alert' => 'success']);
        } else {
            return redirect('/backend')->with(['message' => 'Proses Ubah  Password Gagal, silahkan ubah dengan password lainya ', 'alert' => 'danger']);
        }
    }
    public function proses_ubah_password_member(Request $req)
    {
        $req->validate([
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|min:6'
        ]);
        $pass = bcrypt($req->password);
        $hasil = Member::where('member_id', $req->username)->update([
            'password' => $pass
        ]);
        if ($hasil) {
            return redirect('/password/ubah')->with(['message' => 'Proses Ubah  Password Sukses ', 'alert' => 'success']);
        } else {
            return redirect('/password/ubah')->with(['message' => 'Proses Ubah  Password Gagal, silahkan ubah dengan password lainya ', 'alert' => 'danger']);
        }
    }
    public function ubah_password(Request $req)
    {
        $u = $req->id;
        $username = DB::select('select username,email from member where md5(concat(username,email))=?', [$u]);
        if (!empty($username[0]->username)) {
            return view('admin.ganti_password', ['username' => $username[0]->username, 'email' => $username[0]->email]);
        } else {
            return redirect('/lupa_password')->with(['pesan' => 'Proses Ubah  Password ditolak karena Member tidak ditemukan, silahkan lakukan lupa password kembali', 'alert' => 'success']);
        }
    }
    public function ubah_password_backend(Request $req)
    {
        $u = $req->id;
        $username = DB::select('select uid as username,email from admin where md5(concat(uid,email))=?', [$u]);
        if (!empty($username[0]->username)) {
            return view('backend.ganti_password', ['username' => $username[0]->username, 'email' => $username[0]->email]);
        } else {
            return redirect('/lupa_password_backend')->with(['pesan' => 'Proses Ubah  Password ditolak karena Member tidak ditemukan, silahkan lakukan lupa password kembali', 'alert' => 'success']);
        }
    }
    public function proses_ubah_password(Request $req)
    {

        $req->validate([
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|min:6'
        ]);
        $new_pass = bcrypt($req->password);
        $username = $req->username;
        $email = $req->email;
        $param = md5($username . $email);
        $hasil = DB::update('update member set password = ? where username = ?', [$new_pass, $username]);

        if ($hasil) {
            $headers  = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
            $headers .= 'From:' . env('APP_NAME') . ' <' . env('APP_NAME') . '@' . env('APP_DOMAIN') . '>' . "\r\n";
            $isiemail = 'Perubahan Password Berhasil.. <br>
            silahkan lakukan login di <a href="' . env('APP_URL') . '/c-panel" style="text-decoration:none">' . env('APP_URL') . '/c-panel</a><br>';
            $isiemail .= "Password Baru Anda : <b>" . $req->password . "</br>";
            mail($email, "Perubahan Password Member di  " . env('APP_DOMAIN'), $isiemail, $headers);
            return redirect('/login')->with(['message' => 'Proses Ubah  Password Sukses , silahkan lakukan login kembali ', 'alert' => 'success']);
        } else {
            return redirect('/ubah_password/' . $param)->with(['message' => 'Proses Ubah  Password Gagal', 'alert' => 'danger']);
        }
    }
}
