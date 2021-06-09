@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Kategori</div>
                <div> <a href="{{route('books.index')}}">go to Product</a> </div>
                
                <div class="card-body">
                <a href="{{route('category.create')}}">+ Tambah Kategori Baru</a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table id="nota" class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th style="width:10%">Kode</th>
                            <th style="width:30%">Nama Kategori</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($query as $t)
                            <tr>
                                <td data-th="Kode">
                                   {{ $t->id }}
                                </td>
                                <td data-th="Kategori">{{ $t->name }}</td>
                                
                            @can('delete-permission', $t)
                                <td class="actions" data-th="">
                                <form method='POST' action="{{url('category/'.$t->id )}}" >
                                @csrf
                                @method('DELETE')
                                <input type='submit' value='hapus' class='btn btn-xs btn-danger'
                                    onclick="if(!confirm('apakah anda yakin?')) return false;"/>
                                </form>
                                </td>
                            @endcan
                                <td>
                                    <a class="btn btn-xs btn-info" href="{{ route('category.edit', $t->id)}}"> Edit</a>
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
