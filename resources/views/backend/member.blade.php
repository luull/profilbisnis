@extends('backend.master')
@section('style')
 <link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
       
@endsection

@section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title text-center">DATA MEMBER</h4>
                      
                    </div>
                      @if (session('akses')<=2)
                      
                    <div class="card-body">
                        @if (session('message'))
                        <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
                        @endif  
                        <DIV class="table-responsive">
                            <table class="table rounded table-striped table-bordered" id="mytable">
                              <thead>
                                    <tr>
                                        <th>Tgl Registrasi</th>
                                        <th>Username</th>
                                        <th>Nama Member</th>
                                        <th>ID Member</th>
                                        <th>Alamat</th>
                                        <th>No Handphone</th>
                                        <th>Email</th>
                                        <th>Level Member</th>
                                        <th class="noExport">Foto Profil</th>
                                        <th>Tgl Aktif</th>
                                        <th class="noExport" width="200">Action</th>
                                       <!-- <th  >Menu Member</th>-->
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($member as $dt)
                                    <tr>
                                        <td>{{ $dt->tgl_daftar }}</td>
                                        <td>{{ $dt->username }}</td>
                                        <td>{{ $dt->nama }}</td>
                                        <td>{{ $dt->member_id }}</td>
                                        <td>{{ $dt->city->type }} {{ $dt->city->city_name }}-{{ $dt->province->province }}</td>
                                        <td>{{ $dt->telp }}</td>
                                        <td>{{ $dt->email }}</td>
                                        <td>
                                            @if ($dt->level==1)
                                            Special Member
                                            @else 
                                            Reguler member
                                            @endif
                                        </td>
                                        <td><img src="{{ asset($dt->foto) }}" class="img" id="img-{{$dt->id}}" width="70"></td>
                                        <td><i class="fa fa-circle" style="color: green"></i><br><?php 
                                        
                                        $valid = date('d-m-Y', strtotime($dt->last_login));
                                        if ($valid == '01-01-1970') {
                                            echo 'Belum Aktif';
                                        }else{
                                            echo $valid;
                                        }
                                        ?> 
                                        </td>
                                        <td > <a href="/backend/member/edit/{{$dt->id}}" alt="Edit"><i class="fa fa-lg fa-edit text-info" title="Edit Data Member "></i></a>
                                            <a href="/backend/member/delete/{{$dt->id}}"  id="e-{{$dt->id}}" Title="Delete Member"><i class="fa fa-lg fa-trash text-danger"></i></a>
                                        <a href="/backend/member/ubah-password/{{$dt->id}}" title="Change Password Member"><i class="fa fa-lg fa-lock text-warning"></i></a> 
                                    <a href="/backend/cpanel/{{$dt->username}}" target="_blank" title="Control Panel Member"><i class="fa fa-lg fa-user text-success"></i></a>
                                    <a href="/{{$dt->username}}" target="_blank" title="Web Profil Member"><i class="fa fa-lg fa-globe text-purple"></i></a>
                                </td>
                                        <!--<td>
                                             <div class="form-group">
                                            <select id="link" class="form-control" name="link">
                                                <option value="#">Bisnis</option>
                                                <option value="#">Produk</option>
                                                <option value="#">Testimoni</option>
                                                <option value="#">Gallery Photo</option>
                                                <option value="#">Gallery Video</option>
                                                <option value="#">Agenda</option>
                                                <option value="#">Data Bank</option>
                                                <option value="#">Wa Template</option>
                                                <option value="#">Welcome Note</option>
                                           
                                                
                                            </select>
                                        </div>

                                        </td>-->
                                    </tr>
                                        
                                    @endforeach
                                  
                                </tbody>
                                
                            </table>
                            
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <a href="/backend/member/input" class="btn btn-sm btn-info text-center" id="inputData"><i class="fa fa-pencil "></i> Input Data</a>
                        </div> 
                    </div>
                    @else 
                    <div class="card-body">
                    <div class="alert alert-danger text-center">Maaf Anda tidak berhak mengakses menu ini </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
   
        
<div class="modal" tabindex="-1" role="dialog" id="ubahpasswordmodal">
            <div class="modal-dialog " role="document">
              <div class="modal-content p-0">
                <div class="modal-header">
                  <h5 class="modal-title">Ubah Password Member</h5>
                  <hr>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                       <form  action="/backend/change_password/update" method="Post" >    
                                 @csrf
               
                    <div class="row justify-content-center">
                        <div class="col-12">
                            
                                 
                                <div class="basic-form">
                                    <div class="form-group">
                                        <label>Password Baru</label>
                                    <input type="hidden" id="user_id" name="user_id">
                                        <div class="input-group">
                                            <input type="password" class="form-control input-default @error('new_password')is-invalid @enderror" name="new_password" id="new_password" >
                                            <div class="input-group-append" >
                                            <span class="input-group-text" id="n_pwd"><i class="fa fa-lg fa-eye text-dark"></i></span>
                                            </div>
                                            @error('new_password')
                                            <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control input-default @error('password1')is-invalid @enderror" name="confirm_password" id="confirm_password" >
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="k_pwd"><i class="fa fa-lg fa-eye text-dark"></i></span>
                                            </div>
                                        @error('confirm_password')
                                        <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                    
                    </div>
                    </div>
                     <div class="row justify-content-center ">
                    <input type="submit" class="btn btn-sm btn-info" Value="Update Password">
                    </div>
                     </form>
                </div>
               
            </div>
        </div>
   
                 
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->
@stop


@section('script')
   <script src="{{ asset('templates/admin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>   <script src="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.js')}}"></script>
  <script src="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('templates/admin/assets/js/page/datatables.js')}}"></script>
  {{-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> --}}
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
  <script>
      $(document).ready(function() {
        $('#mytable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    title: 'Data Member',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }, {
                    extend: 'csv',
                    title: 'Data Member',
                    exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
                }
            ]
        } );
    } );
  </script>
    <script >
        $(document).ready(function(){
         $("#link").click(function(){
             var menu=$(this).val();

             var url="<?PHP echo env('APP_URL') . '/backend/member/' ;?>" + menu;
            window.location.href=url;
         })
         $("#inputData").click(function(){
            $("#inputmodal").modal();
         })
         $(".cng_pwd").click(function(){
            var idnya=$(this).attr('id').split('-');
            var id=idnya[1];
             $("#user_id").val(id);
             $("#ubahpasswordmodal").modal();
         })
        
         $("#n_pwd").click(function(){
        var tipe=$("#new_password").attr('type');
        if (tipe=="password"){
            $("#new_password").prop('type','text');

        }else{
            $("#new_password").prop('type','password');
        }
    })
    $("#k_pwd").click(function(){
        var tipe=$("#confirm_password").attr('type');
        if (tipe=="password"){
            $("#confirm_password").prop('type','text');

        }else{
            $("#confirm_password").prop('type','password');
        }
    })
        })
        </script>    
        
@stop

@section('style')
<link href="{{ asset('templates/admin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    
@endsection