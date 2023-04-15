<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BankContent;
use App\Landing;
use Jorenvh\Share\ShareFacade;
use Illuminate\Support\Str;

class bankContentController extends Controller
{
    public function index(Request $req)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $search = $req->search;
        if ($search) {
            $data = BankContent::join('landing','bank_content.landing_page','=','landing.id')
            ->select(['bank_content.*','landing.titlelanding','landing.id as lid'])
            ->where('bank_content.materi',  'LIKE', '%' . $search . '%')
            ->get();
        }else{

            $data = BankContent::join('landing','bank_content.landing_page','=','landing.id')->select(['bank_content.*','landing.titlelanding','landing.id as lid'])->get();
        }
        // $shareProduct = ShareFacade::page(env('APP_URL')."/display/".session('data')->username."/".$produk->slug)
        // ->whatsapp()
        // ->facebook()
        // ->twitter()
        // ->telegram()->getRawLinks();
        return view('admin.bank_content', compact('data','search'));
    }
    public function display(Request $req)
    {
        if (empty(session('admin_member_id'))) {
            return redirect(env('APP_URL') . '/c-panel');
        }
        $data = BankContent::where('id',$req->id)->first();
        // dd($data);
        $landing = Landing::where('id', $data->landing_page)->first();
        $link = env('APP_URL').'/shared/'.session('admin_member_id').'/'.$data->id.'/'.$landing->titlelanding;
        $sharelanding = ShareFacade::page($link)
        ->whatsapp()
        ->facebook()
        ->twitter()
        ->telegram()->getRawLinks();
        return view('admin.content_display', compact('data','sharelanding','link'));
    }
}