<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/31/2018
 * Time: 11:39 PM
 */

class Manufacturer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ManufacturerInformation_model');
        $this->load->model('User_model');
    }

    public function getAllManufacturerInformation()
    {
        $all_manufacturer_information = $this->ManufacturerInformation_model->getAllActiveManufacturerInformation();
        $data['AllManufacturers'] = $all_manufacturer_information;

        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
        $this->load->view('front-end/header', $header_data);
        $this->load->view('front-end/manufacturer-list', $data);
        $this->load->view('front-end/footer');
    }

    public function getManufacturerDetail()
    {
        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
        $this->load->view('front-end/header', $header_data);
        $this->load->view('front-end/manufacturer-detail');
        $this->load->view('front-end/footer');
    }

    public function getManufacturerListForAdmin() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }
        $all_manufacturer_information = $this->ManufacturerInformation_model->getAllActiveManufacturerInformation();
        $data = array();
        $data['AllManufacturer'] = $all_manufacturer_information;
        $this->load->view('admin/header');
        $this->load->view('admin/side-menu');
        $this->load->view('js/admin-common-script');
        $this->load->view('admin/manufacturer', $data);
        $this->load->view('js/admin-manufacturer-script');
        $this->load->view('admin/footer');
    }

    public function addManufacturer() {
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

        $return = $this->ManufacturerInformation_model->createManufacturerInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function updateManufacturer() {
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

        $return = $this->ManufacturerInformation_model->updateManufacturerInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function getManufacturerInformation() {
        $manufacturer_information = $this->ManufacturerInformation_model->getManufacturerDetail();
        $this->sendRestAPIResponse($manufacturer_information);
    }

    public function getAllActiveManufacturerInformation() {
        $all_manufacturer_information = $this->ManufacturerInformation_model->getAllActiveManufacturerInformation();
        $this->sendRestAPIResponse($all_manufacturer_information);
    }

    public function deleteManufacturer() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $return = $this->ManufacturerInformation_model->deleteManufacturer();
        $this->sendRestAPIResponse($return);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}
