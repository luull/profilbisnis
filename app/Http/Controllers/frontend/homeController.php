<?php

namespace App\Http\Controllers\frontend;

use App\City;
use App\Company;
use App\Http\Controllers\Controller;
use App\KategoriPekerjaan;
use Illuminate\Http\Request;
use App\Member;
use App\Province;
use App\Subdistrict;
use App\SubKategoriPekerjaan;

class homeController extends Controller
{
    public function index()
    {
        $judul = "Daftar Profil Mitra";
        $member_spesial = Member::where('level', 1)->get();
        $member_reguler = Member::where('level', 0)->get();
        $company = Company::first();


        return view('frontend.home', compact('member_reguler', 'member_spesial', 'company', 'judul'));
    }
    public function kontak()
    {
        $company = Company::first();
        $data = $company;
        return view('frontend.kontak', compact('data', 'company'));
    }
    public function member()
    {

        $judul = "Daftar Profil Mitra";
        $company = Company::first();
        $member_spesial = Member::where('level', 1)->orderBy('id', 'desc')->paginate(30);
        $member_reguler = Member::where('level', 0)->orderBy('id', 'desc')->paginate(30);
        $data = $company;
        return view('frontend.member', compact('member_spesial', 'member_reguler', 'company', 'data', 'judul'));
    }
    public function find(Request $req)
    {

        $judul = "Daftar Profil Mitra";
        $member_spesial = Member::where('level', 1)->get();
        $member_reguler = Member::where('level', 0)->get();
        $company = Company::first();
        $error = "";
        $cari = $req->s;
        if (!empty($req->s)) {
            $member_spesial = Member::where(function ($query) use ($cari) {
                $query->Where('nama', 'like', '%' . $cari . '%')
                    ->orWhere('username', 'like', '%' . $cari . '%');
            })->where('level', 1)->get();
            $member_reguler =
                Member::where(function ($query) use ($cari) {
                    $query->Where('nama', 'like', '%' . $cari . '%')
                        ->orWhere('username', 'like', '%' . $cari . '%');
                })->where('level', 0)->get();

            $judul = "Daftar Profil Mitra Berdasarkan Pencarian " . $cari;
        }
        if (count($member_spesial) == 0 && count($member_reguler) == 0) {
            $judul = "Daftar Profil Mitra";

            $member_spesial = Member::where('level', 1)->get();
            $member_reguler = Member::where('level', 0)->get();
            $error = "Pencarian dengan kata kunci <b>" . $req->s . "</b> tidak ditemukan";
        }

        return view('frontend.home', compact('member_reguler', 'member_spesial', 'company', 'error', 'judul'));
    }
    public function findByKategori(Request $req)

    {
        $judul = "Daftar Profil Mitra ";
        $member_spesial = Member::where('level', 1)->get();
        $member_reguler = Member::where('level', 0)->get();
        $company = Company::first();
        $error = "";
        $strcari = strtolower($req->s);
        $kategori = KategoriPekerjaan::whereRaw('LOWER(nama) = ?', [$strcari])->get();
        if (count($kategori) > 0) {
            $cari = $kategori[0]->id;

            if (!empty($req->s)) {
                $member_spesial = Member::Where('kategori_pekerjaan', $cari)->where('level', 1)->get();
                $member_reguler = Member::where('kategori_pekerjaan', $cari)->where('level', 0)->get();
                $judul = "Daftar Profil Mitra Kategori Pekerjaan " . ucwords($req->s);
            }
            if (count($member_spesial) == 0 && count($member_reguler) == 0) {
                $judul = "Daftar Profil Mitra";

                $member_spesial = Member::where('level', 1)->get();
                $member_reguler = Member::where('level', 0)->get();
                $error = "Pencarian Kateogri Pekerjaan <b>" . $req->s . "</b> tidak ditemukan";
            }
        } else {
            $error = "Pencarian Kateogri Pekerjaan <b>" . $req->s . "</b> tidak ditemukan";
        }


        return view('frontend.home', compact('member_reguler', 'member_spesial', 'company', 'error', 'judul'));
    }
    public function findBySubKategori(Request $req)

    {
        $judul = "Daftar Profil Mitra";
        $member_spesial = Member::where('level', 1)->get();
        $member_reguler = Member::where('level', 0)->get();
        $company = Company::first();
        $error = "";
        $strcari = strtolower($req->s);
        $kategori = SubKategoriPekerjaan::whereRaw('LOWER(nama) = ?', [$strcari])->get();
        if (count($kategori) > 0) {
            $cari = $kategori[0]->sub_kategori_id;

            if (!empty($req->s)) {
                $member_spesial = Member::Where('sub_kategori_pekerjaan',  $cari)
                    ->where('level', 1)->get();
                $member_reguler =
                    Member::where('sub_kategori_pekerjaan', $cari)->where('level', 0)->get();
                $judul = "Daftar Profil Mitra Sub Kategori Pekerjaan " . ucwords($req->s);
            }
            if (count($member_spesial) == 0 && count($member_reguler) == 0) {
                $judul = "Daftar Profil Mitra";

                $member_spesial = Member::where('level', 1)->get();
                $member_reguler = Member::where('level', 0)->get();
                $error = "Pencarian Sub Kateogri Pekerjaan <b>" . $req->s . "</b> tidak ditemukan";
            }
        } else {
            $error = "Pencarian Sub Kateogri Pekerjaan <b>" . $req->s . "</b> tidak ditemukan";
        }


        return view('frontend.home', compact('member_reguler', 'member_spesial', 'company', 'error', 'judul'));
    }
    public function findByProvince(Request $req)

    {
        $judul = "Daftar Profil Mitra";
        $member_spesial = Member::where('level', 1)->get();
        $member_reguler = Member::where('level', 0)->get();
        $company = Company::first();
        $error = "";
        $strcari = strtolower($req->s);
        $kategori = Province::whereRaw('LOWER(province) = ?', [$strcari])->get();
        if (count($kategori) > 0) {
            $cari = $kategori[0]->province_id;

            if (!empty($req->s)) {
                $member_spesial = Member::Where('propinsi',  $cari)
                    ->where('level', 1)->get();
                $member_reguler =
                    Member::where('propinsi', $cari)->where('level', 0)->get();
                $judul = "Daftar Profil Mitra Propinsi " . ucwords($req->s);
            }
            if (count($member_spesial) == 0 && count($member_reguler) == 0) {
                $judul = "Daftar Profil Mitra";
                $member_spesial = Member::where('level', 1)->get();
                $member_reguler = Member::where('level', 0)->get();
                $error = "Pencarian Propinsi <b>" . $req->s . "</b> tidak ditemukan";
            }
        } else {
            $error = "Pencarian Propinsi <b>" . $req->s . "</b> tidak ditemukan";
        }


        return view('frontend.home', compact('member_reguler', 'member_spesial', 'company', 'error', 'judul'));
    }
    public function findByCity(Request $req)

    {
        $judul = "Daftar Profil Mitra";
        $member_spesial = Member::where('level', 1)->get();
        $member_reguler = Member::where('level', 0)->get();
        $company = Company::first();
        $error = "";
        $text_cari = explode("-", $req->s);
        $strcari = strtolower($req->s);
        $kategori = City::whereRaw('LOWER(city_name) = ?', [$text_cari[1]])
            ->whereRaw('LOWER(type) = ?', [$text_cari[0]])->get();
        if (count($kategori) > 0) {
            $cari = $kategori[0]->city_id;
            if (!empty($req->s)) {
                $member_spesial = Member::Where('kota',  $cari)
                    ->where('level', 1)->get();
                $member_reguler =
                    Member::where('kota', $cari)->where('level', 0)->get();
                $judul = "Daftar Profil Mitra Kota " . ucwords($req->s);
            }
            if (count($member_spesial) == 0 && count($member_reguler) == 0) {
                $judul = "Daftar Profil Mitra";
                $member_spesial = Member::where('level', 1)->get();
                $member_reguler = Member::where('level', 0)->get();
                $error = "Pencarian Kota <b>" . $req->s . "</b> tidak ditemukan";
            }
        } else {
            $error = "Pencarian Kota <b>" . $req->s . "</b> tidak ditemukan";
        }


        return view('frontend.home', compact('member_reguler', 'member_spesial', 'company', 'error', 'judul'));
    }
    public function findBySubdistrict(Request $req)

    {
        $judul = "Daftar Profil Mitra";
        $member_spesial = Member::where('level', 1)->get();
        $member_reguler = Member::where('level', 0)->get();
        $company = Company::first();
        $error = "";
        $strcari = strtolower($req->s);
        $kategori = Subdistrict::whereRaw('LOWER(subdistrict_name) = ?', [$strcari])->get();
        if (count($kategori) > 0) {
            $cari = $kategori[0]->province_id;

            if (!empty($req->s)) {
                $member_spesial = Member::Where('kecamatan',  $cari)
                    ->where('level', 1)->get();
                $member_reguler =
                    Member::where('kota', $cari)->where('kecamatan', 0)->get();
                $judul = "Daftar Profil Mitra Kecamatan " . ucwords($req->s);
            }
            if (count($member_spesial) == 0 && count($member_reguler) == 0) {
                $judul = "Daftar Profil Mitra";
                $member_spesial = Member::where('level', 1)->get();
                $member_reguler = Member::where('level', 0)->get();
                $error = "Pencarian Kecamatan <b>" . $req->s . "</b> tidak ditemukan";
            }
        } else {
            $error = "Pencarian Kecamatan <b>" . $req->s . "</b> tidak ditemukan";
        }


        return view('frontend.home', compact('member_reguler', 'member_spesial', 'company', 'error', 'judul'));
    }
}
