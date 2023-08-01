<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class MiMSLearning extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MiMSLearning_model');
    }

    public function getAllActiveMiMSLearningInformation()
    {
        $all_mimslearning = $this->MiMSLearning_model->getAllActiveMiMSLearning();
        $data = array();
        $data['AllMiMSLearning'] = $all_mimslearning;
        $this->load->model('User_model');
        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
        $this->load->view('front-end/header', $header_data);
        $this->load->view('js/frontend-common-script');
        $this->load->view('js/frontend-user-script');
        $this->load->view('front-end/mimslearning-list', $data);
        $this->load->view('js/frontend-mimslearning-script');
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }

    public function getAllActiveMiMSLearning()
    {
        $all_mimslearning = $this->MiMSLearning_model->getAllActiveMiMSLearning();
        $this->sendRestAPIResponse($all_mimslearning);
    }

	public function getMiMSLearningForHomePage() {
		$all_mims_learning = $this->MiMSLearning_model->getMiMSLearningForFrontend();
		$this->sendRestAPIResponse($all_mims_learning);
	}

	public function getMiMSLearningDetail()
    {
		$ebooks = config_item('MiMS-Learning');
		$ebook_id = $this->input->get('MiMSLearningID');
		$data = array(
			'ebook_info' => $ebooks[$ebook_id - 1],
			'source' => 'mims-learning'
		);
//		$this->load->model('User_model');
		$header_data = array();
//		$header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
		$this->load->view('front-end/header', $header_data);
		$this->load->view('js/frontend-common-script');
		$this->load->view('js/frontend-user-script');
		$this->load->view('js/frontend-ebook-script');
		$this->load->view('front-end/ebooks', $data);
		$this->load->view('front-end/general_popups');
		$this->load->view('front-end/footer');
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }

	public function getMiMSLearningListForAdmin() {
		$this->load->model('User_model');
		list($user_id, $user_role) = $this->User_model->getLoggedInUser();
		if ($user_id == '' || !intval(array(1,2), $user_role)) {
			$this->session->sess_destroy();
			redirect('User/login');
			return;
		}
		$all_specialreports_information = $this->MiMSLearning_model->getAllMiMSLearning();
		$data = array();
		$data['AllMiMSLearning'] = $all_specialreports_information;
		$this->load->view('admin/header');
		$this->load->view('admin/side-menu');
		$this->load->view('js/admin-common-script');
		$this->load->view('admin/mimslearning', $data);
		$this->load->view('js/admin-mimslearning-script');
		$this->load->view('admin/footer');
	}

	public function addMiMSLearning() {
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

		$return = $this->MiMSLearning_model->createMiMSLearning($user_id);
		if ($return['code'] == NO_ERROR) {
			$response['result'] = true;
		} else {
			$response['error_msg'] = $return['message'];
		}
		$this->sendRestAPIResponse($response);
	}

	public function updateMiMSLearning() {
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

		$return = $this->MiMSLearning_model->updateMiMSLearning($user_id);
		if ($return['code'] == NO_ERROR) {
			$response['result'] = true;
		} else {
			$response['error_msg'] = $return['message'];
		}
		$this->sendRestAPIResponse($response);
	}

	public function deleteMiMSLearning() {
		$this->load->model('User_model');
		list($user_id, $user_role) = $this->User_model->getLoggedInUser();
		if ($user_id == '' || !intval(array(1,2), $user_role)) {
			$this->session->sess_destroy();
			redirect('User/login');
			return;
		}

		$return = $this->MiMSLearning_model->deleteMiMSLearning();
		$this->sendRestAPIResponse($return);
	}

	public function getAllMiMSLearning() {
		$this->load->model('User_model');
		list($user_id, $user_role) = $this->User_model->getLoggedInUser();
		if ($user_id == '' || !intval(array(1,2), $user_role)) {
			$this->session->sess_destroy();
			redirect('User/login');
			return;
		}

		$all_specialreports_information = $this->MiMSLearning_model->getAllMiMSLearning();
		$this->sendRestAPIResponse($all_specialreports_information);
	}

	public function getMiMSLearningDetailInformation() {
		$this->load->model('User_model');
		list($user_id, $user_role) = $this->User_model->getLoggedInUser();
		if ($user_id == '' || !intval(array(1,2), $user_role)) {
			$this->session->sess_destroy();
			redirect('User/login');
			return;
		}

		$specialreports_detail_information = $this->MiMSLearning_model->getMiMSLearningDetailInformation();
		$this->sendRestAPIResponse($specialreports_detail_information);
	}
}
