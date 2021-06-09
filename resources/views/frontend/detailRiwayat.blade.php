@extends('layouts.frontend')

@section('title', 'Cart')

@section('content')
    <h2>Detail Order</h2>
    
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>

        <?php $total = $data[0]->total_belanja;
                $kode = $data[0]->order_id;
                $tanggal = $data[0]->created_at;
        ?>
        <p>Transaksi kode: #{{ $kode }}</p>
        <p>Tanggal: {{ $tanggal }}</p>

            @foreach($data as $t)
                
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ asset('images/'.$t->gambar) }}"  height="150" 
                                class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $t->title }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">Rp. {{ $t->price }}</td>
                    <td data-th="Quantity">{{ $t->quantity }} </td>
                    <td data-th="Subtotal" class="text-center">Rp. {{ $t->price * $t->quantity }}</td>
                    <td class="actions" data-th="">
                    </td>
                </tr>
            @endforeach

        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total Rp.{{ $total }}</strong></td>
        </tr>
        <tr>
            <td><a href="{{ url('/riwayat') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Kembali ke Daftar Pemesanan</a></td>
            <td class="hidden-xs"></td>

            <td class="hidden-xs"><strong>Total Rp. {{ $total }}</strong></td>
        </tr>
        </tfoot>
    </table>

@endsection

