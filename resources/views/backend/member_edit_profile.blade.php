@extends('backend.master')
@section('content')
<div class="card">
    <form action="{{route('save_edit_member')}}" method="post">
        @csrf
        <div class="card-header">
            <h5 class="text-center">EDIT DATA MEMBER</h5>
            <hr>
        </div>
        <div class="card-body">
            @if (session('akses')>2)
                <div class="alert alert-danger text-center">Anda tidak berhak mengakses menu ini</div>
            @else 
            @if (session('message'))
                <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
            @endif    
            <div class="row">
            <div class="col-lg-6 col-md-6 text-center text-md-left">
                <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">Sponsor</div>
                <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('sponsor')is-invalid @enderror"  name="sponsor" value="{{$profil->sponsor}}"> </div>
                </div>
                <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">No Mitra</div>
                <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('member_id')is-invalid @enderror"  name="member_id" value="{{$profil->member_id}}"> </div>
                </div>
                <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">Nama</div>
                <div class="col-lg-8 col-md-8 text-left">
                    <input type="text" class="form-control input-default @error('nama')is-invalid @enderror" value="{{$profil->nama}}" name="nama">
                <input type="hidden" class="form-control input-default @error('id')is-invalid @enderror" value="{{$profil->id}}" name="id"> </div>
                </div>
                <div class="row p-2" >
                    <div class="col-lg-4 col-md-4 text-left">Moto</div>
                    <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('moto')is-invalid @enderror" value="{{$profil->moto}}" name="moto"> </div>
                </div>
                 <div class="row p-2" >
                    <div class="col-lg-4 col-md-4 text-left">Kategori Pekerjaan</div>
                    <div class="col-lg-8 col-md-8 text-left">
                        <select name="kategori_pekerjaan" id="kategori_pekerjaan" class="form-control @error('kategori_pekerjaan')is-invalid @enderror" name="kategori_pekerjaan">
                            @foreach ($kategori_pekerjaan as $kp)
                                    @if ($kp->id==$profil->kategori_pekerjaan)
                                    <option value="{{$kp->id}}" selected >{{$kp->nama}}</option>
                                    @else 
                                    <option value="{{$kp->id}}" >{{$kp->nama}}</option>
                                    @endif
                            @endforeach
                        </select>
                       
                    </div>
                </div>
                <div class="row p-2" >
                    <div class="col-lg-4 col-md-4 text-left">Sub Kategori Pekerjaan</div>
                    <div class="col-lg-8 col-md-8 text-left">
                        <select name="sub_kategori_pekerjaan" id="sub_kategori_pekerjaan" class="form-control @error('sub_kategori_pekerjaan')is-invalid @enderror" name="sub_kategori_pekerjaan">
                            @foreach ($sub_kategori_pekerjaan as $kp)
                                    @if ($kp->sub_kategori_id==$profil->sub_kategori_pekerjaan)
                                    <option value="{{$kp->sub_kategori_id}}" selected >{{$kp->nama}}</option>
                                    @else 
                                    <option value="{{$kp->sub_kategori_id}}" >{{$kp->nama}}</option>
                                    @endif
                            @endforeach
                        </select>
                       
                    </div>
                </div>
                <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">Pekerjaan</div>
                <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('pekerjaan')is-invalid @enderror" value="{{$profil->pekerjaan}}" name="pekerjaan"> </div>
                </div>
                <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">Perusahaan </div>
                <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('perusahaan')is-invalid @enderror" name="perusahaan" value="{{$profil->perusahaan}}" >  </div>
                </div>
                <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">Jabatan</div>
                <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('jabatan')is-invalid @enderror" name="jabatan" value="{{$profil->jabatan}}"> </div>
                </div>
                <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">Tentang Web</div>
                <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('tentang_web')is-invalid @enderror" name="tentang_web" value="{{$profil->tentang_web}}"> </div>
                </div>
                <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">Alamat</div>
                <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('alamat')is-invalid @enderror" name="alamat" value="{{$profil->alamat}}"> </div>
                </div>
                
                <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">Kelurahan</div>
                <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('kelurahan')is-invalid @enderror" name="kelurahan" value="{{$profil->kelurahan}}"> </div>
                </div>
                 <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">Propinsi</div>
                <div class="col-lg-8 col-md-8 text-left">
                    <select name="propinsi" id="propinsi" class="form-control @error('propinsi')is-invalid @enderror" name="propinsi">
                        @foreach ($province as $prov)
                                @if ($prov->province_id==$profil->propinsi)
                                <option value="{{$prov->province_id}}" selected >{{$prov->province}}</option>
                                @else 
                                <option value="{{$prov->province_id}}" >{{$prov->province}}</option>
                                @endif
                        @endforeach
                        </select>
                     </div>
                </div>
                <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">Kota/Kabupaten </div>
                <div class="col-lg-8 col-md-8 text-left">
                    <select id="kota" name="kota" class="form-control input-default @error('kota')is-invalid @enderror" > 
                    @foreach ($city as $ct)
                                @if ($ct->city_id==$profil->kota)
                                <option value="{{$ct->city_id}}" selected >{{$ct->city_name.' '.$ct->type}}</option>
                                @else 
                                <option value="{{$ct->city_id}}" >{{ $ct->city_name.' '.$ct->type}}</option>
                                @endif
                        @endforeach
                    </select>
                </div>
                </div>
                <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">Kecamatan</div>
                <div class="col-lg-8 col-md-8 text-left">
                    
                    <select id="kecamatan" name="kecamatan" class="form-control input-default @error('kecamatan')is-invalid @enderror" >
                     @foreach ($subdistrict as $sd)
                                @if ($sd->subdistrict_id==$profil->kecamatan)
                                <option value="{{$sd->subdistrict_id}}" selected >{{$sd->subdistrict_name}}</option>
                                @else 
                                <option value="{{$sd->subdistrict_id}}" >{{$sd->subdistrict_name}}</option>
                                @endif
                        @endforeach
                    </select>
                    </div>
                </div>
                
                 <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">Kode Pos</div>
                <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('kd_pos')is-invalid @enderror" name="kd_pos" value="{{$profil->kd_pos}}"> </div>
                </div>
                <div class="row p-2" >
                    <div class="col-lg-4 col-md-4 text-left">No KTP</div>
                    <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('ktp')is-invalid @enderror" name="ktp" value="{{$profil->ktp}}"> </div>
                </div>
                
            </div>
            <div class="col-lg-6 col-md-6 text-center text-md-left">
           
                <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">No Telp Rumah </div>
                <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('telp')is-invalid @enderror" name="telp" value="{{$profil->telp}}"> </div>
                </div>
                <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">Handphone</div>
                <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('hp')is-invalid @enderror" name="hp" value="{{$profil->hp}}"> </div>
                </div>
                <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">No Whatsapp</div>
                <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('wa')is-invalid @enderror" name="wa" value="{{$profil->wa}}"> </div>
                </div>
                <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">Email</div>
                <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('email')is-invalid @enderror" name="email" value="{{$profil->email}}"> </div>
                </div>
                <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">Facebook </div>
                <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('fb')is-invalid @enderror" name="fb" value="{{$profil->fb}}"> </div>
                </div>
                <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">Twitter</div>
                <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('twitter')is-invalid @enderror" name="twitter" value="{{$profil->twitter}}"> </div>
                </div>
                <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">Instagram</div>
                <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('ig')is-invalid @enderror" name="ig" value="{{$profil->ig}}"> </div>
                </div>
                <div class="row p-2" >
                <div class="col-lg-4 col-md-4 text-left">Youtube Channel </div>
                <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('tube')is-invalid @enderror" name="tube" value="{{$profil->tube}}"> </div>
                </div>
                <div class="row p-2" >
                    <div class="col-lg-4 col-md-4 text-left">Website </div>
                    <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('website')is-invalid @enderror" name="website" value="{{$profil->website}}"> </div>
                </div>
                <div class="row p-2" >
                    <div class="col-lg-4 col-md-4 text-left">Google Map </div>
                    <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('map')is-invalid @enderror" name="map" value="{{$profil->map}}"> </div>
                </div>
                <div class="row p-2" >
                    <div class="col-lg-4 col-md-4 text-left">Latitude </div>
                    <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('latitude')is-invalid @enderror" name="latitude" value="{{$profil->latitude}}"> </div>
                </div>
                <div class="row p-2" >
                    <div class="col-lg-4 col-md-4 text-left">Longitude </div>
                    <div class="col-lg-8 col-md-8 text-left"><input type="text" class="form-control input-default @error('longitude')is-invalid @enderror" name="longitude" value="{{$profil->longitude}}"> </div>
                </div>
                <div class="row p-2" >
                    <div class="col-lg-4 col-md-4 text-left">Kartu Nama </div>
                    <div class="col-lg-8 col-md-8 text-left">
                        <select name="kartu_nama" class="form-control @error('kartu_nama')is-invalid @enderror" name="kartu_nama">
                        @foreach ($kartu_nama as $card)
                                @if ($card->id==$profil->kartu_nama_id)
                                <option value="{{$card->id}}" selected >{{$card->nama}}</option>
                                @else 
                                <option value="{{$card->id}}" >{{$card->nama}}</option>
                                @endif
                        @endforeach
                        </select>
                         </div>
                </div>
                <div class="row p-2" >
                    <div class="col-lg-4 col-md-4 text-left">Themes </div>
                    <div class="col-lg-8 col-md-8 text-left">
                        <select name="themes" class="form-control @error('themes')is-invalid @enderror" name="themes">
                        @foreach ($themes as $theme)
                                @if ($theme->id==$profil->themes_id)
                                <option value="{{$theme->id}}" selected >{{$theme->name}}</option>
                                @else 
                                <option value="{{$theme->id}}" >{{$theme->name}}</option>
                                @endif
                        @endforeach
                        </select>
                         </div>
                </div>
                <div class="row p-2" >
                    <div class="col-lg-4 col-md-4 text-left">Level Member </div>
                    <div class="col-lg-8 col-md-8 text-left">
                        <select name="level" class="form-control @error('level')is-invalid @enderror" name="level">
                        @foreach ($level_member as $lm)
                                @if ($lm->kode==$profil->level)
                                <option value="{{$lm->kode}}" selected >{{$lm->nama}}</option>
                                @else 
                                <option value="{{$lm->kode}}" >{{$lm->nama}}</option>
                                @endif
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
                    <textarea name="biografi" id="bio" cols="30" rows="10">{{$profil->biografi}}</textarea>
                </div>
            </div>
        </div>
        @endif
    </div>
    @if (session('akses')<3)
    <div class="card-footer">
    <div class="row justify-content-center">
        <input type="submit" class="btn btn-info" value="Update" >
        
    </div>   
    </div>
    @endif
</form>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
   <script> 
   $(document).ready(function(){
        CKEDITOR.replace('bio',{
            height:200,
            filebrowserUploadUrl:"{{route('ckeditor.upload', ['_token' => csrf_token() ])}} " ,
            filebrowserBrowseUrl:"{{asset('/admin/file_browse?path=images')}}" ,
            filebrowserUploadMethod: "form"
        })
       kat_pekerjaan();
       $("#kategori_pekerjaan").change(function(){
            kat_pekerjaan();
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
   
   function kat_pekerjaan(){
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
   }
   
   </script>

   
   
@endsection