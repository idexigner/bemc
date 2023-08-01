<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/ResourceEntity.php';

class ResourceInformation_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
    }

	public function getAllActiveResource() {
		log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
		$this->db->select('r.ID, r.Title, r.ResourceType, r.ResourcePath, r.IsActive');
		$this->db->from('resourceinformation AS r');
		$this->db->where('r.IsActive', 1);
		$this->db->where('r.IsDeleted', 0);
		$this->db->order_by('r.Title');
		$this->db->limit(config_item('per_page_resource_number'));
		$resource = $this->db->get()->result_array();

		$this->db->select('r.ID');
		$this->db->from('resourceinformation AS r');
		$this->db->where('r.IsActive', 1);
		$this->db->where('r.IsDeleted', 0);
		$result = $this->db->get()->result_array();
//        echo $this->db->last_query();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return array($resource, count($result));
	}

	public function createResource($userID) {
		log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
		$this->require_fields = array('Title', 'ResourceType');
		$this->request_type = 'post';
		$check_require_field_erro = parent::create();
		if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

		$data = array();
		$data['Title'] = $this->input->post('Title');
		$data['ResourceType'] = $this->input->post('ResourceType');
		$data['ResourcePath'] = $this->input->post('ResourcePath');
		$data['CreatedBy'] = $userID;
		$resource_information_entity = new ResourceEntity($data);
		$resource_information_data = $resource_information_entity->getResourceEntityForCreate();

		if (empty($resource_information_data)) {
			return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);
		}

		log_message('debug', __METHOD__.'#'.__LINE__.' Resource Data: '.print_r($data, true));
		if($this->db->insert('resourceinformation', $resource_information_data)) {
			$resource_id = $this->db->insert_id();
			if (isset($_FILES["ResourcePath"]) && $_FILES["ResourcePath"]['tmp_name']){
				$upload_data = $this->util->upload('ResourceImages', 'ResourcePath');
				if ($upload_data) {
					$data = array();
					$data['ResourcePath'] = $upload_data['file_name'];
					$this->db->set($data);
					$this->db->where('ID', $resource_id);
					if($this->db->update('resourceinformation')) {
						return $this->prepareErrorResponse(NO_ERROR);
					} else {
						$this->deleteResource($resource_id);
						return $this->prepareErrorResponse(ERROR_UNKNOWN);
					}
				} else {
					$this->deleteResource($resource_id);
					return $this->prepareErrorResponse(ERROR_UNKNOWN);
				}
			}
		} else {
			return $this->prepareErrorResponse(ERROR_UNKNOWN);
		}
	}

	public function updateResource($userID) {
		log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
		$resource_id = $this->input->get('ResourceID');
		if (empty($resource_id)) {
			return false;
		}

		$data = array();
		$data['Title'] = $this->input->post('Title');
		$data['ResourceType'] = $this->input->post('ResourceType');
		$data['ResourcePath'] = $this->input->post('ResourcePath');
		$data['CreatedBy'] = $userID;

		$require_fields = array('Title', 'ResourceType');
		$check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
		if ($check_require_field_erro != NO_ERROR) {
			return $this->prepareErrorResponse($check_require_field_erro);
		}

		$resource_information_entity = new ResourceEntity($data);

		$resource_information_data = $resource_information_entity->getResourceEntityForUpdate();

		log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

		$this->db->set($resource_information_data);
		$this->db->where('ID', $resource_id);
		if($this->db->update('resourceinformation')) {
			if (isset($_FILES["ResourcePath"]) && $_FILES["ResourcePath"]['tmp_name']){
				$upload_data = $this->util->upload('ResourceImages', 'ResourcePath');
				if ($upload_data) {
					$data = array();
					$data['ResourcePath'] = $upload_data['file_name'];
					$this->db->set($data);
					$this->db->where('ID', $resource_id);
					if($this->db->update('resourceinformation')) {
						return $this->prepareErrorResponse(NO_ERROR);
					} else {
						$this->deleteResource($resource_id);
						return $this->prepareErrorResponse(ERROR_UNKNOWN);
					}
				} else {
					$this->deleteResource($resource_id);
					return $this->prepareErrorResponse(ERROR_UNKNOWN);
				}
			}
		} else {
			return $this->prepareErrorResponse(ERROR_UNKNOWN);
		}
		log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
	}

	public function deleteResource() {
		log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
		$id = $this->input->get('ResourceID');

		$data = array();
		$data['IsActive'] = 0;
		$data['IsDeleted'] = 1;
		$data['LastUpdate'] = date('Y-m-d H:i:s');
		$this->db->set($data);
		$this->db->where('ID', $id);
		$return = $this->db->update('resourceinformation');

		return $return;
		log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
	}

	public function getAllResource() {
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$this->db->select('r.ID, r.Title, r.ResourceType, r.ResourcePath, r.IsActive');
		$this->db->from('resourceinformation AS r');
		$this->db->where('r.IsDeleted', 0);
		$this->db->order_by('r.Title');
		$result = $this->db->get()->result_array();
//        echo $this->db->last_query();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $result;
	}

    public function getAllActiveResourceInformation() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select("ID");
        $this->db->select("Title");
        $this->db->select("ResourceType");
        $this->db->select("ResourcePath");
        $this->db->from('resourceinformation');
        $this->db->where('IsActive', 1);
        $this->db->where('IsDeleted', 0);
        $this->db->order_by("Title");
        $all_information = $this->db->get()->result_array();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }

    public function getResourceDetail() {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $resource_id = $this->input->get('ResourceID');
        $this->db->select("ID");
        $this->db->select("Title");
        $this->db->select("ResourceType");
        $this->db->select("ResourcePath");
        $this->db->from('resourceinformation');
        $this->db->where('ID', $resource_id);
        $this->db->where('IsActive', 1);
        $this->db->where('IsDeleted', 0);
        $this->db->limit(1);
        $all_information = $this->db->get()->result_array();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $all_information;
    }
}
