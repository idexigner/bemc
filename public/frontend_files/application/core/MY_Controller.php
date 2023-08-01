<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: amalesh
 * Date: 2/14/15
 * Time: 17:44
 */

class MY_Controller extends CI_Controller {
    public $userID;
    public $roleID;
    public $CI;

    function __construct()
    {
        parent::__construct();

        $this->CI = & get_instance();

        $this->load->model('User_model');

        list($this->userID, $this->roleID) = $this->User_model->getLoggedInUser();
        if ($this->userID) {
            $this->userID = $_SESSION['user_id'];
        }
    }

    public function setRequestedURL() {
        $url = parse_url($_SERVER['REQUEST_URI']);
        $temp = explode('index.php/', $url['path']);
        if (isset($temp[1])) {
            $query_string = isset($url['query']) ? '?'.$url['query'] : '';
            $array = array('client_requested_url' => sprintf("%s%s", $temp[1], $query_string));
            log_message('debug',print_r($array, true));
            $this->session->set_tempdata($array, NULL, config_item('session_expiry_time'));
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' URL: '.print_r($url, true));
    }

    public function resetRequestedURL() {
        $array = array('client_requested_url' => '');
        $this->session->set_tempdata($array, NULL, config_item('session_expiry_time'));
    }

    public function sendRestAPIResponse($response, $error_code){
        $api_error_messages = config_item('api_error_messages');
        if ($error_code != NO_ERROR) {
            $response = array();
        }

        $error_detail = $api_error_messages[$error_code];

        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        $rest_api_response['error'] = $error_detail;

        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}