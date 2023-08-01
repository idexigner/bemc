<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\AddressCategory;
use Illuminate\Http\Request;
use App\Traits\LogExceptions;
use Yajra\DataTables\DataTables;



class AddressController extends Controller
{
    use LogExceptions;

    public function index($address_category='')
    {
       
        return view('frontend.address')->with(compact('address_category'));
    }

    public function get_home_address(Request $request){
        try{

            $data = Address::with('specializations')
            // select('address_id', 'address_name', 'address_specialization', 'address_image')
                ->where('address_is_active', 1)
                ->where('address_is_featured',1)
                ->limit(3)
                ->orderBy('address_id', 'DESC')
                ->get();      

            return response()->json([
                'message' => 'Get Address', 
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

    public function get_address(Request $request ){
        try{
            

            if ($request->ajax()) {
            
                // $data = Brand::with('dosage_form', 'strength', 'pack_size')
                //     ->where($condition, 1)
                //     ->where('brand_is_active',1)
                //     ->orderBy('brand_id', 'DESC');

                    $data = Address::where('address_is_active', 1);
                    if ($request->has('address_category_id') && $request->address_category_id != '') {           
                        $data = $data->where('address_category', $request->address_category_id);
                    }
                    if ($request->has('city_id') && $request->city_id != '') {           
                        $data = $data->where('address_detail', 'like','%'.$request->city_id.'%');
                    }
					
					$data = $data->orderBy('address_id', 'DESC');


                    // dd($data);
    
                
                return DataTables::of($data)->make(true);
            }
            
        
            // if ($request->has('specialization_id')) {
           
            //     $data = $data->where('specialization_address_mapping.specialization_mapping_specialization_id', $request->specialization_id);
            // }
                        
            // if ($request->has('country_id')) {
            //     $data = $data->where('address_country_id', $request->country_id);
            // }
                        
            // if ($request->has('city_id')) {
            //     $data = $data->where('address_city_id', $request->city_id);
            // }

            // if($request->has('gender_id')){
            //     $data = $data->where('address_gender', $request->gender_id);
            // }

            // $data = $data->paginate(10)->appends(request()->query());

            
            // return response()->json([
            //     'message' => 'Get All Addresss', 
            //     'data' => $data,
            //     // 'current_page' => $data->currentPage(),
            //     // 'last_page' => $data->lastPage()
            // ], 200);

        } catch (\Exception $ex) {

            $this->logException($ex, \Route::currentRouteName(), __METHOD__);
            return response()->json([
                    'message' => 'Something went wrong!',
                    'error' => $ex,
                    'message' => $ex->getMessage()
                ], 400);
        }
    }

   
    public function get_address_category(){
        try{            
            $data = AddressCategory::where('address_category_is_active', 1)->get();
          
            return response()->json([
                'message' => 'Get Address Category', 
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

}
