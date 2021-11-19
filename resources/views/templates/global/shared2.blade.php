<style>
    .social-icons {
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }

    .social-icons li {
        display: inline-block;
        margin-bottom: 4px;
    }

    .social-icons li.title {
        margin-right: 15px;
        text-transform: uppercase;
        color: #96a2b2;
        font-weight: 700;
        font-size: 13px;
    }

    .social-icons i {
        padding-top: 15px;
    }

    .social-icons a {
        background-color: #eceeef;
        color: #818a91;
        font-size: 16px;
        display: inline-block;
        line-height: 44px;
        width: 44px;
        height: 44px;
        text-align: center;
        margin-right: 8px;
        border-radius: 100%;
        -webkit-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
        transition: all 0.2s linear;
    }

    .social-icons a:active,
    .social-icons a:focus,
    .social-icons a:hover {
        color: #fff;
        background-color: #565656;
    }

    .social-icons.size-sm a {
        line-height: 34px;
        height: 34px;
        width: 34px;
        font-size: 14px;
    }

    .social-icons a:hover {
        background-color: #565656;
    }

    @media (max-width: 767px) {
        .social-icons li.title {
            display: block;
            margin-right: 0;
            font-weight: 600;
        }

        .social-icons a {
            line-height: 5px !important;
            width: 32px !important;
            height: 32px !important;
            margin-right: 2px !important;
        }

        .social-icons i {
            font-size: 12px;
            padding-top: 10px !important;
        }
    }
</style>
<div class="row p-3">
    <ul class="social-icons">
        <p id="p1" style="display: none;">{{ Request::url() }}</p>
        @foreach($shareTestimoni as $key => $value)
        <li>
            <a href="{{$value}}" target="_blank">
                @if($key == "facebook")
                <i class="fa fa-facebook"></i>
                @elseif($key == "twitter")
                <i class="fa fa-twitter"></i>
                @elseif($key == "whatsapp")
                <i class="fa fa-whatsapp"></i>
                @elseif($key == "telegram")
                <i class="fa fa-telegram"></i>
                @else
                <i class="fa fa-home"></i>
                @endif
            </a>
        </li>
        @endforeach
        <li>
            <a href onclick="copyToClipboard('#p1')">
                <i class="fa fa-copy"></i>
            </a>
        </li>
    </ul>
</div>
<script>
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }
</script>