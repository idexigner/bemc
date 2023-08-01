<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class Classification extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ClassificationInformation_model');
    }

    public function getClassificationListForAdmin() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }
        $all_classification_information = $this->ClassificationInformation_model->getAllActiveClassificationInformation();
        $data = array();
        $data['AllClassification'] = $all_classification_information;
        $this->load->view('admin/header');
        $this->load->view('admin/side-menu');
        $this->load->view('admin/classification', $data);
        $this->load->view('js/admin-classification-script');
        $this->load->view('admin/footer');
    }

    public function addClassification() {
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

        $return = $this->ClassificationInformation_model->createClassificationInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function updateClassification() {
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

        $return = $this->ClassificationInformation_model->updateClassificationInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function getAllActiveClassificationInformation() {
        $all_classification_information = $this->ClassificationInformation_model->getAllActiveClassificationInformation();
        $this->sendRestAPIResponse($all_classification_information);
    }

    public function deleteClassification() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $return = $this->ClassificationInformation_model->deleteClassification();
        $this->sendRestAPIResponse($return);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}