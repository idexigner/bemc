<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Traits\LogExceptions;

class DoctorController extends Controller
{
    use LogExceptions;

    public function index()
    {
       
        return view('frontend.doctor');
    }

    public function get_home_doctor(Request $request){
        try{

            $data = Doctor::with('specializations')
            // select('doctor_id', 'doctor_name', 'doctor_specialization', 'doctor_image')
                ->where('doctor_is_active', 1)
                ->where('doctor_is_featured',1)
                ->limit(3)
                ->orderBy('doctor_id', 'DESC')
                ->get();      

            return response()->json([
                'message' => 'Get Doctor', 
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

    public function get_doctor(Request $request){
        try{

            // $data = Doctor::with('specializations')
            // ->where('doctor_is_active', 1);
        
            // if ($request->has('specialization_id')) {
            //     $data = $data->where('specialization_mapping_specialization_id', $request->specialization_id);
            // }
            
            // if ($request->has('country_id')) {
            //     $data = $data->where('doctor_country_id', $request->country_id);
            // }
            
            // if ($request->has('city_id')) {
            //     $data = $data->where('doctor_city_id', $request->city_id);
            // }
            
            // $data = $data->paginate(10)
            //     ->appends(request()->query());

            
            $data = Doctor::with('specializations','country', 'state', 'city')
            ->join('specialization_doctor_mapping', 'specialization_doctor_mapping.specialization_mapping_doctor_id', '=', 'doctor.doctor_id')
            ->where('doctor_is_active', 1);
        
            if ($request->has('specialization_id')) {
           
                $data = $data->where('specialization_doctor_mapping.specialization_mapping_specialization_id', $request->specialization_id);
            }
                        
            if ($request->has('country_id')) {
                $data = $data->where('doctor_country_id', $request->country_id);
            }
                        
            if ($request->has('city_id')) {
                $data = $data->where('doctor_city_id', $request->city_id);
            }

            if($request->has('gender_id')){
                $data = $data->where('doctor_gender', $request->gender_id);
            }
            $data = $data->orderBy('doctor_id', 'DESC');
            // $data = $data->paginate(10)->appends(request()->query());
            $data = $data->select('doctor.*')->distinct()->paginate(10)->appends(request()->query());


            
            return response()->json([
                'message' => 'Get All Doctors', 
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
