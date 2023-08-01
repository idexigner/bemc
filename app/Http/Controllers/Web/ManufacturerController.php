<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Traits\LogExceptions;
use Yajra\DataTables\DataTables;


class ManufacturerController extends Controller
{
    use LogExceptions;
    public function get_brand(Request $request){
        try{

            $data = Manufacturer::select('brand_id', 'brand_name', 'brand_type')
                ->where($request->condition, 1)
                ->where('brand_is_active',1)
                ->orderBy('brand_id', 'DESC')
                ->limit($request->limit ?? 7)
                ->get();      

            return response()->json([
                'message' => 'Get Manufacturer', 
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

    public function manufacturer_detail(Request $request,$id=''){
        
        // dd('asd');
        if($id == ''){
            $id = $request->id;
        }
        $manufacturer = Manufacturer::where('manufacturer_id', $id)->first();
        if ($request->ajax()) {
            // dd("ajax");
            // dd($id);
            $data = Brand::with('generic')
                ->where('brand_manufacturer_id', $id)
                ->where('brand_is_active', 1);
                // ->get();
            // $data = Manufacturer::with('brands.generic')
            // ->where('manufacturer_id', $id)
            // ->where('manufacturer_is_active', 1);
            return DataTables::of($data)->make(true);
        }

        return view('frontend.manufacturer')->with(compact('id', 'manufacturer'));
    }

    public function manufacturer_alphabetically(Request $request, $start_letter){
        try{ 
            
            if ($request->ajax()) {
                $data = Manufacturer::where('manufacturer_name', 'like', $request->start_letter.'%') 
                ->where('manufacturer_is_active',1)
                ->orderBy('manufacturer_id', 'DESC')
                ->get();                
                return DataTables::of($data)->make(true);
            }
            // dd("asdasdasasas");
            return view('frontend.manufacturer-alphabetically')->with(compact('start_letter'));
     
        } catch (\Exception $ex) {
                
            $this->logException($ex, \Route::currentRouteName(), __METHOD__);
            
        }
    }
}
