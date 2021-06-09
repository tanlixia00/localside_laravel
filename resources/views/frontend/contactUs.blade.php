@extends('layouts.frontend')

@section('content')


<div class="container" style="float:left;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Kritik/Saran Baru</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <hr/>
                    <form method="POST" action="{{ route('user.store')  }}">
                        <div class="form-group">
                                @csrf
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama">
                            
                            <br/>
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                            <br/>
                            <label>No telepon</label>
                            <input type="number" class="form-control" name="notelp">
                            <br/>
                            <label>Isi saran</label>
                            <textarea name="isi_saran" id="" cols="85" rows="5"></textarea>
                            <br/>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                   

                </div>
            </div>
        </div>
    </div>
</div>
<img src="{{ asset('images/ContactUs.jpg') }}" width="300" >
@endsection