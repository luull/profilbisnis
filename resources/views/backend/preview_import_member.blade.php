@extends('backend.master')
@section('content')
<div class="card">
    <form action="{{route('import_member')}}" method="POST">
        @csrf
        <div class="card-header">
            <h5 class="text-center">PREVIEW IMPORT MEMBER</h5>
            <hr>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
            @endif    
            <div class="row">
                @foreach ($data as $d) 
                    <div class="col-lg-6 col-md-6 text-center text-md-left">
                        <input type="text" name="hu_id" class="form-control" value="{{$d['hu_id']}}" hidden>
                        <div class="form-group mb-3">
                            <label>Username</label>
                            <input type="text" name="member_id" class="form-control" value="{{$d['member_id']}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{$d['nama']}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{$d['email']}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Sponsor</label>
                            <input type="text" name="sponsor" class="form-control" value="{{$d['sponsor']}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Telp</label>
                            <input type="number" name="telp" class="form-control" value="{{$d['telp']}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Hp</label>
                            <input type="number" name="hp" class="form-control" value="{{$d['telp']}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Whatsapp</label>
                            <input type="number" name="wa" class="form-control" value="{{$wa}}">
                        </div>
                      
                    </div>
                    <div class="col-lg-6 col-md-6 text-center text-md-left">
                       
                        <div class="form-group mb-3">
                            <label>KTP</label>
                            <input type="text" name="ktp" class="form-control" value="{{substr($d['ktp'], 0, 16)}}">
                        </div> 
                        <div class="form-group mb-3">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" cols="20" rows="4">{{$d['alamat']}}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Propinsi</label>
                            @if ($propinsi != '') 
                                <select name="propinsi" id="propinsi" class="form-control @error('propinsi')is-invalid @enderror" name="propinsi">
                                @foreach ($allprovince as $prov)
                                
                                        @if ($prov->province_id==$propinsi)
                                        <option value="{{$prov->province_id}}" selected >{{$prov->province}}</option>
                                        @else 
                                        <option value="{{$prov->province_id}}" >{{$prov->province}}</option>
                                        @endif
                                @endforeach
                                </select>
                            @else
                                <select name="propinsi" id="propinsi" class="form-control @error('propinsi')is-invalid @enderror" name="propinsi">
                                    @foreach ($allprovince as $prov)
                                    <option value="{{$prov->province_id}}" >{{$prov->province}}</option>
                                    @endforeach
                                </select>
                            @endif
                            </div>
                        <div class="form-group mb-3">
                            <label>Kota</label>
                            @if ($kota != '') 
                            <select id="kota" name="kota" class="form-control input-default @error('kota')is-invalid @enderror" > 
                                @foreach ($allcity as $ct)
                                            @if ($ct->city_id==$kota)
                                            <option value="{{$ct->city_id}}" selected >{{$ct->city_name.' '.$ct->type}}</option>
                                            @else 
                                            <option value="{{$ct->city_id}}" >{{ $ct->city_name.' '.$ct->type}}</option>
                                            @endif
                                @endforeach
                            </select>
                            @else
                            <select id="kota" name="kota" class="form-control input-default @error('kota')is-invalid @enderror" > 
                                @foreach ($allcity as $ct)
                                         <option value="{{$ct->city_id}}" >{{ $ct->city_name.' '.$ct->type}}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label>Kecamatan</label>
                            @if ($kecamatan != '') 
                                <select id="kecamatan" name="kecamatan" class="form-control input-default @error('kecamatan')is-invalid @enderror" >
                                    @foreach ($allsubdis as $sd)
                                           @if ($sd->subdistrict_id==$kecamatan)
                                           <option value="{{$sd->subdistrict_id}}" selected >{{$sd->subdistrict_name}}</option>
                                           @else 
                                           <option value="{{$sd->subdistrict_id}}" >{{$sd->subdistrict_name}}</option>
                                           @endif
                                   @endforeach
                               </select>
                            @else
                                <select id="kecamatan" name="kecamatan" class="form-control input-default @error('kecamatan')is-invalid @enderror" >
                                    @foreach ($allsubdis as $sd)
                                           <option value="{{$sd->subdistrict_id}}" >{{$sd->subdistrict_name}}</option>
                                   @endforeach
                               </select>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label>Kelurahan</label>
                            <input type="text" name="kelurahan" class="form-control" value="{{$kelurahan}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Kode Pos</label>
                            <input type="text" name="kd_pos" class="form-control" value="{{$d['kd_pos']}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Facebook</label>
                            <input type="text" name="fb" class="form-control" value="{{$d['fb']}}">
                        </div>
                        
                    </div>
                @endforeach
            </div>
            <hr>
            <button type="submit" class="btn btn-success btn-block">Import Member</button>
        </div>
    </form>
</div>
            
   
@endsection

@section('script')
   <script> 
   $(document).ready(function(){
       $("#kategori_pekerjaan").change(function(){
            var kp=$("#kategori_pekerjaan").val();
            $.ajax({
                type:'get',
                method:'get',
                url:'/sub-kategori-pekerjaan/'  + kp ,
                data:'_token = <?php echo csrf_token() ?>'   ,
                success:function(hsl) {
                   if (hsl.code==404){
                       alert(hsl.error);

                   } else{
                       var data=[];
                       data=hsl.result;
                        $("#sub_kategori_pekerjaan").children().remove().end();
                       $.each(data, function(i, item) {
                        $("#sub_kategori_pekerjaan").append('<option value="' + item.sub_kategori_id + '">' + item.nama + '</option>' ); 
                       })
                    $("#sub_kategori_pekerjaan").focus();
                      
                   }
                }
            });
       })
        $("#propinsi").change(function(){
            var propinsi=$("#propinsi").val();
             $.ajax({
                type:'get',
                method:'get',
                url:'/city/find/'  + propinsi ,
                data:'_token = <?php echo csrf_token() ?>'   ,
                success:function(hsl) {
                   if (hsl.code==404){
                       alert(hsl.error);

                   } else{
                       var data=[];
                       data=hsl.result;
                        $("#kota").children().remove().end();
                       $.each(data, function(i, item) {
                        $("#kota").append('<option value="' + item.city_id + '">' + item.city_name + ' ' + item.type + '</option>' ); 
                       })
                    kecamatan();
                    $("#kota").focus();
                      
                   }
                }
            });
        })
         $("#kota").change(function(){
            kecamatan();
        })
   })
   function kecamatan(){
       var kota=$("#kota").val();
             $.ajax({
                type:'get',
                method:'get',
                url:'/subdistrict/find/'  + kota ,
                data:'_token = <?php echo csrf_token() ?>'   ,
                success:function(hsl) {
                   if (hsl.code==404){
                       alert(hsl.error);

                   } else{
                       var data=[];
                       data=hsl.result;
                        $("#kecamatan").children().remove().end();
                       $.each(data, function(i, item) {
                        $("#kecamatan").append('<option value="' + item.subdistrict_id + '">' + item.subdistrict_name + '</option>' ); 
                       })

                    $("#kecamatan").focus();
                      
                   }
                }
            });
   }
   </script>

   
   
@endsection