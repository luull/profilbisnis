<?php

namespace App\Http\Controllers\backend;

use App\BankContent;
use App\Http\Controllers\Controller;
use App\Landing;
use App\ProdukDefault;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class bankContentController extends Controller
{
    public function index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        //$datas=Produk::all();
        $datas = BankContent::join('landing','bank_content.landing_page','=','landing.id')->select(['bank_content.*','landing.titlelanding','landing.id as lid'])->get();
        $landing_page = Landing::all();
        $produk = ProdukDefault::all();
        // dd($datas);

        return view('backend.bank_content', compact('datas','landing_page','produk'));
    }
    public function delete(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $hsl = BankContent::find($req->id)->delete();
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
        $hsl = BankContent::find($req->id);
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
                'materi' => 'required',
                'produk' => 'required',
                'caption' => 'required',
                'landing_page' => 'required',
                'tag' => 'required',
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
                $hsl = BankContent::find($request->id)->update([
                    'materi' => $request->materi,
                    'produk' => $request->produk,
                    'video' => $request->video,
                    'caption' => $request->caption,
                    'landing_page' => $request->landing_page,
                    'tag' => $request->tag,
                    'foto' => $photo,
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
            'materi' => 'required',
            'produk' => 'required',
            'caption' => 'required',
            'landing_page' => 'required',
            'tag' => 'required',
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
            $hsl = BankContent::create([
                'produk' => $request->produk,
                'materi' => $request->materi,
                'video' => $request->video,
                'caption' => $request->caption,
                'landing_page' => $request->landing_page,
                'tag' => $request->tag,
                'foto' => $photo,
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
