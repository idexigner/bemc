<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Traits\LogExceptions;
use App\Models\AdvertisementPosition;

class AdvertisementPositionController extends Controller
{
    use LogExceptions;
    public function index(Request $request)
    {        
        if ($request->ajax()) {
            // dd("ajax");
            $data = AdvertisementPosition::select('*')->orderBy('advertisement_position_id', 'DESC');
            return DataTables::of($data)->make(true);
        }

        return view('admin.pages.advertisement_position');
    }
   
    // public function list(Request $request)
    // {
    //     $search = $request->input('query');
    //     $data = AdvertisementPosition::where('advertisement_position_name', 'LIKE', '%' . $search . '%')->limit(20)->get();
    //     return response()->json($data);
    // }

    public function fetch(){
        $data = AdvertisementPosition::select('*')->where('advertisement_position_is_active', 1)->get();
        return response()->json([
            'message' => 'Fetch', 
            'data' => $data
        ], 200);
        
    }

    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'advertisement_position_name' => 'required',
                'advertisement_position_class_name' => 'required',
                'advertisement_position_width' => 'required',
                'advertisement_position_height' => 'required',
                
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = new AdvertisementPosition();
            $obj->advertisement_position_name = $request->advertisement_position_name ?? '';
            $obj->advertisement_position_class_name = $request->advertisement_position_class_name ?? '';
            $obj->advertisement_position_width = $request->advertisement_position_width ?? '';
            $obj->advertisement_position_height = $request->advertisement_position_height ?? '';
            $obj->advertisement_position_number = $request->advertisement_position_number ?? '';
            $obj->advertisement_position_interval = $request->advertisement_position_interval ?? '';
            $obj->advertisement_position_price = $request->advertisement_position_price ?? '';
            $obj->advertisement_position_is_featured = $request->advertisement_position_is_featured ?? '0';
            $obj->advertisement_position_is_active = $request->advertisement_position_is_active ?? '1';
            $obj->save();

            return response()->json([
                    'message' => 'Advertisement Position record created successfully'
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

            $data = AdvertisementPosition::findOrFail($id);            
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
                'advertisement_position_name' => 'required',
                'advertisement_position_class_name' => 'required',
                'advertisement_position_width' => 'required',
                'advertisement_position_height' => 'required',
        
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = AdvertisementPosition::findOrFail($request->id);
            $obj->advertisement_position_name = $request->advertisement_position_name ?? '';
            $obj->advertisement_position_class_name = $request->advertisement_position_class_name ?? '';
            $obj->advertisement_position_width = $request->advertisement_position_width ?? '';
            $obj->advertisement_position_height = $request->advertisement_position_height ?? '';
            $obj->advertisement_position_number = $request->advertisement_position_number ?? '';
            $obj->advertisement_position_interval = $request->advertisement_position_interval ?? '';
            $obj->advertisement_position_price = $request->advertisement_position_price ?? '';
            $obj->advertisement_position_is_featured = $request->advertisement_position_is_featured ?? '0';
            $obj->advertisement_position_is_active = $request->advertisement_position_is_active ?? '1';
            $obj->save();

            return response()->json([
                'message' => 'Advertisement Position record updated successfully'
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
            $obj = AdvertisementPosition::findOrFail($id);
            $obj->delete();

            return response()->json([
                'message' => 'Advertisement Position record deleted successfully'
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
