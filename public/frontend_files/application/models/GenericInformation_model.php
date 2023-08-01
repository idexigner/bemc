<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/GenericInformationEntity.php';

class GenericInformation_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function createGenericInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->require_fields = array('GenericName');
        $this->request_type = 'post';
        $check_require_field_erro = parent::create();
        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

        $data = array();
        $data['Name'] = $this->input->post('GenericName');
        $data['Classification'] = $this->input->post('Classification');
        $data['SafetyRemark'] = $this->input->post('SafetyRemark');
        $data['Indication'] = $this->input->post('Indication');
        $data['IndicationTags'] = $this->input->post('IndicationTags');
        $data['DosageAdministration'] = $this->input->post('DosageAdministration');
		$data['ContraindicationPrecaution'] = $this->input->post('ContraindicationPrecaution');
		$data['Composition'] = $this->input->post('Composition');
		$data['Pharmacology'] = $this->input->post('Pharmacology');
		$data['Interaction'] = $this->input->post('Interaction');
		$data['SideEffect'] = $this->input->post('SideEffect');
		$data['OverdoseEffect'] = $this->input->post('OverdoseEffect');
		$data['StorageCondition'] = $this->input->post('StorageCondition');
		$data['PregnancyLactation'] = $this->input->post('PregnancyLactation');
        $data['CreatedBy'] = $userID;
        $generic_information_entity = new GenericInformationEntity($data);
        $generic_information_data = $generic_information_entity->getGenericEntityForCreate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        if($this->db->insert('genericinformation', $generic_information_data)) {
            return $this->prepareErrorResponse(NO_ERROR);
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }

    public function getAllActiveGenericInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('g.ID');
        $this->db->select('g.Name');
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
        $this->db->select('g.IsActive');
        $this->db->from('genericinformation as g');
        $this->db->where('g.IsActive', 1);
        $this->db->where('g.IsDeleted', 0);
        $this->db->order_by('g.Name');
        $all_information = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }

    public function getDetail($tableName, $id){
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $generic_id = $this->input->get('GenericID');
        if ($generic_id) {
            $this->db->select('g.ID');
            $this->db->select('g.Name');
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
            $this->db->select('g.IsActive');
            $this->db->from('genericinformation as g');
            $this->db->where('g.IsActive', 1);
            $this->db->where('g.IsDeleted', 0);
            $this->db->limit(1);
            $generic_information = $this->db->get()->result_array();
            return isset($generic_information[0]['ID']) ? $generic_information[0] : array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
    }

    public function updateGenericInformation($userID) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $generic_information_id = $this->input->get('GenericID');
        if (empty($generic_information_id)) {
            return false;
        }

        $data = array();
        $data['Name'] = $this->input->post('GenericName');
        $data['Classification'] = $this->input->post('Classification');
        $data['SafetyRemark'] = $this->input->post('SafetyRemark');
        $data['Indication'] = $this->input->post('Indication');
        $data['IndicationTags'] = $this->input->post('IndicationTags');
        $data['DosageAdministration'] = $this->input->post('DosageAdministration');
        $data['ContraindicationPrecaution'] = $this->input->post('ContraindicationPrecaution');
		$data['Composition'] = $this->input->post('Composition');
		$data['Pharmacology'] = $this->input->post('Pharmacology');
		$data['Interaction'] = $this->input->post('Interaction');
		$data['SideEffect'] = $this->input->post('SideEffect');
		$data['OverdoseEffect'] = $this->input->post('OverdoseEffect');
		$data['StorageCondition'] = $this->input->post('StorageCondition');
		$data['PregnancyLactation'] = $this->input->post('PregnancyLactation');
        $data['IsActive'] = $this->input->post('IsActive');
        $data['CreatedBy'] = $userID;

        $require_fields = array('GenericName');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

        $generic_information_entity = new GenericInformationEntity($data);
        $generic_information_data = $generic_information_entity->getGenericEntityForUpdate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        $this->db->set($generic_information_data);
        $this->db->where('ID', $generic_information_id);
        if($this->db->update('genericinformation', $generic_information_data)) {
            return $this->prepareErrorResponse(NO_ERROR);
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }

    public function deleteGeneric() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $id = $this->input->get('GenericID');

        $data = array();
        $data['IsActive'] = 0;
        $data['IsDeleted'] = 1;
        $data['LastUpdate'] = date('Y-m-d H:i:s');
        $this->db->set($data);
        $this->db->where('ID', $id);
        $return = $this->db->update('genericinformation');

        return $return;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function getAllGenericInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('g.ID');
        $this->db->select('g.Name');
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
        $this->db->select('g.IsActive');
        $this->db->from('genericinformation as g');
        $this->db->where('g.IsDeleted', 0);
        $this->db->order_by('g.Name');
        $all_information = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }
    
    public function getGenericDetail() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $generic_id = $this->input->get('GenericID');
        if ($generic_id) {
            $this->db->select('g.ID');
            $this->db->select('g.Name');
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
            $this->db->select('g.IsActive');
            $this->db->from('genericinformation as g');
            $this->db->where('g.ID', $generic_id);
            $this->db->where('g.IsDeleted', 0);
            $this->db->limit(1);
            $information = $this->db->get()->result_array();
//            echo $this->db->last_query();
            return isset($information[0]) ? $information[0] : array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
    }
}
