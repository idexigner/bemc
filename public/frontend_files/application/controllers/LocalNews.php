<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class LocalNews extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function getAllLocalNews()
    {
        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
        $this->load->view('front-end/header', $header_data);
        $this->load->view('js/frontend-common-script');
        $this->load->view('js/frontend-user-script');
        $this->load->view('front-end/local-news');
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }

    public function getLocalNewsDetail()
    {
        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
        $this->load->view('front-end/header', $header_data);
        $this->load->view('js/frontend-common-script');
        $this->load->view('js/frontend-user-script');
        $this->load->view('front-end/local-news-detail');
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }
}