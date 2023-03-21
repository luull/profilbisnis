<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Agenda;
use Illuminate\Support\Str;

class agendaController extends Controller
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
        $data = Agenda::where('member_id', session('admin_member_id'))->get();
        return view('admin.agenda', compact('data'));
    }

    public function delete(Request $req)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $hsl = Agenda::where('id', $req->id)
            ->where('member_id', session('admin_member_id'))
            ->delete();

        if ($hsl) {
            $des = "Penghapusan data agenda ID Member " . session('admin_member_id') . " dan ID Agenda " . $req->id;
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

        $hsl = Agenda::where('id', $req->id)
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
            'tanggal' => 'required',
            'jam' => 'required',
            'acara' => 'required'
        ]);

        if ($validasi) {
            if ($request->hasfile('foto')) {

                $file = $request->file('foto');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/member-assets' . session('admin_member_id') . '/photos/', $name);
                $photo = "member-assets/". session('admin_member_id') . "/photos/$name";
            } else {
                $photo = $request->foto_exist;
            }
            $hsl = Agenda::where('id', $request->id)
                ->where('member_id', session('admin_member_id'))
                ->update([
                    'member_id' => session('admin_member_id'),
                    'tanggal' => $request->tanggal,
                    'jam' => $request->jam,
                    'acara' => $request->acara,
                    'slug' => Str::slug($request->acara),
                    'foto' => $photo,
                    'keterangan' => $request->keterangan
                ]);
            if ($hsl) {
                $des = "Update data agenda ID Member " . session('admin_member_id') . " dan ID Agenda " . $request->id;
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
    }
    public function create(Request $request)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $validasi = $request->validate([
            'tanggal' => 'required',
            'jam' => 'required',
            'acara' => 'required'
        ]);
        if ($validasi) {
            $photo = "";
            if ($request->hasfile('foto')) {

                $file = $request->file('foto');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/member-assets' . session('admin_member_id') . '/photos/', $name);
                $photo = "member-assets/". session('admin_member_id') . "/photos/$name";
            }

            $hsl = Agenda::create([
                'member_id' => session('admin_member_id'),
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'acara' => $request->acara,
                'slug' => Str::slug($request->acara),
                'foto' => $photo,
                'keterangan' => $request->keterangan
            ]);
            if ($hsl) {
                $des = "Input data agenda ID Member " . session('admin_member_id') . " judul " . $request->acara;
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
