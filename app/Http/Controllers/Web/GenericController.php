<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Generic;
use Illuminate\Http\Request;
use App\Traits\LogExceptions;
use Yajra\DataTables\DataTables;


class GenericController extends Controller
{
    use LogExceptions;
    // public function get_generic(Request $request){
    //     try{

    //         $data = Generic::select('generic_id', 'generic_name', 'generic_type')
    //             ->where($request->condition, 1)
    //             ->where('generic_is_active',1)
    //             ->orderBy('generic_id', 'DESC')
    //             ->limit($request->limit ?? 7)
    //             ->get();      

    //         return response()->json([
    //             'message' => 'Get Generic', 
    //             'data' => $data
    //         ], 200);

    //     } catch (\Exception $ex) {

    //         $this->logException($ex, \Route::currentRouteName(), __METHOD__);
    //         return response()->json([
    //                 'message' => 'Something went wrong!',
    //                 'error' => $ex,
    //                 'message' => $ex->getMessage()
    //             ], 400);
    //     }
    // }

   

    public function generic_detail($id){
        return view('frontend.generic-detail')->with(compact('id'));

       
            
                 
            // $generics = Generic::with('dosage_form', 'generic', 'manufacturer', 'strength')
            //         ->where('generic_name', $generic->generic_name)
            //         ->where('generic_is_active', 1)
            //         ->get();
                   
            // $data = compact('generic', 'generics');
           
            
            
       
    }

    public function get_generic_detail($id){
        try{  
            
            $data = Generic::with('brands.manufacturer', 'indications')
                ->where('generic_id',$id)->first();

            // dd($data);
            return response()->json([
                'message' => 'Get Generic Detail', 
                'data' => $data
            ], 200);

        } catch (\Exception $ex) {
                
            $this->logException($ex, \Route::currentRouteName(), __METHOD__);
            return response()->json([
                'message' => 'Something went wrong! Get Generic Detail',
                'error' => $ex,
                'message' => $ex->getMessage()
            ], 400);
        }
    }

    public function generic_alphabetically(Request $request, $start_letter){
        try{  
            
            // dd($start_letter);
            // $brand = Brand::where('brand_id', $start_letter)->first();
            
            if ($request->ajax()) {

                // $data = Brand::with('generic', 'manufacturer')
                // ->where('generic.   generic_name', 'like', $request->start_letter.'%') 
                // ->where('brand_is_active',1)
                // ->where('generic.   generic_is_active',1)
                // ->where('manufacturer.  manufacturer_is_active',1)
                // ->orderBy('brand_id', 'DESC');

                $data = Brand::join('generic', 'brand.brand_generic_id', '=', 'generic.generic_id')
                ->join('manufacturer', 'brand.brand_manufacturer_id', '=', 'manufacturer.manufacturer_id')
                ->where('generic.generic_name', 'like', $request->start_letter.'%') 
                ->where('brand_is_active',1)
                ->where('generic.generic_is_active',1)
                ->where('manufacturer.manufacturer_is_active',1)
                ->orderBy('brand_id', 'DESC')
                ->get();
                  
                
                return DataTables::of($data)->make(true);
            }
            // dd("asdasdasasas");
            return view('frontend.generic-alphabetically')->with(compact('start_letter'));
     

        } catch (\Exception $ex) {
                
            $this->logException($ex, \Route::currentRouteName(), __METHOD__);
            
        }
    }
}
