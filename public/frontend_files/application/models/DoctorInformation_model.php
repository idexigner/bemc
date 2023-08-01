<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/DoctorInformationEntity.php';
class DoctorInformation_model extends GeneralData_model {
    public function __construct() {
        parent::__construct();
        $this->load->model('Location_model');
    }
    public function createDoctorInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        // $this->require_fields = array('DoctorName', 'ProfessionDegree', 'Gender');
       // $this->require_fields = array('DoctorName', 'email_id', 'PhoneNo');
        $this->request_type = 'post';
        $check_require_field_erro = parent::create();
        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);
        $data = array(); 
        $data['Name'] = $this->input->post('DoctorName');
        $data['Specialization'] = $this->input->post('Specialization');
        $data['PhoneNo'] = $this->input->post('PhoneNo');
        $data['email_id'] = $this->input->post('email_id');
        $data['clinic_phone'] = $this->input->post('clinic_phone');
        $data['achievement'] = $this->input->post('achievement');
        $data['experiance'] = $this->input->post('experiance');
        $data['clinic_address'] = $this->input->post('clinic_address');
        $data['clinic_country_id'] = $this->input->post('clinic_country_id');
        $data['clinic_state_id'] = $this->input->post('clinic_state_id');
        $data['clinic_city_id'] = $this->input->post('clinic_city_id');
        $data['clinic_zipcode'] = $this->input->post('clinic_zipcode');
        //$data['ProfessionDegree'] = $this->input->post('ProfessionDegree');
        $data['ProfessionDegree'] = ''; 
        // $data['Gender'] = $this->input->post('Gender');
//        $data['ImagePath'] = $this->input->post('ImagePath'); Already commented
        // $data['HomeAddressID'] = $this->input->post('HomeAddressID');
        // if (empty($data['HomeAddressID'])) {
        //     $location_data = array();
        //     $location_data['CountryID'] = $this->input->post('HomeCountryID');
        //     $location_data['StateID'] = $this->input->post('HomeStateID');
        //     $location_data['CityID'] = $this->input->post('HomeCityID');
        //     $location_data['Address'] = $this->input->post('HomeAddress');
        //     $location_data['Longitude'] = $this->input->post('HomeLongitude');
        //     $location_data['Latitude'] = $this->input->post('HomeLatitude');
        //     $location_data['CreatedBy'] = $userID;
        //     $data['HomeAddressID'] = $this->Location_model->createLocation($userID, $location_data);
        //     if ($data['HomeAddressID'] == false) {
        //         return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);
        //     }
        // }
        // $data['ChamberAddressID'] = $this->input->post('ChamberAddressID');
        // if (empty($data['ChamberAddressID'])) {
        //     $location_data = array();
        //     $location_data['CountryID'] = $this->input->post('ChamberCountryID');
        //     $location_data['StateID'] = $this->input->post('ChamberStateID');
        //     $location_data['CityID'] = $this->input->post('ChamberCityID');
        //     $location_data['Address'] = $this->input->post('ChamberAddress');
        //     $location_data['Longitude'] = $this->input->post('ChamberLongitude');
        //     $location_data['Latitude'] = $this->input->post('ChamberLatitude');
        //     $location_data['CreatedBy'] = $userID;
        //     $data['ChamberAddressID'] = $this->Location_model->createLocation($userID, $location_data);
        //     if ($data['ChamberAddressID'] == false) {
        //         return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);
        //     }
        // }
        
        // $data['MobileNo1'] = $this->input->post('MobileNo1');
        // $data['MobileNo2'] = $this->input->post('MobileNo2');
        // $data['MobileNo3'] = $this->input->post('MobileNo3');
        // $data['Hotline'] = $this->input->post('Hotline');
        $data['CreatedBy'] = $userID;
        $doctor_information_entity = new DoctorInformationEntity($data);
        $doctor_information_data = $doctor_information_entity->getDoctorEntityForCreate();
        // $doctor_information_data['IsActive'] = $this->input->post('IsActive');
        $doctor_information_data['IsActive'] = 1;
        log_message('debug', __METHOD__.'#'.__LINE__.' Doctor Data: '.print_r($data, true));
        if($this->db->insert('doctorinformation', $doctor_information_data)) {
            $doctor_id = $this->db->insert_id();
            if (isset($_FILES["ImagePath"]) && $_FILES["ImagePath"]['tmp_name']){
                $upload_data = $this->util->upload('DoctorImages', 'ImagePath');
                if ($upload_data) {
                    $data = array();
                    $data['ImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $doctor_id);
                    if($this->db->update('doctorinformation')) {
                        $this->load->model('Email_model');
                        $this->Email_model->sendNewDoctorEntryEmail($doctor_id);
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteDoctor($doctor_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteDoctor($doctor_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
            if (isset($_FILES["certificate"]) && $_FILES["certificate"]['tmp_name']){
                $upload_data = $this->util->upload('doctorCertificate', 'certificate');
                if ($upload_data) {
                    $data = array();
                    $data['certificate'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $doctor_id);
                    if($this->db->update('doctorinformation')) {
                        $this->load->model('Email_model');
                        $this->Email_model->sendNewDoctorEntryEmail($doctor_id);
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteDoctor($doctor_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteDoctor($doctor_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
            $this->load->model('Email_model');
            $this->Email_model->sendNewDoctorEntryEmail($doctor_id);
            return $this->prepareErrorResponse(NO_ERROR);
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }
    public function getAllDoctorInformation() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select("d.ID");
        $this->db->select("d.Name");
        $this->db->select("d.Specialization");
        $this->db->select("d.ProfessionDegree");
        $this->db->select("d.Gender");
        $this->db->select("d.ImagePath");
        $this->db->select("d.PhoneNo");
        $this->db->select("d.MobileNo1");
        $this->db->select("d.MobileNo2");
        $this->db->select("d.MobileNo3");
        $this->db->select("d.Hotline");
        $this->db->select("d.IsActive");
        $this->db->select("CONCAT(cl.Address, ', City: ', cci.Name, ', State: ', cs.Name, ', Country:', cc.Name) AS ChamberAddress");
        $this->db->select("CONCAT(hl.Address, ', City: ', hci.Name, ', State: ', hs.Name, ', Country:', hc.Name) AS HomeAddress");
        $this->db->select("cc.Name AS cCountryName");
        $this->db->select("cs.Name AS sStateName");
        $this->db->select("cci.Name AS cCityName");
        $this->db->select("hc.Name AS hCountryName");
        $this->db->select("hs.Name AS hStateName");
        $this->db->select("hci.Name AS hCityName");
        $this->db->from('doctorinformation AS d');
        $this->db->join('location AS cl', 'cl.ID = d.ChamberAddressID AND cl.IsDeleted = 0', 'left');
        $this->db->join('country AS cc', 'cl.CountryID = cc.ID AND cc.IsActive = 1 AND cc.IsDeleted = 0', 'left');
        $this->db->join('state AS cs', 'cl.StateID = cs.ID AND cs.IsActive = 1 AND cs.IsDeleted = 0', 'left');
        $this->db->join('city AS cci', 'cl.CityID = cci.ID AND cci.IsActive = 1 AND cci.IsDeleted = 0', 'left');
        $this->db->join('location AS hl', 'hl.ID = d.HomeAddressID AND hl.IsDeleted = 0', 'left');
        $this->db->join('country AS hc', 'hl.CountryID = hc.ID AND hc.IsActive = 1 AND hc.IsDeleted = 0', 'left');
        $this->db->join('state AS hs', 'hl.StateID = hs.ID AND hs.IsActive = 1 AND hs.IsDeleted = 0', 'left');
        $this->db->join('city AS hci', 'hl.CityID = hci.ID AND hci.IsActive = 1 AND hci.IsDeleted = 0', 'left');
        $this->db->where('d.IsDeleted', 0);
        $all_information = $this->db->get()->result_array();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }
	public function getAllDoctorInformationForAdmin() 
    {
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$this->db->select("d.*");
		// $this->db->select("d.Name");
		// $this->db->select("d.Specialization");
		// $this->db->select("d.ProfessionDegree");
		// $this->db->select("d.Gender");
		$this->db->from('doctorinformation AS d');
		$this->db->where('d.IsDeleted', 0); 
        $this->db->order_by('d.ID','DESC');  
        $this->db->limit(100); 
		$all_information = $this->db->get()->result_array();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $all_information;
	}
    public function getAllActiveDoctorInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $page_no = $this->input->get('PageNo');
        $page_no = empty($page_no) ? 1 : $page_no;
        $this->db->select("d.ID");
        $this->db->select("d.Name");
        $this->db->select("d.Specialization");
        $this->db->select("d.ProfessionDegree");
        $this->db->select("d.Gender");
        $this->db->select("d.ImagePath");
        $this->db->select("d.PhoneNo");
        $this->db->select("d.MobileNo1");
        $this->db->select("d.MobileNo2");
        $this->db->select("d.MobileNo3");
        $this->db->select("d.Hotline");
        $this->db->select("d.IsActive");
        $this->db->select("CONCAT(cl.Address, ', City: ', cci.Name, ', State: ', cs.Name, ', Country:', cc.Name) AS ChamberAddress");
        $this->db->select("CONCAT(hl.Address, ', City: ', hci.Name, ', State: ', hs.Name, ', Country:', hc.Name) AS HomeAddress");
        $this->db->select("cc.Name AS cCountryName");
        $this->db->select("cs.Name AS sStateName");
        $this->db->select("cci.Name AS cCityName");
        $this->db->select("hc.Name AS hCountryName");
        $this->db->select("hs.Name AS hStateName");
        $this->db->select("hci.Name AS hCityName");
        $this->db->from('doctorinformation AS d');
        $this->db->join('location AS cl', 'cl.ID = d.ChamberAddressID AND cl.IsDeleted = 0', 'left');
        $this->db->join('country AS cc', 'cl.CountryID = cc.ID AND cc.IsActive = 1 AND cc.IsDeleted = 0', 'left');
        $this->db->join('state AS cs', 'cl.StateID = cs.ID AND cs.IsActive = 1 AND cs.IsDeleted = 0', 'left');
        $this->db->join('city AS cci', 'cl.CityID = cci.ID AND cci.IsActive = 1 AND cci.IsDeleted = 0', 'left');
        $this->db->join('location AS hl', 'hl.ID = d.HomeAddressID AND hl.IsDeleted = 0', 'left');
        $this->db->join('country AS hc', 'hl.CountryID = hc.ID AND hc.IsActive = 1 AND hc.IsDeleted = 0', 'left');
        $this->db->join('state AS hs', 'hl.StateID = hs.ID AND hs.IsActive = 1 AND hs.IsDeleted = 0', 'left');
        $this->db->join('city AS hci', 'hl.CityID = hci.ID AND hci.IsActive = 1 AND hci.IsDeleted = 0', 'left');
        $this->db->where('d.IsActive', 1);
        $this->db->where('d.IsDeleted', 0);
        $this->db->limit(config_item('per_page_doctor_information_number'), ($page_no - 1) * config_item('per_page_doctor_information_number'));
        $all_doctor_information = $this->db->get()->result_array();
        $this->db->select("d.ID");
        $this->db->from('doctorinformation AS d');
        $this->db->join('location AS cl', 'cl.ID = d.ChamberAddressID AND cl.IsDeleted = 0', 'left');
        $this->db->join('country AS cc', 'cl.CountryID = cc.ID AND cc.IsActive = 1 AND cc.IsDeleted = 0', 'left');
        $this->db->join('state AS cs', 'cl.StateID = cs.ID AND cs.IsActive = 1 AND cs.IsDeleted = 0', 'left');
        $this->db->join('city AS cci', 'cl.CityID = cci.ID AND cci.IsActive = 1 AND cci.IsDeleted = 0', 'left');
        $this->db->join('location AS hl', 'hl.ID = d.HomeAddressID AND hl.IsDeleted = 0', 'left');
        $this->db->join('country AS hc', 'hl.CountryID = hc.ID AND hc.IsActive = 1 AND hc.IsDeleted = 0', 'left');
        $this->db->join('state AS hs', 'hl.StateID = hs.ID AND hs.IsActive = 1 AND hs.IsDeleted = 0', 'left');
        $this->db->join('city AS hci', 'hl.CityID = hci.ID AND hci.IsActive = 1 AND hci.IsDeleted = 0', 'left');
        $this->db->where('d.IsActive', 1);
        $this->db->where('d.IsDeleted', 0);
        $all_information = $this->db->get()->result_array();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return array($all_doctor_information, count($all_information));
    }
    public function getDoctorDetailInformation() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $doctor_id = $this->input->get('DoctorID');
        if ($doctor_id) {
            // $this->db->select("d.ID");
            $this->db->select("d.*");
            // $this->db->select("d.email_id");
            // $this->db->select("d.clinic_phone");
            // $this->db->select("d.achievement");
            // $this->db->select("d.experiance");
            // $this->db->select("d.clinic_address");
            // $this->db->select("d.clinic_country_id");
            // $this->db->select("d.clinic_state_id");
            // $this->db->select("d.clinic_city_id");
            // $this->db->select("d.clinic_zipcode");
            // $this->db->select("d.bio_notes");
            // $this->db->select("d.certificate");
            // $this->db->select("d.Specialization");
            // $this->db->select("d.ProfessionDegree");
            // $this->db->select("d.Gender");
            // $this->db->select("d.ImagePath");
            // $this->db->select("d.PhoneNo");
            // $this->db->select("d.MobileNo1");
            // $this->db->select("d.MobileNo2");
            // $this->db->select("d.MobileNo3");
            // $this->db->select("d.Hotline");
            // $this->db->select("d.ChamberAddressID");
            // $this->db->select("d.HomeAddressID");
            // $this->db->select("d.IsActive");
            $this->db->select("CONCAT(cl.Address, ', City: ', cci.Name, ', State: ', cs.Name, ', Country:', cc.Name) AS ChamberAddress");
            $this->db->select("CONCAT(hl.Address, ', City: ', hci.Name, ', State: ', hs.Name, ', Country:', hc.Name) AS HomeAddress");
            $this->db->select("cc.Name AS cCountryName");
            $this->db->select("cs.Name AS sStateName");
            $this->db->select("cci.Name AS cCityName");
            $this->db->select("hc.Name AS hCountryName");
            $this->db->select("hs.Name AS hStateName");
            $this->db->select("hci.Name AS hCityName");
            $this->db->from('doctorinformation AS d');
            $this->db->join('location AS cl', 'cl.ID = d.ChamberAddressID AND cl.IsDeleted = 0', 'left');
            $this->db->join('country AS cc', 'cl.CountryID = cc.ID AND cc.IsActive = 1 AND cc.IsDeleted = 0', 'left');
            $this->db->join('state AS cs', 'cl.StateID = cs.ID AND cs.IsActive = 1 AND cs.IsDeleted = 0', 'left');
            $this->db->join('city AS cci', 'cl.CityID = cci.ID AND cci.IsActive = 1 AND cci.IsDeleted = 0', 'left');
            $this->db->join('location AS hl', 'hl.ID = d.HomeAddressID AND hl.IsDeleted = 0', 'left');
            $this->db->join('country AS hc', 'hl.CountryID = hc.ID AND hc.IsActive = 1 AND hc.IsDeleted = 0', 'left');
            $this->db->join('state AS hs', 'hl.StateID = hs.ID AND hs.IsActive = 1 AND hs.IsDeleted = 0', 'left');
            $this->db->join('city AS hci', 'hl.CityID = hci.ID AND hci.IsActive = 1 AND hci.IsDeleted = 0', 'left');
            $this->db->where('d.ID', $doctor_id);
            $this->db->where('d.IsDeleted', 0);
            $this->db->limit(1);
            $doctor_information = $this->db->get()->result_array();
//            echo $this->db->last_query();
            return isset($doctor_information[0]['ID']) ? $doctor_information[0] : array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
    }
    public function updateDoctorInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $doctor_id = $this->input->get('DoctorID');
        if (empty($doctor_id)) {
            return false;
        }
        $data = array();
        $data['Name'] = $this->input->post('DoctorName');
        $data['Specialization'] = $this->input->post('Specialization');
        $data['email_id'] = $this->input->post('email_id');
        $data['clinic_phone'] = $this->input->post('clinic_phone');
        $data['achievement'] = $this->input->post('achievement');
        $data['experiance'] = $this->input->post('experiance');
        $data['clinic_address'] = $this->input->post('clinic_address');
        $data['clinic_country_id'] = $this->input->post('clinic_country_id');
        $data['clinic_state_id'] = $this->input->post('clinic_state_id');
        $data['clinic_city_id'] = $this->input->post('clinic_city_id');
        $data['clinic_zipcode'] = $this->input->post('clinic_zipcode');
        // $data['ProfessionDegree'] = $this->input->post('ProfessionDegree');
        // $data['Gender'] = $this->input->post('Gender');
//        $data['ImagePath'] = $this->input->post('ImagePath');
        // $data['HomeAddressID'] = $this->input->post('HomeAddressID');
        // if (empty($data['HomeAddressID'])) {
        //     $location_data = array();
        //     $location_data['CountryID'] = $this->input->post('HomeCountryID');
        //     $location_data['StateID'] = $this->input->post('HomeStateID');
        //     $location_data['CityID'] = $this->input->post('HomeCityID');
        //     $location_data['Address'] = $this->input->post('HomeAddress');
        //     $location_data['Longitude'] = $this->input->post('HomeLongitude');
        //     $location_data['Latitude'] = $this->input->post('HomeLatitude');
        //     $location_data['CreatedBy'] = $userID;
        //     $data['HomeAddressID'] = $this->Location_model->createLocation($userID, $location_data);
        //     if ($data['HomeAddressID'] == false) {
        //         return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);
        //     }
        // }
        // $data['ChamberAddressID'] = $this->input->post('ChamberAddressID');
        // if (empty($data['ChamberAddressID'])) {
        //     $location_data = array();
        //     $location_data['CountryID'] = $this->input->post('ChamberCountryID');
        //     $location_data['StateID'] = $this->input->post('ChamberStateID');
        //     $location_data['CityID'] = $this->input->post('ChamberCityID');
        //     $location_data['Address'] = $this->input->post('ChamberAddress');
        //     $location_data['Longitude'] = $this->input->post('ChamberLongitude');
        //     $location_data['Latitude'] = $this->input->post('ChamberLatitude');
        //     $location_data['CreatedBy'] = $userID;
        //     $data['ChamberAddressID'] = $this->Location_model->createLocation($userID, $location_data);
        //     if ($data['ChamberAddressID'] == false) {
        //         return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);
        //     }
        // }
        $data['PhoneNo'] = $this->input->post('PhoneNo');
        // $data['MobileNo1'] = $this->input->post('MobileNo1');
        // $data['MobileNo2'] = $this->input->post('MobileNo2');
        // $data['MobileNo3'] = $this->input->post('MobileNo3');
        // $data['Hotline'] = $this->input->post('Hotline');
        $data['CreatedBy'] = $userID;
        //$require_fields = array('DoctorName', 'ProfessionDegree', 'Gender');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) {
            return $this->prepareErrorResponse($check_require_field_erro);
        }
        $doctor_information_entity = new DoctorInformationEntity($data);
        $doctor_information_data = $doctor_information_entity->getDoctorEntityForUpdate();
        $doctor_information_data['IsActive'] = $this->input->post('IsActive');
        $this->db->set($doctor_information_data);
        $this->db->where('ID', $doctor_id);
        if($this->db->update('doctorinformation')) {
            if (isset($_FILES["ImagePath"]) && $_FILES["ImagePath"]['tmp_name']){
                $upload_data = $this->util->upload('DoctorImages', 'ImagePath');
                if ($upload_data) {
                    $data = array();
                    $data['ImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $doctor_id);
                    if($this->db->update('doctorinformation')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteDoctor($doctor_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteDoctor($doctor_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
            if (isset($_FILES["certificate"]) && $_FILES["certificate"]['tmp_name']){
                $upload_data = $this->util->upload('doctorCertificate', 'certificate');
                if ($upload_data) {
                    $data = array();
                    $data['certificate'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $doctor_id);
                    if($this->db->update('doctorinformation')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteDoctor($doctor_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteDoctor($doctor_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }
    public function deleteDoctor() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $id = $this->input->get('DoctorID');
        $data = array();
        $data['IsActive'] = 0;
        $data['IsDeleted'] = 1;
        $data['LastUpdate'] = date('Y-m-d H:i:s');
        $this->db->set($data);
        $this->db->where('ID', $id);
        $return = $this->db->update('doctorinformation');
        return $return;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }
    public function search($doctorCountry, $doctorCity, $doctorSpecialty, $doctorGender) {
        $page_no = $this->input->get('PageNo');
        $page_no = empty($page_no) ? 1 : $page_no;
        $this->db->select("d.ID");
        $this->db->select("d.Name");
        $this->db->select("d.Specialization");
        $this->db->select("d.ProfessionDegree");
        $this->db->select("d.Gender");
        $this->db->select("d.ImagePath");
        $this->db->select("d.PhoneNo");
        $this->db->select("d.MobileNo1");
        $this->db->select("d.MobileNo2");
        $this->db->select("d.MobileNo3");
        $this->db->select("d.Hotline");
        $this->db->select("d.IsActive");
        $this->db->select("CONCAT(cl.Address, ', City: ', cci.Name, ', State: ', cs.Name, ', Country:', cc.Name) AS ChamberAddress");
        $this->db->select("CONCAT(hl.Address, ', City: ', hci.Name, ', State: ', hs.Name, ', Country:', hc.Name) AS HomeAddress");
        $this->db->select("cc.Name AS cCountryName");
        $this->db->select("cs.Name AS sStateName");
        $this->db->select("cci.Name AS cCityName");
        $this->db->select("hc.Name AS hCountryName");
        $this->db->select("hs.Name AS hStateName");
        $this->db->select("hci.Name AS hCityName");
        $this->db->from('doctorinformation AS d');
        $this->db->join('location AS cl', 'cl.ID = d.ChamberAddressID AND cl.IsDeleted = 0', 'left');
        $this->db->join('country AS cc', 'cl.CountryID = cc.ID AND cc.IsActive = 1 AND cc.IsDeleted = 0', 'left');
        $this->db->join('state AS cs', 'cl.StateID = cs.ID AND cs.IsActive = 1 AND cs.IsDeleted = 0', 'left');
        $this->db->join('city AS cci', 'cl.CityID = cci.ID AND cci.IsActive = 1 AND cci.IsDeleted = 0', 'left');
        $this->db->join('location AS hl', 'hl.ID = d.HomeAddressID AND hl.IsDeleted = 0', 'left');
        $this->db->join('country AS hc', 'hl.CountryID = hc.ID AND hc.IsActive = 1 AND hc.IsDeleted = 0', 'left');
        $this->db->join('state AS hs', 'hl.StateID = hs.ID AND hs.IsActive = 1 AND hs.IsDeleted = 0', 'left');
        $this->db->join('city AS hci', 'hl.CityID = hci.ID AND hci.IsActive = 1 AND hci.IsDeleted = 0', 'left');
        $this->db->where('d.IsActive', 1);
        $this->db->where('d.IsDeleted', 0);
        if ($doctorGender) {
            $this->db->where('d.Gender', $doctorGender);
        }
        if ($doctorCity) {
            $where = sprintf("(LOWER(cs.Name) = '%s' OR LOWER(cci.Name) = '%s' OR LOWER(hs.Name) = '%s' OR LOWER(hci.Name) = '%s')", $doctorCity, $doctorCity, $doctorCity, $doctorCity);
            $this->db->where($where);
        }
        if ($doctorCountry) {
            $this->db->where('cl.CountryID', $doctorCountry);
        }
        if ($doctorSpecialty) {
            $this->db->like('LOWER(d.Specialization)', strtolower($doctorSpecialty));
        }
        $this->db->limit(config_item('per_page_doctor_information_number'), ($page_no - 1) * config_item('per_page_doctor_information_number'));
        $all_doctor_information = $this->db->get()->result_array();
        $this->db->select('d.ID');
        $this->db->from('doctorinformation AS d');
        $this->db->join('location AS cl', 'cl.ID = d.ChamberAddressID AND cl.IsDeleted = 0', 'left');
        $this->db->join('location AS hl', 'hl.ID = d.HomeAddressID AND hl.IsDeleted = 0', 'left');
        $this->db->where('d.IsActive', 1);
        $this->db->where('d.IsDeleted', 0);
        if ($doctorGender) {
            $this->db->where('d.Gender', $doctorGender);
        }
        if ($doctorCity) {
            $this->db->where('cl.CityID', $doctorCity);
        }
        if ($doctorCountry) {
            $this->db->like('cl.CountryID', $doctorCountry);
        }
        if ($doctorSpecialty) {
            $this->db->like('LOWER(d.Specialization)', strtolower($doctorSpecialty));
        }
        $all_information = $this->db->get()->result_array();
        return array($all_doctor_information, count($all_information));
    }
    public function getAllSpecialty () {
        $sql = sprintf("SELECT DISTINCT(Specialization) AS Specialization FROM %s WHERE IsActive = 1 AND Specialization <> '' AND Specialization <> '0'", $this->db->dbprefix('doctorinformation'));
        $result = $this->db->query($sql)->result_array();
//        log_message('debug', __METHOD__.'#'.__LINE__.' All Specialization: '.print_r($result, true));
        $all_specialty = array();
        foreach ($result AS $specialty) {
            if (strpos($specialty['Specialization'], ',') === false) {
                $all_specialty[] = strtoupper(trim($specialty['Specialization']));
            } else {
                $temp = explode(',', $specialty['Specialization']);
                foreach ($temp AS $data) {
                    $all_specialty[] = strtoupper(trim($data));
                }
            }
        }
//        log_message('debug', __METHOD__.'#'.__LINE__.' All Specialization: '.print_r($all_specialty, true));
        $unique_specialty = array_unique($all_specialty);
//        log_message('debug', __METHOD__.'#'.__LINE__.' All Specialization: '.print_r($unique_specialty, true));
        sort($unique_specialty);
//        log_message('debug', __METHOD__.'#'.__LINE__.' All Specialization: '.print_r($unique_specialty, true));
        return $unique_specialty;
    }
}
