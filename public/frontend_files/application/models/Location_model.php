<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/LocationEntity.php';

class Location_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function getAllActiveCities() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('ID');
        $this->db->select('Name');
        $this->db->from('city');
        $this->db->where('IsActive', 1);
        $this->db->where('IsDeleted', 0);
        $this->db->order_by("Name");
        $result = $this->db->get()->result_array();
//        log_message('debug', __METHOD__.'#'.__LINE__.' All Cities: '.print_r($result, true));
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $result;
    }

    public function getAllActiveCountries() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('ID');
        $this->db->select('Name');
        $this->db->from('country');
        $this->db->where('IsActive', 1);
        $this->db->where('IsDeleted', 0);
        $this->db->order_by("Name");
        return $this->db->get()->result_array();
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function createLocation($userID, $locationData = array()) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        if (empty($locationData)) {
            $data = array();
            $data['CountryID'] = $this->input->post('CountryID');
            $data['StateID'] = $this->input->post('StateID');
            $data['CityID'] = $this->input->post('CityID');
            $data['Address'] = $this->input->post('Address');
            $data['Longitude'] = $this->input->post('Longitude');
            $data['Latitude'] = $this->input->post('Latitude');
            $data['CreatedBy'] = $userID;
        } else {
            $data = $locationData;
        }
        $location_entity = new LocationEntity($data);
        $location_data = $location_entity->getLocationEntityForCreate();
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        if($this->db->insert('location', $location_data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function getAllLocationActiveInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $all_information = parent::getAllActiveInformation('location');
        $all_location_information = array();
        $total = 0;
        foreach ($all_information AS $information) {
            $location_entity = new LocationEntity($information);
            $all_location_information[$total++] = $location_entity->getLocationEntity();
        }

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $all_location_information;
    }

    public function getDetail($tableName, $id){
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $location_id = $this->input->get('LocationID');
        if ($location_id) {
            $location_detail = parent::getDetail('location', $location_id);
            if (empty($location_detail)) {
                return ERROR_INVALID_REQUEST;
            }

            $location_entity = new LocationEntity($location_detail);
            return $location_entity->getLocationEntity();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return ERROR_INVALID_REQUEST;
    }

    public function updateInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $location_id = $this->input->get('LocationID');
        if (empty($location_id)) {
            return false;
        }

        $data = array();
        $data['CountryID'] = $this->input->post('CountryID');
        $data['StateID'] = $this->input->post('StateID');
        $data['CityID'] = $this->input->post('CityID');
        $data['Address'] = $this->input->post('Address');
        $data['Longitude'] = $this->input->post('Longitude');
        $data['Latitude'] = $this->input->post('Latitude');

        $require_fields = array('CountryID', 'StateID', 'CityID', 'Address');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) {
            return $check_require_field_erro;
        }

        $location_entity = new LocationEntity($data);

        $location_data = $location_entity->getLocationEntityForUpdate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        $this->db->set($location_data);
        $this->db->where('ID', $location_id);
        if($this->db->update('location')) {
            return NO_ERROR;
        } else {
            return ERROR_UNKNOWN;
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function deleteLocationInformation($tableName) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        return parent::deleteInformation('location');
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function getAllExistingLocation() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select('l.ID, l.CountryID, l.StateID, l.CityID, l.Address, l.Longitude, l.Latitude, c.Name AS CountryName, s.Name AS StateName, ci.Name AS CityName');
        $this->db->from('location AS l');
        $this->db->join('country AS c', 'l.CountryID = c.ID', 'inner');
        $this->db->join('state AS s', 'l.StateID = s.ID', 'inner');
        $this->db->join('city AS ci', 'l.CityID = ci.ID', 'inner');
        $this->db->where('l.IsDeleted', 0);
        $this->db->where('c.IsDeleted', 0);
        $this->db->where('s.IsDeleted', 0);
        $this->db->where('ci.IsDeleted', 0);
        $this->db->order_by('c.Name, s.Name, ci.Name, l.Address');
        $all_existing_location = $this->db->get()->result_array();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_existing_location;
    }

    public function getDoctorCountry () {
        $sql = sprintf("SELECT `ID`, `Name` 
            FROM `%s` 
            WHERE `ID` IN (
                SELECT DISTINCT(`CountryID`)
                FROM `%s` AS l 
                INNER JOIN `%s` AS d ON (l.ID = d.`ChamberAddressID` AND l.IsDeleted = 0)
                WHERE d.`IsActive` = 1 AND d.IsDeleted = 0
            )
        ", $this->db->dbprefix('country'), $this->db->dbprefix('location'), $this->db->dbprefix('doctorinformation'));

        $country_info = $this->db->query($sql)->result_array();

        return $country_info;
    }
}
