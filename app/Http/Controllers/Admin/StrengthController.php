<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Traits\LogExceptions;
use App\Models\Strength;

class StrengthController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
         
            $userMapping = auth()->user()->user_mapping;
            if (!empty($userMapping) && $userMapping->module_strength == 0) {
                return redirect('admin/dashboard');
            }
    
            return $next($request);
        });
    }
    use LogExceptions;
    public function index(Request $request)
    {        
        if ($request->ajax()) {
            // dd("ajax");
            $data = Strength::select('*')->orderBy('strength_id', 'DESC');
            return DataTables::of($data)->make(true);
        }

        return view('admin.pages.strength');
    }
   
    public function list(Request $request)
    {
        $search = $request->input('query');
        $data = Strength::where('strength_name', 'LIKE', '%' . $search . '%')->limit(20)->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'strength_name' => 'required'
                
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = new Strength();
            $obj->strength_name = $request->strength_name ?? '';
            $obj->strength_is_active = $request->strength_is_active ?? '1';
            $obj->save();

            return response()->json([
                    'message' => 'Strength record created successfully'
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

            $data = Strength::findOrFail($id);            
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
                'strength_name' => 'required',                
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = Strength::findOrFail($request->id);
            $obj->strength_name = $request->strength_name ?? '';
            $obj->strength_is_active = $request->strength_is_active ?? '1';
            $obj->save();

            return response()->json([
                'message' => 'Strength record updated successfully'
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
            $obj = Strength::findOrFail($id);
            $obj->delete();

            return response()->json([
                'message' => 'Strength record deleted successfully'
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
