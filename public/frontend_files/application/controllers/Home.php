<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */
class Home extends CI_Controller
{
	public function index()
	{
		$this->load->model('User_model');
		$this->load->model('BrandInformation_model');
		$this->load->model('Scroller_model');
		
		$this->load->model('NewsInformation_model');
		
		$this->load->model('BrandInformation_model');
		$this->load->model('DoctorInformation_model');
		$this->load->model('GenericInformation_model');
		$this->load->model('ManufacturerInformation_model');
		$datacount['herbal'] = count($this->BrandInformation_model->getAllherbalActiveProduct(HERBAL_PRODUCT));
		$datacount['TotalBrand'] = $this->BrandInformation_model->getTotal(REGULAR_PRODUCT);
		$datacount['doctor'] = $this->DoctorInformation_model->getAllActiveDoctorInformation()[1];
		$datacount['pharma'] = count($this->ManufacturerInformation_model->getAllActivecountManufacturerInformation());
		// echo "<pre>";
		// print_r($this->DoctorInformation_model->getAllActiveDoctorInformation());
		// echo "</pre>";
		//die;
		$datacount['genric'] = count($this->GenericInformation_model->getAllGenericInformation());
		$header_data = array();
		$header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
		$header_data['title'] = 'RxMiMSbd | ';
		$header_data['keywords'] = '';
		$new_product_info = $this->BrandInformation_model->getNewProducts();
		$new_presentation_info = $this->BrandInformation_model->getNewPresentations();
		$new_brand_info = $this->BrandInformation_model->getNewBrands();
		$highlighted_brand_info = $this->BrandInformation_model->getHighlightedBrands();
		foreach ($highlighted_brand_info as $info) {
			$header_data['title'] .= $info['Name'] . ' | ';
			$header_data['keywords'] .= $info['Name'] . ', ';
		}
		foreach ($new_product_info as $info) {
			$header_data['title'] .= $info['Name'] . ' | ';
			$header_data['keywords'] .= $info['Name'] . ', ';
		}
		foreach ($new_presentation_info as $info) {
			$header_data['title'] .= $info['Name'] . ' | ';
			$header_data['keywords'] .= $info['Name'] . ', ';
		}
		foreach ($new_brand_info as $info) {
			$header_data['title'] .= $info['Name'] . ' | ';
			$header_data['keywords'] .= $info['Name'] . ', ';
		}
		$scroll_data = $this->Scroller_model->getScrollerData();
		$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';
		$this->load->view('front-end/header', $header_data);
		$this->load->view('js/frontend-common-script');
		$this->load->view('js/frontend-user-script');
		$this->load->view('js/frontend-drug-script');
		$this->load->library('YoutubeChannel');
		$youtube_data = $this->youtubechannel->getAllVideos();
		$this->load->model('JobInformation_model');
		$this->load->model('AdvertisementInformation_model');
		
		
		
		$this->load->view(
			'front-end/home',
			array(
				'YouTubeData' => $youtube_data,
				
				'adver' => $this->AdvertisementInformation_model->gethomemiddleadd(),
				'newshome' => $this->NewsInformation_model->getAllActiveNewsInformationhome(),
				'pharmajob' => $this->JobInformation_model->getAllhomepharmajob(),
				'medicaljob' => $this->JobInformation_model->getAllhomemedicaljob(),
				'datacount' => $datacount,
				'ScrollData' => $scroll_data
			)
		);
		$this->load->view('front-end/general_popups');
		$this->load->view('front-end/footer');
	}
}