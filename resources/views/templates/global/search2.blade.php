<?php
$url = request()->segment(3);
$bisnis = request()->segment(1);
?>
<div class="row justify-content-end">
    <div class="col-md-5">
        @if($bisnis == 'bisnis1')
        <form action="{{ route('findprodukbisnis1', $url)  }}" method="GET">
            @elseif($bisnis == 'bisnis')
            <form action="{{ route('findprodukbisnis', $url)  }}" method="GET">
                @else
                <form action="{{ route('findprodukbisnis', $url)  }}" method="GET">
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari produk" name="search" value="{{$search}}" aria-label="Cari produk" aria-describedby="basic-addon2">
                        <div class="input-group-append ml-3">
                            <button type="submit" class="btn btn-success">CARI PRODUK</button>
                        </div>
                    </div>
                </form>
    </div>
</div>