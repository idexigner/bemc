<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**

 * Created by Amalesh Debnath

 * Date: 2016/5/21

 * Time: 02:30 PM

 * All Right Reserved by the creator

 */

require_once APPPATH.'models/GeneralData_model.php';

require_once APPPATH.'libraries/entities/ManufacturerInformationEntity.php';



class ManufacturerInformation_model extends GeneralData_model {



    public function __construct() {

        parent::__construct();

        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());

    }



    public function createManufacturerInformation($userID) {

        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));

        $this->require_fields = array('ManufacturerName');

        $this->request_type = 'post';

        $check_require_field_erro = parent::create();

        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);



        $data = array();

        $data['Name'] = $this->input->post('ManufacturerName');

        $data['AddressID'] = $this->input->post('AddressID');

        if (empty($data['AddressID'])) {

            $this->load->model('Location_model');

            $data['AddressID'] = $this->Location_model->createLocation($userID);

            if ($data['AddressID'] == false) {

                return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);

            }

        }

        $data['EmailID'] = $this->input->post('EmailID');

        $data['PhoneNo'] = $this->input->post('PhoneNo');

        $data['MobileNo'] = $this->input->post('MobileNo');

        $data['FaxNo'] = $this->input->post('FaxNo');

        $data['CreatedBy'] = $userID;

        $manufacturer_information_entity = new ManufacturerInformationEntity($data);

        $manufacturer_information_data = $manufacturer_information_entity->getManufacturerEntityForCreate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        if($this->db->insert('manufacturerinformation', $manufacturer_information_data)) {

            return $this->prepareErrorResponse(NO_ERROR);

        } else {

            return $this->prepareErrorResponse(ERROR_UNKNOWN);

        }

    }



    public function getAllActiveManufacturerInformation() {

        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));

        $this->db->select('m.ID, m.Name, m.AddressID, m.EmailID, m.PhoneNo, m.MobileNo, m.FaxNo, l.CountryID, l.StateID, l.CityID, l.Address, l.Longitude, l.Latitude, c.Name AS CountryName, s.Name AS StateName, ci.Name AS CityName');

        $this->db->from('manufacturerinformation AS m');

        $this->db->join('location AS l', 'm.AddressID = l.ID AND l.IsDeleted = 0', 'left');

        $this->db->join('country AS c', 'l.CountryID = c.ID AND c.IsActive = 1 AND c.IsDeleted = 0', 'left');

        $this->db->join('state AS s', 'l.StateID = s.ID AND s.IsActive = 1 AND s.IsDeleted = 0', 'left');

        $this->db->join('city AS ci', 'l.CityID = ci.ID AND ci.IsActive = 1 AND ci.IsDeleted = 0', 'left');

        $this->db->where('m.IsActive', 1);

        $this->db->where('m.IsDeleted', 0);

        $this->db->order_by('m.Name');

        $all_information = $this->db->get()->result_array();

//        echo $this->db->last_query();

        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');

        return $all_information;

    }
    ///////////////////////////
    public function getAllActivecountManufacturerInformation() 
    {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('ID');
        $this->db->from('manufacturerinformation');
        $this->db->where('IsActive',1);
        $this->db->where('IsDeleted',0);
        $all_information = $this->db->get()->result_array();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }



    public function getManufacturerDetail(){

        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));

        $manufacturer_information_id = $this->input->get('ManufacturerInformationID');

        if ($manufacturer_information_id) {

            $this->db->select('m.ID, m.Name, m.AddressID, m.EmailID, m.PhoneNo, m.MobileNo, m.FaxNo, m.IsActive, l.CountryID, l.StateID, l.CityID');

            $this->db->from('manufacturerinformation AS m');

            $this->db->join('location AS l', 'm.AddressID = l.ID AND l.IsDeleted = 0', 'left');

            $this->db->where('m.ID', $manufacturer_information_id);

            $this->db->where('m.IsActive', 1);

            $this->db->where('m.IsDeleted', 0);

            $this->db->limit(1);

            $manufacturer_information = $this->db->get()->result_array();

            return isset($manufacturer_information[0]['ID']) ? $manufacturer_information[0] : array();

        }

        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');

        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);

    }



    public function updateManufacturerInformation($userID) {

        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));

        $manufacturer_information_id = $this->input->get('ManufacturerID');

        if (empty($manufacturer_information_id)) {

            return false;

        }



        $data = array();

        $data['Name'] = $this->input->post('ManufacturerName');

        $data['AddressID'] = $this->input->post('AddressID');

        if (empty($data['AddressID'])) {

            $this->load->model('Location_model');

            $data['AddressID'] = $this->Location_model->createLocation($userID);

            if ($data['AddressID'] == false) {

                return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);

            }

        }

        $data['EmailID'] = $this->input->post('EmailID');

        $data['PhoneNo'] = $this->input->post('PhoneNo');

        $data['MobileNo'] = $this->input->post('MobileNo');

        $data['FaxNo'] = $this->input->post('FaxNo');

        $data['CreatedBy'] = $userID;

        $data['IsActive'] = $this->input->post('IsActive');

        $data['CreatedBy'] = $userID;



        $require_fields = array('ManufacturerName');

        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');

        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);



        $manufacturer_information_entity = new ManufacturerInformationEntity($data);

        $manufacturer_information_data = $manufacturer_information_entity->getManufacturerEntityForUpdate();



        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');



        $this->db->set($manufacturer_information_data);

        $this->db->where('ID', $manufacturer_information_id);

        if($this->db->update('manufacturerinformation', $manufacturer_information_data)) {

            return $this->prepareErrorResponse(NO_ERROR);

        } else {

            return $this->prepareErrorResponse(ERROR_UNKNOWN);

        }

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

    }



    public function deleteManufacturer() {

        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));

        $id = $this->input->get('ManufacturerID');



        $data = array();

        $data['IsActive'] = 0;

        $data['IsDeleted'] = 1;

        $data['LastUpdate'] = date('Y-m-d H:i:s');

        $this->db->set($data);

        $this->db->where('ID', $id);

        $return = $this->db->update('manufacturerinformation');



        return $return;

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

    }



    public function getAllManufacturerInformation() {

        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));

        $this->db->select('m.ID, m.Name, m.AddressID, m.EmailID, m.PhoneNo, m.MobileNo, m.FaxNo, m.IsActive');

        $this->db->from('manufacturerinformation AS m');

        $this->db->where('m.IsDeleted', 0);

        $this->db->order_by('m.Name');

        $all_information = $this->db->get()->result_array();

//        echo $this->db->last_query();

        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');

        return $all_information;

    }

}

