<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\LogExceptions;
use Illuminate\Support\Facades\Storage;
use Image;



class SiteSettingController extends Controller
{
    use LogExceptions;
    public function setSiteSetting($key, $value){

        SiteSetting::where('key',$key)->update(['value'=>$value]);
    
    }

    public function scroller(){
        // dd(auth()->user());
        if(auth()->user()->user_mapping->module_scroller == 0){
            return redirect('admin/dashboard');
        }
        return view('admin.pages.scroller');
    }

    public function scroller_update(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'scroller_title' => 'required',   
                'scroller_text' => 'required',       
                'sidebar_link' => 'required',         
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $this->setSiteSetting('scroller_title', $request->scroller_title);
            $this->setSiteSetting('scroller_text', $request->scroller_text);
            $this->setSiteSetting('sidebar_link', $request->sidebar_link);


            if ($request->hasFile('sidebar_image')) {
                $file = $request->file('sidebar_image');
                $image = Image::make($file);
            
                // Check if the image width is greater than 2000 pixels
                if ($image->getWidth() > 2000) {
                    $image->resize(2000, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
            
                // Compress with 60% quality and save
                $sidebar_image = rand(1, 1000000) . '__' . str_replace([' ', "'", '"'], '_', $file->getClientOriginalName());

                
                $image->encode('jpg', 100);
                Storage::disk('public')->put('images/sidebar/' . $sidebar_image, $image);
                $this->setSiteSetting('sidebar_image', $sidebar_image);
            }

            
            return response()->json([
                'message' => 'Scroller record updated successfully'
            ], 200);
        } catch (\Exception $ex) {

            $this->logException($ex, $request->route()->getName(), __METHOD__);
            return response()->json([
                    'message' => 'Something went wrong!',
                    'error' => $ex
                ], 400);
        }
    }
}
