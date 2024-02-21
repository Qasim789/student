<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great
|
*/



Route::get('/', function () {
    return view('home');
});
Route::get('access-denied',function(){
    return view("access-denied");
});
Route::middleware('guest')->group(function(){
    Route::get('/auth/{provider}/redirect', [SocialController::class,'redirect']);
    Route::get('/auth/{provider}/callback', [SocialController::class,'callback']);
});

Route::get("/excel",[JobController::class,'showExcel'])->name('excel');
Route::post("/excel",[JobController::class,'postExcel'])->name('excel.post');
Route::get("/img",[JobController::class,"showImg"])->name('img');
Route::post("/img",[JobController::class,"postImg"])->name('img.data');
Route::get("/pdf",[JobController::class,"showPdf"])->name('pdf');
Route::post("/pdf",[JobController::class,"postPdf"])->name('pdf.data');

Route::middleware('CheckAdmin')->group(function(){
    Route::get("/add-job",[JobController::class,'addJob'])->name('addJob');
    Route::post("/add-job",[JobController::class,'jobcreate'])->name('jobcreate');
    Route::get("/add-course",[CourseController::class,'addCourse'])->name('addCourse');
    Route::post("/add-course",[CourseController::class,'createCourse'])->name('courseCreate');
    Route::get("/job-inactive/{job_id}",[JobController::class,'job_inactive'])->name("job-inactive");
    Route::get("/job-active/{job_id}",[JobController::class,'job_active'])->name("job-active");
});

Route::middleware('CheckUser')->group(function(){
   Route::get("/courses",[CourseController::class,'courses'])->name("courses");
   Route::get("/user-course/{course}",[CourseController::class,'userCourse'])->name("userCourse"); 
   Route::get("/user-courses",[CourseController::class,'user_courses'])->name("user.courses");    
   Route::get("/remove-course/{course}",[CourseController::class,'removeCourse'])->name("removeCourse");
   Route::get("/jobs",[JobController::class,'jobs'])->name('jobs');
   Route::get("/add-job/{job}",[JobController::class,'job_add'])->name("job.add");
   Route::get("/user-jobs",[JobController::class,'user_jobs'])->name('jobs.user');
   Route::get("/remove-job/{job}",[JobController::class,'remove_job'])->name('job.remove');
   Route::post("/user-detail",[JobController::class,'user_detail'])->name('user.detail');
   
   
});

require __DIR__.'/auth.php';
