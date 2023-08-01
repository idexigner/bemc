<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class SpecialReports extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('SpecialReports_model');
        $this->load->model('User_model');
    }

    public function getAllLocalSpecialReports() {
        $data = array();
        list($data['AllSpecialReports'], $data['TotalSpecialReport']) = $this->SpecialReports_model->getAllActiveSpecialReports();
        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
        $this->load->view('front-end/header', $header_data);
        $this->load->view('js/frontend-common-script');
        $this->load->view('js/frontend-user-script');
        $this->load->view('js/frontend-special-report-script');
        $this->load->view('front-end/local-special-reports', $data);
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }

    public function getSpecialReportsForHomePage() {
        $all_special_reports = $this->SpecialReports_model->getSpecialReportsForSidebar();
        $this->sendRestAPIResponse($all_special_reports);
    }

    public function getSpecialReportForFrontend(){
        $special_reports = $this->SpecialReports_model->getSpecialReportForFrontend();
        $this->sendRestAPIResponse($special_reports);
    }

    public function getSpecialReportsListForAdmin() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }
        $all_specialreports_information = $this->SpecialReports_model->getAllSpecialReports();
        $data = array();
        $data['AllSpecialReports'] = $all_specialreports_information;
        $this->load->view('admin/header');
        $this->load->view('admin/side-menu');
        $this->load->view('js/admin-common-script');
        $this->load->view('admin/specialreports', $data);
        $this->load->view('js/admin-specialreports-script');
        $this->load->view('admin/footer');
    }

    public function addSpecialReports() {
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

        $return = $this->SpecialReports_model->createSpecialReports($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function updateSpecialReports() {
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

        $return = $this->SpecialReports_model->updateSpecialReports($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function getAllSpecialReports() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $all_specialreports_information = $this->SpecialReports_model->getAllSpecialReports();
        $this->sendRestAPIResponse($all_specialreports_information);
    }

    public function getSpecialReportsDetailInformation() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $specialreports_detail_information = $this->SpecialReports_model->getSpecialReportsDetailInformation();
        $this->sendRestAPIResponse($specialreports_detail_information);
    }

    public function showIndividualSpecialReportDetail() {
        $data = array();
        $special_report_information = $this->SpecialReports_model->getSpecialReportsDetailInformation();
        list($data['AllSpecialReports'], $data['TotalSpecialReport']) = $this->SpecialReports_model->getAllActiveSpecialReports();
        $data['SpecialReportInfo'] = $special_report_information;
        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
        $this->load->view('front-end/header', $header_data);
        $this->load->view('js/frontend-common-script');
        $this->load->view('js/frontend-user-script');
        $this->load->view('front-end/local-special-report-detail', $data);
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }

    public function deleteSpecialReports() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $return = $this->SpecialReports_model->deleteSpecialReports();
        $this->sendRestAPIResponse($return);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}
