<?php

namespace App\Http\Controllers\backend;

use App\Display;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProdukDefault;
use Illuminate\Support\Facades\DB;

class displayController extends Controller
{
    public function index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $produk = ProdukDefault::all();
        $datas = DB::table('default_produk')
            ->join('display', 'display.produk_id', '=', 'default_produk.id')
            ->select('default_produk.nama_brg', 'default_produk.foto', 'default_produk.slug', 'display.id')
            ->orderBy('display.id', 'DESC')
            ->get();
        return view('backend.display', compact('datas', 'produk'));
    }
    public function find(Request $req)
    {
        $hsl = Display::find($req->id);
        if ($hsl) {
            return response()->json($hsl);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan', 'error' => true]);
        }
    }
    public function create(Request $request)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $validasi = $request->validate([
            'produk_id' => 'required',
        ]);
        if ($validasi) {
            $hsl = Display::create([
                'produk_id' => $request->produk_id,
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

    public function update(Request $request)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if (!empty($request->id)) {
            $validasi = $request->validate([
                'produk_id' => 'required',
            ]);

            if ($validasi) {
                $hsl = Display::find($request->id)->update([
                    'produk_id' => $request->produk_id,
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

    public function delete(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $hsl = Display::find($req->id)->delete();
        if ($hsl) {
            $des = "Penghapusan data Produk, ID Member " . session('backend_user_id') . " dan ID Produk " . $req->id;
            $a_data = array(
                session('backend_user_id'), request()->url(),
                request()->headers->get('referer'),
                $_SERVER['REMOTE_ADDR'],
                $des,
            );
            save_event_log_member($a_data);
            return redirect()->back()->with(['message' => 'Data Display berhasil dihapus', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Data Display gagal dihapus', 'alert' => 'danger']);
        }
    }
}
