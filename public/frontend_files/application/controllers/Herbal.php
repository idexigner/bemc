<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**

 * Created by PhpStorm.

 * User: Amalesh

 * Date: 7/17/2018

 * Time: 12:25 PM

 */



class Herbal extends CI_Controller {



	public function __construct() {

		parent::__construct();

		$this->load->model('BrandInformation_model');

		$this->load->model('User_model');

	}



    public function showHerbalList()

    {

		$data = array();

		$data['AllBrands'] = $this->BrandInformation_model->getAllActiveProduct(HERBAL_PRODUCT);

		$data['TotalBrand'] = $this->BrandInformation_model->getTotal(HERBAL_PRODUCT);

		$header_data = array();

        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();

		$header_data['title'] = '';

		$header_data['keywords'] = '';

		foreach ($data['AllBrands'] AS $info) {

			$header_data['title'] .= $info['Name'].' | ';

			$header_data['keywords'] .= $info['Name'].', ';

		}

		$header_data['title'] .= 'RxMiMSbd';

		$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

		$this->load->view('front-end/header', $header_data);

        $this->load->view('js/frontend-common-script');

        $this->load->view('js/frontend-user-script');

        $this->load->view('js/frontend-drug-script');

		$this->load->view('front-end/herbal', $data);

        $this->load->view('front-end/general_popups');

        $this->load->view('front-end/footer');

	}

}

