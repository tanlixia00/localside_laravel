@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Product Baru</div>
                
                <div class="card-body">
                <a href="{{route('books.index')}}"><< Kembali</a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <hr/>
                    <form method="POST" action="{{ route('books.store')}}" enctype="multipart/form-data">
                        <div class="form-group">
                                @csrf
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" name="namaBuku">
                            <small class="form-text text-muted">Isikan Nama Barang Anda</small>
                            <br/>
                            <label>Deskripsi </label>
                            <input type="text" class="form-control" name="publisherBuku">
                            <small class="form-text text-muted">Isikan Deskripsi Barang Anda</small>

                            <br/>
                            <label>Harga Jual</label>
                            <input type="number" class="form-control" name="hargaBuku">
                            <small class="form-text text-muted">Isikan Nominal Harga Barang Anda</small>

                            <br/>
                            <label>Kategori Barang</label> <br>
                            <select name="kategori" id="spls">
                                @foreach($categori as $s)
                                <option value="{{ $s->id }}"> <?php echo $s->name ?> </option>
                                @endforeach
                            </select>
                            <br>
                            <br/>
                            <label>Stok Buku </label>
                            <input type="number" class="form-control" name="stok">
                            <small class="form-text text-muted">Isikan Jumlah Stok Buku</small>

                            <div class="form-group">
                                <label for="inputfile">Image input</label>
                                <input type="file" id="exampleInputFile1" name="image_upload">
                                <p class="help-block">
                                    berisi foto produk
                                </p>
                            </div>
                        </div>  
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
