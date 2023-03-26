<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\KategoriPekerjaan;
use App\SubKategoriPekerjaan;
use Illuminate\Http\Request;

class kategoriPekerjaanController extends Controller
{
    public function index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $data = KategoriPekerjaan::all();
        return view('backend.kategori_pekerjaan', compact('data'));
    }
    public function sub_index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $data = SubKategoriPekerjaan::all();
        $kategori_pekerjaan = KategoriPekerjaan::all();
        return view('backend.sub_kategori_pekerjaan', compact('data', 'kategori_pekerjaan'));
    }
    public function save(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if (!empty($req->nama)) {
            $hsl = KategoriPekerjaan::create([
                'nama' => $req->nama,
                'createdBy' => session('backend_user_id')
            ]);
            if ($hsl) {
                return redirect()->back()->with(['message' => 'Kategori Pekerjaan berhasil ditambahkan', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Kategori Pekerjaan gagal disimpan', 'alert' => 'danger']);
            }
        }
    }
    public function sub_save(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if (!empty($req->nama)) {
            $hsl = SubKategoriPekerjaan::create([
                'sub_kategori_id' => $req->sub_kategori_id,
                'kategori_id' => $req->kategori_id,
                'nama' => $req->nama,
                'createdBy' => session('backend_user_id')
            ]);
            if ($hsl) {
                return redirect()->back()->with(['message' => 'Sub Kategori Pekerjaan berhasil ditambahkan', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Sub Kategori Pekerjaan gagal disimpan', 'alert' => 'danger']);
            }
        }
    }
    public function update(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if (($req->id) > 0) {

            if (!empty($req->edit_nama)) {
                $hsl = KategoriPekerjaan::find($req->id)->update([
                    'nama' => $req->edit_nama,

                ]);
                if ($hsl) {
                    return redirect()->back()->with(['message' => 'Kategori Pekerjaan berhasil diupdate', 'alert' => 'success']);
                } else {
                    return redirect()->back()->with(['message' => 'Kategori Pekerjaan gagal diupdate', 'alert' => 'danger']);
                }
            }
        }
        return redirect()->back()->with(['message' => 'Data tidak lengkap', 'alert' => 'danger']);
    }

    public function sub_update(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }

        if (($req->edit_id) > 0) {

            if (!empty($req->edit_nama)) {
                $hsl = SubKategoriPekerjaan::find($req->edit_id)->update([
                    'nama' => $req->edit_nama,
                    'sub_kategori_id' => $req->edit_sub_kategori_id,
                    'kategori_id' => $req->edit_kategori_id,
                    'createdBy' => session('backend_user_id')

                ]);
                if ($hsl) {
                    return redirect()->back()->with(['message' => 'Kategori Pekerjaan berhasil diupdate', 'alert' => 'success']);
                } else {
                    return redirect()->back()->with(['message' => 'Kategori Pekerjaan gagal diupdate', 'alert' => 'danger']);
                }
            }
        }
        return redirect()->back()->with(['message' => 'Data tidak lengkap', 'alert' => 'danger']);
    }

    public function delete(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $dt = KategoriPekerjaan::find($req->id);
        if ($dt) {

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
    public function sub_delete(Request $req)
    {
        $dt = SubKategoriPekerjaan::find($req->id);
        if ($dt) {

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
    public function sub_kategori_pekerjaan_find(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if (!empty($req->id)) {
            $hsl = SubKategoriPekerjaan::find($req->id);
            if ($hsl) {
                return response()->json(['hasil' => $hsl]);
            } else {
                return response()->json(['message' => 'Data tidak ditemukan', 'error' => true]);
            }
        }
    }
    public function findall()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $hsl = KategoriPekerjaan::all();
        if ($hsl) {
            return response()->json(['hasil' => $hsl]);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan', 'error' => true]);
        }
    }
}
