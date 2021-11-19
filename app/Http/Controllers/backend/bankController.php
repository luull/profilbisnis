<?php

namespace App\Http\Controllers\backend;

use App\Bank;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class bankController extends Controller
{
    public function index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $banks = Bank::all();
        return view('backend.bank', compact('banks'));
    }
    public function delete(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $dt = Bank::find($req->id);
        if ($dt) {

            $gbr = $dt->gambar;
            $hsl = $dt->delete();

            if ($hsl) {
                if (file_exists(public_path() . '/' . $gbr)) {
                    unlink(public_path() . '/' . $gbr);
                }
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
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $hsl = Bank::find($req->id);
        if ($hsl) {
            return response()->json($hsl);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan', 'error' => true]);
        }
    }
    public function update(Request $request)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
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
                    $file->move(public_path()  . '/images/', $name);
                    $photo =  "images/$name";
                } else {
                    $photo = $request->file_photo1;
                }
                $hsl = Bank::where('id', $request->id)
                    ->update([
                        'nama_bank' => $request->nama_bank,
                        'nama_akun' => $request->nama_akun,
                        'no_akun' => $request->no_akun,
                        'gambar' => $photo
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
    public function create(Request $request)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
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
                $file->move(public_path() . '/images/', $name);

                $photo =  "images/$name";
            }
            $hsl = Bank::create([
                'nama_bank' => $request->nama_bank,
                'nama_akun' => $request->nama_akun,
                'no_akun' => $request->no_akun,
                'gambar' => $photo
            ]);
            if ($hsl) {
                return redirect()->back()->with(['message' => 'Data Berhasil Ditambahkan ', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data gagal ditambahkan', 'alert' => 'danger']);
            }
        } else {
            return redirect()->back()->with(['message' => 'Data yang diinputan belum lengkap ', 'alert' => 'danger']);
        }
    }
}
