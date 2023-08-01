<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use App\Traits\LogExceptions;
use Carbon\Carbon;

class NewsController extends Controller
{
    use LogExceptions;
    public function index(){
        return view('frontend.news');
    }
    public function get_home_news(Request $request){
        try{
            $today = Carbon::today()->toDateString();
            $data = News::select('*')                
                ->where('news_is_active', 1)
                ->whereDate('news_publish_date', '<=', $today)
                ->whereDate('news_unpublish_date', '>=', $today)
                ->orderBy('news_id', 'DESC')
                ->limit($request->limit)
                ->get();      

            return response()->json([
                'message' => 'Get News', 
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

    public function get_news(Request $request){
        try{
            $today = Carbon::today()->toDateString();
            $data = News::
            where('news_is_active', 1)
            ->whereDate('news_publish_date', '<=', $today)
            ->whereDate('news_unpublish_date', '>=', $today);

            $data = $data->paginate(10)->appends(request()->query());

            return response()->json([
                'message' => 'Get All News', 
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

    public function news_detail($id){
        return view('frontend.news-detail')->with(compact('id'));
    }

    public function get_news_detail($id){
        try{  
            
            $data = News::where('news_id',$id)->first();

            // dd($data);
            return response()->json([
                'message' => 'Get News Detail', 
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

}
