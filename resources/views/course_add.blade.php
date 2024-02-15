@extends('layout.main')

@push('title')
Add Job page 
@endpush

@section('body')

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h1 class="text-info text-center my-3">Add Course</h1>
            <form action="{{route('courseCreate')}}" method="POST">
                @csrf
                
                <label for="course_title">Enter Course:</label>
                <input type="text" name="course_title" class="form-control">
                @error('course_title')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <label for="description">Enter Course Description:</label>
                <input type="text" name="course_description" class="form-control">
                @error('course_description')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <input type="submit" class="btn btn-success my-2" value="Enter Course">
            </form>
        </div>
    </div>
</div>

@endsection 