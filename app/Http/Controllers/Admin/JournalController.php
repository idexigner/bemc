<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Traits\LogExceptions;
use App\Models\Journal;
use Illuminate\Support\Facades\Storage;
use Image;

class JournalController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
         
            $userMapping = auth()->user()->user_mapping;
            if (!empty($userMapping) && $userMapping->module_journal == 0) {
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
            $data = Journal::select('*')->orderBy('journal_id', 'DESC');
            return DataTables::of($data)->make(true);
        }

        return view('admin.pages.journal');
    }
   
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'journal_title' => 'required',                
                'journal_image' => 'required'                            
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = new Journal();
            $obj->journal_title = $request->journal_title ?? '';
            $obj->journal_category = $request->journal_category ?? '';
            $obj->journal_type = $request->journal_type ?? '';


            if ($request->hasFile('journal_image')) {
                $file = $request->file('journal_image');
                $journal_image = rand(1, 1000000) . '__' . $file->getClientOriginalName();
                $file->storeAs('public/images/journal', $journal_image);
            }

            
            

            // if ($request->hasFile('journal_image')) {
            //     $file = $request->file('journal_image');
            //     $image = Image::make($file);
            
            //     // Check if the image width is greater than 2000 pixels
            //     if ($image->getWidth() > 2000) {
            //         $image->resize(2000, null, function ($constraint) {
            //             $constraint->aspectRatio();
            //         });
            //     }
            
            //     // Compress with 60% quality and save
            //     $journal_image = rand(1, 1000000) . '__' . $file->getClientOriginalName();
            //     $image->encode('jpg', 60);
            //     Storage::disk('public')->put('images/journal/' . $journal_image, $image);
            // }
            $obj->journal_image = $journal_image ?? '';
            $obj->journal_is_active = $request->journal_is_active ?? '1';
            $obj->save();

            return response()->json([
                    'message' => 'Journal record created successfully'
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

            $data = Journal::findOrFail($id);            
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
                'journal_title' => 'required',                
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $obj = Journal::findOrFail($request->id);
            $obj->journal_title = $request->journal_title ?? '';
            $obj->journal_category = $request->journal_category ?? '';
            $obj->journal_type = $request->journal_type ?? '';

            if ($request->hasFile('journal_image')) {
                $file = $request->file('journal_image');
                $journal_image = rand(1, 1000000) . '__' . $file->getClientOriginalName();
                $file->storeAs('public/images/journal', $journal_image);
                $obj->journal_image = $journal_image ?? '';
            }
            
            // if ($request->hasFile('journal_image')) {
            //     $file = $request->file('journal_image');
            //     $image = Image::make($file);
            
            //     // Check if the image width is greater than 2000 pixels
            //     if ($image->getWidth() > 2000) {
            //         $image->resize(2000, null, function ($constraint) {
            //             $constraint->aspectRatio();
            //         });
            //     }
            
            //     // Compress with 60% quality and save
            //     $journal_image = rand(1, 1000000) . '__' . $file->getClientOriginalName();
            //     $image->encode('jpg', 60);
            //     Storage::disk('public')->put('images/journal/' . $journal_image, $image);
            //     $obj->journal_image = $journal_image ?? '';
            // }
            $obj->journal_is_active = $request->journal_is_active ?? '1';
            $obj->save();

            return response()->json([
                    'message' => 'Journal record updated successfully'
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
            $obj = Journal::findOrFail($id);
            $obj->delete();

            return response()->json([
                'message' => 'Journal record deleted successfully'
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
