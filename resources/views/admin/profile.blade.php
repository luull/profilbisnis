@extends('admin.master')
@section('script_atas')
<script>
    $('selector').maxlength();
</script>
@endsection
@section('style')
<style>
    /* COLUMNS */

    .col {
        display: block;
        float: left;
        margin: 1% 0 1% 1.6%;
    }

    .col:first-of-type {
        margin-left: 0;
    }

    /* CLEARFIX */

    .cf:before,
    .cf:after {
        content: " ";
        display: table;
    }

    .cf:after {
        clear: both;
    }

    .cf {
        *zoom: 1;
    }

    /* FORM */

    .form .plan input {
        display: none;
    }

    .form label {
        position: relative;
        color: #fff;
        background-color: transparent;
        font-size: 26px;
        text-align: center;
        height: 160px;
        line-height: 160px;
        display: block;
        cursor: pointer;
        border: 3px solid transparent;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .form label img {
        height: 160px !important;
        width: 100% !important;
        border: 1px solid #202020 !important;
        border-radius: 5px;
    }

    .form .plan input:checked+label {
        /* border: 1px solid #333; */
        background-color: transparent;
    }

    .form .plan input:checked+label:after {
        content: "\2713";
        width: 40px;
        height: 40px;
        line-height: 40px;
        border-radius: 100%;
        /* border: 2px solid #333; */
        background-color: #2fcc71;
        z-index: 999;
        position: absolute;
        top: -10px;
        right: -10px;
    }
</style>
@endsection
@section('content')
<section class="section">
    <div class="page-header">
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="/admin/profile">Profil</a></li>
            </ol>
        </nav>
    </div>
    <div class="row layout-spacing">
        <div class="col-md-12 layout-top-spacing">
            <div class="card author-box card-primary">
                <div class="card-body">
                    <form action="{{route('update_profile')}}" method="post">
                        @csrf

                        <div class="card-body">
                            @if (session('message'))
                            <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
                            @endif
                            <div class="row justify-content-end py-3 pr-4">
                                <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="far fa-save mr-2"></i>Simpan</button>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 text-center text-md-left">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" maxlength="25" class="form-control basic" value="{{$profil->nama}}" name="nama" id="defaultconfig">
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Moto</label>
                                        <input type="text" class="form-control" value="{{$profil->moto}}" name="moto">
                                        @error('moto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori Pekerjaan</label>
                                        <select name="kategori_pekerjaan" id="kategori_pekerjaan" class="form-control" name="kategori_pekerjaan">
                                            @foreach ($kategori_pekerjaan as $kp)
                                            @if ($kp->id==$profil->kategori_pekerjaan)
                                            <option value="{{$kp->id}}" selected>{{$kp->nama}}</option>
                                            @else
                                            <option value="{{$kp->id}}">{{$kp->nama}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('kategori_pekerjaan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Kategori Pekerjaan</label>
                                        <select name="sub_kategori_pekerjaan" id="sub_kategori_pekerjaan" class="form-control" name="sub_kategori_pekerjaan">
                                            @foreach ($sub_kategori_pekerjaan as $kp)
                                            @if ($kp->id==$profil->sub_kategori_pekerjaan)
                                            <option value="{{$kp->id}}" selected>{{$kp->nama}}</option>
                                            @else
                                            <option value="{{$kp->id}}">{{$kp->nama}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('sub_kategori_pekerjaan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Pekerjaan</label>
                                        <input type="text" class="form-control" value="{{$profil->pekerjaan}}" name="pekerjaan">
                                        @error('pekerjaan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Perusahaan</label>
                                        <input type="text" class="form-control" value="{{$profil->perusahaan}}" name="perusahaan">
                                        @error('perusahaan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" class="form-control" value="{{$profil->jabatan}}" name="jabatan">
                                        @error('jabatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tentang Web</label>
                                        <input type="text" class="form-control" value="{{$profil->tentang_web}}" name="tentang_web">
                                        @error('tentang_web')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat">{{$profil->alamat}}</textarea>
                                        @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                        <input type="text" class="form-control" value="{{$profil->kelurahan}}" name="kelurahan">
                                        @error('kelurahan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Propinsi</label>
                                        <select class="form-control basic" name="propinsi" id="propinsi">
                                            @foreach ($province as $prov)
                                            @if ($prov->province_id==$profil->propinsi)
                                            <option value="{{$prov->province_id}}" selected="selected">{{$prov->province}}</option>
                                            @else
                                            <option value="{{$prov->province_id}}">{{$prov->province}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('propinsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Kota/Kabupaten </label>
                                        <select class="form-control basic" name="kota" id="kota">
                                            @foreach ($city as $ct)
                                            @if ($ct->city_id==$profil->kota)
                                            <option value="{{$ct->city_id}}" selected="selected">{{$ct->city_name.' '.$ct->type}}</option>
                                            @else
                                            <option value="{{$ct->city_id}}">{{ $ct->city_name.' '.$ct->type}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('kota')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <select class="form-control basic" name="kecamatan" id="kecamatan">
                                            @foreach ($subdistrict as $sd)
                                            @if ($sd->subdistrict_id==$profil->kecamatan)
                                            <option value="{{$sd->subdistrict_id}}" selected="selected">{{$sd->subdistrict_name}}</option>
                                            @else
                                            <option value="{{$sd->subdistrict_id}}">{{$sd->subdistrict_name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('kecamatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>


                                </div>
                                <div class="col-lg-6 col-md-6 text-center text-md-left">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="{{$profil->email}}" name="email">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Pos</label>
                                        <input type="text" class="form-control" value="{{$profil->kd_pos}}" name="kd_pos">
                                        @error('kd_pos')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>No KTP</label>
                                        <input type="text" class="form-control" value="{{$profil->ktp}}" name="ktp">
                                        @error('ktp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>No Telp Rumah</label>
                                        <input type="text" class="form-control" value="{{$profil->telp}}" name="telp">
                                        @error('telp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>No Handphone</label>
                                        <input type="text" class="form-control" value="{{$profil->hp}}" name="hp">
                                        @error('hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Whatsapp</label>
                                        <input type="text" class="form-control" value="{{$profil->wa}}" name="wa">
                                        @error('wa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input type="text" class="form-control" value="{{$profil->fb}}" name="fb">
                                        @error('fb')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input type="text" class="form-control" value="{{$profil->twitter}}" name="twitter">
                                        @error('twitter')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Instagram</label>
                                        <input type="text" class="form-control" value="{{$profil->ig}}" name="ig">
                                        @error('ig')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Youtube</label>
                                        <input type="text" class="form-control" value="{{$profil->tube}}" name="tube">
                                        @error('tube')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" class="form-control" value="{{$profil->website}}" name="website">
                                        @error('website')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Map</label>
                                        <input type="text" class="form-control" value="{{$profil->map}}" name="map">
                                        @error('map')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" class="form-control" value="{{$profil->latitude}}" name="latitude">
                                        @error('latitude')
                                        <div class=" invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input type="text" class="form-control" value="{{$profil->longitude}}" name="longitude">
                                        @error('longitude')
                                        <div class=" invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-12 col-md-12 col-12 mb-3">
                                        <h4 class="text-center mt-5">Kartu Nama</h4>
                                    </div>
                                    @foreach ($kartu_nama as $card)
                                    @if ($card->id==$profil->kartu_nama_id)
                                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                                        <div class="form cf">
                                            <section class="plan cf">
                                                <input type="radio" name="kartu_nama" id="{{$card->id}}" value="{{$card->id}}" checked><label class="free-label four col" for="{{$card->id}}"><img src="{{ asset($card->gambar)}}"></label>
                                            </section>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-lg-4 col-md-6 col-12 mb-3">
                                        <div class="form cf">
                                            <section class="plan cf">
                                                <input type="radio" name="kartu_nama" id="{{$card->id}}" value="{{$card->id}}"><label class="free-label four col" for="{{$card->id}}"><img src="{{ asset($card->gambar)}}"></label>
                                            </section>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $("#kategori_pekerjaan").change(function() {
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
</script>



@endsection