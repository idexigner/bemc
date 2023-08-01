<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**

 * Created by PhpStorm.

 * User: Amalesh

 * Date: 7/17/2018

 * Time: 12:25 PM

 */



class Admin extends CI_Controller {



    public function __construct() {

        parent::__construct();

        $this->load->model('User_model');

    }



    public function login()

    {

        $this->load->view('admin/header');

        $this->load->view('admin/login');

        $this->load->view('js/admin-user-script');

        $this->load->view('admin/footer');

    }



    public function register()

    {

        $this->load->view('admin/registration');

    }



    public function userLogin () {

        $login_status = array(

            'success' => 0

        );

        $user_info = $this->User_model->getUserInformation();

        if (isset($user_info['ID'])) {

            $array = array(

                'user_id' => $user_info['ID'],

                'user_email' => strtolower($user_info['UserName']),

                'user_pass' => $user_info['UserPass'],

                'user_role_id' => $user_info['RoleID']

            );

            $this->session->set_tempdata($array, NULL, config_item('session_expiry_time'));

            $login_status['success'] = 1;

        }



        $this->sendRestAPIResponse($login_status);

    }



    public function userLogout() {

        $this->session->sess_destroy();

        redirect('Home/index');

    }



    public function logout() {

        $this->session->sess_destroy();

        redirect('User/login');

    }



    public function incrementVisitorCount() {

        $return = $this->User_model->incrementVisitorCount();

        $this->sendRestAPIResponse($return);

    }



    public function getNumberOfVisitor() {

        $total_visitor = $this->User_model->getNumberOfVisitor();

        $this->sendRestAPIResponse($total_visitor);

    }



    private function sendRestAPIResponse($response){

        $rest_api_response = array();

        $rest_api_response['response'] = $response;

        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';

    }



    public function unsubscribeNotification() {

        //UnsubscribeLink = UserID=123213&From=Job

        $unsubscribe_link = $this->input->get('UnsubscribeLink');

        $this->User_model->unsubscribeNotification($unsubscribe_link);

    }



    public function signUp() {

        $this->load->model('Location_model');

        $data = array();

        $data['Countries'] = $this->Location_model->getAllActiveCountries();

        $header_data = array();

        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();

        $this->load->view('front-end/header', $header_data);

        $this->load->view('js/frontend-common-script');

        $this->load->view('js/frontend-user-script');

        $this->load->view('front-end/registration', $data);

        $this->load->view('front-end/general_popups');

        $this->load->view('front-end/general_popups');

        $this->load->view('front-end/footer');

    }



    public function registerUser() {

        log_message("debug", 'Post Value: '.print_r($_POST, true));

        $result = $this->User_model->registerUser();

        $this->sendRestAPIResponse($result);

    }



    public function showUserProfile() {

        $this->load->model('Location_model');

        $data = array();

        $data['Countries'] = $this->Location_model->getAllActiveCountries();

        $header_data = array();

        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();

        $this->load->view('front-end/header', $header_data);

        $this->load->view('js/frontend-common-script');

        $this->load->view('js/frontend-user-script');

        $this->load->view('front-end/user-profile', $data);

        $this->load->view('front-end/general_popups');

        $this->load->view('front-end/general_popups');

        $this->load->view('front-end/footer');

    }



    public function getUserDetail() {

        $result = $this->User_model->getLoggedInUserDetail();

        $this->sendRestAPIResponse($result);

    }



    public function updateProfile() {

        $result = $this->User_model->updateProfile();

        $this->sendRestAPIResponse($result);

    }



    public function forgotPassword($emailID, $domain) {

        log_message('info', __METHOD__.' Method Start at: '.date("Y-m-d H:i:s").' with Arguments: '.print_r(func_get_args(), true));

        $success = 1;

        $email = $emailID.'@'.$domain;

        $emailInfo = $this->User_model->validEmailID($email);

        if (!empty($emailInfo)){

            $reset_link = sprintf("Email=%s&UserID=%s&RequestTime=%d", $email, $emailInfo['UserID'], time());

            $data = array();

            $data['userName'] = $this->openssl->decryptValue($emailInfo['FirstName']) . ' '. $this->openssl->decryptValue($emailInfo['LastName']);

            $data['resetLink'] = $this->openssl->encryptValue($reset_link);

            $email_body = $this->load->view('user/resetPasswordEmailTemplate', $data, true);

            $can_send = $this->util->sendAdminEmail('admin@lifedatacorp.com', $email, 'Reset Password', $email_body);



            if (!$can_send){

                $success = 0;

            }

        } else {

            $success = 'invalid email';

        }



        $rest_api_response = array();

        $rest_api_response['response'] = $success;

        $rest_api_response['other'] = '';

        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';

        log_message('info', __METHOD__.'#'.__LINE__.' Method End at: '.date("Y-m-d H:i:s"));

    }



    public function resetPassword() {

        log_message('info', __METHOD__.' Method Start at: '.date("Y-m-d H:i:s").' with Arguments: '.print_r(func_get_args(), true));

        $reset_link = $this->input->get('resetLink');

        $reset_link = str_replace(' ', '+',$reset_link);

        $decrypt_reset_link = $this->openssl->decryptValue($reset_link);

        $data = array('UserID' => '');

        if ($decrypt_reset_link) {

            $temp = explode('&', $decrypt_reset_link);

            $user_id = substr($temp[1], 7);

            $request_time = substr($temp[2], 12);

            if (isset($temp[1]) && strpos($temp[1], 'UserID=') === 0 && ($request_time + 86400) > time()) {

                $data['UserID'] = $user_id;

                $data['resetLink'] = $reset_link;

            }

        }

        $this->load->view('header-without-chat');

        $this->load->view('user/resetPassword', $data);

        $this->load->view('general_popups');

        $this->load->view('js/cuadro-js/common-script');

        $this->load->view('js/cuadro-js/cuadro-script-user');

        $this->load->view('js/cuadro-js/user-activity');

        log_message('info', __METHOD__.'#'.__LINE__.' Method End at: '.date("Y-m-d H:i:s"));

    }



    public function resetUserPassword() {

        log_message('info', __METHOD__.' Method Start at: '.date("Y-m-d H:i:s").' with Arguments: '.print_r(func_get_args(), true));

        $password = $this->input->get('newPass');

        $reset_link = $this->input->get('resetLink');

        $reset_link = str_replace(' ', '+',$reset_link);

        $decrypt_reset_link = $this->openssl->decryptValue($reset_link);

        $rest_api_response = array('response' => 0);

        if ($decrypt_reset_link) {

            $temp = explode('&', $decrypt_reset_link);

            if (isset($temp[1]) && strpos($temp[1], 'UserID=') === 0) {

                $userID = substr($temp[1], 7);

                $can_update = $this->User_model->resetUserPassword($userID, $password);

                if ($can_update) $rest_api_response['response'] = 1;

            }

        }



        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';

        log_message('info', __METHOD__.'#'.__LINE__.' Method End at: '.date("Y-m-d H:i:s"));

    }

}

