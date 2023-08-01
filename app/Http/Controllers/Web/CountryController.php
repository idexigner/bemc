<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Traits\LogExceptions;

class CountryController extends Controller
{
    use LogExceptions;
    public function index(){
        try{            
            $data = Country::where('country_is_active', 1)->get();
          
            return response()->json([
                'message' => 'Get Active Country', 
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
