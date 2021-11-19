<?php
$name = session('data')->username
?>
<div class="row p-3">
    <ul class="social-icons">
        <p id="p1" style="display: none;">{{ Request::url() }}</p>
        @foreach($socialShare as $key => $value)
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
            <a href="#" onclick="doCapture();">
                <i class="fa fa-download"></i>
            </a>
        </li>
        <li>
            <a href="#" onclick="copyToClipboard('#p1')">
                <i class="fa fa-copy"></i>
            </a>
        </li>
    </ul>
</div>
<script>
    function goToURL(url) {
        var getid = document.getElementById('get');
        var name = getid.getAttribute('data-name');
        console.log('ini', name)
        window.open(window.location.origin + '/' + name, '_blank');
    }
</script>
<script>
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }
</script>