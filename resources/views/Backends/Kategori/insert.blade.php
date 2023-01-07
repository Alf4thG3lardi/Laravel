@extends('Backends.back')

@section('admincontent')

<div class="row">
    <div class="col-6">
        <form action="{{ url('admin/kategori') }}" method="post">
            @csrf
            <div class="mt-2">
                <label class="form-label" for="">Kategori</label>
                <input class="form-control" value="{{ old('kategori') }}" type="text" name="kategori" id="">
                <span class="text-danger">
                    @error('kategori')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>


@endsection
