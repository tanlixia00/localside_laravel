@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Edit Barang</div>
                
                <div class="card-body">
                <a href="{{route('books.index')}}"><< Kembali</a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <hr/>
                    <form method="POST" action="{{ route('books.update', $data->id)}}" enctype="multipart/form-data">
                        <div class="form-group">
                                @csrf
                                @method("PUT")
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" name="namaBuku" value="{{$data->title}}">
                            <small class="form-text text-muted">Isikan Nama Barang Anda</small>
                            <br/>
                            <label>Deskripsi </label>
                            <input type="text" class="form-control" name="publisherBuku" value="{{$data->deskripsi}}">
                            <small class="form-text text-muted">Isikan Deskripsi Barang Anda</small>

                            <br/>
                            <label>Harga Jual </label>
                            <input type="number" class="form-control" name="hargaBuku" value="{{$data->price}}">
                            <small class="form-text text-muted">Isikan Nominal Harga Barang Anda</small>

                            <br/>
                            <label>Kategori Produk</label> <br>
                            <select name="kategori" id="spls">
                                @foreach($kat as $s)
                                    @if ($data->idKategori == $s->id )
                                        <option value="{{ $s->id }}" selected>{{ $s->name }}</option>
                                    @else
                                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                                    @endif
                                
                                @endforeach
                            </select>
                            <br>
                            <br/>
                            <label>Stok Barang </label>
                            <input type="number" class="form-control" name="stok" value="{{$data->stok}}">
                            <small class="form-text text-muted">Isikan Jumlah Stok</small>
                            
                            <br/>
                            <div>
                                <img src="{{ asset('images/'.$data->gambar) }}" alt="Current image" width="200">
                            </div>
                            

                            <br/>
                            <label>Image Input</label> <br>
                            <input type="file" id="exampleInputFile1" name="image_upload">
                            <small class="form-text text-muted">berisi foto buku</small>
                            <br/>

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
