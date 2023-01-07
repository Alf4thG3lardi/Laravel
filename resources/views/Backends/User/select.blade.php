@extends('Backends.back')

@section('admincontent')
    <div>
        <h1>User</h1>
    </div>
    <div>
        <a href="{{ url('admin/user/create') }}" class="btn btn-primary">New Data</a>
    </div>
    <div>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>user</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Ubah</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->level }}</td>
                        <td><a class="btn btn-info text-white" href="{{ url('admin/user/'.$user->id.'/edit') }}">Edit</a></td>
                        <td><a class="btn btn-danger" href="{{ url('admin/user/'.$user->id) }}">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
