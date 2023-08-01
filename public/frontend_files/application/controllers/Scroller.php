<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class Scroller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Scroller_model');
    }

    public function getScrollData()
    {
		$this->load->model('User_model');
		list($user_id, $user_role) = $this->User_model->getLoggedInUser();
		if ($user_id == '' || !intval(array(1,2), $user_role)) {
			$this->session->sess_destroy();
			redirect('User/login');
			return;
		}
		$scroll_data = $this->Scroller_model->getScrollerData();
		$this->load->view('admin/header');
		$this->load->view('admin/side-menu');
		$this->load->view('js/admin-common-script');
		$this->load->view('admin/scroller', $scroll_data);
		$this->load->view('js/admin-scroller-script');
		$this->load->view('admin/footer');
    }

    public function update() {
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

		$return = $this->Scroller_model->update();
		$response['result'] = $return;
		$this->sendRestAPIResponse($response);
	}

	private function sendRestAPIResponse($response){
		$rest_api_response = array();
		$rest_api_response['response'] = $response;
		$callback = isset($_GET['callback']) ? $_GET['callback'] : 'test';
		echo $callback.'('.(json_encode($rest_api_response)).')';
	}
}
