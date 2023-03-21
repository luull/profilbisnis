<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produk;
use App\Bisnis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class produkController extends Controller
{
    public function index()
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        //$datas=Produk::all();
        $a_data = array(
            session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], "",
        );
        save_event_log_member($a_data);
        $bisnis = Bisnis::where('member_id', session('admin_member_id'))->get();
        $datas = DB::select('select a.id as id,bisnis_id,nama,nama_brg,a.slug,a.harga
        ,a.foto,a.keterangan_singkat from produk a inner join bisnis b on a.bisnis_id=b.id where a.member_id=? and b.member_id=? order by a.id desc ', [session('admin_member_id'), session('admin_member_id')]);
        return view('admin.produk', compact('datas', 'bisnis'));
    }
    public function delete(Request $req)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $hsl = Produk::find($req->id)->delete();
        if ($hsl) {
            $des = "Penghapusan data Produk, ID Member " . session('admin_member_id') . " dan ID Produk " . $req->id;
            $a_data = array(
                session('admin_member_id'), request()->url(),
                request()->headers->get('referer'),
                $_SERVER['REMOTE_ADDR'],
                $des,
            );
            save_event_log_member($a_data);
            return redirect()->back()->with(['message' => 'Data berhasil dihapus', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Data gagal dihapus', 'alert' => 'danger']);
        }
    }
    public function find(Request $req)
    {
        $hsl = Produk::find($req->id);
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
            $validasi = $request->validate([
                'bisnis_id' => 'required',
                'nama_brg' => 'required',
                'keterangan' => 'required',
                'keterangan_singkat' => 'required'
            ]);

            if ($validasi) {
                if ($request->hasfile('foto')) {
                    $file = $request->file('foto');
                    $originName = $file->getClientOriginalName();
                    $fileName = pathinfo($originName, PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $name = $fileName . '.' . $extension;
                    $file->move(public_path() . '/member-assets' . session('admin_member_id') . '/produk/', $name);
                    $photo = "member-assets/". session('admin_member_id') . "/produk/$name";
                } else {
                    $photo = $request->foto_exist;
                }
                $hsl = Produk::find($request->id)->update([
                    'member_id' => session('admin_member_id'),
                    'bisnis_id' => $request->bisnis_id,
                    'nama_brg' => $request->nama_brg,
                    'slug' => Str::slug($request->nama_brg),
                    'keterangan' => $request->keterangan,
                    'keterangan_singkat' => $request->keterangan_singkat,
                    'foto' => $photo,
                    'harga' => $request->harga,
                    'petugas_update' => session('admin_username')
                ]);
                if ($hsl) {
                    $des = "Update data Produk, ID Member " . session('admin_member_id') . " dan ID Produk " . $request->id;
                    $a_data = array(
                        session('admin_member_id'), request()->url(),
                        request()->headers->get('referer'),
                        $_SERVER['REMOTE_ADDR'],
                        $des,
                    );
                    save_event_log_member($a_data);
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
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $validasi = $request->validate([
            'bisnis_id' => 'required',
            'nama_brg' => 'required',
            'keterangan' => 'required',
            'keterangan_singkat' => 'required'
        ]);
        if ($validasi) {
            if ($request->hasfile('foto')) {
                $file = $request->file('foto');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/member-assets' . session('admin_member_id') . '/produk/', $name);
                $photo = "member-assets/". session('admin_member_id') . "/produk/$name";
            }
            $hsl = Produk::create([
                'member_id' => session('admin_member_id'),
                'bisnis_id' => $request->bisnis_id,
                'nama_brg' => $request->nama_brg,
                'slug' => Str::slug($request->nama_brg),
                'keterangan' => $request->keterangan,
                'keterangan_singkat' => $request->keterangan_singkat,
                'foto' => $photo,
                'harga' => $request->harga,
                'petugas_input' => session('admin_username')

            ]);
            if ($hsl) {
                $des = "Input data Produk, ID Member " . session('admin_member_id') . " Nama Produk " . $request->nama_brg;
                $a_data = array(
                    session('admin_member_id'), request()->url(),
                    request()->headers->get('referer'),
                    $_SERVER['REMOTE_ADDR'],
                    $des,
                );
                save_event_log_member($a_data);
                return redirect()->back()->with(['message' => 'Data Berhasil Ditambahkan ', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data gagal ditambahkan', 'alert' => 'danger']);
            }
        } else {
            return redirect()->back()->with(['message' => 'Data yang diinputan belum lengkap ', 'alert' => 'danger']);
        }
    }
}
