<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class Video extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Video_model');
    }

    public function getAllVideo() {
        $data = array();
        list($data['AllVideo'], $data['TotalVideo']) = $this->Video_model->getAllVideoInformation();
		$data['VideoInfo'] = array();
        $video_id = $this->input->get('id');
		if ($video_id) {
			foreach ($data['AllVideo'] AS $video) {
				if ($video_id == $video['ID']) {
					$data['VideoInfo'] = $video;
				}
			}
		}
        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
		$header_data['title'] = '';
		$header_data['keywords'] = '';
		foreach ($data['AllVideo'] AS $info) {
			$header_data['title'] .= $info['Title'].' | ';
			$header_data['keywords'] .= $info['Title'].', ';
		}
		$header_data['title'] .= 'RxMiMSbd';
		$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';
		$this->load->view('front-end/header', $header_data);
        $this->load->view('js/frontend-common-script');
        $this->load->view('js/frontend-user-script');
        $this->load->view('js/frontend-video-script');
        $this->load->view('front-end/videos', $data);
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }

	public function getVideoInformationForFrontend(){
		$video_information = $this->Video_model->getVideoInformationForFrontend();
		$this->sendRestAPIResponse($video_information);
	}

	private function sendRestAPIResponse($response){
		$rest_api_response = array();
		$rest_api_response['response'] = $response;
		echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
	}
}
