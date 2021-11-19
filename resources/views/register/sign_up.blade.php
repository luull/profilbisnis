@extends('register.master')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('create_member')}}" method="post">
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
                                        <label>Username</label>
                                        <input type="text" maxlength="25" class="form-control basic" name="username" id="defaultconfig">
                                        @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" maxlength="25" class="form-control basic" name="nama" id="defaultconfig">
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Moto</label>
                                        <input type="text" class="form-control" name="moto">
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

                                            <option value="{{$kp->id}}">{{$kp->nama}}</option>

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

                                            <option value="{{$kp->id}}">{{$kp->nama}}</option>

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
                                        <input type="text" class="form-control" name="pekerjaan">
                                        @error('pekerjaan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Perusahaan</label>
                                        <input type="text" class="form-control" name="perusahaan">
                                        @error('perusahaan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" class="form-control" name="jabatan">
                                        @error('jabatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tentang Web</label>
                                        <input type="text" class="form-control" name="tentang_web">
                                        @error('tentang_web')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat"></textarea>
                                        @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                        <input type="text" class="form-control" name="kelurahan">
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

                                            <option value="{{$prov->province_id}}">{{$prov->province}}</option>

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
                                            <option value="{{$ct->city_id}}">{{ $ct->city_name.' '.$ct->type}}</option>
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

                                            <option value="{{$sd->subdistrict_id}}">{{$sd->subdistrict_name}}</option>

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
                                        <label>Password</label>
                                        <input type="password" maxlength="25" class="form-control basic" name="password" id="defaultconfig">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Member ID</label>
                                        <input type="number" maxlength="25" class="form-control basic" name="member_id" id="defaultconfig">
                                        @error('member_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Kode Pos</label>
                                        <input type="text" class="form-control" name="kd_pos">
                                        @error('kd_pos')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>No KTP</label>
                                        <input type="text" class="form-control" name="ktp">
                                        @error('ktp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>No Telp Rumah</label>
                                        <input type="text" class="form-control" name="telp">
                                        @error('telp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>No Handphone</label>
                                        <input type="text" class="form-control" name="hp">
                                        @error('hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Whatsapp</label>
                                        <input type="text" class="form-control" name="wa">
                                        @error('wa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input type="text" class="form-control" name="fb">
                                        @error('fb')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input type="text" class="form-control" name="twitter">
                                        @error('twitter')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Instagram</label>
                                        <input type="text" class="form-control" name="ig">
                                        @error('ig')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Youtube</label>
                                        <input type="text" class="form-control" name="tube">
                                        @error('tube')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" class="form-control" name="website">
                                        @error('website')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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