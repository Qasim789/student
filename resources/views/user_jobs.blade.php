@extends('layout.main')

@push('title')
Your Jobs 
@endpush

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h1 class="text-info text-center my-3">Your Jobs</h1> 
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>JOB TITLE</th>                                                                                 
                        <th>START DATE</th>
                        <th>END DATE</th>
                        <th>JOB TYPE</th>
                        <th>DESCRIPTION</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $job)
                    <tr>
                        <td>{{$job['job_title']}}</td>
                        <td>{{$job['start_date']}}</td>
                        <td>{{$job['end_date']}}</td>
                        <td>{{$job['job_type']}}</td>
                        <td>{{$job['description']}}</td>

                        <td>
                             
                            <a href="{{route('job.remove',['job'=>$job['job_id']])}}">remove this job</a>
                        
                            
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 