@extends('front')

@section('content')
@if (session('cart'))
    <div>
        <div>
            <a href="{{ url('batal') }}" class="btn btn-danger">Delete All</a>
        </div>
        @php
            $no =1;
            $total = 0;
        @endphp
        <table class="table table-bordered">
            <thead>
                <th>No</th>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Hapus</th>
            </thead>
            <tbody>
                @foreach (session('cart') as $idmenu=>$menu)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $menu['menu'] }}</td>
                        <td>{{ $menu['harga'] }}</td>
                        <td>
                            <span><a href="{{ url('kurang/'.$menu['idmenu']) }}"> <  </a></span>
                            {{ $menu['jumlah'] }}
                            <span><a href="{{ url('tambah/'.$menu['idmenu']) }}">  > </a></span>
                        </td>
                        <td>{{ $menu['jumlah'] * $menu['harga'] }}</td>
                        <td><a href="{{ url('hapus/'.$menu['idmenu']) }}"> Hapus </a></td>
                    </tr>
                    @php
                        $total = $total + ($menu['jumlah'] * $menu['harga'])
                    @endphp
                @endforeach
                <tr>
                    <td colspan="4">Total pembayaran</td>
                    <td>{{ $total }}</td>
                </tr>
            </tbody>
        </table>
        <div>
            <a href="{{ url('checkout') }}" class="btn btn-success">Checkout</a>
        </div>
    </div>
@else
    <script>
        window.location.href="/";
    </script>
@endif
@endsection
