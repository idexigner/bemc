<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class News extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('NewsInformation_model');
        $this->load->model('User_model');
    }

    public function getAllLocalNews() {
        $data = array();
        list($data['AllNews'], $data['TotalNews']) = $this->NewsInformation_model->getAllActiveNewsInformation();
        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
        $this->load->view('front-end/header', $header_data);
        $this->load->view('js/frontend-common-script');
        $this->load->view('js/frontend-user-script');
        $this->load->view('js/frontend-news-script');
        $this->load->view('front-end/local-news', $data);
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }

    public function getLocalNewsForHomePage() {
        $all_news = $this->NewsInformation_model->getNewsInformationForSidebar();
        $this->sendRestAPIResponse($all_news);
    }

    public function getNewsInformationForFrontend(){
        $job_information = $this->NewsInformation_model->getNewsInformationForFrontend();
        $this->sendRestAPIResponse($job_information);
    }

    public function showIndividualNewsDetail() {
        $data = array();
        $news_information = $this->NewsInformation_model->getIndividualNewsDetail();
        list($data['AllNews'], $data['TotalNews']) = $this->NewsInformation_model->getAllActiveNewsInformation();
        $data['NewsInfo'] = $news_information;
        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
        $this->load->view('front-end/header', $header_data);
        $this->load->view('js/frontend-common-script');
        $this->load->view('js/frontend-user-script');
        $this->load->view('front-end/local-news-detail', $data);
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }

    public function getNewsListForAdmin() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }
        $all_news_information = $this->NewsInformation_model->getAllNewsInformation();
        $data = array();
        $data['AllNewss'] = $all_news_information;
        $this->load->view('admin/header');
        $this->load->view('admin/side-menu');
        $this->load->view('js/admin-common-script');
        $this->load->view('admin/news', $data);
        $this->load->view('js/admin-news-script');
        $this->load->view('admin/footer');
    }

    public function addNews() {
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

        $return = $this->NewsInformation_model->createNewsInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function updateNews() {
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

        $return = $this->NewsInformation_model->updateNewsInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function getAllNewss() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $all_news_information = $this->NewsInformation_model->getAllNewsInformation();
        $this->sendRestAPIResponse($all_news_information);
    }

    public function getNewsDetailInformation() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $news_detail_information = $this->NewsInformation_model->getNewsDetailInformation();
        $this->sendRestAPIResponse($news_detail_information);
    }

    public function deleteNews() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $return = $this->NewsInformation_model->deleteNews();
        $this->sendRestAPIResponse($return);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}