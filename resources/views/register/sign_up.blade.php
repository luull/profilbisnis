@extends('register.master')


@section('content')
<div class="container-fluid my-5">
    <div class="row justify-content-center">
       <div class="col-md-3 mb-3">
        <div class="widget widget-account-invoice-two" id="card">
            <div class="widget-content">
                <div class="account-box">
                    <div class="info">
                        <div class="inv-title">
                            <h5 class="">Token</h5>
                        </div>
                        <div class="inv-balance-info">

                            <p class="inv-balance" id="get_token">{{session('token_data')->token}}</p>
                            @if(session('token_data')->type == 0)
                            <span class="inv-stats balance-credited" id="get_type">{{session('token_data')->type  == 0 ? 'MEMBER' : 'SUPER MEMBER'}}</span>
                            <span class="inv-stats balance-credited"><i class="fa fa-user"></i></span>
                            @else
                            <span class="inv-stats balance-credited" style="background:#b78b09;color:#fff !important;" id="get_type_super">{{session('token_data')->type  == 0 ? 'MEMBER' : 'SUPER MEMBER'}}</span>
                            <span class="inv-stats balance-credited" style="background:#b78b09;color:#fff !important;"><i class="fa fa-user"></i></span>
                            @endif

                        </div>
                    </div>
                    @if(!empty($pembeli))
                    <div class="acc-action">
                        <div class="">
                            <i data-feather="plus"></i>
                            <a href style="text-transform:uppercase"><i class="fa fa-user-check mr-1"></i> REFERENSI {{$pembeli->username}} </a>
                            {{-- <a href="javascript:void(0);"><i class="far fa-copy"></i></a>
                            <a href="javascript:void(0);"><i class="fa fa-share"></i></a>
                           --}}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
       </div>
        <div class="col-md-7">
            <div class="card">
                    
                  <div class="text-center">
                    <img src="{{ asset('templates/2_templates/img/bisnis2.jpg') }}" style="width: 100%;height:200px;opacity:0.2;background-size:cover" alt="">
                    <h3 style="font-weight:800;margin-top:-130px">DATA DIRI ANDA</h3>
                  </div>
              
                    <form action="{{route('create_member')}}" method="post">
                        @csrf

                        <div class="card-body">
                            @if (session('message'))
                            <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
                            @endif
                            <div class="row justify-content-end py-3 pr-4">
                                <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="far fa-save mr-2"></i>Simpan</button>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-12">
                                    @if(!empty($pembeli))
                                    <div class="form-group">
                                        <label>Referensi dari :</label>
                                        <input type="text" class="form-control basic" value="{{$pembeli->username}}" style="text-transform: capitalize" readonly>
                                       
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label>Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" maxlength="25" placeholder="Udin sasono" class="form-control basic" name="nama" id="defaultconfig">
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" placeholder="udin@gmail.com" class="form-control" name="email">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Member ID</label>
                                        <input type="number" maxlength="25" class="form-control basic" name="member_id" id="defaultconfig">
                                        @error('member_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username <span class="text-danger">*</span></label></label>
                                        <input type="text" maxlength="25" placeholder="Udin" class="form-control basic" name="username" id="defaultconfig">
                                        @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password <span class="text-danger">*</span></label></label>
                                        <small>*max 25 caracter</small>
                                        <input type="password" maxlength="25" class="form-control basic" name="password" id="defaultconfig">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No KTP <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="ktp">
                                        @error('ktp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No Handphone <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="628 .." name="hp">
                                        @error('hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Moto <span class="text-danger">*</span></label></label>
                                        <input type="text" class="form-control" placeholder="Tetap hidup walau .." name="moto">
                                        @error('moto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kategori Pekerjaan <span class="text-danger">*</span></label>
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
                                </div>
                              
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sub Kategori Pekerjaan <span class="text-danger">*</span></label>
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
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pekerjaan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Wirausaha .." name="pekerjaan">
                                        @error('pekerjaan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jabatan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Manager .." name="jabatan">
                                        @error('jabatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                    <label>Perusahaan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="PT .." name="perusahaan">
                                    @error('perusahaan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                              </div>
                             
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label>Propinsi <span class="text-danger">*</span></label>
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
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kota/Kabupaten <span class="text-danger">*</span> </label>
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
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                    <label>Kecamatan <span class="text-danger">*</span></label>
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
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label>Kelurahan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="kelurahan">
                                    @error('kelurahan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                    <label>Kode Pos <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="kd_pos">
                                    @error('kd_pos')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat Lengkap <span class="text-danger">*</span></label>
                                    <textarea class="form-control" placeholder="Jln. Merdeka .." name="alamat"></textarea>
                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                              </div>    
                              <div class="col-md-12">
                                <div class="form-group">
                                    <label>Google Maps Embed</label>
                                    <input type="text" class="form-control" placeholder="Perusahaan ini berdiri .." name="tentang_web">
                                    @error('map')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <small>Panduan mendapatkan Embed Google Maps <a href="https://gutsylab.com/blog/lihat/panduan-mendapatkan-kode-embed-google-maps">Klik Disini</a></small>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                    <label>No Telp Rumah</label>
                                    <input type="text" placeholder="628.." class="form-control" name="telp">
                                    @error('telp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                              </div>

                             <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tentang Web <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Perusahaan ini berdiri .." name="tentang_web">
                                    @error('tentang_web')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label>Whatsapp <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="628 .." class="form-control" name="wa">
                                    @error('wa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="text" placeholder="udin .." class="form-control" name="fb">
                                    @error('fb')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input type="text" placeholder="udin .." placeholder="udin .." class="form-control" name="twitter">
                                    @error('twitter')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="text" placeholder="udin .." class="form-control" name="ig">
                                    @error('ig')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label>Youtube</label>
                                    <input type="text" placeholder="udin .." class="form-control" name="tube">
                                    @error('tube')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                             </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="text" placeholder="www.udin.com" class="form-control" name="website">
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
        var myclose = false;

function ConfirmClose()
{
    if (event.clientY < 0)
    {
        event.returnValue = 'You have closed the browser. Do you want to logout from your application?';
        setTimeout('myclose=false',10);
        myclose=true;
    }
}

function HandleOnClose()
{
    if (myclose==true) 
    {
        //the url of your logout page which invalidate session on logout 
        location.replace('/register/option') ;
    }   
}
    }

   
    
</script>



@endsection