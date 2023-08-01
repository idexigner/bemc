<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Traits\LogExceptions;
use App\Models\City;

class CityController extends Controller
{
    use LogExceptions;
    public function index(Request $request)
    {        
        if ($request->ajax()) {
            // dd("ajax");
            $data = City::with('state', 'state.country')->select('*')->orderBy('city_id', 'DESC');
            return DataTables::of($data)->make(true);
        }

        return view('admin.pages.city');
    }

    public function fetch_city_by_state($state_id)
    {        
        $data = City::select('*')->where('city_state_id',$state_id)->get();
        return response()->json([
            'message' => 'Fetch', 
            'data' => $data
        ], 200);
    }
   
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'city_name' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = new City();
            $obj->city_name = $request->city_name ?? '';
            $obj->city_state_id = $request->city_state_id ?? 1 ;
            $obj->city_is_active = $request->city_is_active ?? '1';
            $obj->save();

            return response()->json([
                    'message' => 'City record created successfully'
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

            $data = City::with('state.country')->findOrFail($id);            
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
                'city_name' => 'required',                
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = City::findOrFail($request->id);
            $obj->city_name = $request->city_name ?? '';
            $obj->city_state_id = $request->city_state_id ?? '';
            $obj->city_is_active = $request->city_is_active ?? '1';
            $obj->save();

            return response()->json([
                'message' => 'City record updated successfully'
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
            $obj = City::findOrFail($id);
            $obj->delete();

            return response()->json([
                'message' => 'City record deleted successfully'
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
