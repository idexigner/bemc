<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class DosageForm extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DosageFormInformation_model');
    }

    public function getDosageFormListForAdmin() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }
        $all_dosageform_information = $this->DosageFormInformation_model->getAllActiveDosageFormInformation();
        $data = array();
        $data['AllDosageForm'] = $all_dosageform_information;
        $this->load->view('admin/header');
        $this->load->view('admin/side-menu');
        $this->load->view('admin/dosageform', $data);
        $this->load->view('js/admin-dosageform-script');
        $this->load->view('admin/footer');
    }

    public function addDosageForm() {
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

        $return = $this->DosageFormInformation_model->createDosageFormInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function updateDosageForm() {
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

        $return = $this->DosageFormInformation_model->updateDosageFormInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function getAllActiveDosageFormInformation() {
        $all_dosageform_information = $this->DosageFormInformation_model->getAllActiveDosageFormInformation();
        $this->sendRestAPIResponse($all_dosageform_information);
    }

    public function deleteDosageForm() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $return = $this->DosageFormInformation_model->deleteDosageForm();
        $this->sendRestAPIResponse($return);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}