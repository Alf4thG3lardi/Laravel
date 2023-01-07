@extends('Backends.back')

@section('admincontent')
<div>
    <h2>Insert Data</h2>
</div>
<div class="row">
    <div class="col-6">
        <form action="{{ url('admin/user/'.$users->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <select class="form-select" name="level" id="">
                <option value="admin">Admin</option>
                <option value="kasir">Kasir</option>
                <option value="manager">Manager</option>
            </select>
            <div class="mt-2">
                <label class="form-label" for="">Nama</label>
                <input class="form-control" value="{{ $users->name }}" type="text" name="name" id="">
                <span class="text-danger">
                    @error('mene')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="mt-2">
                <label class="form-label" for="">Email</label>
                <input class="form-control" value="{{ $users->email }}" type="email" name="email" id="">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="mt-4">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>


@endsection
