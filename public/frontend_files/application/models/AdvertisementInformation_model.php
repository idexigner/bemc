<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/AdvertisementInformationEntity.php';
class AdvertisementInformation_model extends GeneralData_model {
    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }
    public function addNewAdvertisement($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $advertisement_id = false;
        $this->require_fields = array('Organization', 'PublishDate', 'UnpublishedDate', 'AdvertisementPositionID');
        $this->request_type = 'post';
        $check_require_field_erro = parent::create();
        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);
        $data = array();
        $data['Organization'] = $this->input->post('Organization');
        $data['Title'] = $this->input->post('Title');
        $data['BodyText'] = $this->input->post('BodyText');
        $data['LinkURL'] = $this->input->post('LinkURL');
        $data['ApplicableFor'] = $this->input->post('ApplicableFor');
        $data['PublishDate'] = $this->util->convertToDate($this->input->post('PublishDate'));
        $data['UnpublishedDate'] = $this->util->convertToDate($this->input->post('UnpublishedDate'));
        $data['AdvertisementPositionID'] = $this->input->post('AdvertisementPositionID');
        $data['ContactPerson'] = $this->input->post('ContactPerson');
        $data['EmailID'] = $this->input->post('EmailID');
        $data['MobileNo'] = $this->input->post('MobileNo');
        $data['CreatedBy'] = $userID;
        $advertisement_information_entity = new AdvertisementInformationEntity($data);
        $advertisement_information_data = $advertisement_information_entity->getAdvertisementInformationEntityForCreate();
        $advertisement_information_data['IsActive'] = $this->input->post('IsActive');
        if (empty($advertisement_information_data)) {
            return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);
        }
        //log_message('debug', __METHOD__.'#'.__LINE__.' Advertisement Data: '.print_r($data, true));
        if($this->db->insert('advertisementinformation', $advertisement_information_data)) {

          //log_message('debug', __METHOD__.'#'.__LINE__.' SQL Statement: '.$this->db->last_query());
             $advertisement_id = $this->db->insert_id();
            
            $this->load->model('AdvertisementPositionInformation_model');
            $this->load->model('CategoryWiseAdvertisement_model');
            if($this->input->post('AdvertisementCategoryID')!='')
            {
                $data1 = array();
                $data1['CategoryID'] = $this->input->post('AdvertisementCategoryID');
                $data1['CategoryValue'] = $data1['CategoryID'] == 3 ? 0 : $this->input->post('AdvertisementCategoryValue');
                $data1['CategoryTextValue'] = $data1['CategoryID'] == 3 ? $this->input->post('AdvertisementCategoryValue') : '';
                $data1['AdvertisementID'] = $advertisement_id;
                $data1['CreatedBy'] = $userID;
                $data1['IsActive'] = $this->input->post('IsActive');
                $this->CategoryWiseAdvertisement_model->createAdvertisementInformatiobycategory($data1);
            }
            
            $advertisement_position_detail = $this->AdvertisementPositionInformation_model->getAdvertisementPositionDetail($data['AdvertisementPositionID']);
            // print_r($_FILES['ImagePath']);
            // echo "ravi123589";
            //     die;
            if (isset($_FILES["ImagePath"]) && $_FILES["ImagePath"]['tmp_name'] && $advertisement_position_detail['ID']){
                // echo "ravi123";
                // die;
//                $max_width = $advertisement_position_detail['ImageWidth'];
//                $max_height = $advertisement_position_detail['ImageHeight'];
                $upload_data = $this->util->upload('AdvertisementImages', 'ImagePath', 0, 0, 0);
                if ($upload_data) {
                    //echo "ravi";
                    $data = array();
                    $data['ImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $advertisement_id);
                    if(!$this->db->update('advertisementinformation')) {
                        $this->deleteAdvertisement($advertisement_id);
//                        log_message('debug', __METHOD__.'#'.__LINE__.' SQL Statement: '.$this->db->last_query());
                        $advertisement_id = false;
                    }
//                    log_message('debug', __METHOD__.'#'.__LINE__.' SQL Statement: '.$this->db->last_query());
                } else {
                    $this->deleteAdvertisement($advertisement_id);
//                    log_message('debug', __METHOD__.'#'.__LINE__.' SQL Statement: '.$this->db->last_query());
                    $advertisement_id = false;
                }
            } else {
                $this->deleteAdvertisement($advertisement_id);
//                log_message('debug', __METHOD__.'#'.__LINE__.' SQL Statement: '.$this->db->last_query());
                $advertisement_id = false;
            }
        }
        return $advertisement_id;
    }
    public function createAdvertisementInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $advertisement_id = $this->addNewAdvertisement($userID);
        if($advertisement_id) {
            return $this->prepareErrorResponse(NO_ERROR);
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }
    public function getAllAdvertisementInformation() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select('a.ID, a.Organization, a.Title, a.BodyText, a.LinkURL, a.ImagePath, a.PublishDate, a.UnpublishedDate, a.AdvertisementPositionID, a.IsActive, a.ContactPerson, a.EmailID, a.MobileNo, p.Name AS PositionName');
        $this->db->from('advertisementinformation AS a');
        $this->db->join('advertisementpositioninformation AS p', 'a.AdvertisementPositionID = p.ID', 'inner');
        //$this->db->where(sprintf('a.ID NOT IN (SELECT AdvertisementID FROM %s)', $this->db->dbprefix('categorywiseadvertisement')));
         $this->db->where('a.IsDeleted', 0);
        // $this->db->where('a.ID', 992);
         $this->db->where('p.IsDeleted', 0);
        $this->db->order_by('a.ID desc');
        $this->db->order_by('a.IsActive desc');
        $result = $this->db->get()->result_array();
        $advertisement_information = array();
        $total = 0;
        foreach ($result AS $info) {
            $info['PublishDate'] = substr($info['PublishDate'], 0, 10);
            $info['UnpublishedDate'] = substr($info['UnpublishedDate'], 0, 10);
            $advertisement_information[$total++] = $info;
        }
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $advertisement_information;
    }
    public function getAdvertisementDetailInformation() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $advertisement_id = $this->input->get('AdvertisementID');
        if ($advertisement_id) {
            $this->db->select('a.ID, a.Organization, a.Title, a.BodyText, a.LinkURL, a.ImagePath, a.PublishDate, a.UnpublishedDate, a.AdvertisementPositionID, a.IsActive, a.ContactPerson, a.EmailID, a.MobileNo');
            $this->db->from('advertisementinformation AS a');
            $this->db->where('a.IsDeleted', 0);
            $this->db->where('a.ID', $advertisement_id);
            $this->db->limit(1);
            $advertisement_information = $this->db->get()->result_array();
            if (isset($advertisement_information[0]['ID'])) {
                $advertisement_information[0]['PublishDate'] = substr($advertisement_information[0]['PublishDate'], 0, 10);
                $advertisement_information[0]['PublishDate'] = str_replace('-','/', $advertisement_information[0]['PublishDate']);
                $advertisement_information[0]['UnpublishedDate'] = substr($advertisement_information[0]['UnpublishedDate'], 0, 10);
                $advertisement_information[0]['UnpublishedDate'] = str_replace('-','/', $advertisement_information[0]['UnpublishedDate']);
                return $advertisement_information[0];
            }
            return array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
    }
    public function updateAdvertisementInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $advertisement_id = $this->input->get('AdvertisementID');
        if (empty($advertisement_id)) {
            return false;
        }
        $data = array();
        $data['Organization'] = $this->input->post('Organization');
        $data['Title'] = $this->input->post('Title');
        $data['BodyText'] = $this->input->post('BodyText');
        $data['LinkURL'] = $this->input->post('LinkURL');
        $data['ApplicableFor'] = $this->input->post('ApplicableFor');
        $data['PublishDate'] = $this->input->post('PublishDate');
        $data['UnpublishedDate'] = $this->input->post('UnpublishedDate');
        $data['AdvertisementPositionID'] = $this->input->post('AdvertisementPositionID');
        $data['ContactPerson'] = $this->input->post('ContactPerson');
        $data['EmailID'] = $this->input->post('EmailID');
        $data['MobileNo'] = $this->input->post('MobileNo');
        $data['CreatedBy'] = $userID;
        $require_fields = array('Organization', 'PublishDate', 'UnpublishedDate', 'AdvertisementPositionID');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) {
            return $this->prepareErrorResponse($check_require_field_erro);
        }
        $advertisement_information_entity = new AdvertisementInformationEntity($data);
        $advertisement_information_data = $advertisement_information_entity->getAdvertisementInformationEntityForUpdate();
        $advertisement_information_data['IsActive'] = $this->input->post('IsActive');
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        $this->db->set($advertisement_information_data);
        $this->db->where('ID', $advertisement_id);
        if($this->db->update('advertisementinformation')) {
            $this->load->model('AdvertisementPositionInformation_model');
            $advertisement_position_detail = $this->AdvertisementPositionInformation_model->getAdvertisementPositionDetail($data['AdvertisementPositionID']);
            if (isset($_FILES["ImagePath"]) && $_FILES["ImagePath"]['tmp_name'] && $advertisement_position_detail['ID']){
//                $max_width = $advertisement_position_detail['ImageWidth'];
//                $max_height = $advertisement_position_detail['ImageHeight'];
                $upload_data = $this->util->upload('AdvertisementImages', 'ImagePath', 0, 0, 0);
                if ($upload_data) {
                    $data = array();
                    $data['ImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $advertisement_id);
                    if($this->db->update('advertisementinformation')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteAdvertisement($advertisement_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteAdvertisement($advertisement_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }
    public function deleteAdvertisement() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $id = $this->input->get('AdvertisementID');
        $data = array();
        $data['IsActive'] = 0;
        $data['IsDeleted'] = 1;
        $data['LastUpdate'] = date('Y-m-d H:i:s');
        $this->db->set($data);
        $this->db->where('ID', $id);
        $return = $this->db->update('advertisementinformation');
        return $return;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }
    public function getPositionWiseAdvertisementInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $page = $this->input->get('Page');
        $advertisement_detail = config_item('advertisement_detail');
        $advertisement_info = $advertisement_detail[$page];
        $advertisements = array();
        $count = 0;
        foreach ($advertisement_info AS $advertisement) {
            $this->db->select('a.Title');
            $this->db->select('a.BodyText');
            $this->db->select('a.LinkURL');
            $this->db->select('a.ImagePath');
            $this->db->select('p.ClassName');
            $this->db->select('p.Interval');
            $this->db->from('advertisementinformation AS a');
            $this->db->join('advertisementpositioninformation AS p', 'a.AdvertisementPositionID = p.ID', 'inner');
            $this->db->where('a.PublishDate <=', date('Y-m-d'));
            $this->db->where('a.UnpublishedDate >=', date('Y-m-d'));
            $this->db->where(sprintf('a.ID NOT IN (SELECT AdvertisementID FROM %s)', $this->db->dbprefix('categorywiseadvertisement')));
            $this->db->where('a.IsActive', 1);
            $this->db->where('p.IsActive', 1);
            $this->db->where('p.ClassName', $advertisement[0]);
            $this->db->where('a.IsDeleted', 0);
            $this->db->where('p.IsDeleted', 0);
            $this->db->limit($advertisement[1]);
            $advertisements[$count++] = $this->db->get()->result_array();
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $advertisements;
    }
    public function getAdvertisement() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $class_name = $this->input->get('ClassName');
        $data = array();
        $this->db->select('ap.ID, ap.Interval, ap.NumberOfAdvertisement');
        $this->db->from('advertisementpositioninformation AS ap');
        $this->db->where('ap.ClassName', $class_name);
        $this->db->where('ap.IsActive', 1);
        $this->db->where('ap.IsDeleted', 0);
        $this->db->limit(1);
        $advertisement_position_information = $this->db->get()->result_array();
//        echo $this->db->last_query();
        if (isset($advertisement_position_information[0]['ID'])) {
            $this->db->select('a.Title');
            $this->db->select('a.BodyText');
            $this->db->select('a.LinkURL');
            $this->db->select('a.ImagePath');
            $this->db->select('p.Interval');
            $this->db->select('p.ClassName');
            $this->db->from('advertisementinformation AS a');
            $this->db->join('advertisementpositioninformation AS p', 'a.AdvertisementPositionID = p.ID', 'inner');
            $this->db->where('a.PublishDate <=', date('Y-m-d'));
            $this->db->where('a.UnpublishedDate >=', date('Y-m-d'));
            $this->db->where('a.IsActive', 1);
            $this->db->where('a.ImagePath <>', '');
            $this->db->where('p.ID', $advertisement_position_information[0]['ID'], false);
            $this->db->where(sprintf('a.ID NOT IN (SELECT AdvertisementID FROM %s)', $this->db->dbprefix('categorywiseadvertisement')));
            $this->db->where('a.ApplicableFor IN (0,1)');
            $this->db->where('a.IsDeleted', 0);
            $this->db->where('p.IsDeleted', 0);
            $this->db->order_by('rand()');
            if ($advertisement_position_information[0]['NumberOfAdvertisement']) {
                $this->db->limit($advertisement_position_information[0]['NumberOfAdvertisement']);
            }
            $data = $this->db->get()->result_array();
//            log_message('debug', __METHOD__.'#'.__LINE__.' SQL Statement: '.$this->db->last_query());
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $data;
    }
    ///////////////////////////////////////////////
    public function gethomemiddleadd() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
       
        $data = array();
        $this->db->select('*');
        $this->db->from('advertisementinformation');
        $this->db->where('IsActive', 1);
        $this->db->where('IsDeleted', 0);
        $this->db->where('PublishDate <=', date('Y-m-d'));
        $this->db->where('UnpublishedDate >=', date('Y-m-d'));
        $this->db->where('AdvertisementPositionID', 226);
        $this->db->limit(3);
        $data = $this->db->get()->result_array();
        // print_r($data);
        // die;
//            log_message('debug', __METHOD__.'#'.__LINE__.' SQL Statement: '.$this->db->last_query());
        
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $data;
    }
}
