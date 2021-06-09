@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Riwayat</div>
                
                <div class="card-body">
                
                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    
                    <table id="nota" class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th style="width:10%">Kode</th>
                            <th style="width:30%">Waktu Transaksi</th>
                            <th style="width:30%" class="">Total</th>
                            <th style="width:10%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $t)
                            <tr>
                                <td data-th="Kode" name='id'>
                                   #{{ $t->id }}
                                </td>
                                <td data-th="waktu">{{ $t->created_at }}</td>
                                <td data-th="Total">
                                   Rp.{{ $t->total_belanja }}
                                </td>
                                
                                <td>
                                    <a class="btn btn-xs btn-info" href="{{ url('view-detail-order', $t->id)}}"> View</a>
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
