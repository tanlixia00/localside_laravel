@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Order</div>
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
                            <th style="width:15%">Nama Customer</th>
                            <th style="width:42%">Rincian Pembelian</th>
                            <th style="width:20%" class="">total Harga</th>
                            <th style="width:18%">Tanggal Checkout</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($query as $t)
                            <tr>
                                <td data-th="Kode" name='id'>
                                   {{ $t->id }}
                                </td>
                                <td data-th="Judul">{{ $t->name }}</td>
                                <td data-th="Harga">
                                    @foreach($query2 as $d)
                                    @if ($d->order_id == $t->id )
                                        <p>{{ $d->title }} </p>
                                        <p>Qty: {{ $d->quantity }}</p>
                                    @endif
                                    @endforeach
                                </td>
                                <td data-th="Total">
                                    Rp.{{ $t->total_belanja }}
                                </td>
                                <td data-th="tanggal">
                                    {{ $t->created_at }}
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
