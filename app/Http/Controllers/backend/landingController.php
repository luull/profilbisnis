<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Landing;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class landingController extends Controller
{
    public function index()
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $datas = Landing::all();
        return view('backend.landing_page',compact('datas'));
    }
    
    public function create(Request $request)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $validasi = $request->validate([
            'titlelanding' => 'required',
            'section1' => 'required',
            'title1' => 'required',
            'fontcolor1' => 'required',
            'position1' => 'required',
            'format1' => 'required',
        ]);
        if ($validasi) {
            $photo1 = "";
            $photo2 = "";
            $photo3 = "";
            $photo4 = "";
            $photo5 = "";
            if ($request->hasfile('image1')) {
                $file1 = $request->file('image1');
                $originName1 = $file1->getClientOriginalName();
                $fileName1 = pathinfo($originName1, PATHINFO_FILENAME);
                $extension1 = $file1->getClientOriginalExtension();
                $name1 = $fileName1 . '.' . $extension1;
                $file1->move(public_path() . '/' . session('backend_user_id') . '/photos/', $name1);
                $photo1 = session('backend_user_id') . "/photos/$name1";
            }
            if ($request->hasfile('image2')) {
                $file2 = $request->file('image2');
                $originName2 = $file2->getClientOriginalName();
                $fileName2 = pathinfo($originName2, PATHINFO_FILENAME);
                $extension2 = $file2->getClientOriginalExtension();
                $name2 = $fileName2 . '.' . $extension2;
                $file2->move(public_path() . '/' . session('backend_user_id') . '/photos/', $name2);
                $photo2 = session('backend_user_id') . "/photos/$name2";
            }
            if ($request->hasfile('image3')) {
                $file3 = $request->file('image3');
                $originName3 = $file3->getClientOriginalName();
                $fileName3 = pathinfo($originName3, PATHINFO_FILENAME);
                $extension3 = $file3->getClientOriginalExtension();
                $name3 = $fileName3 . '.' . $extension3;
                $file3->move(public_path() . '/' . session('backend_user_id') . '/photos/', $name3);
                $photo3 = session('backend_user_id') . "/photos/$name3";
            }
            if ($request->hasfile('image4')) {
                $file4 = $request->file('image4');
                $originName4 = $file4->getClientOriginalName();
                $fileName4 = pathinfo($originName4, PATHINFO_FILENAME);
                $extension4 = $file4->getClientOriginalExtension();
                $name4 = $fileName4 . '.' . $extension4;
                $file4->move(public_path() . '/' . session('backend_user_id') . '/photos/', $name4);
                $photo4 = session('backend_user_id') . "/photos/$name4";
            }
            if ($request->hasfile('image5')) {
                $file5 = $request->file('image5');
                $originName5 = $file5->getClientOriginalName();
                $fileName5 = pathinfo($originName5, PATHINFO_FILENAME);
                $extension5 = $file5->getClientOriginalExtension();
                $name5 = $fileName5 . '.' . $extension5;
                $file5->move(public_path() . '/' . session('backend_user_id') . '/photos/', $name5);
                $photo5 = session('backend_user_id') . "/photos/$name5";
            }
            $hsl = Landing::create([
                'id_member' => session('backend_user_id'),
                'titlelanding' => Str::slug($request->titlelanding),
                'section1' => $request->section1,
                'section2' => $request->section2,
                'section3' => $request->section3,
                'section4' => $request->section4,
                'section5' => $request->section5,
                'title1' => $request->title1,
                'title2' => $request->title2,
                'title3' => $request->title3,
                'title4' => $request->title4,
                'title5' => $request->title5,
                'background1' => $request->background1,
                'background2' => $request->background2,
                'background3' => $request->background3,
                'background4' => $request->background4,
                'background5' => $request->background5,
                'fontcolor1' => $request->fontcolor1,
                'fontcolor2' => $request->fontcolor2,
                'fontcolor3' => $request->fontcolor3,
                'fontcolor4' => $request->fontcolor4,
                'fontcolor5' => $request->fontcolor5,
                'position1' => $request->position1,
                'position2' => $request->position2,
                'position3' => $request->position3,
                'position4' => $request->position4,
                'position5' => $request->position5,
                'image1' => $photo1,
                'image2' => $photo2,
                'image3' => $photo3,
                'image4' => $photo4,
                'image5' => $photo5,
                'format1' => $request->format1,
                'format2' => $request->format2,
                'format3' => $request->format3,
                'format4' => $request->format4,
                'format5' => $request->format5,
            ]);
            if ($hsl) {
                return redirect()->back()->with(['message' => 'Data berhasil ditambah', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data gagal ditambah', 'alert' => 'danger']);
            }
        }
        
    }
    public function delete(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $hsl = Landing::find($req->id)->delete();
        if ($hsl) {
            return redirect()->back()->with(['message' => 'Data berhasil dihapus', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Data gagal dihapus', 'alert' => 'danger']);
        }
    }
    public function find(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $hsl = Landing::find($req->id);
        if ($hsl) {
            return response()->json($hsl);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan', 'error' => true]);
        }
    }
    public function update(Request $request)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
            $photo1 = "";
            $photo2 = "";
            $photo3 = "";
            $photo4 = "";
            $photo5 = "";
            if ($request->hasfile('image1')) {
                $file1 = $request->file('image1');
                $originName1 = $file1->getClientOriginalName();
                $fileName1 = pathinfo($originName1, PATHINFO_FILENAME);
                $extension1 = $file1->getClientOriginalExtension();
                $name1 = $fileName1 . '.' . $extension1;
                $file1->move(public_path() . '/' . session('backend_user_id') . '/photos/', $name1);
                $photo1 = session('backend_user_id') . "/photos/$name1";
            }
            else {
                $photo1 = $request->old_photo1;
            }
            if ($request->hasfile('image2')) {
                $file2 = $request->file('image2');
                $originName2 = $file2->getClientOriginalName();
                $fileName2 = pathinfo($originName2, PATHINFO_FILENAME);
                $extension2 = $file2->getClientOriginalExtension();
                $name2 = $fileName2 . '.' . $extension2;
                $file2->move(public_path() . '/' . session('backend_user_id') . '/photos/', $name2);
                $photo2 = session('backend_user_id') . "/photos/$name2";
            }
            else {
                $photo2 = $request->old_photo2;
            }
            if ($request->hasfile('image3')) {
                $file3 = $request->file('image3');
                $originName3 = $file3->getClientOriginalName();
                $fileName3 = pathinfo($originName3, PATHINFO_FILENAME);
                $extension3 = $file3->getClientOriginalExtension();
                $name3 = $fileName3 . '.' . $extension3;
                $file3->move(public_path() . '/' . session('backend_user_id') . '/photos/', $name3);
                $photo3 = session('backend_user_id') . "/photos/$name3";
            }
            else {
                $photo3 = $request->old_photo3;
            }
            if ($request->hasfile('image4')) {
                $file4 = $request->file('image4');
                $originName4 = $file4->getClientOriginalName();
                $fileName4 = pathinfo($originName4, PATHINFO_FILENAME);
                $extension4 = $file4->getClientOriginalExtension();
                $name4 = $fileName4 . '.' . $extension4;
                $file4->move(public_path() . '/' . session('backend_user_id') . '/photos/', $name4);
                $photo4 = session('backend_user_id') . "/photos/$name4";
            }
            else {
                $photo4 = $request->old_photo4;
            }
            if ($request->hasfile('image5')) {
                $file5 = $request->file('image5');
                $originName5 = $file5->getClientOriginalName();
                $fileName5 = pathinfo($originName5, PATHINFO_FILENAME);
                $extension5 = $file5->getClientOriginalExtension();
                $name5 = $fileName5 . '.' . $extension5;
                $file5->move(public_path() . '/' . session('backend_user_id') . '/photos/', $name5);
                $photo5 = session('backend_user_id') . "/photos/$name5";
            }
            else {
                $photo5 = $request->old_photo5;
            }
            $hsl = Landing::find($request->edit_id)->update([
                'id_member' => session('backend_user_id'),
                'titlelanding' => Str::slug($request->titlelanding),
                'section1' => $request->section1,
                'section2' => $request->section2,
                'section3' => $request->section3,
                'section4' => $request->section4,
                'section5' => $request->section5,
                'title1' => $request->title1,
                'title2' => $request->title2,
                'title3' => $request->title3,
                'title4' => $request->title4,
                'title5' => $request->title5,
                'background1' => $request->background1,
                'background2' => $request->background2,
                'background3' => $request->background3,
                'background4' => $request->background4,
                'background5' => $request->background5,
                'fontcolor1' => $request->fontcolor1,
                'fontcolor2' => $request->fontcolor2,
                'fontcolor3' => $request->fontcolor3,
                'fontcolor4' => $request->fontcolor4,
                'fontcolor5' => $request->fontcolor5,
                'position1' => $request->position1,
                'position2' => $request->position2,
                'position3' => $request->position3,
                'position4' => $request->position4,
                'position5' => $request->position5,
                'image1' => $photo1,
                'image2' => $photo2,
                'image3' => $photo3,
                'image4' => $photo4,
                'image5' => $photo5,
                'format1' => $request->format1,
                'format2' => $request->format2,
                'format3' => $request->format3,
                'format4' => $request->format4,
                'format5' => $request->format5,
            ]);
            if ($hsl) {
                return redirect()->back()->with(['message' => 'Data berhasil ditambah', 'alert' => 'success']);
            } else {
                return redirect()->back()->with(['message' => 'Data gagal ditambah', 'alert' => 'danger']);
            }
        
    }

}
