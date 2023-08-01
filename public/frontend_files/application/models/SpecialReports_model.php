<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/SpecialReportEntity.php';

class SpecialReports_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function getAllActiveSpecialReports() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('sr.ID, sr.Title, sr.Description, sr.LinkAddress, sr.ImagePath, sr.IsActive');
        $this->db->from('specialreports AS sr');
        $this->db->where('sr.IsActive', 1);
        $this->db->where('sr.IsDeleted', 0);
        $this->db->order_by('sr.Title');
        $this->db->limit(config_item('per_page_special_report_number'));
        $special_report = $this->db->get()->result_array();

        $this->db->select('sr.ID');
        $this->db->from('specialreports AS sr');
        $this->db->where('sr.IsActive', 1);
        $this->db->where('sr.IsDeleted', 0);
        $result = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return array($special_report, count($result));
    }
    
    public function getSpecialReportForFrontend() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $page_no = $this->input->get('PageNo');
        $page_no = empty($page_no) ? 1 : $page_no;
        $this->db->select('sr.ID, sr.Title, sr.Description, sr.LinkAddress, sr.ImagePath, sr.IsActive');
        $this->db->from('specialreports AS sr');
        $this->db->where('sr.IsActive', 1);
        $this->db->where('sr.IsDeleted', 0);
        $this->db->limit(config_item('per_page_special_report_number'), ($page_no - 1) * config_item('per_page_special_report_number'));
        $special_report = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $special_report;
    }

    public function createSpecialReports($userID) {
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
        $specialreports_information_entity = new SpecialReportEntity($data);
        $specialreports_information_data = $specialreports_information_entity->getSpecialReportEntityForCreate();

        if (empty($specialreports_information_data)) {
            return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);
        }

        log_message('debug', __METHOD__.'#'.__LINE__.' SpecialReports Data: '.print_r($data, true));
        if($this->db->insert('specialreports', $specialreports_information_data)) {
            $specialreports_id = $this->db->insert_id();
            if (isset($_FILES["ImagePath"]) && $_FILES["ImagePath"]['tmp_name']){
                $upload_data = $this->util->upload('SpecialReportImages', 'ImagePath');
                if ($upload_data) {
                    $data = array();
                    $data['ImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $specialreports_id);
                    if($this->db->update('specialreports')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteSpecialReports($specialreports_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteSpecialReports($specialreports_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }

    public function getAllSpecialReports() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select('sr.ID, sr.Title, sr.Description, sr.LinkAddress, sr.ImagePath, sr.IsActive');
        $this->db->from('specialreports AS sr');
        $this->db->where('sr.IsDeleted', 0);
        $this->db->order_by('sr.Title');
        $result = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $result;
    }

    public function getSpecialReportsDetailInformation() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $specialreports_id = $this->input->get('SpecialReportID');
        if ($specialreports_id) {
            $this->db->select('sr.ID, sr.Title, sr.Description, sr.LinkAddress, sr.ImagePath, sr.IsActive');
            $this->db->from('specialreports AS sr');
            $this->db->where('sr.ID', $specialreports_id);
            $this->db->where('sr.IsDeleted', 0);
            $this->db->limit(1);
            $specialreports_information = $this->db->get()->result_array();
            return isset($specialreports_information[0]['ID']) ? $specialreports_information[0] : array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
    }

    public function updateSpecialReports($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $specialreports_id = $this->input->get('SpecialReportID');
        if (empty($specialreports_id)) {
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

        $specialreports_information_entity = new SpecialReportEntity($data);

        $specialreports_information_data = $specialreports_information_entity->getSpecialReportEntityForUpdate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        $this->db->set($specialreports_information_data);
        $this->db->where('ID', $specialreports_id);
        if($this->db->update('specialreports')) {
            if (isset($_FILES["ImagePath"]) && $_FILES["ImagePath"]['tmp_name']){
                $upload_data = $this->util->upload('SpecialReportImages', 'ImagePath');
                if ($upload_data) {
                    $data = array();
                    $data['ImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $specialreports_id);
                    if($this->db->update('specialreports')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteSpecialReports($specialreports_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteSpecialReports($specialreports_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function deleteSpecialReports() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $id = $this->input->get('SpecialReportID');

        $data = array();
        $data['IsActive'] = 0;
        $data['IsDeleted'] = 1;
        $data['LastUpdate'] = date('Y-m-d H:i:s');
        $this->db->set($data);
        $this->db->where('ID', $id);
        $return = $this->db->update('specialreports');

        return $return;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function getSpecialReportsForSidebar() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('ID');
        $this->db->select('Title');
        $this->db->select('Description');
        $this->db->select('ImagePath');
        $this->db->select('LinkAddress');
        $this->db->from('specialreports');
		$this->db->where('IsActive', 1);
		$this->db->where('IsDeleted', 0);
		$this->db->order_by('LastUpdate', 'DESC');
        $this->db->limit(config_item('side_bar_link_limit'));
        $result = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $result;
    }
}
