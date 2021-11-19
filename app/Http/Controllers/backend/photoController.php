<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gallery_photo_Default;

class photoController extends Controller
{
    public function index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $data = Gallery_photo_Default::all();
        return view('backend.photo', compact('data'));
    }
    public function delete(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $hsl = Gallery_photo_Default::find($req->id)->delete();
        if ($hsl) {
            return redirect()->back()->with(['message' => 'Data berhasil dihapus', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Data gagal dihapus', 'alert' => 'danger']);
        }
    }
    public function find(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $hsl = Gallery_photo_Default::find($req->id);
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
                'keterangan' => 'required',
            ]);

            if ($validasi) {
                if ($request->hasfile('file_photo')) {
                    $file = $request->file('file_photo');
                    $originName = $file->getClientOriginalName();
                    $fileName = pathinfo($originName, PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $name = $fileName . '.' . $extension;
                    $file->move(public_path() .  '/photos/', $name);
                    $photo = "photos/$name";
                } else {
                    $photo = $request->file_photo1;
                }


                $hsl = Gallery_photo_Default::find($request->id)->update([
                    'katagori' => $request->katagori,
                    'keterangan' => $request->keterangan,
                    'file_photo' => $photo,
                    'petugas' => session('backend_username')
                ]);
                if ($hsl) {
                    return redirect('/backend/photo')->with(['message' => 'Data Berhasil diubah', 'alert' => 'success']);
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
            'keterangan' => 'required',
            'file_photo' => 'required'
        ]);
        if ($validasi) {
            if ($request->hasfile('file_photo')) {
                $file = $request->file('file_photo');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() .  '/photos/', $name);
                $photo =  "photos/$name";
            }
            $hsl = Gallery_photo_Default::create([
                'katagori' => $request->katagori,
                'keterangan' => $request->keterangan,
                'file_photo' => $photo,
                'dilihat' => 0,
                'petugas' => session('backend_username')

            ]);
            if ($hsl) {
                return redirect('/backend/photo')->with(['message' => 'Data Berhasil Ditambahkan ', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data gagal ditambahkan', 'alert' => 'danger']);
            }
        } else {
            return redirect()->back()->with(['message' => 'Data yang diinputan belum lengkap ', 'alert' => 'danger']);
        }
    }
}
