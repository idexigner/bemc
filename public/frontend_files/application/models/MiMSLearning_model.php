<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/MiMSLearningEntity.php';

class MiMSLearning_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
    }

	public function getAllActiveMiMSLearning() {
		log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
		$this->db->select('ml.ID, ml.Title, ml.MiMSLearningType, ml.MiMSLearningPath, ml.IsActive');
		$this->db->from('mimslearning AS ml');
		$this->db->where('ml.IsActive', 1);
		$this->db->where('ml.IsDeleted', 0);
		$this->db->order_by('ml.Title');
		$this->db->limit(config_item('per_page_mimslearning_number'));
		$mimslearning = $this->db->get()->result_array();

//		$this->db->select('ml.ID');
//		$this->db->from('mimslearning AS ml');
//		$this->db->where('ml.IsActive', 1);
//		$this->db->where('ml.IsDeleted', 0);
//		$result = $this->db->get()->result_array();
//        echo $this->db->last_query();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
//		return array($mimslearning, count($result));
		return $mimslearning;
	}

	public function createMiMSLearning($userID) {
		log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
		$this->require_fields = array('Title', 'MiMSLearningType');
		$this->request_type = 'post';
		$check_require_field_erro = parent::create();
		if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

		$data = array();
		$data['Title'] = $this->input->post('Title');
		$data['MiMSLearningType'] = $this->input->post('MiMSLearningType');
		$data['MiMSLearningPath'] = $this->input->post('MiMSLearningPath');
		$data['CreatedBy'] = $userID;
		$mimslearning_information_entity = new MiMSLearningEntity($data);
		$mimslearning_information_data = $mimslearning_information_entity->getMiMSLearningEntityForCreate();

		if (empty($mimslearning_information_data)) {
			return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);
		}

		log_message('debug', __METHOD__.'#'.__LINE__.' MiMSLearning Data: '.print_r($data, true));
		if($this->db->insert('mimslearning', $mimslearning_information_data)) {
			$mimslearning_id = $this->db->insert_id();
			if (isset($_FILES["MiMSLearningPath"]) && $_FILES["MiMSLearningPath"]['tmp_name']){
				$upload_data = $this->util->upload('MiMSLearningImages', 'MiMSLearningPath');
				if ($upload_data) {
					$data = array();
					$data['MiMSLearningPath'] = $upload_data['file_name'];
					$this->db->set($data);
					$this->db->where('ID', $mimslearning_id);
					if($this->db->update('mimslearning')) {
						return $this->prepareErrorResponse(NO_ERROR);
					} else {
						$this->deleteMiMSLearning($mimslearning_id);
						return $this->prepareErrorResponse(ERROR_UNKNOWN);
					}
				} else {
					$this->deleteMiMSLearning($mimslearning_id);
					return $this->prepareErrorResponse(ERROR_UNKNOWN);
				}
			}
		} else {
			return $this->prepareErrorResponse(ERROR_UNKNOWN);
		}
	}

	public function updateMiMSLearning($userID) {
		log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
		$mimslearning_id = $this->input->get('MiMSLearningID');
		if (empty($mimslearning_id)) {
			return false;
		}

		$data = array();
		$data['Title'] = $this->input->post('Title');
		$data['MiMSLearningType'] = $this->input->post('MiMSLearningType');
		$data['MiMSLearningPath'] = $this->input->post('MiMSLearningPath');
		$data['CreatedBy'] = $userID;

		$require_fields = array('Title', 'MiMSLearningType');
		$check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
		if ($check_require_field_erro != NO_ERROR) {
			return $this->prepareErrorResponse($check_require_field_erro);
		}

		$mimslearning_information_entity = new MiMSLearningEntity($data);

		$mimslearning_information_data = $mimslearning_information_entity->getMiMSLearningEntityForUpdate();

		log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

		$this->db->set($mimslearning_information_data);
		$this->db->where('ID', $mimslearning_id);
		if($this->db->update('mimslearning')) {
			if (isset($_FILES["MiMSLearningPath"]) && $_FILES["MiMSLearningPath"]['tmp_name']){
				$upload_data = $this->util->upload('MiMSLearningImages', 'MiMSLearningPath');
				if ($upload_data) {
					$data = array();
					$data['MiMSLearningPath'] = $upload_data['file_name'];
					$this->db->set($data);
					$this->db->where('ID', $mimslearning_id);
					if($this->db->update('mimslearning')) {
						return $this->prepareErrorResponse(NO_ERROR);
					} else {
						$this->deleteMiMSLearning($mimslearning_id);
						return $this->prepareErrorResponse(ERROR_UNKNOWN);
					}
				} else {
					$this->deleteMiMSLearning($mimslearning_id);
					return $this->prepareErrorResponse(ERROR_UNKNOWN);
				}
			}
		} else {
			return $this->prepareErrorResponse(ERROR_UNKNOWN);
		}
		log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
	}

	public function deleteMiMSLearning() {
		log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
		$id = $this->input->get('MiMSLearningID');

		$data = array();
		$data['IsActive'] = 0;
		$data['IsDeleted'] = 1;
		$data['LastUpdate'] = date('Y-m-d H:i:s');
		$this->db->set($data);
		$this->db->where('ID', $id);
		$return = $this->db->update('mimslearning');

		return $return;
		log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
	}

	public function getAllMiMSLearning() {
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$this->db->select('ml.ID, ml.Title, ml.MiMSLearningType, ml.MiMSLearningPath, ml.IsActive');
		$this->db->from('mimslearning AS ml');
		$this->db->where('ml.IsDeleted', 0);
		$this->db->order_by('ml.Title');
		$result = $this->db->get()->result_array();
//        echo $this->db->last_query();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $result;
	}

    public function getAllActiveMiMSLearningInformation() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select("ID");
        $this->db->select("Title");
        $this->db->select("MiMSLearningType");
        $this->db->select("MiMSLearningPath");
        $this->db->from('mimslearning');
        $this->db->where('IsActive', 1);
        $this->db->where('IsDeleted', 0);
        $this->db->order_by("Title");
        $all_information = $this->db->get()->result_array();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }

    public function getMiMSLearningDetail() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $mimslearning_id = $this->input->get('MiMSLearningID');
        $this->db->select("ID");
        $this->db->select("Title");
        $this->db->select("MiMSLearningType");
        $this->db->select("MiMSLearningPath");
        $this->db->from('mimslearning');
        $this->db->where('ID', $mimslearning_id);
        $this->db->where('IsActive', 1);
        $this->db->where('IsDeleted', 0);
        $this->db->limit(1);
        $all_information = $this->db->get()->result_array();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }

	public function getMiMSLearningForFrontend() {
		log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
		$this->db->select('ml.ID, ml.Title, ml.MiMSLearningType, ml.MiMSLearningPath, ml.IsActive');
		$this->db->from('mimslearning AS ml');
		$this->db->where('ml.IsActive', 1);
		$this->db->where('ml.IsDeleted', 0);
		$this->db->limit(config_item('per_page_mimslearning_number'));
		$mimslearning = $this->db->get()->result_array();
//        echo $this->db->last_query();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $mimslearning;
	}

	public function getMiMSLearningForSidebar() {
		log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
		$this->db->select('ID');
		$this->db->select('Title');
		$this->db->select('MiMSLearningType');
		$this->db->select('MiMSLearningPath');
		$this->db->from('mimslearning');
		$this->db->where('IsActive', 1);
		$this->db->where('IsDeleted', 0);
		$this->db->order_by('Title');
		$this->db->limit(config_item('side_bar_link_limit'));
		$result = $this->db->get()->result_array();
//        echo $this->db->last_query();
		log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
		return $result;
	}
}
