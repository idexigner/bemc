<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class Address extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AddressCategory_model');
        $this->load->model('AddressInformation_model');
        $this->load->model('Location_model');
    }

    public function getAllImportantAddress() {
        $data = array();
        $address_category_id = $this->input->get('AddressCategoryID');
        $data['AddressCategoryID'] = empty($address_category_id) ? '' : $address_category_id;
        list($data['AllAddress'], $data['TotalAddress']) = $this->AddressInformation_model->getAllActiveAddressInformation($address_category_id);
        $data['AllAddressCategory'] = $this->AddressCategory_model->getAllActiveAddressCategory();
        $data['Cities'] = $this->Location_model->getAllActiveCities();
        $this->load->model('User_model');
        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
		$header_data['title'] = '';
		$header_data['keywords'] = '';
        foreach ($data['AllAddress'] AS $address) {
			$header_data['title'] .= $address['Name'].' | ';
			$header_data['keywords'] .= $address['Name'].', ';
		}

		foreach ($data['AllAddressCategory'] AS $category) {
			$header_data['keywords'] .= $category['Name'].', ';
		}

		$header_data['title'] .= 'RxMiMSbd';
		$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';
		$this->load->view('front-end/header', $header_data);
        $this->load->view('js/frontend-common-script');
        $this->load->view('js/frontend-user-script');
        $this->load->view('js/frontend-address-script');
        $this->load->view('front-end/important-addresses', $data);
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }

    public function getImportantAddressForHomePage() {
        $all_address = $this->AddressCategory_model->getAllActiveAddressCategoryForSideBar();
        $this->sendRestAPIResponse($all_address);
    }

    public function getAddressForFrontend(){
        $data = array();
        list($data['AllAddress'], $data['TotalAddress']) = $this->AddressInformation_model->getAddressForFrontend();
		$data['title'] = '';
		$data['keywords'] = '';
		foreach ($data['AllAddress'] AS $info) {
			$data['title'] .= $info['Name'].' | ';
			$data['keywords'] .= $info['Name'].', ';
		}
		$data['title'] .= 'RxMiMSbd';
		$data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';
		$this->sendRestAPIResponse($data);
    }

    public function getAllExistingLocation() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }
        $all_existing_location = $this->Location_model->getAllExistingLocation();
        $this->sendRestAPIResponse($all_existing_location);
    }

    public function getAllLocationDate() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }
        $all_country = $this->AddressInformation_model->getAllCountry();
        $all_state = $this->AddressInformation_model->getAllState();
        $all_city = $this->AddressInformation_model->getAllCity();
        $data = array(
            'AllCountry' => $all_country,
            'AllState' => $all_state,
            'AllCity' => $all_city
        );
        $this->sendRestAPIResponse($data);
    }

    public function getAddressListForAdmin() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }
        $all_address_information = $this->AddressInformation_model->getAllAddressInformation();
        $data = array();
        $data['AllAddress'] = $all_address_information;
        $this->load->view('admin/header');
        $this->load->view('admin/side-menu');
        $this->load->view('js/admin-common-script');
        $this->load->view('admin/address', $data);
        $this->load->view('js/admin-address-script');
        $this->load->view('admin/footer');
    }

    public function addAddress() {
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

        $return = $this->AddressInformation_model->createAddressInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function updateAddress() {
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

        $return = $this->AddressInformation_model->updateAddressInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function getAllAddressCategories() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $return = $this->AddressInformation_model->getAllAddressCategories($user_id);
        $this->sendRestAPIResponse($return);
    }

    public function getAllAddressInformation() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $return = $this->AddressInformation_model->getAllAddressInformation($user_id);
        $this->sendRestAPIResponse($return);
    }

    public function getAddressDetail() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $return = $this->AddressInformation_model->getAddressDetail();
        $this->sendRestAPIResponse($return);
    }

    public function deleteAddress() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $return = $this->AddressInformation_model->deleteAddress();
        $this->sendRestAPIResponse($return);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}
