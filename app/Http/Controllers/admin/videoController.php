<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Youtube;
use Illuminate\Http\Request;

class videoController extends Controller
{
    public function index()
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $data = Youtube::where('member_id', session('admin_member_id'))->get();
        return view('admin.video', compact('data'));
    }
    public function delete(Request $req)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $hsl = Youtube::find($req->id)->delete();
        if ($hsl) {
            return redirect()->back()->with(['message' => 'Data berhasil dihapus', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Data gagal dihapus', 'alert' => 'danger']);
        }
    }
    public function find(Request $req)
    {
        $hsl = Youtube::find($req->id);
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
        $validasi = $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'id_youtube' => 'required'
        ]);

        if ($validasi) {

            $hsl = Youtube::find($request->id)->update([
                'member_id' => session('admin_member_id'),
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'id_youtube' => $request->id_youtube,
                'petugas' => session('admin_username')
            ]);
            if ($hsl) {
                return redirect('/admin/video')->with(['message' => 'Data Berhasil diubah', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data gagal diubah', 'alert' => 'danger']);
            }
        } else {
            return redirect()->back()->with(['message' => 'Data yang diubah belum lengkap ', 'alert' => 'danger']);
        }
    }
    public function create(Request $request)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $validasi = $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'id_youtube' => 'required'
        ]);
        if ($validasi) {
            $hsl = Youtube::create([
                'member_id' => session('admin_member_id'),
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'id_youtube' => $request->id_youtube,
                'dilihat' => 0,
                'petugas' => session('admin_username')

            ]);
            if ($hsl) {
                return redirect('/admin/video')->with(['message' => 'Data Berhasil Ditambahkan ', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data gagal ditambahkan', 'alert' => 'danger']);
            }
        } else {
            return redirect()->back()->with(['message' => 'Data yang diinputan belum lengkap ', 'alert' => 'danger']);
        }
    }
}
