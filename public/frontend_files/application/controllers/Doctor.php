<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**

 * Created by PhpStorm.

 * User: Amalesh

 * Date: 7/17/2018

 * Time: 12:25 PM

 */

//

class Doctor extends CI_Controller {



    public function __construct() {

        parent::__construct();

        $this->load->model('DoctorInformation_model');

        $this->load->model('Location_model');
        // phpinfo();exit;

    }



    public function getAllDoctorInformation()

    {

        $data = array();
        list($data['AllDoctors'], $data['TotalDoctor']) = $this->DoctorInformation_model->getAllActiveDoctorInformation();

        $data['Cities'] = $this->Location_model->getAllActiveCities();

        $data['Countries'] = $this->Location_model->getDoctorCountry();

        $data['Specialties'] = $this->DoctorInformation_model->getAllSpecialty();

        $this->load->model('User_model');

        $header_data = array();

        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();

		$header_data['title'] = '';

		$header_data['keywords'] = '';

		foreach ($data['Specialties'] AS $info) {

			$header_data['title'] .= $info.' | ';

			$header_data['keywords'] .= $info.', ';

		}

		foreach ($data['AllDoctors'] AS $info) {

			$header_data['title'] .= $info['Name'].' | ';

			$header_data['keywords'] .= $info['Name'].', ';

		}

		$header_data['title'] .= 'RxMiMSbd';

		$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

		$this->load->view('front-end/header', $header_data);

        $this->load->view('js/frontend-common-script');

        $this->load->view('js/frontend-user-script');

        $this->load->view('js/frontend-doctor-script');

        $this->load->view('front-end/doctor', $data);

        $this->load->view('front-end/general_popups');

        $this->load->view('front-end/footer');

    }



    public function search() {

        $doctorCountry = $this->input->get('doctorCountry');

        $doctorCity = $this->input->get('doctorCity');

        $doctorSpecialty = $this->input->get('doctorSpecialty');

        $doctorGender = $this->input->get('doctorGender');



        $data = array();

        list($data['AllDoctors'], $data['TotalDoctor']) = $this->DoctorInformation_model->search($doctorCountry, $doctorCity, $doctorSpecialty, $doctorGender);

		$data['title'] = '';

		$data['keywords'] = '';

		foreach ($data['AllDoctors'] AS $info) {

			$data['title'] .= $info['Name'].' | ';

			$data['keywords'] .= $info['Name'].', ';

		}

		$data['title'] .= 'RxMiMSbd';

		$data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

		$this->sendRestAPIResponse($data);

    }



    public function getDoctorListForAdmin() {

		ini_set('memory_limit','1536M');

        $this->load->model('User_model');

        list($user_id, $user_role) = $this->User_model->getLoggedInUser();

        if ($user_id == '' || !intval(array(1,2), $user_role)) {

            $this->session->sess_destroy();  

            redirect('User/login');

            return;

        }
  
        $all_doctor_information = $this->DoctorInformation_model->getAllDoctorInformationForAdmin();

        $data = array();

        $data['AllDoctors'] = $all_doctor_information;
        // $data['AllDoctors'] = array();

        $this->load->view('admin/header');

        $this->load->view('admin/side-menu');

        $this->load->view('js/admin-common-script');

        $this->load->view('admin/doctor', $data);

        $this->load->view('js/admin-doctor-script');

        $this->load->view('admin/footer');

		ini_set('memory_limit','150M');

    }



    public function addDoctor() {

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
        

        $return = $this->DoctorInformation_model->createDoctorInformation($user_id);

        if ($return['code'] == NO_ERROR) {

            $response['result'] = true;

        } else {

            $response['error_msg'] = $return['message'];

        }

        $this->sendRestAPIResponse($response);

    }



    public function updateDoctor() {

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



        $return = $this->DoctorInformation_model->updateDoctorInformation($user_id);

        if ($return['code'] == NO_ERROR) {

            $response['result'] = true;

        } else {

            $response['error_msg'] = $return['message'];

        }

        $this->sendRestAPIResponse($response);

    }



    public function getAllDoctors() {

        $this->load->model('User_model');

        list($user_id, $user_role) = $this->User_model->getLoggedInUser();

        if ($user_id == '' || !intval(array(1,2), $user_role)) {

            $this->session->sess_destroy();

            redirect('User/login');

            return;

        }



        $all_doctor_information = $this->DoctorInformation_model->getAllDoctorInformation();

        $this->sendRestAPIResponse($all_doctor_information);

    }



    public function getDoctorDetailInformation() {

        $this->load->model('User_model');

        list($user_id, $user_role) = $this->User_model->getLoggedInUser();

        if ($user_id == '' || !intval(array(1,2), $user_role)) {

            $this->session->sess_destroy();

            redirect('User/login');

            return;

        }



        $doctor_detail_information = $this->DoctorInformation_model->getDoctorDetailInformation();

        $this->sendRestAPIResponse($doctor_detail_information);

    }



    public function deleteDoctor() {

        $this->load->model('User_model');

        list($user_id, $user_role) = $this->User_model->getLoggedInUser();

        if ($user_id == '' || !intval(array(1,2), $user_role)) {

            $this->session->sess_destroy();

            redirect('User/login');

            return;

        }



        $return = $this->DoctorInformation_model->deleteDoctor();

        $this->sendRestAPIResponse($return);

    }



    private function sendRestAPIResponse($response){

        $rest_api_response = array();

        $rest_api_response['response'] = $response;

        echo $_GET['callback'].'('.(json_encode($rest_api_response)).')';

    }

}

