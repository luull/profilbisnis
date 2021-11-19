@extends('backend.master')


@section('content')
<div class="card">
        <div class="card-header">
            <h5 class="text-center">KATA PENGANTAR/WELCOME NOTE</h5>
            <hr>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-{{session('alert')}} text-center">{{session('message')}}</div>
            @endif
            <form method="post" action="{{route('update_welcome_note_backend')}}">
                @csrf
                <div class="form-group">
                        <label>Sub Title</label>
                        <input type="text" class="form-control input-default @error('sub_judul')is-invalid @enderror" name="sub_judul" id="sub_judul" value="{{$sub_judul}}">
                        @error('sub_judul')
                        <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control input-default @error('judul')is-invalid @enderror" name="judul" id="judul" value="{{$judul}}">
                        @error('judul')
                        <div class="text-danger mt-1 font-italic">{{ $message }}</div>
                        @enderror
                    </div>
                <div class="form-group">
                    <label>Welcome Note</label>
                    <textarea id="myeditor" name="welcome_note">{!!$wn!!}</textarea>
                </div>
                <input type="submit" value="Update" class="btn btn-info">
            </form>

        </div>
    </div>
@endsection    

@section('script')
    <script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>    
    <script >
    $(document).ready(function(){
        CKEDITOR.replace('myeditor',{
            height:200,
            filebrowserUploadUrl:"{{route('ckeditor.upload.backend', ['_token' => csrf_token() ])}} " ,
            filebrowserBrowseUrl:"{{asset('/backend/file_browse?path=images')}}" ,
            filebrowserUploadMethod: "form"
        })
        CKEDITOR.config.removeButtons = 'Save,Print,ExportPdf,Templates,NewPage,Preview,Scayt,About'
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
    })
    
</script>
@endsection