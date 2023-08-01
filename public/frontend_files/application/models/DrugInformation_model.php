<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/DrugInformationEntity.php';

class DrugInformation_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function createDrugInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->require_fields = array('GenericID', 'BrandID', 'ManufacturerID', 'DosageFormID', 'StrengthID', 'PackSizeID', 'PriceInBDT');
        $this->request_type = 'post';
        $check_require_field_erro = parent::create();
        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

        $data = array();
        $data['GenericID'] = $this->input->post('GenericID');
        $data['BrandID'] = $this->input->post('BrandID');
        $data['ManufacturerID'] = $this->input->post('ManufacturerID');
        $data['DosageFormID'] = $this->input->post('DosageFormID');
        $data['StrengthID'] = $this->input->post('StrengthID');
        $data['PackSizeID'] = $this->input->post('PackSizeID');
        $data['PriceInBDT'] = $this->input->post('PriceInBDT');
        $data['IsHighlighted'] = $this->input->post('IsHighlighted');
        $data['IsNewProduct'] = $this->input->post('IsNewProduct');
        $data['CreatedBy'] = $userID;
        $drug_information_entity = new DrugInformationEntity($data);
        $drug_information_data = $drug_information_entity->getDrugEntityForCreate();
        $drug_information_data['CreateDate'] = date('Y-m-d H:i:s');

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        if($this->db->insert('druginformation', $drug_information_data)) {
//            echo $this->db->last_query();
            return $this->prepareErrorResponse(NO_ERROR);
        } else {
//            echo $this->db->last_query();
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }

    public function getAllActiveDrugInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $page_no = $this->input->get('PageNo');
        $page_no = empty($page_no) ? 1 : $page_no;
        $this->db->select('d.ID AS DrugID, b.ID AS BrandID, b.Name AS BrandName, m.ID AS ManufacturerID, m.Name AS ManufacturerName, d.PriceInBDT, g.Name AS GenericName');
        $this->db->from('druginformation as d');
        $this->db->join('genericinformation as g', 'd.GenericID = g.ID', 'inner');
        $this->db->join('brandinformation as b', 'd.BrandID = b.ID', 'inner');
        $this->db->join('manufacturerinformation as m', 'd.ManufacturerID = m.ID', 'inner');
        $this->db->where('d.IsActive', 1);
        $this->db->where('g.IsActive', 1);
        $this->db->where('b.IsActive', 1);
        $this->db->where('m.IsActive', 1);
        $this->db->where('d.IsDeleted', 0);
        $this->db->where('g.IsDeleted', 0);
        $this->db->where('b.IsDeleted', 0);
        $this->db->where('m.IsDeleted', 0);
        $this->db->limit(config_item('per_page_information_number'), $page_no - 1);
        $this->db->order_by('b.Name');
        $all_information = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }

    public function searchBrandAlphabetically() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $page_no = $this->input->get('PageNo');
        $alphabet = $this->input->get('Alphabet');
        $page_no = empty($page_no) ? 1 : $page_no;
        $this->db->select('d.ID AS DrugID, b.ID AS BrandID, b.Name AS BrandName, m.ID AS ManufacturerID, m.Name AS ManufacturerName, d.PriceInBDT, g.Name AS GenericName');
        $this->db->from('druginformation as d');
        $this->db->join('genericinformation as g', 'd.GenericID = g.ID', 'inner');
        $this->db->join('brandinformation as b', 'd.BrandID = b.ID', 'inner');
        $this->db->join('manufacturerinformation as m', 'd.ManufacturerID = m.ID', 'inner');
        $this->db->where('d.IsActive', 1);
        $this->db->where('g.IsActive', 1);
        $this->db->where('b.IsActive', 1);
        $this->db->where('m.IsActive', 1);
        $this->db->where('d.IsDeleted', 0);
        $this->db->where('g.IsDeleted', 0);
        $this->db->where('b.IsDeleted', 0);
        $this->db->where('m.IsDeleted', 0);
        $this->db->like('LOWER(b.Name)', $alphabet, 'after');
        $this->db->limit(config_item('per_page_information_number'), $page_no - 1);
        $this->db->order_by('b.Name');
        $all_information = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }

    public function searchGenericAlphabetically() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $page_no = $this->input->get('PageNo');
        $alphabet = $this->input->get('Alphabet');
        $page_no = empty($page_no) ? 1 : $page_no;
        $this->db->select('d.ID AS DrugID, b.ID AS BrandID, b.Name AS BrandName, m.ID AS ManufacturerID, m.Name AS ManufacturerName, d.PriceInBDT, g.Name AS GenericName');
        $this->db->from('druginformation as d');
        $this->db->join('genericinformation as g', 'd.GenericID = g.ID', 'inner');
        $this->db->join('brandinformation as b', 'd.BrandID = b.ID', 'inner');
        $this->db->join('manufacturerinformation as m', 'd.ManufacturerID = m.ID', 'inner');
        $this->db->where('d.IsActive', 1);
        $this->db->where('g.IsActive', 1);
        $this->db->where('b.IsActive', 1);
        $this->db->where('m.IsActive', 1);
        $this->db->where('d.IsDeleted', 0);
        $this->db->where('g.IsDeleted', 0);
        $this->db->where('b.IsDeleted', 0);
        $this->db->where('m.IsDeleted', 0);
        $this->db->like('LOWER(g.Name)', $alphabet, 'after');
        $this->db->limit(config_item('per_page_information_number'), $page_no - 1);
        $this->db->order_by('g.Name');
        $all_information = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }

    public function getTotal() {
        $this->db->from('druginformation');
        $this->db->where('IsActive', 1);
        $this->db->where('IsDeleted', 0);
        return $this->db->count_all_results();
    }

    public function getDrugDetail(){
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $drug_id = $this->input->get('DrugID');
        if ($drug_id) {
            $this->db->select('d.ID AS DrugID');
            $this->db->select('d.PriceInBDT');
            $this->db->select('g.ID AS GenericID');
            $this->db->select('g.Name AS GenericName');
            $this->db->select('b.ID AS BrandID');
            $this->db->select('b.Name AS BrandName');
            $this->db->select('m.ID AS ManufacturerID');
            $this->db->select('m.Name AS ManufacturerName');
            $this->db->select('df.ID AS DosageFormID');
            $this->db->select('df.Name AS DosageForm');
            $this->db->select('s.ID AS StrengthID');
            $this->db->select('s.Name AS StrengthName');
            $this->db->select('ps.ID AS PackSizeID');
            $this->db->select('ps.Name AS PackSize');
            $this->db->select('d.IsHighlighted');
            $this->db->select('d.IsNewProduct');
            $this->db->select('d.IsActive');
            $this->db->from('druginformation as d');
            $this->db->join('genericinformation as g', 'd.GenericID = g.ID', 'inner');
            $this->db->join('brandinformation as b', 'd.BrandID = b.ID', 'inner');
            $this->db->join('manufacturerinformation as m', 'd.ManufacturerID = m.ID', 'inner');
            $this->db->join('dosageforminformation as df', 'd.DosageFormID = df.ID', 'inner');
            $this->db->join('strengthinformation as s', 'd.StrengthID = s.ID', 'inner');
            $this->db->join('packsizeinformation as ps', 'd.PackSizeID = ps.ID', 'inner');
            $this->db->where('d.ID', $drug_id);
            $this->db->where('d.IsActive', 1);
            $this->db->where('g.IsActive', 1);
            $this->db->where('b.IsActive', 1);
            $this->db->where('m.IsActive', 1);
            $this->db->where('df.IsActive', 1);
            $this->db->where('s.IsActive', 1);
            $this->db->where('ps.IsActive', 1);
            $this->db->where('d.IsDeleted', 0);
            $this->db->where('g.IsDeleted', 0);
            $this->db->where('b.IsDeleted', 0);
            $this->db->where('m.IsDeleted', 0);
            $this->db->where('df.IsDeleted', 0);
            $this->db->where('s.IsDeleted', 0);
            $this->db->where('ps.IsDeleted', 0);
            $this->db->limit(1);
            $information = $this->db->get()->result_array();
//            echo $this->db->last_query();
            return isset($information[0]) ? $information[0] : array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
    }

    public function updateDrugInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $drug_id = $this->input->get('DrugID');
        if (empty($drug_id)) {
            return false;
        }

        $data = array();
        $data['GenericID'] = $this->input->post('GenericID');
        $data['BrandID'] = $this->input->post('BrandID');
        $data['ManufacturerID'] = $this->input->post('ManufacturerID');
        $data['DosageFormID'] = $this->input->post('DosageFormID');
        $data['StrengthID'] = $this->input->post('StrengthID');
        $data['PackSizeID'] = $this->input->post('PackSizeID');
        $data['PriceInBDT'] = $this->input->post('PriceInBDT');
        $data['IsHighlighted'] = $this->input->post('IsHighlighted');
        $data['IsNewProduct'] = $this->input->post('IsNewProduct');
        $data['CreatedBy'] = $userID;

        $require_fields = array('GenericID', 'BrandID', 'ManufacturerID', 'DosageFormID', 'StrengthID', 'PackSizeID', 'PriceInBDT');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) {
            return $this->prepareErrorResponse($check_require_field_erro);
        }

        $drug_information_entity = new DrugInformationEntity($data);

        $drug_information_data = $drug_information_entity->getDrugEntityForUpdate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        $this->db->set($drug_information_data);
        $this->db->where('ID', $drug_id);
        if($this->db->update('druginformation')) {
            return $this->prepareErrorResponse(NO_ERROR);
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function deleteDrug() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $id = $this->input->get('DrugID');

        $data = array();
        $data['IsActive'] = 0;
        $data['IsDeleted'] = 1;
        $data['LastUpdate'] = date('Y-m-d H:i:s');
        $this->db->set($data);
        $this->db->where('ID', $id);
        $return = $this->db->update('druginformation');

        return $return;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function getNewDrugs() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('*');
        $this->db->from('druginformation');
        $this->db->where('IsActive', 1);
        $this->db->where('IsDeleted', 0);
        $this->db->order_by('CreateDate', 'DESC');
        $this->db->limit(config_item('per_page_new_drug_number'));
        $all_new_information = $this->db->get();
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $all_new_information;
    }

    public function getFeaturedDrugs() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('*');
        $this->db->from('druginformation');
        $this->db->where('IsActive', 1);
        $this->db->where('IsNewProduct', 1);
        $this->db->where('IsDeleted', 0);
        $this->db->order_by('CreateDate', 'DESC');
        $this->db->limit(config_item('per_page_featured_drug_number'));
        $all_new_information = $this->db->get();
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $all_new_information;
    }

    public function getHighlightedDrugs() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('*');
        $this->db->from('druginformation');
        $this->db->where('IsActive', 1);
        $this->db->where('IsHighlighted', 1);
        $this->db->where('IsDeleted', 0);
        $this->db->order_by('CreateDate', 'DESC');
        $this->db->limit(config_item('per_page_highlighted_news_number'));
        $all_new_information = $this->db->get('druginformation');
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $all_new_information;
    }
}
