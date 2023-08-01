<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class CategoryWiseAdvertisement extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CategoryWiseAdvertisement_model');
        $this->load->model('AdvertisementInformation_model');
        $this->load->model('AdvertisementPositionInformation_model');
    }

	public function getAdvertisement() {
		$all_advertisement = $this->CategoryWiseAdvertisement_model->getAdvertisement();
		$this->sendRestAPIResponse($all_advertisement);
	}

	public function getAdvertisementForSlider() {
		$all_advertisement = $this->CategoryWiseAdvertisement_model->getAdvertisementForSlider();
		$this->sendRestAPIResponse($all_advertisement);
	}

	public function getAdvertisementListForAdmin() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }
        $this->load->view('admin/header');
        $this->load->view('admin/side-menu');
        $this->load->view('js/admin-common-script');
        $this->load->view('admin/category-wise-advertisement');
        $this->load->view('js/admin-category-wise-advertisement-script');
        $this->load->view('admin/footer');
    }

    public function getAllAdvertisementForAdmin() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $all_advertisement_information = $this->CategoryWiseAdvertisement_model->getAllAdvertisementForAdmin();
        $this->sendRestAPIResponse($all_advertisement_information);
    }

    public function getAllAdvertisementPosition() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $all_advertisement_position_information = $this->CategoryWiseAdvertisement_model->getAllAdvertisementPosition();
        $this->sendRestAPIResponse($all_advertisement_position_information);
    }

    public function getCategoryValues() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $category_values = $this->CategoryWiseAdvertisement_model->getCategoryValues();
        $this->sendRestAPIResponse($category_values);
    }

    public function getAdvertisementDetailInformation() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $advertisement_detail_information = $this->CategoryWiseAdvertisement_model->getAdvertisementDetailInformation();
        $this->sendRestAPIResponse($advertisement_detail_information);
    }

    public function addAdvertisement() {
        log_message('debug', __METHOD__.'#'.__LINE__.' GET Value: '.print_r($_GET, true));
        log_message('debug', __METHOD__.'#'.__LINE__.' Post Value: '.print_r($_POST, true));
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

        $advertisement_id = $this->AdvertisementInformation_model->addNewAdvertisement($user_id);
        $return = $this->CategoryWiseAdvertisement_model->createAdvertisementInformation($user_id, $advertisement_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function updateAdvertisement() {
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

        $return = $this->AdvertisementInformation_model->updateAdvertisementInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $return = $this->CategoryWiseAdvertisement_model->updateAdvertisementInformation($user_id);
            if ($return['code'] == NO_ERROR) {
                $response['result'] = true;
            } else {
                $response['error_msg'] = $return['message'];
            }
        } else {
            $response['error_msg'] = $return['message'];
        }

        $this->sendRestAPIResponse($response);
    }

    public function deleteAdvertisement() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $return = $this->CategoryWiseAdvertisement_model->deleteAdvertisement();
        $this->sendRestAPIResponse($return);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
       if($_GET['callback']=='forntravi')
       {
        echo json_encode($rest_api_response);
       }
       else
       {
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
       }
    }
}
