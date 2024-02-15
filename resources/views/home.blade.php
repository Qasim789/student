@extends('layout.main')

@push('title')
Home page
@endpush
@section('body')

<div class="container">
    @if(Auth::user())
    <h2>Welcome {{Auth::user()->name}} to home page</h2>
    @else 
    <h2>Welcome to home page</h2>
    @endif 
    @if(Auth::user())
        @if(!Auth::user()->job_title && Auth::user()->role == 'USER')
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h2 class="text-info text-center my-2">Enter Your Details</h2>
                <form action="{{route('user.detail')}}" method="POST">
                    @csrf
                    <label for="Enter Job">Enter your job</label>
                    <select name="job_title" class="form-control">
                        <option value="IT">IT</option>
                        <option value="MANAGER">MANAGER</option>
                        <option value="ENGINEER">ENGINEER</option>
                        <option value="ACCOUNTANT">ACCOUNTANT</option>
                    </select>
                    <label for="address">Etner Addrss:</label>
                    <input type="text" name="address" class="form-control">
                    <input type="submit" value="Add" class="btn btn-success my-2">
                </form>
            </div>
        </div>
        @endif 
    @endif 
</div>
@endsection