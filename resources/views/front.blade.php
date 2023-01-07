<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Resto SMK</title>
</head>
<body>
    <div class="container">
        <div class="mt-5">
            <nav class="navbar navbar-expand-lg bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand text-white" href="{{ url('/') }}">
                        <img style="height: 40px" src="{{ asset('20220305_051524.jpg') }}" alt="" srcset="" class="d-inline-block align-text-center">
                        Project-Resto_Laravel
                    </a>
                    <ul class="navbar-nav gap-5">
                        @if (session()->has('cart'))
                            <li class="nav-item"><a class=" btn btn-info text-white" href="{{ url('cart') }}">Cart (
                                @php
                                    $count = count(session('cart'));
                                    echo $count;
                                @endphp
                            )</a></li>
                        @else
                            <li class="nav-item text-white btn btn-info">Cart</li>
                        @endif
                        @if (session()->missing('idpelanggan'))
                            <li class="nav-item text-white"><a class="btn btn-primary" href="{{ url('register') }}">Register</a></li>
                            <li class="nav-item text-white"><a class="btn btn-success" href="{{ url('login') }}">Login</a></li>
                        @endif
                        @if (session()->has('idpelanggan'))
                            <li class="nav-item text-white btn btn-primary"> {{ session('idpelanggan')['email'] }} </li>
                            <li class="nav-item "><a href="{{ url('logout') }}" class="btn btn-danger">Logout</a></li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="col-2">
                <ul class="list-group">
                    @foreach ($kategoris as $kategori)
                        <li class="list-group-item"><a href="{{ url('show/'.$kategori->idkategori) }}">{{ $kategori -> kategori}}</a></li>
                    @endforeach
                </ul>

            </div>
            <div class="col-10 mt-5">
                @yield('content')
            </div>
        </div>
        <div>
            <footer class="row mt-5">
                <div class="col">
                    <p class="text-center">2022 - Copyright@Mangaonlen.com</p>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
