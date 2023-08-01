<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class MimsStudy extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MimsStudy_model');
        $this->load->model('User_model');
    }

    public function getAllLocalMimsStudy() {
        $data = array();
        list($data['AllMimsStudy'], $data['TotalMimsStudy']) = $this->MimsStudy_model->getAllActiveMimsStudy();
        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
        $this->load->view('front-end/header', $header_data);
        $this->load->view('js/frontend-common-script');
        $this->load->view('js/frontend-user-script');
        $this->load->view('js/frontend-mims-study-script');
        $this->load->view('front-end/local-mims-study', $data);
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }

    public function getMimsStudyForHomePage() {
        $all_special_reports = $this->MimsStudy_model->getMimsStudyForSidebar();
        $this->sendRestAPIResponse($all_special_reports);
    }

    public function getMimsStudyForFrontend(){
        $special_reports = $this->MimsStudy_model->getMimsStudyForFrontend();
        $this->sendRestAPIResponse($special_reports);
    }

    public function getMimsStudyListForAdmin() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }
        $all_mimsstudy_information = $this->MimsStudy_model->getAllMimsStudy();
        $data = array();
        $data['AllMimsStudy'] = $all_mimsstudy_information;
        $this->load->view('admin/header');
        $this->load->view('admin/side-menu');
        $this->load->view('js/admin-common-script');
        $this->load->view('admin/mimsstudy', $data);
        $this->load->view('js/admin-mimsstudy-script');
        $this->load->view('admin/footer');
    }

    public function addMimsStudy() {
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

        $return = $this->MimsStudy_model->createMimsStudy($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function updateMimsStudy() {
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

        $return = $this->MimsStudy_model->updateMimsStudy($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function getAllMimsStudy() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $all_mimsstudy_information = $this->MimsStudy_model->getAllMimsStudy();
        $this->sendRestAPIResponse($all_mimsstudy_information);
    }

    public function getMimsStudyDetailInformation() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $mimsstudy_detail_information = $this->MimsStudy_model->getMimsStudyDetailInformation();
        $this->sendRestAPIResponse($mimsstudy_detail_information);
    }

    public function showIndividualMimsStudyDetail() {
        $data = array();
        $mims_study_information = $this->MimsStudy_model->getMimsStudyDetailInformation();
        list($data['AllMimsStudy'], $data['TotalMimsStudy']) = $this->MimsStudy_model->getAllActiveMimsStudy();
        $data['MimsStudyInfo'] = $mims_study_information;
        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
        $this->load->view('front-end/header', $header_data);
        $this->load->view('js/frontend-common-script');
        $this->load->view('js/frontend-user-script');
        $this->load->view('front-end/local-mims-study-detail', $data);
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }

    public function deleteMimsStudy() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $return = $this->MimsStudy_model->deleteMimsStudy();
        $this->sendRestAPIResponse($return);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}
