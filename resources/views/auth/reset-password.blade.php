@extends('layout.main')

@push('title')
Reset Password
@endpush 

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h1 class="text-info text-center my-3">Reset Password</h1>
            <form action="{{route('password.store')}}" method="POST">
                @csrf
                 <input type="hidden" name="token" value="{{$request->route('token')}}">
                <label for="email">Enter email:</label>
                <input type="text" name="email" class="form-control" value="{{old('email')}}">
                @error('email')
                <p class="text-danger">{{$message}}</p>
                @enderror
                
                <label for="password">Enter Password:</label>
                <input type="password" name="password" class="form-control" value="{{old('password')}}">
                @error('password')
                <p class="text-danger">{{$message}}</p>
                @enderror

                <label for="cpassword">Confirm Password:</label>
                <input type="password" name="cpassword" class="form-control" value="{{old('cpassword')}}">
                @error('password')
                <p class="text-danger">{{$message}}</p>
                @enderror
                
                <input type="submit" class="btn btn-success my-2" value="Reset Password">
            </form>
            
        </div>
    </div>
</div>
@endsection 