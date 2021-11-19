<?php

namespace App\Http\Controllers\admin;

use App\Bank_member;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class bankController extends Controller
{
    public function index()
    {

        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $banks = Bank_member::where('member_id', session('admin_member_id'))->get();
        $a_data = array(
            session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], "",
        );
        save_event_log_member($a_data);
        return view('admin.bank', compact('banks'));
    }
    public function delete(Request $req)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $dt = Bank_member::where('id', $req->id)
            ->where('member_id', session('admin_member_id'))->first();
        if ($dt) {

            $gbr = $dt->gambar;
            $hsl = $dt->delete();

            if ($hsl) {
                if (!empty($gbr)) {
                    if (file_exists(public_path() . '/' . $gbr)) {
                        unlink(public_path() . '/' . $gbr);
                    }
                }
                $des = "Penghapusan data bank ID Member " . session('admin_member_id') . " dan ID Data Bank " . $req->id;

                $a_data = array(
                    session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], $des,
                );
                save_event_log_member($a_data);
                return redirect()->back()->with(['message' => 'Data berhasil dihapus', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data gagal dihapus', 'alert' => 'danger']);
            }
        } else {
            return redirect()->back()->with(['message' => 'Data tidak ditemukan ', 'alert' => 'danger']);
        }
    }
    public function find(Request $req)
    {
        $hsl = Bank_member::where('id', $req->id)
            ->where('member_id', session('admin_member_id'))->first();
        if ($hsl) {
            return response()->json($hsl);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan', 'error' => true]);
        }
    }
    public function update(Request $request)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        if (!empty($request->id)) {
            $validasi = $request->validate([
                'nama_bank' => 'required',
                'nama_akun' => 'required',
                'no_akun' => 'required'

            ]);

            if ($validasi) {
                if ($request->hasfile('gambar')) {
                    $file = $request->file('gambar');
                    $originName = $file->getClientOriginalName();
                    $fileName = pathinfo($originName, PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $name = $fileName . '.' . $extension;
                    $file->move(public_path() . '/' . session('admin_member_id') . '/images/', $name);
                    $photo = session('admin_username') . "/images/$name";
                } else {
                    $photo = $request->file_photo1;
                }
                $hsl = Bank_member::where('id', $request->id)
                    ->where('member_id', session('admin_member_id'))
                    ->update([
                        'member_id' => session('admin_member_id'),
                        'nama_bank' => $request->nama_bank,
                        'nama_akun' => $request->nama_akun,
                        'no_akun' => $request->no_akun,
                        'gambar' => $photo
                    ]);
                if ($hsl) {
                    $des = "Update data bank ID Member " . session('admin_member_id') . " dan ID data bank " . $request->id;
                    $a_data = array(
                        session('admin_member_id'), request()->url(),
                        request()->headers->get('referer'),
                        $_SERVER['REMOTE_ADDR'],
                        $des,
                    );
                    save_event_log_member($a_data);
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
    public function create(Request $request)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $validasi = $request->validate([
            'nama_bank' => 'required',
            'nama_akun' => 'required',
            'no_akun' => 'required'

        ]);
        if ($validasi) {
            $photo = "";
            if ($request->hasfile('gambar')) {
                $file = $request->file('gambar');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/' . session('admin_member_id') . '/images/', $name);
                $photo = session('admin_member_id') . "/images/$name";
            }
            $hsl = Bank_member::create([
                'member_id' => session('admin_member_id'),
                'nama_bank' => $request->nama_bank,
                'nama_akun' => $request->nama_akun,
                'no_akun' => $request->no_akun,
                'gambar' => $photo
            ]);
            if ($hsl) {
                $des = "Input data bank ID Member " . session('admin_member_id') . " No Akun " . $request->no_akun . "/" . $request->nama_akun . "/" . $request->nama_bank;
                $a_data = array(
                    session('admin_member_id'), request()->url(),
                    request()->headers->get('referer'),
                    $_SERVER['REMOTE_ADDR'],
                    $des,
                );
                save_event_log_member($a_data);
                return redirect()->back()->with(['message' => 'Data Berhasil Ditambahkan ', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data gagal ditambahkan', 'alert' => 'danger']);
            }
        } else {
            return redirect()->back()->with(['message' => 'Data yang diinputan belum lengkap ', 'alert' => 'danger']);
        }
    }
}
