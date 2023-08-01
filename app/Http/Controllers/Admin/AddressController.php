<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Traits\LogExceptions;
use App\Models\Address;
use App\Models\AddressCategory;



class AddressController extends Controller
{

    
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
         
            $userMapping = auth()->user()->user_mapping;
            if (!empty($userMapping) && $userMapping->module_address == 0) {
                return redirect('admin/dashboard');
            }
    
            return $next($request);
        });
    }

   
    use LogExceptions;
    public function index(Request $request)
    {        
        // $value = session('user_mapping');
        // $value = $request->session()->get('user_mapping');
        // dd($value);
        if ($request->ajax()) {
            // dd("ajax");
            $data = Address::with('category')->select('*')->orderBy('address_id', 'DESC');
            return DataTables::of($data)->make(true);
        }

        return view('admin.pages.address');
    }

   
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'address_title' => 'required',
                'address_category' => 'required',
                'address_detail' => 'required'
                
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = new Address();
            $obj->address_title = $request->address_title ?? '';
            $obj->address_category = $request->address_category ?? 1;
            $obj->address_detail = $request->address_detail ?? '';
            $obj->address_contact = $request->address_contact ?? '';
            $obj->address_is_active = $request->address_is_active ?? '1';
            $obj->save();

            return response()->json([
                    'message' => 'Address record created successfully'
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

            $data = Address::findOrFail($id);            
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
                'address_title' => 'required',
                'address_category' => 'required',
                'address_detail' => 'required'
                
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = Address::findOrFail($request->id);
            $obj->address_title = $request->address_title ?? '';
            $obj->address_category = $request->address_category ?? 1;
            $obj->address_detail = $request->address_detail ?? '';
            $obj->address_contact = $request->address_contact ?? '';
            $obj->address_is_active = $request->address_is_active ?? '1';
            $obj->save();

            return response()->json([
                    'message' => 'Address record updated successfully'
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
            $obj = Address::findOrFail($id);
            $obj->delete();

            return response()->json([
                'message' => 'Address record deleted successfully'
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


    public function store_category(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'address_new_category' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = new AddressCategory();
            $obj->address_category_title = $request->address_new_category ?? '';
            $obj->save();

            return response()->json([
                    'message' => 'Address Category record created successfully'
                ], 200);

        } catch (\Exception $ex) {

            $this->logException($ex, $request->route()->getName(), __METHOD__);
            return response()->json([
                    'message' => 'Something went wrong!',
                    'error' => $ex
                ], 400);
        }
    }
    
    public function fetch_category(){
        $data = AddressCategory::select('*')->get();
        return response()->json([
            'message' => 'Fetch', 
            'data' => $data
        ], 200);
        
    }
}
