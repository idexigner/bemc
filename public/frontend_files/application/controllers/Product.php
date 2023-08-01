<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DrugInformation_model');
        $this->load->model('User_model');
    }

    public function showDrugList()
    {
        $total_drug = $this->DrugInformation_model->getTotal();
        $data['TotalDrug'] = $total_drug;

        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
        $this->load->view('front-end/header', $header_data);
        $this->load->view('front-end/drug-list', $data);
        $this->load->view('js/frontend-drug-script');
        $this->load->view('front-end/footer');
    }

    public function getAllDrugInformation()
    {
        $all_drug_information = $this->DrugInformation_model->getAllActiveDrugInformation();
        $this->sendRestAPIResponse($all_drug_information);
    }

    public function showDrugDetail()
    {
        $data = array();
        $data['DrugDetail'] = $this->DrugInformation_model->getDrugDetail();
        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
        $this->load->view('front-end/header', $header_data);
        $this->load->view('front-end/drug-detail', $data);
        $this->load->view('front-end/footer');
    }

    public function getProductListForAdmin() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }
        $all_drug_information = $this->DrugInformation_model->getAllActiveDrugInformation();
        $data = array();
        $data['AllDrug'] = $all_drug_information;
        $this->load->view('admin/header');
        $this->load->view('admin/side-menu');
        $this->load->view('admin/product', $data);
        $this->load->view('js/admin-product-script');
        $this->load->view('admin/footer');
    }

    public function getAllGeneralInformation() {
        $this->load->model('GenericInformation_model');
        $this->load->model('BrandInformation_model');
        $this->load->model('ManufacturerInformation_model');
        $this->load->model('DosageFormInformation_model');
        $this->load->model('StrengthInformation_model');
        $this->load->model('PackSizeInformation_model');

        $data = array();
        $data['GenericInfo'] = $this->GenericInformation_model->getAllGenericInformation();
        $data['BrandInfo'] = $this->BrandInformation_model->getAllBrandInformation();
        $data['ManufacturerInfo'] = $this->ManufacturerInformation_model->getAllManufacturerInformation();
        $data['DosageFormInfo'] = $this->DosageFormInformation_model->getAllDosageFormInformation();
        $data['StrengthInfo'] = $this->StrengthInformation_model->getAllStrengthInformation();
        $data['PackSizeInfo'] = $this->PackSizeInformation_model->getAllPackSizeInformation();
        $this->sendRestAPIResponse($data);
    }

    public function addDrug() {
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
        $return = $this->DrugInformation_model->createDrugInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function updateDrug() {
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
        $return = $this->DrugInformation_model->updateDrugInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function deleteDrug() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $return = $this->DrugInformation_model->deleteDrug();
        $this->sendRestAPIResponse($return);
    }

    public function getDrugDetail() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $return = $this->DrugInformation_model->getDrugDetail($user_id);
        $this->sendRestAPIResponse($return);
    }

    public function searchBrandAlphabetically() {
        $all_drug_information = $this->DrugInformation_model->searchBrandAlphabetically();
        $this->sendRestAPIResponse($all_drug_information);
    }

    public function searchGenericAlphabetically() {
        $all_drug_information = $this->DrugInformation_model->searchGenericAlphabetically();
        $this->sendRestAPIResponse($all_drug_information);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}