@extends('layout.main')

@push('title')
NWL Courses
@endpush 

@section('body')
<div class="container mt-4">
    
    <div class="row">
        <div class="col-sm-2">
            <h3 class="text-center">Course Title</h3>
        </div>
        <div class="col-sm-4">
            <h3 class="text-center">Course Description</h3>
        </div>
        <div class="col-sm-6">
            <h3 class="text-center">Action</h3>
        </div>
        <!-- <div class="col-md-10 mx-auto">
            <h1 class="text-info text-center my-3">NWL Courses</h1>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Course Tile</th>
                        <th>Course Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($arr as $course)
                    <tr>
                        <td>{{$course['course_title']}}</td>
                        <td>{{$course['course_description']}}</td>
                        @if($course['status'])
                        <td>This course is added</td>
                        @else 
                        <td width="20%">
                            <a href="{{route('userCourse',['course'=>$course['course_id']])}}" style="display:block">Add this course</a>
                            <a href="#" class="" style="display:block">Add Comment</a>
                            <a href="#" class="" style="display:block">View Commnet</a>
                        </td>
                        @endif 
                        
                    </tr>
                    <div class="comment">

                    </div>
                    @endforeach
                </tbody>
            </table>
        </div> -->
    </div>
     
    @foreach($arr as $course)
        
        <div class="row">
            <div class="col-md-2 border">
                {{$course['course_title']}}
            </div>
            <div class="col-md-4 border">
                {{$course['course_description']}}
            </div>
            <div class="col-md-6 border">
                <div class="row">
                    <div class="col-sm-4">
                    @if($course['status'])
                    This course is added
                    @else 
                    <a href="{{route('userCourse',['course'=>$course['course_id']])}}">Add this course</a>
                    @endif
                    </div>
                    <div class="col-sm-4">
                    <button href="#" class="btn btn-info mx-2 add-comment">Add Comment</button>        
                    </div>
                    <div class="col-sm-4">
                    <button href="#" class="btn btn-info mx-2 view-comment" course_id="{{$course['course_id']}}">View Commnet</button>        
                    </div>
                </div>
                 
                
                
            
            <!--
                
            -->
            </div>
        </div>
        <div class="row show-comment">
            <div class="col-md-6 mx-auto">
                
                <form class="form-inline fm my-3">
                    <input type="hidden" class="_token" value="{{csrf_token()}}">
                    <input type="text" class="form-control comment" placeholder="Enter comment">
                    <input type="hidden" class="course_id" value="{{$course['course_id']}}">
                    <input type="submit" class="btn btn-success mx-2" value="Submit">
                </form>
            </div>
        </div>
        <div class="row comment-container">
            <div class="col-md-6 mx-auto">
                    <h3 class="text-info text-center my-2">User Comments</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody class="comments">

                        </tbody>
                    </table>
            </div>
        </div>
    @endforeach 
</div>
@endsection

@section('script')
<script>
    /*const add_comment = document.getElementsByClassName('add-comment');
    const show_comment = document.getElementsByClassName("show-comment");
    
    for(let i=0;i<add_comment.length;i++){
        add_comment[i].addEventListener('click',function(){
            if(show_comment[i].style.display !== 'block'){
                show_comment[i].style.display = "block";
            }else{
                show_comment[i].style.display = "none";
            }
            
        })
    }

    const fm = document.getElementsByClassName("fm")
    const course_id = document.getElementsByClassName("course_id")
    const comments = document.getElementsByClassName("comment")
    const csrf_token = document.getElementsByClassName("_token")
    for(let i=0;i<fm.length;i++){
        fm[i].addEventListener('submit',async function(e){
            e.preventDefault()
            let id = course_id[i].value
            let comment = comments[i].value
            let _token = csrf_token[i].value
            let base_url = "{{url('/api')}}" 
            let user_id = "{{Auth::user()->user_id}}"
            const response = await fetch(`${base_url}/comment/${id}/${user_id}`,{
                method:"POST",
                headers:{
                    'Content-Type':'application/json'
                },
                body:JSON.stringify({comment})
            })
            const data = await response.json()
            console.log(response)

            comments[i].value = null
            if(response.status === 200){
                const tr = document.createElement('tr')
                const td = document.createElement('td')
                const user_td = document.createElement('td')
                const user_text = document.createTextNode("{{auth()->user()->name}}")
                user_td.appendChild(user_text)
                const text = document.createTextNode(comment)
                
                td.appendChild(text)
                tr.appendChild(user_td)
                tr.appendChild(td)
                document.getElementsByTagName('tbody')[i].appendChild(tr)
            }
            
        })
    }

    
    let show_data = ""
    
    const view_comment = document.getElementsByClassName("view-comment")
    const comment_container = document.getElementsByClassName("comment-container")
    for(let view=0;view<view_comment.length;view++){
        view_comment[view].addEventListener('click',async function(){
            if(comment_container[view].style.display !== 'block'){
                comment_container[view].style.display = 'block'
                let base_url = "{{url('/api')}}"
                let id = view_comment[view].getAttribute("course_id")
                let response = await fetch(`${base_url}/comment/${id}`)
                let data = await response.json()
                //console.log(data)
                let show_data = ""     
                for(var x in data){
                    
                    
                show_data += `
                <tr>
                    <td>${data[x]['user'].name}</td>
                    <td>${data[x].comment_title}</td>
                </tr>
                `
                }
                document.getElementsByTagName('tbody')[view].innerHTML = show_data
                console.log(data)
                
            }else{
                comment_container[view].style.display = 'none'
            }
            
            
             
            
        })
    }*/

    $(document).ready(function(){
        $('.add-comment').each(function(index){
            $(this).on('click',function(){
                $('.show-comment').eq(index).toggle()
            })
            $('.fm').eq(index).on('submit',function(e){
                e.preventDefault()
                let comment = $('.comment').eq(index).val()
                let id = $('.course_id').eq(index).val()
                let user_id = "{{Auth::user()->user_id}}"
                let base_url = "{{url('/api')}}"
                let url = `${base_url}/comment/${id}/${user_id}`
                let data = JSON.stringify({'comment':comment})
                $.ajax({
                    url:url,
                    type:"POST",
                    contentType:"application/json",
                    data:data,
                    success:function(response){
                        
                        $('.comment').eq(index).val("")
                        getData(index)
                    },
                    error:function(xhr,status,error){
                        console.log(error)
                    }
                })
            })
        })

        $('.view-comment').each(function(index){
            $(this).on('click',function(){
                if($('.comment-container').eq(index).css('display') !== "block"){
                    $('.comment-container').eq(index).css({'display':'block'})
                    getData(index)
                }else{
                    $('.comment-container').eq(index).css({'display':'none'})
                }
                
            })
            
        })

        function getData(index){
            let id = $('.course_id').eq(index).val()
            let base_url = "{{url('/api')}}"
            $.ajax({
                url:`${base_url}/comment/${id}`,
                type:'GET',
                dataType:'json',
                success:function(data){

                    let show_data = ""     
                    for(var x in data){
                        
                        
                    show_data += `
                    <tr>
                        <td>${data[x]['user'].name}</td>
                        <td>${data[x].comment_title}</td>
                    </tr>
                    `
                    }
                
                $('.comments').eq(index).html(show_data)
                
                },
                error:function(xhr,status,error){
                    console.log(error)
                }

            })
        }
    })
    
    
</script>

@endsection 


