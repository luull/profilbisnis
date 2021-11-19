@extends('admin.master')

@section('style')
<script src="{{asset('js/jscolor.js')}}"></script>
@endsection
@section('content')
<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/landing-page">Table Landing Page</a></li>
        </ol>
    </nav>
</div>
<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="card">
            <div class="card-body">
                @if (session('message'))
                <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
                @endif
                <div class="row justify-content-end">
                    <div class="col-md-2">
                        <button data-toggle="modal" data-target="#inputmodal" class="btn btn-info mt-4">Add Data</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Judul </th>
                                <th>Slug</th>
                                <th>Themes</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($datas as $data)
                            <tr>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->slug}}</td>
                                <td>{{$data->themes->name}}</td>
                                <td>
                                    <a href="#" class="edit " id="e-{{$data->id}}" alt="Edit"><i class="fa fa-lg fa-edit text-info" alt="edit"></i></a>
                                    <a href="/admin/landing-page/delete/{{$data->id}}" id="e-{{$data->id}}" alt="Delete"><i class="fa fa-lg fa-trash text-danger"></i></a>
                                    <a href="/landing-page/{{session('member_id')}}/{{$data->slug}}"" alt=" Show" target="_Blank"><i class="fa fa-lg fa-eye text-dark"></i></a>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="inputmodal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form-action" action="{{route('save_landing_page')}}" method="Post" enctype="multipart/form-data">
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
                                <div class="card">
                                    <div class="card-body">
                                        <div class="basic-form">
                                            <div class="form-group">
                                                <label>Judul Landing Page</label>
                                                <input type="text" class="form-control input-default @error('nama')is-invalid @enderror" name="nama" id="nama">
                                                <input type="hidden" name="edit_id" id="edit_id">

                                                @error('nama')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Judul Landing Page</label>
                                                <select name="themes_id" class="form-control @error('themes')is-invalid @enderror" id="themes">
                                                    @foreach ($themes as $theme)
                                                    <option value="{{$theme->id}}">{{$theme->name}}</option>

                                                    @endforeach
                                                </select>
                                                @error('themes_id')
                                                <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label>Section 1</label>
                                                <textarea class="form-control input-default" id="myeditor" name="section1" rows=5></textarea>
                                                <div class="row justify-content-between p-3">
                                                    <div><input type="checkbox" id="paralax1" name="paralax[]" value="1">
                                                        <label for="paralax1"> Background Efek Parallax </label> &nbsp;
                                                    </div>
                                                    <div><a href="#" id="btn-myeditor" class="btn btn-sm btn-info btnEditor">Code</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Warna Background Section 1</label>
                                            <input class="form-control bg_color1 @error('bg_color1')is-invalid @enderror" data-jscolor="" id="bg_color1" name="bg_color1">
                                            @error('bg_color1')
                                            <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <label>Background Section 1</label><br>
                                            <img src="" class="img img-thumbnail mb-2" id="edit_bg_img1" style="width:150px">
                                            <br><input type="text" name="bg1_edit" id="bg1_edit">

                                            <input type="file" name="bg1" id="bg1" class="form-control input-default @error('bg1')is-invalid @enderror">
                                            @error('bg1')
                                            <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label>Section 2</label>
                                            <textarea class="form-control input-default" id="myeditor1" name="section2" rows=5></textarea>
                                            <div class="row justify-content-between p-3">
                                                <div><input type="checkbox" id="paralax2" name="paralax[]" value="2">
                                                    <label for="paralax1"> Background Efek Parallax </label> &nbsp;
                                                </div>
                                                <div><a href="#" id="btn-myeditor1" class="btn btn-sm btn-info btnEditor">Code</a></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Warna Background Section 2</label>
                                            <input class="form-control @error('bg_color2')is-invalid @enderror" data-jscolor="" id="bg_color2" name="bg_color2">
                                            @error('bg_color2')
                                            <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Background Section 2</label><br>
                                            <img src="" class="img img-thumbnail mb-2" id="edit_bg_img2" style="width:150px">
                                            <br><input type="text" name="bg2_edit" id="bg2_edit">
                                            <input type="file" name="bg2" id="bg2" class="form-control input-default @error('bg2')is-invalid @enderror">
                                            @error('bg2')
                                            <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Section 3</label>
                                            <textarea class="form-control input-default" id="myeditor2" name="section3" rows=5></textarea>
                                            <div class="row justify-content-between p-3">
                                                <div><input type="checkbox" id="paralax3" name="paralax[]" value="3">
                                                    <label for="paralax1"> Background Efek Parallax </label> &nbsp;
                                                </div>
                                                <div><a href="#" id="btn-myeditor2" class="btn btn-sm btn-info btnEditor">Code</a></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Warna Background Section 3</label>
                                            <input class="form-control @error('bg_color3')is-invalid @enderror" data-jscolor="" id="bg_color3" name="bg_color3">
                                            @error('bg_color3')
                                            <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Background Section 3</label><br>
                                            <img src="" class="img img-thumbnail mb-2" id="edit_bg_img3" style="width:150px">
                                            <br>
                                            <input type="text" name="bg3_edit" id="bg3_edit">
                                            <input type="file" name="bg3" id="bg3" class="form-control input-default @error('bg3')is-invalid @enderror">
                                            @error('bg3')
                                            <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Section 4</label>
                                            <textarea class="form-control input-default" id="myeditor3" name="section4" rows=5></textarea>
                                            <div class="row justify-content-between p-3">
                                                <div><input type="checkbox" id="paralax4" name="paralax[]" value="4">
                                                    <label for="paralax1"> Background Efek Parallax </label> &nbsp;
                                                </div>
                                                <div><a href="#" id="btn-myeditor3" class="btn btn-sm btn-info btnEditor">Code</a></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Warna Background Section 4</label>
                                            <input class="form-control @error('bg_color4')is-invalid @enderror" data-jscolor="" id="bg_color4" name="bg_color4">
                                            @error('bg_color4')
                                            <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Background Section 4</label><br>
                                            <img src="" class="img img-thumbnail mb-2" id="edit_bg_img4" style="width:150px">
                                            <br>

                                            <input type="text" name="bg4_edit" id="bg4_edit">
                                            <input type="file" name="bg4" id="bg4" class="form-control input-default @error('bg4')is-invalid @enderror">
                                            @error('bg1')
                                            <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="btnClose" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" id="btnOk" class="btn btn-primary" value="Proses">
                </div>
            </form>
        </div>
    </div>
</div>


@endsection


@section('script')

<script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script>
    $(document).ready(function() {

        $(".bg_color1").attr('data-jscolor', {
            value: 'rgba(255,255,255,1)',
            position: 'bottom',
            height: 80,
            backgroundColor: '#333',
            palette: 'rgba(0,0,0,0) #fff #808080 #000 #996e36 #f55525 #ffe438 #88dd20 #22e0cd #269aff #bb1cd4',
            paletteCols: 11,
            hideOnPaletteClick: true
        });

        CKEDITOR.replace('myeditor', {
            height: 200,
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}} ",
            filebrowserBrowseUrl: "{{asset('/admin/file_browse?path=images')}}",
            filebrowserUploadMethod: "form"
        })
        CKEDITOR.replace('myeditor1', {
            height: 200,
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}} ",
            filebrowserBrowseUrl: "{{asset('/admin/file_browse?path=images')}}",
            filebrowserUploadMethod: "form"
        })
        CKEDITOR.replace('myeditor2', {
            height: 200,
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}} ",
            filebrowserBrowseUrl: "{{asset('/admin/file_browse?path=images')}}",
            filebrowserUploadMethod: "form"
        })
        CKEDITOR.replace('myeditor3', {
            height: 200,
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}} ",
            filebrowserBrowseUrl: "{{asset('/admin/file_browse?path=images')}}",
            filebrowserUploadMethod: "form"
        })
        CKEDITOR.config.removeButtons = 'Save,Print,ExportPdf,Templates,NewPage,Preview,Scayt,About'

        $.fn.modal.Constructor.prototype._enforceFocus = function() {
            modal_this = this
            $(document).on('focusin', function(e) {
                if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length &&
                    !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') &&
                    !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
                    modal_this.$element.focus()
                }
            })
        };
        $("#inputData").click(function() {
            bersihkan_form();
            $('#form-action').attr("action", "{{route('save_landing_page')}}");

            $("#inputmodal").modal();
        })
        $(".edit").click(function() {
            var idnya = $(this).attr('id').split('-');
            var id = idnya[1];
            $.ajax({
                type: 'get',
                method: 'get',
                url: '/admin/landing-page/find/' + id,
                data: '_token = <?php echo csrf_token() ?>',
                success: function(hsl) {
                    if (hsl.error) {
                        alert(hsl.message);

                    } else {
                        // bersihkan_form();
                        $('#form-action').attr("action", "{{route('update_landing_page')}}");
                        $("#nama").val(hsl.nama);

                        $("textarea#myeditor").val(hsl.section1);
                        CKEDITOR.instances.myeditor.setData(hsl.section1);
                        $("textarea#myeditor1").val(hsl.section2);
                        CKEDITOR.instances.myeditor1.setData(hsl.section2);
                        $("textarea#myeditor2").val(hsl.section3);
                        CKEDITOR.instances.myeditor2.setData(hsl.section3);
                        $("textarea#myeditor3").val(hsl.section4);
                        CKEDITOR.instances.myeditor3.setData(hsl.section4);

                        $("#paralax1").prop('checked', hsl.paralax1);
                        $("#paralax2").prop('checked', hsl.paralax2);
                        $("#paralax3").prop('checked', hsl.paralax3);
                        $("#paralax4").prop('checked', hsl.paralax4);
                        $("#bg_color1").attr('data-jscolor', {
                            value: hsl.bg_color1,
                            position: 'bottom',
                            height: 80,
                            backgroundColor: '#333',
                            palette: 'rgba(0,0,0,0) #fff #808080 #000 #996e36 #f55525 #ffe438 #88dd20 #22e0cd #269aff #bb1cd4',
                            paletteCols: 11,
                            hideOnPaletteClick: true
                        })
                        $("#bg_color1").val(hsl.bg_color1);
                        $("#bg_color2").attr('data-jscolor', {
                            value: hsl.bg_color2,
                            position: 'bottom',
                            height: 80,
                            backgroundColor: '#333',
                            palette: 'rgba(0,0,0,0) #fff #808080 #000 #996e36 #f55525 #ffe438 #88dd20 #22e0cd #269aff #bb1cd4',
                            paletteCols: 11,
                            hideOnPaletteClick: true
                        })
                        $("#bg_color2").val(hsl.bg_color2);
                        $("#bg_color3").attr('data-jscolor', {
                            value: hsl.bg_color3,
                            position: 'bottom',
                            height: 80,
                            backgroundColor: '#333',
                            palette: 'rgba(0,0,0,0) #fff #808080 #000 #996e36 #f55525 #ffe438 #88dd20 #22e0cd #269aff #bb1cd4',
                            paletteCols: 11,
                            hideOnPaletteClick: true
                        })
                        $("#bg_color3").val(hsl.bg_color3);
                        $("#bg_color4").attr('data-jscolor', {
                            value: hsl.bg_color4,
                            position: 'bottom',
                            height: 80,
                            backgroundColor: '#333',
                            palette: 'rgba(0,0,0,0) #fff #808080 #000 #996e36 #f55525 #ffe438 #88dd20 #22e0cd #269aff #bb1cd4',
                            paletteCols: 11,
                            hideOnPaletteClick: true
                        })

                        $("#bg_color4").val(hsl.bg_color4);
                        $("#bg1_edit").show();
                        $("#bg2_edit").show();
                        $("#bg3_edit").show();
                        $("#bg4_edit").show();
                        if (hsl.bg1 != '') {
                            $("#edit_bg_img1").show();
                            $("#edit_bg_img1").attr('src', hsl.bg1)
                        }
                        if (hsl.bg2 != '') {
                            $("#edit_bg_img2").show();
                            $("#edit_bg_img2").attr('src', hsl.bg2)
                        }
                        if (hsl.bg3 != '') {
                            $("#edit_bg_img3").show();
                            $("#edit_bg_img3").attr('src', hsl.bg3)
                        }
                        if (hsl.bg4 != '') {
                            $("#edit_bg_img4").show();
                            $("#edit_bg_img4").attr('src', hsl.bg4)
                        }
                        $("#bg1_edit").val(hsl.bg1);
                        $("#bg2_edit").val(hsl.bg2);
                        $("#bg3_edit").val(hsl.bg3);
                        $("#bg4_edit").val(hsl.bg4);


                        $("#edit_id").val(id);


                        $("#inputmodal").modal();
                    }
                }
            });

        })

        $(".btnEditor").click(function() {
            var caption = $(this).html();
            var a_id = $(this).attr('id').split('-');
            var id = a_id[1];
            if (caption == "Editor") {

                CKEDITOR.replace(id, {
                    height: 200,
                    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}} ",
                    filebrowserBrowseUrl: "{{asset('/admin/file_browse?path=images')}}",
                    filebrowserUploadMethod: "form"
                })
                $(this).html('Code');
            } else {
                $(this).html('Editor');
                CKEDITOR.instances[id].destroy();

            }
        })
        $(".btnEditor1").click(function() {
            var caption = $(this).html();
            var a_id = $(this).attr('id').split('-');
            var id = a_id[1];
            if (caption == "Editor") {

                CKEDITOR.replace(id, {
                    height: 200,
                    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}} ",
                    filebrowserBrowseUrl: "{{asset('/admin/file_browse?path=images')}}",
                    filebrowserUploadMethod: "form"
                })

                $(this).html('Code');
            } else {
                $(this).html('Editor');
                CKEDITOR.instances[id].destroy();

            }
        })

    })

    jscolor.presets.default = {
        position: 'right',
        palette: [
            '#000000', '#7d7d7d', '#870014', '#ec1c23', '#ff7e26',
            '#fef100', '#22b14b', '#00a1e7', '#3f47cc', '#a349a4',
            '#ffffff', '#c3c3c3', '#b87957', '#feaec9', '#ffc80d',
            '#eee3af', '#b5e61d', '#99d9ea', '#7092be', '#c8bfe7',
        ],
        //paletteCols: 12,
        //hideOnPaletteClick: true,

    };

    function bersihkan_form() {

        $("#nama").val('');
        $("#bg1_edit").hide();
        $("#bg2_edit").hide();
        $("#bg3_edit").hide();
        $("#bg4_edit").hide();
        $("#edit_bg_img1").hide();
        $("#edit_bg_img2").hide();
        $("#edit_bg_img3").hide();
        $("#edit_bg_img4").hide();

        $("textarea#myeditor2").val('');
        $("textarea#myeditor3").val('');
        $("textarea#myeditor1").val('');
        $("textarea#myeditor").val('');
        CKEDITOR.instances.myeditor.setData('');
        CKEDITOR.instances.myeditor1.setData('');
        CKEDITOR.instances.myeditor2.setData('');
        CKEDITOR.instances.myeditor3.setData('');
        $("#bg_color1").val('');
        $("#bg_color2").val('');

        $("#bg_color3").val('');

        $("#bg_color4").val('');
    }
</script>
@endsection