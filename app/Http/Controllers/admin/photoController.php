<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gallery_photo;

class photoController extends Controller
{
    public function index()
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $des = "";
        $a_data = array(
            session('admin_member_id'), request()->url(),
            request()->headers->get('referer'),
            $_SERVER['REMOTE_ADDR'],
            $des,
        );
        save_event_log_member($a_data);
        $data = Gallery_photo::where('member_id', session('admin_member_id'))->get();
        return view('admin.photo', compact('data'));
    }
    public function delete(Request $req)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $hsl = Gallery_photo::find($req->id)->delete();
        if ($hsl) {
            $des = "Delete Gallery Photo, ID Member " . session('admin_member_id') . " dan ID Photo " . $req->id;
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
        $hsl = Gallery_photo::find($req->id);
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
                'keterangan' => 'required',
            ]);

            if ($validasi) {
                if ($request->hasfile('foto')) {
                    $file = $request->file('foto');
                    $originName = $file->getClientOriginalName();
                    $fileName = pathinfo($originName, PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $name = $fileName . '.' . $extension;
                    $file->move(public_path() . '/' . session('admin_member_id') . '/photos/', $name);
                    $photo = session('admin_member_id') . "/photos/$name";
                } else {
                    $photo = $request->foto_exist;
                }
                $hsl = Gallery_photo::find($request->id)->update([
                    'member_id' => session('admin_member_id'),
                    'katagori' => $request->katagori,
                    'keterangan' => $request->keterangan,
                    'file_photo' => $photo,
                    'petugas' => session('admin_username')
                ]);
                if ($hsl) {
                    $des = "Update Gallery Photo, ID Member " . session('admin_member_id') . " dan ID Photo " . $request->id;
                    $a_data = array(
                        session('admin_member_id'), request()->url(),
                        request()->headers->get('referer'),
                        $_SERVER['REMOTE_ADDR'],
                        $des,
                    );
                    save_event_log_member($a_data);
                    return redirect('/admin/photo')->with(['message' => 'Data Berhasil diubah', 'alert' => 'success']);
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
            'keterangan' => 'required',
            'file_photo' => 'required'
        ]);
        if ($validasi) {
            if ($request->hasfile('file_photo')) {
                $file = $request->file('file_photo');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/' . session('admin_member_id') . '/photos/', $name);
                $photo = session('admin_member_id') . "/photos/$name";
            }
            $hsl = Gallery_photo::create([
                'member_id' => session('admin_member_id'),
                'katagori' => $request->katagori,
                'keterangan' => $request->keterangan,
                'file_photo' => $photo,
                'dilihat' => 0,
                'petugas' => session('admin_username')

            ]);
            if ($hsl) {
                $des = "Input Gallery Photo, ID Member " . session('admin_member_id');
                $a_data = array(
                    session('admin_member_id'), request()->url(),
                    request()->headers->get('referer'),
                    $_SERVER['REMOTE_ADDR'],
                    $des,
                );
                save_event_log_member($a_data);
                return redirect('/admin/photo')->with(['message' => 'Data Berhasil Ditambahkan ', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data gagal ditambahkan', 'alert' => 'danger']);
            }
        } else {
            return redirect()->back()->with(['message' => 'Data yang diinputan belum lengkap ', 'alert' => 'danger']);
        }
    }
}
