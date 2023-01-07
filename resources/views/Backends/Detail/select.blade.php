@extends('Backends.back')

@section('admincontent')
    <div>
        <h1>Order Details</h1>
    </div>
    <div>
        <form action="{{ url('admin/orderdetail/create') }}" method="get">
            <div class="row">
                <div class="col-4 mt-5">
                    <label class="form-label" for="">Tanggal awal</label>
                    <input class="form-control" type="date" name="tglawal" id="">
                </div>
                <div class="col-4 mt-5">
                    <label class="form-label" for="">Tanggal akhir</label>
                    <input class="form-control" type="date" name="tglakhir" id="">
                </div>
                <div class='col-4 mt-5'>
                    <input class="btn btn-primary" type="submit" value="Search">
                </div>
            </div>
        </form>
    </div>
    <div>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Menu</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            <tbody>
                @foreach ($details as $detail)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $detail->tglorder }}</td>
                        <td>{{ $detail->pelanggan }}</td>
                        <td>{{ $detail->menu }}</td>
                        <td>{{ $detail->jumlah }}</td>
                        <td>{{ $detail->harga }}</td>
                        <td>{{ $detail->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center mt-5">
        {{ $details->withQueryString()->links() }}
    </div>
@endsection
