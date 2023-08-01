<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Traits\LogExceptions;
use App\Models\User;
use App\Models\UserModuleMapping;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
         
            $userMapping = auth()->user()->user_mapping;
            if (!empty($userMapping) && $userMapping->module_user == 0) {
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
            $data = User::select('*')->orderBy('id', 'DESC');
            return DataTables::of($data)->make(true);
        }

        return view('admin.pages.user');
    }
   
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',
                
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = new User();
            $obj->username = $request->username ?? '';
            $obj->email = $request->email ?? '';
            $obj->password = \Hash::make($request->password);
            $obj->title = $request->title ?? '';
            $obj->firstname = $request->firstname ?? '';
            $obj->lastname = $request->lastname ?? '';
            $obj->profession = $request->profession ?? '';
            $obj->organization = $request->organization ?? '';
            $obj->country_id = $request->country_id == 'Select Item' ? null : $request->country_id;
            $obj->state_id = $request->state_id == 'Select Item' ? null : $request->state_id;
            $obj->city_id = $request->city_id == 'Select Item' ? null : $request->city_id;            
            $obj->zipcode = $request->zipcode ?? '';
            $obj->address = $request->address ?? '';
            $obj->telephone = $request->telephone ?? '';
            $obj->fax = $request->fax ?? '';
            $obj->is_active = $request->is_active ?? '1';
            $obj->save();

            $um_obj = new UserModuleMapping();
            $um_obj->module_user_id = $obj->id;
            $um_obj->module_generic = $request->module_generic ?? '0';
            $um_obj->module_brand = $request->module_brand ?? '0';
            $um_obj->module_manufacturer = $request->module_manufacturer ?? '0';
            $um_obj->module_dosage_form = $request->module_dosage_form ?? '0';
            $um_obj->module_strength = $request->module_strength ?? '0';
            $um_obj->module_pack_size = $request->module_pack_size ?? '0';
            $um_obj->module_indication = $request->module_indication ?? '0';
            $um_obj->module_scroller = $request->module_scroller ?? '0';
            $um_obj->module_doctor = $request->module_doctor ?? '0';
            $um_obj->module_job = $request->module_job ?? '0';
            $um_obj->module_news = $request->module_news ?? '0';
            $um_obj->module_journal = $request->module_journal ?? '0';
            $um_obj->module_address = $request->module_address ?? '0';
            $um_obj->module_advertisement = $request->module_advertisement ?? '0';
            $um_obj->module_special_report = $request->module_special_report ?? '0';
            $um_obj->module_video = $request->module_video ?? '0';
            $um_obj->module_user = $request->module_user ?? '0';
            $um_obj->module_setting = $request->module_setting ?? '0';
            $um_obj->save();

            return response()->json([
                    'message' => 'User record created successfully'
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

            $data = User::with('user_mapping')->findOrFail($id);            
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
        
        // try{
            $validator = Validator::make($request->all(), [
                'username' => 'required',   
                'email' => 'required',             
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = User::findOrFail($request->id);
            $obj->username = $request->username ?? '';
            $obj->email = $request->email ?? '';
            if($request->password != ''){
                $obj->password = \Hash::make($request->password);
            }
            $obj->title = $request->title ?? '';
            $obj->firstname = $request->firstname ?? '';
            $obj->lastname = $request->lastname ?? '';
            $obj->profession = $request->profession ?? '';
            $obj->organization = $request->organization ?? '';
            $obj->country_id = $request->country_id == 'Select Item' ? null : $request->country_id;
            $obj->state_id = $request->state_id == 'Select Item' ? null : $request->state_id;
            $obj->city_id = $request->city_id == 'Select Item' ? null : $request->city_id;            
            $obj->zipcode = $request->zipcode ?? '';
            $obj->address = $request->address ?? '';
            $obj->telephone = $request->telephone ?? '';
            $obj->fax = $request->fax ?? '';
            $obj->is_active = $request->is_active ?? '1';
            $result = $obj->save();
            // dd($result);

            $um_obj = UserModuleMapping::where('module_user_id',$request->id)->first();
            
            $um_obj->module_generic = $request->module_generic ?? '0';
            $um_obj->module_brand = $request->module_brand ?? '0';
            $um_obj->module_manufacturer = $request->module_manufacturer ?? '0';
            $um_obj->module_dosage_form = $request->module_dosage_form ?? '0';
            $um_obj->module_strength = $request->module_strength ?? '0';
            $um_obj->module_pack_size = $request->module_pack_size ?? '0';
            $um_obj->module_indication = $request->module_indication ?? '0';
            $um_obj->module_scroller = $request->module_scroller ?? '0';
            $um_obj->module_doctor = $request->module_doctor ?? '0';
            $um_obj->module_job = $request->module_job ?? '0';
            $um_obj->module_news = $request->module_news ?? '0';
            $um_obj->module_journal = $request->module_journal ?? '0';
            $um_obj->module_address = $request->module_address ?? '0';
            $um_obj->module_advertisement = $request->module_advertisement ?? '0';
            $um_obj->module_special_report = $request->module_special_report ?? '0';
            $um_obj->module_video = $request->module_video ?? '0';
            $um_obj->module_user = $request->module_user ?? '0';
            $um_obj->module_setting = $request->module_setting ?? '0';
            $um_obj->save();

            return response()->json([
                'message' => 'User record updated successfully'
            ], 200);
        // } catch (\Exception $ex) {

        //     $this->logException($ex, $request->route()->getName(), __METHOD__);
        //     return response()->json([
        //             'message' => 'Something went wrong!',
        //             'error' => $ex
        //         ], 400);
        // }
    }

    public function destroy($id)
    {
        try{
            $obj = User::findOrFail($id);
            $obj->delete();

            UserModuleMapping::where('module_user_id',$id)->delete();

            return response()->json([
                'message' => 'User record deleted successfully'
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
