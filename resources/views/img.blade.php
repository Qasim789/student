@extends('layout.main')

@push('title')
Image data
@endpush

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h1 class="text-info text-center my-3 text-center">Read Data</h1>
            <form  method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="form-group">
                    <label for="img">Enter Image:</label>
                    <input type="file" name="img" class="form-control">
                    @error('img')
                        <p class="text-danger">{{$message}}</p>
                    @enderror 
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="upload">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 