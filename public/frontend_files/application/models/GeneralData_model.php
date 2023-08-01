<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'libraries/entities/GeneralDataEntity.php';

class GeneralData_model extends MY_Model {

    public $require_fields = array();
    public $request_type = '';
    public $all_information = array();
    public $detail_information = array();

    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function create() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $check_require_field_erro = $this->checkRequireFilds($this->require_fields, $this->request_type);
        if ($check_require_field_erro != NO_ERROR) {
            return $check_require_field_erro;
        }

        return NO_ERROR;
    }

    public function getAllActiveInformation($tableName) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('*');
        $this->db->from($tableName);
        $this->db->where('IsActive', 1);
        $this->db->where('IsDeleted', 0);
        $all_information = $this->db->get()->result_array();
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $all_information;
    }

    public function getDetail($tableName, $id){
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select('*');
        $this->db->from($tableName);
        $this->db->where('ID', $id);
        $this->db->where('IsActive', 1);
        $this->db->where('IsDeleted', 0);
        $this->db->limit(1);
        $information = $this->db->get()->result_array()->row();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $information;
    }

    public function updateInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function deleteInformation($tableName) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $id = $this->input->get('ID')->result_array();
        if (empty($id)) {
            return ERROR_INVALID_PARAMS;
        }

        $data = array();
        $data['IsActive'] = 0;
        $data['IsDeleted'] = 1;
        $data['LastUpdate'] = date('Y-m-d H:i:s');

        $this->db->set($data);
        $this->db->where('ID', $id);
        if($this->db->update($tableName)) {
            return NO_ERROR;
        } else {
            return ERROR_UNKNOWN;
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function prepareErrorResponse($error_code) {
        $api_error_messages = config_item('api_error_messages');
        $error_detail = $api_error_messages[$error_code];
        return $error_detail;
    }
}
