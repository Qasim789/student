@extends('layout.main')

@push('title')
Add Job page 
@endpush

@section('body')

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h1 class="text-info text-center my-3">Add Job</h1>
            <form action="{{route('jobcreate')}}" method="POST">
                @csrf
                <label for="job_title">Enter Title:</label>
                <select name="job_title" class="form-control" value="old('job_title')">
                    <option value="IT">IT</option>
                    <option value="ENGINEER">ENGINEER</option>
                    <option value="MANAGER">MANAGER</option>
                    <option value="ACCOUNTANT">ACCOUNTANT</option>
                </select>
                @error('job_title')
                <p class="text-danger">{{$message}}</p>
                @enderror 
                <label for="start_date">Enter Start Date:</label>
                <input type="date" name="start_date" class="form-control">
                @error('start_date')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <label for="end_date">Enter End Date:</label>
                <input type="date" name="end_date" class="form-control">
                @error('end_date')
                <p class="text-danger">{{$message}}</p>
                @enderror 
                <label for="job_type">Enter Job:</label>
                <input type="text" name="job_type" class="form-control">
                @error('job_type')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <label for="description">Enter Job Description:</label>
                <input type="text" name="description" class="form-control">
                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <input type="submit" class="btn btn-success" value="Enter Job">
            </form>
        </div>
    </div>
</div>

@endsection 