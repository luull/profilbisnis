@extends('backend.master')

@section('style')
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<script src="{{asset('js/jscolor.js')}}"></script>
<style>

code {
  padding: 5px 8px;
  border-radius: 10px;
  background-color: #f8f9f9;
  color: #CC0066;
}

[type='color'] {
  -moz-appearance: none;
  -webkit-appearance: none;
  appearance: none;
  padding: 0;
  width: 15px;
  height: 15px;
  border: none;
}

[type='color']::-webkit-color-swatch-wrapper {
  padding: 0;
}

[type='color']::-webkit-color-swatch {
  border: none;
}

.color-picker {
  padding: 10px 15px;
  border-radius: 10px;
  border: 1px solid #ccc;
  background-color: #f8f9f9;
}
</style>
@endsection
@section('content')

<div class="card">
        <div class="card-header">
            <h5 class="text-center">DATA LANDING PAGE</h5>
            <hr>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
            @endif                  
            <DIV class="table-responsive">
                <table class="table rounded table-striped table-bordered" id="mytable">
                    <thead>
                        <tr>
                            <th>Landing Page</th>
                            <th>Tgl Dibuat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                <tbody>
                            
                @foreach($datas as $data)
                <tr> 
                    <td>{{$data->titlelanding}}</td>
                    <td>{{$data->tgl_dibuat}}</td>
                    <td>
                        <a href="#" class="edit " id="e-{{$data->id}}" alt="Edit"><i class="fa fa-lg fa-edit text-info" alt="edit"></i></a>
                        <a href="/backend/landing/delete/{{$data->id}}"  id="e-{{$data->id}}" alt="Delete"><i class="fa fa-lg fa-trash text-danger"></i></a> 
                        <a href="/landing/{{$data->id_member}}/{{$data->titlelanding}}" alt="Show" target="_Blank"><i class="fa fa-lg fa-eye text-dark"></i></a>
                </tr>
                @endforeach
                </tbody>
                </table>
                   
            </div>
            
        </div>
        <div class="card-footer">
            <div class="row justify-content-center">
                <a href="#" class="btn btn-sm btn-info text-center" data-toggle="modal" data-target="#inputmodal"><i class="fa fa-pencil "></i> Input Data</a>
            </div> 
        </div>
    </div>
   </div>

<div class="modal" tabindex="-1" role="dialog" id="inputmodal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form  id="form-action" action="{{route('create_landing_backend')}}" method="Post" enctype="multipart/form-data">    
            @csrf
        <div class="modal-header">
          <h5 class="modal-title">Input Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

               
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
 
                                        <div class="container1">
                                            <label><strong>Judul Landing Page</strong></label>
                                            <input type="text" name="titlelanding" class="form-control">
                                            <hr>
                                            <label>Judul Section 1</label>
                                            <input type="text" name="title1" class="form-control">
                                            <br>
                                            <label>Isi Section 1</label>
                                            <textarea class="form-control input-default mb-3" id="myeditorss" name="section1" rows=5></textarea>
                                            <br>
                                            <label>Dasar Section 1</label>
                                            <select name="format1" class="form-control">
                                                <option value="solid">Warna Solid</option>
                                                <option value="paralax">Paralax</option>
                                            </select>
                                            <br>
                                            <label class="mt-2"> Warna Background 1 </label>
                                            <br>
                                            <input type="color" id="colorPicker" name="background1">
                                            <br>
                                            <label>Background Section 1</label>
                                            <input type="file" class="form-control" name="image1">
                                            <br>
                                            <label>Tema Text Section 1</label>
                                            <select name="fontcolor1" class="form-control">
                                                <option value="darkcolor">Gelap</option>
                                                <option value="whitecolor">Terang</option>
                                            </select>
                                            <br>
                                            <label>Posisi Text Section 1</label>
                                            <select name="position1" class="form-control">
                                                <option value="text-center">Tengah</option>
                                                <option value="text-right">Kanan</option>
                                                <option value="text-left">Kiri</option>
                                            </select>
                                        </div>
                            
                        </div>
                    </div>
                </div>
                
        </div>
        <div class="modal-footer">
            <button class="add_form_field btn btn-success" style="float: left;">Tambah Section
          </button>
          <input type="submit" class="btn btn-primary" value="Proses">
        </div>
    </form>
      </div>
    </div>
  </div>
<div class="modal" tabindex="-1" role="dialog" id="editmodal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form  id="form-action" action="{{route('update_landing_backend')}}" method="Post" enctype="multipart/form-data">    
            @csrf
        <div class="modal-header">
          <h5 class="modal-title">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

               
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" id="edit_id" name="edit_id">
                                        <div class="container1">
                                            <label><strong>Judul Landing Page</strong></label>
                                            <input type="text" name="titlelanding" id="edit_titlelanding" class="form-control">
                                            <hr>
                                            <label>Judul Section 1</label>
                                            <input type="text" name="title1" id="title1_edit" class="form-control">
                                            <br>
                                            <label>Isi Section 1</label>
                                            <textarea class="myeditors1 form-control input-default mb-3" id="myeditor1" name="section1" rows=5></textarea>
                                            <br>
                                            <label>Dasar Section 1</label>
                                            <select name="format1" id="edit_format1" class="form-control">
                                                <option id="edit_format1" value="solid">Warna Solid</option>
                                                <option id="edit_format1" value="paralax">Paralax</option>
                                            </select>
                                            <br>
                                            <label class="mt-2" id="bg1_edit"> Warna Background Section 1 </label>
                                            <br>
                                            <input type="color" id="colorPicker" class="bg1_edit" name="background1">
                                            <div class="form-group">
                                                <label>Background Section 1</label>
                                                <br><img src="" class="img img-thumbnail" id="edit_bg_img1" style="width:100px">
                                                <br><input type="text" class="form-control input-default" id="image1_edit" name="old_photo1">
                                           
                                                <input type="file" class="form-control input-default" name="image1">
                                            </div>
                                            <label>Tema Text Section 1</label>
                                            <select name="fontcolor1" id="fontcolor1_edit" class="form-control">
                                                <option id="fontcolor1_edit"  value="darkcolor">Gelap</option>
                                                <option id="fontcolor1_edit"  value="whitecolor">Terang</option>
                                            </select>
                                            <br>
                                            <label>Posisi Text Section 1</label>
                                            <select name="position1" id="position1_edit"  class="form-control">
                                                <option id="position1_edit" value="text-center">Tengah</option>
                                                <option id="position1_edit" value="text-right">Kanan</option>
                                                <option id="position1_edit" value="text-left">Kiri</option>
                                            </select>
                                        </div>
                                        <div class="container1">
                                            <hr>
                                            <label>Judul Section 2</label>
                                            <input type="text" name="title2" id="title2_edit" class="form-control">
                                            <br>
                                            <label>Isi Section 2</label>
                                            <textarea class="myeditors2 form-control input-default mb-3" id="myeditor2" name="section2" rows=5></textarea>
                                            <br>
                                            <label>Dasar Section 2</label>
                                            <select name="format2" id="edit_format2" class="form-control">
                                                <option  id="edit_format2" value="solid">Warna Solid</option>
                                                <option  id="edit_format2" value="paralax">Paralax</option>
                                            </select>
                                            <br>
                                            <label class="mt-2" id="bg2_edit"> Warna Background Section 2 </label>
                                            <br>
                                            <input type="color" id="colorPicker" class="bg2_edit" name="background2">
                                            <div class="form-group">
                                                <label>Background Section 2</label>
                                                <br><img src="" class="img img-thumbnail" id="edit_bg_img2" style="width:200px">
                                                <br><input type="text" class="form-control input-default" id="image2_edit" name="old_photo2">
                                           
                                                <input type="file" class="form-control input-default" name="image2">
                                            </div>
                                            <label>Tema Text Section 2</label>
                                            <select name="fontcolor2" id="fontcolor2_edit" class="form-control">
                                                <option id="fontcolor2_edit"  value="darkcolor">Gelap</option>
                                                <option id="fontcolor2_edit"  value="whitecolor">Terang</option>
                                            </select>
                                            <br>
                                            <label>Posisi Text Section 2</label>
                                            <select name="position2" id="position2_edit"  class="form-control">
                                                <option id="position2_edit" value="text-center">Tengah</option>
                                                <option id="position2_edit" value="text-right">Kanan</option>
                                                <option id="position2_edit" value="text-left">Kiri</option>
                                            </select>
                                        </div>
                                        <div class="container1">
                                            <hr>
                                            <label>Judul Section 3</label>
                                            <input type="text" name="title3" id="title3_edit" class="form-control">
                                            <br>
                                            <label>Isi Section 3</label>
                                            <textarea class="myeditors3 form-control input-default mb-3" id="myeditor3" name="section3" rows=5></textarea>
                                            <br>
                                            <label>Dasar Section 3</label>
                                            <select name="format3" id="edit_format3" class="form-control">
                                                <option  id="edit_format3" value="solid">Warna Solid</option>
                                                <option  id="edit_format3" value="paralax">Paralax</option>
                                            </select>
                                            <br>
                                            <label class="mt-3" id="bg3_edit"> Warna Background Section 3 </label>
                                            <br>
                                            <input type="color" id="colorPicker" class="bg3_edit" name="background3">
                                            <div class="form-group">
                                                <label>Background Section 3</label>
                                                <br><img src="" class="img img-thumbnail" id="edit_bg_img3" style="width:300px">
                                                <br><input type="text" class="form-control input-default" id="image3_edit" name="old_photo3">
                                           
                                                <input type="file" class="form-control input-default" name="image3">
                                            </div>
                                            <label>Tema Text Section 3</label>
                                            <select name="fontcolor3" id="fontcolor3_edit" class="form-control">
                                                <option id="fontcolor3_edit"  value="darkcolor">Gelap</option>
                                                <option id="fontcolor3_edit"  value="whitecolor">Terang</option>
                                            </select>
                                            <br>
                                            <label>Posisi Text Section 3</label>
                                            <select name="position3" id="position3_edit"  class="form-control">
                                                <option id="position3_edit" value="text-center">Tengah</option>
                                                <option id="position3_edit" value="text-right">Kanan</option>
                                                <option id="position3_edit" value="text-left">Kiri</option>
                                            </select>
                                        </div>
                                        <div class="container1">
                                            <hr>
                                            <label>Judul Section 4</label>
                                            <input type="text" name="title4" id="title4_edit" class="form-control">
                                            <br>
                                            <label>Isi Section 4</label>
                                            <textarea class="myeditors4 form-control input-default mb-4" id="myeditor4" name="section4" rows=5></textarea>
                                            <br>
                                            <label>Dasar Section 4</label>
                                            <select name="format4" id="edit_format4" class="form-control">
                                                <option  id="edit_format4" value="solid">Warna Solid</option>
                                                <option  id="edit_format4" value="paralax">Paralax</option>
                                            </select>
                                            <br>
                                            <label class="mt-4" id="bg4_edit"> Warna Background Section 4 </label>
                                            <br>
                                            <input type="color" id="colorPicker" class="bg4_edit" name="background4">
                                            <div class="form-group">
                                                <label>Background Section 4</label>
                                                <br><img src="" class="img img-thumbnail" id="edit_bg_img4" style="width:400px">
                                                <br><input type="text" class="form-control input-default" id="image4_edit" name="old_photo4">
                                           
                                                <input type="file" class="form-control input-default" name="image4">
                                            </div>
                                            <label>Tema Text Section 4</label>
                                            <select name="fontcolor4" id="fontcolor4_edit" class="form-control">
                                                <option id="fontcolor4_edit"  value="darkcolor">Gelap</option>
                                                <option id="fontcolor4_edit"  value="whitecolor">Terang</option>
                                            </select>
                                            <br>
                                            <label>Posisi Text Section 4</label>
                                            <select name="position4" id="position4_edit"  class="form-control">
                                                <option id="position4_edit" value="text-center">Tengah</option>
                                                <option id="position4_edit" value="text-right">Kanan</option>
                                                <option id="position4_edit" value="text-left">Kiri</option>
                                            </select>
                                        </div>
                                        <div class="container1">
                                            <hr>
                                            <label>Judul Section 5</label>
                                            <input type="text" name="title5" id="title5_edit" class="form-control">
                                            <br>
                                            <label>Isi Section 5</label>
                                            <textarea class="myeditors5 form-control input-default mb-5" id="myeditor5" name="section5" rows=5></textarea>
                                            <br>
                                            <label>Dasar Section 5</label>
                                            <select name="format5" id="edit_format5" class="form-control">
                                                <option  id="edit_format5" value="solid">Warna Solid</option>
                                                <option  id="edit_format5" value="paralax">Paralax</option>
                                            </select>
                                            <br>
                                            <label class="mt-5" id="bg5_edit"> Warna Background Section 5 </label>
                                            <br>
                                            <input type="color" id="colorPicker" class="bg5_edit" name="background5">
                                            <div class="form-group">
                                                <label>Background Section 5</label>
                                                <br><img src="" class="img img-thumbnail" id="edit_bg_img5" style="width:500px">
                                                <br><input type="text" class="form-control input-default" id="image5_edit" name="old_photo5">
                                           
                                                <input type="file" class="form-control input-default" name="image5">
                                            </div>
                                            <label>Tema Text Section 5</label>
                                            <select name="fontcolor5" id="fontcolor5_edit" class="form-control">
                                                <option id="fontcolor5_edit"  value="darkcolor">Gelap</option>
                                                <option id="fontcolor5_edit"  value="whitecolor">Terang</option>
                                            </select>
                                            <br>
                                            <label>Posisi Text Section 5</label>
                                            <select name="position5" id="position5_edit"  class="form-control">
                                                <option id="position5_edit" value="text-center">Tengah</option>
                                                <option id="position5_edit" value="text-right">Kanan</option>
                                                <option id="position5_edit" value="text-left">Kiri</option>
                                            </select>
                                        </div>
                                      
                        </div>
                    </div>
                </div>
                
        </div>
        <div class="modal-footer">
          
          <input type="submit" class="btn btn-primary" value="Edit">
        </div>
    </form>
      </div>
    </div>
  </div>

  
@endsection


@section('script')

    
    <script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
     <script src="{{ asset('templates/admin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>  
      <script src="{{ asset('templates/admin/assets/bundles/datatables/datatables.min.js')}}"></script>
  <script src="{{ asset('templates/admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
    <script >
    $(document).ready(function(){
        $("#mytable").DataTable();
        $(".bg_color1").attr('data-jscolor',{value:'rgba(255,255,255,1)', position:'bottom', height:80, backgroundColor:'#333',
        palette:'rgba(0,0,0,0) #fff #808080 #000 #996e36 #f55525 #ffe438 #88dd20 #22e0cd #269aff #bb1cd4',
        paletteCols:11, hideOnPaletteClick:true});
        CKEDITOR.replace('myeditorss',{
                            height:200,
                            filebrowserUploadUrl:"{{route('ckeditor.upload', ['_token' => csrf_token() ])}} " ,
                            filebrowserBrowseUrl:"{{asset('/backend/file_browse?path=images')}}" ,
                            filebrowserUploadMethod: "form"
                        })
        $.fn.modal.Constructor.prototype._enforceFocus = function() {
                modal_this = this
                $(document).on('focusin', function (e) {
                    if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length 
                    && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') 
                    && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
                    modal_this.$element.focus()
                    }
                })
                };
        $("#inputData").click(function(){
            bersihkan_form();         
            $('#form-action').attr("action", "{{route('save_landing_page')}}");
    
            $("#inputmodal").modal();
        })
         $("#mytable").on("click", ".edit", function() {
            var idnya=$(this).attr('id').split('-');
            var id=idnya[1];
            var url="<?PHP echo env('APP_URL');?>/";
            $.ajax({
                type:'get',
                method:'get',
                url:'/backend/landing/find/'  + id ,
                data:'_token = <?php echo csrf_token() ?>'   ,
                success:function(hsl) {
                         if (hsl.error){
                       alert(hsl.message);

                   } else{
                    // // bersihkan_form();
                    //     $('#form-action').attr("action", "{{route('update_landing_page')}}");
                         $("#edit_titlelanding").val(hsl.titlelanding);
                         $("textarea.myeditors1").val(hsl.section1);
                         $("textarea.myeditors2").val(hsl.section2);
                         $("textarea.myeditors3").val(hsl.section3);
                         $("textarea.myeditors4").val(hsl.section4);
                         $("textarea.myeditors5").val(hsl.section5);
                         console.log('blabla',hsl.image3)
                        if (hsl.image1!=''){
                            $("#edit_bg_img1").show();
                            $("#edit_bg_img1").attr('src',url +  hsl.image1);
                                     $("#image1_edit").val(hsl.image1);
                        }
                        if (hsl.image2!=''){
                            $("#edit_bg_img2").show();
                            $("#edit_bg_img2").attr('src',url +  hsl.image2);
                                    $("#image2_edit").val(hsl.image2);
                         }
                        if (hsl.image3!=''){
                            $("#edit_bg_img3").show();
                            $("#edit_bg_img3").attr('src',url +  hsl.image3);
                                    $("#image3_edit").val(hsl.image3);
                        }
                        if (hsl.image4!=''){
                            $("#edit_bg_img4").show();
                            $("#edit_bg_img4").attr('src',url +  hsl.image4);
                                    $("#image4_edit").val(hsl.image4);
                        }
                        if (hsl.image5!=''){
                            $("#edit_bg_img5").show();
                            $("#edit_bg_img5").attr('src',url +  hsl.image5);
                                    $("#image5_edit").val(hsl.image5);
                       
                        }
                        $(".bg1_edit").val(hsl.background1);
                        $(".bg2_edit").val(hsl.background2);
                        $(".bg3_edit").val(hsl.background3);
                        $(".bg4_edit").val(hsl.background4);
                        $(".bg5_edit").val(hsl.background5);

                        $("#fontcolor1_edit").val(hsl.fontcolor1);
                        $("#fontcolor2_edit").val(hsl.fontcolor2);
                        $("#fontcolor3_edit").val(hsl.fontcolor3);
                        $("#fontcolor4_edit").val(hsl.fontcolor4);
                        $("#fontcolor5_edit").val(hsl.fontcolor5);
            
                        $("#title1_edit").val(hsl.title1);
                        $("#title2_edit").val(hsl.title2);
                        $("#title3_edit").val(hsl.title3);
                        $("#title4_edit").val(hsl.title4);
                        $("#title5_edit").val(hsl.title5);

                        $("#edit_format1").val(hsl.format1);
                        $("#edit_format2").val(hsl.format2);
                        $("#edit_format3").val(hsl.format3);
                        $("#edit_format4").val(hsl.format4);
                        $("#edit_format5").val(hsl.format5);

                        $("#position1_edit").val(hsl.position1);
                        $("#position2_edit").val(hsl.position2);
                        $("#position3_edit").val(hsl.position3);
                        $("#position4_edit").val(hsl.position4);
                        $("#position5_edit").val(hsl.position5);
                        $("#edit_id").val(id);
                                
         CKEDITOR.replace('myeditor1',{
                            height:200,
                            filebrowserUploadUrl:"{{route('ckeditor.upload', ['_token' => csrf_token() ])}} " ,
                            filebrowserBrowseUrl:"{{asset('/backend/file_browse?path=images')}}" ,
                            filebrowserUploadMethod: "form"
                        })
         CKEDITOR.replace('myeditor2',{
                            height:200,
                            filebrowserUploadUrl:"{{route('ckeditor.upload', ['_token' => csrf_token() ])}} " ,
                            filebrowserBrowseUrl:"{{asset('/backend/file_browse?path=images')}}" ,
                            filebrowserUploadMethod: "form"
                        })
         CKEDITOR.replace('myeditor3',{
                            height:200,
                            filebrowserUploadUrl:"{{route('ckeditor.upload', ['_token' => csrf_token() ])}} " ,
                            filebrowserBrowseUrl:"{{asset('/backend/file_browse?path=images')}}" ,
                            filebrowserUploadMethod: "form"
                        })
         CKEDITOR.replace('myeditor4',{
                            height:200,
                            filebrowserUploadUrl:"{{route('ckeditor.upload', ['_token' => csrf_token() ])}} " ,
                            filebrowserBrowseUrl:"{{asset('/backend/file_browse?path=images')}}" ,
                            filebrowserUploadMethod: "form"
                        })
         CKEDITOR.replace('myeditor5',{
                            height:200,
                            filebrowserUploadUrl:"{{route('ckeditor.upload', ['_token' => csrf_token() ])}} " ,
                            filebrowserBrowseUrl:"{{asset('/backend/file_browse?path=images')}}" ,
                            filebrowserUploadMethod: "form"
                        })
        CKEDITOR.config.removeButtons = 'Save,Print,ExportPdf,Templates,NewPage,Preview,Scayt,About'
        
                
                         $("#editmodal").modal();
                   }
                }
            });
            
        })

    })
    </script>
  <script>
    $(document).ready(function() {
        var max_fields = 5;
        var wrapper = $(".container1");
        var add_button = $(".add_form_field");

        var x = 1;
        $(add_button).click(function(e) {
            
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<div><hr><label class="mt-2">Judul Section '+x+'</label><input type="text" name="title'+x+'" class="form-control"><label class="mt-2">Isi Section '+x+'</label><textarea class="form-control input-default mb-3" id="editor'+x+'" name="section'+x+'" rows=5></textarea><br><label>Dasar Section '+x+'</label><select name="format'+x+'" class="form-control"><option value="solid">Warna Solid</option><option value="paralax">Paralax</option></select><br><label class="mt-2"> Warna Background Section '+x+'</label><br><input type="color" id="colorPicker" name="background'+x+'"><br><label>Background Section '+x+'</label><input type="file" class="form-control" name="image'+x+'"><label>Tema Text Section '+x+'</label><select name="fontcolor'+x+'" class="form-control"><option value="darkcolor">Gelap</option><option value="whitecolor">Terang</option></select><br><label>Posisi Text Section '+x+'</label><select name="position'+x+'" class="form-control"><option value="text-center">Tengah</option><option value="text-right">Kanan</option><option value="text-left">Kiri</option></select><br><a href="#" class="delete btn btn-danger btn-sm mt-2"><i class="fa fa-trash"></i></a></div>'); //add input box
                console.log(x);
                CKEDITOR.replace('editor2');
                CKEDITOR.replace('editor3');
                CKEDITOR.replace('editor4');
                CKEDITOR.replace('editor5');
            } else {
                alert('Section tidak boleh lebih dari 5')
            }
        });

        $(wrapper).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
</script>
<script>
    document.querySelectorAll('input[type=color]').forEach(function(picker) {

    var targetLabel = document.querySelector('label[for="' + picker.id + '"]'),
    codeArea = document.createElement('span');

    codeArea.innerHTML = picker.value;
    targetLabel.appendChild(codeArea);

    picker.addEventListener('change', function() {
    codeArea.innerHTML = picker.value;
    targetLabel.appendChild(codeArea);
    });
    });
</script>
@endsection