<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['database_encryption_key'] = array(
    "dev" => 'VLKdiSgnBkUVCWBmSFxQUgcgHkMAoqqR',
    "prod" => 'SrIDRGZIfQGKNmOLaumWcxfCBFxdzwxD'
);

$config['database_encryption_iv'] = array(
    "dev" => '6987548778082434',
    "prod" => '6759574031690117'
);


$env = 'dev';

$config['db_encryption_key'] = $config['database_encryption_key'][$env];
$config['db_encryption_iv'] = $config['database_encryption_iv'][$env];

$config['session_expiry_time'] = 1200;      // 20 minutes