<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Generic;
use App\Models\Indication;
use App\Models\IndicationMapping;

use App\Models\Doctor;
use App\Models\Specialization;
use App\Models\SpecializationMapping;





class MigrationLiveController extends Controller
{
    public function index(){

        // $this->migrate_generic();
        // $this->migrate_dosageform();
        // $this->migrate_strength();
        // $this->migrate_packsize();
        // $this->migrate_manufacturer();
        // $this->migrate_brand();
        // $this->migrate_location();
        // $this->migrate_country();
        // $this->migrate_state();
        // $this->migrate_city();
        // $this->migrate_doctor();
        // $this->migrate_job();
        // $this->migrate_news();
        // $this->migrate_journal();
        // $this->migrate_address();
        // $this->migrate_address_category();
        // $this->migrate_special_report();
        // $this->migrate_advertisement();
        // $this->migrate_advertisement_position();

        // $this->convert_indication_tags();

        $this->convert_specialization_tags();

    }

    function convert_specialization_tags(){
        try{
            ini_set('max_execution_time', 3000); 
            $offset = 24188;
            $limit = 50;

            do {
                // Get all the doctor records
                $doctors = Doctor::offset($offset)->limit($limit)->get();
                $id = [];
                foreach ($doctors as $doctor) {
                    $temp = [
                        'specialization_mapping_doctor_id' => $doctor->doctor_id,
                        'specialization_mapping_specialization_id' => 1,
                        'specialization_mapping_created_by' => 1,
                        'specialization_mapping_updated_by' => 1,
                    ];
                    array_push($id, $temp);
                }
// dd($id);
                SpecializationMapping::insert($id);
                // Loop through the doctors and process their specialization tags
                // foreach ($doctors as $doctor) {
                //     // Get the specialization tags for this doctor
                //     $tags = explode(',', $doctor->doctor_specialization);
                

                //     // Loop through the tags and create or update the Indication records
                //     foreach ($tags as $tag) {
                //         $specialization = Specialization::where('specialization_name', $tag)->first();

                //         // If the specialization doesn't exist, create it
                //         if (!$specialization) {
                //             $specialization = Specialization::create([
                //                 'specialization_name' => $tag,
                //             ]);
                //         }

                    

                //         // Create or update the IndicationMapping record
                //         $mapping = SpecializationMapping::updateOrCreate([
                //             'specialization_mapping_doctor_id' => $doctor->doctor_id,
                //             'specialization_mapping_specialization_id' => $specialization->specialization_id,
                //         ]);
                //     }
                // }
                    $offset += $limit;
                    // break;
                    
            } while ($doctors->count() > 0);
        }catch(Exception $ex){
                    dd($ex->getMessage());
                }

        
        
    }

    function convert_indication_tags(){
        try{
            $offset = 773;
            $limit = 50;

            do {
                // Get all the generic records
                $generics = Generic::offset($offset)->limit($limit)->get();

                // Loop through the generics and process their indication tags
                foreach ($generics as $generic) {
                    // Get the indication tags for this generic
                    $tags = explode(',', $generic->generic_indication_tags);
                

                    // Loop through the tags and create or update the Indication records
                    foreach ($tags as $tag) {
                        $indication = Indication::where('indication_name', $tag)->first();

                        // If the indication doesn't exist, create it
                        if (!$indication) {
                            $indication = Indication::create([
                                'indication_name' => $tag,
                            ]);
                        }

                    

                        // Create or update the IndicationMapping record
                        $mapping = IndicationMapping::updateOrCreate([
                            'indication_mapping_generic_id' => $generic->generic_id,
                            'indication_mapping_indication_id' => $indication->indication_id,
                        ]);
                    }
                }
                    $offset += $limit;
                    
            } while ($generics->count() > 0);
        }catch(Exception $ex){
                    dd($ex->getMessage());
                }

        
        
    }


    // function migrate_advertisement(){
    //     try{
    //         DB::connection('mysql')->table('advertisement')->truncate();
    //                 // Get the data from the source table
    //                 $advertisements = DB::connection('db_live')->select('SELECT * FROM mims_advertisementinformation');

    //                 // Map the columns to match the destination table
    //                 $mappedData = array_map(function ($advertisement) {
    //                     return [
    //                         'advertisement_id' => $advertisement->ID,
    //                         'advertisement_organization' => $advertisement->Organization,
    //                         'advertisement_title' => $advertisement->Title,
    //                         'advertisement_name' => $advertisement->BodyText,
    //                         'advertisement_link' => $advertisement->LinkURL,
    //                         'advertisement_name' => $advertisement->ImagePath,
    //                         'advertisement_name' => $advertisement->PublishDate,
    //                         'advertisement_name' => $advertisement->UnpublishedDate,
    //                         'advertisement_name' => $advertisement->AdvertisementPositionID,
    //                         'advertisement_name' => $advertisement->ApplicableFor,
    //                         'advertisement_is_active' => 1,
    //                         'advertisement_is_deleted' => $advertisement->IsDeleted,
    //                         'advertisement_created_by' => 1,
    //                         'advertisement_created_at' => $advertisement->LastUpdate,
    //                         'advertisement_updated_by' => 1,
    //                         'advertisement_updated_at' => $advertisement->LastUpdate,
    //                     ];
    //                 }, $advertisements);

    //         // Insert the data into the destination table
    //         DB::connection('mysql')->table('advertisement')->insert($mappedData);
    //     }catch(Exception $ex){
    //         dd($ex->getMessage());
    //     }
    // }

    function migrate_advertisement_position(){
        try{
            DB::connection('mysql')->table('advertisement_position')->truncate();
                    // Get the data from the source table
                    $advertisement_positions = DB::connection('db_live')->select('SELECT * FROM mims_advertisementpositioninformation');

                    // Map the columns to match the destination table
                    $mappedData = array_map(function ($advertisement_position) {
                        return [
                            'advertisement_position_id' => $advertisement_position->ID,
                            'advertisement_position_name' => $advertisement_position->Name,
                            'advertisement_position_class_name' => $advertisement_position->ClassName,
                            'advertisement_position_width' => $advertisement_position->ImageWidth,
                            'advertisement_position_height' => $advertisement_position->ImageHeight,
                            'advertisement_position_number' => $advertisement_position->NumberOfAdvertisement,
                            'advertisement_position_interval' => $advertisement_position->Interval,
                            'advertisement_position_price' => $advertisement_position->PriceInBDT,
                            'advertisement_position_is_active' => 1,
                            'advertisement_position_is_deleted' => $advertisement_position->IsDeleted,
                            'advertisement_position_created_by' => 1,
                            'advertisement_position_created_at' => $advertisement_position->LastUpdate,
                            'advertisement_position_updated_by' => 1,
                            'advertisement_position_updated_at' => $advertisement_position->LastUpdate,
                        ];
                    }, $advertisement_positions);

            // Insert the data into the destination table
            DB::connection('mysql')->table('advertisement_position')->insert($mappedData);
        }catch(Exception $ex){
            dd($ex->getMessage());
        }
    }

    function migrate_special_report(){
        try{
            DB::connection('mysql')->table('special_report')->truncate();
                    // Get the data from the source table
                    $special_reports = DB::connection('db_live')->select('SELECT * FROM mims_specialreports');

                    // Map the columns to match the destination table
                    $mappedData = array_map(function ($special_report) {
                        return [
                            'special_report_id' => $special_report->ID,
                            'special_report_title' => $special_report->Title,
                            'special_report_description' => $special_report->Description,
                            'special_report_link_address' => $special_report->LinkAddress,
                            'special_report_image' => $special_report->ImagePath,
                            'special_report_is_active' => 1,
                            'special_report_is_deleted' => $special_report->IsDeleted,
                            'special_report_created_by' => 1,
                            'special_report_created_at' => $special_report->LastUpdate,
                            'special_report_updated_by' => 1,
                            'special_report_updated_at' => $special_report->LastUpdate,
                        ];
                    }, $special_reports);

            // Insert the data into the destination table
            DB::connection('mysql')->table('special_report')->insert($mappedData);
        }catch(Exception $ex){
            dd($ex->getMessage());
        }
    }

    function migrate_address_category(){
        try{
            DB::connection('mysql')->table('address_category')->truncate();
                    // Get the data from the source table
                    $address_categorys = DB::connection('db_live')->select('SELECT * FROM mims_addresscategory');

                    // Map the columns to match the destination table
                    $mappedData = array_map(function ($address_category) {
                        return [
                            'address_category_id' => $address_category->ID,
                            'address_category_title' => $address_category->Name,
                            'address_category_is_active' => $address_category->IsActive,
                            'address_category_is_deleted' => $address_category->IsDeleted,
                            'address_category_created_by' => 1,
                            'address_category_created_at' => $address_category->LastUpdate,
                            'address_category_updated_by' => 1,
                            'address_category_updated_at' => $address_category->LastUpdate,
                        ];
                    }, $address_categorys);

            // Insert the data into the destination table
            DB::connection('mysql')->table('address_category')->insert($mappedData);
        }catch(Exception $ex){
            dd($ex->getMessage());
        }
    }

    function migrate_address(){
        try{
            DB::connection('mysql')->table('address')->truncate();
                    // Get the data from the source table
                    $addresss = DB::connection('db_live')->select('SELECT * FROM mims_addressinformation');

                    // Map the columns to match the destination table
                    $mappedData = array_map(function ($address) {
                        return [
                            'address_id' => $address->ID,
                            'address_category' => $address->AddressCategoryID,
                            'address_title' => $address->Name,
                            'address_detail' => $address->Address,
                            'address_contact' => $address->ContactNumber,
                            'address_is_active' => 1,
                            'address_is_deleted' => $address->IsDeleted,
                            'address_created_by' => 1,
                            'address_created_at' => $address->LastUpdate,
                            'address_updated_by' =>1,
                            'address_updated_at' => $address->LastUpdate,
                        ];
                    }, $addresss);

            // Insert the data into the destination table
            DB::connection('mysql')->table('address')->insert($mappedData);
        }catch(Exception $ex){
            dd($ex->getMessage());
        }
    }

    function migrate_journal(){
        try{
            DB::connection('mysql')->table('journal')->truncate();
                    // Get the data from the source table
                    $journals = DB::connection('db_live')->select('SELECT * FROM mims_journalinformation');

                    // Map the columns to match the destination table
                    $mappedData = array_map(function ($journal) {
                        $journal_category = $journal->JournalCategoryID;
                        if($journal_category == 1){
                            $journal_category = "Cardiovascular";
                        }else if($journal_category == 2){
                            $journal_category = "Research Method";
                        }else if($journal_category == 3){
                            $journal_category = "Resource";
                        }else if($journal_category == 4){
                            $journal_category = "Dental";
                        }else {
                            $journal_category = "Library";
                        }
                        return [
                            'journal_id' => $journal->ID,
                            'journal_title' => $journal->Title,
                            'journal_category' => $journal_category,
                            'journal_type' => $journal->JournalType,
                            'journal_image' => $journal->JournalPath,
                            'journal_is_active' => 1,
                            'journal_is_deleted' => $journal->IsDeleted,
                            'journal_created_by' => 1,
                            'journal_created_at' => $journal->LastUpdate,
                            'journal_updated_by' => 1,
                            'journal_updated_at' => $journal->LastUpdate,
                        ];
                    }, $journals);

            // Insert the data into the destination table
            DB::connection('mysql')->table('journal')->insert($mappedData);
        }catch(Exception $ex){
            dd($ex->getMessage());
        }
    }

    function migrate_news(){
        try{
            DB::connection('mysql')->table('news')->truncate();
                    // Get the data from the source table
                    $newss = DB::connection('db_live')->select('SELECT * FROM mims_newsinformation');

                    // Map the columns to match the destination table
                    $mappedData = array_map(function ($news) {
                        return [
                            'news_id' => $news->ID,
                            'news_title' => $news->Title,
                            'news_description' => $news->Description,
                            'news_image' => $news->ImagePath,
                            'news_publish_date' => $news->PublishDateTime,
                            'news_unpublish_date' => $news->UnpublishedDateTime,
                            'news_is_active' => 1,
                            'news_is_deleted' => $news->IsDeleted,
                            'news_created_by' => 1,
                            'news_created_at' => $news->LastUpdate,
                            'news_updated_by' => 1,
                            'news_updated_at' => $news->LastUpdate,
                        ];
                    }, $newss);

            // Insert the data into the destination table
            DB::connection('mysql')->table('news')->insert($mappedData);
        }catch(Exception $ex){
            dd($ex->getMessage());
        }
    }

    function migrate_job(){
        try{
         


            DB::connection('mysql')->table('job')->truncate();
            
            // Get the total count of records
            $totalCount = DB::connection('db_live')->table('mims_jobinformation')->count();

            // Set the limit and offset values
            $limit = 500;
            $offset = 0;

            // Loop through the records and migrate them in chunks
            while ($offset < $totalCount) {
                // Get the records for the current chunk
                $jobs = DB::connection('db_live')->select('SELECT * FROM mims_jobinformation LIMIT ? OFFSET ?', [$limit, $offset]);

                // Map the columns to match the destination table
                $mappedData = array_map(function ($job) {

                        $job_category = $job->JobCategory;
                        if($job_category == 1){
                            $job_category = "Pharma";
                        }else{
                            $job_category = "Medical";
                        }

                    return [
                            'job_id' => $job->ID,
                            'job_category' => $job_category,
                            'job_title' => $job->Title,
                            'job_description' => $job->Description,
                            'job_organization' => $job->Organization,
                            'job_organization_logo' => $job->OrganizationLogo,
                            'job_position' => $job->Position,
                            'job_application_deadline' => $job->ApplicationDeadline,
                            'job_salary' => (double)$job->Salary,
                            'job_educational_requirement' => $job->EducationalRequirement,
                            'job_experience_requirement' => $job->ExperienceRequirement,
                            'job_vacancy' => $job->NumberOfVacancy,
                            'job_age_limit' => $job->AgeLimit,
                            'job_location' => $job->Location,
                            'job_source' => $job->JobSource,
                            'job_type' => $job->JobType,
                            'job_employment_type' => $job->EmploymentType,
                            'job_nature' => $job->JobNature,
                            'job_application_procedure' => $job->ApplyingProcedure,
                            'job_publish_date' => $job->PublishDate,
                            'job_image' => $job->JobCircularImagePath,
                            'job_is_active' => 1,
                            'job_is_deleted' => $job->IsDeleted,
                            'job_created_by' => 1,
                            'job_created_at' => $job->LastUpdate,
                            'job_updated_by' => 1,
                            'job_updated_at' => $job->LastUpdate,
                    ];
                }, $jobs);

                // Insert the data into the destination table
                DB::connection('mysql')->table('job')->insert($mappedData);

                // Update the offset for the next chunk
                $offset += $limit;
            }
        }catch(Exception $ex){
            dd($ex->getMessage());
        }
    }

    function migrate_doctor(){
        try{
            
            DB::connection('mysql')->table('doctor')->truncate();
                   
            doctorinformation_temp
            // Get the total count of records
            $totalCount = DB::connection('db_live')->table('mims_doctorinformation')->count();

            // Set the limit and offset values
            $limit = 1000;
            $offset = 0;

            // Loop through the records and migrate them in chunks
            while ($offset < $totalCount) {
                // Get the records for the current chunk
                $doctors = DB::connection('db_live')->select('SELECT * FROM mims_doctorinformation LIMIT ? OFFSET ?', [$limit, $offset]);

                // Map the columns to match the destination table
                $mappedData = array_map(function ($doctor) {
                    return [
                        'doctor_id' => $doctor->ID,
                            'doctor_name' => $doctor->Name,
                            'doctor_email' => $doctor->email_id,
                            'doctor_specialization' => $doctor->Specialization,
                            'doctor_experience' => $doctor->experiance,
                            'doctor_achievement' => $doctor->achievement,
                            'doctor_address' => $doctor->clinic_address,
                            // 'doctor_name' => $doctor->clinic_line1,
                            // 'doctor_name' => $doctor->clinic_line2,
                            'doctor_country_id' => ($doctor->clinic_country_id != '') ? $doctor->clinic_country_id : null,
                            'doctor_state_id' => ($doctor->clinic_state_id != '') ? $doctor->clinic_state_id : null, 
                            'doctor_city_id' => ($doctor->clinic_city_id != '') ? $doctor->clinic_city_id : null,
                            'doctor_zip_code' => $doctor->clinic_zipcode,
                            'doctor_profession_degree' => $doctor->ProfessionDegree,
                            'doctor_gender' => $doctor->Gender,
                            'doctor_image' => $doctor->ImagePath,
                            'doctor_certificate' => $doctor->certificate,
                            'doctor_bio_notes' => $doctor->bio_notes,
                            // 'doctor_name' => $doctor->HomeAddressID,
                            // 'doctor_name' => $doctor->ChamberAddressID,
                            'doctor_phone_personal' => $doctor->PhoneNo,
                            'doctor_phone_clinic' => $doctor->clinic_phone,
                            // 'doctor_name' => $doctor->MobileNo1,
                            // 'doctor_name' => $doctor->MobileNo2,
                            // 'doctor_name' => $doctor->MobileNo3,
                            // 'doctor_name' => $doctor->Hotline,                            
                            'doctor_is_active' => 1,
                            'doctor_is_deleted' => $doctor->IsDeleted,
                            'doctor_created_by' => 1,
                            'doctor_created_at' => $doctor->LastUpdate,
                            'doctor_updated_by' => 1,
                            'doctor_updated_at' => $doctor->LastUpdate,
                    ];
                }, $doctors);

                // Insert the data into the destination table
                DB::connection('mysql')->table('doctor')->insert($mappedData);

                // Update the offset for the next chunk
                $offset += $limit;
            }
        }catch(Exception $ex){
            dd($ex->getMessage());
        }
    }

    function migrate_city(){
        try{
            DB::connection('mysql')->table('city')->truncate();
                    // Get the data from the source table
                    $citys = DB::connection('db_live')->select('SELECT * FROM mims_city');

                    // Map the columns to match the destination table
                    $mappedData = array_map(function ($city) {
                        return [
                            'city_id' => $city->ID,
                            'city_name' => $city->Name,
                            'city_state_id' => $city->StateID,
                            'city_is_active' => 1,
                            'city_is_deleted' => $city->IsDeleted,
                            'city_created_by' => 1,
                            'city_created_at' => $city->LastUpdate,
                            'city_updated_by' => 1,
                            'city_updated_at' => $city->LastUpdate,
                        ];
                    }, $citys);

            // Insert the data into the destination table
            DB::connection('mysql')->table('city')->insert($mappedData);
        }catch(Exception $ex){
            dd($ex->getMessage());
        }
    }

    function migrate_state(){
        try{
            DB::connection('mysql')->table('state')->truncate();
                    // Get the data from the source table
                    $states = DB::connection('db_live')->select('SELECT * FROM mims_state');

                    // Map the columns to match the destination table
                    $mappedData = array_map(function ($state) {
                        return [
                            'state_id' => $state->ID,
                            'state_name' => $state->Name,
                            'state_country_id' => $state->CountryID,
                            'state_is_active' => 1,
                            'state_is_deleted' => $state->IsDeleted,
                            'state_created_by' => 1,
                            'state_created_at' => $state->LastUpdate,
                            'state_updated_by' => 1,
                            'state_updated_at' => $state->LastUpdate,
                        ];
                    }, $states);

            // Insert the data into the destination table
            DB::connection('mysql')->table('state')->insert($mappedData);
        }catch(Exception $ex){
            dd($ex->getMessage());
        }
    }

    function migrate_country(){
        try{
            DB::connection('mysql')->table('country')->truncate();
                    // Get the data from the source table
                    $countrys = DB::connection('db_live')->select('SELECT * FROM mims_country');

                    // Map the columns to match the destination table
                    $mappedData = array_map(function ($country) {
                        return [
                            'country_id' => $country->ID,
                            'country_name' => $country->Name,
                            'country_is_active' => 1,
                            'country_is_deleted' => $country->IsDeleted,
                            'country_created_by' => 1,
                            'country_created_at' => $country->LastUpdate,
                            'country_updated_by' => 1,
                            'country_updated_at' => $country->LastUpdate,
                        ];
                    }, $countrys);

            // Insert the data into the destination table
            DB::connection('mysql')->table('country')->insert($mappedData);
        }catch(Exception $ex){
            dd($ex->getMessage());
        }
    }

    function migrate_location(){
        try{
            DB::connection('mysql')->table('location')->truncate();
                   
            // --------------------------------------------------
            // Get the total count of records
            $totalCount = DB::connection('db_live')->table('mims_location')->count();

            // Set the limit and offset values
            $limit = 1000;
            $offset = 0;

            // Loop through the records and migrate them in chunks
            while ($offset < $totalCount) {
                // Get the records for the current chunk
                $locations = DB::connection('db_live')->select('SELECT * FROM mims_location LIMIT ? OFFSET ?', [$limit, $offset]);

                // Map the columns to match the destination table
                $mappedData = array_map(function ($location) {
                    return [
                        'location_id' => $location->ID,
                        'location_country_id' => $location->CountryID,
                        'location_state_id' => $location->StateID,
                        'location_city_id' => $location->CityID,
                        'location_address' => $location->Address,
                        'location_longitude' => $location->Longitude,
                        'location_latitude' => $location->Latitude,                     
                        'location_is_active' => 1,
                        'location_is_deleted' => $location->IsDeleted,
                        'location_created_by' => 1,
                        'location_created_at' => $location->LastUpdate,
                        'location_updated_by' => 1,
                        'location_updated_at' => $location->LastUpdate,
                    ];
                }, $locations);

                // Insert the data into the destination table
                DB::connection('mysql')->table('location')->insert($mappedData);

                // Update the offset for the next chunk
                $offset += $limit;
            }

        }catch(Exception $ex){
            dd($ex->getMessage());
        }
    }


    function migrate_brand(){
        try {
            DB::connection('mysql')->table('brand')->truncate();
        
            // Get the total count of records
            $totalCount = DB::connection('db_live')->table('mims_brandinformation')->count();

            // Set the limit and offset values
            $limit = 1000;
            $offset = 0;

            // Loop through the records and migrate them in chunks
            while ($offset < $totalCount) {
                // Get the records for the current chunk
                $brands = DB::connection('db_live')->select('SELECT * FROM mims_brandinformation LIMIT ? OFFSET ?', [$limit, $offset]);

                // Map the columns to match the destination table
                $mappedData = array_map(function ($brand) {
                    $brand_type = $brand->ProductType;
                    if($brand_type == 1 ){
                        $brand_type = "Regular";
                    }else{
                        $brand_type = "Herbal";
                    }
                    return [
                        'brand_id' => $brand->ID,
                        'brand_name' => $brand->Name,
                        'brand_type' => $brand_type,
                        'brand_generic_id' => $brand->GenericID,
                        'brand_manufacturer_id' => $brand->ManufacturerID,
                        'brand_dosage_form_id' => $brand->DosageFormID,
                        'brand_strength_id' => $brand->StrengthID,
                        'brand_pack_size_id' => $brand->PackSizeID,
                        'brand_image' => $brand->ImagePath,
                        'brand_price' => $brand->PriceInBDT,
                        'brand_is_hightlight' => $brand->IsHighlighted,
                        'brand_is_new_product' => $brand->IsNewProduct,
                        'brand_is_new_brand' => $brand->IsNewBrand,
                        'brand_is_new_presentation' => $brand->IsNewPresentation,
                        'brand_is_active' => $brand->IsActive,
                        'brand_is_deleted' => $brand->IsDeleted,
                        'brand_created_by' => 1,
                        'brand_created_at' => $brand->LastUpdate,
                        'brand_updated_by' => 1,
                        'brand_updated_at' => $brand->LastUpdate,
                    ];
                }, $brands);

                // Insert the data into the destination table
                DB::connection('mysql')->table('brand')->insert($mappedData);

                // Update the offset for the next chunk
                $offset += $limit;
            
            }
        } catch (Exception $ex) {
            dd($ex->getMessage());
        }
    }

    function migrate_manufacturer(){
        try{
            DB::connection('mysql')->table('manufacturer')->truncate();
                    // Get the data from the source table
                    $manufacturers = DB::connection('db_live')->select('SELECT * FROM mims_manufacturerinformation');

                    // Map the columns to match the destination table
                    $mappedData = array_map(function ($manufacturer) {
                        return [
                            'manufacturer_id' => $manufacturer->ID,
                            'manufacturer_name' => $manufacturer->Name,
                            'manufacturer_location_id' => $manufacturer->AddressID,
                            'manufacturer_email' => $manufacturer->EmailID,
                            'manufacturer_phone' => $manufacturer->PhoneNo,
                            'manufacturer_mobile' => $manufacturer->MobileNo,
                            'manufacturer_fax' => $manufacturer->FaxNo,
                            'manufacturer_is_active' => $manufacturer->IsActive,
                            'manufacturer_is_deleted' => $manufacturer->IsDeleted,
                            'manufacturer_created_by' => 1,
                            'manufacturer_created_at' => $manufacturer->LastUpdate,
                            'manufacturer_updated_by' => 1,
                            'manufacturer_updated_at' => $manufacturer->LastUpdate,
                        ];
                    }, $manufacturers);

            // Insert the data into the destination table
            DB::connection('mysql')->table('manufacturer')->insert($mappedData);
        }catch(Exception $ex){
            dd($ex->getMessage());
        }
    }

    function migrate_packsize(){
        try{
            DB::connection('mysql')->table('packsize')->truncate();
                    // Get the data from the source table
                    $packsizes = DB::connection('db_live')->select('SELECT * FROM mims_packsizeinformation');

                    // Map the columns to match the destination table
                    $mappedData = array_map(function ($packsize) {
                        return [
                            'packsize_id' => $packsize->ID,
                            'packsize_name' => $packsize->Name,
                            'packsize_is_active' => $packsize->IsActive,
                            'packsize_is_deleted' => $packsize->IsDeleted,
                            'packsize_created_by' => 1,
                            'packsize_created_at' => $packsize->LastUpdate,
                            'packsize_updated_by' => 1,
                            'packsize_updated_at' => $packsize->LastUpdate,
                        ];
                    }, $packsizes);

            // Insert the data into the destination table
            DB::connection('mysql')->table('packsize')->insert($mappedData);
        }catch(Exception $ex){
            dd($ex->getMessage());
        }
    }

    function migrate_strength(){
        try{
            DB::connection('mysql')->table('strength')->truncate();
                    // Get the data from the source table
                    $strengths = DB::connection('db_live')->select('SELECT * FROM mims_strengthinformation');

                    // Map the columns to match the destination table
                    $mappedData = array_map(function ($strength) {
                        return [
                            'strength_id' => $strength->ID,
                            'strength_name' => $strength->Name,
                            'strength_is_active' => $strength->IsActive,
                            'strength_is_deleted' => $strength->IsDeleted,
                            'strength_created_by' => 1,
                            'strength_created_at' => $strength->LastUpdate,
                            'strength_updated_by' => 1,
                            'strength_updated_at' => $strength->LastUpdate,
                        ];
                    }, $strengths);

            // Insert the data into the destination table
            DB::connection('mysql')->table('strength')->insert($mappedData);
        }catch(Exception $ex){
            dd($ex->getMessage());
        }
    }

    function migrate_dosageform(){
        try{
            DB::connection('mysql')->table('dosageform')->truncate();
                    // Get the data from the source table
                    $dosageForms = DB::connection('db_live')->select('SELECT * FROM mims_dosageforminformation');

                    // Map the columns to match the destination table
                    $mappedData = array_map(function ($dosageForm) {
                        return [
                            'dosageform_id' => $dosageForm->ID,
                            'dosageform_name' => $dosageForm->Name,
                            'dosageform_is_active' => $dosageForm->IsActive,
                            'dosageform_is_deleted' => $dosageForm->IsDeleted,
                            'dosageform_created_by' => 1,
                            'dosageform_created_at' => $dosageForm->LastUpdate,
                            'dosageform_updated_by' => 1,
                            'dosageform_updated_at' => $dosageForm->LastUpdate,
                        ];
                    }, $dosageForms);

            // Insert the data into the destination table
            DB::connection('mysql')->table('dosageform')->insert($mappedData);
        }catch(Exception $ex){
            dd($ex->getMessage());
        }
    }
    function migrate_generic(){

        DB::connection('mysql')->table('generic')->truncate();
        // Get the data from the source table (mims_genericinformation)
        $data = DB::connection('db_live')->table('mims_genericinformation')->get();

                
        // Map the column names from the source table to the destination table
        $map = [
            'ID' => 'generic_id',
            'Name' => 'generic_name',
            'Classification' => 'generic_classification',
            'SafetyRemark' => 'generic_safety_remark',
            'Indication' => 'generic_indication',
            'IndicationTags' => 'generic_indication_tags',
            'DosageAdministration' => 'generic_dosage_administration',
            'ContraindicationPrecaution' => 'generic_contraindication_precaution',
            'Composition' => 'generic_composition',
            'Pharmacology' => 'generic_pharmacology',
            'Interaction' => 'generic_interaction',
            'SideEffect' => 'generic_side_effect',
            'OverdoseEffect' => 'generic_overdose_effect',
            'StorageCondition' => 'generic_storage_condition',
            'PregnancyLactation' => 'generic_pregnancy_lactation',
            'LastUpdate' => 'generic_updated_at',
            'CreatedBy' => 'generic_created_by',
            'IsActive' => 'generic_is_active',
            'IsDeleted' => 'generic_is_deleted',
        ];

        // Map the data to the destination columns and add the created/updated timestamps
        $processedData = $data->map(function ($item) use ($map) {
            $newItem = [];
            foreach ($item as $key => $value) {
                $newKey = $map[$key] ?? $key;
                $newValue = $value;
                if ($key === 'LastUpdate') {
                    $newKey = 'generic_updated_at';
                    $newValue = date('Y-m-d H:i:s', strtotime($value));
                } elseif ($key === 'CreatedBy') {
                    $newKey = 'generic_created_by';
                    $newValue = (int) $value;
                }
                $newItem[$newKey] = $newValue;
            }
            $newItem['generic_created_at'] = now();
            $newItem['generic_updated_by'] = 1;
            $newItem['generic_updated_at'] = now();
            return $newItem;
        });

        // dd($processedData[0]);
        // Set the connection to the destination database (default MySQL connection)

        try{
            // Insert the processed data into the destination table (generic)
            DB::connection('mysql')->table('generic')->insert($processedData->toArray());

        }catch(\Exception $ex){
            dd($ex->getMessage());
        }

    }
}
