@extends('Backends.back')

@section('admincontent')
    <div>
        <h1>kategori</h1>
    </div>
    <div>
        <a href="{{ url('admin/kategori/create') }}" class="btn btn-primary">New Data</a>
    </div>
    <div>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            <tbody>
                @foreach ($kategoris as $kategori)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $kategori->kategori }}</td>
                        <td><a class="btn btn-info text-white" href="{{ url('admin/kategori/'.$kategori->idkategori.'/edit') }}">Edit</a></td>
                        <td><a class="btn btn-danger" href="{{ url('admin/kategori/'.$kategori->idkategori) }}">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
