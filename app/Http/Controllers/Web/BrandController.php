<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Traits\LogExceptions;
use Yajra\DataTables\DataTables;

class BrandController extends Controller
{
    use LogExceptions;
    public function get_brand(Request $request){
        try{

            $data = Brand::select('brand_id', 'brand_name', 'brand_type')
                ->where($request->condition, 1)
                ->where('brand_is_active',1)
                ->orderBy('brand_id', 'DESC')
                ->limit($request->limit ?? 7)
                ->get();      

            return response()->json([
                'message' => 'Get Brand', 
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

    public function get_highlight_brand(Request $request){
        try{

            $data = Brand::with('generic', 'strength')->select('*')
                // ->where($request->condition, 1)
                ->where('brand_is_hightlight',1)
                ->orderBy('brand_id', 'DESC')
                ->limit($request->limit ?? 10)
                ->get();      

            return response()->json([
                'message' => 'Get Highlight Brand', 
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

    public function herbal_list(Request $request){
        if ($request->ajax()) {
            // dd("ajax");
            $data = Brand::with('dosage_form', 'generic', 'manufacturer', 'strength')
            ->where('brand_type', 'Herbal')
            ->where('brand_is_active', 1);
            return DataTables::of($data)->make(true);
        }

        return view('frontend.herbal');
    }

    public function brand_detail($id){
        return view('frontend.brand-detail')->with(compact('id'));

       
            
                 
            // $brands = Brand::with('dosage_form', 'generic', 'manufacturer', 'strength')
            //         ->where('brand_name', $brand->brand_name)
            //         ->where('brand_is_active', 1)
            //         ->get();
                   
            // $data = compact('brand', 'brands');
           
            
            
       
    }

    public function get_brand_detail($id){
        try{  
            
            $data = Brand::with('dosage_form', 'generic', 'manufacturer', 'strength', 'pack_size')
                ->where('brand_id',$id)->first();

            // dd($data);
            return response()->json([
                'message' => 'Get Brand Detail', 
                'data' => $data
            ], 200);

        } catch (\Exception $ex) {
                
            $this->logException($ex, \Route::currentRouteName(), __METHOD__);
            return response()->json([
                'message' => 'Something went wrong! Get Brand Detail',
                'error' => $ex,
                'message' => $ex->getMessage()
            ], 400);
        }
    }

    public function brand_information($id){
        return view('frontend.brand-information')->with(compact('id'));

       
            
                 
            // $brands = Brand::with('dosage_form', 'generic', 'manufacturer', 'strength')
            //         ->where('brand_name', $brand->brand_name)
            //         ->where('brand_is_active', 1)
            //         ->get();
                   
            // $data = compact('brand', 'brands');
           
            
            
       
    }

    public function get_brand_information($id){
        try{  
            
            $data = Brand::with('dosage_form', 'generic', 'manufacturer', 'strength', 'pack_size')
                ->where('brand_id',$id)->first();

            $data['brands'] = Brand::with('dosage_form', 'generic', 'manufacturer', 'strength', 'pack_size')
                    ->where('brand_name', $data->brand_name)
                    ->where('brand_is_active', 1)
                    ->get();

            // dd($data);
            return response()->json([
                'message' => 'Get Brand Detail', 
                'data' => $data
            ], 200);

        } catch (\Exception $ex) {
                
            $this->logException($ex, \Route::currentRouteName(), __METHOD__);
            return response()->json([
                'message' => 'Something went wrong! Get Brand Detail',
                'error' => $ex,
                'message' => $ex->getMessage()
            ], 400);
        }
    }

    
    public function brand_all(Request $request,$id=''){
        
        // dd('asd');
        if($id == ''){
            // $id = $request->id;
            $condition = 'brand_is_new_product';
        } else if($id == 1){
            $condition = 'brand_is_new_product';
        } else if($id == 2){
            $condition = 'brand_is_new_brand';
        } else if($id == 3){
            $condition = 'brand_is_new_presentation';
        }
       
        $brand = Brand::where('brand_id', $id)->first();
        if ($request->ajax()) {
            
            $data = Brand::with('dosage_form', 'strength', 'pack_size')
                ->where($condition, 1)
                ->where('brand_is_active',1)
                ->orderBy('brand_id', 'DESC');
            

            
            return DataTables::of($data)->make(true);
        }

        return view('frontend.brand-all')->with(compact('id', 'brand'));
    }

    public function brand_alphabetically(Request $request, $start_letter){
        try{  
            
            // dd($start_letter);
            // $brand = Brand::where('brand_id', $start_letter)->first();
            
            if ($request->ajax()) {

                $data = Brand::with('generic', 'dosage_form', 'strength', 'pack_size')
                ->where('brand_name', 'like', $request->start_letter.'%') 
                ->where('brand_is_active',1)
                ->orderBy('brand_id', 'DESC');
                  
                
                return DataTables::of($data)->make(true);
            }
            // dd("asdasdasasas");
            return view('frontend.brand-alphabetically')->with(compact('start_letter'));
     

        } catch (\Exception $ex) {
                
            $this->logException($ex, \Route::currentRouteName(), __METHOD__);
            
        }
    }
}
