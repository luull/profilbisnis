<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produk;
use App\BisnisDefault;
use App\ProdukDefault;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class produkController extends Controller
{
    public function index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        //$datas=Produk::all();
        $datas = ProdukDefault::all();
        $bisnis = BisnisDefault::all();

        return view('backend.produk', compact('datas', 'bisnis'));
    }
    public function delete(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $hsl = ProdukDefault::find($req->id)->delete();
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
        $hsl = ProdukDefault::find($req->id);
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
                'bisnis_id' => 'required',
                'nama_brg' => 'required',
                'keterangan' => 'required',
                'keterangan_singkat' => 'required',
                'display' => 'required'
            ]);

            if ($validasi) {
                if ($request->hasfile('foto')) {
                    $file = $request->file('foto');
                    $originName = $file->getClientOriginalName();
                    $fileName = pathinfo($originName, PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $name = $fileName . '.' . $extension;
                    $file->move(public_path() . '/photos/', $name);
                    $photo = "photos/$name";
                } else {
                    $photo = $request->foto_exist;
                }
                $hsl = ProdukDefault::find($request->id)->update([
                    'bisnis_id' => $request->bisnis_id,
                    'nama_brg' => $request->nama_brg,
                    'slug' => Str::slug($request->nama_brg),
                    'keterangan' => $request->keterangan,
                    'keterangan_singkat' => $request->keterangan_singkat,
                    'foto' => $photo,
                    'display' => $request->display,
                    'harga' => $request->harga,
                    'petugas_update' => session('backend_username')
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
            'bisnis_id' => 'required',
            'nama_brg' => 'required',
            'keterangan' => 'required',
            'keterangan_singkat' => 'required',
            'display' => 'required'
        ]);
        if ($validasi) {
            $photo = "";
            if ($request->hasfile('foto')) {
                $file = $request->file('foto');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/photos/', $name);
                $photo = "photos/$name";
            }
            $hsl = ProdukDefault::create([
                'bisnis_id' => $request->bisnis_id,
                'nama_brg' => $request->nama_brg,
                'slug' => Str::slug($request->nama_brg),
                'keterangan' => $request->keterangan,
                'keterangan_singkat' => $request->keterangan_singkat,
                'foto' => $photo,
                'display' => $request->display,
                'harga' => $request->harga,
                'petugas_input' => session('backend_username')

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
