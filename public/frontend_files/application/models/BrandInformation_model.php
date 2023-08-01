<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH . 'models/GeneralData_model.php';
require_once APPPATH . 'libraries/entities/BrandInformationEntity.php';
class BrandInformation_model extends GeneralData_model
{
	public function __construct()
	{
		parent::__construct();
		//log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
	}
	public function createBrandInformation($userID)
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$this->require_fields = array('BrandName', 'GenericID', 'ManufacturerID', 'PriceInBDT');
		$this->request_type = 'post';
		$check_require_field_erro = parent::create();
		if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);
		$data = array();
		$product_type = $this->input->post('ProductType');
		$data['ProductType'] = $product_type;
		$brand_name = $this->input->post('BrandName');
		$data['Name'] = $brand_name;
		$data['GenericID'] = $this->input->post('GenericID');
		$data['ManufacturerID'] = $this->input->post('ManufacturerID');
		$dosage_form = $this->input->post('DosageForm');
		$dosage_form_id = $this->input->post('DosageFormID');
		if (!empty($dosage_form)) {
			$this->db->select('ID');
			$this->db->from('dosageforminformation');
			$this->db->where('Name', $dosage_form);
			$dosage_information = $this->db->get()->result_array();
			if (isset($dosage_information[0]['ID'])) {
				$dosage_form_id = $dosage_information[0]['ID'];
			} else {
				$dosage_data = array();
				$dosage_data['Name'] = $dosage_form;
				$dosage_data['CreatedBy'] = $userID;
				$this->db->insert('dosageforminformation', $dosage_data);
				$dosage_form_id = $this->db->insert_id();
			}
		}
		$data['DosageFormID'] = $dosage_form_id;
		$strength = $this->input->post('Strength');
		$strength_id = $this->input->post('StrengthID');
		if (!empty($strength)) {
			$this->db->select('ID');
			$this->db->from('strengthinformation');
			$this->db->where('Name', $strength);
			$dosage_information = $this->db->get()->result_array();
			if (isset($dosage_information[0]['ID'])) {
				$strength_id = $dosage_information[0]['ID'];
			} else {
				$dosage_data = array();
				$dosage_data['Name'] = $strength;
				$dosage_data['CreatedBy'] = $userID;
				$this->db->insert('strengthinformation', $dosage_data);
				$strength_id = $this->db->insert_id();
			}
		}
		log_message('debug', 'Strength ID: ' . $strength_id);
		$data['StrengthID'] = $strength_id;
		$packsize = $this->input->post('PackSize');
		$packsize_id = $this->input->post('PackSizeID');
		if (!empty($packsize)) {
			$this->db->select('ID');
			$this->db->from('packsizeinformation');
			$this->db->where('Name', $packsize);
			$dosage_information = $this->db->get()->result_array();
			if (isset($dosage_information[0]['ID'])) {
				$packsize_id = $dosage_information[0]['ID'];
			} else {
				$dosage_data = array();
				$dosage_data['Name'] = $packsize;
				$dosage_data['CreatedBy'] = $userID;
				$this->db->insert('packsizeinformation', $dosage_data);
				$packsize_id = $this->db->insert_id();
			}
		}
		$data['PackSizeID'] = $packsize_id;
		$data['PriceInBDT'] = $this->input->post('PriceInBDT');
		$data['IsHighlighted'] = $this->input->post('IsHighlighted');
		$is_new_product = $this->input->post('IsNewProduct');
		$data['IsNewProduct'] = $is_new_product;
		$is_new_brand = $this->input->post('IsNewBrand');
		$data['IsNewBrand'] = $is_new_brand;
		$is_new_presentation = $this->input->post('IsNewPresentation');
		$data['IsNewPresentation'] = $is_new_presentation;
		$data['CreatedBy'] = $userID;
		$data['IsActive'] = $this->input->post('IsActive');
		$data['IsDeleted'] = 0;
		$brand_information_entity = new BrandInformationEntity($data);
		$brand_information_data = $brand_information_entity->getBrandEntityForCreate();
		$brand_information_data['CreateDate'] = date('Y-m-d H:i:s');
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		if ($this->db->insert('brandinformation', $brand_information_data)) {
			//            echo $this->db->last_query();
			$brand_id = $this->db->insert_id();
			if (isset($_FILES["ImagePath"]) && $_FILES["ImagePath"]['tmp_name']) {
				$upload_data = $this->util->upload('BrandImages', 'ImagePath', 0, 0, 0);
				if ($upload_data) {
					$data = array();
					$data['ImagePath'] = $upload_data['file_name'];
					$this->db->set($data);
					$this->db->where('ID', $brand_id);
					if ($this->db->update('brandinformation')) {
						$this->load->model('Email_model');
						$link = site_url('Brand/searchBrandInformation') . '?Type=brand&Value=' . $brand_name . '&ProductType=' . $product_type;
						if ($is_new_brand) $this->Email_model->sendNewBrandEmail($brand_id, $brand_name, $link);
						if ($is_new_product) $this->Email_model->sendNewProductsEmail($brand_id, $brand_name, $link);
						if ($is_new_presentation) $this->Email_model->sendNewPresentationEmail($brand_id, $brand_name, $link);
						return $this->prepareErrorResponse(NO_ERROR);
					} else {
						$this->deleteBrand($brand_id);
						return $this->prepareErrorResponse(ERROR_UNKNOWN);
					}
				} else {
					$this->deleteBrand($brand_id);
					return $this->prepareErrorResponse(ERROR_UNKNOWN);
				}
			}
			$this->load->model('Email_model');
			$link = site_url('Brand/searchBrandInformation') . '?Type=brand&Value=' . $brand_name . '&ProductType=' . $product_type;
			if ($is_new_brand) $this->Email_model->sendNewBrandEmail($brand_id, $brand_name, $link);
			if ($is_new_product) $this->Email_model->sendNewProductsEmail($brand_id, $brand_name, $link);
			if ($is_new_presentation) $this->Email_model->sendNewPresentationEmail($brand_id, $brand_name, $link);
			return $this->prepareErrorResponse(NO_ERROR);
		} else {
			//            echo $this->db->last_query();
			return $this->prepareErrorResponse(ERROR_UNKNOWN);
		}
	}
	public function getAllActiveBrandInformation()
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$product_type = $this->input->get('ProductType');
		$page_no = $this->input->get('PageNo');
		$page_no = empty($page_no) ? 1 : $page_no;
		$this->db->select('b.ID, b.ProductType, UPPER(TRIM(b.Name)) AS Name, m.ID AS ManufacturerID, CamelCase(m.Name) AS ManufacturerName, b.PriceInBDT, CamelCase(g.Name) AS GenericName');
		$this->db->from('brandinformation AS b');
		$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
		$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
		$this->db->where('b.ProductType', $product_type, false);
		$this->db->where('b.IsActive', 1, false);
		$this->db->where('g.IsActive', 1, false);
		$this->db->where('m.IsActive', 1, false);
		$this->db->where('b.IsDeleted', 0, false);
		$this->db->where('g.IsDeleted', 0, false);
		$this->db->where('m.IsDeleted', 0, false);
		$this->db->limit(config_item('per_page_information_number'), ($page_no - 1) * config_item('per_page_information_number'));
		$this->db->order_by('UPPER(TRIM(b.Name))');
		$all_information = $this->db->get()->result_array();
		//        echo $this->db->last_query();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $all_information;
	}
	public function getAllActiveProduct($productType)
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$page_no = $this->input->get('PageNo');
		$page_no = empty($page_no) ? 1 : $page_no;
		$this->db->select('b.ID, b.ProductType, UPPER(TRIM(b.Name)) AS Name, m.ID AS ManufacturerID, CamelCase(m.Name) AS ManufacturerName, b.PriceInBDT, CamelCase(g.Name) AS GenericName, df.Name AS DosageForm, s.Name AS StrengthName, ps.Name AS PackSize');
		$this->db->from('brandinformation AS b');
		$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
		$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
		$this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
		$this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
		$this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
		$this->db->where('b.ProductType', $productType, false);
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
		$this->db->limit(config_item('per_page_information_number'), ($page_no - 1) * config_item('per_page_information_number'));
		$this->db->order_by('UPPER(TRIM(b.Name))');
		$all_information = $this->db->get()->result_array();
		//        echo $this->db->last_query();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $all_information;
	}
	///////////////////
	public function getAllherbalActiveProduct($productType)
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$this->db->select('ID');
		$this->db->from('brandinformation');
		$this->db->where('ProductType', $productType, false);
		$this->db->where('IsActive', 1, false);
		$this->db->where('IsDeleted', 0, false);
		$all_information = $this->db->get()->result_array();
		//        echo $this->db->last_query();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $all_information;
	}
	public function getAllBrandInformation()
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$product_type = $this->input->get('ProductType');
		$this->db->select('b.ID, b.ProductType, UPPER(TRIM(b.Name)) AS Name, m.ID AS ManufacturerID, CamelCase(m.Name) AS ManufacturerName, b.PriceInBDT, CamelCase(g.Name) AS GenericName, df.Name AS DosageForm');
		$this->db->from('brandinformation AS b');
		$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
		$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
		$this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
		$this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
		$this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
		if (is_numeric($product_type)) {
			$this->db->where('b.ProductType', $product_type, false);
		}
		$this->db->where('b.IsDeleted', 0, false);
		$this->db->where('g.IsDeleted', 0, false);
		$this->db->where('m.IsDeleted', 0, false);
		$this->db->where('df.IsDeleted', 0, false);
		$this->db->where('s.IsDeleted', 0, false);
		$this->db->where('ps.IsDeleted', 0, false);
		$this->db->order_by('UPPER(TRIM(b.Name))');
		$all_information = $this->db->get()->result_array();
		//        echo $this->db->last_query();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $all_information;
	}
	public function searchBrandAlphabetically()
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$product_type = $this->input->get('ProductType');
		$page_no = $this->input->get('PageNo');
		$alphabet = $this->input->get('Alphabet');
		$page_no = empty($page_no) ? 1 : $page_no;
		$this->db->select('b.ID, b.ProductType, UPPER(TRIM(b.Name)) AS Name, m.ID AS ManufacturerID, CamelCase(m.Name) AS ManufacturerName, b.PriceInBDT, CamelCase(g.Name) AS GenericName');
		$this->db->from('brandinformation AS b');
		$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
		$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
		$this->db->where('b.ProductType', $product_type, false);
		$this->db->where('b.IsActive', 1, false);
		$this->db->where('g.IsActive', 1, false);
		$this->db->where('m.IsActive', 1, false);
		$this->db->where('b.IsDeleted', 0, false);
		$this->db->where('g.IsDeleted', 0, false);
		$this->db->where('m.IsDeleted', 0, false);
		$this->db->like('UPPER(TRIM(b.Name))', strtoupper(trim($alphabet)), 'after');
		$this->db->limit(config_item('per_page_information_number'), ($page_no - 1) * config_item('per_page_information_number'));
		$this->db->order_by('UPPER(TRIM(b.Name))');
		$all_information = $this->db->get()->result_array();
		//        echo $this->db->last_query();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $all_information;
	}
	public function searchGenericAlphabetically()
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$product_type = $this->input->get('ProductType');
		$page_no = $this->input->get('PageNo');
		$alphabet = $this->input->get('Alphabet');
		$page_no = empty($page_no) ? 1 : $page_no;
		$this->db->select('b.ID, b.ProductType, UPPER(TRIM(b.Name)) AS Name, m.ID AS ManufacturerID, CamelCase(m.Name) AS ManufacturerName, b.PriceInBDT, CamelCase(g.Name) AS GenericName');
		$this->db->from('brandinformation AS b');
		$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
		$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
		$this->db->where('b.ProductType', $product_type, false);
		$this->db->where('b.IsActive', 1, false);
		$this->db->where('g.IsActive', 1, false);
		$this->db->where('m.IsActive', 1, false);
		$this->db->where('b.IsDeleted', 0, false);
		$this->db->where('g.IsDeleted', 0, false);
		$this->db->where('m.IsDeleted', 0, false);
		$this->db->like('UPPER(TRIM(g.Name))', strtoupper(trim($alphabet)), 'after');
		$this->db->limit(config_item('per_page_information_number'), ($page_no - 1) * config_item('per_page_information_number'));
		$this->db->order_by('UPPER(TRIM(g.Name))');
		$all_information = $this->db->get()->result_array();
		//        echo $this->db->last_query();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $all_information;
	}
	public function getTotal($product_type)
	{
		$this->db->from('brandinformation');
		$this->db->where('ProductType', $product_type, false);
		$this->db->where('IsActive', 1, false);
		$this->db->where('IsDeleted', 0, false);
		return $this->db->count_all_results();
	}
	public function getBrandDetail()
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$brand_id = $this->input->get('BrandID');
		if ($brand_id) {
			$this->db->select('b.ID');
			$this->db->select('b.ProductType');
			$this->db->select('UPPER(TRIM(b.Name)) AS Name');
			$this->db->select('b.PriceInBDT');
			$this->db->select('b.ImagePath');
			$this->db->select('g.ID AS GenericID');
			//            $this->db->select('g.Name AS GenericName');
			$this->db->select('m.ID AS ManufacturerID');
			//            $this->db->select('m.Name AS ManufacturerName');
			$this->db->select('df.ID AS DosageFormID');
			//            $this->db->select('df.Name AS DosageForm');
			$this->db->select('s.ID AS StrengthID');
			//            $this->db->select('s.Name AS StrengthName');
			$this->db->select('ps.ID AS PackSizeID');
			//            $this->db->select('ps.Name AS PackSize');
			$this->db->select('b.IsHighlighted');
			$this->db->select('b.IsNewProduct');
			$this->db->select('b.IsNewBrand');
			$this->db->select('b.IsNewPresentation');
			$this->db->select('b.IsActive');
			$this->db->from('brandinformation AS b');
			$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
			$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
			$this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
			$this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
			$this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
			$this->db->where('b.ID', $brand_id);
			//            $this->db->where('g.IsActive', 1, false);
			//            $this->db->where('m.IsActive', 1, false);
			//            $this->db->where('df.IsActive', 1, false);
			//            $this->db->where('s.IsActive', 1, false);
			//            $this->db->where('ps.IsActive', 1, false);
			$this->db->where('b.IsDeleted', 0, false);
			$this->db->where('g.IsDeleted', 0, false);
			$this->db->where('m.IsDeleted', 0, false);
			$this->db->where('df.IsDeleted', 0, false);
			$this->db->where('s.IsDeleted', 0, false);
			$this->db->where('ps.IsDeleted', 0, false);
			$this->db->limit(1);
			$information = $this->db->get()->result_array();
			//            echo $this->db->last_query();
			return isset($information[0]) ? $information[0] : array();
		}
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method Enb.');
		return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
	}
	public function getBrandFullDetail()
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$brand_id = $this->input->get('BrandID');
		if ($brand_id) {
			$this->db->select('b.ID');
			$this->db->select('b.ProductType');
			$this->db->select('UPPER(TRIM(b.Name)) AS Name');
			$this->db->select('b.PriceInBDT');
			$this->db->select('b.ImagePath');
			$this->db->select('g.ID AS GenericID');
			$this->db->select('CamelCase(g.Name) AS GenericName');
			$this->db->select('g.Classification');
			$this->db->select('g.SafetyRemark');
			$this->db->select('g.Indication');
			$this->db->select('g.IndicationTags');
			$this->db->select('g.DosageAdministration');
			$this->db->select('g.ContraindicationPrecaution');
			$this->db->select('g.Composition');
			$this->db->select('g.Pharmacology');
			$this->db->select('g.Interaction');
			$this->db->select('g.SideEffect');
			$this->db->select('g.OverdoseEffect');
			$this->db->select('g.StorageCondition');
			$this->db->select('g.PregnancyLactation');
			$this->db->select('m.ID AS ManufacturerID');
			$this->db->select('CamelCase(m.Name) AS ManufacturerName');
			$this->db->select('df.ID AS DosageFormID');
			$this->db->select('df.Name AS DosageForm');
			$this->db->select('s.ID AS StrengthID');
			$this->db->select('s.Name AS StrengthName');
			$this->db->select('ps.ID AS PackSizeID');
			$this->db->select('ps.Name AS PackSize');
			$this->db->select('b.IsHighlighted');
			$this->db->select('b.IsNewProduct');
			$this->db->select('b.IsNewBrand');
			$this->db->select('b.IsNewPresentation');
			$this->db->select('b.IsActive');
			$this->db->from('brandinformation AS b');
			$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
			$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
			$this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
			$this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
			$this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
			$this->db->where('b.ID', $brand_id);
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
			$this->db->limit(1);
			$information = $this->db->get()->result_array();
			//            echo $this->db->last_query();
			return isset($information[0]) ? $information[0] : array();
		}
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method Enb.');
		return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
	}
	public function updateBrandInformation($userID)
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$brand_id = $this->input->get('BrandID');
		if (empty($brand_id)) {
			return false;
		}
		$data = array();
		$data['ProductType'] = $this->input->post('ProductType');
		$data['Name'] = $this->input->post('BrandName');
		$data['GenericID'] = $this->input->post('GenericID');
		$data['ManufacturerID'] = $this->input->post('ManufacturerID');
		$dosage_form = $this->input->post('DosageForm');
		$dosage_form_id = $this->input->post('DosageFormID');
		if (!empty($dosage_form)) {
			$this->db->select('ID');
			$this->db->from('dosageforminformation');
			$this->db->where('Name', $dosage_form);
			$dosage_information = $this->db->get()->result_array();
			if (isset($dosage_information[0]['ID'])) {
				$dosage_form_id = $dosage_information[0]['ID'];
			} else {
				$dosage_data = array();
				$dosage_data['Name'] = $dosage_form;
				$dosage_data['CreatedBy'] = $userID;
				$this->db->insert('dosageforminformation', $dosage_data);
				$dosage_form_id = $this->db->insert_id();
			}
		}
		$data['DosageFormID'] = $dosage_form_id;
		$strength = $this->input->post('Strength');
		$strength_id = $this->input->post('StrengthID');
		if (!empty($strength)) {
			$this->db->select('ID');
			$this->db->from('strengthinformation');
			$this->db->where('Name', $strength);
			$dosage_information = $this->db->get()->result_array();
			if (isset($dosage_information[0]['ID'])) {
				$strength_id = $dosage_information[0]['ID'];
			} else {
				$dosage_data = array();
				$dosage_data['Name'] = $strength;
				$dosage_data['CreatedBy'] = $userID;
				$this->db->insert('strengthinformation', $dosage_data);
				$strength_id = $this->db->insert_id();
			}
		}
		log_message('debug', 'Strength ID: ' . $strength_id);
		$data['StrengthID'] = $strength_id;
		$packsize = $this->input->post('PackSize');
		$packsize_id = $this->input->post('PackSizeID');
		if (!empty($packsize)) {
			$this->db->select('ID');
			$this->db->from('packsizeinformation');
			$this->db->where('Name', $packsize);
			$dosage_information = $this->db->get()->result_array();
			if (isset($dosage_information[0]['ID'])) {
				$packsize_id = $dosage_information[0]['ID'];
			} else {
				$dosage_data = array();
				$dosage_data['Name'] = $packsize;
				$dosage_data['CreatedBy'] = $userID;
				$this->db->insert('packsizeinformation', $dosage_data);
				$packsize_id = $this->db->insert_id();
			}
		}
		$data['PackSizeID'] = $packsize_id;
		$data['PriceInBDT'] = $this->input->post('PriceInBDT');
		$data['IsHighlighted'] = $this->input->post('IsHighlighted');
		$data['IsNewProduct'] = $this->input->post('IsNewProduct');
		$data['IsNewBrand'] = $this->input->post('IsNewBrand');
		$data['IsNewPresentation'] = $this->input->post('IsNewPresentation');
		$data['IsActive'] = $this->input->post('IsActive');
		$data['IsDeleted'] = 0;
		$data['CreatedBy'] = $userID;
		$require_fields = array('BrandName', 'GenericID', 'ManufacturerID', 'DosageFormID', 'StrengthID', 'PackSizeID', 'PriceInBDT');
		$check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
		if ($check_require_field_erro != NO_ERROR) {
			return $this->prepareErrorResponse($check_require_field_erro);
		}
		$brand_information_entity = new BrandInformationEntity($data);
		$brand_information_data = $brand_information_entity->getBrandEntityForUpdate();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		$this->db->set($brand_information_data);
		$this->db->where('ID', $brand_id);
		if ($this->db->update('brandinformation')) {
			if (isset($_FILES["ImagePath"]) && $_FILES["ImagePath"]['tmp_name']) {
				$upload_data = $this->util->upload('BrandImages', 'ImagePath', 0, 0, 0);
				if ($upload_data) {
					$data = array();
					$data['ImagePath'] = $upload_data['file_name'];
					$this->db->set($data);
					$this->db->where('ID', $brand_id);
					if ($this->db->update('brandinformation')) {
						return $this->prepareErrorResponse(NO_ERROR);
					} else {
						$this->deleteBrand($brand_id);
						return $this->prepareErrorResponse(ERROR_UNKNOWN);
					}
				} else {
					$this->deleteBrand($brand_id);
					return $this->prepareErrorResponse(ERROR_UNKNOWN);
				}
			}
			return $this->prepareErrorResponse(NO_ERROR);
		} else {
			return $this->prepareErrorResponse(ERROR_UNKNOWN);
		}
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
	}
	public function deleteBrand()
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$id = $this->input->get('BrandID');
		$data = array();
		$data['IsActive'] = 0;
		$data['IsDeleted'] = 1;
		$data['LastUpdate'] = date('Y-m-d H:i:s');
		$this->db->set($data);
		$this->db->where('ID', $id);
		$return = $this->db->update('brandinformation');
		return $return;
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
	}
	public function getNewBrands()
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$all_item = $this->input->get('AllBrand');
		$this->db->select('ID, upper(Name) AS Name');
		$this->db->from('brandinformation');
		$this->db->where('ProductType', REGULAR_PRODUCT, false);
		$this->db->where('IsNewBrand', 1, false);
		$this->db->where('IsActive', 1, false);
		$this->db->where('IsDeleted', 0, false);
		$this->db->order_by('CreateDate', 'DESC');
		if ($all_item == 0) {
			$this->db->limit(config_item('home_page_new_item_limit'));
		}
		$all_new_information = $this->db->get()->result_array();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $all_new_information;
	}
	public function getNewPresentations()
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$all_item = $this->input->get('AllPresentation');
		$this->db->select('ID, upper(Name) AS Name');
		$this->db->from('brandinformation');
		$this->db->where('ProductType', REGULAR_PRODUCT, false);
		$this->db->where('IsNewPresentation', 1, false);
		$this->db->where('IsActive', 1, false);
		$this->db->where('IsDeleted', 0, false);
		$this->db->order_by('CreateDate', 'DESC');
		if ($all_item == 0) {
			$this->db->limit(config_item('home_page_new_item_limit'));
		}
		$all_new_information = $this->db->get()->result_array();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $all_new_information;
	}
	public function getNewProducts()
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$all_item = $this->input->get('AllProduct');
		$this->db->select('ID, upper(Name) AS Name');
		$this->db->from('brandinformation');
		$this->db->where('ProductType', REGULAR_PRODUCT, false);
		$this->db->where('IsNewProduct', 1, false);
		$this->db->where('IsActive', 1, false);
		$this->db->where('IsDeleted', 0, false);
		$this->db->order_by('CreateDate', 'DESC');
		if ($all_item == 0) {
			$this->db->limit(config_item('home_page_new_item_limit'));
		}
		$all_new_information = $this->db->get()->result_array();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $all_new_information;
	}
	public function getHighlightedBrands()
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$this->db->select('b.ID');
		$this->db->select('UPPER(TRIM(b.Name)) AS Name');
		$this->db->select('b.PriceInBDT');
		$this->db->select('b.ImagePath');
		$this->db->select('g.ID AS GenericID');
		$this->db->select('CamelCase(g.Name) AS GenericName');
		$this->db->select('g.Classification');
		$this->db->select('g.SafetyRemark');
		$this->db->select('g.Indication');
		$this->db->select('g.DosageAdministration');
		$this->db->select('g.ContraindicationPrecaution');
		$this->db->select('g.Composition');
		$this->db->select('g.Pharmacology');
		$this->db->select('g.Interaction');
		$this->db->select('g.SideEffect');
		$this->db->select('g.OverdoseEffect');
		$this->db->select('g.StorageCondition');
		$this->db->select('g.PregnancyLactation');
		$this->db->select('m.ID AS ManufacturerID');
		$this->db->select('CamelCase(m.Name) AS ManufacturerName');
		$this->db->select('df.ID AS DosageFormID');
		$this->db->select('df.Name AS DosageForm');
		$this->db->select('s.ID AS StrengthID');
		$this->db->select('s.Name AS StrengthName');
		$this->db->select('ps.ID AS PackSizeID');
		$this->db->select('ps.Name AS PackSize');
		$this->db->select('b.IsHighlighted');
		$this->db->select('b.IsNewProduct');
		$this->db->select('b.IsNewBrand');
		$this->db->select('b.IsNewPresentation');
		$this->db->select('b.IsActive');
		$this->db->from('brandinformation AS b');
		$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
		$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
		$this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
		$this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
		$this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
		$this->db->where('g.IsActive', 1, false);
		$this->db->where('m.IsActive', 1, false);
		$this->db->where('df.IsActive', 1, false);
		$this->db->where('s.IsActive', 1, false);
		$this->db->where('ps.IsActive', 1, false);
		$this->db->where('b.IsHighlighted', 1, false);
		$this->db->where("b.ImagePath <> ''", NULL, false);
		$this->db->where('b.IsDeleted', 0, false);
		$this->db->where('g.IsDeleted', 0, false);
		$this->db->where('m.IsDeleted', 0, false);
		$this->db->where('df.IsDeleted', 0, false);
		$this->db->where('s.IsDeleted', 0, false);
		$this->db->where('ps.IsDeleted', 0, false);
		$this->db->order_by('rand()');
		$this->db->limit(3);
		$all_new_information = $this->db->get()->result_array();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return isset($all_new_information[0]['ID']) ? $all_new_information : array();
	}
	public function getAllDrugInfoForAutoComplete()
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$product_type = $this->input->get('ProductType');
		$this->db->select("DISTINCT(CONCAT(UPPER(TRIM(b.Name)), ' ', UPPER(TRIM(df.Name)))) AS bName", false);
		$this->db->from('brandinformation AS b');
		$this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
		$this->db->where('b.ProductType', $product_type, false);
		$this->db->where('b.IsActive', 1, false);
		$this->db->where('b.IsDeleted', 0, false);
		$this->db->where('df.IsActive', 1, false);
		$this->db->where('df.IsDeleted', 0, false);
		$this->db->order_by('bName');
		$result = $this->db->get()->result_array();
		$brand_information = array();
		foreach ($result as $data) {
			$brand_information[] = $data['bName'];
		}
		//		log_message('error', __LINE__.'Brands: '.print_r($brand_information, true));
		$this->db->select('CamelCase(g.Name) AS Name');
		$this->db->distinct();
		$this->db->from('brandinformation AS b');
		$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
		$this->db->where('b.ProductType', $product_type, false);
		$this->db->where('b.IsActive', 1, false);
		$this->db->where('b.IsDeleted', 0, false);
		$this->db->where('g.IsActive', 1, false);
		$this->db->where('g.IsDeleted', 0, false);
		$this->db->order_by('CamelCase(g.Name)');
		$result = $this->db->get()->result_array();
		$generic_information = array();
		foreach ($result as $data) {
			$generic_information[] = $data['Name'];
		}
		sort($generic_information);
		$this->db->select('g.IndicationTags');
		$this->db->from('brandinformation AS b');
		$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
		$this->db->where('b.ProductType', $product_type, false);
		$this->db->where('b.IsActive', 1, false);
		$this->db->where('b.IsDeleted', 0, false);
		$this->db->where('g.IsActive', 1, false);
		$this->db->where('g.IsDeleted', 0, false);
		$result = $this->db->get()->result_array();
		$indication_information = array();
		foreach ($result as $data) {
			$indication_information = array_merge($indication_information, explode(',', $data['IndicationTags']));
		}
		//        log_message('debug', __METHOD__.'#'.__LINE__.' Indication Tags: '.print_r($indication_information, true));
		$tags = array();
		foreach ($indication_information as $tag) {
			$tags[] = trim($tag);
		}
		$indication_information = array_unique($tags);
		sort($indication_information);
		//        log_message('debug', __METHOD__.'#'.__LINE__.' Indication Tags2: '.print_r($indication_information, true));
		$this->db->select('CamelCase(m.Name) AS Name');
		$this->db->distinct();
		$this->db->from('brandinformation AS b');
		$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
		$this->db->where('b.ProductType', $product_type, false);
		$this->db->where('b.IsActive', 1, false);
		$this->db->where('b.IsDeleted', 0, false);
		$this->db->where('m.IsActive', 1, false);
		$this->db->where('m.IsDeleted', 0, false);
		$result = $this->db->get()->result_array();
		$manufacturer_information = array();
		foreach ($result as $data) {
			$manufacturer_information[] = $data['Name'];
		}
		sort($manufacturer_information);
		$search_option_data = array(
			'Brand' => $brand_information,
			'Generic' => $generic_information,
			'Indication' => $indication_information,
			'Manufacturer' => $manufacturer_information
		);
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $search_option_data;
	}
	public function getAllNewData($brandType)
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$page_no = $this->input->get('PageNo');
		$page_no = empty($page_no) ? 1 : $page_no;
		$this->db->select('b.ID');
		$this->db->select('UPPER(TRIM(b.Name)) AS Name');
		$this->db->select('b.PriceInBDT');
		$this->db->select('g.ID AS GenericID');
		$this->db->select('CamelCase(g.Name) AS GenericName');
		$this->db->select('m.ID AS ManufacturerID');
		$this->db->select('CamelCase(m.Name) AS ManufacturerName');
		$this->db->from('brandinformation AS b');
		$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
		$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
		$this->db->where('b.ProductType', REGULAR_PRODUCT, false);
		$this->db->where('b.IsActive', 1, false);
		$this->db->where('g.IsActive', 1, false);
		$this->db->where('m.IsActive', 1, false);
		switch ($brandType) {
			case 'Product':
				$this->db->where('b.IsNewProduct', 1, false);
				break;
			case 'Brand':
				$this->db->where('b.IsNewBrand', 1, false);
				break;
			case 'Presentation':
				$this->db->where('b.IsNewPresentation', 1, false);
				break;
			default:
				break;
		}
		$this->db->where('b.IsDeleted', 0, false);
		$this->db->where('g.IsDeleted', 0, false);
		$this->db->where('m.IsDeleted', 0, false);
		$this->db->order_by('UPPER(TRIM(b.Name))');
		$this->db->limit(config_item('per_page_information_number'), ($page_no - 1) * config_item('per_page_information_number'));
		$all_new_information = $this->db->get()->result_array();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $all_new_information;
	}
	public function getTotalNewData($brandType)
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$this->db->select('COUNT(b.ID) AS Total');
		$this->db->from('brandinformation AS b');
		$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
		$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
		$this->db->where('b.ProductType', REGULAR_PRODUCT, false);
		$this->db->where('b.IsActive', 1, false);
		$this->db->where('g.IsActive', 1, false);
		$this->db->where('m.IsActive', 1, false);
		switch ($brandType) {
			case 'Product':
				$this->db->where('b.IsNewProduct', 1, false);
				break;
			case 'Brand':
				$this->db->where('b.IsNewBrand', 1, false);
				break;
			case 'Presentation':
				$this->db->where('b.IsNewPresentation', 1, false);
				break;
			default:
				break;
		}
		$this->db->where('b.IsDeleted', 0, false);
		$this->db->where('g.IsDeleted', 0, false);
		$this->db->where('m.IsDeleted', 0, false);
		$total = $this->db->get()->result_array();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $total[0]['Total'];
	}
	public function getSearchResult($productType, $option_type, $option_value)
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$all_new_information = array();
		$page_no = $this->input->get('PageNo');
		$page_no = empty($page_no) ? 1 : $page_no;
		switch ($option_type) {
			case 'brand':
				$this->db->select('b.ID');
				$this->db->select('UPPER(TRIM(b.Name)) AS Name');
				$this->db->select('b.PriceInBDT');
				$this->db->select('df.Name AS DosageForm');
				$this->db->select('s.Name AS StrengthName');
				$this->db->select('ps.Name AS PackSize');
				$this->db->select('g.ID AS GenericID');
				$this->db->select('CamelCase(g.Name) AS GenericName');
				$this->db->select('g.Classification');
				$this->db->select('g.SafetyRemark');
				$this->db->select('g.Indication');
				$this->db->select('g.DosageAdministration');
				$this->db->select('g.ContraindicationPrecaution');
				$this->db->select('g.Composition');
				$this->db->select('g.Pharmacology');
				$this->db->select('g.Interaction');
				$this->db->select('g.IndicationTags');
				$this->db->select('g.SideEffect');
				$this->db->select('g.OverdoseEffect');
				$this->db->select('g.StorageCondition');
				$this->db->select('g.PregnancyLactation');
				$this->db->select('CamelCase(m.Name) AS ManufacturerName');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
				$this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
				$this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
				$this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
				$this->db->where('b.ProductType', $productType, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('df.IsActive', 1, false);
				$this->db->where('s.IsActive', 1, false);
				$this->db->where('ps.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('m.IsDeleted', 0, false);
				$this->db->where('df.IsDeleted', 0, false);
				$this->db->where('s.IsDeleted', 0, false);
				$this->db->where('ps.IsDeleted', 0, false);
				$where = sprintf("(LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = '%s' OR LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = '%s' OR LOWER(TRIM(b.Name)) = '%s')", strtolower(trim($option_value)), strtolower(str_replace('   ', ' + ', trim($option_value))), strtolower(trim($option_value)));
				$this->db->where($where);
				$this->db->order_by('UPPER(TRIM(b.Name))');
				$this->db->limit(config_item('per_page_information_number_for_brand_search'), ($page_no - 1) * config_item('per_page_information_number_for_brand_search'));
				$all_new_information = $this->db->get()->result_array();
				break;
			case 'brand_by_alphabetically':
				$this->db->select('b.ID');
				$this->db->select('UPPER(TRIM(b.Name)) AS Name');
				$this->db->select('b.PriceInBDT');
				$this->db->select('df.Name AS DosageForm');
				$this->db->select('s.Name AS StrengthName');
				$this->db->select('ps.Name AS PackSize');
				$this->db->select('g.ID AS GenericID');
				$this->db->select('CamelCase(g.Name) AS GenericName');
				$this->db->select('g.Classification');
				$this->db->select('g.SafetyRemark');
				$this->db->select('g.Indication');
				$this->db->select('g.DosageAdministration');
				$this->db->select('g.ContraindicationPrecaution');
				$this->db->select('g.Composition');
				$this->db->select('g.Pharmacology');
				$this->db->select('g.Interaction');
				$this->db->select('g.SideEffect');
				$this->db->select('g.OverdoseEffect');
				$this->db->select('g.StorageCondition');
				$this->db->select('g.PregnancyLactation');
				$this->db->select('CamelCase(m.Name) AS ManufacturerName');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
				$this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
				$this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
				$this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
				$this->db->where('b.ProductType', $productType, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('df.IsActive', 1, false);
				$this->db->where('s.IsActive', 1, false);
				$this->db->where('ps.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('m.IsDeleted', 0, false);
				$this->db->where('df.IsDeleted', 0, false);
				$this->db->where('s.IsDeleted', 0, false);
				$this->db->where('ps.IsDeleted', 0, false);
				$this->db->like('UPPER(TRIM(b.Name))', strtoupper(trim($option_value)), 'after');
				$this->db->order_by('UPPER(TRIM(b.Name))');
				$this->db->limit(config_item('per_page_information_number_for_brand_by_alphabetically_search'), ($page_no - 1) * config_item('per_page_information_number_for_brand_by_alphabetically_search'));
				$all_new_information = $this->db->get()->result_array();
				break;
			case 'generic':
				$this->db->select('UPPER(TRIM(b.Name)) AS Name');
				$this->db->select('CamelCase(m.Name) AS ManufacturerName');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
				$this->db->where('b.ProductType', $productType, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('m.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('m.IsDeleted', 0, false);
				$where = sprintf("(LOWER(TRIM(g.Name)) = '%s' OR LOWER(TRIM(g.Name)) = '%s')", strtolower(trim($option_value)), strtolower(trim(str_replace('   ', ' + ', trim($option_value)))));
				$this->db->where($where);
				$this->db->group_by(array("b.Name", "m.Name"));
				//				$this->db->order_by('UPPER(TRIM(b.Name))', 'm.Name');
				$this->db->limit(config_item('per_page_information_number_for_generic_search'), ($page_no - 1) * config_item('per_page_information_number_for_generic_search'));
				$all_data = $this->db->get()->result_array();
				$this->db->select('CamelCase(g.Name) AS Name');
				$this->db->select('g.Classification');
				$this->db->select('g.SafetyRemark');
				$this->db->select('g.Indication');
				$this->db->select('g.DosageAdministration');
				$this->db->select('g.ContraindicationPrecaution');
				$this->db->select('g.Composition');
				$this->db->select('g.Pharmacology');
				$this->db->select('g.Interaction');
				$this->db->select('g.SideEffect');
				$this->db->select('g.OverdoseEffect');
				$this->db->select('g.StorageCondition');
				$this->db->select('g.PregnancyLactation');
				$this->db->from('genericinformation AS g');
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('g.IsDeleted', 0, false);
				$where = sprintf("(LOWER(trim(g.Name)) = '%s' OR LOWER(trim(g.Name)) = '%s')", strtolower(trim($option_value)), strtolower(trim(str_replace('   ', ' + ', trim($option_value)))));
				$this->db->where($where);
				$this->db->limit(1);
				$generic_data = $this->db->get()->result_array();
				return array($all_data, $generic_data);
				break;
			case 'generic_by_alphabetically':
				$this->db->select('UPPER(TRIM(b.Name)) AS Name');
				$this->db->select('CamelCase(m.Name) AS ManufacturerName');
				$this->db->select('CamelCase(g.Name) AS GenericName');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
				$this->db->where('b.ProductType', $productType, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('m.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('m.IsDeleted', 0, false);
				$this->db->like('UPPER(TRIM(g.Name))', strtoupper(trim($option_value)), 'after');
				$this->db->group_by(array("UPPER(TRIM(b.Name))", "g.Name", "m.Name"));
				$this->db->order_by("UPPER(TRIM(b.Name))", "g.Name", "m.Name");
				$this->db->limit(config_item('per_page_information_number_for_generic_by_alphabetically_search'), ($page_no - 1) * config_item('per_page_information_number_for_generic_by_alphabetically_search'));
				$all_new_information = $this->db->get()->result_array();
				break;
			case 'indication':
				$this->db->select('CamelCase(g.Name) AS Name');
				$this->db->distinct();
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->where('b.ProductType', $productType, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->like('LOWER(g.IndicationTags)', strtolower(trim($option_value)));
				//				$this->db->order_by('UPPER(TRIM(g.Name))');
				$this->db->limit(config_item('per_page_information_number_for_indication_search'), ($page_no - 1) * config_item('per_page_information_number_for_indication_search'));
				$all_new_information = $this->db->get()->result_array();
				sort($all_new_information);
				break;
			case 'manufacturer':
				$this->db->select('UPPER(TRIM(b.Name)) AS Name');
				$this->db->select('CamelCase(g.Name) AS GenericName');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
				$this->db->where('b.ProductType', $productType, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('m.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('m.IsDeleted', 0, false);
				$this->db->where('LOWER(TRIM(m.Name))', strtolower(trim($option_value)));
				$this->db->group_by(array("UPPER(TRIM(b.Name))", "g.Name"));
				$this->db->order_by('UPPER(TRIM(b.Name))', 'g.Name');
				$this->db->limit(config_item('per_page_information_number_for_manufacturer_search'), ($page_no - 1) * config_item('per_page_information_number_for_manufacturer_search'));
				$all_new_information = $this->db->get()->result_array();
				break;
			default:
				break;
		}
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $all_new_information;
	}
	public function getTotalSearchResult($productType, $option_type, $option_value)
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$total = 0;
		switch ($option_type) {
			case 'brand':
				$this->db->select('COUNT(b.ID) AS Total');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
				$this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
				$this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
				$this->db->where('b.ProductType', $productType, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('df.IsActive', 1, false);
				$this->db->where('s.IsActive', 1, false);
				$this->db->where('ps.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('df.IsDeleted', 0, false);
				$this->db->where('s.IsDeleted', 0, false);
				$this->db->where('ps.IsDeleted', 0, false);
				$where = sprintf("(LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = '%s') OR (LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = '%s') OR LOWER(TRIM(b.Name) = '%s')", strtolower(trim($option_value)), strtolower(str_replace('   ', ' + ', trim($option_value))), strtolower(trim($option_value)));
				$this->db->where($where);
				$total = $this->db->get()->result_array();
				break;
			case 'brand_by_alphabetically':
				$this->db->select('COUNT(b.ID) AS Total');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
				$this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
				$this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
				$this->db->where('b.ProductType', $productType, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('df.IsActive', 1, false);
				$this->db->where('s.IsActive', 1, false);
				$this->db->where('ps.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('df.IsDeleted', 0, false);
				$this->db->where('s.IsDeleted', 0, false);
				$this->db->where('ps.IsDeleted', 0, false);
				$this->db->like('UPPER(TRIM(b.Name))', strtoupper(trim($option_value)), 'after');
				$total = $this->db->get()->result_array();
				break;
			case 'generic':
				$this->db->select('COUNT(b.ID) AS Total');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
				$this->db->where('b.ProductType', $productType, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('m.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('m.IsDeleted', 0, false);
				$where = sprintf("(LOWER(TRIM(g.Name)) = '%s' OR LOWER(TRIM(g.Name)) = '%s')", strtolower(trim($option_value)), strtolower(str_replace('   ', ' + ', trim($option_value))));
				$this->db->where($where);
				$total = $this->db->get()->result_array();
				break;
			case 'generic_by_alphabetically':
				$this->db->select('COUNT(b.ID) AS Total');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
				$this->db->where('b.ProductType', $productType, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('m.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('m.IsDeleted', 0, false);
				$this->db->like('LOWER(TRIM(g.Name))', strtolower(trim($option_value)), 'after');
				$total = $this->db->get()->result_array();
				break;
			case 'indication':
				$this->db->select('COUNT(DISTINCT(g.Name)) AS Total');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->where('b.ProductType', $productType, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->like('LOWER(g.IndicationTags)', strtolower(trim($option_value)));
				$total = $this->db->get()->result_array();
				break;
			case 'manufacturer':
				$this->db->select('COUNT(b.ID) AS Total');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
				$this->db->where('b.ProductType', $productType, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('m.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('m.IsDeleted', 0, false);
				$where = sprintf("(LOWER(TRIM(m.Name)) = '%s' OR LOWER(TRIM(m.Name)) = '%s')", strtolower(trim($option_value)), strtolower(str_replace('   ', ' + ', trim($option_value))));
				$this->db->where($where);
				$total = $this->db->get()->result_array();
				break;
			default:
				break;
		}
		//        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.'.$this->db->last_query());
		return $total[0]['Total'];
	}
	public function getSearchResultForFrontend($option_type, $option_value)
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$data = array();
		$product_type = $this->input->get('ProductType');
		$page_no = $this->input->get('PageNo');
		$page_no = empty($page_no) ? 1 : $page_no;
		switch ($option_type) {
			case 'brand':
				$this->db->select('b.ID');
				$this->db->select('UPPER(TRIM(b.Name)) AS Name');
				$this->db->select('b.PriceInBDT');
				$this->db->select('df.Name AS DosageForm');
				$this->db->select('s.Name AS StrengthName');
				$this->db->select('ps.Name AS PackSize');
				$this->db->select('g.ID AS GenericID');
				$this->db->select('CamelCase(g.Name) AS GenericName');
				$this->db->select('g.Classification');
				$this->db->select('g.SafetyRemark');
				$this->db->select('g.Indication');
				$this->db->select('g.DosageAdministration');
				$this->db->select('g.ContraindicationPrecaution');
				$this->db->select('g.Composition');
				$this->db->select('g.Pharmacology');
				$this->db->select('g.Interaction');
				$this->db->select('g.SideEffect');
				$this->db->select('g.OverdoseEffect');
				$this->db->select('g.StorageCondition');
				$this->db->select('g.PregnancyLactation');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
				$this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
				$this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
				$this->db->where('b.ProductType', $product_type, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('df.IsActive', 1, false);
				$this->db->where('s.IsActive', 1, false);
				$this->db->where('ps.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('df.IsDeleted', 0, false);
				$this->db->where('s.IsDeleted', 0, false);
				$this->db->where('ps.IsDeleted', 0, false);
				if (!empty($option_value)) {
					$where = sprintf("(UPPER(TRIM(b.Name)) = '%s' OR UPPER(TRIM(b.Name)) = '%s')", strtoupper(trim($option_value)), strtoupper(str_replace('   ', ' + ', trim($option_value))));
					$this->db->where($where);
				}
				$this->db->order_by('UPPER(TRIM(b.Name))');
				$this->db->limit(config_item('per_page_information_number_for_brand_search'), ($page_no - 1) * config_item('per_page_information_number_for_brand_search'));
				$data = $this->db->get()->result_array();
				break;
			case 'brand_by_alphabetically':
				$this->db->select('b.ID');
				$this->db->select('UPPER(TRIM(b.Name)) AS Name');
				$this->db->select('b.PriceInBDT');
				$this->db->select('df.Name AS DosageForm');
				$this->db->select('s.Name AS StrengthName');
				$this->db->select('ps.Name AS PackSize');
				$this->db->select('g.ID AS GenericID');
				$this->db->select('CamelCase(g.Name) AS GenericName');
				$this->db->select('g.Classification');
				$this->db->select('g.SafetyRemark');
				$this->db->select('g.Indication');
				$this->db->select('g.DosageAdministration');
				$this->db->select('g.ContraindicationPrecaution');
				$this->db->select('g.Composition');
				$this->db->select('g.Pharmacology');
				$this->db->select('g.Interaction');
				$this->db->select('g.SideEffect');
				$this->db->select('g.OverdoseEffect');
				$this->db->select('g.StorageCondition');
				$this->db->select('g.PregnancyLactation');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
				$this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
				$this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
				$this->db->where('b.ProductType', $product_type, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('df.IsActive', 1, false);
				$this->db->where('s.IsActive', 1, false);
				$this->db->where('ps.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('df.IsDeleted', 0, false);
				$this->db->where('s.IsDeleted', 0, false);
				$this->db->where('ps.IsDeleted', 0, false);
				$this->db->like('UPPER(TRIM(b.Name))', strtoupper(trim($option_value)), 'after');
				$this->db->order_by('UPPER(TRIM(b.Name))');
				$this->db->limit(config_item('per_page_information_number_for_brand_by_alphabetically_search'), ($page_no - 1) * config_item('per_page_information_number_for_brand_by_alphabetically_search'));
				$data = $this->db->get()->result_array();
				break;
			case 'generic':
				$this->db->select('UPPER(TRIM(b.Name)) AS Name');
				$this->db->select('CamelCase(m.Name) AS ManufacturerName');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
				$this->db->where('b.ProductType', $product_type, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('m.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('m.IsDeleted', 0, false);
				$where = sprintf("(LOWER(TRIM(g.Name)) = '%s' OR LOWER(TRIM(g.Name)) = '%s')", strtolower(trim($option_value)), strtolower(str_replace('   ', ' + ', trim($option_value))));
				$this->db->where($where);
				$this->db->group_by(array("UPPER(TRIM(b.Name))", "m.Name"));
				$this->db->order_by('UPPER(TRIM(b.Name))', 'm.Name');
				$this->db->limit(config_item('per_page_information_number_for_generic_search'), ($page_no - 1) * config_item('per_page_information_number_for_generic_search'));
				$data = $this->db->get()->result_array();
				break;
			case 'generic_by_alphabetically':
				$this->db->select('UPPER(TRIM(b.Name)) AS Name');
				$this->db->select('CamelCase(m.Name) AS ManufacturerName');
				$this->db->select('CamelCase(g.Name) AS GenericName');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
				$this->db->where('b.ProductType', $product_type, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('m.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('m.IsDeleted', 0, false);
				$this->db->like('LOWER(TRIM(g.Name))', strtolower(trim($option_value)), 'after');
				$this->db->group_by(array("UPPER(TRIM(b.Name))", "g.Name", "m.Name"));
				$this->db->order_by("UPPER(TRIM(b.Name))", "g.Name", "m.Name");
				$this->db->limit(config_item('per_page_information_number_for_generic_by_alphabetically_search'), ($page_no - 1) * config_item('per_page_information_number_for_generic_by_alphabetically_search'));
				$data = $this->db->get()->result_array();
				break;
			case 'indication':
				$this->db->select('UPPER(TRIM(b.Name)) AS Name');
				$this->db->select('CamelCase(m.Name) AS ManufacturerName');
				$this->db->select('CamelCase(g.Name) AS GenericName');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
				$this->db->where('b.ProductType', $product_type, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('m.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('m.IsDeleted', 0, false);
				$this->db->like('LOWER(TRIM(g.Indication))', strtolower(trim($option_value)));
				$this->db->group_by(array("UPPER(TRIM(b.Name))", "g.Name", "m.Name"));
				$this->db->order_by('UPPER(TRIM(b.Name))', 'g.Name', 'm.Name');
				$this->db->limit(config_item('per_page_information_number_for_indication_search'), ($page_no - 1) * config_item('per_page_information_number_for_indication_search'));
				$data = $this->db->get()->result_array();
				break;
			case 'manufacturer':
				$manufacturer_brand_option = $this->input->get('ManufacturerBrandOption');
				$this->db->select('UPPER(TRIM(b.Name)) AS Name');
				$this->db->select('CamelCase(g.Name) AS GenericName');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
				$this->db->where('b.ProductType', $product_type, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('m.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('m.IsDeleted', 0, false);
				if (!empty($manufacturer_brand_option)) {
					$this->db->like('UPPER(TRIM(b.Name))', trim($manufacturer_brand_option), 'after');
				}
				$this->db->where('LOWER(TRIM(m.Name))', strtolower(trim($option_value)));
				$this->db->group_by(array("UPPER(TRIM(b.Name))", "g.Name"));
				$this->db->order_by('UPPER(TRIM(b.Name))', 'g.Name');
				$this->db->limit(config_item('per_page_information_number_for_manufacturer_search'), ($page_no - 1) * config_item('per_page_information_number_for_manufacturer_search'));
				$data = $this->db->get()->result_array();
				break;
			default:
				break;
		}
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $data;
	}
	public function getTotalManufacturerBrand()
	{
		$product_type = $this->input->get('ProductType');
		$manufacturer = $this->input->get('Manufacturer');
		$manufacturer_brand_option = $this->input->get('ManufacturerBrandOption');
		$this->db->select('COUNT(b.ID) AS Total');
		$this->db->from('brandinformation AS b');
		$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
		$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
		$this->db->where('b.ProductType', $product_type, false);
		$this->db->where('b.IsActive', 1, false);
		$this->db->where('g.IsActive', 1, false);
		$this->db->where('m.IsActive', 1, false);
		$this->db->where('b.IsDeleted', 0, false);
		$this->db->where('g.IsDeleted', 0, false);
		$this->db->where('m.IsDeleted', 0, false);
		if (!empty($manufacturer_brand_option)) {
			$this->db->like('UPPER(TRIM(b.Name))', strtoupper(trim($manufacturer_brand_option)), 'after');
		}
		$this->db->where('LOWER(TRIM(m.Name))', strtolower(trim($manufacturer)));
		$this->db->group_by(array("UPPER(TRIM(b.Name))", "g.Name"));
		$total = $this->db->get()->result_array();
		return $total[0]['Total'];
	}
	public function getNewInformation($optionType)
	{
		$invalid_search = true;
		$page_no = $this->input->get('PageNo');
		$page_no = empty($page_no) ? 1 : $page_no;
		$this->db->select('b.ID');
		$this->db->select('UPPER(TRIM(b.Name)) AS Name');
		$this->db->select('b.PriceInBDT');
		$this->db->select('df.Name AS DosageForm');
		$this->db->select('s.Name AS StrengthName');
		$this->db->select('ps.Name AS PackSize');
		$this->db->from('brandinformation AS b');
		$this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
		$this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
		$this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
		$this->db->where('b.ProductType', REGULAR_PRODUCT, false);
		$this->db->where('b.IsActive', 1, false);
		$this->db->where('df.IsActive', 1, false);
		$this->db->where('s.IsActive', 1, false);
		$this->db->where('ps.IsActive', 1, false);
		$this->db->where('b.IsDeleted', 0, false);
		$this->db->where('df.IsDeleted', 0, false);
		$this->db->where('s.IsDeleted', 0, false);
		$this->db->where('ps.IsDeleted', 0, false);
		switch ($optionType) {
			case 'new_brand':
				$this->db->where('IsNewBrand', 1, false);
				break;
			case 'new_product':
				$this->db->where('IsNewProduct', 1, false);
				break;
			case 'new_presentation':
				$this->db->where('IsNewPresentation', 1, false);
				break;
			default:
				$invalid_search = false;
				break;
		}
		$data = array();
		$total_brand = 0;
		if ($invalid_search) {
			$this->db->order_by('UPPER(TRIM(b.Name))');
			$this->db->limit(config_item('per_page_information_number_for_brand_search'), ($page_no - 1) * config_item('per_page_information_number_for_brand_search'));
			$data = $this->db->get()->result_array();
			$this->db->select('COUNT(b.ID) AS Total');
			$this->db->from('brandinformation AS b');
			$this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
			$this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
			$this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
			$this->db->where('b.ProductType', REGULAR_PRODUCT, false);
			$this->db->where('b.IsActive', 1, false);
			$this->db->where('df.IsActive', 1, false);
			$this->db->where('s.IsActive', 1, false);
			$this->db->where('ps.IsActive', 1, false);
			$this->db->where('b.IsDeleted', 0, false);
			$this->db->where('df.IsDeleted', 0, false);
			$this->db->where('s.IsDeleted', 0, false);
			$this->db->where('ps.IsDeleted', 0, false);
			switch ($optionType) {
				case 'new_brand':
					$this->db->where('IsNewBrand', 1, false);
					break;
				case 'new_product':
					$this->db->where('IsNewProduct', 1, false);
					break;
				case 'new_presentation':
					$this->db->where('IsNewPresentation', 1, false);
					break;
				default:
					break;
			}
			$total_brand = $this->db->get()->result_array();
		}
		return array($total_brand[0]['Total'], $data);
	}
	public function getAllBrandIDs()
	{
		$manufacturer = $this->input->get('manufacturer');
		$this->db->select('b.ID');
		$this->db->from('brandinformation AS b');
		if (!empty($manufacturer)) {
			$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
			$this->db->where('m.IsActive', 1, false);
			$this->db->where('m.IsDeleted', 0, false);
			$this->db->where('m.ID', $manufacturer, false);
		}
		$this->db->where('b.IsDeleted', 0, false);
		$this->db->where('b.IsActive', 1, false);
		$this->db->order_by('rand()');
		return $this->db->get()->result_array();
		//		return shuffle($result);
	}
	public function getAllGenericNames()
	{
		$this->db->select('g.Name');
		$this->db->from('genericinformation AS g');
		$this->db->where('g.IsDeleted', 0, false);
		$this->db->where('g.IsActive', 1, false);
		$this->db->order_by('rand()');
		return $this->db->get()->result_array();
		//		return shuffle($result);
	}
	public function getAllManufacturerNames()
	{
		$this->db->select('m.Name');
		$this->db->from('manufacturerinformation AS m');
		$this->db->where('m.IsDeleted', 0, false);
		$this->db->where('m.IsActive', 1, false);
		$this->db->order_by('rand()');
		return $this->db->get()->result_array();
		//		return shuffle($result);
	}
	public function getSearchResultForSEO($productType, $option_type, $option_value)
	{
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$all_new_information = array();
		$page_no = $this->input->get('PageNo');
		$page_no = empty($page_no) ? 1 : $page_no;
		switch ($option_type) {
			case 'brand':
				$this->db->select('b.ID');
				$this->db->select('UPPER(TRIM(b.Name)) AS Name');
				$this->db->select('b.PriceInBDT');
				$this->db->select('df.Name AS DosageForm');
				$this->db->select('s.Name AS StrengthName');
				$this->db->select('ps.Name AS PackSize');
				$this->db->select('g.ID AS GenericID');
				$this->db->select('CamelCase(g.Name) AS GenericName');
				$this->db->select('g.Classification');
				$this->db->select('g.SafetyRemark');
				$this->db->select('g.Indication');
				$this->db->select('g.DosageAdministration');
				$this->db->select('g.ContraindicationPrecaution');
				$this->db->select('g.Composition');
				$this->db->select('g.Pharmacology');
				$this->db->select('g.Interaction');
				$this->db->select('g.IndicationTags');
				$this->db->select('g.SideEffect');
				$this->db->select('g.OverdoseEffect');
				$this->db->select('g.StorageCondition');
				$this->db->select('g.PregnancyLactation');
				$this->db->select('CamelCase(m.Name) AS ManufacturerName');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
				$this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
				$this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
				$this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
				$this->db->where('b.ProductType', $productType, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('df.IsActive', 1, false);
				$this->db->where('s.IsActive', 1, false);
				$this->db->where('ps.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('m.IsDeleted', 0, false);
				$this->db->where('df.IsDeleted', 0, false);
				$this->db->where('s.IsDeleted', 0, false);
				$this->db->where('ps.IsDeleted', 0, false);
				$where = sprintf("(LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = '%s' OR LOWER(CONCAT(TRIM(b.Name), ' ', TRIM(df.Name))) = '%s' OR LOWER(TRIM(b.Name)) = '%s')", strtolower(trim($option_value)), strtolower(str_replace('   ', ' + ', trim($option_value))), strtolower(trim($option_value)));
				$this->db->where($where);
				$this->db->order_by('UPPER(TRIM(b.Name))');
				//				$this->db->limit(config_item('per_page_information_number_for_brand_search'), ($page_no - 1) * config_item('per_page_information_number_for_brand_search'));
				$all_new_information = $this->db->get()->result_array();
				break;
			case 'brand_by_alphabetically':
				$this->db->select('b.ID');
				$this->db->select('UPPER(TRIM(b.Name)) AS Name');
				$this->db->select('b.PriceInBDT');
				$this->db->select('df.Name AS DosageForm');
				$this->db->select('s.Name AS StrengthName');
				$this->db->select('ps.Name AS PackSize');
				$this->db->select('g.ID AS GenericID');
				$this->db->select('CamelCase(g.Name) AS GenericName');
				$this->db->select('g.Classification');
				$this->db->select('g.SafetyRemark');
				$this->db->select('g.Indication');
				$this->db->select('g.DosageAdministration');
				$this->db->select('g.ContraindicationPrecaution');
				$this->db->select('g.Composition');
				$this->db->select('g.Pharmacology');
				$this->db->select('g.Interaction');
				$this->db->select('g.SideEffect');
				$this->db->select('g.OverdoseEffect');
				$this->db->select('g.StorageCondition');
				$this->db->select('g.PregnancyLactation');
				$this->db->select('CamelCase(m.Name) AS ManufacturerName');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
				$this->db->join('dosageforminformation AS df', 'b.DosageFormID = df.ID', 'inner');
				$this->db->join('strengthinformation AS s', 'b.StrengthID = s.ID', 'inner');
				$this->db->join('packsizeinformation AS ps', 'b.PackSizeID = ps.ID', 'inner');
				$this->db->where('b.ProductType', $productType, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('df.IsActive', 1, false);
				$this->db->where('s.IsActive', 1, false);
				$this->db->where('ps.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('m.IsDeleted', 0, false);
				$this->db->where('df.IsDeleted', 0, false);
				$this->db->where('s.IsDeleted', 0, false);
				$this->db->where('ps.IsDeleted', 0, false);
				$this->db->like('UPPER(TRIM(b.Name))', strtoupper(trim($option_value)), 'after');
				$this->db->order_by('UPPER(TRIM(b.Name))');
				//				$this->db->limit(config_item('per_page_information_number_for_brand_by_alphabetically_search'), ($page_no - 1) * config_item('per_page_information_number_for_brand_by_alphabetically_search'));
				$all_new_information = $this->db->get()->result_array();
				break;
			case 'generic':
				$this->db->select('UPPER(TRIM(b.Name)) AS Name');
				$this->db->select('CamelCase(m.Name) AS ManufacturerName');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
				$this->db->where('b.ProductType', $productType, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('m.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('m.IsDeleted', 0, false);
				$where = sprintf("(LOWER(TRIM(g.Name)) = '%s' OR LOWER(TRIM(g.Name)) = '%s')", strtolower(trim($option_value)), strtolower(trim(str_replace('   ', ' + ', trim($option_value)))));
				$this->db->where($where);
				$this->db->group_by(array("b.Name", "m.Name"));
				//				$this->db->order_by('UPPER(TRIM(b.Name))', 'm.Name');
				//				$this->db->limit(config_item('per_page_information_number_for_generic_search'), ($page_no - 1) * config_item('per_page_information_number_for_generic_search'));
				$all_data = $this->db->get()->result_array();
				$this->db->select('CamelCase(g.Name) AS Name');
				$this->db->select('g.Classification');
				$this->db->select('g.SafetyRemark');
				$this->db->select('g.Indication');
				$this->db->select('g.DosageAdministration');
				$this->db->select('g.ContraindicationPrecaution');
				$this->db->select('g.Composition');
				$this->db->select('g.Pharmacology');
				$this->db->select('g.Interaction');
				$this->db->select('g.SideEffect');
				$this->db->select('g.OverdoseEffect');
				$this->db->select('g.StorageCondition');
				$this->db->select('g.PregnancyLactation');
				$this->db->from('genericinformation AS g');
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('g.IsDeleted', 0, false);
				$where = sprintf("(LOWER(trim(g.Name)) = '%s' OR LOWER(trim(g.Name)) = '%s')", strtolower(trim($option_value)), strtolower(trim(str_replace('   ', ' + ', trim($option_value)))));
				$this->db->where($where);
				$this->db->limit(1);
				$generic_data = $this->db->get()->result_array();
				return array($all_data, $generic_data);
				break;
			case 'generic_by_alphabetically':
				$this->db->select('UPPER(TRIM(b.Name)) AS Name');
				$this->db->select('CamelCase(m.Name) AS ManufacturerName');
				$this->db->select('CamelCase(g.Name) AS GenericName');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
				$this->db->where('b.ProductType', $productType, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('m.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('m.IsDeleted', 0, false);
				$this->db->like('UPPER(TRIM(g.Name))', strtoupper(trim($option_value)), 'after');
				$this->db->group_by(array("UPPER(TRIM(b.Name))", "g.Name", "m.Name"));
				$this->db->order_by("UPPER(TRIM(b.Name))", "g.Name", "m.Name");
				//				$this->db->limit(config_item('per_page_information_number_for_generic_by_alphabetically_search'), ($page_no - 1) * config_item('per_page_information_number_for_generic_by_alphabetically_search'));
				$all_new_information = $this->db->get()->result_array();
				break;
			case 'indication':
				$this->db->select('CamelCase(g.Name) AS Name');
				$this->db->distinct();
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->where('b.ProductType', $productType, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->like('LOWER(g.IndicationTags)', strtolower(trim($option_value)));
				//				$this->db->order_by('UPPER(TRIM(g.Name))');
				//				$this->db->limit(config_item('per_page_information_number_for_indication_search'), ($page_no - 1) * config_item('per_page_information_number_for_indication_search'));
				$all_new_information = $this->db->get()->result_array();
				sort($all_new_information);
				break;
			case 'manufacturer':
				$this->db->select('UPPER(TRIM(b.Name)) AS Name');
				$this->db->select('CamelCase(g.Name) AS GenericName');
				$this->db->from('brandinformation AS b');
				$this->db->join('genericinformation AS g', 'b.GenericID = g.ID', 'inner');
				$this->db->join('manufacturerinformation AS m', 'b.ManufacturerID = m.ID', 'inner');
				$this->db->where('b.ProductType', $productType, false);
				$this->db->where('b.IsActive', 1, false);
				$this->db->where('g.IsActive', 1, false);
				$this->db->where('m.IsActive', 1, false);
				$this->db->where('b.IsDeleted', 0, false);
				$this->db->where('g.IsDeleted', 0, false);
				$this->db->where('m.IsDeleted', 0, false);
				$this->db->where('LOWER(TRIM(m.Name))', strtolower(trim($option_value)));
				$this->db->group_by(array("UPPER(TRIM(b.Name))", "g.Name"));
				$this->db->order_by('UPPER(TRIM(b.Name))', 'g.Name');
				//				$this->db->limit(config_item('per_page_information_number_for_manufacturer_search'), ($page_no - 1) * config_item('per_page_information_number_for_manufacturer_search'));
				$all_new_information = $this->db->get()->result_array();
				break;
			default:
				break;
		}
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $all_new_information;
	}
}
