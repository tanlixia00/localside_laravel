@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Kategori Baru</div>
                
                <div class="card-body">
                <a href="{{route('books.index')}}"><< Kembali</a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <hr/>
                    <form method="POST" action="{{ route('category.store')  }}">
                        <div class="form-group">
                                @csrf
                            <label>Nama Kategori</label>
                            <input type="text" class="form-control" name="namaCategory">
                            <small class="form-text text-muted">Isikan Kategori Anda</small>
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
