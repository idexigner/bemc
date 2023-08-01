<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class CommonMethods extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('JobInformation_model');
        $this->load->model('NewsInformation_model');
        $this->load->model('AddressCategory_model');
        $this->load->model('SpecialReports_model');
		$this->load->model('MiMSLearning_model');
    }

    public function getSideBarInformation()
    {
        $side_bar_information = array();
        list($all_jobs1, $all_jobs2) = $this->JobInformation_model->getJobInformationForSidebar();
        $all_news = $this->NewsInformation_model->getNewsInformationForSidebar();
        $all_address = $this->AddressCategory_model->getAllActiveAddressCategoryForSideBar();
		$all_special_reports = $this->SpecialReports_model->getSpecialReportsForSidebar();
		$all_mims_study = $this->MiMSLearning_model->getMiMSLearningForSidebar();
		$side_bar_information['AllJobs'] = array($all_jobs1, $all_jobs2);
        $side_bar_information['AllAddress'] = $all_address;
        $side_bar_information['AllNews'] = $all_news;
		$side_bar_information['AllSpecialReports'] = $all_special_reports;
		$side_bar_information['AllMiMSLearning'] = $all_mims_study;
		$this->sendRestAPIResponse($side_bar_information);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';
    }
}
