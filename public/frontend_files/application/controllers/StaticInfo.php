<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**

 * Created by PhpStorm.

 * User: Amalesh

 * Date: 7/17/2018

 * Time: 12:25 PM

 */



class StaticInfo extends CI_Controller {



    public function __construct() {

        parent::__construct();

        $this->load->model('User_model');

    }



    public function showAboutUs()

    {

        $header_data = array();

        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();

        $this->load->view('front-end/header', $header_data);

        $this->load->view('js/frontend-common-script');

        $this->load->view('js/frontend-user-script');

        $this->load->view('front-end/about-us', array());

        $this->load->view('js/frontend-staticinfo-script');

        $this->load->view('front-end/general_popups');

        $this->load->view('front-end/footer');

    }
    public function showprivacy()

    {

        $header_data = array();

        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();

        $this->load->view('front-end/header', $header_data);

        $this->load->view('js/frontend-common-script');

        $this->load->view('js/frontend-user-script');

        $this->load->view('front-end/Privacy-policy', array());

        $this->load->view('js/frontend-staticinfo-script');

        $this->load->view('front-end/general_popups');

        $this->load->view('front-end/footer');

    }


    public function showDisclaimer()

    {

        $header_data = array();

        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();

        $this->load->view('front-end/header', $header_data);

        $this->load->view('js/frontend-common-script');

        $this->load->view('js/frontend-user-script');

        $this->load->view('front-end/disclaimer', array());

        $this->load->view('js/frontend-staticinfo-script');

        $this->load->view('front-end/general_popups');

        $this->load->view('front-end/footer');

    }



    private function sendRestAPIResponse($response){

        $rest_api_response = array();

        $rest_api_response['response'] = $response;

        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';

    }

}