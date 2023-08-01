<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Traits\LogExceptions;
use Carbon\Carbon;


class VideoController extends Controller
{
    use LogExceptions;

    public function index(){
        return view('frontend.videos');
    }


    public function get_home_video(Request $request){
        try{
          
            $data = Video::select('*')               
                ->where('video_is_featured', 1)
                ->where('video_is_active', 1)
                ->orderBy('video_id', 'DESC')
                ->limit(10)
                ->get();      

            return response()->json([
                'message' => 'Get Video', 
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

    public function get_videos(Request $request){
        try{
            $today = Carbon::today()->toDateString();
            $data = Video::
            where('video_is_active', 1)
            ->orderBy('video_id', 'DESC');
            // ->whereDate('news_publish_date', '<=', $today)
            // ->whereDate('news_unpublish_date', '>=', $today);

            $data = $data->paginate(10)->appends(request()->query());

            return response()->json([
                'message' => 'Get All Videos', 
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

}
