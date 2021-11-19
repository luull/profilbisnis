<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Kartu_nama;
use Illuminate\Http\Request;

class cardController extends Controller
{
    public function index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $backend_card = Kartu_nama::all();
        return view('backend.card', compact('backend_card'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $validasi = $req->validate([
            'name' => 'required',
            'template' => 'required',
        ]);

        if ($validasi) {

            $hsl = Kartu_nama::create([
                'nama' => $req->name,
                'template' => $req->template,
            ]);
            if ($hsl) {
                return redirect()->back()->with(['message' => 'Template berhasil ditambahkan', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Template  gagal disimpan', 'alert' => 'danger']);
            }
        } else {
            return redirect()->back()->with(['message' => 'Data tidak lengkap', 'alert' => 'danger']);
        }
    }

    public function update(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if (($req->id) > 0) {

            $validasi = $req->validate([
                'edit_name' => 'required',
                'edit_template' => 'required',
            ]);

            if ($validasi) {

                $hsl = Kartu_nama::where('id', $req->id)->update([
                    'nama' => $req->edit_name,
                    'template' => $req->edit_template,
                ]);
                if ($hsl) {
                    return redirect()->back()->with(['message' => 'Template berhasil diupdate', 'alert' => 'success']);
                } else {
                    return redirect()->back()->with(['message' => 'Template gagal diupdate', 'alert' => 'danger']);
                }
            }
        }
        return redirect()->back()->with(['message' => 'Data tidak lengkap', 'alert' => 'danger']);
    }



    public function find(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if (!empty($req->id)) {

            $hsl = Kartu_nama::where('id', $req->id)->first();
            if ($hsl) {
                return response()->json(['hasil' => $hsl]);
            } else {
                return response()->json(['message' => 'Data tidak ditemukan', 'error' => true]);
            }
        } else {
            return response()->json(['message' => 'Data tidak ditemukan', 'error' => true]);
        }
    }
    public function delete(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if (!empty($req->id)) {

            $dt = Kartu_nama::where('id', $req->id);
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
    }
}
