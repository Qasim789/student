@extends('layout.main')

@push('title')
NWL Jobs 
@endpush

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h1 class="text-info text-center my-3">NWL Jobs</h1> 
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>JOB TITLE</th>
                        <th>START DATE</th>
                        <th>END DATE</th>
                        <th>JOB TYPE</th>
                        <th>DESCRIPTION</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($arr as $job)
                    <tr>
                        <td>{{$job['job_title']}}</td>
                        <td>{{$job['start_date']}}</td>
                        <td>{{$job['end_date']}}</td>
                        <td>{{$job['job_type']}}</td>
                        <td>{{$job['description']}}</td>
                        <td>
                            @if($job['status'])
                            <a href="{{route('job-inactive',['job_id'=>$job['job_id']])}}" class="btn btn-success">Active</a>
                            @else 
                            <a href="{{route('job-active',['job_id'=>$job['job_id']])}}" class="btn btn-danger">InActive</a>
                            @endif 
                        </td>
                        <td>
                            @if($job['added'])
                            Job is added 
                            @else 
                            <a href="{{route('job.add',['job'=>$job['job_id']])}}">Add this job</a>
                            @endif 
                            
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 