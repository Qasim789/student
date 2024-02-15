<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Comment;
class CommentController extends Controller
{
    public function store(Request $request,Course $course,$user_id){
        $validation = validator()->make($request->all(),[
            'comment' => 'required|string'

        ]);
        if($validation->fails()){
            return $validation->errors()->toJson();
        }else{
            try{
                $comment = new Comment;
                $comment->comment_title = $request->post('comment');
                $comment->user_id = $user_id;
                $course->comments()->save($comment);
                return response()->json(array("message"=>"data is saved"));
            }catch(Exception $e){
                return response()->json(array("message"=>$e->getMessage()));
            }
            
        
        }
        
        
        
    }
    public function show(Course $course){
        $data = $course->comments;
        $show_data = array();
            foreach($data as $comment){

                $show_data[] = array("comment_title"=>$comment->comment_title,"user"=>$comment->user);
            }
        return $show_data;
    }
}
