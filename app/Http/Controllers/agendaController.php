<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use App\AgendaDefault;

class agendaController extends Controller
{
    public function index()
    {
        if (session('member_id') == null || session('username') == null) {
            return redirect(env('APP_URL') . '/');
        }

        $a_data = array(
            session('data')->id, request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'],
        );
        save_page_traffic_member($a_data);
        $agenda_default = AgendaDefault::where('tanggal', '>=', date('Y-m-d'))->get();
        $data = Agenda::where('tanggal', '>=', date('Y-m-d'))->where('member_id', session('member_id'))->get();

        $theme = session('themes');
        $view = "templates.$theme.agenda";
        $meta_title = 'Agenda Kegiatan ' . env('APP_COMPANY');
        $meta_keywords = "agenda kegiatan, maximax ";
        $meta_description = "Daftar Agenda Seputar Kegiatan " . env('APP_COMPANY') . " :";
        return view($view, compact('data', 'meta_title', 'meta_description', 'meta_keywords', 'agenda_default'));
    }

    public function agenda(Request $req)
    {
        if (!session('username') || session('username') == null) {
            //  session(['member_id'=>ENV('MEMBER_ID')]);
            return view('welcome');
        }
        $a_data = array(
            session('data')->id, request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'],
        );
        save_page_traffic_member($a_data);
        $data = Agenda::where('slug', $req->id)->firstOrFail();
        $theme = session('themes');
        $view = "templates.$theme.detil_agenda";
        $meta_title =  $data->acara;
        $meta_keywords = $data->acara;
        $meta_description = $data->keterangan;
        $meta_title = strip_tags($meta_title);
        $meta_keywords = strip_tags($meta_keywords);
        $meta_description = strip_tags($meta_description);

        return view($view, compact('data', 'meta_title', 'meta_description', 'meta_keywords'));
    }
    public function agenda1(Request $req)
    {
        if (!session('username') || session('username') == null) {
            //  session(['member_id'=>ENV('MEMBER_ID')]);
            return view('welcome');
        }
        $a_data = array(
            session('data')->id, request()->url(), request()->headers->get('referer'), $_SERVER['REMOTE_ADDR'],
        );
        save_page_traffic_member($a_data);
        $data = AgendaDefault::where('slug', $req->id)->firstOrFail();
        $theme = session('themes');
        $view = "templates.$theme.detil_agenda";
        $meta_title =  $data->acara;
        $meta_keywords = $data->acara;
        $meta_description = $data->keterangan;
        $meta_title = strip_tags($meta_title);
        $meta_keywords = strip_tags($meta_keywords);
        $meta_description = strip_tags($meta_description);

        return view($view, compact('data', 'meta_title', 'meta_description', 'meta_keywords'));
    }
}
