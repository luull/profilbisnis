<?php

namespace App\Http\Controllers\backend;

use App\BisnisDefault;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class bisnisController extends Controller
{
    public function index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $datas = BisnisDefault::all();
        return view('backend.bisnis', compact('datas'));
    }
    public function json(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $datas = BisnisDefault::all();
        return response()->json($datas);
    }
    public function delete(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $hsl = BisnisDefault::find($req->id)->delete();
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
        $id = $req->id;
        $hsl = BisnisDefault::where('id', $req->id)->first();
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
            'nama' => 'required',
        ]);
        if ($validasi) {
            if ($request->hasfile('logo')) {
                $file = $request->file('logo');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() .  '/images/', $name);
                $logo =  "images/$name";
            } else {
                $logo = $request->logo_exist;
            }
            $hsl = BisnisDefault::find($request->id)->update([
                'nama' => $request->nama,
                'slug' => Str::slug($request->nama),
                'keterangan_singkat' => $request->keterangan_singkat,
                'keterangan' => $request->keterangan_detil,
                'logo' => $logo,
                'tgl_update' => date('Y-m-d H:i:s'),
                'petugas_update' => session('backend_username')
            ]);
            if ($hsl) {
                return redirect('/backend/bisnis')->with(['message' => 'Data Berhasil diubah', 'alert' => 'success']);
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
            'nama' => 'required',

        ]);
        if ($validasi) {
            $logo = "";
            if ($request->hasfile('logo')) {

                $file = $request->file('logo');

                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() .  '/images/', $name);
                $logo =  "images/$name";
            }

            $hsl = BisnisDefault::create([
                'nama' => $request->nama,
                'slug' => Str::slug($request->nama),
                'keterangan_singkat' => $request->keterangan_singkat,
                'keterangan' => $request->keterangan_detil,
                'logo' => $logo,
                'tgl_input' => date('Y-m-d H:i:s'),
                'petugas_input' => session('backend_username')
            ]);
            if ($hsl) {
                return redirect('/backend/bisnis')->with(['message' => 'Data Berhasil Ditambahkan ', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data gagal ditambahkan', 'alert' => 'danger']);
            }
        } else {
            return redirect()->back()->with(['message' => 'Data yang diinputan belum lengkap ', 'alert' => 'danger']);
        }
    }
}
