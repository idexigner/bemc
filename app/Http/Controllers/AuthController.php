<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Brand;
use App\Models\Doctor;
use App\Models\Generic;
use App\Models\Indication;
use App\Models\Manufacturer;
use App\Models\News;

class AuthController extends Controller
{
    public function index()
    {
		if(isset(auth()->user()->id)){			
			return redirect('admin/dashboard');
		}
        // dd("work");
        return view('auth.login');
    }

    public function authenticate(Request $request){
    
        // validate data 
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        // dd("asda");
        // login code 
        
        if(\Auth::attempt($request->only('email','password'))){
            // return redirect('home');
            session(['user_mapping' => auth()->user()->user_mapping]);
            return redirect('admin/dashboard');
        }

        return redirect('login')->withError('Login details are not valid');

    }

    public function register_view()
    {
        return view('auth.register');
    }

    public function register(Request $request){
        // validate 
        // $request->validate([
        //     'name'=>'required',
        //     'email' => 'required|unique:users|email',
        //     'password'=>'required|confirmed'
        // ]);

        // save in users table 
        
        User::create([
            'username'=>$request->name,
            'email'=>$request->email,
            'password'=> \Hash::make($request->password)
        ]);

        // login user here 
        
        if(\Auth::attempt($request->only('email','password'))){
            return redirect('home');
        }

        return redirect('register')->withError('Error');


    }



    public function home(){
        return view('home');
    }

    public function dashboard(){

        
        $brand = Brand::where('brand_is_active', 1)->count();   
        $generic = Generic::where('generic_is_active', 1)->count();   
        $herbal = Brand::where('brand_is_active', 1)->where('brand_type','Herbal')->count();  
        $pharma = News::where('news_is_active', 1)->count();  
        $doctor = Doctor::where('doctor_is_active', 1)->count();   

      
        $data = compact('brand', 'generic', 'herbal', 'pharma', 'doctor');
  
        return view('admin.pages.dashboard')->with($data);
        
    }

     public function logout(){
        \Session::flush();
        \Auth::logout();
        return redirect('login');
    }
}
