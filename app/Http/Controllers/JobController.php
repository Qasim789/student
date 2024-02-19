<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Imports\UsersImport;
use App\Models\Order;
use thiagoalessio\TesseractOCR\TesseractOCR;


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

    public function showExcel(){
        
        return view('upload_excel');
    }

    public function postExcel(Request $request){
        $request->validate([
            'file'=>'required'
        ]); 

        $file = $request->file('file');

        $spreadsheet = IOFactory::load($file);

        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();

        

        $data = [];
        for ($row = 1; $row <= $highestRow; $row++) {
            $rowData = [];
            for ($col = 'A'; $col <= $highestColumn; $col++) {
                
                $rowData[] = $worksheet->getCell($col . $row)->getValue();
                

            }
            if(empty($rowData[count($rowData)-2])){
                break;
            }
            $data[] = $rowData;
        }

        // Process the data as needed
        //return response()->json($data);
        //echo "<pre>";
        //print_r($data);
        
        for($i=1;$i<count($data);$i++){
            
            $order = new Order;
            $order->order_id = $data[$i][0];
            $order->order_date = $data[$i][1];
            $order->order_quantity = $data[$i][2];
            $order->sales = $data[$i][3];
            $order->ship_method = $data[$i][4];
            $order->profit = $data[$i][5];
            $order->unit_price = $data[$i][6];
            $order->customer_name = $data[$i][7];
            $order->customer_segment = $data[$i][8];
            $order->customer_catagory = $data[$i][9];
            $order->save();
            
        }

        return redirect()->back();

        }

    public function showImg(){
        return view("img");
    }

    public function postImg(Request $request){
        $request->validate([
            'img'=>'required'
        ]);

        $image = $request->file('img');

        $text = (new TesseractOCR($image))->run();

        $sec = str_replace("\n","<br>",$text);
        //return response()->json(['imgdata'=>$text]);

        echo $sec;
    }
}


