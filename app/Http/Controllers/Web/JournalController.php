<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Journal;
use Illuminate\Http\Request;
use App\Traits\LogExceptions;


class JournalController extends Controller
{
    public function index($category){
        return view('frontend.journal')->with(['category'=> $category]);
    }

    public function get_list($category)
    {
        try{
            // $today = Carbon::today()->toDateString();
            $data = Journal::select('*')
                ->where('journal_category', $category)
                ->where('journal_is_active', 1)               
                ->get();      

            return response()->json([
                'message' => 'Get Journal', 
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
