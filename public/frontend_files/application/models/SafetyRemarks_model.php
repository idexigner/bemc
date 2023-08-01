<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/SafetyRemarksEntity.php';

class SafetyRemarks_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function createSafetyRemarks($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->require_fields = array('SafetyRemark');
        $this->request_type = 'post';
        $check_require_field_erro = parent::create();
        if ($check_require_field_erro != NO_ERROR) return $check_require_field_erro;

        $data = array();
        $data['Remarks'] = $this->input->post('SafetyRemark');
        $data['CreatedBy'] = $userID;
        $safety_remarks_entity = new SafetyRemarksEntity($data);
        $safety_remarks_data = $safety_remarks_entity->getSafetyRemarkEntityForCreate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        if($this->db->insert('safetyremarks', $safety_remarks_data)) {
            return $this->prepareErrorResponse(NO_ERROR);
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }

    public function getAllActiveSafetyRemarks() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('sr.ID, sr.Remarks');
        $this->db->from('safetyremarks as sr');
        $this->db->where('sr.IsActive', 1);
        $this->db->where('sr.IsDeleted', 0);
        $this->db->order_by('sr.Remarks');
        $all_information = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }

    public function getDetail($tableName, $id){
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $safety_remarks_id = $this->input->get('SafetyRemarksID');
        if ($safety_remarks_id) {
            $this->db->select('sr.ID, sr.Remarks');
            $this->db->from('safetyremarks as sr');
            $this->db->where('sr.IsActive', 1);
            $this->db->where('sr.IsDeleted', 0);
            $this->db->limit(1);
            $safety_remark = $this->db->get()->result_array();
            return isset($safety_remark[0]['ID']) ? $safety_remark[0] : array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return ERROR_INVALID_REQUEST;
    }

    public function updateSafetyRemarks($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $safety_remarks_id = $this->input->get('SafetyRemarksID');
        if (empty($safety_remarks_id)) {
            return false;
        }

        $data = array();
        $data['Remarks'] = $this->input->post('SafetyRemark');
        $data['IsActive'] = $this->input->post('IsActive');
        $data['CreatedBy'] = $userID;

        $require_fields = array('SafetyRemark');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

        $safety_remarks_entity = new SafetyRemarksEntity($data);
        $safety_remarks_data = $safety_remarks_entity->getSafetyRemarkEntityForUpdate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        $this->db->set($safety_remarks_data);
        $this->db->where('ID', $safety_remarks_id);
        if($this->db->update('safetyremarks')) {
            return $this->prepareErrorResponse(NO_ERROR);
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function deleteSafetyRemarks() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $id = $this->input->get('SafetyRemarksID');

        $data = array();
        $data['IsActive'] = 0;
        $data['IsDeleted'] = 1;
        $data['LastUpdate'] = date('Y-m-d H:i:s');
        $this->db->set($data);
        $this->db->where('ID', $id);
        $return = $this->db->update('safetyremarks');

        return $return;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function getAllSafetyRemarkInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('sr.ID, sr.Remarks, sr.IsActive');
        $this->db->from('safetyremarks as sr');
        $this->db->where('sr.IsDeleted', 0);
        $this->db->order_by('sr.Remarks');
        $all_information = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }
}
