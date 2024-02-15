<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class SocialController extends Controller
{
    
    public function redirect($provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(Request $request,$provider) {
        $user = Socialite::driver($provider)->user();
        if($provider == "google"){
            $name = $user->name;
        }elseif($provider == "github"){
            $name = $user->nickname;
        }
        if(User::where('email',$user->email)->exists()){
            if(User::where('email',$user->email)->where('provider',$provider)->exists()){
                $user = User::where('email',$user->email)->first();
                Auth::login($user);
                return redirect("/");
            }elseif(!User::where('email',$user->email)->where('provider',$provider)->exists()){
                $request->session()->flash('message','This email is already taken');
                return redirect(url('/login'));
            }
        }else{
            $user = User::create([
                'name'=>$name,
                
                'email'=>$user->email,
                'provider'=>$provider,
                'role'=>'USER'
            ]);
            Auth::login($user);
            return redirect("/");

        }
        
    }
}
