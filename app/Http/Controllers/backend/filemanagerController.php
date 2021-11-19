<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class filemanagerController extends Controller
{
    public function index(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $r_path = $req->path;

        if (empty($r_path)) {
            $r_path = "images";
        }
        // $path = public_path('storage/'.$r_path);
        $path = public_path($r_path);
        $files = scandir($path);
        return view('backend.filemanager', compact('files', 'r_path'));
    }
    public function delete_file(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        if (file_exists(public_path($req->file))) {
            unlink(public_path($req->file));
            return redirect()->back()->with(['message' => 'File ' . $req->file . ' berhasil dihapus', 'alert' => 'success']);
        } else {

            return redirect()->back()->with(['message' => 'File ' . $req->file . ' tidak ditemukan ', 'alert' => 'danger']);
        }
    }
    public function upload_ckeditor(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('/images'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/' . $fileName);
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url')</script>";
            echo $response;
        }
    }
    public function upload_file(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $path = $req->path;
        if (empty($path)) {
            $path = "images";
        }
        return view('backend.upload_file', compact('path'));
    }
    public function upload(Request $request)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $this->validate($request, [
            'filenames' => 'required',
            'filenames.*' => 'mimes:doc,pdf,docx,xls,xlsx,rar,zip,jpg,jpeg,png,svg'
        ]);
        $path = $request->path;
        if ($request->hasfile('filenames')) {

            foreach ($request->file('filenames') as $file) {
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/' . $path, $name);
                $data[] = $name;
            }
        }

        return back()->with('success', 'Data Your files has been successfully added');
    }

    public function file_browse(Request $req)
    {
        if (empty(session('backend_user_id'))) {
            return redirect(env('APP_URL') . '/backend');
        }
        $r_path = $req->path;
        if (empty($r_path)) {
            $r_path = "images";
        }
        $path = public_path('/' . $r_path);
        $files = scandir($path);
        return view('backend.file_browse', compact('files', 'r_path'));
    }
}
