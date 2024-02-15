@extends('layout.main')

@push('title')
Forget Password 
@endpush 

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <p class="text-danger my-3">If you have forget your password Enter your email we will send you password recovery link on your email</p>
            <form action="{{route('password.email')}}" method="POST">
                @csrf
                
                <label for="email">Enter email:</label>
                <input type="text" name="email" class="form-control" value="{{old('email')}}">
                @error('email')
                <p class="text-danger">{{$message}}</p>
                @enderror
                
                <input type="submit" class="btn btn-success my-2" value="Send Email">
            </form>
            @if(session()->has('message'))
            <p class="text-danger">{{session()->get('message')}}</p>
            @endif 
        </div>
    </div>
</div>
@endsection 