<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

define('REGULAR_PRODUCT', 1);
define('HERBAL_PRODUCT', 2);

$config['openssl_encryption_keys'] = array(
    "dev" => 'VLKdiSgnBkUVCWBmSFxQUgcgHkMAoqqR',
    "prod" => 'SrIDRGZIfQGKNmOLaumWcxfCBFxdzwxD'
);

$config['openssl_encryption_ivs'] = array(
    "dev" => '6987548778082434',
    "prod" => '6759574031690117'
);


$env = 'dev';

$config['openssl_encryption_key'] = $config['openssl_encryption_keys'][$env];
$config['openssl_encryption_iv'] = $config['openssl_encryption_ivs'][$env];

$config['session_expiry_time'] = 1200;      // 20 minutes

$config['per_page_drug_number'] = 20;
$config['per_page_new_drug_number'] = 5;
$config['per_page_featured_drug_number'] = 10;
$config['per_page_highlighted_news_number'] = 10;
$config['per_page_doctor_number'] = 20;
$config['per_page_job_number'] = 20;
$config['per_page_address_number'] = 20;
$config['per_page_international_health_information_number'] = 20;
$config['per_page_information_number'] = 20;
$config['total_page'] = 10;
$config['session_expiry_time'] = 1200;
$config['allowedExts'] = array('jpg','png','jpeg','gif', 'pdf');
$config['side_bar_link_limit'] = 5;
$config['home_page_new_item_limit'] = 7;
$config['per_page_information_number_for_brand_search'] = 20;
$config['per_page_information_number_for_brand_by_alphabetically_search'] = 20;
$config['per_page_information_number_for_generic_search'] = 20;
$config['per_page_information_number_for_generic_by_alphabetically_search'] = 20;
$config['per_page_information_number_for_indication_search'] = 20;
$config['per_page_information_number_for_manufacturer_search'] = 20;
$config['per_page_job_information_number'] = 10;
$config['per_page_news_information_number'] = 10;
$config['per_page_video_information_number'] = 10;
$config['per_page_special_report_number'] = 10;
$config['per_page_mims_study_number'] = 10;
$config['per_page_mimslearning_number'] = 10;
$config['per_page_doctor_information_number'] = 10;
$config['per_page_address_information_number'] = 10;
