<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/JournalEntity.php';

class JournalInformation_model extends GeneralData_model {

	public function __construct() {
		parent::__construct();
	}

	public function getAllActiveJournal() {
		log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
		$this->db->select('j.ID, j.Title, j.JournalCategoryID, j.JournalType, j.JournalPath, j.IsActive');
		$this->db->from('journalinformation AS j');
		$this->db->where('j.IsActive', 1);
		$this->db->where('j.IsDeleted', 0);
		$this->db->order_by('j.Title');
		$this->db->limit(config_item('per_page_journal_number'));
		$journal = $this->db->get()->result_array();

		$this->db->select('j.ID');
		$this->db->from('journalinformation AS j');
		$this->db->where('j.IsActive', 1);
		$this->db->where('j.IsDeleted', 0);
		$result = $this->db->get()->result_array();
//        echo $this->db->last_query();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return array($journal, count($result));
	}

	public function createJournal($userID) {
		log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
		$this->require_fields = array('Title', 'JournalCategoryID', 'JournalType');
		$this->request_type = 'post';
		$check_require_field_erro = parent::create();
		if ($check_require_field_erro != NO_ERROR) return $this->prepareErrorResponse($check_require_field_erro);

		$data = array();
		$data['Title'] = $this->input->post('Title');
		$data['JournalCategoryID'] = $this->input->post('JournalCategoryID');
		$data['JournalType'] = $this->input->post('JournalType');
		$data['JournalPath'] = $this->input->post('JournalPath');
		$data['CreatedBy'] = $userID;
		$journal_information_entity = new JournalEntity($data);
		$journal_information_data = $journal_information_entity->getJournalEntityForCreate();

		if (empty($journal_information_data)) {
			return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);
		}

		if($this->db->insert('journalinformation', $journal_information_data)) {
			$journal_id = $this->db->insert_id();
			if (isset($_FILES["JournalPath"]) && $_FILES["JournalPath"]['tmp_name']){
				$upload_data = $this->util->upload('JournalFiles', 'JournalPath');
				if ($upload_data) {
					$data = array();
					$data['JournalPath'] = $upload_data['file_name'];
					$this->db->set($data);
					$this->db->where('ID', $journal_id);
					if($this->db->update('journalinformation')) {
						return $this->prepareErrorResponse(NO_ERROR);
					} else {
						$this->deleteJournal($journal_id);
						return $this->prepareErrorResponse(ERROR_UNKNOWN);
					}
				} else {
					$this->deleteJournal($journal_id);
					return $this->prepareErrorResponse(ERROR_UNKNOWN);
				}
			}
		} else {
			return $this->prepareErrorResponse(ERROR_UNKNOWN);
		}
	}

	public function updateJournal($userID) {
		log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
		$journal_id = $this->input->get('JournalID');
		if (empty($journal_id)) {
			return false;
		}

		$data = array();
		$data['Title'] = $this->input->post('Title');
		$data['JournalCategoryID'] = $this->input->post('JournalCategoryID');
		$data['JournalType'] = $this->input->post('JournalType');
		$data['JournalPath'] = $this->input->post('JournalPath');
		$data['CreatedBy'] = $userID;

		$require_fields = array('Title', 'JournalType');
		$check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
		if ($check_require_field_erro != NO_ERROR) {
			return $this->prepareErrorResponse($check_require_field_erro);
		}

		$journal_information_entity = new JournalEntity($data);

		$journal_information_data = $journal_information_entity->getJournalEntityForUpdate();

		log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

		$this->db->set($journal_information_data);
		$this->db->where('ID', $journal_id);
		if($this->db->update('journalinformation')) {
			if (isset($_FILES["JournalPath"]) && $_FILES["JournalPath"]['tmp_name']){
				$upload_data = $this->util->upload('JournalImages', 'JournalPath');
				if ($upload_data) {
					$data = array();
					$data['JournalPath'] = $upload_data['file_name'];
					$this->db->set($data);
					$this->db->where('ID', $journal_id);
					if($this->db->update('journalinformation')) {
						return $this->prepareErrorResponse(NO_ERROR);
					} else {
						$this->deleteJournal($journal_id);
						return $this->prepareErrorResponse(ERROR_UNKNOWN);
					}
				} else {
					$this->deleteJournal($journal_id);
					return $this->prepareErrorResponse(ERROR_UNKNOWN);
				}
			}
		} else {
			return $this->prepareErrorResponse(ERROR_UNKNOWN);
		}
		log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
	}

	public function deleteJournal() {
		log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
		$id = $this->input->get('JournalID');

		$data = array();
		$data['IsActive'] = 0;
		$data['IsDeleted'] = 1;
		$data['LastUpdate'] = date('Y-m-d H:i:s');
		$this->db->set($data);
		$this->db->where('ID', $id);
		$return = $this->db->update('journalinformation');

		return $return;
		log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
	}

	public function getAllJournal() {
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$this->db->select('j.ID, j.Title, j.JournalCategoryID, j.JournalType, j.JournalPath, j.IsActive, jc.Name AS CategoryName');
		$this->db->from('journalinformation AS j');
		$this->db->join('journalcategory AS jc', 'j.JournalCategoryID = jc.ID', 'inner');
		$this->db->where('j.IsDeleted', 0);
		$this->db->order_by('j.Title');
		$result = $this->db->get()->result_array();
//        echo $this->db->last_query();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $result;
	}

	public function getAllActiveJournalInformation() {
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$journal_category_id = $this->input->get('JournalCategoryID');
		$this->db->select("ID");
		$this->db->select("Title");
		$this->db->select("JournalCategoryID");
		$this->db->select("JournalType");
		$this->db->select("JournalPath");
		$this->db->from('journalinformation');
		$this->db->where('JournalCategoryID', $journal_category_id);
		$this->db->where('IsActive', 1);
		$this->db->where('IsDeleted', 0);
		$this->db->order_by("Title");
		$all_information = $this->db->get()->result_array();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $all_information;
	}

	public function getJournalDetail() {
		log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
		$journal_id = $this->input->get('JournalID');
		$this->db->select("ID");
		$this->db->select("Title");
		$this->db->select("JournalCategoryID");
		$this->db->select("JournalType");
		$this->db->select("JournalPath");
		$this->db->from('journalinformation');
		$this->db->where('ID', $journal_id);
		$this->db->where('IsActive', 1);
		$this->db->where('IsDeleted', 0);
		$this->db->limit(1);
		$all_information = $this->db->get()->result_array();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $all_information;
	}
}
