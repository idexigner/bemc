<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Artisan;


// Admin routes
use App\Http\Controllers\Admin\GenericController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DosageFormController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\JournalController;
use App\Http\Controllers\Admin\ManufacturerController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PacksizeController;
use App\Http\Controllers\Admin\SpecialReportController;
use App\Http\Controllers\Admin\StrengthController;
use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\AddressCategoryController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\AdvertisementPositionController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\IndicationController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\MigrationLiveController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\Web\AddressController as WebAddressController;
use App\Http\Controllers\Web\AdvertisementController as WebAdvertisementController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\BrandController as WebBrandController;
use App\Http\Controllers\Web\CityController as WebCityController;
use App\Http\Controllers\Web\CountryController as WebCountryController;
use App\Http\Controllers\Web\DoctorController as WebDoctorController;
use App\Http\Controllers\Web\JobController as WebJobController;
use App\Http\Controllers\Web\JournalController as WebJournalController;
use App\Http\Controllers\Web\NewsController as WebNewsController;
use App\Http\Controllers\Web\SpecializationController as WebSpecializationController;
use App\Http\Controllers\Web\SpecialReportController as WebSpecialReportController;
use App\Http\Controllers\Web\VideoController as WebVideoController;
use App\Http\Controllers\Web\GenericController as WebGenericController;
use App\Http\Controllers\Web\IndicationController as WebIndicationController;
use App\Http\Controllers\Web\ManufacturerController as WebManufacturerController;







use Illuminate\Support\Facades\DB;










/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index'])->name('home');

    // Route::get('/login',[AuthController::class,'index'])->name('login');
    Route::get('/login', [AuthController::class,'index'])->name('login_page');

Route::group(['middleware'=>'guest'],function(){
    Route::get('/adminpanel',[AuthController::class,'index']);
    // ->middleware('throttle:2,1')
    Route::post('authenticate',[AuthController::class,'authenticate'])->name('authenticate');
    // ->middleware('throttle:2,1')
    Route::get('register',[AuthController::class,'register_view']);
    Route::post('register',[AuthController::class,'register'])->name('register');
});



Route::group(['middleware'=>'auth'],function(){
    // Route::get('home',[AuthController::class,'home'])->name('home');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});



    // Route::get('/admin/generic', [GenericController::class, 'index'])->name('generic.index');
    // Route::post('/admin/generic/store', [GenericController::class, 'store'])->name('generic.store');
    // Route::put('/admin/generic/update', [GenericController::class, 'update'])->name('generic.update');
    // Route::get('/admin/generic/edit/{id}', [GenericController::class, 'edit'])->name('generic.edit');
    // Route::delete('/admin/generic/destroy/{id}', [GenericController::class, 'destroy'])->name('generic.destroy');

Route::prefix('/admin')->middleware(['auth'])->group(function(){

    
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/profile_update', [HomeController::class, 'profile_update'])->name('profile_update');

    
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // Generic Controller
    Route::prefix('/generic')->name('generic.')->group(function(){
        Route::get('/', [GenericController::class, 'index'])->name('index');
        Route::get('/list', [GenericController::class, 'list'])->name('list');
        Route::post('/store', [GenericController::class, 'store'])->name('store');
        Route::put('/update', [GenericController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [GenericController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [GenericController::class, 'destroy'])->name('destroy');
        
        Route::post('/indication/store', [GenericController::class, 'store_indication'])->name('indication.store');
        Route::get('/indication/fetch', [GenericController::class, 'fetch_indication'])->name('indication.fetch');

    });


    //Brand Controller
    Route::prefix('/brand')->name('brand.')->group(function(){
        Route::get('/', [BrandController::class, 'index'])->name('index');
        Route::get('/list', [BrandController::class, 'list'])->name('list');
        Route::post('/store', [BrandController::class, 'store'])->name('store');
        Route::post('/update', [BrandController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [BrandController::class, 'destroy'])->name('destroy');
    });

    // Manufacturer Controller
    Route::prefix('/manufacturer')->name('manufacturer.')->group(function(){
        Route::get('/', [ManufacturerController::class, 'index'])->name('index');
        Route::get('/list', [ManufacturerController::class, 'list'])->name('list');
        Route::post('/store', [ManufacturerController::class, 'store'])->name('store');
        Route::put('/update', [ManufacturerController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [ManufacturerController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [ManufacturerController::class, 'destroy'])->name('destroy');
    });

    // DosageForm Controller
    Route::prefix('/dosageform')->name('dosageform.')->group(function(){
        Route::get('/', [DosageFormController::class, 'index'])->name('index');
        Route::get('/list', [DosageFormController::class, 'list'])->name('list');
        Route::post('/store', [DosageFormController::class, 'store'])->name('store');
        Route::put('/update', [DosageFormController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [DosageFormController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [DosageFormController::class, 'destroy'])->name('destroy');
    });

    // Strength Controller
    Route::prefix('/strength')->name('strength.')->group(function(){
        Route::get('/', [StrengthController::class, 'index'])->name('index');
        Route::get('/list', [StrengthController::class, 'list'])->name('list');
        Route::post('/store', [StrengthController::class, 'store'])->name('store');
        Route::put('/update', [StrengthController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [StrengthController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [StrengthController::class, 'destroy'])->name('destroy');
    });

    // Packsize Controller
    Route::prefix('/packsize')->name('packsize.')->group(function(){
        Route::get('/', [PacksizeController::class, 'index'])->name('index');
        Route::get('/list', [PacksizeController::class, 'list'])->name('list');
        Route::post('/store', [PacksizeController::class, 'store'])->name('store');
        Route::put('/update', [PacksizeController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [PacksizeController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [PacksizeController::class, 'destroy'])->name('destroy');
    });

    // Indication Controller
    Route::prefix('/indication')->name('indication.')->group(function(){
        Route::get('/', [IndicationController::class, 'index'])->name('index');
        Route::get('/list', [IndicationController::class, 'list'])->name('list');

        Route::post('/store', [IndicationController::class, 'store'])->name('store');
        Route::put('/update', [IndicationController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [IndicationController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [IndicationController::class, 'destroy'])->name('destroy');
    });

     // Doctor Controller
     Route::prefix('/doctor')->name('doctor.')->group(function(){
        Route::get('/', [DoctorController::class, 'index'])->name('index');
        Route::post('/store', [DoctorController::class, 'store'])->name('store');
        Route::post('/update', [DoctorController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [DoctorController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [DoctorController::class, 'destroy'])->name('destroy');
   
        Route::post('/specialization/store', [DoctorController::class, 'store_specialization'])->name('specialization.store');
        Route::get('/specialization/fetch', [DoctorController::class, 'fetch_specialization'])->name('specialization.fetch');

   
    });

    // Advertisement Controller
    Route::prefix('/advertisement')->name('advertisement.')->group(function(){
        Route::get('/', [AdvertisementController::class, 'index'])->name('index');
        Route::post('/store', [AdvertisementController::class, 'store'])->name('store');
        Route::post('/update', [AdvertisementController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [AdvertisementController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [AdvertisementController::class, 'destroy'])->name('destroy');
    });

    // Job Controller
    Route::prefix('/job')->name('job.')->group(function(){
        Route::get('/', [JobController::class, 'index'])->name('index');
        Route::post('/store', [JobController::class, 'store'])->name('store');
        Route::post('/update', [JobController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [JobController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [JobController::class, 'destroy'])->name('destroy');
        Route::delete('/destroy_all', [JobController::class, 'destroy_all'])->name('destroy_all');

        
    });

    // Journal Controller
    Route::prefix('/journal')->name('journal.')->group(function(){
        Route::get('/', [JournalController::class, 'index'])->name('index');
        Route::post('/store', [JournalController::class, 'store'])->name('store');
        Route::post('/update', [JournalController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [JournalController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [JournalController::class, 'destroy'])->name('destroy');
    });

     // News Controller
     Route::prefix('/news')->name('news.')->group(function(){
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::post('/store', [NewsController::class, 'store'])->name('store');
        Route::post('/update', [NewsController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [NewsController::class, 'destroy'])->name('destroy');
    });

     // Special Report Controller
     Route::prefix('/special_report')->name('special_report.')->group(function(){
        Route::get('/', [SpecialReportController::class, 'index'])->name('index');
        Route::post('/store', [SpecialReportController::class, 'store'])->name('store');
        Route::post('/update', [SpecialReportController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [SpecialReportController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [SpecialReportController::class, 'destroy'])->name('destroy');
    });

    // Address Controller
    Route::prefix('/address')->name('address.')->group(function(){
        Route::get('/', [AddressController::class, 'index'])->name('index');
        Route::post('/store', [AddressController::class, 'store'])->name('store');
        Route::post('/update', [AddressController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [AddressController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [AddressController::class, 'destroy'])->name('destroy');
        Route::post('/category/store', [AddressController::class, 'store_category'])->name('category.store');
        Route::get('/category/fetch', [AddressController::class, 'fetch_category'])->name('category.fetch');

    });

    // Video Controller
    Route::prefix('/video')->name('video.')->group(function(){
        Route::get('/', [VideoController::class, 'index'])->name('index');
        Route::post('/store', [VideoController::class, 'store'])->name('store');
        Route::post('/update', [VideoController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [VideoController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [VideoController::class, 'destroy'])->name('destroy');
    });

    // User Controller
    Route::prefix('/user')->name('user.')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::put('/update', [UserController::class, 'update'])->name('update');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::get('/scroller', [SiteSettingController::class, 'scroller'])->name('scroller');
    Route::post('/scroller/update', [SiteSettingController::class, 'scroller_update'])->name('scroller.update');

    //Generic Controller Routes
    // Route::prefix('/generic')->name('generic.')->group(function () {
    //     Route::get('/', [GenericController::class, 'index'])->name('index');
    //     Route::post('/store', [GenericController::class, 'store'])->name('store');
    //     Route::put('/update/{id}', [GenericController::class, 'update'])->name('update');
    // });



    Route::prefix('/setting')->name('setting.')->group(function(){

        // Country Controller
        Route::prefix('/country')->name('country.')->group(function(){
            Route::get('/', [CountryController::class, 'index'])->name('index');
            Route::post('/store', [CountryController::class, 'store'])->name('store');
            Route::put('/update', [CountryController::class, 'update'])->name('update');
            Route::get('/edit/{id}', [CountryController::class, 'edit'])->name('edit');
            Route::delete('/destroy/{id}', [CountryController::class, 'destroy'])->name('destroy');
        });

        // State Controller
        Route::prefix('/state')->name('state.')->group(function(){
            Route::get('/', [StateController::class, 'index'])->name('index');
            Route::post('/store', [StateController::class, 'store'])->name('store');
            Route::put('/update', [StateController::class, 'update'])->name('update');
            Route::get('/edit/{id}', [StateController::class, 'edit'])->name('edit');
            Route::delete('/destroy/{id}', [StateController::class, 'destroy'])->name('destroy');
            Route::get('/fetch_state_by_country/{id}', [StateController::class, 'fetch_state_by_country'])->name('fetch_country');

            
        });

        // City Controller
        Route::prefix('/city')->name('city.')->group(function(){
            Route::get('/', [CityController::class, 'index'])->name('index');
            Route::post('/store', [CityController::class, 'store'])->name('store');
            Route::put('/update', [CityController::class, 'update'])->name('update');
            Route::get('/edit/{id}', [CityController::class, 'edit'])->name('edit');
            Route::delete('/destroy/{id}', [CityController::class, 'destroy'])->name('destroy');
            Route::get('/fetch_city_by_state/{id}', [CityController::class, 'fetch_city_by_state'])->name('fetch_city');

        });

        // Address Category Controller
        Route::prefix('/address/category')->name('address.category.')->group(function(){
            Route::get('/', [AddressCategoryController::class, 'index'])->name('index');
            Route::post('/store', [AddressCategoryController::class, 'store'])->name('store');
            Route::put('/update', [AddressCategoryController::class, 'update'])->name('update');
            Route::get('/edit/{id}', [AddressCategoryController::class, 'edit'])->name('edit');
            Route::delete('/destroy/{id}', [AddressCategoryController::class, 'destroy'])->name('destroy');
        });

         // Location Controller
         Route::prefix('/location')->name('location.')->group(function(){
            Route::get('/', [LocationController::class, 'index'])->name('index');
            Route::post('/store', [LocationController::class, 'store'])->name('store');
            Route::put('/update', [LocationController::class, 'update'])->name('update');
            Route::get('/edit/{id}', [LocationController::class, 'edit'])->name('edit');
            Route::delete('/destroy/{id}', [LocationController::class, 'destroy'])->name('destroy');
        });

        // Advertisement Position Controller
        Route::prefix('/advertisement/position')->name('advertisement.position.')->group(function(){
            Route::get('/', [AdvertisementPositionController::class, 'index'])->name('index');
            Route::post('/store', [AdvertisementPositionController::class, 'store'])->name('store');
            Route::put('/update', [AdvertisementPositionController::class, 'update'])->name('update');
            Route::get('/edit/{id}', [AdvertisementPositionController::class, 'edit'])->name('edit');
            Route::delete('/destroy/{id}', [AdvertisementPositionController::class, 'destroy'])->name('destroy');
            Route::get('/fetch', [AdvertisementPositionController::class, 'fetch'])->name('fetch');

        });

          // Specialization Controller
        Route::prefix('/specialization')->name('specialization.')->group(function(){
            Route::get('/', [SpecializationController::class, 'index'])->name('index');
            Route::get('/list', [SpecializationController::class, 'list'])->name('list');

            Route::post('/store', [SpecializationController::class, 'store'])->name('store');
            Route::put('/update', [SpecializationController::class, 'update'])->name('update');
            Route::get('/edit/{id}', [SpecializationController::class, 'edit'])->name('edit');
            Route::delete('/destroy/{id}', [SpecializationController::class, 'destroy'])->name('destroy');
        });

    });
    


});


Route::get('/get_brand', [WebBrandController::class, 'get_brand'])->name('web_get_brand');
Route::get('/get_highlight_brand', [WebBrandController::class, 'get_highlight_brand'])->name('web_get_highlight_brand');


Route::get('/get_home_doctor', [WebDoctorController::class, 'get_home_doctor'])->name('web_get_home_doctor');
Route::get('/get_home_special_report', [WebSpecialReportController::class, 'get_home_special_report'])->name('web_get_home_special_report');
Route::get('/get_home_job', [WebJobController::class, 'get_home_job'])->name('web_get_home_job');
Route::get('/get_home_news', [WebNewsController::class, 'get_home_news'])->name('web_get_home_news');
Route::get('/get_home_video', [WebVideoController::class, 'get_home_video'])->name('web_get_home_video');


Route::get('/doctor', [WebDoctorController::class, 'index'])->name('web_page_doctor');


Route::get('/get_city', [WebCityController::class, 'index'])->name('web_city');
Route::get('/get_country', [WebCountryController::class, 'index'])->name('web_country');
Route::get('/get_specialization', [WebSpecializationController::class, 'index'])->name('web_specialization');

Route::get('/get_doctor', [WebDoctorController::class, 'get_doctor'])->name('web_get_doctor');


Route::get('/herbal', [WebBrandController::class, 'herbal_list'])->name('web_get_herbal_list');

Route::get('/journal/{category}', [WebJournalController::class, 'index'])->name('web_get_journal');
Route::get('/journal_list/{category}', [WebJournalController::class, 'get_list'])->name('web_get_journal_list');


Route::get('/about',[HomeController::class,'about'])->name('web_page_about');
Route::get('/disclaimer',[HomeController::class,'disclaimer'])->name('web_page_disclaimer');
Route::get('/privacy_policy',[HomeController::class,'privacy_policy'])->name('web_page_privacy_policy');

Route::get('/brand_detail/{id}',[WebBrandController::class,'brand_detail'])->name('web_page_brand_detail');
Route::get('/get_brand_detail/{id}',[WebBrandController::class,'get_brand_detail'])->name('web_page_get_brand_detail');

Route::get('/generic_detail/{id}',[WebGenericController::class,'generic_detail'])->name('web_page_generic_detail');
Route::get('/get_generic_detail/{id}',[WebGenericController::class,'get_generic_detail'])->name('web_page_get_generic_detail');


Route::get('/brand_information/{id}',[WebBrandController::class,'brand_information'])->name('web_page_brand_information');
Route::get('/get_brand_information/{id}',[WebBrandController::class,'get_brand_information'])->name('web_page_get_brand_information');


Route::get('/manufacturer_detail/{id?}',[WebManufacturerController::class,'manufacturer_detail'])->name('web_page_manufacturer_detail');
// Route::get('/get_manufacturer_detail/{id}',[WebGenericController::class,'get_manufacturer_detail'])->name('web_page_get_manufacturer_detail');

Route::get('/brand_all/{id?}',[WebBrandController::class,'brand_all'])->name('web_page_brand_all');

Route::get('/search',[HomeController::class,'search'])->name('search');
Route::get('/search_start',[HomeController::class,'search_start'])->name('search_start');

Route::get('/indication_detail/{id}',[WebIndicationController::class,'indication_detail'])->name('web_page_indication_detail');
// Route::get('/get_indication_detail/{id}',[WebIndicationController::class,'get_indication_detail'])->name('web_page_get_indication_detail');
Route::get('/search/brand/{id}',[WebBrandController::class,'brand_alphabetically'])->name('web_page_brand_alphabetically');
Route::get('/search/generic/{id}',[WebGenericController::class,'generic_alphabetically'])->name('web_page_generic_alphabetically');
Route::get('/search/indication/{id}',[WebIndicationController::class,'indication_alphabetically'])->name('web_page_indication_alphabetically');
Route::get('/search/manufacturer/{id}',[WebManufacturerController::class,'manufacturer_alphabetically'])->name('web_page_manufacturer_alphabetically');

Route::get('/address/{id?}',[WebAddressController::class,'index'])->name('web_page_address');
Route::get('/get_address',[WebAddressController::class,'get_address'])->name('web_page_get_address');
Route::get('/get_address_category',[WebAddressController::class,'get_address_category'])->name('web_get_address_category');

Route::get('/special_report', [WebSpecialReportController::class, 'index'])->name('web_special_report');

Route::get('/get_special_report', [WebSpecialReportController::class, 'get_special_report'])->name('web_get_special_report');

Route::get('/special_report_detail/{id}',[WebSpecialReportController::class,'special_report_detail'])->name('web_page_special_report_detail');
Route::get('/get_special_report_detail/{id}',[WebSpecialReportController::class,'get_special_report_detail'])->name('web_page_get_special_report_detail');

Route::get('/job', [WebJobController::class, 'index'])->name('web_get_job');

Route::get('/job_detail/{id}',[WebJobController::class,'job_detail'])->name('web_page_job_detail');
Route::get('/get_job_detail/{id}',[WebJobController::class,'get_job_detail'])->name('web_page_get_job_detail');


Route::get('/news', [WebNewsController::class, 'index'])->name('web_news');

Route::get('/get_news', [WebNewsController::class, 'get_news'])->name('web_get_news');

Route::get('/news_detail/{id}',[WebNewsController::class,'news_detail'])->name('web_page_news_detail');
Route::get('/get_news_detail/{id}',[WebNewsController::class,'get_news_detail'])->name('web_page_get_news_detail');


Route::get('/videos', [WebVideoController::class, 'index'])->name('web_videos');
Route::get('/get_videos', [WebVideoController::class, 'get_videos'])->name('web_get_videos');
Route::get('/get_count', [HomeController::class, 'get_count'])->name('web_get_count');


Route::get('/get_home_advertisement', [WebAdvertisementController::class, 'get_home_advertisement'])->name('get_home_advertisement');
Route::get('/get_page_advertisement', [WebAdvertisementController::class, 'get_page_advertisement'])->name('get_page_advertisement');
Route::get('/get_page_id_advertisement', [WebAdvertisementController::class, 'get_page_id_advertisement'])->name('get_page_id_advertisement');


Route::get('/get_herbal_advertisement', [WebAdvertisementController::class, 'get_herbal_advertisement'])->name('get_herbal_advertisement');
Route::get('/get_journal_advertisement', [WebAdvertisementController::class, 'get_journal_advertisement'])->name('get_journal_advertisement');

// Artisan Routes

Route::get('route-cache', function () {
    Artisan::call('route:cache');
    dd("config route cache executed");
});
Route::get('route-clear', function () {
    Artisan::call('route:clear');
    dd("config route clear executed");
});
Route::get('config-cache', function () {
    Artisan::call('config:cache');
    dd("config cache executed");
});
Route::get('cache-clear', function () {
    Artisan::call('cache:clear');
    dd("Cache is cleared");
});
Route::get('config-clear', function () {
    Artisan::call('config:clear');
    dd("config clear executed");
});
Route::get('view-clear', function () {
    Artisan::call('view:clear');
    dd("routes are cleared");
});
Route::get('storage-link', function () {
    Artisan::call('storage:link');
    dd("storage link created");
});

Route::get('clear-all', function () {
    Artisan::call('route:cache');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('storage:link');
    dd("All Clear");
});

Route::get('/migrate', function () {
    Artisan::call('migrate');
    return 'Database migration complete!';
});

Route::get('/optimize', function () {
    Artisan::call('optimize');
    return 'Application optimized!';
});




   Route::get('/migrate_live', [MigrationLiveController::class, 'index']);

