@extends('layouts.frontend')

@section('title', 'Products')

@section('content')

    <div class="container products">

        <div class="row">

            @foreach($products as $product)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ asset('images/'.$product->gambar) }}" width="300" height="250">
                        <div class="caption">
                            <h5>{{ Str::limit($product->title, 18) }}</h5>
                            <p>{{ Str::limit(strtolower($product->deskripsi), 50) }}</p>
                            <p><strong>Price: </strong> IDR {{ $product->price }}</p>


                            <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}" 
                               class="btn btn-warning btn-block text-center btn-disable" role="button">Add to cart</a> </p>


                        </div>
                    </div>
                </div>
            @endforeach

        </div><!-- End row -->

    </div>

@endsection