<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/InternationalHealthEntity.php';

class InternationalHealth_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function getAllActiveInternationalHealth() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('ih.ID, ih.Title, ih.Description, ih.ImagePath, ih.PublishDateTime, ih.UnpublishedDateTime, ih.IsActive');
        $this->db->from('InternationalHealth AS ih');
        $this->db->where('ih.PublishDateTime <=', date('Y-m-d H:i:s'));
        $this->db->where('ih.UnpublishedDateTime >=', date('Y-m-d H:i:s'));
        $this->db->where('ih.IsActive', 1);
        $this->db->where('ih.IsDeleted', 0);
		$this->db->order_by('ih.PublishDateTime', 'DESC');
        $this->db->limit(config_item('per_page_international_health_information_number'));
        $result = $this->db->get()->result_array();
        $international_health_information = array();
        $total = 0;
        foreach ($result AS $info) {
            $info['UnpublishedDateTime'] = substr($info['UnpublishedDateTime'], 0, 10);
            $info['PublishDateTime'] = substr($info['PublishDateTime'], 0, 10);
            $temp = explode('-', $info['UnpublishedDateTime']);
            $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
            $info['UnpublishedDateTime'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';
            $temp = explode('-', $info['PublishDateTime']);
            $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
            $info['PublishDateTime'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';

            $international_health_information[$total++] = $info;
        }

        $this->db->select('ih.ID');
        $this->db->from('InternationalHealth AS ih');
        $this->db->where('ih.IsActive', 1);
        $this->db->where('ih.IsDeleted', 0);
        $result = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return array($international_health_information, count($result));
    }

    public function getInternationalHealthForFrontend() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $page_no = $this->input->get('PageNo');
        $page_no = empty($page_no) ? 1 : $page_no;
        $this->db->select('ih.ID, ih.Title, ih.Description, ih.ImagePath, ih.PublishDateTime, ih.UnpublishedDateTime, ih.IsActive');
        $this->db->from('InternationalHealth AS ih');
        $this->db->where('ih.PublishDateTime <=', date('Y-m-d H:i:s'));
        $this->db->where('ih.UnpublishedDateTime >=', date('Y-m-d H:i:s'));
        $this->db->where('ih.IsActive', 1);
        $this->db->where('ih.IsDeleted', 0);
		$this->db->order_by('ih.PublishDateTime', 'DESC');
		$this->db->limit(config_item('per_page_international_health_information_number'), ($page_no - 1) * config_item('per_page_international_health_information_number'));
        $result = $this->db->get()->result_array();
        $international_health_information = array();
        $total = 0;
        foreach ($result AS $info) {
            $info['UnpublishedDateTime'] = substr($info['UnpublishedDateTime'], 0, 10);
            $info['PublishDateTime'] = substr($info['PublishDateTime'], 0, 10);
            $temp = explode('-', $info['UnpublishedDateTime']);
            $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
            $info['UnpublishedDateTime'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';
            $temp = explode('-', $info['PublishDateTime']);
            $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
            $info['PublishDateTime'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';

            $international_health_information[$total++] = $info;
        }
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $international_health_information;
    }

    public function getIndividualInternationalHealthDetail() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $international_health_id = $this->input->get('InternationalHealthID');
        $this->db->select('ih.ID, ih.Title, ih.Description, ih.ImagePath, ih.PublishDateTime, ih.UnpublishedDateTime, ih.IsActive');
        $this->db->from('InternationalHealth AS ih');
        $this->db->where('ih.PublishDateTime <=', date('Y-m-d H:i:s'));
        $this->db->where('ih.UnpublishedDateTime >=', date('Y-m-d H:i:s'));
        $this->db->where('ih.ID', $international_health_id);
        $this->db->where('ih.IsActive', 1);
        $this->db->where('ih.IsDeleted', 0);
        $international_health_information = $this->db->get()->result_array();
        if (isset($international_health_information[0]['ID'])) {
            $international_health_information[0]['UnpublishedDateTime'] = substr($international_health_information[0]['UnpublishedDateTime'], 0, 10);
            $international_health_information[0]['PublishDateTime'] = substr($international_health_information[0]['PublishDateTime'], 0, 10);
            $temp = explode('-', $international_health_information[0]['UnpublishedDateTime']);
            $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
            $international_health_information[0]['UnpublishedDateTime'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';
            $temp = explode('-', $international_health_information[0]['PublishDateTime']);
            $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
            $international_health_information[0]['PublishDateTime'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';

            return $international_health_information[0];
        }
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $international_health_information;
    }

    public function createInternationalHealth($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->require_fields = array('Title', 'Description');
        $this->request_type = 'post';
        $check_require_field_erro = parent::create();
        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

        $data = array();
        $data['Title'] = $this->input->post('Title');
        $data['Description'] = $this->input->post('Description');
        $data['PublishDateTime'] = $this->input->post('PublishDate');
        $data['UnpublishedDateTime'] = $this->input->post('UnpublishedDate');
        $data['ImagePath'] = $this->input->post('InternationalHealthImagePath');
        $data['CreatedBy'] = $userID;
        $international_health_information_entity = new InternationalHealthEntity($data);
        $international_health_information_data = $international_health_information_entity->getInternationalHealthEntityForCreate();

        if (empty($international_health_information_data)) {
            return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);
        }

        log_message('debug', __METHOD__.'#'.__LINE__.' InternationalHealth Data: '.print_r($data, true));
        if($this->db->insert('InternationalHealth', $international_health_information_data)) {
            $international_health_id = $this->db->insert_id();
            if (isset($_FILES["InternationalHealthImagePath"]) && $_FILES["InternationalHealthImagePath"]['tmp_name']){
                $upload_data = $this->util->upload('InternationalHealthImages', 'InternationalHealthImagePath');
                if ($upload_data) {
                    $data = array();
                    $data['ImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $international_health_id);
                    if($this->db->update('InternationalHealth')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteInternationalHealth($international_health_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteInternationalHealth($international_health_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }

    public function getAllInternationalHealth() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select('ih.ID, ih.Title, ih.Description, ih.ImagePath, ih.PublishDateTime, ih.UnpublishedDateTime, ih.IsActive');
        $this->db->from('InternationalHealth AS ih');
        $this->db->where('ih.IsDeleted', 0);
		$this->db->order_by('ih.PublishDateTime', 'DESC');
		$result = $this->db->get()->result_array();
        $international_health_information = array();
        $total = 0;
        foreach ($result AS $info) {
            $info['UnpublishedDateTime'] = substr($info['UnpublishedDateTime'], 0, 10);
            $info['PublishDateTime'] = substr($info['PublishDateTime'], 0, 10);
            $international_health_information[$total++] = $info;
        }
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $international_health_information;
    }

    public function getInternationalHealthDetailInformation() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $international_health_id = $this->input->get('InternationalHealthID');
        if ($international_health_id) {
            $this->db->select('ih.ID, ih.Title, ih.Description, ih.ImagePath, ih.PublishDateTime, ih.UnpublishedDateTime, ih.IsActive');
            $this->db->from('InternationalHealth AS ih');
            $this->db->where('ih.ID', $international_health_id);
            $this->db->where('ih.IsDeleted', 0);
            $this->db->limit(1);
            $international_health_information = $this->db->get()->result_array();
            if (isset($international_health_information[0]['ID'])) {
                $international_health_information[0]['UnpublishedDateTime'] = substr($international_health_information[0]['UnpublishedDateTime'], 0, 10);
                $international_health_information[0]['UnpublishedDateTime'] = str_replace('-','/', $international_health_information[0]['UnpublishedDateTime']);
                $international_health_information[0]['PublishDateTime'] = substr($international_health_information[0]['PublishDateTime'], 0, 10);
                $international_health_information[0]['PublishDateTime'] = str_replace('-','/', $international_health_information[0]['PublishDateTime']);
                return $international_health_information[0];
            }
            return array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
    }

    public function updateInternationalHealth($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $international_health_id = $this->input->get('InternationalHealthID');
        if (empty($international_health_id)) {
            return false;
        }

        $data = array();
        $data['Title'] = $this->input->post('Title');
        $data['Description'] = $this->input->post('Description');
        $data['PublishDateTime'] = $this->input->post('PublishDate');
        $data['UnpublishedDateTime'] = $this->input->post('UnpublishedDate');
        $data['ImagePath'] = $this->input->post('InternationalHealthImagePath');
        $data['CreatedBy'] = $userID;

        $require_fields = array('Title', 'Description');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) {
            return $this->prepareErrorResponse($check_require_field_erro);
        }

        $international_health_information_entity = new InternationalHealthEntity($data);

        $international_health_information_data = $international_health_information_entity->getInternationalHealthEntityForUpdate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        $this->db->set($international_health_information_data);
        $this->db->where('ID', $international_health_id);
        if($this->db->update('InternationalHealth')) {
            if (isset($_FILES["InternationalHealthImagePath"]) && $_FILES["InternationalHealthImagePath"]['tmp_name']){
                $upload_data = $this->util->upload('InternationalHealthImages', 'InternationalHealthImagePath');
                if ($upload_data) {
                    $data = array();
                    $data['ImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $international_health_id);
                    if($this->db->update('InternationalHealth')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteInternationalHealth($international_health_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteInternationalHealth($international_health_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function deleteInternationalHealth() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $id = $this->input->get('InternationalHealthID');

        $data = array();
        $data['IsActive'] = 0;
        $data['IsDeleted'] = 1;
        $data['LastUpdate'] = date('Y-m-d H:i:s');
        $this->db->set($data);
        $this->db->where('ID', $id);
        $return = $this->db->update('InternationalHealth');

        return $return;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function getInternationalHealthForSidebar() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('ID');
        $this->db->select('Title');
        $this->db->select('Description');
        $this->db->select('ImagePath');
        $this->db->from('InternationalHealth');
        $this->db->where('PublishDateTime <=', date("Y-m-d H:i:s"));
        $this->db->where('UnpublishedDateTime >=', date("Y-m-d H:i:s"));
        $this->db->where('IsActive', 1);
        $this->db->where('IsDeleted', 0);
		$this->db->order_by('PublishDateTime', 'DESC');
//		$this->db->order_by('Title');
        $this->db->limit(config_item('side_bar_link_limit'));
        $result = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $result;
    }
}
