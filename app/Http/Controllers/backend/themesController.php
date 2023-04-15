<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Themes;
use Illuminate\Http\Request;

class themesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $backend_themes = Themes::all();
        return view('backend.themes', compact('backend_themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $validasi = $req->validate([
            'name' => 'required',
            'template' => 'required',
        ]);
        if ($request->hasfile('picture')) {
            $file = $request->file('picture');
            $originName = $file->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $name = $fileName . '.' . $extension;
            $file->move(public_path() . '/screenshot/', $name);
            $photo = "/screenshot/$name";
        }
        if ($validasi) {

            $hsl = Themes::create([
                'name' => $req->name,
                'picture' => $photo,
                'template' => $req->template,
                'user_id' => session('backend_user_id')
            ]);
            if ($hsl) {
                return redirect()->back()->with(['message' => 'Template berhasil ditambahkan', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Template  gagal disimpan', 'alert' => 'danger']);
            }
        } else {
            return redirect()->back()->with(['message' => 'Data tidak lengkap', 'alert' => 'danger']);
        }
    }

    public function update(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if (($req->id) > 0) {

            $validasi = $req->validate([
                'edit_name' => 'required',
                'edit_template' => 'required',
            ]);
            if ($request->hasfile('picture')) {
                $file = $request->file('picture');
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/screenshot/', $name);
                $photo = "/screenshot/$name";
            }
            else {
                $photo = $request->default;
            }
            if ($validasi) {

                $hsl = Themes::where('id', $req->id)->update([
                    'name' => $req->edit_name,
                    'picture' => $photo,
                    'template' => $req->edit_template,
                    'user_id' => session('backend_user_id'),
                ]);
                if ($hsl) {
                    return redirect()->back()->with(['message' => 'Template berhasil diupdate', 'alert' => 'success']);
                } else {
                    return redirect()->back()->with(['message' => 'Template gagal diupdate', 'alert' => 'danger']);
                }
            }
        }
        return redirect()->back()->with(['message' => 'Data tidak lengkap', 'alert' => 'danger']);
    }



    public function find(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if (!empty($req->id)) {

            $hsl = Themes::where('id', $req->id)->first();
            if ($hsl) {
                return response()->json(['hasil' => $hsl]);
            } else {
                return response()->json(['message' => 'Data tidak ditemukan', 'error' => true]);
            }
        } else {
            return response()->json(['message' => 'Data tidak ditemukan', 'error' => true]);
        }
    }
    public function delete(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if (!empty($req->id)) {

            $dt = Themes::where('id', $req->id);
            if ($dt) {

                $hsl = $dt->delete();

                if ($hsl) {
                    return redirect()->back()->with(['message' => 'Data berhasil dihapus', 'alert' => 'success']);
                } else {
                    return redirect()->back()->with(['message' => 'Data gagal dihapus', 'alert' => 'danger']);
                }
            } else {
                return redirect()->back()->with(['message' => 'Data tidak ditemukan ', 'alert' => 'danger']);
            }
        }
    }
}
