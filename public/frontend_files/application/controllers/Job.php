<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**

 * Created by PhpStorm.

 * User: Amalesh

 * Date: 7/17/2018

 * Time: 12:25 PM

 */



class Job extends CI_Controller {



    public function __construct() {

        parent::__construct();

        $this->load->model('JobInformation_model');

        $this->load->model('User_model');

    }



    public function getAllJobInformation()
    {

        $data = array();

        list($data['AllJobs1'], $data['TotalJob1'], $data['AllJobs2'], $data['TotalJob2']) = $this->JobInformation_model->getAllActiveJobInformation();

        $job_category = $this->input->get('JobCategory');

        $data['JobCategory'] = $job_category ? $job_category : 2;

        $header_data = array();

        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();

		$header_data['title'] = '';

		$header_data['keywords'] = '';

		foreach ($data['AllJobs1'] AS $info) {

			$header_data['title'] .= $info['Title'].' | '.$info['Organization'].' | '.$info['Position'].' | ';

			$header_data['keywords'] .= $info['Title'].' | '.$info['Organization'].' | '.$info['Position'].' | ';

		}

		foreach ($data['AllJobs2'] AS $info) {

			$header_data['title'] .= $info['Title'].' | '.$info['Organization'].' | '.$info['Position'].' | ';

			$header_data['keywords'] .= $info['Title'].' | '.$info['Organization'].' | '.$info['Position'].' | ';

		}

		$header_data['title'] .= 'RxMiMSbd';

		$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

		$this->load->view('front-end/header', $header_data);

        $this->load->view('js/frontend-common-script');

        $this->load->view('js/frontend-user-script');

        $this->load->view('js/frontend-job-script');

        $this->load->view('front-end/job-circular', $data);

        $this->load->view('front-end/general_popups');

        $this->load->view('front-end/footer');

    }



    public function getJobInformationForHomePage() {

        $all_jobs = $this->JobInformation_model->getJobInformationForSidebar();

        $this->sendRestAPIResponse($all_jobs);

    }



    public function getJobInformationForFrontend(){

        $job_information = $this->JobInformation_model->getJobInformationForFrontend();

        $this->sendRestAPIResponse($job_information);

    }



    public function showJobDetail() {

        $job_information = $this->JobInformation_model->getJobDetail();

        $data = array();

        $data['JobInfo'] = $job_information;

        $similar_jobs = $this->JobInformation_model->getSimilarActiveJobInformation();

        $data['AllJobs'] = $similar_jobs;

        $header_data = array();

        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();

		$header_data['title'] = '';

		$header_data['keywords'] = '';

		$header_data['title'] .= $data['JobInfo']['Title'].' | '.$data['JobInfo']['Organization'].' | '.$data['JobInfo']['Position'].' | ';

		$header_data['keywords'] .= $data['JobInfo']['Title'].' | '.$data['JobInfo']['Organization'].' | '.$data['JobInfo']['Position'].' | ';

		foreach ($similar_jobs AS $info) {

			$header_data['title'] .= $info['Title'].' | '.$info['Organization'].' | '.$info['Position'].' | ';

			$header_data['keywords'] .= $info['Title'].' | '.$info['Organization'].' | '.$info['Position'].' | ';

		}

		$header_data['title'] .= 'RxMiMSbd';

		$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

		$this->load->view('front-end/header', $header_data);

        $this->load->view('js/frontend-common-script');

        $this->load->view('js/frontend-user-script');

        $this->load->view('front-end/job-detail', $data);

        $this->load->view('front-end/general_popups');

        $this->load->view('front-end/footer');

    }



    public function getJobListForAdmin() {

        $this->load->model('User_model');

        list($user_id, $user_role) = $this->User_model->getLoggedInUser();

        if ($user_id == '' || !intval(array(1,2), $user_role)) {

            $this->session->sess_destroy();

            redirect('User/login');

            return;

        }

        $all_job_information = $this->JobInformation_model->getAllJobInformation();

        $data = array();

        $data['AllJobs'] = $all_job_information;

        $this->load->view('admin/header');

        $this->load->view('admin/side-menu');

        $this->load->view('js/admin-common-script');

        $this->load->view('admin/job', $data);

        $this->load->view('js/admin-job-script');

        $this->load->view('admin/footer');

    }



    public function addJob() {

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



        $return = $this->JobInformation_model->createJobInformation($user_id);

        if ($return['code'] == NO_ERROR) {

            $response['result'] = true;

        } else {

            $response['error_msg'] = $return['message'];

        }

        $this->sendRestAPIResponse($response);

    }



    public function updateJob() {

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



        $return = $this->JobInformation_model->updateJobInformation($user_id);

        if ($return['code'] == NO_ERROR) {

            $response['result'] = true;

        } else {

            $response['error_msg'] = $return['message'];

        }

        $this->sendRestAPIResponse($response);

    }



    public function getAllJobs() {

        $this->load->model('User_model');

        list($user_id, $user_role) = $this->User_model->getLoggedInUser();

        if ($user_id == '' || !intval(array(1,2), $user_role)) {

            $this->session->sess_destroy();

            redirect('User/login');

            return;

        }



        $all_job_information = $this->JobInformation_model->getAllJobInformation();

        $this->sendRestAPIResponse($all_job_information);

    }



    public function getJobDetailInformation() {

        $this->load->model('User_model');

        list($user_id, $user_role) = $this->User_model->getLoggedInUser();

        if ($user_id == '' || !intval(array(1,2), $user_role)) {

            $this->session->sess_destroy();

            redirect('User/login');

            return;

        }



        $job_detail_information = $this->JobInformation_model->getJobDetailInformation();

        $this->sendRestAPIResponse($job_detail_information);

    }



    public function deleteJob() {

        $this->load->model('User_model');

        list($user_id, $user_role) = $this->User_model->getLoggedInUser();

        if ($user_id == '' || !intval(array(1,2), $user_role)) {

            $this->session->sess_destroy();

            redirect('User/login');

            return;

        }



        $return = $this->JobInformation_model->deleteJob();

        $this->sendRestAPIResponse($return);

    }



    private function sendRestAPIResponse($response){

        $rest_api_response = array();

        $rest_api_response['response'] = $response;

        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';

    }

}

