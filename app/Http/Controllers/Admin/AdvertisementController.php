<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Traits\LogExceptions;
use App\Models\Advertisement;
// use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
// use Image;
// use Spatie\ImageOptimizer\OptimizerChainFactory;
// use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;
// use Spatie\ImageOptimizer\OptimizerChain;
// use Spatie\ImageOptimizer\Optimizers\Jpegoptim;
// use Spatie\ImageOptimizer\Optimizers\Optipng;
// use Spatie\ImageOptimizer\Optimizers\Pngquant;
// use Spatie\ImageOptimizer\Optimizers\Guetzli;

use Intervention\Image\Facades\Image;

class AdvertisementController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
         
            $userMapping = auth()->user()->user_mapping;
            if (!empty($userMapping) && $userMapping->module_advertisement == 0) {
                return redirect('admin/dashboard');
            }
    
            return $next($request);
        });
    }

    use LogExceptions;
    public function index(Request $request)
    {        
        // phpinfo();
        if ($request->ajax()) {
            // dd("ajax");
            $data = Advertisement::with('advertisement_position')->orderBy('advertisement_id', 'DESC');
            // return DataTables::of($data)->make(true);

            // $data = \DB::table('advertisement')
            // ->select('advertisement.*', 'advertisement_position.*')
            // ->leftJoin('advertisement_position', 'advertisement.advertisement_position', '=', 'advertisement_position.advertisement_position_id')
            // ->orderBy('advertisement.advertisement_id', 'DESC');

        // $data = $query->get();

        return DataTables::of($data)->make(true);

        }

        return view('admin.pages.advertisement');


        
    }
   
    public function list(Request $request)
    {
        $search = $request->input('query');
        $data = Advertisement::where('advertisement_name', 'LIKE', '%' . $search . '%')->limit(20)->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try{
           
            $validator = Validator::make($request->all(), [
                'advertisement_organization' => 'required',
                'advertisement_position' => 'required',
                'advertisement_publish' => 'required',
                'advertisement_unpublish' => 'required',
                'advertisement_image' => 'required',
             
                
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = new Advertisement();
            $obj->advertisement_title = $request->advertisement_title ?? '';
            $obj->advertisement_organization = $request->advertisement_organization ?? '';
            $obj->advertisement_category = $request->advertisement_category ?? '';
            $obj->advertisement_link = $request->advertisement_link ?? '';
            $obj->advertisement_publish = ($request->advertisement_publish)? date('Y-m-d', strtotime($request->advertisement_publish)): '';
            $obj->advertisement_unpublish = ($request->advertisement_unpublish)? date('Y-m-d', strtotime($request->advertisement_unpublish)): '';
            
            
            // if ($request->hasFile('advertisement_image')) {
            //     $file = $request->file('advertisement_image');
            //     $advertisement_image = rand(1, 1000000) . '__' . $file->getClientOriginalName();
            //     $file->storeAs('public/images/advertisement', $advertisement_image);
            // }
            // if ($request->hasFile('advertisement_image')) {
            //     $file = $request->file('advertisement_image');
            //     $image = Image::make($file);
            
            //     // Check if the image width is greater than 2000 pixels
            //     if ($image->getWidth() > 2000) {
            //         $image->resize(2000, null, function ($constraint) {
            //             $constraint->aspectRatio();
            //         });
            //     }
            
            //     // Compress with 60% quality and save
            //     // $advertisement_image = rand(1, 1000000) . '__' . $file->getClientOriginalName();
            //     $advertisement_image = rand(1, 1000000) . '__' . str_replace([' ', "'", '"'], '_', $file->getClientOriginalName());

            //     $image->encode('jpg', 60);
            //     Storage::disk('public')->put('images/advertisement/' . $advertisement_image, $image);
            // }
             // $file = $request->file('advertisement_image');
                
                // // Check if the image width is greater than 2000 pixels
                // $imagick = new \Imagick();
                // // dd("2");
                // $imagick->readImage($file->getPathname());
                
                // if ($imagick->getImageWidth() > 500) {
                //     $imagick->resizeImage(500, 0, \Imagick::FILTER_LANCZOS, 1);
                // }
                
                // // Compress with 60% quality and save   
                // $advertisement_image = 'c'. rand(1, 1000000) . '__' . str_replace([' ', "'", '"'], '_', $file->getClientOriginalName());
                
                // $imagick->setImageCompressionQuality(60);
                // $imagick->writeImage('storage/images/advertisement/' . $advertisement_image);
                
                // $imagick->clear();
                // $imagick->destroy();


            if ($request->hasFile('advertisement_image')) {
                $file = $request->file('advertisement_image');
				$outputPath = 'storage/images/advertisement/';
				$width = 1000; 
				$name = $file->getClientOriginalName();

				$advertisement_image = $this->processImage($file, $outputPath, $width, $name);
            }

            $obj->advertisement_image = $advertisement_image ?? '';

            $obj->advertisement_generic_id = $request->advertisement_generic_id == 'Select Item' ? null : $request->advertisement_generic_id;
            $obj->advertisement_brand_id = $request->advertisement_brand_id == 'Select Item' ? null : $request->advertisement_brand_id;
            $obj->advertisement_indication_id = $request->advertisement_indication_id == 'Select Item' ? null : $request->advertisement_indication_id;

            $obj->advertisement_position = $request->advertisement_position ?? '';
            $obj->advertisement_is_featured = $request->advertisement_is_featured ?? '';

            $obj->advertisement_is_active = $request->advertisement_is_active ?? '1';
            $obj->save();

            return response()->json([
                    'message' => 'Advertisement record created successfully'
                ], 200);

        } catch (\Exception $ex) {

            $this->logException($ex, $request->route()->getName(), __METHOD__);
            return response()->json([
                    'message' => 'Something went wrong!',
                    'error' => $ex->getMessage(),
					'error all' => $ex->getLine()
                ], 400);
        }
    }


    public function edit($id)
    {
       try{

            $data = Advertisement::with('brand', 'generic', 'indication', 'manufacturer')->findOrFail($id);            
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
        // dd($request->all());
        try{
            $validator = Validator::make($request->all(), [
                'advertisement_organization' => 'required',
                'advertisement_position' => 'required',
                'advertisement_publish' => 'required',
                'advertisement_unpublish' => 'required',
               
            ]);
          
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            
            $obj = Advertisement::findOrFail($request->id);
            $obj->advertisement_title = $request->advertisement_title ?? '';
            $obj->advertisement_organization = $request->advertisement_organization ?? '';
            $obj->advertisement_category = $request->advertisement_category ?? '';
            $obj->advertisement_link = $request->advertisement_link ?? '';
            $obj->advertisement_publish = ($request->advertisement_publish)? date('Y-m-d', strtotime($request->advertisement_publish)): '';
            $obj->advertisement_unpublish = ($request->advertisement_unpublish)? date('Y-m-d', strtotime($request->advertisement_unpublish)): '';

            // if ($request->hasFile('advertisement_image')) {
            //     $file = $request->file('advertisement_image');
            //     $advertisement_image = rand(1, 1000000) . '__' . $file->getClientOriginalName();
            //     $file->storeAs('public/images/advertisement', $advertisement_image);
            //     $obj->advertisement_image = $advertisement_image ?? '';

            // }


            if ($request->hasFile('advertisement_image')) {
                // $file = $request->file('advertisement_image');
                // $image = Image::make($file);
            
                // // Check if the image width is greater than 2000 pixels
                // if ($image->getWidth() > 2000) {
                //     $image->resize(2000, null, function ($constraint) {
                //         $constraint->aspectRatio();
                //     });
                // }
            
                // // Compress with 60% quality and save
                // $advertisement_image = rand(1, 1000000) . '__' . str_replace([' ', "'", '"'], '_', $file->getClientOriginalName());

                // $image->encode('jpg', 60);
                // Storage::disk('public')->put('images/advertisement/' . $advertisement_image, $image);
                // $obj->advertisement_image = $advertisement_image ?? '';

                $file = $request->file('advertisement_image');
				$outputPath = 'storage/images/advertisement/';
				$width = 1000; 
				$name = $file->getClientOriginalName();

				$advertisement_image = $this->processImage($file, $outputPath, $width, $name);
                $obj->advertisement_image = $advertisement_image ?? '';
            }

            $obj->advertisement_generic_id = $request->advertisement_generic_id == 'Select Item' ? null : $request->advertisement_generic_id;
            $obj->advertisement_brand_id = $request->advertisement_brand_id == 'Select Item' ? null : $request->advertisement_brand_id;
            $obj->advertisement_indication_id = $request->advertisement_indication_id == 'Select Item' ? null : $request->advertisement_indication_id;

            $obj->advertisement_position = $request->advertisement_position ?? '';
            $obj->advertisement_is_featured = $request->advertisement_is_featured ?? '';

            $obj->advertisement_is_active = $request->advertisement_is_active ?? '1';
            $obj->save();

            return response()->json([
                'message' => 'Advertisement record updated successfully'
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
            $obj = Advertisement::findOrFail($id);
            $obj->delete();

            return response()->json([
                'message' => 'Advertisement record deleted successfully'
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
