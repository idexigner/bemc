<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\SpecialReport;
use Illuminate\Http\Request;
use App\Traits\LogExceptions;

class SpecialReportController extends Controller
{
    use LogExceptions;
    public function index(){
        return view('frontend.speical-report');
    }
    public function get_home_special_report(Request $request){
        try{

            $data = SpecialReport::select('*')
                ->where('special_report_is_active', 1)
                ->where('special_report_is_featured',1)
                ->limit($request->limit)
                ->orderBy('special_report_id', 'DESC')
                ->get();      

            return response()->json([
                'message' => 'Get Special Report', 
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

    public function get_special_report(Request $request){
        try{
            $data = SpecialReport::
            where('special_report_is_active', 1)
			->orderBy('special_report_id', 'DESC');

            $data = $data->paginate(10)->appends(request()->query());

            return response()->json([
                'message' => 'Get All Special Report', 
                'data' => $data,
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage()
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

    public function special_report_detail($id){
        return view('frontend.speical-report-detail')->with(compact('id'));
    }

    public function get_special_report_detail($id){
        try{  
            
            $data = SpecialReport::where('special_report_id',$id)->first();

            // dd($data);
            return response()->json([
                'message' => 'Get Special Report Detail', 
                'data' => $data
            ], 200);

        } catch (\Exception $ex) {
                
            $this->logException($ex, \Route::currentRouteName(), __METHOD__);
            return response()->json([
                'message' => 'Something went wrong! Get Brand Detail',
                'error' => $ex,
                'message' => $ex->getMessage()
            ], 400);
        }
    }

}
