<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/AdvertisementInformationEntity.php';

class CategoryWiseAdvertisement_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function getAllAdvertisementForAdmin() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $category_id = $this->input->get('CategoryID');

        $advertisement_information = array();

        switch ($category_id) {
            case 1:
                $this->db->select('ca.ID,ca.AdvertisementID, a.Organization, a.Title, a.BodyText, a.LinkURL, a.ImagePath, a.PublishDate, a.UnpublishedDate, a.AdvertisementPositionID, a.IsActive, a.ContactPerson, a.EmailID, a.MobileNo, p.Name AS PositionName, g.Name AS CategoryValue');
                $this->db->from('categorywiseadvertisement AS ca');
                $this->db->join('advertisementinformation AS a', 'ca.AdvertisementID = a.ID', 'inner');
                $this->db->join('advertisementpositioninformation AS p', 'a.AdvertisementPositionID = p.ID', 'inner');
                $this->db->join('genericinformation AS g', 'ca.CategoryValue = g.ID', 'inner');
                $this->db->where('ca.CategoryID', $category_id, false);
                $this->db->where('ca.IsDeleted', 0);
                $this->db->where('a.IsDeleted', 0);
                $this->db->where('p.IsDeleted', 0);
                $this->db->where('g.IsDeleted', 0);
                $this->db->order_by('p.Name');
                $result = $this->db->get()->result_array();
                $total = 0;
                foreach ($result AS $info) {
                    $info['PublishDate'] = substr($info['PublishDate'], 0, 10);
                    $info['UnpublishedDate'] = substr($info['UnpublishedDate'], 0, 10);
                    $advertisement_information[$total++] = $info;
                }
                break;
            case 2:
                $this->db->select('ca.ID,ca.AdvertisementID, a.Organization, a.Title, a.BodyText, a.LinkURL, a.ImagePath, a.PublishDate, a.UnpublishedDate, a.AdvertisementPositionID, a.IsActive, a.ContactPerson, a.EmailID, a.MobileNo, p.Name AS PositionName, b.Name AS CategoryValue');
                $this->db->from('categorywiseadvertisement AS ca');
                $this->db->join('advertisementinformation AS a', 'ca.AdvertisementID = a.ID', 'inner');
                $this->db->join('advertisementpositioninformation AS p', 'a.AdvertisementPositionID = p.ID', 'inner');
                $this->db->join('brandinformation AS b', 'ca.CategoryValue = b.ID', 'inner');
                $this->db->where('ca.CategoryID', $category_id, false);
                $this->db->where('ca.IsDeleted', 0);
                $this->db->where('a.IsDeleted', 0);
                $this->db->where('p.IsDeleted', 0);
                $this->db->where('b.IsDeleted', 0);
                $this->db->order_by('p.Name');
                $result = $this->db->get()->result_array();
                $total = 0;
                foreach ($result AS $info) {
                    $info['PublishDate'] = substr($info['PublishDate'], 0, 10);
                    $info['UnpublishedDate'] = substr($info['UnpublishedDate'], 0, 10);
                    $advertisement_information[$total++] = $info;
                }
                break;
            case 3:
                $this->db->select('ca.ID,ca.AdvertisementID, a.Organization, a.Title, a.BodyText, a.LinkURL, a.ImagePath, a.PublishDate, a.UnpublishedDate, a.AdvertisementPositionID, a.IsActive, a.ContactPerson, a.EmailID, a.MobileNo, p.Name AS PositionName, ca.CategoryTextValue AS CategoryValue');
                $this->db->from('categorywiseadvertisement AS ca');
                $this->db->join('advertisementinformation AS a', 'ca.AdvertisementID = a.ID', 'inner');
                $this->db->join('advertisementpositioninformation AS p', 'a.AdvertisementPositionID = p.ID', 'inner');
                $this->db->where('ca.CategoryID', $category_id, false);
                $this->db->where('ca.IsDeleted', 0);
                $this->db->where('a.IsDeleted', 0);
                $this->db->where('p.IsDeleted', 0);
                $this->db->order_by('p.Name');
                $result = $this->db->get()->result_array();
                $total = 0;
                foreach ($result AS $info) {
                    $info['PublishDate'] = substr($info['PublishDate'], 0, 10);
                    $info['UnpublishedDate'] = substr($info['UnpublishedDate'], 0, 10);
                    $advertisement_information[$total++] = $info;
                }
                break;
            default:
                break;
        }

//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $advertisement_information;
    }

    public function getCategoryValues() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $category_id = $this->input->get('CategoryID');
        $category_values = array();
        if ($category_id) {
            switch ($category_id) {
                case 1:     // 1 = Generic
                    $this->db->select('ID, Name');
                    $this->db->from('genericinformation');
                    $this->db->where('IsActive', 1, false);
                    $this->db->where('IsDeleted', 0);
                    $this->db->order_by('Name');
                    $category_values = $this->db->get()->result_array();
                    break;
                case 2:     // 2 = Brand
					$this->db->select('b.ID, b.ProductType, UPPER(TRIM(b.Name)) AS Name, df.Name AS DosageForm, s.Name AS StrengthName');
					$this->db->from('brandinformation AS b');
					$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
					$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
					$this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
					$this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
					$this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
					$this->db->where('b.IsActive', 1, false);
					$this->db->where('g.IsActive', 1, false);
					$this->db->where('m.IsActive', 1, false);
					$this->db->where('df.IsActive', 1, false);
					$this->db->where('s.IsActive', 1, false);
					$this->db->where('ps.IsActive', 1, false);
					$this->db->where('b.IsDeleted', 0, false);
					$this->db->where('g.IsDeleted', 0, false);
					$this->db->where('m.IsDeleted', 0, false);
					$this->db->where('df.IsDeleted', 0, false);
					$this->db->where('s.IsDeleted', 0, false);
					$this->db->where('ps.IsDeleted', 0, false);
					$this->db->order_by('UPPER(TRIM(b.Name))');
					$category_values = $this->db->get()->result_array();
                    break;
                case 3:     // 3 = Indication
                    $this->db->select('IndicationTags');
                    $this->db->distinct();
                    $this->db->from('genericinformation');
                    $this->db->where('IsActive', 1);
                    $this->db->where('IsDeleted', 0);
                    $result = $this->db->get()->result_array();
                    $indication_information = array();
                    foreach ($result AS $data) {
                        $indication_information = array_merge($indication_information, explode(',',$data['IndicationTags']));
                    }

                    $tags = array();
                    foreach ($indication_information AS $tag) {
                        $tags[] = trim($tag);
                    }
                    $indication_information = array_unique($tags);
                    $indication_information = array_unique($indication_information);
                    sort($indication_information);

                    $tags = array();
                    foreach ($indication_information AS $info) {
                        $tags[] = '#'.trim($info).'#';
                    }
                    log_message('debug', 'Indications: '.print_r($tags, true));

                    $category_values = array();
                    foreach ($indication_information AS $tag) {
                        if (empty($tag)) continue;
                        $category_values[] = array(
                            'ID' => $tag,
                            'Name' => $tag
                        );
                    }
                    break;
                default:
                    break;
            }
        }
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $category_values;
    }

    public function getAllAdvertisementPosition() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $category_id = $this->input->get('CategoryID');
        $positions = array();
        if ($category_id) {
            switch ($category_id) {
                case 1:     // 1 = Generic
                    $this->db->select('p.ID, p.Name, p.ClassName, p.ImageWidth, p.ImageHeight, p.NumberOfAdvertisement, p.Interval, p.PriceInBDT');
                    $this->db->from('advertisementpositioninformation AS p');
                    $this->db->where('p.IsDeleted', 0);
                    $this->db->like('p.ClassName', 'generic-', 'after');
                    $this->db->order_by('p.Name');
                    $positions = $this->db->get()->result_array();
                    break;
                case 2:     // 2 = Brand
                    $this->db->select('p.ID, p.Name, p.ClassName, p.ImageWidth, p.ImageHeight, p.NumberOfAdvertisement, p.Interval, p.PriceInBDT');
                    $this->db->from('advertisementpositioninformation AS p');
                    $this->db->where('p.IsDeleted', 0);
                    $this->db->like('p.ClassName', 'brand-', 'after');
                    $this->db->order_by('p.Name');
                    $positions = $this->db->get()->result_array();
                    break;
                case 3:     // 2 = Indication
                    $this->db->select('p.ID, p.Name, p.ClassName, p.ImageWidth, p.ImageHeight, p.NumberOfAdvertisement, p.Interval, p.PriceInBDT');
                    $this->db->from('advertisementpositioninformation AS p');
                    $this->db->like('p.ClassName', 'indication-', 'after');
                    $this->db->order_by('p.Name');
                    $positions = $this->db->get()->result_array();
                    break;
                default:
                    break;
            }
        }

//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $positions;
    }

    public function getAdvertisementDetailInformation() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $category_id = $this->input->get('CategoryID');
        if ($category_id) {
            $this->db->select('ca.ID, ca.AdvertisementID, ca.CategoryValue, a.Organization, a.Title, a.BodyText, a.LinkURL, a.ImagePath, a.PublishDate, a.UnpublishedDate, a.AdvertisementPositionID, a.IsActive, a.ContactPerson, a.EmailID, a.MobileNo');
            $this->db->from('categorywiseadvertisement AS ca');
            $this->db->join('advertisementinformation AS a', 'ca.AdvertisementID = a.ID', 'inner');
            $this->db->where('ca.ID', $category_id);
            $this->db->where('ca.IsDeleted', 0);
            $this->db->where('a.IsDeleted', 0);
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

    public function deleteAdvertisement() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $id = $this->input->get('CategoryID');

        $data = array();
        $data['IsActive'] = 0;
        $data['IsDeleted'] = 1;
        $data['LastUpdate'] = date('Y-m-d H:i:s');
        $this->db->set($data);
        $this->db->where('ID', $id);
        $can_delete = $this->db->update('categorywiseadvertisement');
        if ($can_delete) {
            $id = $this->input->get('AdvertisementID');

            $data = array();
            $data['IsActive'] = 0;
            $data['IsDeleted'] = 1;
            $data['LastUpdate'] = date('Y-m-d H:i:s');
            $this->db->set($data);
            $this->db->where('ID', $id);
            $can_delete = $this->db->update('advertisementinformation');
        }

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $can_delete;
    }

    public function createAdvertisementInformation($userID, $advertisementID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $data = array();
        $data['CategoryID'] = $this->input->get('CategoryID');
        $data['CategoryValue'] = $data['CategoryID'] == 3 ? 0 : $this->input->post('AdvertisementCategoryValue');
        $data['CategoryTextValue'] = $data['CategoryID'] == 3 ? $this->input->post('AdvertisementCategoryValue') : '';
        $data['AdvertisementID'] = $advertisementID;
        $data['CreatedBy'] = $userID;
        $data['IsActive'] = $this->input->post('IsActive');
        if($this->db->insert('categorywiseadvertisement', $data)) {
//            log_message('debug', __METHOD__.'#'.__LINE__.' SQL Statement: '.$this->db->last_query());
            return $this->prepareErrorResponse(NO_ERROR);
        } else {
            $this->db->where('ID', $advertisementID);
            $this->db->delete('advertisementinformation');
//            log_message('debug', __METHOD__.'#'.__LINE__.' SQL Statement: '.$this->db->last_query());
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }

    public function createAdvertisementInformatiobycategory($data1) {
       // log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        if($this->db->insert('categorywiseadvertisement', $data1)) {
            //log_message('debug', __METHOD__.'#'.__LINE__.' SQL Statement: '.$this->db->last_query());
            return true;
        } else {
           
           //log_message('debug', __METHOD__.'#'.__LINE__.' SQL Statement: '.$this->db->last_query());
            return false;
        }
    }

    public function updateAdvertisementInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $category_id = $this->input->get('CategoryID');
        if (empty($category_id)) {
            return false;
        }

        $data = array();
        $data['CreatedBy'] = $userID;
        $data['IsActive'] = $this->input->post('IsActive');
        $data['LastUpdate'] = date('Y-m-d H:i:s');
        $this->db->set($data);
        $this->db->where('ID', $category_id);

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        if($this->db->update('categorywiseadvertisement')) {
            return $this->prepareErrorResponse(NO_ERROR);
        }

        return $this->prepareErrorResponse(ERROR_UNKNOWN);
    }

    public function getAdvertisement() {
       
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $class_name = $this->input->get('ClassName');
        $category_id = $this->input->get('CategoryID');
        $category_value = $this->input->get('CategoryValue');
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
            $data = array();
            switch ($category_id) {
                case 1:
                    $this->db->select('a.Title');
                    $this->db->select('a.BodyText');
                    $this->db->select('a.LinkURL');
                    $this->db->select('a.ImagePath');
                    $this->db->select('p.Interval');
                    $this->db->select('p.ClassName');
                    $this->db->from('categorywiseadvertisement AS ca');
                    $this->db->join('advertisementinformation AS a', 'ca.AdvertisementID = a.ID', 'inner');
                    $this->db->join('advertisementpositioninformation AS p', 'a.AdvertisementPositionID = p.ID', 'inner');
                    $this->db->where('ca.CategoryID', $category_id);
                    // $this->db->where(sprintf("ca.CategoryValue IN (SELECT b.ID FROM %s AS b INNER JOIN %s AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = '%s')", $this->db->dbprefix('genericinformation'), $this->db->dbprefix('dosageforminformation'), strtolower(trim($category_value))));
                    //$this->db->where(sprintf("ca.CategoryValue IN (SELECT ID FROM %s  WHERE Name LIKE '%s')", $this->db->dbprefix('genericinformation'),trim($category_value)));
                    $this->db->where('a.PublishDate <=', date('Y-m-d'));
                    $this->db->where('a.UnpublishedDate >=', date('Y-m-d'));
                    $this->db->where('ca.IsActive', 1);
                    $this->db->where('a.IsActive', 1);
                    $this->db->where('p.IsActive', 1);
                    $this->db->where('a.ImagePath <>', '');
                    $this->db->where('p.ID', $advertisement_position_information[0]['ID'], false);
                    $this->db->where('ca.IsDeleted', 0);
                    $this->db->where('a.IsDeleted', 0);
                    $this->db->where('p.IsDeleted', 0);
                    $this->db->order_by('rand()');
                    if ($advertisement_position_information[0]['NumberOfAdvertisement']) {
                        $this->db->limit($advertisement_position_information[0]['NumberOfAdvertisement']);
                    } else {
                        $this->db->limit(1);
                    }
                    $data = $this->db->get()->result_array();
                    break;
                case 2:
                    $this->db->select('a.Title');
                    $this->db->select('a.BodyText');
                    $this->db->select('a.LinkURL');
                    $this->db->select('a.ImagePath');
                    $this->db->select('p.Interval');
                    $this->db->select('p.ClassName');
                    $this->db->from('categorywiseadvertisement AS ca');
                    $this->db->join('advertisementinformation AS a', 'ca.AdvertisementID = a.ID', 'inner');
                    $this->db->join('advertisementpositioninformation AS p', 'a.AdvertisementPositionID = p.ID', 'inner');
                    $this->db->where('ca.CategoryID', $category_id);
                    $this->db->where(sprintf("ca.CategoryValue IN (SELECT b.ID FROM %s AS b INNER JOIN %s AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = '%s')", $this->db->dbprefix('brandinformation'), $this->db->dbprefix('dosageforminformation'), strtolower(trim($category_value))));
                    $this->db->where('a.PublishDate <=', date('Y-m-d'));
                    $this->db->where('a.UnpublishedDate >=', date('Y-m-d'));
                    $this->db->where('ca.IsActive', 1);
                    $this->db->where('a.IsActive', 1);
                    $this->db->where('p.IsActive', 1);
                    $this->db->where('a.ImagePath <>', '');
                    $this->db->where('p.ID', $advertisement_position_information[0]['ID'], false);
                    $this->db->where('ca.IsDeleted', 0);
                    $this->db->where('a.IsDeleted', 0);
                    $this->db->where('p.IsDeleted', 0);
                    $this->db->order_by('rand()');
                    if ($advertisement_position_information[0]['NumberOfAdvertisement']) {
                        $this->db->limit($advertisement_position_information[0]['NumberOfAdvertisement']);
                    } else {
                        $this->db->limit(1);
                    }
                    $data = $this->db->get()->result_array();
                    break;
                case 3:
                    $this->db->select('a.Title');
                    $this->db->select('a.BodyText');
                    $this->db->select('a.LinkURL');
                    $this->db->select('a.ImagePath');
                    $this->db->select('p.Interval');
                    $this->db->select('p.ClassName');
                    $this->db->from('categorywiseadvertisement AS ca');
                    $this->db->join('advertisementinformation AS a', 'ca.AdvertisementID = a.ID', 'inner');
                    $this->db->join('advertisementpositioninformation AS p', 'a.AdvertisementPositionID = p.ID', 'inner');
                    $this->db->where('ca.CategoryID', $category_id);
                    $this->db->where('ca.CategoryTextValue', $category_value);
                    $this->db->where('a.PublishDate <=', date('Y-m-d'));
                    $this->db->where('a.UnpublishedDate >=', date('Y-m-d'));
                    $this->db->where('ca.IsActive', 1);
                    $this->db->where('a.IsActive', 1);
                    $this->db->where('p.IsActive', 1);
                    $this->db->where('a.ImagePath <>', '');
                    $this->db->where('p.ID', $advertisement_position_information[0]['ID'], false);
                    $this->db->where('ca.IsDeleted', 0);
                    $this->db->where('a.IsDeleted', 0);
                    $this->db->where('p.IsDeleted', 0);
                    $this->db->order_by('rand()');
                    if ($advertisement_position_information[0]['NumberOfAdvertisement']) {
                        $this->db->limit($advertisement_position_information[0]['NumberOfAdvertisement']);
                    } else {
                        $this->db->limit(1);
                    }
                    $data = $this->db->get()->result_array();
                    break;
                default:
                    break;
            }
//            log_message('debug', __METHOD__.'#'.__LINE__.' SQL Statement: '.$this->db->last_query());
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        if (empty($data)) {
            $data[0]['ClassName'] = $class_name;
        }

        return $data;
    }

	public function getAdvertisementForSlider() {
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$class_name = $this->input->get('ClassName');
		$category_id = $this->input->get('CategoryID');
		$category_value = $this->input->get('CategoryValue');
		$data = array();
		$this->db->select('ap.ID, ap.Interval, ap.NumberOfAdvertisement');
		$this->db->from('advertisementpositioninformation AS ap');
		$this->db->where('ap.ClassName', $class_name);
		$this->db->where('ap.IsActive', 1);
		$this->db->where('ap.IsDeleted', 0);
		$advertisement_position_information = $this->db->get()->result_array();
//        echo $this->db->last_query();

		if (isset($advertisement_position_information[0]['ID'])) {
			$data = array();
			switch ($category_id) {
				case 1:
					$this->db->select('a.Title');
					$this->db->select('a.BodyText');
					$this->db->select('a.LinkURL');
					$this->db->select('a.ImagePath');
					$this->db->select('p.Interval');
					$this->db->select('p.ClassName');
					$this->db->from('categorywiseadvertisement AS ca');
					$this->db->join('advertisementinformation AS a', 'ca.AdvertisementID = a.ID', 'inner');
					$this->db->join('advertisementpositioninformation AS p', 'a.AdvertisementPositionID = p.ID', 'inner');
					$this->db->where('ca.CategoryID', $category_id);
					$this->db->where(sprintf("ca.CategoryValue IN (SELECT b.ID FROM %s AS b INNER JOIN %s AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = '%s')", $this->db->dbprefix('genericinformation'), $this->db->dbprefix('dosageforminformation'), strtolower(trim($category_value))));
					$this->db->where('a.PublishDate <=', date('Y-m-d'));
					$this->db->where('a.UnpublishedDate >=', date('Y-m-d'));
					$this->db->where('ca.IsActive', 1);
					$this->db->where('a.IsActive', 1);
					$this->db->where('p.IsActive', 1);
					$this->db->where('a.ImagePath <>', '');
					$this->db->where('p.ID', $advertisement_position_information[0]['ID'], false);
					$this->db->where('ca.IsDeleted', 0);
					$this->db->where('a.IsDeleted', 0);
					$this->db->where('p.IsDeleted', 0);
					$this->db->order_by('rand()');
					$data = $this->db->get()->result_array();
					break;
				case 2:
					$this->db->select('a.Title');
					$this->db->select('a.BodyText');
					$this->db->select('a.LinkURL');
					$this->db->select('a.ImagePath');
					$this->db->select('p.Interval');
					$this->db->select('p.ClassName');
					$this->db->from('categorywiseadvertisement AS ca');
					$this->db->join('advertisementinformation AS a', 'ca.AdvertisementID = a.ID', 'inner');
					$this->db->join('advertisementpositioninformation AS p', 'a.AdvertisementPositionID = p.ID', 'inner');
					$this->db->where('ca.CategoryID', $category_id);
					if (is_numeric($category_value)) {
						$this->db->where(sprintf("ca.CategoryValue = %d", $category_value));
					} else {
						$this->db->where(sprintf("ca.CategoryValue IN (SELECT b.ID FROM %s AS b INNER JOIN %s AS df ON (b.DosageFormID = df.ID) WHERE LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = '%s')", $this->db->dbprefix('brandinformation'), $this->db->dbprefix('dosageforminformation'), strtolower(trim($category_value))));
					}
					$this->db->where('a.PublishDate <=', date('Y-m-d'));
					$this->db->where('a.UnpublishedDate >=', date('Y-m-d'));
					$this->db->where('ca.IsActive', 1);
					$this->db->where('a.IsActive', 1);
					$this->db->where('p.IsActive', 1);
					$this->db->where('a.ImagePath <>', '');
					$this->db->where('p.ID', $advertisement_position_information[0]['ID'], false);
					$this->db->where('ca.IsDeleted', 0);
					$this->db->where('a.IsDeleted', 0);
					$this->db->where('p.IsDeleted', 0);
					$this->db->order_by('rand()');
					$data = $this->db->get()->result_array();
					break;
				case 3:
					$this->db->select('a.Title');
					$this->db->select('a.BodyText');
					$this->db->select('a.LinkURL');
					$this->db->select('a.ImagePath');
					$this->db->select('p.Interval');
					$this->db->select('p.ClassName');
					$this->db->from('categorywiseadvertisement AS ca');
					$this->db->join('advertisementinformation AS a', 'ca.AdvertisementID = a.ID', 'inner');
					$this->db->join('advertisementpositioninformation AS p', 'a.AdvertisementPositionID = p.ID', 'inner');
					$this->db->where('ca.CategoryID', $category_id);
					$this->db->where('ca.CategoryTextValue', $category_value);
					$this->db->where('a.PublishDate <=', date('Y-m-d'));
					$this->db->where('a.UnpublishedDate >=', date('Y-m-d'));
					$this->db->where('ca.IsActive', 1);
					$this->db->where('a.IsActive', 1);
					$this->db->where('p.IsActive', 1);
					$this->db->where('a.ImagePath <>', '');
					$this->db->where('p.ID', $advertisement_position_information[0]['ID'], false);
					$this->db->where('ca.IsDeleted', 0);
					$this->db->where('a.IsDeleted', 0);
					$this->db->where('p.IsDeleted', 0);
					$this->db->order_by('rand()');
					$data = $this->db->get()->result_array();
					break;
				default:
					break;
			}
//            log_message('debug', __METHOD__.'#'.__LINE__.' SQL Statement: '.$this->db->last_query());
		}
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		if (empty($data)) {
			$data[0]['ClassName'] = $class_name;
		}

		return $data;
	}
}
