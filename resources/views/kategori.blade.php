
@extends('front')
@section('content')
    <div class="row">
        @foreach ($menus as $menu)
            <div class="card mx-2 mb-3" style="width: 18rem;">
                <img style="height: 300px" src="{{ asset('img/'.$menu->gambar) }}" class="card-img-top" alt="{{ $menu->gambar }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $menu->menu }}</h5>
                    <p class="card-text">{{ $menu->deskripsi }}</p>
                    <h5 class="card-title">{{ $menu->harga }}</h5>
                    <a href="{{ url('beli/'.$menu->idmenu) }}" class="btn btn-primary">Buy Now</a>
                </div>
            </div>
        @endforeach
    <div class="d-flex justify-content-center mt-5">
        {{ $menus -> links() }}
    </div>
    </div>
@endsection
