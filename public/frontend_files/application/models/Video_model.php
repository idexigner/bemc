<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'models/GeneralData_model.php';

class Video_model extends GeneralData_model {

    public function __construct() {
        parent::__construct();
		$this->load->library('YoutubeChannel');
		//log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function getAllVideoInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
		$youtube_data = $this->youtubechannel->getAllVideos();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return array($youtube_data, count($youtube_data));
    }

    public function getVideoInformationForFrontend() {
		log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
		$page_no = $this->input->get('PageNo');
		$page_no = empty($page_no) ? 1 : $page_no;
		$youtube_data = $this->youtubechannel->getAllVideos();
		$video_information = array();
		for ($i = ($page_no - 1) * config_item('per_page_video_information_number'); $i < $page_no * config_item('per_page_video_information_number'); $i++) {
			if (!isset($youtube_data[$i])) break;
			$video_information[] = $youtube_data[$i];
		}
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
		return $video_information;
	}
}
