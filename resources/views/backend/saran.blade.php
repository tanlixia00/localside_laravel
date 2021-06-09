@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Saran</div>
                <div class="card-body">
                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    
                    <table id="nota" class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th style="width:5%">ID</th>
                            <th style="width:15%">Nama</th>
                            <th style="width:20%">email</th>
                            <th style="width:15%" class="">no tlp</th>
                            <th style="width:45%" class="text-center">Isi Saran</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($query as $t)
                            <tr>
                                <td data-th="Kode" name='id'>
                                   {{ $t->id }}
                                </td>
                                <td data-th="Judul">{{ $t->name }}</td>
                                <td data-th="Total">
                                    {{ $t->email }}
                                </td>
                                <td data-th="Harga">
                                    {{ $t->notelp }}
                                </td>
                                <td data-th="Harga">
                                    {{ $t->isi_saran }}
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
