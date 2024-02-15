<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function addCourse(){
        return view("course_add");
    }

    public function createCourse(Request $request){
        $data = $request->validate([
            'course_title' => 'required|string',
            'course_description' => 'required|string'
        ]);

        Course::create($data);
        return redirect()->back();
    }

    public function courses(){
        $courses = Course::all();
        $arr = $courses->toArray();
        for($i=0;$i<count($arr);$i++){
            if(DB::table("users_courses")->where('course_id',$arr[$i]['course_id'])->where('user_id',auth()->user()->user_id)->exists()){
                $arr[$i]['status'] = true;
            }else{
                $arr[$i]['status'] = false;
            }
        }
        
        $data = compact('arr');
        return view('courses')->with($data);
    }

    public function userCourse($course){
        auth()->user()->courses()->attach([$course]);
        return redirect()->back();
    }

    public function user_courses(){
        $courses = auth()->user()->courses;
        
        $data = compact('courses');
        return view("user_courses")->with($data);
    }

    public function removeCourse($course){
        auth()->user()->courses()->detach([$course]);
        return redirect()->back();
    }
}
//Javascript is a 