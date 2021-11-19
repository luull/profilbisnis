<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AgendaDefault;
use Illuminate\Support\Str;

class agendaController extends Controller
{
    public function index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $data = AgendaDefault::all();
        return view('backend.agenda', compact('data'));
    }

    public function delete(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $hsl = AgendaDefault::where('id', $req->id)
            ->delete();
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
        $hsl = AgendaDefault::where('id', $req->id)
            ->first();
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
                $file->move(public_path() . '/' . session('member_id') . '/photos/', $name);
                $photo = session('member_id') . "/photos/$name";
            } else {
                $photo = $request->foto_exist;
            }
            $hsl = AgendaDefault::where('id', $request->id)
                ->update([
                    'tanggal' => $request->tanggal,
                    'jam' => $request->jam,
                    'acara' => $request->acara,
                    'slug' => Str::slug($request->acara),
                    'foto' => $photo,
                    'keterangan' => $request->keterangan
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
                $file->move(public_path() . '/' . session('member_id') . '/photos/', $name);
                $photo = session('member_id') . "/photos/$name";
            }

            $hsl = AgendaDefault::create([
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'acara' => $request->acara,
                'slug' => Str::slug($request->acara),
                'foto' => $photo,
                'keterangan' => $request->keterangan
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
