<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class Journal extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('JournalInformation_model');
	}

	public function getAllActiveJournalInformation()
	{
		$all_journal_information = $this->JournalInformation_model->getAllActiveJournalInformation();
		$data = array();
		$data['AllJournals'] = $all_journal_information;
		$this->load->model('User_model');
		$header_data = array();
		$header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
		$header_data['title'] = '';
		$header_data['keywords'] = '';
		foreach ($data['AllJournals'] AS $info) {
			$header_data['title'] .= $info['Title'].' | ';
			$header_data['keywords'] .= $info['Title'].', ';
		}
		$header_data['title'] .= 'RxMiMSbd';
		$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';
		$this->load->view('front-end/header', $header_data);
		$this->load->view('js/frontend-common-script');
		$this->load->view('js/frontend-user-script');
		$this->load->view('front-end/journal-list', $data);
		$this->load->view('js/frontend-journal-script');
		$this->load->view('front-end/general_popups');
		$this->load->view('front-end/footer');
	}

	public function getAllActiveJournal()
	{
		$all_journal_information = $this->JournalInformation_model->getAllActiveJournalInformation();
		$this->sendRestAPIResponse($all_journal_information);
	}

	public function getJournalDetail()
	{
		$journal_information = $this->JournalInformation_model->getJournalDetail();
		$data = array();
		$data['journal'] = $journal_information;
		$this->load->view('js/frontend-journal-script');
		$this->load->view('front-end/journal-viewer-pdf', $data);
	}

	private function sendRestAPIResponse($response){
		$rest_api_response = array();
		$rest_api_response['response'] = $response;
		echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
	}

	public function getJournalListForAdmin() {
		$this->load->model('User_model');
		list($user_id, $user_role) = $this->User_model->getLoggedInUser();
		if ($user_id == '' || !intval(array(1,2), $user_role)) {
			$this->session->sess_destroy();
			redirect('User/login');
			return;
		}
		$all_journal_information = $this->JournalInformation_model->getAllJournal();
		$data = array();
		$data['AllJournal'] = $all_journal_information;
		$this->load->view('admin/header');
		$this->load->view('admin/side-menu');
		$this->load->view('js/admin-common-script');
		$this->load->view('admin/journal', $data);
		$this->load->view('js/admin-journal-script');
		$this->load->view('admin/footer');
	}

	public function addJournal() {
		$response = array(
			'error_msg' => '',
			'result' => false
		);
		$this->load->model('User_model');
		list($user_id, $user_role) = $this->User_model->getLoggedInUser();
		if ($user_id == '' || !intval(array(1,2), $user_role)) {
			$this->session->sess_destroy();
			redirect('User/login');
			return;
		}

		$return = $this->JournalInformation_model->createJournal($user_id);
		if ($return['code'] == NO_ERROR) {
			$response['result'] = true;
		} else {
			$response['error_msg'] = $return['message'];
		}
		$this->sendRestAPIResponse($response);
	}

	public function updateJournal() {
		$response = array(
			'error_msg' => '',
			'result' => false
		);
		$this->load->model('User_model');
		list($user_id, $user_role) = $this->User_model->getLoggedInUser();
		if ($user_id == '' || !intval(array(1,2), $user_role)) {
			$this->session->sess_destroy();
			redirect('User/login');
			return;
		}

		$return = $this->JournalInformation_model->updateJournal($user_id);
		if ($return['code'] == NO_ERROR) {
			$response['result'] = true;
		} else {
			$response['error_msg'] = $return['message'];
		}
		$this->sendRestAPIResponse($response);
	}

	public function deleteJournal() {
		$this->load->model('User_model');
		list($user_id, $user_role) = $this->User_model->getLoggedInUser();
		if ($user_id == '' || !intval(array(1,2), $user_role)) {
			$this->session->sess_destroy();
			redirect('User/login');
			return;
		}

		$return = $this->JournalInformation_model->deleteJournal();
		$this->sendRestAPIResponse($return);
	}

	public function getAllJournal() {
		$this->load->model('User_model');
		list($user_id, $user_role) = $this->User_model->getLoggedInUser();
		if ($user_id == '' || !intval(array(1,2), $user_role)) {
			$this->session->sess_destroy();
			redirect('User/login');
			return;
		}

		$all_journal_information = $this->JournalInformation_model->getAllJournal();
		$this->sendRestAPIResponse($all_journal_information);
	}

	public function getJournalDetailInformation() {
		$this->load->model('User_model');
		list($user_id, $user_role) = $this->User_model->getLoggedInUser();
		if ($user_id == '' || !intval(array(1,2), $user_role)) {
			$this->session->sess_destroy();
			redirect('User/login');
			return;
		}

		$journal_detail_information = $this->JournalInformation_model->getJournalDetailInformation();
		$this->sendRestAPIResponse($journal_detail_information);
	}
}
