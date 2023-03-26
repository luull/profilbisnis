<?PHP

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


function daftar_customer()
{
    $key = env('KEY_KATALOG_PRODUK');
    $token = md5($key . session('admin_username'));
    $url = env('URL_KATALOG_PRODUK') . "/api/customer";
    $data = Http::get($url, [
        'token' => $token,
        'reff' => session('admin_username'),
    ]);
    if ($data['status'] == 200) {
        if ($data['record'] > 0) {
            if ($data['data']) {
                $html = '<div class="row justify-content-center">
                <div class="col-md-8 justify-content-center">
                <h5 class="text-center  text-uppercase">Daftar Customer ' . env('STORE_NAME') . '</h5>
                <table align="center" class="table table-responsive table-sm" >
                <thead style="background:#eee"><tr>
                <th>#</th>
                <th>Nama Customer</th>
                <th>Email</th>
                <th>No Handphone</th>
                <th>Tanggal Daftar</th>
                </tr></thead><tbody>';
                $x = 0;
                foreach ($data['data'] as $dt) {
                    $x++;
                    $html .= '<tr >
                    <td>' . $x . '</td>
                    <td>' . $dt['name'] . '</td>
                    <td>' . $dt['email'] . '</td>
                    <td>' . $dt['phone'] . '</td>
                  
                    <td>' . convert_tgl1($dt['tgl_daftar']) . '</td>
                    </tr>';
                }
                $html .= '</tbody></table>
                </div></div>';
                return $html;
            }
        } else {
            return 'Data tidak ditemukan';
        }
    } else {
        return '';
    }
}
function daftar_customer1($tg1, $tg2)
{
    if (empty($tg1)) {
        $tg1 = date('Y-m-d');
    }
    if (empty($tg2)) {
        $tg2 = date('Y-m-d');
    }
    $key = env('KEY_KATALOG_PRODUK');
    $token = md5($key . session('admin_username'));
    $url = env('URL_KATALOG_PRODUK') . "/api/customer";
    $data = Http::get($url, [
        'token' => $token,
        'reff' => session('admin_username'),
        'tg1' => $tg1,
        'tg2' => $tg2
    ]);

    if ($data['status'] == 200) {
        if ($data['record'] > 0) {
            if ($data['data']) {
                $html = '<div class="row justify-content-center">
                <div class="col-md-11 ">
                <h5 class="text-center  text-uppercase">Daftar Customer ' . env('STORE_NAME') . ' Hari Ini</h5>
                 <div class="col-md-8 justify-content-center">
                 <table align="center" class="table table-responsive table-sm" >
              <thead style="background:#eee"><tr>
                <th>#</th>
                <th>Nama Customer</th>
                <th>Email</th>
                <th>No Handphone</th>
                <th>Tanggal Daftar</th>
                </tr></thead><tbody>';
                $x = 0;
                foreach ($data['data'] as $dt) {
                    $x++;
                    $html .= '<tr >
                    <td>' . $x . '</td>
                    <td>' . $dt['name'] . '</td>
                    <td>' . $dt['email'] . '</td>
                    <td>' . $dt['phone'] . '</td>
                  
                    <td>' . convert_tgl1($dt['tgl_daftar']) . '</td>
                    </tr>';
                }
                $html .= '</tbody></table>
                </div></div>';
                return $html;
            }
        } else {
            return 'Data tidak ditemukan';
        }
    } else {
        return '';
    }
}
function transaction_order($status)
{
    $ket_status = array('Belum Dibayar', 'Sudah Dibayar', 'Sedang Diproses', 'Sedang Dikemas', 'Sedang Dikirim', 'Sudah Diterima', 'Selesai', '', '', 'Dibatalkan');
    //    $url = env('URL_KATALOG_PRODUK') . "/api/status-transaction/";
    $key = env('KEY_KATALOG_PRODUK');
    $token = md5($key . session('admin_username'));
    $url = env('URL_KATALOG_PRODUK') . "/api/status-transaction/";
    // $url = env('URL_KATALOG_PRODUK') . '/api/status-transaction/?token=' . $token . '&reff=' . session('admin_username') . '&status=' . $status;
    $url = env('URL_KATALOG_PRODUK') . "/api/status-transaction/";
    $data = Http::get($url, [
        'token' => $token,
        'reff' => session('admin_username'),
        'status' => $status
    ]);
    if ($data['status'] == 200) {
        if ($data['record'] > 0) {
            if ($data['data']) {
                $html = '<div class="row justify-content-center">
                <div class="col-md-11 ">
                <h5 class="text-uppercase">Daftar Order di ' . env('STORE_NAME') . ' ' . $ket_status[$data['data'][0]['status']] . '</h5>
                <table align="center" class="table table-responsive  table-sm" >
                <thead style="background:#eee"><tr>
                <th>#</th>
                <th>Nama Customer</th>
                <th>Tgl Order</th>
                <th>No Inv</th>
                <th>Sub Total</th>
                <th>Total Ongkir</th>
                <th>Total Belanja</th>
                <th>Status</th>
                </tr></thead><tbody>';
                $x = 0;
                foreach ($data['data'] as $dt) {
                    $x++;
                    $html .= '<tr >
                    <td>' . $x . '</td>
                    <td>' . $dt['name'] . '</td>
                    <td>' . convert_tgl1($dt['date_created']) . '</td>
                    <td><a href="/customer/transaction/' . $dt['id_transaction'] . '">' . $dt['id_transaction'] . '</a></td>
                    <td align="right">' . number_format($dt['sub_total']) . '</td>
                    <td align="right">' . number_format($dt['total_ongkir']) . '</td>
                    <td align="right">' . number_format($dt['total']) . '</td>
                    <td>' . $ket_status[$dt['status']] . '</td>
                    </tr>';
                }
                $html .= '</tbody></table>
                </div></div>';
                return $html;
            }
        } else {
            return 'Data tidak ditemukan';
        }
    } else {
        return '';
    }
}
function count_transaction_order($status)
{
    $url = env('URL_KATALOG_PRODUK') . "/api/status-transaction/";
    $key = env('KEY_KATALOG_PRODUK');
    $token = md5($key . session('admin_username'));
    $data = Http::get($url, [
        'token' => $token,
        'reff' => session('admin_username'),
        'status' => $status
    ]);
    if ($data['status'] == 200) {
        return $data['record'];
    } else {
        return '0';
    }
}
function replace_dt_member($wp, $member)
{
    $wp = str_replace('{{nama}}', $member->nama, $wp);
    $wp = str_replace('{{kota}}', $member->city->city_name, $wp);
    $wp = str_replace('{{propinsi}}', $member->province->province, $wp);
    $wp = str_replace('{{kecamatan}}', $member->subdistrict->subdistrict_name, $wp);
    $wp = str_replace('{{kelurahan}}', $member->kelurahan, $wp);
    $wp = str_replace('{{alamat}}', $member->alamat, $wp);
    $wp = str_replace('{{email}}', $member->email, $wp);
    $wp = str_replace('{{telp}}', $member->telp, $wp);
    $wp = str_replace('{{hp}}', $member->hp, $wp);
    $wp = str_replace('{{ig}}', $member->ig, $wp);
    $wp = str_replace('{{wa}}', $member->wa, $wp);
    $wp = str_replace('{{fb}}', $member->fb, $wp);
    $wp = str_replace('{{twitter}}', $member->twitter, $wp);
    $wp = str_replace('{{tube}}', $member->tube, $wp);
    $wp = str_replace('{{perusahaan}}', $member->perusahaan, $wp);
    $wp = str_replace('{{pekerjaan}}', $member->pekerjaan, $wp);
    $wp = str_replace('{{jabatan}}', $member->jabatan, $wp);

    return $wp;
}
function save_event_log_member($data)
{
    DB::insert('insert into event_log_member ( member_id,path,refferal,ip,description) values (?, ?,?,?,?)', $data);
}
function save_event_log_admin($data)
{
    DB::insert('insert into event_log ( user_id,path,refferal,ip,description) values (?, ?,?,?,?)', $data);
}

function save_page_traffic_member($data)
{
    DB::insert('insert into page_traffic_member ( member_id,path,refferal,ip) values (?, ?,?,?)', $data);
}

function youtube_thumb_url($url)
{
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        // URL is Not valid
        return false;
    }
    $domain = parse_url($url, PHP_URL_HOST);
    if ($domain == 'www.youtube.com' or $domain == 'youtube.com') // http://www.youtube.com/watch?v=t7rtVX0bcj8&feature=topvideos_film
    {
        if ($querystring = parse_url($url, PHP_URL_QUERY)) {
            //parse_str($querystring);
            if (!empty($v)) return "https://img.youtube.com/vi/$v/0.jpg";
            else return false;
        } else return false;
    } elseif ($domain == 'youtu.be') // something like http://youtu.be/t7rtVX0bcj8
    {
        $v = str_replace('/', '', parse_url($url, PHP_URL_PATH));
        return (empty($v)) ? false : "https://img.youtube.com/vi/$v/0.jpg";
    } else

        return false;
}

function only_month($tgl)
{
    $bln = substr($tgl, 5, 2);
    $bulan = array(
        "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
        "Agustus", "September", "Oktober", "Nopember", "Desember"
    );
    $sekarang = $bulan[(int)($bln) - 1];
    return $sekarang;
}
function only_day($tgl)
{
    $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum`at", "Sabtu");
    $thn = substr($tgl, 0, 4);
    $bln = substr($tgl, 5, 2);
    $tg = substr($tgl, 8, 2);

    $hr = date("w", mktime(0, 0, 0, $bln, $tg, $thn));
    $sekarang = $hari[$hr];
    return $sekarang;
}
function only_date($tgl)
{
    $tg = substr($tgl, 8, 2);
    $sekarang = $tg;
    return $sekarang;
}
function only_years($tgl)
{
    $thn = substr($tgl, 0, 4);
    $sekarang = $thn;
    return $sekarang;
}
function convert_tgl($tgl)
{
    $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum`at", "Sabtu");
    $thn = substr($tgl, 0, 4);
    $bln = substr($tgl, 5, 2);
    $tg = substr($tgl, 8, 2);
    $jam = substr($tgl, 11, 8);
    $hr = date("w", mktime(0, 0, 0, $bln, $tg, $thn));
    $bulan = array(
        "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
        "Agustus", "September", "Oktober", "Nopember", "Desember"
    );
    $sekarang = $hari[$hr] . ", " . $tg . " " . $bulan[(int)($bln) - 1] . " " . $thn . " " . $jam;
    return $sekarang;
}

function convert_tgl1($tgl)
{
    $thn = substr($tgl, 0, 4);
    $bln = substr($tgl, 5, 2);
    $tg = substr($tgl, 8, 2);
    $jam = substr($tgl, 11, 8);
    $hr = date("w", mktime(0, 0, 0, $bln, $tg, $thn));
    $sekarang = $tg . "-" . $bln . "-" . $thn;
    return $sekarang;
}

function convert_tgl2($tgl)
{
    $arr_tg = explode(" ", $tgl);
    $arr_tg1 = explode("-", $arr_tg[0]);
    $thn = $arr_tg1[0];
    $bln = $arr_tg1[1];
    $tg = $arr_tg1[2];
    $jam = $arr_tg[1];
    $hr = date("w");
    $sekarang = hari($hr) . ", " . $tg . "-" . $bln . "-" . $thn . " " . $jam;
    return $sekarang;
}

function hari($hr)
{
    $array_hari = array("", "Senin", "Selasa", "Rabu", "Kamis", "Jum`at", "Sabtu", "Minggu");
    return $array_hari[$hr];
}

function bulan($bl)
{
    $bl = (int) $bl;
    $array_bulan = array("", "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des");
    return $array_bulan[$bl];
}
function bulan1($bl)
{
    $bl = (int) $bl;
    $array_bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    return $array_bulan[$bl];
}

function tglsekarang()
{
    $tglskr = hari(date('N')) . " " . date('d') . "-" . bulan((int)date('m')) . "-" . date('Y');
    return $tglskr;
}
