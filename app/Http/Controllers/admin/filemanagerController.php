<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class filemanagerController extends Controller
{
    public function index(Request $req)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $r_path = $req->path;

        if (empty($r_path)) {
            $r_path = "images";
        }
        // $path = public_path('storage/'.$r_path);
        $path = public_path(session('admin_member_id') . '/' . $r_path);
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        $files = scandir($path);
        return view('admin.filemanager', compact('files', 'r_path'));
    }
    public function delete_file(Request $req)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        if (file_exists(public_path($req->file))) {
            unlink(public_path($req->file));
            $des = "Delete File Sukses, ID Member " . session('admin_member_id') . " File  " . $req->file;
            $a_data = array(
                session('admin_member_id'), request()->url(),
                request()->headers->get('referer'),
                $_SERVER['REMOTE_ADDR'],
                $des,
            );
            save_event_log_member($a_data);
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
            $request->file('upload')->move(public_path(session('admin_member_id') . '/images'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset(session('admin_member_id') . '/images/' . $fileName);
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url')</script>";
            echo $response;
        }
    }
    public function upload_file(Request $req)
    {
        $path = $req->path;
        if (empty($path)) {
            $path = "images";
        }
        return view('admin.upload_file', compact('path'));
    }
    public function upload(Request $request)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $this->validate($request, [
            'filenames' => 'required',
            'filenames.*' => 'mimes:doc,pdf,docx,xls,xlsx,rar,zip,jpg,jpeg,png,svg'
        ]);
        $path = $request->path;
        $file_upload = "";
        if ($request->hasfile('filenames')) {

            foreach ($request->file('filenames') as $file) {
                $originName = $file->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $name = $fileName . '.' . $extension;
                $file->move(public_path() . '/' . session('admin_member_id') . '/' . $path, $name);
                $data[] = $name;
                $file_upload .= $name . ",";
            }
            $des = "Upload File Sukses, ID Member " . session('admin_member_id') . " File  " . $file_upload;
            $a_data = array(
                session('admin_member_id'), request()->url(),
                request()->headers->get('referer'),
                $_SERVER['REMOTE_ADDR'],
                $des,
            );
            save_event_log_member($a_data);
        }


        return back()->with('success', 'Data Your files has been successfully added');
    }

    public function file_browse(Request $req)
    {
        $r_path = $req->path;
        if (empty($r_path)) {
            $r_path = "images";
        }
        $path = public_path('/' . session('admin_member_id') . '/' . $r_path);
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        $files = scandir($path);
        return view('admin.file_browse', compact('files', 'r_path'));
    }
}
