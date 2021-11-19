<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TestimoniDefault;
use App\Produk;
use App\ProdukDefault;

class testimoniController extends Controller
{
    public function index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $produk = ProdukDefault::all();
        $data = TestimoniDefault::all();

        return view('backend.testimoni', compact('data', 'produk'));
    }
    public function delete(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $hsl = TestimoniDefault::find($req->id)->delete();
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
        $hsl = TestimoniDefault::find($req->id);
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


            if ($request->hasfile('foto1')) {
                $file = $request->file('foto1');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/photos/', $name);
                $photo =  "photos/$name";
            } else {
                $photo = $request->foto_exist;
            }
            $hsl = TestimoniDefault::find($request->id)->update([
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
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if ($request) {
            $photo = "";
            if ($request->hasfile('foto')) {
                $file = $request->file('foto');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() .  '/photos/', $name);
                $photo =  "photos/$name";
            }
            $hsl = TestimoniDefault::create([
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
