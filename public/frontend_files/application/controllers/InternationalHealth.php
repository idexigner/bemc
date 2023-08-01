<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class InternationalHealth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('InternationalHealth_model');
        $this->load->model('User_model');
    }

    public function getAllInternationalHealth() {
        $data = array();
        list($data['AllInternationalHealth'], $data['TotalInternationalHealth']) = $this->InternationalHealth_model->getAllActiveInternationalHealth();
        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
		$header_data['title'] = '';
		$header_data['keywords'] = '';
		foreach ($data['AllInternationalHealth'] AS $info) {
			$header_data['title'] .= $info['Title'].' | ';
			$header_data['keywords'] .= $info['Title'].', ';
		}
		$header_data['title'] .= 'RxMiMSbd';
		$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';
		$this->load->view('front-end/header', $header_data);
        $this->load->view('js/frontend-common-script');
        $this->load->view('js/frontend-user-script');
        $this->load->view('js/frontend-international-health-script');
        $this->load->view('front-end/international-health', $data);
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }

    public function getInternationalHealthForHomePage() {
        $all_international_health = $this->InternationalHealth_model->getInternationalHealthForSidebar();
        $this->sendRestAPIResponse($all_international_health);
    }

    public function showIndividualInternationalHealthDetail() {
        $data = array();
        $international_health = $this->InternationalHealth_model->getIndividualInternationalHealthDetail();
        list($data['AllInternationalHealth'], $data['TotalInternationalHealth']) = $this->InternationalHealth_model->getAllActiveInternationalHealth();
        $data['InternationalHealthInfo'] = $international_health;
        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
		$header_data['title'] = '';
		$header_data['keywords'] = '';
		foreach ($data['AllInternationalHealth'] AS $info) {
			$header_data['title'] .= $info['Title'].' | ';
			$header_data['keywords'] .= $info['Title'].', ';
		}
		$header_data['title'] .= 'RxMiMSbd';
		$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';
		$this->load->view('front-end/header', $header_data);
        $this->load->view('js/frontend-common-script');
        $this->load->view('js/frontend-user-script');
        $this->load->view('front-end/international-health-detail', $data);
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }

    public function getInternationalHealthListForAdmin() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }
        $all_international_health = $this->InternationalHealth_model->getAllInternationalHealth();
        $data = array();
        $data['AllInternationalHealths'] = $all_international_health;
        $this->load->view('admin/header');
        $this->load->view('admin/side-menu');
        $this->load->view('js/admin-common-script');
        $this->load->view('admin/international-health', $data);
        $this->load->view('js/admin-international-health-script');
        $this->load->view('admin/footer');
    }

    public function addInternationalHealth() {
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

        $return = $this->InternationalHealth_model->createInternationalHealth($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function updateInternationalHealth() {
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

        $return = $this->InternationalHealth_model->updateInternationalHealth($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function getAllInternationalHealths() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $all_international_health = $this->InternationalHealth_model->getAllInternationalHealth();
        $this->sendRestAPIResponse($all_international_health);
    }

    public function getInternationalHealthDetail() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $international_health_detail = $this->InternationalHealth_model->getInternationalHealthDetail();
        $this->sendRestAPIResponse($international_health_detail);
    }

    public function deleteInternationalHealth() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $return = $this->InternationalHealth_model->deleteInternationalHealth();
        $this->sendRestAPIResponse($return);
    }

    public function getInternationalHealthForFrontend(){
        $international_health_information = $this->InternationalHealth_model->getInternationalHealthForFrontend();
        $this->sendRestAPIResponse($international_health_information);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}
