<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Doctor;
use App\Models\Generic;
use App\Models\Indication;
use App\Models\Manufacturer;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;




class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }
    public function about(){
        return view('frontend.about');
    }

    public function disclaimer(){
        return view('frontend.disclaimer');
    }

    public function privacy_policy(){
        return view('frontend.privacy_policy');
    }

    public function search(Request $request){
       
        if($request->searchfrom == "brand"){
            $data = Brand::with('dosage_form')    
            ->where('brand_name', 'like', $request->keyword.'%') 
            ->where('brand_is_active',1)    
            ->limit(15)
            ->get();
        }else if($request->searchfrom == "generic"){
            $data = Generic::
            where('generic_name', 'like', $request->keyword.'%')      
            ->where('generic_is_active',1)    
            ->limit(15)
            ->get();
        }else if($request->searchfrom == "indication"){
            $data = Indication::
            where('indication_name', 'like', $request->keyword.'%')      
            ->where('indication_is_active',1)    
            ->limit(15)
            ->get();
        }else if($request->searchfrom == "manufacturer"){
            $data = Manufacturer::
            where('manufacturer_name', 'like', $request->keyword.'%')      
            ->where('manufacturer_is_active',1)    
            ->limit(15)
            ->get();
        }
              

        // dd($data);
        return response()->json([
            'message' => 'Search', 
            'data' => $data
        ], 200);
    }

    public function search_start(Request $request){
        // return "asdasdasdasd";
        // dd("asd");
        $data = Brand::with('dosage_form')
        // ->select('brand_id', 'brand_name', 'brand_type', 'dosage_form')
        ->where('brand_name', 'like', $request->keyword.'%')
        // ->where('brand_is_active',1)
        // ->orderBy('brand_id', 'DESC')
        ->limit(20)
        ->get();      

        // dd($data);
        return response()->json([
            'message' => 'Brand Search', 
            'data' => $data
        ], 200);
    }

    public function get_count(){
        
        try{
            $data['brand'] = Brand::where('brand_is_active', 1)->count();   
            $data['generic'] = Generic::where('generic_is_active', 1)->count();   
            $data['herbal'] = Brand::where('brand_is_active', 1)->where('brand_type','Herbal')->count();  
            $data['pharma'] = News::where('news_is_active', 1)->count();  
            $data['doctor'] = Doctor::where('doctor_is_active', 1)->count();   


            return response()->json([
                'message' => 'Get Count', 
                'data' => $data
            ], 200);

        } catch (\Exception $ex) {

            $this->logException($ex, \Route::currentRouteName(), __METHOD__);
            return response()->json([
                    'message' => 'Something went wrong!',
                    'error' => $ex,
                    'message' => $ex->getMessage()
                ], 400);
        }
    }

    public function profile(){
        return view('frontend.profile');
    }

    public function profile_update(Request $request){

        $obj = User::findOrFail(auth()->user()->id);
        $obj->username = $request->username ?? '';
        $obj->email = $request->email ?? '';
        $obj->title = $request->title ?? '';
        $obj->firstname = $request->firstname ?? '';
        $obj->lastname = $request->lastname ?? '';
        $obj->profession = $request->profession ?? '';
        $obj->organization = $request->organization ?? '';
        $obj->zipcode = $request->zipcode ?? '';
        $obj->address = $request->address ?? '';
        $obj->telephone = $request->telephone ?? '';
        $obj->fax = $request->fax ?? '';
    
        $obj->save();


        return response()->json([
            'message' => 'User record updated successfully'
        ], 200);

    }
}
