<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/StrengthInformationEntity.php';

class StrengthInformation_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function createStrengthInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->require_fields = array('StrengthName');
        $this->request_type = 'post';
        $check_require_field_erro = parent::create();
        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

        $data = array();
        $data['Name'] = $this->input->post('StrengthName');
        $data['CreatedBy'] = $userID;
        $strength_information_entity = new StrengthInformationEntity($data);
        $strength_information_data = $strength_information_entity->getStrengthEntityForCreate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        if($this->db->insert('strengthinformation', $strength_information_data)) {
            return $this->prepareErrorResponse(NO_ERROR);
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }

    public function getAllActiveStrengthInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('g.ID, g.Name');
        $this->db->from('strengthinformation as g');
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
        $strength_id = $this->input->get('StrengthID');
        if ($strength_id) {
            $this->db->select('g.ID, g.Name');
            $this->db->from('strengthinformation as g');
            $this->db->where('g.IsActive', 1);
            $this->db->where('g.IsDeleted', 0);
            $this->db->limit(1);
            $strength_information = $this->db->get()->result_array();
            return isset($strength_information[0]['ID']) ? $strength_information[0] : array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
    }

    public function updateStrengthInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $strength_information_id = $this->input->get('StrengthID');
        if (empty($strength_information_id)) {
            return false;
        }

        $data = array();
        $data['Name'] = $this->input->post('StrengthName');
        $data['IsActive'] = $this->input->post('IsActive');
        $data['CreatedBy'] = $userID;

        $require_fields = array('StrengthName');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

        $strength_information_entity = new StrengthInformationEntity($data);
        $strength_information_data = $strength_information_entity->getStrengthEntityForUpdate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        $this->db->set($strength_information_data);
        $this->db->where('ID', $strength_information_id);
        if($this->db->update('strengthinformation', $strength_information_data)) {
            return $this->prepareErrorResponse(NO_ERROR);
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }

    public function deleteStrength() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $id = $this->input->get('StrengthID');

        $data = array();
        $data['IsActive'] = 0;
        $data['IsDeleted'] = 1;
        $data['LastUpdate'] = date('Y-m-d H:i:s');
        $this->db->set($data);
        $this->db->where('ID', $id);
        $return = $this->db->update('strengthinformation');

        return $return;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function getAllStrengthInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('g.ID, g.Name, g.IsActive');
        $this->db->from('strengthinformation as g');
        $this->db->where('g.IsDeleted', 0);
        $this->db->order_by('g.Name');
        $all_information = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }
}
