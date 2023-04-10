<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bill_token;
use App\Token;
use App\Member;
use Illuminate\Support\Str;

class tokenController extends Controller
{
    public function index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $data = Bill_token::orderBy('tgl_beli', 'desc')->get();
        return view('backend.token', compact('data'));
    }
    public function find(Request $req)
    {
        $hsl = Bill_token::find($req->id);
        if ($hsl) {
            return response()->json($hsl);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan', 'error' => true]);
        }
    }
    public function generate(Request $request)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $get = Bill_token::where('id',$request->id)->first();
        // $pembeli = Member::where('id', $get->pembeli)->first();
        $karakter = '123456789';
        for ($i = 1; $i <= $get->qty; $i++) {
                $hsl = Token::create([
                        'id_beli' => $get->id_token,
                        'token' => substr(str_shuffle($karakter), 0, 6),
                        'type' => $get->type,
                        // 'pembeli' => $pembeli->username,
                        'pembeli' => $get->pembeli,
                        'status' => '0',
                        'tgl_beli' => $get->tgl_beli,
                    ]);
                }
        if ($hsl) {
            Bill_token::find($request->id)->update([
                'status' => 1 
            ]);
            return redirect()->back()->with(['message' => 'Generate Token Berhasil ', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Generate Token Gagal, silahkan coba kembali', 'alert' => 'danger']);
        }
    }
    public function sendwa(Request $req){
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $getbill = Bill_token::where('id_token', $req->id)->first();
        $gettoken = Token::where('id_beli', $req->id)->first();
        $link = env('APP_URL').'/register';
        if($getbill){
            return redirect('https://api.whatsapp.com/send?phone='.$getbill->phone.'&text=Selamat *'.$getbill->pembeli.'*%0ARegistrasi anda Berhasil%0AJangan berikan Token ini ke siapapun%0A*'.$gettoken->token.'*%0AGunakan Token ini untuk Registrasi Member Profil Bisnis%0A'.$link);
        }else{
            return redirect()->back()->with(['message' => 'Send Token Gagal, silahkan coba kembali', 'alert' => 'danger']);
        }

    }
}