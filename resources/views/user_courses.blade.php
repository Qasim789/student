@extends('layout.main')

@push('title')
User Courses 
@endpush 

@section('body')

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h1 class="text-info text-center my-3">Your Courses</h1>
            
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Course Tile</th>
                        <th>Course Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{$course->course_title}}</td>
                        <td>{{$course->course_description}}</td>
                        <td><a href="{{route('removeCourse',['course'=>$course->course_id])}}">Remove This Course</a></td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection 