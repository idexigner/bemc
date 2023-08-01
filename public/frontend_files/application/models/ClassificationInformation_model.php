<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/ClassificationInformationEntity.php';

class ClassificationInformation_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function createClassificationInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->require_fields = array('ClassificationName');
        $this->request_type = 'post';
        $check_require_field_erro = parent::create();
        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

        $data = array();
        $data['Name'] = $this->input->post('ClassificationName');
        $data['CreatedBy'] = $userID;
        $classification_information_entity = new ClassificationInformationEntity($data);
        $classification_information_data = $classification_information_entity->getClassificationEntityForCreate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        if($this->db->insert('classificationinformation', $classification_information_data)) {
            return $this->prepareErrorResponse(NO_ERROR);
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }

    public function getAllActiveClassificationInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('c.ID, c.Name');
        $this->db->from('classificationinformation as c');
        $this->db->where('c.IsActive', 1);
        $this->db->where('c.IsDeleted', 0);
        $this->db->order_by('c.Name');
        $all_information = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }

    public function getDetail($tableName, $id){
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $classification_id = $this->input->get('ClassificationID');
        if ($classification_id) {
            $this->db->select('c.ID, c.Name');
            $this->db->from('classificationinformation as c');
            $this->db->where('c.IsActive', 1);
            $this->db->where('c.IsDeleted', 0);
            $this->db->limit(1);
            $classification_information = $this->db->get()->result_array();
            return isset($classification_information[0]['ID']) ? $classification_information[0] : array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
    }

    public function updateClassificationInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $classification_information_id = $this->input->get('ClassificationID');
        if (empty($classification_information_id)) {
            return false;
        }

        $data = array();
        $data['Name'] = $this->input->post('ClassificationName');
        $data['IsActive'] = $this->input->post('IsActive');
        $data['CreatedBy'] = $userID;

        $require_fields = array('ClassificationName');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

        $classification_information_entity = new ClassificationInformationEntity($data);
        $classification_information_data = $classification_information_entity->getClassificationEntityForUpdate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        $this->db->set($classification_information_data);
        $this->db->where('ID', $classification_information_id);
        if($this->db->update('classificationinformation', $classification_information_data)) {
            return $this->prepareErrorResponse(NO_ERROR);
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }

    public function deleteClassification() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $id = $this->input->get('ClassificationID');

        $data = array();
        $data['IsActive'] = 0;
        $data['IsDeleted'] = 1;
        $data['LastUpdate'] = date('Y-m-d H:i:s');
        $this->db->set($data);
        $this->db->where('ID', $id);
        $return = $this->db->update('classificationinformation');

        return $return;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function getAllClassificationInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('c.ID, c.Name, c.IsActive');
        $this->db->from('classificationinformation as c');
        $this->db->where('c.IsDeleted', 0);
        $this->db->order_by('c.Name');
        $all_information = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }
}
