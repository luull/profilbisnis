<?php

namespace App\Http\Controllers\admin;

use App\Bisnis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class bisnisController extends Controller
{
    public function index()
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $a_data = array(
            session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], "",
        );
        save_event_log_member($a_data);
        $datas = Bisnis::where('member_id', session('admin_member_id'))->get();
        return view('admin.bisnis', compact('datas'));
    }
    public function json()
    {
        $datas = Bisnis::where('member_id', session('admin_member_id'))->get();
        return response()->json($datas);
    }
    public function delete(Request $req)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $hsl = Bisnis::find($req->id)->delete();
        if ($hsl) {
            $des = "Penghapusan data Bisnis, ID Member " . session('admin_member_id') . " dan ID Bisnis " . $req->id;
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
        $hsl = Bisnis::where('id', $req->id)
            ->where('member_id', session('admin_member_id'))->first();
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
            'nama' => 'required',
        ]);
        if ($validasi) {
            if ($request->hasfile('logo')) {
                $file = $request->file('logo');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/' . session('admin_member_id') . '/images/', $name);
                $logo = session('admin_member_id') . "/images/$name";
            } else {
                $logo = $request->logo_exist;
            }
            $hsl = Bisnis::find($request->id)->update([
                'member_id' => session('admin_member_id'),
                'nama' => $request->nama,
                'slug' => Str::slug($request->nama),
                'keterangan_singkat' => $request->keterangan_singkat,
                'keterangan' => $request->keterangan_detil,
                'logo' => $logo,
                'tgl_update' => date('Y-m-d H:i:s'),
                'petugas_update' => session('admin_username')
            ]);
            if ($hsl) {
                $des = "Update data Bisnis, ID Member " . session('admin_member_id') . " dan ID Bisnis " . $request->id;
                $a_data = array(
                    session('admin_member_id'), request()->url(),
                    request()->headers->get('referer'),
                    $_SERVER['REMOTE_ADDR'],
                    $des,
                );
                save_event_log_member($a_data);
                return redirect('/admin/bisnis')->with(['message' => 'Data Berhasil diubah', 'alert' => 'success']);
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
                $file->move(public_path() . '/' . session('admin_member_id') . '/images/', $name);
                $logo = session('admin_member_id') . "/images/$name";
            }

            $hsl = Bisnis::create([
                'member_id' => session('admin_member_id'),
                'nama' => $request->nama,
                'slug' => Str::slug($request->nama),
                'keterangan_singkat' => $request->keterangan_singkat,
                'keterangan' => $request->keterangan_detil,
                'logo' => $logo,
                'tgl_input' => date('Y-m-d H:i:s'),
                'petugas_input' => session('admin_username')
            ]);
            if ($hsl) {
                $des = "Input data Bisnis, ID Member " . session('admin_member_id') . " nama Bisnis " . $request->nama;
                $a_data = array(
                    session('admin_member_id'), request()->url(),
                    request()->headers->get('referer'),
                    $_SERVER['REMOTE_ADDR'],
                    $des,
                );
                save_event_log_member($a_data);
                return redirect('/admin/bisnis')->with(['message' => 'Data Berhasil Ditambahkan ', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data gagal ditambahkan', 'alert' => 'danger']);
            }
        } else {
            return redirect()->back()->with(['message' => 'Data yang diinputan belum lengkap ', 'alert' => 'danger']);
        }
    }
}
