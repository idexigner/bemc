<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Generic;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Traits\LogExceptions;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;


class ManufacturerController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
         
            $userMapping = auth()->user()->user_mapping;
            if (!empty($userMapping) && $userMapping->module_manufacturer == 0) {
                return redirect('admin/dashboard');
            }
    
            return $next($request);
        });
    }

    use LogExceptions;
    public function index(Request $request)
    {        

        if ($request->ajax()) {
            // dd("ajax");Manufacturer::with('location') with('location')->
            $data = Manufacturer::select('*')->orderBy('manufacturer_id', 'DESC');
            return DataTables::of($data)->make(true);
        }

        return view('admin.pages.manufacturer');
    }
   
    public function list(Request $request)
    {
        $search = $request->input('query');
        $data = Manufacturer::where('manufacturer_name', 'LIKE', '%' . $search . '%')->limit(20)->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'manufacturer_name' => 'required',
                // 'manufacturer_location_id' => 'required'
               
                // 'content' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = new Manufacturer();
            $obj->manufacturer_name = $request->manufacturer_name ?? '';
            $obj->manufacturer_email = $request->manufacturer_email ?? '';
            $obj->manufacturer_phone = $request->manufacturer_phone ?? '';
            $obj->manufacturer_mobile = $request->manufacturer_mobile ?? '';
            $obj->manufacturer_fax = $request->manufacturer_fax ?? '';

            // $obj->manufacturer_location_id = $request->manufacturer_location_id ?? '';
            
            $obj->manufacturer_address = $request->manufacturer_address ?? '';
            $obj->manufacturer_country_id = $request->manufacturer_country_id == 'Select Item' ? null : $request->manufacturer_country_id;
            $obj->manufacturer_state_id = $request->manufacturer_state_id == 'Select Item' ? null : $request->manufacturer_state_id;
            $obj->manufacturer_city_id = $request->manufacturer_city_id == 'Select Item' ? null : $request->manufacturer_city_id;
            $obj->manufacturer_longitude = $request->manufacturer_longitude ?? '';
            $obj->manufacturer_latitude = $request->manufacturer_latitude ?? '';

            $obj->manufacturer_is_active = $request->manufacturer_is_active ?? '1';
            $obj->save();

            return response()->json([
                    'message' => 'Manufacturer record created successfully'
                ], 200);

        } catch (\Exception $ex) {

            $this->logException($ex, $request->route()->getName(), __METHOD__);
            return response()->json([
                    'message' => 'Something went wrong!',
                    'error' => $ex
                ], 400);
        }
    }


    public function edit($id)
    {
       try{

            $data = Manufacturer::findOrFail($id);            
            return response()->json([
                'message' => 'Edit', 
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

  

    public function update(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'manufacturer_name' => 'required',
                // 'manufacturer_location_id' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
     
            $obj = Manufacturer::findOrFail($request->id);
         
            $obj->manufacturer_name = $request->manufacturer_name ?? '';
            $obj->manufacturer_email = $request->manufacturer_email ?? '';
            $obj->manufacturer_phone = $request->manufacturer_phone ?? '';
            $obj->manufacturer_mobile = $request->manufacturer_mobile ?? '';
            $obj->manufacturer_fax = $request->manufacturer_fax ?? '';
            // $obj->manufacturer_location_id = $request->manufacturer_location_id ?? '';
            $obj->manufacturer_address = $request->manufacturer_address ?? '';
            $obj->manufacturer_country_id = $request->manufacturer_country_id == 'Select Item' ? null : $request->manufacturer_country_id;
            $obj->manufacturer_state_id = $request->manufacturer_state_id == 'Select Item' ? null : $request->manufacturer_state_id;
            $obj->manufacturer_city_id = $request->manufacturer_city_id == 'Select Item' ? null : $request->manufacturer_city_id;
            
            $obj->manufacturer_longitude = $request->manufacturer_longitude ?? '';
            $obj->manufacturer_latitude = $request->manufacturer_latitude ?? '';
            $obj->manufacturer_is_active = $request->manufacturer_is_active ?? '1';
            $obj->save();

            return response()->json([
                'message' => 'Manufacturer record updated successfully'
            ], 200);
        } catch (\Exception $ex) {

            $this->logException($ex, $request->route()->getName(), __METHOD__);
            return response()->json([
                    'message' => 'Something went wrong!',
                    'error' => $ex
                ], 400);
        }
    }

    public function destroy($id)
    {
        try{
            $obj = Manufacturer::findOrFail($id);
            $obj->delete();

            return response()->json([
                'message' => 'Manufacturer record deleted successfully'
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
