<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Resto SMK | Admin Page</title></head>
<body>
    <div class="container">
        <div class="mt-4">
            <nav class="navbar navbar-expand-lg bg-dark">
                <div class="container-fluid">
                    <h2 class="text-white">Admin Page</h2>
                    <ul class="navbar-nav gap-5">
                        <li class="nav-item text-white">
                            {{ Auth::user()->email }}
                        </li>
                        <li class="nav-item text-white">
                            Level: {{ Auth::user()->level }}
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/logout') }}" class="text-white btn btn-danger">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="row mt-5">
            <div class="col-2">
                <ul class="list-group">
                    @if (Auth::user()->level == 'admin')
                        <li class="list-group-item"><a href="{{ url('admin/user') }}">User</a></li>
                    @elseif (Auth::user()->level == 'kasir')
                        <li class="list-group-item"><a href="">Order</a></li>
                        <li class="list-group-item"><a href="">Order Detail</a></li>
                    @elseif (Auth::user()->level == 'manager')
                        <li class="list-group-item"><a href="{{ url('admin/kategori') }}">Kategori</a></li>
                        <li class="list-group-item"><a href="{{ url('admin/menu') }}">Menu</a></li>
                        <li class="list-group-item"><a href="{{ url('admin/pelanggan') }}">Pelanggan</a></li>
                        <li class="list-group-item"><a href="{{ url('admin/order') }}">Order</a></li>
                        <li class="list-group-item"><a href="{{ url('admin/orderdetail') }}">Order Detail</a></li>
                    @endif
                </ul>
            </div>
            <div class="col-10">
                @yield("admincontent")
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
