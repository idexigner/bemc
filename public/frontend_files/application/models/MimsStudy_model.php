<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/MimsStudyEntity.php';

class MimsStudy_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function getAllActiveMimsStudy() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('sr.ID, sr.Title, sr.Description, sr.LinkAddress, sr.ImagePath, sr.IsActive');
        $this->db->from('mimsstudy AS sr');
        $this->db->where('sr.IsActive', 1);
        $this->db->where('sr.IsDeleted', 0);
        $this->db->order_by('sr.Title');
        $this->db->limit(config_item('per_page_mims_study_number'));
        $special_report = $this->db->get()->result_array();

        $this->db->select('sr.ID');
        $this->db->from('mimsstudy AS sr');
        $this->db->where('sr.IsActive', 1);
        $this->db->where('sr.IsDeleted', 0);
        $result = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return array($special_report, count($result));
    }
    
    public function getMimsStudyForFrontend() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $page_no = $this->input->get('PageNo');
        $page_no = empty($page_no) ? 1 : $page_no;
        $this->db->select('sr.ID, sr.Title, sr.Description, sr.LinkAddress, sr.ImagePath, sr.IsActive');
        $this->db->from('mimsstudy AS sr');
        $this->db->where('sr.IsActive', 1);
        $this->db->where('sr.IsDeleted', 0);
        $this->db->limit(config_item('per_page_mims_study_number'), ($page_no - 1) * config_item('per_page_mims_study_number'));
        $special_report = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $special_report;
    }

    public function createMimsStudy($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->require_fields = array('Title', 'Description', 'LinkAddress');
        $this->request_type = 'post';
        $check_require_field_erro = parent::create();
        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

        $data = array();
        $data['Title'] = $this->input->post('Title');
        $data['Description'] = $this->input->post('Description');
        $data['LinkAddress'] = $this->input->post('LinkAddress');
        $data['ImagePath'] = $this->input->post('ImagePath');
        $data['CreatedBy'] = $userID;
        $mimsstudy_information_entity = new MimsStudyEntity($data);
        $mimsstudy_information_data = $mimsstudy_information_entity->getMimsStudyEntityForCreate();

        if (empty($mimsstudy_information_data)) {
            return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);
        }

        log_message('debug', __METHOD__.'#'.__LINE__.' MimsStudy Data: '.print_r($data, true));
        if($this->db->insert('mimsstudy', $mimsstudy_information_data)) {
            $mimsstudy_id = $this->db->insert_id();
            if (isset($_FILES["ImagePath"]) && $_FILES["ImagePath"]['tmp_name']){
                $upload_data = $this->util->upload('MimsStudyImages', 'ImagePath');
                if ($upload_data) {
                    $data = array();
                    $data['ImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $mimsstudy_id);
                    if($this->db->update('mimsstudy')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteMimsStudy($mimsstudy_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteMimsStudy($mimsstudy_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }

    public function getAllMimsStudy() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select('sr.ID, sr.Title, sr.Description, sr.LinkAddress, sr.ImagePath, sr.IsActive');
        $this->db->from('mimsstudy AS sr');
        $this->db->where('sr.IsDeleted', 0);
        $this->db->order_by('sr.Title');
        $result = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $result;
    }

    public function getMimsStudyDetailInformation() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $mimsstudy_id = $this->input->get('MimsStudyID');
        if ($mimsstudy_id) {
            $this->db->select('sr.ID, sr.Title, sr.Description, sr.LinkAddress, sr.ImagePath, sr.IsActive');
            $this->db->from('mimsstudy AS sr');
            $this->db->where('sr.ID', $mimsstudy_id);
            $this->db->where('sr.IsDeleted', 0);
            $this->db->limit(1);
            $mimsstudy_information = $this->db->get()->result_array();
            return isset($mimsstudy_information[0]['ID']) ? $mimsstudy_information[0] : array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
    }

    public function updateMimsStudy($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $mimsstudy_id = $this->input->get('MimsStudyID');
        if (empty($mimsstudy_id)) {
            return false;
        }

        $data = array();
        $data['Title'] = $this->input->post('Title');
        $data['Description'] = $this->input->post('Description');
        $data['LinkAddress'] = $this->input->post('LinkAddress');
        $data['ImagePath'] = $this->input->post('ImagePath');
        $data['CreatedBy'] = $userID;

        $require_fields = array('Title', 'Description', 'LinkAddress');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) {
            return $this->prepareErrorResponse($check_require_field_erro);
        }

        $mimsstudy_information_entity = new MimsStudyEntity($data);

        $mimsstudy_information_data = $mimsstudy_information_entity->getMimsStudyEntityForUpdate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        $this->db->set($mimsstudy_information_data);
        $this->db->where('ID', $mimsstudy_id);
        if($this->db->update('mimsstudy')) {
            if (isset($_FILES["ImagePath"]) && $_FILES["ImagePath"]['tmp_name']){
                $upload_data = $this->util->upload('MimsStudyImages', 'ImagePath');
                if ($upload_data) {
                    $data = array();
                    $data['ImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $mimsstudy_id);
                    if($this->db->update('mimsstudy')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteMimsStudy($mimsstudy_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteMimsStudy($mimsstudy_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function deleteMimsStudy() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $id = $this->input->get('MimsStudyID');

        $data = array();
        $data['IsActive'] = 0;
        $data['IsDeleted'] = 1;
        $data['LastUpdate'] = date('Y-m-d H:i:s');
        $this->db->set($data);
        $this->db->where('ID', $id);
        $return = $this->db->update('mimsstudy');

        return $return;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function getMimsStudyForSidebar() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('ID');
        $this->db->select('Title');
        $this->db->select('Description');
        $this->db->select('ImagePath');
        $this->db->select('LinkAddress');
        $this->db->from('mimsstudy');
		$this->db->where('IsActive', 1);
		$this->db->where('IsDeleted', 0);
        $this->db->order_by('Title');
        $this->db->limit(config_item('side_bar_link_limit'));
        $result = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $result;
    }
}
