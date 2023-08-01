<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/AddressCategoryEntity.php';

class AddressCategory_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function getAllActiveAddressCategory() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('ID');
        $this->db->select('Name');
        $this->db->from('addresscategory');
        $this->db->where('IsActive', 1);
        $this->db->where('IsDeleted', 0);
        $this->db->where(sprintf("ID IN (SELECT DISTINCT(AddressCategoryID) FROM %s WHERE IsActive = 1)", $this->db->dbprefix('addressinformation')));
        $this->db->order_by('Name');
        $all_category = $this->db->get()->result_array();
        return $all_category;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function getAllActiveAddressCategoryForSideBar() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('ID');
        $this->db->select('Name');
        $this->db->from('addresscategory');
        $this->db->where('IsActive', 1);
        $this->db->where(sprintf("ID IN (SELECT DISTINCT(AddressCategoryID) FROM %s WHERE IsActive = 1)", $this->db->dbprefix('addressinformation')));
        $this->db->where('IsDeleted', 0);
        $this->db->order_by('Name');
        $this->db->limit(config_item('side_bar_link_limit'));
        $all_category = $this->db->get()->result_array();
        return $all_category;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function createAddressCategory($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->require_fields = array('AddressCategoryName');
        $this->request_type = 'post';
        $check_require_field_erro = parent::create();
        if ($check_require_field_erro != NO_ERROR) return $check_require_field_erro;

        $data = array();
        $data['Name'] = $this->input->post('AddressCategoryName');
        $data['CreatedBy'] = $userID;
        $address_category_entity = new AddressCategoryEntity($data);
        $address_category_data = $address_category_entity->getAddressCategoryEntityForCreate();

        if (empty($address_category_data)) {
            return ERROR_INVALID_EMAIL_ID;
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        if($this->db->insert('addresscategory', $address_category_data)) {
            return NO_ERROR;
        } else {
            return ERROR_UNKNOWN;
        }
    }

    public function getAllAddressCategoryActiveInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $all_information = parent::getAllActiveInformation('addresscategory');
        $all_address_category_information = array();
        $total = 0;
        foreach ($all_information AS $information) {
            $address_category_entity = new AddressCategoryEntity($information);
            $all_address_category_information[$total++] = $address_category_entity->getAddressCategoryEntity();
        }

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $all_address_category_information;
    }

    public function getDetail($tableName, $id){
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $address_category_id = $this->input->get('AddressCategoryID');
        if ($address_category_id) {
            $address_category_detail = parent::getDetail('addresscategory', $address_category_id);
            if (empty($address_category_detail)) {
                return ERROR_INVALID_REQUEST;
            }

            $address_category_entity = new AddressCategoryEntity($address_category_detail);
            return $address_category_entity->getAddressCategoryEntity();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return ERROR_INVALID_REQUEST;
    }

    public function updateInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $address_category_id = $this->input->get('AddressCategoryID');
        if (empty($address_category_id)) {
            return false;
        }

        $data = array();
        $data['Name'] = $this->input->post('UserName');

        $require_fields = array('UserName');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) {
            return $check_require_field_erro;
        }

        $address_category_entity = new AddressCategoryEntity($data);

        $address_category_data = $address_category_entity->getAddressCategoryEntityForUpdate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        $this->db->set($address_category_data);
        $this->db->where('ID', $address_category_id);
        if($this->db->update('addresscategory')) {
            return NO_ERROR;
        } else {
            return ERROR_UNKNOWN;
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function deleteAddressCategory($tableName) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        return parent::deleteInformation('addresscategory');
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }
}
