@extends('register.master')


@section('content')
<div class="container-fluid my-5">
    @if (session('message'))
    <div class="alert alert-{{session('alert')}} mt-3">
        {{ session('message') }}
    </div>
    @endif
   <div id="option">
    <h2 class="text-center my-5">DAFTAR MELALUI</h2>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <a href="/register/verify">
            <div class="card">
                <div class="card-body">
                 <div class="text-center">
                    <img src="{{asset('images/token.svg')}}" style="height: 200px" alt="">
                    <hr>
                    <h4>Referensi Token</h4>
                 </div>
                </div>
            </div>
            </a>
        </div>
       <div class="col-md-4" id="without">
        
            <div class="card">
                <div class="card-body">
                 <div class="text-center">
                    <img src="{{asset('images/without-token.svg')}}" style="height: 200px" alt="">
                    <hr>
                    <h4>Belum punya</h4>
                 </div>
                </div>
            </div>
     
        </div>
    </div>
   </div>
    <div class="row justify-content-center">
        <div class="col-md-8" id="all">
            @if (session('message'))
            <div class="alert alert-{{session('alert')}} mt-3">
                {{ session('message') }}
            </div>
            @endif
            <div class="card">
                <div class="text-center">
                    <img src="{{ asset('templates/2_templates/img/bisnis2.jpg') }}" style="width: 100%;height:200px;opacity:0.2;background-size:cover" alt="">
                    <h3 style="font-weight:800;margin-top:-130px">PENDAFTARAN</h3>
                  </div>
                <div class="card-body" style="margin-top:100px">
                  
                    <form action="{{route('send-regis')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            
        
                                <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Nama<span class="text-danger">*</span></label>
                                            <input type="text" name="pembeli" class="form-control" required>
                                        </div>
                                   </div>
                                   <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>No Whatsapp<span class="text-danger">*</span></label>
                                            <input type="text" maxlength="14" name="phone" class="form-control" required>
                                        </div>
                                   </div>
                                   <div class="col-md-12">
                                       <div class="form-group mb-3">
                                        <label>Tipe Member<span class="text-danger">*</span></label>
                                           <select name="type" class="form-control" id="type" required>
                                               <option value selected>Pilih Tipe Member</option>
                                               <option value="0">Member</option>
                                               <option value="1">Super member</option>
                                           </select>
                                       </div>
                                       <div class="form-group mb-3" id="jumlahdiv">
                                           {{-- <label>Jumlah Token</label> --}}
                                           <input type="hidden" value="1" name="qty" class="form-control jumlah" id="inputan">
                                           <input type="hidden" class="form-control total" id="total" name="total">
                                       </div>
                                       <div class="form-group" id="totaldiv">
                                        <hr>
                                          <div class="text-center">
                                            <label for="result">Total</label>
                                            <h2 id="result" style="font-weight: 800"></h2>
                                          </div>
                                           <input type="hidden" name="results" id="results">
                                           {{-- <input type="text" class="form-control" value="-" id="result" readonly /> --}}
                                       </div>
                                   </div>
                                </div>
    
                        </div>
                        <div class="col-md-12" id="bankdiv">
                            <p class="text-center mb-0">Transfer Bank : </p>
                            <hr>
                            <div class="row">
                        @foreach($getbank as $g)
                            <div class="col-md-6" style="border-left:1px solid #eee;border-right:1px solid #eee" >
                                <div class="row" style="display:flex;align-items:center">
                                    <div class="col-md-12">
                                      <div class="text-center">
                                        <img src="{{asset($g->gambar)}}" class="mb-2" style="height:30px" alt="">
                                        <h5 class="mb-0">{{$g->no_akun}}</h2>
                                        <p>{{$g->nama_akun}}</p>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="form-group mb-3">
                            <label>Bukti Transfer<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="bukti" required>
                        </div>
                        <div class="form-group mt-2 mb-5">
                            <label style="float: left;">Verifikasi</label>
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-block">Kirim</button>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#all').hide();
        $('#totaldiv').hide();
        $('#bankdiv').hide();
    })
    $("#without").click(function() {
        $('#all').show();
        $('#option').hide();
    })
     $('select[name="type"]').on('change', function() {
       var type = $(this).val();
       if(type == 0){
        var harga = '350000';
        var totalrupiah = parseInt(harga).toLocaleString();
        $("#results").val(total);
        $("#total").val(harga);
        $('#totaldiv').show();
        $('#bankdiv').show();
        $("#result").text('Rp.'+totalrupiah);
        }else{
        var harga = '450000';
        var totalrupiah = parseInt(harga).toLocaleString();
        $("#results").val(total);
        $("#total").val(harga);
        $('#totaldiv').show();
        $('#bankdiv').show();
        $("#result").text('Rp.'+totalrupiah);
      
       }
    })
</script>
@endsection