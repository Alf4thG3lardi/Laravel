@extends('Backends.back')

@section('admincontent')
    <div>
        <h1>Pelanggan</h1>
    </div>
    {{-- <div>
        <a href="{{ url('admin/kategori/create') }}" class="btn btn-primary">New Data</a>
    </div> --}}
    <div>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                    <th>Email</th>
                    <th>Aktif</th>
                </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            <tbody>
                @foreach ($pelanggans as $pelanggan)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $pelanggan->pelanggan }}</td>
                        <td>{{ $pelanggan->jeniskelamin}}</td>
                        <td>{{ $pelanggan->alamat }}</td>
                        <td>{{ $pelanggan->telp }}</td>
                        <td>{{ $pelanggan->email }}</td>
                        @php
                            if($pelanggan->aktif == 1) {
                                $aktif = '<a href="'.url('admin/pelanggan/'.$pelanggan->idpelanggan).'"> Aktif </a>';
                            } else {
                                $aktif = '<a href="'.url('admin/pelanggan/'.$pelanggan->idpelanggan).'"> Banned </a>';
                            }
                        @endphp
                        <td>{!! $aktif !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center mt-5">
        {{ $pelanggans->withQueryString()->links() }}
    </div>
@endsection
