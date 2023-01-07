@extends('Backends.back')

@section('admincontent')
    <div>
        <h1>Menu</h1>
    </div>
    <div>
        <a href="{{ url('admin/menu/create') }}" class="btn btn-primary">New Data</a>
    </div>
    <div class="row mt-4">
        <div class="col-4">
            <form action="{{ url('admin/select') }}" method="get">
                <select class="form-select" name="idkategori" id="" onchange="this.form.submit()">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->idkategori }}">{{ $kategori->kategori }}</option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>
    <div>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Menu</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Harga</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            <tbody>
                @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $menu->kategori }}</td>
                        <td>{{ $menu->menu }}</td>
                        <td>{{ $menu->deskripsi }}</td>
                        <td><img width="100px" src="{{ asset('img/'.$menu->gambar) }}" alt=""></td>
                        <td>{{ $menu->harga }}</td>
                        <td><a class="btn btn-info text-white" href="{{ url('admin/menu/'.$menu->idmenu.'/edit') }}">Edit</a></td>
                        <td><a class="btn btn-danger" href="{{ url('admin/menu/'.$menu->idmenu) }}">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center mt-5">
        {{ $menus->withQueryString()->links() }}
    </div>
@endsection
