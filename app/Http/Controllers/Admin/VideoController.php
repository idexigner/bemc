<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Traits\LogExceptions;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Image;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
         
            $userMapping = auth()->user()->user_mapping;
            if (!empty($userMapping) && $userMapping->module_video == 0) {
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
            $data = Video::select('*')->orderBy('video_id', 'DESC');
            return DataTables::of($data)->make(true);
        }

        return view('admin.pages.video');
    }
   
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'video_title' => 'required',
                'video_link' => 'required'
                
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = new Video();
            $obj->video_title = $request->video_title ?? '';
            $obj->video_link = $request->video_link ?? '';
            // if ($request->hasFile('video_image')) {
            //     $file = $request->file('video_image');
            //     $video_image = rand(1, 1000000) . '__' . $file->getClientOriginalName();
            //     $file->storeAs('public/images/video', $video_image);
            // }

            // if ($request->hasFile('video_image')) {
            //     $file = $request->file('video_image');
            //     $image = Image::make($file);
            
            //     // Check if the image width is greater than 2000 pixels
            //     if ($image->getWidth() > 2000) {
            //         $image->resize(2000, null, function ($constraint) {
            //             $constraint->aspectRatio();
            //         });
            //     }
            
            //     // Compress with 60% quality and save
            //     // $video_image = rand(1, 1000000) . '__' . $file->getClientOriginalName();
            //     $video_image = rand(1, 1000000) . '__' . str_replace([' ', "'", '"'], '_', $file->getClientOriginalName());

            //     $image->encode('jpg', 60);
            //     Storage::disk('public')->put('images/video/' . $video_image, $image);
            // }

            if ($request->hasFile('video_image')) {
                $file = $request->file('video_image');
				$outputPath = 'storage/images/video/';
				$width = 1000; 
				$name = $file->getClientOriginalName();

				$video_image = $this->processImage($file, $outputPath, $width, $name);
                
            }

            $obj->video_image = $video_image ?? '';

            $obj->video_is_featured = $request->video_is_featured ?? 1;
            $obj->video_is_active = $request->video_is_active ?? '1';
            $obj->save();

            return response()->json([
                    'message' => 'Video record created successfully'
                ], 200);

        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Errror'
            ], 500);

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

            $data = Video::findOrFail($id);            
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
                'video_title' => 'required',
                'video_link' => 'required'
                
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = Video::findOrFail($request->id);
            $obj->video_title = $request->video_title ?? '';
            $obj->video_link = $request->video_link ?? '';
            // if ($request->hasFile('video_image')) {
            //     $file = $request->file('video_image');
            //     $video_image = rand(1, 1000000) . '__' . $file->getClientOriginalName();
            //     $file->storeAs('public/images/video', $video_image);
            //     $obj->video_image = $video_image ?? '';
            // }
            // if ($request->hasFile('video_image')) {
            //     $file = $request->file('video_image');
            //     $image = Image::make($file);
            
            //     // Check if the image width is greater than 2000 pixels
            //     if ($image->getWidth() > 2000) {
            //         $image->resize(2000, null, function ($constraint) {
            //             $constraint->aspectRatio();
            //         });
            //     }
            
            //     // Compress with 60% quality and save              
            //     $video_image = rand(1, 1000000) . '__' . str_replace([' ', "'", '"'], '_', $file->getClientOriginalName());

            //     $image->encode('jpg', 60);
            //     Storage::disk('public')->put('images/video/' . $video_image, $image);
            //     $obj->video_image = $video_image ?? '';
            // }

            if ($request->hasFile('video_image')) {
                $file = $request->file('video_image');
				$outputPath = 'storage/images/video/';
				$width = 1000; 
				$name = $file->getClientOriginalName();

				$video_image = $this->processImage($file, $outputPath, $width, $name);
                $obj->video_image = $video_image ?? '';
            }
            
            $obj->video_is_featured = $request->video_is_featured ?? 1;
            $obj->video_is_active = $request->video_is_active ?? '1';
            $obj->save();

            return response()->json([
                    'message' => 'Video record updated successfully'
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
            $obj = Video::findOrFail($id);
            $obj->delete();

            return response()->json([
                'message' => 'Video record deleted successfully'
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
