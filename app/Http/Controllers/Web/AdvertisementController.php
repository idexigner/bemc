<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\AdvertisementPosition;
use Illuminate\Http\Request;
use App\Traits\LogExceptions;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;


class AdvertisementController extends Controller
{
    use LogExceptions;

    
    // public function index($address_category='')
    // {
       
    //     return view('frontend.address')->with(compact('address_category'));
    // }

    public function get_home_advertisement(Request $request){
        try{

            $data['home_product_slider'] = $this->get_advertisement_slider("Home Page Product Slider Advertisement", 10);
            $data['home_advert_container_top'] = $this->get_advertisement_slider("Home Page Container Top Advertisement", 1);
            $data['home_page_middle_side'] = $this->get_advertisement_slider("Home Page middle Side", 3);
            $data['home_advert_container_mid'] = $this->get_advertisement_slider("Home Page Container Mid Advertisement", 1);

            // $data = "asd";
            return response()->json([
                'message' => 'Get Advertisement', 
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
    public function get_page_advertisement(Request $request){
        try{

            // $advertisements = $this->get_advertisements_page([
            //     "Doctor Page Sidebar Advertisement",
            //     "Doctor Page Top Left Advertisement",
            //     "Doctor Page Top Right Advertisement",
            //     "Doctor Page Bottom Advertisement"
            // ]);
            // // dd("asd");

            // $data['doctor_sidebar_advert'] = $advertisements["Doctor Page Sidebar Advertisement"] ?? null;
            // $data['doctor_advert_top_left'] = $advertisements["Doctor Page Top Left Advertisement"] ?? null;
            // $data['doctor_advert_top_right'] = $advertisements["Doctor Page Top Right Advertisement"] ?? null;
            // $data['doctor_advert_bottom'] = $advertisements["Doctor Page Bottom Advertisement"] ?? null;


            $data['sidebar_advert'] = $this->get_advertisement_slider($request->position[0], 1);
            $data['advert_top_left'] = $this->get_advertisement_slider($request->position[1], 1);
            $data['advert_top_right'] = $this->get_advertisement_slider($request->position[2], 1);
            $data['advert_bottom'] = $this->get_advertisement_slider($request->position[3], 1);


            $data['sidebar_advert'] = $data['sidebar_advert'][0] ?? null;
            $data['advert_top_left'] = $data['advert_top_left'][0] ?? null;
            $data['advert_top_right'] = $data['advert_top_right'][0] ?? null;
            $data['advert_bottom'] = $data['advert_bottom'][0] ?? null;
            // $data = "asd";
            return response()->json([
                'message' => 'Get Advertisement', 
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
    
    public function get_page_id_advertisement(Request $request){
        try{

       
            $data['sidebar_advert'] = $this->get_advertisement_slider_id($request->position[0], 1, $request->id, $request->condition);
            $data['advert_top_left'] = $this->get_advertisement_slider_id($request->position[1], 1, $request->id, $request->condition);
            $data['advert_top_right'] = $this->get_advertisement_slider_id($request->position[2], 1, $request->id, $request->condition);
            $data['advert_bottom'] = $this->get_advertisement_slider_id($request->position[3], 1, $request->id, $request->condition);


            $data['sidebar_advert'] = $data['sidebar_advert'][0] ?? null;
            $data['advert_top_left'] = $data['advert_top_left'][0] ?? null;
            $data['advert_top_right'] = $data['advert_top_right'][0] ?? null;
            $data['advert_bottom'] = $data['advert_bottom'][0] ?? null;
            // $data = "asd";
            return response()->json([
                'message' => 'Get Advertisement', 
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
    // public function get_herbal_advertisement(Request $request){
    //     try{

    //         $data['herbal_sidebar_advert'] = $this->get_advertisement_slider("Herbal Related Page Sidebar Advertisement", 1);
    //         $data['herbal_advert_top_left'] = $this->get_advertisement_slider("Herbal Related Page Top Left Advertisement", 1);
    //         $data['herbal_advert_top_right'] = $this->get_advertisement_slider("Herbal Related Page Top Right Advertisement", 1);
    //         $data['herbal_advert_bottom'] = $this->get_advertisement_slider("Herbal Related Page Bottom Advertisement", 1);

    //         // $data = "asd";
    //         return response()->json([
    //             'message' => 'Get Advertisement', 
    //             'data' => $data
    //         ], 200);

    //     } catch (\Exception $ex) {

    //         $this->logException($ex, \Route::currentRouteName(), __METHOD__);
    //         return response()->json([
    //                 'message' => 'Something went wrong!',
    //                 'error' => $ex,
    //                 'message' => $ex->getMessage()
    //             ], 400);
    //     }
    // }
    // public function get_journal_advertisement(Request $request){
    //     try{

    //         $data['journal_sidebar_advert'] = $this->get_advertisement_slider("Journal Page Sidebar Advertisement", 1);
    //         $data['journal_advert_top_left'] = $this->get_advertisement_slider("Journal Page Top Left Advertisement", 1);
    //         $data['journal_advert_top_right'] = $this->get_advertisement_slider("Journal Page Top Right Advertisement", 1);
    //         $data['journal_advert_bottom'] = $this->get_advertisement_slider("Journal Page Bottom Advertisement", 1);

    //         // $data = "asd";
    //         return response()->json([
    //             'message' => 'Get Advertisement', 
    //             'data' => $data
    //         ], 200);

    //     } catch (\Exception $ex) {

    //         $this->logException($ex, \Route::currentRouteName(), __METHOD__);
    //         return response()->json([
    //                 'message' => 'Something went wrong!',
    //                 'error' => $ex,
    //                 'message' => $ex->getMessage()
    //             ], 400);
    //     }
    // }

    

    public function get_advertisement_slider($position, $limit) 
    {
        $today = Carbon::today()->toDateString();
        return Advertisement::with('advertisement_position')
                ->whereHas('advertisement_position', function ($query) use ($position) {
                    $query->where('advertisement_position_name', $position);
                })
                ->where('advertisement_is_active',1)
                ->whereDate('advertisement_publish', '<=', $today)
                ->whereDate('advertisement_unpublish', '>=', $today)
                ->limit($limit ?? 1)
                ->orderBy('advertisement_id', 'desc')
                ->get();
    }
    public function get_advertisement_slider_id($position, $limit, $id, $condition) 
    {
        $today = Carbon::today()->toDateString();
        $result= Advertisement::with('advertisement_position')
                ->whereHas('advertisement_position', function ($query) use ($position) {
                    $query->where('advertisement_position_name', $position);
                })
                ->where('advertisement_is_active',1)
                ->where(function ($query) use ($id, $condition) {
                    $query->where($condition, $id)
                        ->orWhere(function ($query) use ($condition) {
                            $query->whereNull($condition)
                                ->where('advertisement_is_featured', 1);
                        });
                })
                ->whereDate('advertisement_publish', '<=', $today)
                ->whereDate('advertisement_unpublish', '>=', $today)
                ->limit($limit ?? 1)
                ->orderBy('advertisement_id', 'desc')
                ->get();

        return $result;
    }

    

    public function get_advertisements_page($positions) 
    {
        $today = Carbon::today()->toDateString();
        $advertisementIds = AdvertisementPosition::whereIn('advertisement_position_name', $positions)
            ->pluck('advertisement_position_id');
    
        $advertisements = Advertisement::with('advertisement_position')
            ->whereIn('advertisement_position', $advertisementIds)
            ->where('advertisement_is_active', 1)
            ->whereDate('advertisement_publish', '<=', $today)
            ->whereDate('advertisement_unpublish', '>=', $today)
            ->latest('advertisement_id')
            ->get();
            // dd($advertisements);
        $result = [];
        foreach ($positions as $position) {
            $result[$position] = $advertisements
                ->where('advertisement_position.advertisement_position_name', $position)
                ->first() ?? null;
        }
        dd($result);
        return $result;

    }

}