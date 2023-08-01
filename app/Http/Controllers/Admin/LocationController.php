<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Traits\LogExceptions;
use App\Models\Location;

class LocationController extends Controller
{
    use LogExceptions;
    public function index(Request $request)
    {        
        if ($request->ajax()) {
            // dd("ajax");
            $data = Location::with('country','state','city')->select('*')->orderBy('location_id', 'DESC');
            return DataTables::of($data)->make(true);
        }

        return view('admin.pages.location');
    }

   
    public function fetch_state_by_country($country_id)
    {        
        $data = Location::select('*')->where('location_country_id',$country_id)->get();
        return response()->json([
            'message' => 'Fetch', 
            'data' => $data
        ], 200);
    }
   
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'location_country_id' => 'required',
                'location_state_id' => 'required',
                'location_city_id' => 'required',
                'location_address' => 'required',
                
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = new Location();
            $obj->location_country_id = $request->location_country_id ?? '1';
            $obj->location_state_id = $request->location_state_id ?? '1';
            $obj->location_city_id = $request->location_city_id ?? '1';
            $obj->location_address = $request->location_address ?? '1';
            $obj->location_longitude = $request->location_longitude ?? '1';
            $obj->location_latitude = $request->location_latitude ?? '1';
            $obj->location_is_active = $request->location_is_active ?? '1';
            $obj->save();

            return response()->json([
                    'message' => 'Location record created successfully'
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

            $data = Location::findOrFail($id);            
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
                'location_country_id' => 'required',
                'location_state_id' => 'required',
                'location_city_id' => 'required',
                'location_address' => 'required',
         
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = Location::findOrFail($request->id);
            $obj->location_country_id = $request->location_country_id ?? '1';
            $obj->location_state_id = $request->location_state_id ?? '1';
            $obj->location_city_id = $request->location_city_id ?? '1';
            $obj->location_address = $request->location_address ?? '1';
            $obj->location_longitude = $request->location_longitude ?? '1';
            $obj->location_latitude = $request->location_latitude ?? '1';
            $obj->location_is_active = $request->location_is_active ?? '1';
            $obj->save();

            return response()->json([
                'message' => 'Location record updated successfully'
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
            $obj = Location::findOrFail($id);
            $obj->delete();

            return response()->json([
                'message' => 'Location record deleted successfully'
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
