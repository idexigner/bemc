<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**

 * Created by Amalesh Debnath

 * Date: 2016/5/21

 * Time: 02:30 PM

 * All Right Reserved by the creator

 */

require_once APPPATH.'models/GeneralData_model.php';

require_once APPPATH.'libraries/entities/AdvertisementPositionInformationEntity.php';



class AdvertisementPositionInformation_model extends GeneralData_model {



    public function __construct() {

        parent::__construct();

        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());

    }



    public function createAdvertisementPositionInformation($userID) {

        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));

        $this->require_fields = array('AdvertisementPositionName', 'ImageWidth', 'ImageHeight', 'NumberOfAdvertisement', 'Interval');

        $this->request_type = 'post';

        $check_require_field_erro = parent::create();

        if ($check_require_field_erro != NO_ERROR) return $check_require_field_erro;



        $data = array();

        $data['Name'] = $this->input->post('AdvertisementPositionName');

        $data['ClassName'] = $this->input->post('ClassName');

        $data['ImageWidth'] = $this->input->post('ImageWidth');

        $data['ImageHeight'] = $this->input->post('ImageHeight');

        $data['NumberOfAdvertisement'] = $this->input->post('NumberOfAdvertisement');

        $data['Interval'] = $this->input->post('Interval');

        $data['PriceInBDT'] = $this->input->post('PriceInBDT');

        $data['CreatedBy'] = $userID;

        $advertisement_position_information_entity = new AdvertisementPositionInformationEntity($data);

        $advertisement_position_information_data = $advertisement_position_information_entity->getAdvertisementPositionInformationEntityForCreate();



        if (empty($advertisement_position_information_data)) {

            return ERROR_INVALID_EMAIL_ID;

        }

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        if($this->db->insert('advertisementpositioninformation', $advertisement_position_information_data)) {

            return NO_ERROR;

        } else {

            return ERROR_UNKNOWN;

        }

    }



    public function getAllAdvertisementPositionInformationActiveInformation() {

        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));

        $all_information = parent::getAllActiveInformation('advertisementpositioninformation');

        $all_advertisement_position_information_information = array();

        $total = 0;

        foreach ($all_information AS $information) {

            $advertisement_position_information_entity = new AdvertisementPositionInformationEntity($information);

            $all_advertisement_position_information_information[$total++] = $advertisement_position_information_entity->getAdvertisementPositionInformationEntity();

        }



        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        return $all_advertisement_position_information_information;

    }
    



    public function getDetail($tableName, $id){

        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));

        $advertisement_position_information_id = $this->input->get('AdvertisementPositionInformationID');

        if ($advertisement_position_information_id) {

            $advertisement_position_information_detail = parent::getDetail('advertisementpositioninformation', $advertisement_position_information_id);

            if (empty($advertisement_position_information_detail)) {

                return ERROR_INVALID_REQUEST;

            }



            $advertisement_position_information_entity = new AdvertisementPositionInformationEntity($advertisement_position_information_detail);

            return $advertisement_position_information_entity->getAdvertisementPositionInformationEntity();

        }

        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');

        return ERROR_INVALID_REQUEST;

    }



    public function updateInformation() {

        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));

        $advertisement_position_information_id = $this->input->get('AdvertisementPositionInformationID');

        if (empty($advertisement_position_information_id)) {

            return false;

        }



        $data = array();

        $data['Name'] = $this->input->post('AdvertisementPositionName');

        $data['ClassName'] = $this->input->post('ClassName');

        $data['ImageWidth'] = $this->input->post('ImageWidth');

        $data['ImageHeight'] = $this->input->post('ImageHeight');

        $data['NumberOfAdvertisement'] = $this->input->post('NumberOfAdvertisement');

        $data['Interval'] = $this->input->post('Interval');

        $data['PriceInBDT'] = $this->input->post('PriceInBDT');



        $require_fields = array('AdvertisementPositionName', 'ImageWidth', 'ImageHeight', 'NumberOfAdvertisement', 'Interval');

        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');

        if ($check_require_field_erro != NO_ERROR) {

            return $check_require_field_erro;

        }



        $advertisement_position_information_entity = new AdvertisementPositionInformationEntity($data);



        $advertisement_position_information_data = $advertisement_position_information_entity->getAdvertisementPositionInformationEntityForUpdate();



        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');



        $this->db->set($advertisement_position_information_data);

        $this->db->where('ID', $advertisement_position_information_id);

        if($this->db->update('advertisementpositioninformation')) {

            return NO_ERROR;

        } else {

            return ERROR_UNKNOWN;

        }

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

    }



    public function deleteAdvertisementPositionInformation($tableName) {

        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));

        return parent::deleteInformation('advertisementpositioninformation');

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

    }



    public function getAllAdvertisementPosition() {

        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));

        $this->db->select('p.ID, p.Name, p.ClassName, p.ImageWidth, p.ImageHeight, p.NumberOfAdvertisement, p.Interval, p.PriceInBDT');

        $this->db->from('advertisementpositioninformation AS p');

        $this->db->where('p.IsDeleted', 0);

        $this->db->order_by('p.Name');

        $all_information = $this->db->get()->result_array();

//        echo $this->db->last_query();

        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');

        return $all_information;

    }
    public function getAllAdvertisementPositionid($id) {

        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));

        $this->db->select('p.ID, p.Name, p.ClassName, p.ImageWidth, p.ImageHeight, p.NumberOfAdvertisement, p.Interval, p.PriceInBDT');

        $this->db->from('advertisementpositioninformation AS p');

        $this->db->where('p.IsDeleted', 0);
        $this->db->where('p.ID', $id);

        $this->db->order_by('p.Name');

        $all_information = $this->db->get()->result_array();

//        echo $this->db->last_query();

        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');

        return $all_information;

    }


    public function getAdvertisementPositionDetail($advertisementPositionID) {

        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));

        $this->db->select('p.ID, p.Name, p.ClassName, p.ImageWidth, p.ImageHeight, p.NumberOfAdvertisement, p.Interval, p.PriceInBDT');

        $this->db->from('advertisementpositioninformation AS p');

        $this->db->where('p.ID', $advertisementPositionID);

        $this->db->where('p.IsActive', 1);

        $this->db->where('p.IsDeleted', 0);

        $this->db->limit(1);

        $advertisement_position_detail = $this->db->get()->result_array();

//        echo $this->db->last_query();

        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');

        return isset($advertisement_position_detail[0]['ID']) ? $advertisement_position_detail[0] : array();

    }

}

