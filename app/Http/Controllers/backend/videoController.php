<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\YoutubeDefault;
use Illuminate\Http\Request;

class videoController extends Controller
{
    public function index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $data = YoutubeDefault::all();
        return view('backend.video', compact('data'));
    }
    public function delete(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $hsl = YoutubeDefault::find($req->id)->delete();
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
        $hsl = YoutubeDefault::find($req->id);
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
        $validasi = $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'id_youtube' => 'required'
        ]);

        if ($validasi) {

            $hsl = YoutubeDefault::find($request->id)->update([
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'id_youtube' => $request->id_youtube,
                'petugas' => session('username')
            ]);
            if ($hsl) {
                return redirect('/backend/video')->with(['message' => 'Data Berhasil diubah', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data gagal diubah', 'alert' => 'danger']);
            }
        } else {
            return redirect()->back()->with(['message' => 'Data yang diubah belum lengkap ', 'alert' => 'danger']);
        }
    }
    public function create(Request $request)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $validasi = $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'id_youtube' => 'required'
        ]);
        if ($validasi) {
            $hsl = YoutubeDefault::create([
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'id_youtube' => $request->id_youtube,
                'dilihat' => 0,
                'petugas' => session('username')

            ]);
            if ($hsl) {
                return redirect('/backend/video')->with(['message' => 'Data Berhasil Ditambahkan ', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data gagal ditambahkan', 'alert' => 'danger']);
            }
        } else {
            return redirect()->back()->with(['message' => 'Data yang diinputan belum lengkap ', 'alert' => 'danger']);
        }
    }
}
