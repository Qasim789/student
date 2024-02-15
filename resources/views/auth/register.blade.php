@extends('layout.main')

@push('title')
Register Page 
@endpush 

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h1 class="text-info text-center my-3">Register Page</h1>
            <form action="{{route('register')}}" method="POST">
                @csrf
                <label for="name">Enter name:</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror 
                <label for="email">Enter email:</label>
                <input type="text" name="email" class="form-control" value="{{old('email')}}">
                @error('email')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <label for="name">Enter address:</label>
                <input type="text" name="address" class="form-control" value="{{old('address')}}">
                @error('address')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <label for="name">Enter Password:</label>
                <input type="password" name="password" class="form-control" value="{{old('password')}}">
                @error('password')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <label for="name">Confirm Password:</label>
                <input type="password" name="cpassword" class="form-control" value="{{old('cpassword')}}">
                @error('cpassword')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <input type="submit" class="btn btn-success my-2" value="Register">
            </form>
        </div>
    </div>
</div>
@endsection 