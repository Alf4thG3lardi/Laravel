@extends('Backends.back')

@section('admincontent')
<div>
    <h2>Insert Data</h2>
</div>
<div class="row">
    <div class="col-6">
        <form action="{{ url('admin/user') }}" method="post">
            @csrf
            <div class="mt-2">
                <label class="form-label" for="">Nama</label>
                <input class="form-control" value="" type="text" name="name" id="">
                <span class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="mt-2">
                <label class="form-label" for="">Email</label>
                <input class="form-control" value="" type="email" name="email" id="">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <select class="form-select mt-4" name="level" id="">
                <option value="admin">Admin</option>
                <option value="kasir">Kasir</option>
                <option value="manager">Manager</option>
            </select>
            <div class="mt-2">
                <label class="form-label" for="">Password</label>
                <input class="form-control" value="" type="password" name="password" id="">
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="mt-4">
                <button class="btn btn-primary" type="submit">Upload</button>
            </div>
        </form>
    </div>
</div>


@endsection
