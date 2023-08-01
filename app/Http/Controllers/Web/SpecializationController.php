<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Traits\LogExceptions;

class SpecializationController extends Controller
{
    use LogExceptions;
    public function index(){
        try{            
            $data = Specialization::where('specialization_is_active', 1)->get();
          
            return response()->json([
                'message' => 'Get Active Specialization', 
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
