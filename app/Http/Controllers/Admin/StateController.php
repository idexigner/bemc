<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Traits\LogExceptions;
use App\Models\State;

class StateController extends Controller
{
    use LogExceptions;
    public function index(Request $request)
    {        
        if ($request->ajax()) {
            // dd("ajax");
            $data = State::with('country')->select('*')->orderBy('state_id', 'DESC');
            return DataTables::of($data)->make(true);
        }

        return view('admin.pages.state');
    }

    public function fetch_state_by_country($country_id)
    {        
        // dd($country_id);
        $data = State::select('*')->where('state_country_id',$country_id)->get();
        return response()->json([
            'message' => 'Fetch', 
            'data' => $data
        ], 200);
    }
   
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'state_name' => 'required'
                
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = new State();
            $obj->state_name = $request->state_name ?? '';
            $obj->state_country_id = $request->state_country_id ?? '';
            $obj->state_is_active = $request->state_is_active ?? '1';
            $obj->save();

            return response()->json([
                    'message' => 'State record created successfully'
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

            $data = State::findOrFail($id);            
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
                'state_name' => 'required',                
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = State::findOrFail($request->id);
            $obj->state_name = $request->state_name ?? '';
            $obj->state_country_id = $request->state_country_id ?? 1 ;
            $obj->state_is_active = $request->state_is_active ?? '1';
            $obj->save();

            return response()->json([
                'message' => 'State record updated successfully'
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
            $obj = State::findOrFail($id);
            $obj->delete();

            return response()->json([
                'message' => 'State record deleted successfully'
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
