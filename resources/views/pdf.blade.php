@extends('layout.main')
@push('title')
uplaod excel sheet
@endpush

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h1 class="text-info text-center my-3">Upload File</h1>
            <form action="{{route('pdf.data')}}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="form-group">
                    <label for="file">Enter File:</label>
                    <input type="file" name="file" class="form-control">
                    @error('file')
                    <p class="text-danger">{{$message}}</p>
                    @enderror 
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Upload">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection