<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class JobController extends Controller
{
    public function addJob(){
        return view('add_job');
    }

    public function jobcreate(Request $request){
        $data = $request->validate([
            'job_title' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'job_type' => 'required|string',
            'description' => 'required',

        ]);
        
        Job::create($data);
        return redirect()->back();
    }

    public function jobs(){
        if(auth()->user()->role == "USER"){
            $jobs = Job::where('job_title',auth()->user()->job_title)->get();
        }else{
            $jobs = Job::all();
        }
        
        $arr = $jobs->toArray();
        for($i=0;$i<count($arr);$i++){
            if(DB::table("users_jobs")->where("job_id",$arr[$i]['job_id'])->where('user_id',auth()->user()->user_id)->exists()){
                $arr[$i]['added'] = true;
            }else{
                $arr[$i]['added'] = false;
            }
        }
        
        $data = compact('arr');
        return view('jobs')->with($data);
    }

    public function job_add($job){
        auth()->user()->jobs()->attach([$job]);
        return redirect()->back();
        
    }

    public function user_jobs(){
        $jobs = auth()->user()->jobs;
        $data = compact('jobs');
        return view("user_jobs")->with($data);
    }

    public function remove_job($job){
        auth()->user()->jobs()->detach([$job]);
        return redirect()->back();
    }

    public function user_detail(Request $request){
        $data = $request->validate([
            'job_title'=>'required|string',
            'address'=>'required|string'
        ]);
        User::where('email',auth()->user()->email)->update([
            'job_title'=>$request->job_title,
            'address'=>$request->address
        ]);
        return redirect()->back();
    }

    public function job_inactive($job_id){
        Job::where('job_id',$job_id)->update(['status'=>0]);
        return redirect()->back();
    }

    public function job_active($job_id){
        Job::where('job_id',$job_id)->update(['status'=>1]);
        return redirect()->back();
    }
}


