<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Traits\LogExceptions;

class CityController extends Controller
{
    use LogExceptions;
    public function index(){
        try{            
            $data = City::where('city_is_active', 1)->get();
          
            return response()->json([
                'message' => 'Get Active City', 
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
