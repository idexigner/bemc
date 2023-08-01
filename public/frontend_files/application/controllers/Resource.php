<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class Resource extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ResourceInformation_model');
    }

    public function getAllActiveResourceInformation()
    {
        $all_resource_information = $this->ResourceInformation_model->getAllActiveResourceInformation();
        $data = array();
        $data['AllResources'] = $all_resource_information;
        $this->load->model('User_model');
        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
        $this->load->view('front-end/header', $header_data);
        $this->load->view('js/frontend-common-script');
        $this->load->view('js/frontend-user-script');
        $this->load->view('front-end/resource-list', $data);
        $this->load->view('js/frontend-resource-script');
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }

    public function getAllActiveResource()
    {
        $all_resource_information = $this->ResourceInformation_model->getAllActiveResourceInformation();
        $this->sendRestAPIResponse($all_resource_information);
    }

    public function getResourceDetail()
    {
        $resource_information = $this->ResourceInformation_model->getResourceDetail();
        $data = array();
        $data['resource'] = $resource_information;
        $this->load->view('js/frontend-resource-script');
        $this->load->view('front-end/resource-viewer-pdf', $data);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }

	public function getResourceListForAdmin() {
		$this->load->model('User_model');
		list($user_id, $user_role) = $this->User_model->getLoggedInUser();
		if ($user_id == '' || !intval(array(1,2), $user_role)) {
			$this->session->sess_destroy();
			redirect('User/login');
			return;
		}
		$all_specialreports_information = $this->ResourceInformation_model->getAllResource();
		$data = array();
		$data['AllResource'] = $all_specialreports_information;
		$this->load->view('admin/header');
		$this->load->view('admin/side-menu');
		$this->load->view('js/admin-common-script');
		$this->load->view('admin/resource', $data);
		$this->load->view('js/admin-resource-script');
		$this->load->view('admin/footer');
	}

	public function addResource() {
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

		$return = $this->ResourceInformation_model->createResource($user_id);
		if ($return['code'] == NO_ERROR) {
			$response['result'] = true;
		} else {
			$response['error_msg'] = $return['message'];
		}
		$this->sendRestAPIResponse($response);
	}

	public function updateResource() {
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

		$return = $this->ResourceInformation_model->updateResource($user_id);
		if ($return['code'] == NO_ERROR) {
			$response['result'] = true;
		} else {
			$response['error_msg'] = $return['message'];
		}
		$this->sendRestAPIResponse($response);
	}

	public function deleteResource() {
		$this->load->model('User_model');
		list($user_id, $user_role) = $this->User_model->getLoggedInUser();
		if ($user_id == '' || !intval(array(1,2), $user_role)) {
			$this->session->sess_destroy();
			redirect('User/login');
			return;
		}

		$return = $this->ResourceInformation_model->deleteResource();
		$this->sendRestAPIResponse($return);
	}

	public function getAllResource() {
		$this->load->model('User_model');
		list($user_id, $user_role) = $this->User_model->getLoggedInUser();
		if ($user_id == '' || !intval(array(1,2), $user_role)) {
			$this->session->sess_destroy();
			redirect('User/login');
			return;
		}

		$all_specialreports_information = $this->ResourceInformation_model->getAllResource();
		$this->sendRestAPIResponse($all_specialreports_information);
	}

	public function getResourceDetailInformation() {
		$this->load->model('User_model');
		list($user_id, $user_role) = $this->User_model->getLoggedInUser();
		if ($user_id == '' || !intval(array(1,2), $user_role)) {
			$this->session->sess_destroy();
			redirect('User/login');
			return;
		}

		$specialreports_detail_information = $this->ResourceInformation_model->getResourceDetailInformation();
		$this->sendRestAPIResponse($specialreports_detail_information);
	}
}
