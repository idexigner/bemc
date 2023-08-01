<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: amalesh
 * Date: 2/14/15
 * Time: 17:44
 */

class MY_Model extends CI_Model {
    public  $CI;

    public function __construct()
    {
        parent::__construct();
//        set_time_limit(0);
        $this->CI = & get_instance();
    }

    public function checkRequireFilds ($fields, $request_type) {
        $error_code = NO_ERROR;
        switch ($request_type) {
            case 'get':
                foreach ($fields AS $field) {
                    $value = $this->input->get($field);
                    if(empty($value)) {
                        $error_code = ERROR_REQUIRE_FIELD_MISSING;
                        break;
                    }
                }
                break;
            case 'post':
                foreach ($fields AS $field) {
                    $value = $this->input->post($field);
                    if(empty($value)) {
                        $error_code = ERROR_REQUIRE_FIELD_MISSING;
                        break;
                    }
                }
                break;
            default:
                $error_code = ERROR_INVALID_PARAMS;
                break;
        }

        return $error_code;
    }

    public function checkEmailID($email) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return NO_ERROR;
        }

        return ERROR_INVALID_EMAIL_ID;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }
}