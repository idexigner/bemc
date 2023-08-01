<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class EBooks extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function showEBook() {
        $ebooks = config_item('ebooks');
        $ebook_id = $this->input->get('ID');
        $data = array(
            'ebook_info' => $ebooks[$ebook_id - 1],
			'source' => 'ebook'
        );
        $this->load->model('User_model');
        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
		$header_data['title'] = '';
		$header_data['keywords'] = '';
		log_message('debug', ' Ebooks: '.print_r($ebooks, true));
		foreach ($ebooks AS $info) {
			$header_data['title'] .= $info['Title'].' | ';
			$header_data['keywords'] .= $info['Title'].', ';
		}
		$header_data['title'] .= 'RxMiMSbd';
		$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';
		$this->load->view('front-end/header', $header_data);
        $this->load->view('js/frontend-common-script');
        $this->load->view('js/frontend-user-script');
        $this->load->view('js/frontend-ebook-script');
        $this->load->view('front-end/ebooks', $data);
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }
}
