<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Banner;

class bannerController extends Controller
{
    public function index()
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $data = Banner::where('member_id', session('admin_member_id'))->get();
        $a_data = array(
            session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], "",
        );
        save_event_log_member($a_data);
        return view('admin.banner', compact('data'));
    }
    public function delete(Request $req)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $hsl = Banner::find($req->id)->delete();
        if ($hsl) {
            $des = "Penghapusan data Banner ID Member " . session('admin_member_id') . " dan ID Banner " . $req->id;

            $a_data = array(
                session('admin_member_id'), request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'], $des,
            );
            save_event_log_member($a_data);
            return redirect()->back()->with(['message' => 'Data berhasil dihapus', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Data gagal dihapus', 'alert' => 'danger']);
        }
    }
    public function find(Request $req)
    {
        $hsl = Banner::find($req->id);
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
                'judul' => 'required',

            ]);

            if ($validasi) {
                if ($request->hasfile('gambar')) {
                    $file = $request->file('gambar');
                    $originName = $file->getClientOriginalName();
                    $fileName = pathinfo($originName, PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $name = $fileName . '.' . $extension;
                    $file->move(public_path() . '/' . session('admin_member_id') . '/images/', $name);
                    $gambar = session('admin_member_id') . "/images/$name";
                } else {
                    $gambar = $request->gambar1;
                }
                /*if ($request->hasfile('background')) {
                    $file = $request->file('background');
                    $originName = $file->getClientOriginalName();
                    $fileName = pathinfo($originName, PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $name = $fileName . '.' . $extension;
                    $file->move(public_path() . '/' . session('admin_member_id') . '/images/', $name);
                    $background = session('admin_member_id') . "/images/$name";
                } else {
                    $background = $request->background1;
                }*/
                $hsl = Banner::find($request->id)->update([
                    'member_id' => session('admin_member_id'),
                    'judul' => $request->judul,
                    'sub_judul1' => $request->sub_judul1,
                    'sub_judul2' => $request->sub_judul2,
                    'tombol' => $request->tombol,
                    'link' => $request->link,

                    'gambar' => $gambar,

                ]);
                if ($hsl) {
                    $des = "Update data Banner ID Member " . session('admin_member_id') . " dan ID data Banner " . $request->id;
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
            'gambar' => 'required',
            'judul' => 'required',
        ]);
        if ($validasi) {
            if ($request->hasfile('gambar')) {
                $file = $request->file('gambar');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/' . session('admin_member_id') . '/images/', $name);
                $gambar = session('admin_member_id') . "/images/$name";
            }
            /*if ($request->hasfile('background')) {
                $file = $request->file('background');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/' . session('admin_member_id') . '/images/', $name);
                $background = session('admin_member_id') . "/images/$name";
            }*/

            $hsl = Banner::create([
                'member_id' => session('admin_member_id'),
                'judul' => $request->judul,
                'sub_judul1' => $request->sub_judul1,
                'sub_judul2' => $request->sub_judul2,
                'tombol' => $request->tombol,
                'link' => $request->link,

                'gambar' => $gambar,

            ]);
            if ($hsl) {
                $des = "Input data Banner, ID Member " . session('admin_member_id') . " " . $request->background . "/" . $request->gambar . "/" . $request->tulisan;
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
