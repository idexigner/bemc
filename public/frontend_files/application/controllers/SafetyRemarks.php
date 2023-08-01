<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class SafetyRemarks extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('SafetyRemarks_model');
    }

    public function getSafetyRemarksListForAdmin() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }
        $all_safetyremarks = $this->SafetyRemarks_model->getAllActiveSafetyRemarks();
        $data = array();
        $data['AllSafetyRemarks'] = $all_safetyremarks;
        $this->load->view('admin/header');
        $this->load->view('admin/side-menu');
        $this->load->view('admin/safetyremarks', $data);
        $this->load->view('js/admin-safetyremarks-script');
        $this->load->view('admin/footer');
    }

    public function addSafetyRemarks() {
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

        $return = $this->SafetyRemarks_model->createSafetyRemarks($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function updateSafetyRemarks() {
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

        $return = $this->SafetyRemarks_model->updateSafetyRemarks($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function getAllActiveSafetyRemarks() {
        $all_safetyremarks = $this->SafetyRemarks_model->getAllActiveSafetyRemarks();
        $this->sendRestAPIResponse($all_safetyremarks);
    }

    public function deleteSafetyRemarks() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $return = $this->SafetyRemarks_model->deleteSafetyRemarks();
        $this->sendRestAPIResponse($return);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}