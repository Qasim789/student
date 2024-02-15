@extends('layout.main')

@push('title')
Login Page 
@endpush 

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h1 class="text-info text-center my-3">Login User</h1>
            <a href="{{url('/auth/google/redirect')}}" class="icon"><i class="fa fa-google" style="margin:0px 10px"></i>Login With Google</a>
            <a href="{{url('/auth/github/redirect')}}" class="icon"><i class="fa fa-github" style="margin:0px 10px"></i>Login With Github</a>
            <p style="text-align:center;margin-bottom:20px">or</p>
            @if(session()->has('message'))
            <p class="text-danger my-2">{{session()->get('message')}}</p>
            @endif 
            <form action="{{route('login')}}" method="POST">
                @csrf
                 
                <label for="email">Enter email:</label>
                <input type="text" name="email" class="form-control" value="{{old('email')}}">
                @error('email')
                <p class="text-danger">{{$message}}</p>
                @enderror
                
                <label for="name">Enter Password:</label>
                <input type="password" name="password" class="form-control" value="{{old('password')}}">
                @error('password')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <input type="checkbox" name="remember">&nbsp;&nbsp;Remember me<br>
                <input type="submit" class="btn btn-success my-2" value="Login">
            </form>
            <a href="{{route('password.request')}}">Forget Password</a>
        </div>
    </div>
</div>
@endsection 