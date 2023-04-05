<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Member;
use Illuminate\Http\Request;
use App\Token;

class tokenController extends Controller
{
    public function index()
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $a_data = array(
            session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], "",
        );
        $id = session('admin_member_id');
        save_event_log_member($a_data);
        $data = Token::where('pembeli', session('admin_member_id'))
        ->orderBy('type', 'desc')
        ->get();
        $status = Token::where('pembeli', session('admin_member_id'))->first();
        $dataterpakai = Token::where('status', '1')->count();
        $dataterbeli = Token::where('status', '0')->count();
        $member = Member::where('id_referal', $id)->skip(0)->take(4)->get();
        return view('admin.token', compact('data', 'dataterpakai', 'dataterbeli', 'member', 'status'));
    }
    public function create(Request $request)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $a_data = array(
            session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], "",
        );
        save_event_log_member($a_data);
        $karakter = '123456789';
        for ($i = 1; $i <= $request->jumlah; $i++) {
            $hsl = Token::create([
                'token' => substr(str_shuffle($karakter), 0, 6),
                'total' => $request->total,
                'type' => $request->type,
                'pembeli' => session('admin_member_id'),
                'status' => '0',
                'tgl_beli' => date('Y-m-d h:i:s'),
                'tgl_dipakai' => date('Y-m-d h:i:s'),
            ]);
        }
        if ($hsl) {
            $des = "Pembelian " . $request->jumlah . "Token Berhasil";
            $a_data = array(
                session('admin_member_id'), request()->url(),
                request()->headers->get('referer'),
                $_SERVER['REMOTE_ADDR'],
                $des,
            );
            save_event_log_member($a_data);
            return redirect()->back()->with(['message' => 'Pembelian Token Berhasil ', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Pembelian Token Gagal, silahkan coba kembali', 'alert' => 'danger']);
        }
    }
    public function find(Request $req)
    {
        $hsl = Token::find($req->id);
        if ($hsl) {
            return response()->json($hsl);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan', 'error' => true]);
        }
    }
    public function datamember()
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $a_data = array(
            session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], "",
        );
        $id = session('admin_member_id');
        save_event_log_member($a_data);
        $data = Token::where('pembeli', $id)->first();
        $dataterpakai = Token::where('status', '1')->count();
        $member = Member::where('id_referal', $id)->get();

        return view('admin.datamember', compact('data', 'dataterpakai', 'member'));
    }
}
