<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Generic;
use App\Models\Indication;
use Illuminate\Http\Request;
use App\Traits\LogExceptions;
use Yajra\DataTables\DataTables;

class IndicationController extends Controller
{
    use LogExceptions;
   

    

    public function indication_detail(Request $request, $id){
        // 
        try{  
            
            
            $indication = Indication::where('indication_id', $id)->first();
            
            if ($request->ajax()) {

                $data = Generic::whereHas('indications', function($query) use ($id) {
                    $query->where('indication_id', $id);
                });    
                
                return DataTables::of($data)->make(true);
            }
            // dd("asdasdasasas");
            return view('frontend.indication-detail')->with(compact('id', 'indication'));
     

        } catch (\Exception $ex) {
                
            $this->logException($ex, \Route::currentRouteName(), __METHOD__);
            
        }
    }

    public function indication_alphabetically(Request $request, $start_letter){
        try{ 
            
            if ($request->ajax()) {
                $data = Indication::where('indication_name', 'like', $request->start_letter.'%') 
                ->where('indication_is_active',1)
                ->orderBy('indication_id', 'DESC')
                ->get();                
                return DataTables::of($data)->make(true);
            }
            // dd("asdasdasasas");
            return view('frontend.indication-alphabetically')->with(compact('start_letter'));
     
        } catch (\Exception $ex) {
                
            $this->logException($ex, \Route::currentRouteName(), __METHOD__);
            
        }
    }
}
