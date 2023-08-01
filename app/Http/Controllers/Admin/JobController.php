<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Traits\LogExceptions;
use App\Models\Job;
use Illuminate\Support\Facades\Storage;
use Image;


class JobController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
         
            $userMapping = auth()->user()->user_mapping;
            if (!empty($userMapping) && $userMapping->module_job == 0) {
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
            $data = Job::select('*')->orderBy('job_id', 'DESC');
            return DataTables::of($data)->make(true);
        }

        return view('admin.pages.job');
    }
   
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'job_category' => 'required',
                'job_title' => 'required',
                'job_organization' => 'required',
                'job_organization_logo' => 'required',
                'job_description' => 'required',
                'job_position' => 'required',
                'job_application_deadline' => 'required',
                'job_publish_date' => 'required',
                // 'job_image' => 'required',
                'job_educational_requirement' => 'required',
                'job_experience_requirement' => 'required'
            ]);


            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = new Job();
            $obj->job_category = $request->job_category ?? '';
            $obj->job_title = $request->job_title ?? '';
            $obj->job_organization = $request->job_organization ?? '';
            
            // if ($request->hasFile('job_organization_logo')) {
            //     $file = $request->file('job_organization_logo');
            //     $job_organization_logo = rand(1, 1000000) . '__' . $file->getClientOriginalName();
            //     $file->storeAs('public/images/job', $job_organization_logo);
            // }

            // if ($request->hasFile('job_organization_logo')) {
            //     $file = $request->file('job_organization_logo');
            //     $image = Image::make($file);
            
            //     // Check if the image width is greater than 2000 pixels
            //     if ($image->getWidth() > 2000) {
            //         $image->resize(2000, null, function ($constraint) {
            //             $constraint->aspectRatio();
            //         });
            //     }
            
            //     // Compress with 60% quality and save
            //     // $job_organization_logo = rand(1, 1000000) . '__' . $file->getClientOriginalName();
            //     $job_organization_logo = rand(1, 1000000) . '__' . str_replace([' ', "'", '"'], '_', $file->getClientOriginalName());

            //     $image->encode('jpg', 60);
            //     Storage::disk('public')->put('images/job/' . $job_organization_logo, $image);
            // }

            if ($request->hasFile('job_organization_logo')) {
                $file = $request->file('job_organization_logo');
				$outputPath = 'storage/images/job/';
				$width = 1000; 
				$name = $file->getClientOriginalName();

				$job_organization_logo = $this->processImage($file, $outputPath, $width, $name);
                
            }

            $obj->job_organization_logo = $job_organization_logo ?? '';
            $obj->job_description = $request->job_description ?? '';
            $obj->job_position = $request->job_position ?? '';
            
            $obj->job_application_deadline = ($request->job_application_deadline)? date('Y-m-d', strtotime($request->job_application_deadline)): '';
            
            $obj->job_publish_date = ($request->job_publish_date)? date('Y-m-d', strtotime($request->job_publish_date)): '';

            
            // if ($request->hasFile('job_image')) {
            //     $file = $request->file('job_image');
            //     $job_image = rand(1, 1000000) . '__' . $file->getClientOriginalName();
            //     $file->storeAs('public/images/job', $job_image);
            // }

            // if ($request->hasFile('job_image')) {
            //     $file = $request->file('job_image');
            //     $image = Image::make($file);
            
            //     // Check if the image width is greater than 2000 pixels
            //     if ($image->getWidth() > 2000) {
            //         $image->resize(2000, null, function ($constraint) {
            //             $constraint->aspectRatio();
            //         });
            //     }
            
            //     // Compress with 60% quality and save
            //     // $job_image = rand(1, 1000000) . '__' . $file->getClientOriginalName();
            //     $job_image = rand(1, 1000000) . '__' . str_replace([' ', "'", '"'], '_', $file->getClientOriginalName());

            //     $image->encode('jpg', 60);
            //     Storage::disk('public')->put('images/job/' . $job_image, $image);
            // }


            if ($request->hasFile('job_image')) {
                $file = $request->file('job_image');
				$outputPath = 'storage/images/job/';
				$width = 1000; 
				$name = $file->getClientOriginalName();

				$job_image = $this->processImage($file, $outputPath, $width, $name);
                
            }

            $obj->job_image = $job_image ?? '';
            $obj->job_salary = $request->job_salary ?? null;
            $obj->job_educational_requirement = $request->job_educational_requirement ?? '';
            $obj->job_experience_requirement = $request->job_experience_requirement ?? '';
            $obj->job_vacancy = $request->job_vacancy ?? '';
            $obj->job_age_limit = $request->job_age_limit ?? '';
            $obj->job_location = $request->job_location ?? '';
            $obj->job_source = $request->job_source ?? '';
            $obj->job_type = $request->job_type ?? '';
            $obj->job_employment_type = $request->job_employment_type ?? '';
            $obj->job_nature = $request->job_nature ?? '';
            $obj->job_application_procedure = $request->job_application_procedure ?? '';

            $obj->job_is_active = $request->job_is_active ?? '1';
            $obj->save();

            return response()->json([
                    'message' => 'Job record created successfully'
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

            $data = Job::findOrFail($id);            
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
                'job_category' => 'required',
                'job_title' => 'required',
                'job_organization' => 'required',             
                'job_description' => 'required',
                'job_position' => 'required',
                'job_application_deadline' => 'required',
                'job_publish_date' => 'required',              
                'job_educational_requirement' => 'required',
                'job_experience_requirement' => 'required'         
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = Job::findOrFail($request->id);
            $obj->job_category = $request->job_category ?? '';
            $obj->job_title = $request->job_title ?? '';
            $obj->job_organization = $request->job_organization ?? '';
            
            // if ($request->hasFile('job_organization_logo')) {
            //     $file = $request->file('job_organization_logo');
            //     $job_organization_logo = rand(1, 1000000) . '__' . $file->getClientOriginalName();
            //     $file->storeAs('public/images/job', $job_organization_logo);
            //     $obj->job_organization_logo = $job_organization_logo ?? '';
            // }

            // if ($request->hasFile('job_organization_logo')) {
            //     $file = $request->file('job_organization_logo');
            //     $image = Image::make($file);
            
            //     // Check if the image width is greater than 2000 pixels
            //     if ($image->getWidth() > 2000) {
            //         $image->resize(2000, null, function ($constraint) {
            //             $constraint->aspectRatio();
            //         });
            //     }
            
            //     // Compress with 60% quality and save
            //     // $job_organization_logo = rand(1, 1000000) . '__' . $file->getClientOriginalName();
            //     $job_organization_logo = rand(1, 1000000) . '__' . str_replace([' ', "'", '"'], '_', $file->getClientOriginalName());

            //     $image->encode('jpg', 60);
            //     Storage::disk('public')->put('images/job/' . $job_organization_logo, $image);
            //     $obj->job_organization_logo = $job_organization_logo ?? '';
            // }

            if ($request->hasFile('job_organization_logo')) {
                $file = $request->file('job_organization_logo');
				$outputPath = 'storage/images/job/';
				$width = 1000; 
				$name = $file->getClientOriginalName();

				$job_organization_logo = $this->processImage($file, $outputPath, $width, $name);
                $obj->job_organization_logo = $job_organization_logo ?? '';
            }

           
            $obj->job_description = $request->job_description ?? '';
            $obj->job_position = $request->job_position ?? '';
            
            $obj->job_application_deadline = ($request->job_application_deadline)? date('Y-m-d', strtotime($request->job_application_deadline)): '';
            
            $obj->job_publish_date = ($request->job_publish_date)? date('Y-m-d', strtotime($request->job_publish_date)): '';

            
            // if ($request->hasFile('job_image')) {
            //     $file = $request->file('job_image');
            //     $job_image = rand(1, 1000000) . '__' . $file->getClientOriginalName();
            //     $file->storeAs('public/images/job', $job_image);
            //     $obj->job_image = $job_image ?? '';
            // }

            // if ($request->hasFile('job_image')) {
            //     $file = $request->file('job_image');
            //     $image = Image::make($file);
            
            //     // Check if the image width is greater than 2000 pixels
            //     if ($image->getWidth() > 2000) {
            //         $image->resize(2000, null, function ($constraint) {
            //             $constraint->aspectRatio();
            //         });
            //     }
            
            //     // Compress with 60% quality and save
            //     // $job_image = rand(1, 1000000) . '__' . $file->getClientOriginalName();
            //     $job_image = rand(1, 1000000) . '__' . str_replace([' ', "'", '"'], '_', $file->getClientOriginalName());

                
            //     $image->encode('jpg', 60);
            //     Storage::disk('public')->put('images/job/' . $job_image, $image);
            //     $obj->job_image = $job_image ?? '';
            // }

            if ($request->hasFile('job_image')) {
                $file = $request->file('job_image');
				$outputPath = 'storage/images/job/';
				$width = 1000; 
				$name = $file->getClientOriginalName();

				$job_image = $this->processImage($file, $outputPath, $width, $name);
                $obj->job_image = $job_image ?? '';
            }
          
            $obj->job_salary = $request->job_salary ?? null;
            $obj->job_educational_requirement = $request->job_educational_requirement ?? '';
            $obj->job_experience_requirement = $request->job_experience_requirement ?? '';
            $obj->job_vacancy = $request->job_vacancy ?? '';
            $obj->job_age_limit = $request->job_age_limit ?? '';
            $obj->job_location = $request->job_location ?? '';
            $obj->job_source = $request->job_source ?? '';
            $obj->job_type = $request->job_type ?? '';
            $obj->job_employment_type = $request->job_employment_type ?? '';
            $obj->job_nature = $request->job_nature ?? '';
            $obj->job_application_procedure = $request->job_application_procedure ?? '';

            $obj->job_is_active = $request->job_is_active ?? '1';
            $obj->save();

            return response()->json([
                'message' => 'Job record updated successfully'
            ], 200);
        } catch (\Exception $ex) {

            $this->logException($ex, $request->route()->getName(), __METHOD__);
            return response()->json([
                    'message' => 'Something went wrong!',
                    'error' => $ex,
                    'error_message' =>$ex->getMessage()
                ], 400);
        }
    }

    public function destroy($id)
    {
        try{
            $obj = Job::findOrFail($id);
            $obj->delete();

            return response()->json([
                'message' => 'Job record deleted successfully'
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

    public function destroy_all()
    {
        try{
            $obj = Job::truncate();
         

            return response()->json([
                'message' => 'All Job record deleted successfully'
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
