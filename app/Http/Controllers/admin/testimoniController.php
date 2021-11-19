<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Testimoni;
use App\Produk;

class testimoniController extends Controller
{
    public function index()
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $produk = Produk::where('member_id', session('admin_member_id'))->get();
        $data = Testimoni::select('testimoni.*', 'produk.nama_brg')->leftjoin('produk', 'produk.id', '=', 'testimoni.produk_id')
            ->where('testimoni.member_id', session('admin_member_id'))->get();
        return view('admin.testimoni', compact('data', 'produk'));
    }
    public function delete(Request $req)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $hsl = Testimoni::find($req->id)->delete();
        if ($hsl) {
            return redirect()->back()->with(['message' => 'Data berhasil dihapus', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Data gagal dihapus', 'alert' => 'danger']);
        }
    }
    public function find(Request $req)
    {
        $hsl = Testimoni::find($req->id);
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


            if ($request->hasfile('foto1')) {
                $file = $request->file('foto1');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/' . session('admin_member_id') . '/photos/', $name);
                $photo = session('admin_member_id') . "/photos/$name";
            } else {
                $photo = $request->foto_exist;
            }
            $hsl = Testimoni::find($request->id)->update([
                'member_id' => session('admin_member_id'),
                'produk_id' => $request->produk_id,
                'judul' => $request->judul,
                'nama' => $request->nama,
                'alamat' => $request->alamat,

                'keterangan' => $request->keterangan,
                'foto' => $photo
            ]);
            if ($hsl) {
                return redirect()->back()->with(['message' => 'Data Berhasil diubah', 'alert' => 'success']);
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
        if ($request) {
            if ($request->hasfile('foto')) {
                $file = $request->file('foto');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/' . session('admin_member_id') . '/photos/', $name);
                $photo = session('admin_member_id') . "/photos/$name";
            }
            $hsl = Testimoni::create([
                'member_id' => session('admin_member_id'),
                'produk_id' => $request->produk_id,
                'judul' => $request->judul,
                'nama' => $request->nama,
                'alamat' => $request->alamat,

                'keterangan' => $request->keterangan,
                'foto' => $photo,

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
