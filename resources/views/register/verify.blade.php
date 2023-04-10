@extends('register.master')


@section('content')
<style>
    .activation-code-input {
        display: none;
    }

    .activation-code {
        direction: ltr;
        position: relative;
    }

    .activation-code::before {
        content: "";
        display: block;
        position: absolute;
        bottom: 0;
        right: 0;
        left: 0;
        border-bottom: 2px solid;
        border-color: #ccc;
        transition: opacity 0.3s ease;
    }

    .activation-code>span {
        position: absolute;
        display: block;
        font-size: 50px !important;
        font-weight:800;
        color: #ccc;
        top: 0;
        right: 0;
        transition: all 0.3s ease;
    }

    .activation-code .activation-code-inputs {
        display: flex;
        /*flex-direction: row;*/
        /*flex-wrap: nowrap;*/
        flex-flow: row nowrap;
    }

    .activation-code .activation-code-inputs input {
        display: flex;
        flex-flow: column nowrap;
        padding: 0;
        border: 0;
        outline: 0;
        min-width: 0;
        line-height: 36px;
        text-align: center;
        align-items: center;
        transition: all 0.3s ease;
        border-bottom: 2px solid;
        border-color: #ccc;
        margin-right: 8px;
        /*background: red;*/
        opacity: 0;
    }

    .activation-code .activation-code-inputs input:last-child {
        margin-right: 0;
    }

    .activation-code.active::before {
        opacity: 0;
    }

    .activation-code.active .activation-code-inputs input {
        opacity: 1 !important;
    }

    .activation-code .activation-code-inputs input:focus {
        border-color: #46b2f0 !important;
    }

    .activation-code.active>span {
        transform: translate(0, -100%);
        line-height: 30px;
        opacity: 0.6;
    }
</style>
<div class="container-fluid" >
    <div class="row">
        <div class="col-md-6 mb-0" style="background-color: #f4f4f4;">
            <img src="{{asset('images/login.png')}}" class="img-fluid" alt="">
        </div>
        <div class="col-md-6 verify-col">

                    <h1 class="">Penukaran Token</h1>
                    <p class="signup-link">Masukan 6 digit kode untuk melanjutkan pendaftaran profil bisnis</p>
                    @if ($errors->has('g-recaptcha-response'))
                    <div class="alert alert-warning mt-3">
                        {{ $errors->first('g-recaptcha-response') }}
                    </div>
                    @endif
                    @if (session('message'))
                    <div class="alert alert-{{session('alert')}} mt-3">
                        {{ session('message') }}
                    </div>
                    @endif
                    <form class="text-left" method="POST" action="{{ route('verify_login') }}">
                        @csrf
                        <div class="form">

                            <!-- <div class="d-flex mb-3">
                                <input type="tel" name="token" maxlength="1" pattern="[0-9]" class="form-control">
                                <input type="tel" name="token" maxlength="1" pattern="[0-9]" class="form-control">
                                <input type="tel" name="token" maxlength="1" pattern="[0-9]" class="form-control">
                                <input type="tel" name="token" maxlength="1" pattern="[0-9]" class="form-control">
                                <input type="tel" name="token" maxlength="1" pattern="[0-9]" class="form-control">

                            </div> -->
                            <input class="activation-code-input w-100 " name="token" style="font-size:40px !important;font-weight:800 !important;">
                            <!-- <input type="text" class="form-control" name="token"> -->
                        </div>
                        <hr>
                        <div class="form-group mt-2 mb-5">
                            <label style="float: left;">Verifikasi</label>
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                        </div>
                        <button type="submit" class="btn btn-primary">Lanjut</button>
                    </form>
        </div>
        {{-- <div class="col-md-6">
            <div class="form-image">
                <div class="l-image">
                </div>
            </div>
        </div> --}}
    </div>
</div>
 


@endsection
@section('script')
<script>
    $(document).ready(function() {
        $(".activation-code-input").activationCodeInput({
            number: 6
        });
    });

    function inputFilter(e) {
        var key = e.keyCode || e.which;

        if (
            (!e.shiftKey && !e.altKey && !e.ctrlKey && key >= 48 && key <= 57) ||
            (key >= 96 && key <= 105) ||
            key == 8 ||
            key == 9 ||
            key == 13 ||
            key == 37 ||
            key == 39
        ) {} else {
            return false;
        }
    }

    jQuery.fn.activationCodeInput = function(options) {
        var defaults = {
            number: 4,
            length: 1
        };
        var settings = $.extend({}, defaults, options);
        // $('#log').append('options = ' + JSON.stringify(options));
        // $('#log1').append('defaults = ' + JSON.stringify(defaults));
        // $('#log2').append('settings = ' + JSON.stringify(settings));

        return this.each(function() {
            var self = $(this);
            var activationCode = $("<div />").addClass("activation-code");
            var placeHolder = self.attr("placeholder");
            // alert(placeHolder);
            activationCode.append($("<span />").text(placeHolder));
            self.replaceWith(activationCode);
            activationCode.append(self);

            var activationCodeInputs = $("<div />").addClass("activation-code-inputs");

            for (var i = 1; i <= settings.number; i++) {
                activationCodeInputs.append(
                    $("<input />").attr({
                        maxLength: settings.length,
                        onkeydown: "return inputFilter(event)",
                        oncopy: "return false",
                        onpaste: "return false",
                        oncut: "return false",
                        ondrag: "return false",
                        ondrop: "return false"
                    })
                );
            }

            activationCode.prepend(activationCodeInputs);

            activationCode.on("click touchstart", function(event) {
                // console.log(event);
                // console.log(event.type);
                if (!activationCode.hasClass("active")) {
                    activationCode.addClass("active");
                    setTimeout(function() {
                        activationCode
                            .find(".activation-code-inputs input:first-child")
                            .focus();
                    }, 200);
                }
            });

            activationCode
                .find(".activation-code-inputs")
                .on("keyup input", "input", function(event) {
                    // $(this).css('background','red');
                    if (
                        $(this).val().toString().length == settings.length ||
                        event.keyCode == 39
                    ) {
                        $(this).next().focus();
                        if ($(this).val().toString().length) {
                            $(this).css("border-color", "#46b2f0");
                        }
                    }
                    if (event.keyCode == 8 || event.keyCode == 37) {
                        $(this).prev().focus();
                        if (!$(this).val().toString().length) {
                            $(this).css("border-color", "#ccc");
                        }
                    }
                    var value = "";
                    activationCode.find(".activation-code-inputs input").each(function() {
                        // value = value + $(this).val().toString();
                        value += $(this).val().toString();
                    });
                    self.attr({
                        value: value
                    });
                });

            $(document).on("click touchstart", function(e) {
                console.log(e.target);
                console.log($(e.target).parent());
                console.log($(e.target).parent().parent());
                // false true = false
                // true false = false
                // false false = false
                //true true = true
                if (
                    !$(e.target).parent().is(activationCode) &&
                    !$(e.target).is(activationCode) &&
                    !$(e.target).parent().parent().is(activationCode)
                ) {
                    var hide = true;

                    activationCode.find(".activation-code-inputs input").each(function() {
                        if ($(this).val().toString().length) {
                            hide = false;
                        }
                    });
                    if (hide) {
                        activationCode.removeClass("active");
                    } else {
                        activationCode.addClass("active");
                    }
                }
            });
        });
    };
</script>
@endsection