<?php

use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register/verify', 'registerController@index');
Route::post('/register/verify/login', 'registerController@login')->name('verify_login');
Route::get('/register', 'registerController@register');
Route::post('/register/create', 'registerController@create')->name('create_member');
Route::get('/c-panel', 'loginController@index')->name('login');
Route::get('/backend', 'loginController@backend')->name('backend');
Route::get('/login', 'loginController@index')->name('login');
Route::get('/c-panel/reset', 'loginController@reset');
Route::get('/backend/reset', 'loginController@reset_backend');
Route::view('/lupa_password_backend', 'backend.lupa_password');
Route::post('/lupa_password_backend', 'loginController@lupa_password_backend')->name('lupa_password_backend');
Route::get('/ubah_password_backend/{id}', 'loginController@ubah_password_backend');
Route::post('/ganti_password_backend', 'loginController@proses_ubah_password_backend')->name('ganti_password_backend');

Route::view('/lupa_password', 'admin.lupa_password');
Route::post('/lupa_password', 'loginController@lupa_password')->name('lupa_password');
Route::get('/ubah_password/{id}', 'loginController@ubah_password');
Route::post('/ganti_password', 'loginController@proses_ubah_password')->name('ganti_password');

Route::get('/', 'frontend\HomeController@index');
Route::post('/', 'frontend\HomeController@find')->name('find_member');
Route::get('/findmember/kategori-pekerjaan/{s}', 'frontend\HomeController@findByKategori');
Route::get('/findmember/sub-kategori-pekerjaan/{s}', 'frontend\HomeController@findBySubKategori');
Route::get('/findmember/propinsi/{s}', 'frontend\HomeController@findByProvince');
Route::get('/findmember/kota/{s}', 'frontend\HomeController@findByCity');
Route::get('/findmember/kecamatan/{s}', 'frontend\HomeController@findBySubdistrict');
Route::get('/sub-kategori-pekerjaan/{id}', 'profilController@sub_kategori_pekerjaan');
Route::get('/kategori-pekerjaan/{id}', 'profilController@kategori_pekerjaan');

Route::get('/contact', 'frontend\HomeController@kontak');
Route::get('/member', 'frontend\HomeController@member');
Route::get('/city/find/{id}', 'admin\profileController@city_list');
Route::get('/subdistrict/find/{id}', 'admin\profileController@subdistrict_list');
Route::get('/bisnis', 'bisnisController@index');
Route::get('/produk', 'produkController@index')->name('findproduk');
Route::get('/profil', 'profilController@index');
Route::get('/foto', 'fotoController@index');
Route::get('/video', 'videoController@index');
Route::get('/kartunama/{id}', 'kartunamaController@kartu_nama');
Route::get('/kartunama', 'HomeController@index');
Route::get('/bisnis1/{id}', 'bisnisController@detilBisnis1');
Route::get('/bisnis/{id}', 'bisnisController@detilBisnis');
Route::get('/bisnis/produk/{id}', 'bisnisController@produkBisnis')->name('findprodukbisnis');
Route::get('/bisnis1/produk/{id}', 'bisnisController@produkBisnis1')->name('findprodukbisnis1');
Route::get('/produk/{member}/{id}', 'produkController@detilProduk');
Route::get('/produk1/{member}/{id}', 'produkController@detilProduk1');
Route::get('/kontak', 'kontakController@index');
Route::get('/agenda', 'agendaController@index');
Route::get('/agenda1', 'agendaController@index1');
Route::get('/agenda/{id}', 'agendaController@agenda');
Route::get('/agenda1/{id}', 'agendaController@agenda1');
Route::get('/landing-page/{id}/{slug}', 'landingPageController@index');

Route::get('/testimoni/{slug}', 'testimoniController@index');
Route::get('/testimoni1/{slug}', 'testimoniController@index1');
Route::get('/testimoni/detil/{member}/{id}', 'testimoniController@detil');
Route::get('/testimoni1/detil/{member}/{id}', 'testimoniController@detil1');

Route::get('/registrasi', function () {
    return view('templates.basic.register');
});
Route::view('welcome', 'templates.basic.welcome');
Route::get('logout', 'loginController@logout')->name('logout');
Route::get('logout_backend', 'loginController@logout_backend')->name('logout_backend');
Route::group(['middleware' => 'backendMiddlware'], function () {
});

Route::group(['middleware' => 'backendMiddleware'], function () {
    Route::get('/backend/import', 'backend\memberController@import_member');
    Route::get('/backend/themes', 'backend\themesController@index');
    Route::get('/backend/themes/find/{id}', 'backend\themesController@find');
    route::post('/backend/themes/save', 'backend\themesController@save')->name('save_themes');
    route::post('/backend/themes/update', 'backend\themesController@update')->name('update_themes');
    route::get('/backend/themes/delete/{id}', 'backend\themesController@delete');
    Route::get('/backend/card', 'backend\cardController@index');
    Route::get('/backend/card/find/{id}', 'backend\cardController@find');
    route::post('/backend/card/save', 'backend\cardController@save')->name('save_card');
    route::post('/backend/card/update', 'backend\cardController@update')->name('update_card');
    route::get('/backend/card/delete/{id}', 'backend\cardController@delete');
    Route::get('/backend/member', 'backend\memberController@index');
    Route::get('/backend/member/find/{id}', 'backend\memberController@find');
    Route::get('/backend/member/bisnis/{id}', 'backend\memberController@member_bisnis');
    Route::get('/backend/member/produk/{id}', 'backend\memberController@member_produk');
    Route::get('/backend/member/photo/{id}', 'backend\memberController@member_photo');
    Route::get('/backend/member/video/{id}', 'backend\memberController@member_video');
    Route::get('/backend/member/testimoni/{id}', 'backend\memberController@member_testimoni');
    Route::get('/backend/member/bank/{id}', 'backend\memberController@member_bank');
    Route::get('/backend/member/banner/{id}', 'backend\memberController@member_banner');
    Route::get('/backend/member/welcome/{id}', 'backend\memberController@member_welcome');
    Route::get('/backend/member/wa-template/{id}', 'backend\memberController@member_wa_template');
    Route::get('/backend/member/ubah-password/{id}', 'backend\memberController@member_ubah_password');
    Route::post('/backend/member/ubah-password/', 'backend\memberController@proses_ubah_password_member')->name('ubah_password_member');
    route::get('/backend/member/profil/{id}', 'backend\memberController@member_profil');
    route::get('/backend/member/edit/{id}', 'backend\memberController@edit_member');
    route::get('/backend/member/input', 'backend\memberController@input_member');
    route::get('/backend/member/cekusername/{username}', 'backend\memberController@findusername');
    route::post('/backend/member/save', 'backend\memberController@create_member')->name('save_input_member');
    route::post('/backend/member/update', 'backend\memberController@update_member')->name('save_edit_member');
    route::get('/backend/member/delete/{id}', 'backend\memberController@delete');
    route::get('/backend/kategori-pekerjaan', 'backend\kategoriPekerjaanController@index');
    route::get('/backend/kategori-pekerjaan/findall', 'backend\kategoriPekerjaanController@findall');
    route::post('/backend/kategori-pekerjaan/save', 'backend\kategoriPekerjaanController@save')->name('save_kategori_pekerjaan');
    route::post('/backend/kategori-pekerjaan/update', 'backend\kategoriPekerjaanController@update')->name('update_kategori_pekerjaan');
    route::get('/backend/kategori-pekerjaan/delete/{id}', 'backend\kategoriPekerjaanController@delete');
    route::get('/backend/sub-kategori-pekerjaan', 'backend\kategoriPekerjaanController@sub_index');
    route::post('/backend/sub-kategori-pekerjaan/save', 'backend\kategoriPekerjaanController@sub_save')->name('save_sub_kategori_pekerjaan');
    route::post('/backend/sub-kategori-pekerjaan/update', 'backend\kategoriPekerjaanController@sub_update')->name('update_sub_kategori_pekerjaan');
    route::get('/backend/sub-kategori-pekerjaan/delete/{id}', 'backend\kategoriPekerjaanController@sub_delete');
    route::get('/backend/sub-kategori-pekerjaan/{id}', 'backend\kategoriPekerjaanController@sub_kategori_pekerjaan_find');



    Route::post('/backend/change_password/update', 'backend\adminController@proses_ubah_password')->name('proses_ubah_password_backend');
    Route::get('/backend/dashboard', 'HomeController@dashboard_backend');
    Route::get('/backend/profile', 'backend\profileController@index');
    Route::post('/backend/profile', 'backend\profileController@update')->name('update_profile_admin');
    Route::get('/backend/ubah_password', 'backend\profileController@ubah_password');
    Route::post('/backend/ubah_password', 'backend\profileController@proses_ubah_password')->name('ubah_password_backend');
    Route::get('/backend/admin', 'backend\adminController@index');
    Route::post('/backend/admin/save', 'backend\adminController@create')->name('save_admin_backend');
    Route::post('/backend/admin/update', 'backend\adminController@update')->name('update_admin_backend');
    Route::get('/backend/admin/delete/{id}', 'backend\adminController@delete')->name('delete_admin_backend');
    Route::get('/backend/admin/find/{id}', 'backend\adminController@find');

    Route::post('/backend/testimoni/save', 'backend\testimoniController@create')->name('save_testimoni_backend');
    Route::post('/backend/testimoni/update', 'backend\testimoniController@update')->name('update_testimoni_backend');
    Route::get('/backend/testimoni/delete/{id}', 'backend\testimoniController@delete')->name('delete_testimoni_backend');
    Route::get('/backend/testimoni/find/{id}', 'backend\testimoniController@find');
    Route::get('/backend/testimoni', 'backend\testimoniController@index');
    Route::post('/backend/wa-templates', 'backend\WaTemplatesController@update')->name('update_wa_templates_backend');
    Route::get('/backend/wa-templates', 'backend\WaTemplatesController@index');
    Route::post('/backend/photo-profile', 'backend\profileController@proses_upload_foto')->name('upload_foto_backend');
    Route::get('/backend/photo-profile', 'backend\profileController@upload_foto')->name('upload_foto_profile');
    Route::get('/backend/welcome_note', 'backend\profileController@welcome_note');
    Route::post('/backend/welcome_note/update', 'backend\profileController@update_welcome_note')->name('update_welcome_note_backend');
    Route::post('/backend/produk/save', 'backend\produkController@create')->name('save_produk_backend');
    Route::post('/backend/produk/update', 'backend\produkController@update')->name('update_produk_backend');
    Route::get('/backend/produk/delete/{id}', 'backend\produkController@delete')->name('delete_produk_backend');
    Route::get('/backend/produk/find/{id}', 'backend\produkController@find');
    Route::get('/backend/produk', 'backend\produkController@index');

    Route::post('/backend/display/save', 'backend\displayController@create')->name('display_produk');
    Route::post('/backend/display/update', 'backend\displayController@update')->name('update_display');
    Route::get('/backend/display/delete/{id}', 'backend\displayController@delete')->name('delete_display');
    Route::get('/backend/display/find/{id}', 'backend\displayController@find');
    Route::get('/backend/display', 'backend\displayController@index');

    Route::get('/backend/konfigurasi', 'backend\konfigurasiController@index');
    Route::post('/backend/konfigurasi', 'backend\konfigurasiController@update')->name('update_konfigurasi');

    Route::post('/backend/photo/save', 'backend\photoController@create')->name('save_photo_backend');
    Route::post('/backend/photo/update', 'backend\photoController@update')->name('update_photo_backend');
    Route::get('/backend/photo/delete/{id}', 'backend\photoController@delete')->name('delete_photo_backend');
    Route::get('/backend/photo/find/{id}', 'backend\photoController@find');
    Route::get('/backend/photo', 'backend\photoController@index');
    Route::post('/backend/bank/save', 'backend\bankController@create')->name('save_bank_backend');
    Route::post('/backend/bank/update', 'backend\bankController@update')->name('update_bank_backend');
    Route::get('/backend/bank/delete/{id}', 'backend\bankController@delete')->name('delete_bank_backend');
    Route::get('/backend/bank/find/{id}', 'backend\bankController@find');
    Route::get('/backend/bank', 'backend\bankController@index');
    Route::get('/backend/agenda', 'backend\agendaController@index');
    Route::post('/backend/agenda/save', 'backend\agendaController@create')->name('save_agenda_backend');
    Route::post('/backend/agenda/update', 'backend\agendaController@update')->name('update_agenda_backend');
    Route::get('/backend/agenda/delete/{id}', 'backend\agendaController@delete')->name('delete_agenda_backend');
    Route::get('/backend/agenda/find/{id}', 'backend\agendaController@find');
    Route::get('/backend/banner', 'backend\bannerController@index');
    Route::post('/backend/banner/save', 'backend\bannerController@create')->name('save_banner_backend');
    Route::post('/backend/banner/update', 'backend\bannerController@update')->name('update_banner_backend');
    Route::get('/backend/banner/delete/{id}', 'backend\bannerController@delete')->name('delete_banner_backend');
    Route::get('/backend/banner/find/{id}', 'backend\bannerController@find');
    Route::post('/backend/video/save', 'backend\videoController@create')->name('save_video_backend');
    Route::post('/backend/video/update', 'backend\videoController@update')->name('update_video_backend');
    Route::get('/backend/video/delete/{id}', 'backend\videoController@delete')->name('delete_video_backend');
    Route::get('/backend/video/find/{id}', 'backend\videoController@find');
    Route::get('/backend/video', 'backend\videoController@index');
    Route::get('/json/bisnis/', 'backend\bisnisController@json');
    Route::get('/backend/bisnis/find/{id}', 'backend\bisnisController@find');
    Route::post('/backend/bisnis/save', 'backend\bisnisController@create')->name('save_bisnis_backend');
    Route::post('/backend/bisnis/update', 'backend\bisnisController@update')->name('update_bisnis_backend');
    Route::get('/backend/bisnis/delete/{id}', 'backend\bisnisController@delete')->name('delete_bisnis_backend');
    Route::get('/backend/file/delete', 'backend\filemanagerController@delete_file')->name('delete_file_backend');
    Route::get('/backend/filemanager/{path}', 'backend\filemanagerController@index');
    Route::get('/backend/filemanager', 'backend\filemanagerController@index');
    Route::post('/backend/upload', 'backend\filemanagerController@upload')->name('upload_backend');
    Route::get('/backend/upload/{path}', 'backend\filemanagerController@upload_file');
    Route::post('/backend/upload_ckeditor', 'backend\filemanagerController@upload_ckeditor')->name('ckeditor.upload.backend');
    Route::get('/backend/file_browse', 'backend\filemanagerController@file_browse');
    Route::get('/backend/bisnis', 'backend\bisnisController@index');
    Route::get('/backend/cpanel/{id}', 'backend\memberController@cpanel');
    Route::get('/dashboard', 'loginController@dashboard')->name('dashboard');
    Route::get('/backend/content', function () {
        return view('backend.content');
    });
});

Route::group(['middleware' => 'loginMiddleware'], function () {
    Route::get('/admin/token', 'admin\tokenController@index');
    Route::post('/admin/token/save', 'admin\tokenController@create')->name('create_token');
    Route::get('/admin/token/find/{id}', 'admin\tokenController@find');
    Route::get('/admin/belitoken', 'admin\tokenController@buy');
    Route::get('/admin/belitoken/find/{id}', 'admin\tokenController@findbeli');
    Route::post('/admin/belitoken/bukti', 'admin\tokenController@bukti')->name('bukti');
    Route::get('/admin/datamember', 'admin\tokenController@datamember');
    Route::get('/admin/profile', 'admin\profileController@index');
    Route::post('/admin/profile', 'admin\profileController@update')->name('update_profile');
    Route::get('/admin/themes', 'admin\themesController@index');
    Route::post('/admin/themes', 'admin\themesController@updateThemes')->name('update_themes');;
    Route::get('/admin/profile', 'admin\profileController@index');
    Route::post('/admin/profile', 'admin\profileController@update')->name('update_profile');
    Route::get('/admin/ubah_password', 'admin\profileController@ubah_password');
    Route::post('/admin/ubah_password', 'admin\profileController@proses_ubah_password')->name('ubah_password');
    Route::get('/admin/landing-page', 'admin\landingPageController@index');
    Route::post('/admin/landing-page/save', 'admin\landingPageController@create')->name('save_landing_page');
    Route::post('/admin/landing-page/update', 'admin\landingPageController@update')->name('update_landing_page');
    Route::get('/admin/landing-page/delete/{id}', 'admin\landingPageController@delete');
    Route::get('/admin/landing-page/find/{id}', 'admin\landingPageController@find');

    Route::post('/admin/testimoni/save', 'admin\testimoniController@create')->name('save_testimoni');
    Route::post('/admin/testimoni/update', 'admin\testimoniController@update')->name('update_testimoni');
    Route::get('/admin/testimoni/delete/{id}', 'admin\testimoniController@delete')->name('delete_testimoni');
    Route::get('/admin/testimoni/find/{id}', 'admin\testimoniController@find');
    Route::get('/admin/testimoni', 'admin\testimoniController@index');
    Route::post('/admin/wa-templates', 'admin\WaTemplatesController@update')->name('update_wa_templates');
    Route::get('/admin/wa-templates', 'admin\WaTemplatesController@index');
    Route::post('/admin/photo-profile', 'admin\profileController@proses_upload_foto')->name('upload_foto_profile');
    Route::get('/admin/photo-profile', 'admin\profileController@upload_foto')->name('upload_foto_profile');
    Route::get('/admin/welcome_note', 'admin\profileController@welcome_note');
    Route::post('/admin/welcome_note/update', 'admin\profileController@update_welcome_note')->name('update_welcome_note');
    Route::post('/admin/produk/save', 'admin\produkController@create')->name('save_produk');
    Route::post('/admin/produk/update', 'admin\produkController@update')->name('update_produk');
    Route::get('/admin/produk/delete/{id}', 'admin\produkController@delete')->name('delete_produk');
    Route::get('/admin/produk/find/{id}', 'admin\produkController@find');
    Route::get('/admin/produk', 'admin\produkController@index');
    Route::get('/admin/display/delete/{id}', 'admin\displayController@delete')->name('delete_produk');
    Route::post('/admin/photo/save', 'admin\photoController@create')->name('save_photo');
    Route::post('/admin/photo/update', 'admin\photoController@update')->name('update_photo');
    Route::get('/admin/photo/delete/{id}', 'admin\photoController@delete')->name('delete_photo');
    Route::get('/admin/photo/find/{id}', 'admin\photoController@find');
    Route::get('/admin/photo', 'admin\photoController@index');
    Route::post('/admin/bank/save', 'admin\bankController@create')->name('save_bank');
    Route::post('/admin/bank/update', 'admin\bankController@update')->name('update_bank');
    Route::get('/admin/bank/delete/{id}', 'admin\bankController@delete')->name('delete_bank');
    Route::get('/admin/bank/find/{id}', 'admin\bankController@find');
    Route::get('/admin/bank', 'admin\bankController@index');
    Route::get('/admin/agenda', 'admin\agendaController@index');
    Route::post('/admin/agenda/save', 'admin\agendaController@create')->name('save_agenda');
    Route::post('/admin/agenda/update', 'admin\agendaController@update')->name('update_agenda');
    Route::get('/admin/agenda/delete/{id}', 'admin\agendaController@delete')->name('delete_agenda');
    Route::get('/admin/agenda/find/{id}', 'admin\agendaController@find');
    Route::get('/admin/banner', 'admin\bannerController@index');
    Route::post('/admin/banner/save', 'admin\bannerController@create')->name('save_banner');
    Route::post('/admin/banner/update', 'admin\bannerController@update')->name('update_banner');
    Route::get('/admin/banner/delete/{id}', 'admin\bannerController@delete')->name('delete_banner');
    Route::get('/admin/banner/find/{id}', 'admin\bannerController@find');

    Route::post('/admin/video/save', 'admin\videoController@create')->name('save_video');
    Route::post('/admin/video/update', 'admin\videoController@update')->name('update_video');
    Route::get('/admin/video/delete/{id}', 'admin\videoController@delete')->name('delete_video');
    Route::get('/admin/video/find/{id}', 'admin\videoController@find');
    Route::get('/admin/video', 'admin\videoController@index');
    Route::get('/json/bisnis/', 'admin\bisnisController@json');
    Route::get('/admin/bisnis/find/{id}', 'admin\bisnisController@find');
    Route::post('/admin/bisnis/save', 'admin\bisnisController@create')->name('save_bisnis');
    Route::post('/admin/bisnis/update', 'admin\bisnisController@update')->name('update_bisnis');
    Route::get('/admin/bisnis/delete/{id}', 'admin\bisnisController@delete')->name('delete_bisnis');
    Route::get('/admin/file/delete', 'admin\filemanagerController@delete_file')->name('delete_file');
    Route::get('/admin/filemanager/{path}', 'admin\filemanagerController@index');
    Route::get('/admin/filemanager', 'admin\filemanagerController@index');
    Route::post('/admin/upload', 'admin\filemanagerController@upload')->name('upload');
    Route::get('/admin/upload/{path}', 'admin\filemanagerController@upload_file');
    Route::post('/admin/upload_ckeditor', 'admin\filemanagerController@upload_ckeditor')->name('ckeditor.upload');
    Route::get('/admin/file_browse', 'admin\filemanagerController@file_browse');
    Route::get('/admin/bisnis', 'admin\bisnisController@index');
    Route::get('/dashboard', 'loginController@dashboard')->name('dashboard');
    Route::get('/admin/content', function () {
        return view('admin.content');
    });
    Route::get('/admin', function () {
        return view('admin.master');
    });
});
Route::post('/dashboard', 'loginController@login')->name('proses_login');
Route::post('/backend/dashboard', 'loginController@login_backend')->name('proses_login_backend');
route::livewire('/post', 'post.index')
    ->layout('layouts.app');
Route::get('/kartumember/{id}', 'kartumemberController@index');
Route::get('/{id}', 'HomeController@replika');
Route::get('/kartunama/{id}', 'kartunamaController@index');
