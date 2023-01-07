@extends('front')

@section('content')

    <div class="row">
        <div class="col-6">
            <form action="{{ url('/postregister') }}" method="post">
                @csrf
                <div class="mt-2">
                    <label class="form-label" for="">Customer</label>
                    <input class="form-control" value="{{ old('customer') }}" type="text" name="customer" id="">
                    <span class="text-danger">
                        @error('customer')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mt-2">
                    <label class="form-label" for="">Gender</label>
                    <select class="form-select" value="{{ old('gender') }}" name="gender" id="">
                        <option value="l">Laki-laki</option>
                        <option value="p">Perempuan</option>
                    </select>
                </div>
                <div class="mt-2">
                    <label class="form-label" for="">Address</label>
                    <input class="form-control" value="{{ old('address') }}" type="text" name="address" id="">
                    <span class="text-danger">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mt-2">
                    <label class="form-label" for="">Phone Num</label>
                    <input class="form-control" value="{{ old('phone') }}" type="numcer" name="phone" id="">
                    <span class="text-danger">
                        @error('phone')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mt-2">
                    <label class="form-label" for="">Email</label>
                    <input class="form-control" value="{{ old('email') }}" type="email" name="email" id="">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mt-2">
                    <label class="form-label" for="">Password</label>
                    <input class="form-control" type="password" name="password" id="">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mt-4">
                    <input class="btn btn-primary" type="submit" value="Register" name="submit">
                </div>
            </form>
        </div>
    </div>

@endsection
