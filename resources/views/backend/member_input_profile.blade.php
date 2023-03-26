@extends('backend.master')
@section('content')
<div class="card">
    <form action="{{route('save_input_member')}}" method="post">
        @csrf
        <div class="card-header">
            <h5 class="text-center">INPUT DATA MEMBER</h5>
            <hr>
        </div>
        <div class="card-body">
            @if (session('akses')>2)
            <div class="alert alert-danger text-center">Anda tidak berhak mengakses menu ini</div>
            @else
            @if (session('message'))
            <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
            @endif
            @if (session('alert')!="success")
            <div class="row">
                <div class="col-lg-6 col-md-6 text-center text-md-left">
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Username <span class="text-danger">*</span></div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('username')is-invalid @enderror" id="username" name="username" required> </div>

                        <div class="alert alert-warning w-100 m-1 text-center  fade show" id="error_username">
                        </div>

                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Password <span class="text-danger">*</span></div>
                        <div class="col-lg-8 col-md-8 text-left">
                            <div class="input-group">
                                <input type="password" class="form-control input-default @error('password')is-invalid @enderror" name="password" id="password" required>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="pwd"><i class="fa fa-lg fa-eye text-dark"></i></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Sponsor</div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('sponsor')is-invalid @enderror" name="sponsor"> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">No Mitra <span class="text-danger">*</span></div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('member_id')is-invalid @enderror" name="member_id" required> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Nama <span class="text-danger">*</span></div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('nama')is-invalid @enderror" name="nama" required> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Moto</div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('moto')is-invalid @enderror" name="moto"> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Kategori Pekerjaan <span class="text-danger">*</span></div>
                        <div class="col-lg-8 col-md-8 text-left">
                            <select name="kategori_pekerjaan" id="kategori_pekerjaan" class="form-control @error('kategori_pekerjaan')is-invalid @enderror" name="kategori_pekerjaan" required>
                                @foreach ($kategori_pekerjaan as $kp)
                                <option value="{{$kp->id}}">{{$kp->nama}}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Sub Kategori Pekerjaan <span class="text-danger">*</span></div>
                        <div class="col-lg-8 col-md-8 text-left">
                            <select name="sub_kategori_pekerjaan" id="sub_kategori_pekerjaan" class="form-control @error('sub_kategori_pekerjaan')is-invalid @enderror" name="sub_kategori_pekerjaan" required>

                            </select>

                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Pekerjaan <span class="text-danger">*</span></div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('pekerjaan')is-invalid @enderror" name="pekerjaan" required> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Perusahaan <span class="text-danger">*</span></div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('perusahaan')is-invalid @enderror" name="perusahaan" required> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Jabatan <span class="text-danger">*</span></div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('jabatan')is-invalid @enderror" name="jabatan" required> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Tentang Web <span class="text-danger">*</span></div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('tentang_web')is-invalid @enderror" name="tentang_web" required> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Alamat </div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('alamat')is-invalid @enderror" name="alamat"> </div>
                    </div>

                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Kelurahan</div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('kelurahan')is-invalid @enderror" name="kelurahan"> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Propinsi <span class="text-danger">*</span></div>
                        <div class="col-lg-8 col-md-8 text-left">
                            <select name="propinsi" id="propinsi" class="form-control @error('propinsi')is-invalid @enderror" name="propinsi" required>
                                @foreach ($province as $prov)
                                <option value="{{$prov->province_id}}">{{$prov->province}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Kota/Kabupaten <span class="text-danger">*</span></div>
                        <div class="col-lg-8 col-md-8 text-left">
                            <select id="kota" name="kota" class="form-control input-default @error('kota')is-invalid @enderror" required>

                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Kecamatan <span class="text-danger">*</span></div>
                        <div class="col-lg-8 col-md-8 text-left">

                            <select id="kecamatan" name="kecamatan" class="form-control input-default @error('kecamatan')is-invalid @enderror" required>

                            </select>
                        </div>
                    </div>



                </div>
                <div class="col-lg-6 col-md-6 text-center text-md-left">
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Kode Pos</div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('kd_pos')is-invalid @enderror" name="kd_pos"> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">No KTP</div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('ktp')is-invalid @enderror" name="ktp"> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">No Telp Rumah </div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('telp')is-invalid @enderror" name="telp"> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Handphone <span class="text-danger">*</span></div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('hp')is-invalid @enderror" name="hp" required> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">No Whatsapp <span class="text-danger">*</span></div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('wa')is-invalid @enderror" name="wa" required> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Email <span class="text-danger">*</span></div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('email')is-invalid @enderror" name="email" required> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Facebook </div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('fb')is-invalid @enderror" name="fb"> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Twitter</div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('twitter')is-invalid @enderror" name="twitter"> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Instagram</div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('ig')is-invalid @enderror" name="ig"> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Youtube Channel </div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('tube')is-invalid @enderror" name="tube"> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Website </div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('website')is-invalid @enderror" name="website"> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Google Map </div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('map')is-invalid @enderror" name="map"> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Latitude </div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('latitude')is-invalid @enderror" name="latitude"> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Longitude </div>
                        <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('longitude')is-invalid @enderror" name="longitude"> </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Kartu Nama <span class="text-danger">*</span></div>
                        <div class="col-lg-8 col-md-8 text-left">
                            <select name="kartu_nama" class="form-control @error('kartu_nama')is-invalid @enderror" name="kartu_nama" required>
                                @foreach ($kartu_nama as $card)

                                <option value="{{$card->id}}">{{$card->nama}}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Themes <span class="text-danger">*</span></div>
                        <div class="col-lg-8 col-md-8 text-left">
                            <select name="themes" class="form-control @error('themes')is-invalid @enderror" name="themes" required>
                                @foreach ($themes as $theme)
                                <option value="{{$theme->id}}">{{$theme->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-lg-4 col-md-4 text-left">Level Member <span class="text-danger">*</span> </div>
                        <div class="col-lg-8 col-md-8 text-left">
                            <select name="level" class="form-control @error('level')is-invalid @enderror" name="level" required>
                                @foreach ($level_member as $lm)
                                <option value="{{$lm->kode}}">{{$lm->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Biografi</label>
                        <textarea name="biografi" id="bio" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
            @else
            <div class="row justify-content-center">

                <a href="/backend/member" class="btn btn-info text-center">Kembali</a>
            </div>
            @endif
            @endif
        </div>
        @if (session('akses')<3) <div class="card-footer">
            <div class="row justify-content-center">
                <input type="submit" class="btn btn-info" value="Save">

            </div>
</div>
@endif
</form>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('bio',{
            height:200,
            filebrowserUploadUrl:"{{route('ckeditor.upload', ['_token' => csrf_token() ])}} " ,
            filebrowserBrowseUrl:"{{asset('/admin/file_browse?path=images')}}" ,
            filebrowserUploadMethod: "form"
        })
        kat_pekerjaan();
        $("#error_username").hide();
        $("#pwd").click(function() {
            var tipe = $("#password").attr('type');
            if (tipe == "password") {
                $("#password").prop('type', 'text');

            } else {
                $("#password").prop('type', 'password');
            }
        })
        $("#username").blur(function() {
            var u = $("#username").val();
            $.ajax({
                type: 'get',
                method: 'get',
                url: '/backend/member/cekusername/' + u,
                data: '_token = <?php echo csrf_token() ?>',
                success: function(hsl) {
                    if (hsl.hasil) {
                        $("#error_username").html('Username <b>' + u + '</b> Sudah digunakan');
                        $("#error_username").show();
                        $("#username").focus();

                    } else {
                        $("#error_username").hide();
                        $("#password").focus();
                    }
                }
            });
        })
        $("#username").focus(function() {

        })

        $("#kategori_pekerjaan").change(function() {
            kat_pekerjaan();
        })
        $("#propinsi").change(function() {
            var propinsi = $("#propinsi").val();
            $.ajax({
                type: 'get',
                method: 'get',
                url: '/city/find/' + propinsi,
                data: '_token = <?php echo csrf_token() ?>',
                success: function(hsl) {
                    if (hsl.code == 404) {
                        alert(hsl.error);

                    } else {
                        var data = [];
                        data = hsl.result;
                        $("#kota").children().remove().end();
                        $.each(data, function(i, item) {
                            $("#kota").append('<option value="' + item.city_id + '">' + item.city_name + ' ' + item.type + '</option>');
                        })
                        kecamatan();
                        $("#kota").focus();

                    }
                }
            });
        })
        $("#kota").change(function() {
            kecamatan();
        })
    })

    function kecamatan() {
        var kota = $("#kota").val();
        $.ajax({
            type: 'get',
            method: 'get',
            url: '/subdistrict/find/' + kota,
            data: '_token = <?php echo csrf_token() ?>',
            success: function(hsl) {
                if (hsl.code == 404) {
                    alert(hsl.error);

                } else {
                    var data = [];
                    data = hsl.result;
                    $("#kecamatan").children().remove().end();
                    $.each(data, function(i, item) {
                        $("#kecamatan").append('<option value="' + item.subdistrict_id + '">' + item.subdistrict_name + '</option>');
                    })

                    $("#kecamatan").focus();

                }
            }
        });
    }
    function kat_pekerjaan(){
        var kp = $("#kategori_pekerjaan").val();
            $.ajax({
                type: 'get',
                method: 'get',
                url: '/sub-kategori-pekerjaan/' + kp,
                data: '_token = <?php echo csrf_token() ?>',
                success: function(hsl) {
                    if (hsl.code == 404) {
                        alert(hsl.error);

                    } else {
                        var data = [];
                        data = hsl.result;
                        $("#sub_kategori_pekerjaan").children().remove().end();
                        $.each(data, function(i, item) {
                            $("#sub_kategori_pekerjaan").append('<option value="' + item.sub_kategori_id + '">' + item.nama + '</option>');
                        })
                        $("#sub_kategori_pekerjaan").focus();

                    }
                }
            });
    }
</script>



@endsection