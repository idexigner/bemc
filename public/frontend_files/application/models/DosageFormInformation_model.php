<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/DosageFormInformationEntity.php';

class DosageFormInformation_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function createDosageFormInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->require_fields = array('DosageFormName');
        $this->request_type = 'post';
        $check_require_field_erro = parent::create();
        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

        $data = array();
        $data['Name'] = $this->input->post('DosageFormName');
        $data['CreatedBy'] = $userID;
        $dosageform_information_entity = new DosageFormInformationEntity($data);
        $dosageform_information_data = $dosageform_information_entity->getDosageFormEntityForCreate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        if($this->db->insert('dosageforminformation', $dosageform_information_data)) {
            return $this->prepareErrorResponse(NO_ERROR);
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }

    public function getAllActiveDosageFormInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('g.ID, g.Name');
        $this->db->from('dosageforminformation as g');
        $this->db->where('g.IsActive', 1);
        $this->db->where('g.IsDeleted', 0);
        $this->db->order_by('g.Name');
        $all_information = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }

    public function getDetail($tableName, $id){
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $dosageform_id = $this->input->get('DosageFormID');
        if ($dosageform_id) {
            $this->db->select('g.ID, g.Name');
            $this->db->from('dosageforminformation as g');
            $this->db->where('g.IsActive', 1);
            $this->db->where('g.IsDeleted', 0);
            $this->db->limit(1);
            $dosageform_information = $this->db->get()->result_array();
            return isset($dosageform_information[0]['ID']) ? $dosageform_information[0] : array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
    }

    public function updateDosageFormInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $dosageform_information_id = $this->input->get('DosageFormID');
        if (empty($dosageform_information_id)) {
            return false;
        }

        $data = array();
        $data['Name'] = $this->input->post('DosageFormName');
        $data['IsActive'] = $this->input->post('IsActive');
        $data['CreatedBy'] = $userID;

        $require_fields = array('DosageFormName');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

        $dosageform_information_entity = new DosageFormInformationEntity($data);
        $dosageform_information_data = $dosageform_information_entity->getDosageFormEntityForUpdate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        $this->db->set($dosageform_information_data);
        $this->db->where('ID', $dosageform_information_id);
        if($this->db->update('dosageforminformation', $dosageform_information_data)) {
            return $this->prepareErrorResponse(NO_ERROR);
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }

    public function deleteDosageForm() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $id = $this->input->get('DosageFormID');

        $data = array();
        $data['IsActive'] = 0;
        $data['IsDeleted'] = 1;
        $data['LastUpdate'] = date('Y-m-d H:i:s');
        $this->db->set($data);
        $this->db->where('ID', $id);
        $return = $this->db->update('dosageforminformation');

        return $return;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function getAllDosageFormInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('g.ID, g.Name, g.IsActive');
        $this->db->from('dosageforminformation as g');
        $this->db->where('g.IsDeleted', 0);
        $this->db->order_by('g.Name');
        $all_information = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }
}
