<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Traits\LogExceptions;
use App\Models\Doctor;
use App\Models\Specialization;
use App\Models\SpecializationMapping;
use Illuminate\Support\Facades\Storage;
use Image;


class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
         
            $userMapping = auth()->user()->user_mapping;
            if (!empty($userMapping) && $userMapping->module_doctor == 0) {
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
            $data = Doctor::with('specializations')->select('*')->orderBy('doctor_id', 'DESC');
            return DataTables::of($data)->make(true);
        }

        return view('admin.pages.doctor');
    }
   
    

    public function store(Request $request)
    {
        try{
            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'doctor_name' => 'required'
                
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = new Doctor();
            $obj->doctor_name = $request->doctor_name ?? '';
            $obj->doctor_email = $request->doctor_email ?? '';
            $obj->doctor_phone_personal = $request->doctor_phone_personal ?? null;
            $obj->doctor_phone_clinic = $request->doctor_phone_clinic ?? null;
            // $obj->doctor_specialization = $request->doctor_specialization ?? '';
            $obj->doctor_achievement = $request->doctor_achievement ?? '';
            $obj->doctor_experience = $request->doctor_experience ?? '';
            $obj->doctor_profession_degree = $request->doctor_profession_degree ?? '';

            $obj->doctor_gender = $request->doctor_gender ?? '';

            
            if ($request->hasFile('doctor_certificate')) {
                $file = $request->file('doctor_certificate');
                $doctor_certificate = rand(1, 1000000) . '__' . $file->getClientOriginalName();
                $file->storeAs('public/images/doctor', $doctor_certificate);
            }
            $obj->doctor_certificate = $doctor_certificate ?? '';

            // if ($request->hasFile('doctor_image')) {
            //     $file = $request->file('doctor_image');
            //     $image = Image::make($file);
            
            //     // Check if the image width is greater than 2000 pixels
            //     if ($image->getWidth() > 2000) {
            //         $image->resize(2000, null, function ($constraint) {
            //             $constraint->aspectRatio();
            //         });
            //     }
            
            //     // Compress with 60% quality and save
            //     // $doctor_image = rand(1, 1000000) . '__' . $file->getClientOriginalName();
                
            //     $doctor_image = rand(1, 1000000) . '__' . str_replace([' ', "'", '"'], '_', $file->getClientOriginalName());
            //     $image->encode('jpg', 60);
            //     Storage::disk('public')->put('images/doctor/' . $doctor_image, $image);
 
            // }

            // if ($request->hasFile('doctor_image')) {
            //     $file = $request->file('doctor_image');
            //     $doctor_image = rand(1, 1000000) . '__' . $file->getClientOriginalName();
            //     $file->storeAs('public/images/doctor', $doctor_image);
            // }


            if ($request->hasFile('doctor_image')) {
                $file = $request->file('doctor_image');
				$outputPath = 'storage/images/doctor/';
				$width = 1000; 
				$name = $file->getClientOriginalName();

				$doctor_image = $this->processImage($file, $outputPath, $width, $name);
            }
            $obj->doctor_image = $doctor_image ?? '';

            $obj->doctor_bio_notes = $request->doctor_bio_notes ?? '';
            $obj->doctor_address = $request->doctor_address ?? '';
            // $obj->doctor_country_id = $request->doctor_country_id ?? null;
            $obj->doctor_country_id = $request->doctor_country_id == 'Select Item' ? null : $request->doctor_country_id;
            $obj->doctor_state_id = $request->doctor_state_id == 'Select Item' ? null : $request->doctor_state_id;
            $obj->doctor_city_id = $request->doctor_city_id == 'Select Item' ? null : $request->doctor_city_id;
            
            // $obj->doctor_city_id = $request->doctor_city_id ?? null;
            $obj->doctor_zip_code = $request->doctor_zip_code ?? '';
            $obj->doctor_is_featured = $request->doctor_is_featured ?? '0';
            $obj->doctor_is_active = $request->doctor_is_active ?? '1';
            $obj->save();


            $doctor_id = $obj->getKey(); 

            if(isset($request->doctor_specialization2)){

                // $doctor_specialization2 = implode(',', $request->doctor_specialization2);
                foreach($request->doctor_specialization2 as $specialization_id){
                   
                    $obj = new SpecializationMapping();
                    $obj->specialization_mapping_specialization_id = $specialization_id;
                    $obj->specialization_mapping_doctor_id = $doctor_id;
                    $obj->save();
                }
            }

            return response()->json([
                    'message' => 'Doctor record created successfully'
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

            $data = Doctor::with('specializations')->findOrFail($id);            
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
            // dd($request->all());
            $validator = Validator::make($request->all(), [
                'doctor_name' => 'required',                
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = Doctor::findOrFail($request->id);
            $obj->doctor_name = $request->doctor_name ?? '';
            $obj->doctor_email = $request->doctor_email ?? '';
            $obj->doctor_phone_personal = $request->doctor_phone_personal ?? null;
            $obj->doctor_phone_clinic = $request->doctor_phone_clinic ?? null;
            $obj->doctor_specialization = $request->doctor_specialization ?? '';
            $obj->doctor_achievement = $request->doctor_achievement ?? '';
            $obj->doctor_experience = $request->doctor_experience ?? '';
            $obj->doctor_profession_degree = $request->doctor_profession_degree ?? '';
            $obj->doctor_gender = $request->doctor_gender ?? '';

            if ($request->hasFile('doctor_certificate')) {
                $file = $request->file('doctor_certificate');
                $doctor_certificate = rand(1, 1000000) . '__' . $file->getClientOriginalName();
                $file->storeAs('public/images/doctor', $doctor_certificate);
                $obj->doctor_certificate = $doctor_certificate ?? '';

            }

            // if ($request->hasFile('doctor_image')) {
            //     $file = $request->file('doctor_image');
            //     $doctor_image = rand(1, 1000000) . '__' . $file->getClientOriginalName();
            //     $file->storeAs('public/images/doctor', $doctor_image);
            //     $obj->doctor_image = $doctor_image ?? '';

            // }


            // if ($request->hasFile('doctor_image')) {
            //     $file = $request->file('doctor_image');
            //     $image = Image::make($file);
            
            //     // Check if the image width is greater than 2000 pixels
            //     if ($image->getWidth() > 2000) {
            //         $image->resize(2000, null, function ($constraint) {
            //             $constraint->aspectRatio();
            //         });
            //     }
            
            //     // Compress with 60% quality and save
            //     $doctor_image = rand(1, 1000000) . '__' . str_replace([' ', "'", '"'], '_', $file->getClientOriginalName());
            //     $image->encode('jpg', 60);
            //     Storage::disk('public')->put('images/doctor/' . $doctor_image, $image);
            //     $obj->doctor_image = $doctor_image ?? '';
            // }

            if ($request->hasFile('doctor_image')) {
                $file = $request->file('doctor_image');
				$outputPath = 'storage/images/doctor/';
				$width = 1000; 
				$name = $file->getClientOriginalName();

				$doctor_image = $this->processImage($file, $outputPath, $width, $name);
                $obj->doctor_image = $doctor_image ?? '';
            }

            $obj->doctor_bio_notes = $request->doctor_bio_notes ?? '';
            $obj->doctor_address = $request->doctor_address ?? '';
            $obj->doctor_country_id = $request->doctor_country_id == 'Select Item' ? null : $request->doctor_country_id;
            $obj->doctor_state_id = $request->doctor_state_id == 'Select Item' ? null : $request->doctor_state_id;
            $obj->doctor_city_id = $request->doctor_city_id == 'Select Item' ? null : $request->doctor_city_id;
            $obj->doctor_zip_code = $request->doctor_zip_code ?? '';
            $obj->doctor_is_featured = $request->doctor_is_featured ?? '0';
            $obj->doctor_is_active = $request->doctor_is_active ?? '1';
            $obj->save();


            $doctor_id = $obj->getKey(); 

            if(isset($request->doctor_specialization2)){
                SpecializationMapping::where('specialization_mapping_doctor_id', $doctor_id)->delete();

                // $doctor_specialization2 = implode(',', $request->doctor_specialization2);
                foreach($request->doctor_specialization2 as $specialization_id){
                   
                    $obj = new SpecializationMapping();
                    $obj->specialization_mapping_specialization_id = $specialization_id;
                    $obj->specialization_mapping_doctor_id = $doctor_id;
                    $obj->save();
                }
            }

            return response()->json([
                'message' => 'Doctor record updated successfully'
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
            $obj = Doctor::findOrFail($id);
            $obj->delete();

            return response()->json([
                'message' => 'Doctor record deleted successfully'
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

    public function store_specialization(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'specialization_name' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            
            $obj = new Specialization();
            $obj->specialization_name = $request->specialization_name ?? '';
            $result = $obj->save();

            

            return response()->json([
                    'message' => 'Specialization record created successfully'
                ], 200);

        } catch (\Exception $ex) {

            $this->logException($ex, $request->route()->getName(), __METHOD__);
            return response()->json([
                    'message' => 'Something went wrong!',
                    'error' => $ex
                ], 400);
        }
    }

    public function fetch_specialization(){
        $data = Specialization::select('*')->where('specialization_is_active',1)->get();
        return response()->json([
            'message' => 'Fetch', 
            'data' => $data
        ], 200);
        
    }
}
