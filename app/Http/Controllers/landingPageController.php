<?php

namespace App\Http\Controllers;

use App\BankContent;
use App\Landing;
use App\Landing_page;
use App\Member;
use App\Province;
use App\City;
use App\Subdistrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Jorenvh\Share\ShareFacade;
use Illuminate\Support\Str;

class landingPageController extends Controller
{
    public function index(Request $req)
    {
        // if (session('member_id') == null || session('username') == null) {
        //     return redirect(env('APP_URL') . '/');
        // }
        $share = ShareFacade::page(URL::current())
        ->whatsapp()
        ->facebook()
        ->twitter()
        ->telegram()->getRawLinks();
        $data = Landing::where('titlelanding', $req->slug)->first();
        //    dd($data);
        return view('landing-page', compact('data','share'));
    }
    public function shared(Request $req)
    {
        // $get = Str::slug($req->slug);
        $data = Landing::where('titlelanding', $req->slug)->first();
        $data2 = BankContent::where('id', $req->id)->first();
        $user = Member::where('id', $req->member)->first();
        $province = Province::all();
        // dd($req->slug);
    //    dd($data);
       return view('landing-page-shared', compact('data','data2','user','province'));
    }
    public function send(Request $req)
    {
        $getprovince = Province::where('province_id', $req->propinsi)->first();
        $getcity = City::where('city_id', $req->kota)->first();
        $getsubdistrict = Subdistrict::where('subdistrict_id', $req->kecamatan)->first();
        $firsturl = str_replace(" ", "%20", $req->produk);
        $resulturl = str_replace("&", "n", $firsturl);
        // dd($getsubdistrict->subdistrict_name);
        return redirect('https://api.whatsapp.com/send?phone=' . $req->wa . '&text=Nama: ' . $req->name . ', Email: ' . $req->email . ', No Hp: ' . $req->no_telp . ', Pesanan: (' . $req->qty . ') ' . $resulturl . ', Alamat Lengkap: ' . $req->address . ', ' . $getsubdistrict->subdistrict_name . ', ' . $getcity->type . ' ' . $getcity->city_name . ', ' . $getprovince->province);
    }
}
