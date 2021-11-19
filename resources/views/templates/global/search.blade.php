<div class="row justify-content-end">
    <div class="col-md-5">
        <form action="{{ route('findproduk') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari produk" name="search" value="{{$search}}" aria-label="Cari produk" aria-describedby="basic-addon2">
                <div class="input-group-append ml-3">
                    <button type="submit" class="btn btn-success">CARI PRODUK</button>
                </div>
            </div>
        </form>
    </div>
</div>