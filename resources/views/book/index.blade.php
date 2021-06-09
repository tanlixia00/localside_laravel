@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Product</div>
                <div> <a href="{{route('category.index')}}">go to Kategori</a> </div>
                <div class="card-body">
                <a href="{{route('books.create')}}">+ Tambah Barang Baru</a>
                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    
                    <table id="nota" class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th style="width:10%">Kode</th>
                            <th style="width:30%">Nama Barang</th>
                            <th style="width:30%">Kategori</th>
                            <th style="width:30%" class="">Deskripsi</th>
                            <th style="width:20%" class="text-center">Harga</th>
                            <th style="width:10%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($query as $t)
                            <tr>
                                <td data-th="Kode" name='id'>
                                   {{ $t->id }}
                                </td>
                                <td data-th="Judul">{{ $t->title }}</td>
                                <td data-th="kategori">
                                    @foreach($kat as $k)
                                        @if($k->id == $t->idKategori)
                                            {{ $k->name }}
                                        @endif
                                    @endforeach
                                    
                                </td>
                                <td data-th="Total">
                                    {{ $t->deskripsi }}
                                </td>
                                <td data-th="Harga">
                                    Rp. {{ $t->price }}
                                </td>
                            @can('delete-permission', $t)
                                <td class="actions" data-th="">
                                <form method='POST' action="{{url('book/'.$t->id )}}" >
                                @csrf
                                @method('DELETE')
                                <input type='submit' value='hapus' class='btn btn-xs btn-danger'
                                    onclick="if(!confirm('apakah anda yakin?')) return false;"/>
                                </form>
                                </td>
                            @endcan   
                                <td>
                                    <a class="btn btn-xs btn-info" href="{{ route('books.edit', $t->id)}}"> Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        
    </script>

@endsection
