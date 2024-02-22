<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>@stack('title')</title>
    <style>
      .comment{
        width:"100%";
        height:"100px";
        background:"lightgreen"
      }
      .show-comment{
        display:none;
      }
      .comment-container{
        display:none
      }
      .icon{
        display:block;
        width:200px;
        height:70px;
        text-align:center;
        color:white;
        background:orange;
        font-size:19px;
        line-height:70px;
        margin:30px auto;
      }
      
            
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
  <a class="navbar-brand" href="{{url('/')}}">
    @if(Auth::user())
    {{Auth::user()->name}}
    @else 
    NWL
    @endif 
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
    @if(Auth::user())
      
      @if(Auth::user()->role == "USER")
      <li class="nav-item">
        <a class="nav-link btn btn-info text-white mx-2" href="{{route('courses')}}">Courses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-info text-white mx-2" href="{{route('user.courses')}}">Your Courses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-info text-white mx-2" href="{{route('jobs')}}">Jobs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-info text-white mx-2" href="{{route('jobs.user')}}">Your Jobs</a>
      </li>
      @endif
      <li class="nav-item">
        <form action="{{route('logout')}}" method="POST">
            @csrf
        
        <input type="submit" class="nav-link btn btn-danger text-white" value="Logout">
        </form>
        
      </li> 
    @endif 
    @if(!Auth::user())
      <li class="nav-item">
        <a class="nav-link btn btn-info text-white" href="{{url('/register')}}">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-info mx-2 text-white" href="{{url('/login')}}">Login</a>
      </li>
    @endif 
    @if(Auth::user())
      @if(Auth::user()->role == 'ADMIN')
      <li class="nav-item">
        <a class="nav-link btn btn-info mx-2 text-white" href="{{route('addJob')}}">Add Job</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-info mx-2 text-white" href="{{route('addCourse')}}">Add Course</a>
      </li>
      @endif 
    @endif 
      
    </ul>
  </div>
  </div>
</nav>
    @yield('body')


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@yield('script')
</body>
</html>