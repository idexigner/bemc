<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class Brand extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('BrandInformation_model');
        $this->load->model('User_model');
    }

	public function brandSEO() {
		$brand_ids = $this->BrandInformation_model->getAllBrandIDs();
		$data['BrandIDs'] = $brand_ids;
		$this->load->view('front-end/header');
		$this->load->view('js/frontend-common-script');
		$this->load->view('js/frontend-user-script');
		$this->load->view('front-end/brand_seo', $data);
		$this->load->view('front-end/footer');
	}

	public function genericSEO() {
		log_message('debug', __METHOD__);
		$generics = $this->BrandInformation_model->getAllGenericNames();
		$data['Generics'] = $generics;
		$this->load->view('front-end/header');
		$this->load->view('js/frontend-common-script');
		$this->load->view('js/frontend-user-script');
		$this->load->view('front-end/generic_seo', $data);
		$this->load->view('front-end/footer');
	}

	public function manufacturerSEO() {
		log_message('debug', __METHOD__);
		$manufacturers = $this->BrandInformation_model->getAllManufacturerNames();
		$data['Manufacturers'] = $manufacturers;
		$this->load->view('front-end/header');
		$this->load->view('js/frontend-common-script');
		$this->load->view('js/frontend-user-script');
		$this->load->view('front-end/manufacturer_seo', $data);
		$this->load->view('front-end/footer');
	}

	public function showBrandList()
    {
        $total_brand = $this->BrandInformation_model->getTotal(REGULAR_PRODUCT);
        $data['TotalBrand'] = $total_brand;

        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
		$new_product_info = $this->BrandInformation_model->getNewProducts();
		$new_presentation_info = $this->BrandInformation_model->getNewPresentations();
		$new_brand_info = $this->BrandInformation_model->getNewBrands();
		$highlighted_brand_info = $this->BrandInformation_model->getHighlightedBrands();
		$header_data['title'] = '';
		$header_data['keywords'] = '';
		foreach ($highlighted_brand_info AS $info) {
			$header_data['title'] .= $info['Name'].' | ';
			$header_data['keywords'] .= $info['Name'].', ';
		}
		foreach ($new_product_info AS $info) {
			$header_data['title'] .= $info['Name'].' | ';
			$header_data['keywords'] .= $info['Name'].', ';
		}
		foreach ($new_presentation_info AS $info) {
			$header_data['title'] .= $info['Name'].' | ';
			$header_data['keywords'] .= $info['Name'].', ';
		}
		foreach ($new_brand_info AS $info) {
			$header_data['title'] .= $info['Name'].' | ';
			$header_data['keywords'] .= $info['Name'].', ';
		}
		$header_data['title'] .= 'RxMiMSbd';
		$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

		$this->load->view('front-end/header', $header_data);
        $this->load->view('js/frontend-common-script');
        $this->load->view('js/frontend-user-script');
        $this->load->view('front-end/brand-list', $data);
        $this->load->view('js/frontend-brand-script');
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }

	public function getAllBrandInformation()
	{
		$all_brand_information = $this->BrandInformation_model->getAllBrandInformation();
		$this->sendRestAPIResponse($all_brand_information);
	}

	public function getAllActiveBrandInformation()
	{
		$all_brand_information = $this->BrandInformation_model->getAllActiveBrandInformation();
		$this->sendRestAPIResponse($all_brand_information);
	}

	public function showBrandDetail()
    {
        $data = array();
        $data['BrandDetail'] = $this->BrandInformation_model->getBrandFullDetail();
        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
        $header_data['title'] = $data['BrandDetail']['Name'].' | '.$data['BrandDetail']['ManufacturerName'].' | '.$data['BrandDetail']['Classification'].' | '.$data['BrandDetail']['DosageForm'].' | '.$data['BrandDetail']['StrengthName'].' | '.$data['BrandDetail']['IndicationTags'].' | RxMiMSbd';
		$header_data['keywords'] = $data['BrandDetail']['Name'].', '.$data['BrandDetail']['ManufacturerName'].', '.$data['BrandDetail']['Classification'].', '.$data['BrandDetail']['DosageForm'].', '.$data['BrandDetail']['StrengthName'].', '.$data['BrandDetail']['IndicationTags'].', Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';
        $this->load->view('front-end/header', $header_data);
        $this->load->view('js/frontend-common-script');
        $this->load->view('js/frontend-user-script');
        $this->load->view('js/frontend-drug-script');
        if ($data['BrandDetail']['ProductType'] == REGULAR_PRODUCT) {
        	$this->load->view('front-end/brand-detail', $data);
		} else {
			$this->load->view('front-end/herbal-detail', $data);
		}
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');

    }

    public function getBrandListForAdmin() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }
        $all_brand_information = $this->BrandInformation_model->getAllBrandInformation();
        $data = array();
        $data['AllBrand'] = $all_brand_information;
        $this->load->view('admin/header');
        $this->load->view('admin/side-menu');
        $this->load->view('js/admin-common-script');
        $this->load->view('admin/brand', $data);
        $this->load->view('js/admin-brand-script');
        $this->load->view('admin/footer');
    }

    public function getAllGeneralInformation() {
        $this->load->model('GenericInformation_model');
        $this->load->model('ManufacturerInformation_model');
        $this->load->model('DosageFormInformation_model');
        $this->load->model('StrengthInformation_model');
        $this->load->model('PackSizeInformation_model');

        $data = array();
        $data['GenericInfo'] = $this->GenericInformation_model->getAllGenericInformation();
        $data['ManufacturerInfo'] = $this->ManufacturerInformation_model->getAllManufacturerInformation();
        $data['DosageFormInfo'] = $this->DosageFormInformation_model->getAllDosageFormInformation();
        $data['StrengthInfo'] = $this->StrengthInformation_model->getAllStrengthInformation();
        $data['PackSizeInfo'] = $this->PackSizeInformation_model->getAllPackSizeInformation();
        $this->sendRestAPIResponse($data);
    }

    public function addBrand() {
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
        $return = $this->BrandInformation_model->createBrandInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function updateBrand() {
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
        $return = $this->BrandInformation_model->updateBrandInformation($user_id);
        if ($return['code'] == NO_ERROR) {
            $response['result'] = true;
        } else {
            $response['error_msg'] = $return['message'];
        }
        $this->sendRestAPIResponse($response);
    }

    public function deleteBrand() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $return = $this->BrandInformation_model->deleteBrand();
        $this->sendRestAPIResponse($return);
    }

    public function getBrandDetail() {
        $this->load->model('User_model');
        list($user_id, $user_role) = $this->User_model->getLoggedInUser();
        if ($user_id == '' || !intval(array(1,2), $user_role)) {
            $this->session->sess_destroy();
            redirect('User/login');
            return;
        }

        $return = $this->BrandInformation_model->getBrandDetail($user_id);
        $this->sendRestAPIResponse($return);
    }

    public function searchBrandAlphabetically() {
        $all_brand_information = $this->BrandInformation_model->searchBrandAlphabetically();
        $this->sendRestAPIResponse($all_brand_information);
    }

    public function searchGenericAlphabetically() {
        $all_brand_information = $this->BrandInformation_model->searchGenericAlphabetically();
        $this->sendRestAPIResponse($all_brand_information);
    }

    public function getAllDrugInfoForAutoComplete() {
        $all_drug_info_for_auto_complete = $this->BrandInformation_model->getAllDrugInfoForAutoComplete();
        $this->sendRestAPIResponse($all_drug_info_for_auto_complete);
    }

    public function getNewProducts() {
        $all_drug_info = $this->BrandInformation_model->getNewProducts();
        $this->sendRestAPIResponse($all_drug_info);
    }

    public function getNewPresentations() {
        $all_drug_info = $this->BrandInformation_model->getNewPresentations();
        $this->sendRestAPIResponse($all_drug_info);
    }

    public function getNewBrands() {
        $all_drug_info = $this->BrandInformation_model->getNewBrands();
        $this->sendRestAPIResponse($all_drug_info);
    }

    public function getHighlightedBrands() {
        $all_drug_info = $this->BrandInformation_model->getHighlightedBrands();
        $this->sendRestAPIResponse($all_drug_info);
    }

    public function showAllNewProducts() {
        $data = array();
        $total_brand = $this->BrandInformation_model->getTotalNewData('Product');
        $data['TotalBrand'] = $total_brand;
        $all_new_brand = $this->BrandInformation_model->getAllNewData('Product');
        $data['AllBrands'] = $all_new_brand;
        $data['PageTitle'] = 'New Products';

        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
		$header_data['title'] = '';
		$header_data['keywords'] = '';
		foreach ($all_new_brand AS $info) {
			$header_data['title'] .= $info['Name'].' | ';
			$header_data['keywords'] .= $info['Name'].', ';
		}
		$header_data['title'] .= 'RxMiMSbd';
		$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';
		$this->load->view('front-end/header', $header_data);
        $this->load->view('js/frontend-common-script');
        $this->load->view('js/frontend-user-script');
        $this->load->view('js/frontend-drug-script');
        $this->load->view('front-end/drug-list', $data);
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }

    public function showAllNewBrands() {
        $data = array();
        $total_brand = $this->BrandInformation_model->getTotalNewData('Brand');
        $data['TotalBrand'] = $total_brand;
        $all_new_brand = $this->BrandInformation_model->getAllNewData('Brand');
        $data['AllBrands'] = $all_new_brand;
        $data['PageTitle'] = 'New Brands';

        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
		$header_data['title'] = '';
		$header_data['keywords'] = '';
		foreach ($all_new_brand AS $info) {
			$header_data['title'] .= $info['Name'].' | ';
			$header_data['keywords'] .= $info['Name'].', ';
		}
		$header_data['title'] .= 'RxMiMSbd';
		$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';
		$this->load->view('front-end/header', $header_data);
        $this->load->view('js/frontend-common-script');
        $this->load->view('js/frontend-user-script');
        $this->load->view('js/frontend-drug-script');
        $this->load->view('front-end/drug-list', $data);
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }

    public function showAllNewPresentations() {
        $data = array();
        $total_brand = $this->BrandInformation_model->getTotalNewData('Presentation');
        $data['TotalBrand'] = $total_brand;
        $all_new_brand = $this->BrandInformation_model->getAllNewData('Presentation');
        $data['AllBrands'] = $all_new_brand;
        $data['PageTitle'] = 'New Presentations';

        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();
		$header_data['title'] = '';
		$header_data['keywords'] = '';
		foreach ($all_new_brand AS $info) {
			$header_data['title'] .= $info['Name'].' | ';
			$header_data['keywords'] .= $info['Name'].', ';
		}
		$header_data['title'] .= 'RxMiMSbd';
		$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';
		$this->load->view('front-end/header', $header_data);
        $this->load->view('js/frontend-common-script');
        $this->load->view('js/frontend-user-script');
        $this->load->view('js/frontend-drug-script');
        $this->load->view('front-end/drug-list', $data);
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }

    public function searchBrandInformation() {
		$product_type = $this->input->get('ProductType');
		$product_type = is_numeric($product_type) ? $product_type : REGULAR_PRODUCT;
		$option_type = $this->input->get('Type');
        $option_value = $this->input->get('Value');

        $data = array(
            'OptionType' => $option_type,
            'OptionValue' => $option_value
        );

        $header_data = array();
        $header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();

        switch ($product_type) {
			case REGULAR_PRODUCT:
				switch ($option_type) {
					case 'brand':
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(REGULAR_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$all_new_brand = $this->BrandInformation_model->getSearchResult(REGULAR_PRODUCT, $option_type, $option_value);
						$data['AllBrands'] = $all_new_brand;
						$data['PerPageInformationNumber'] = config_item('per_page_information_number_for_brand_search');

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($all_new_brand AS $info) {
							$header_data['title'] .= $info['Name'].' | '.$info['GenericName'].' | '.$info['DosageForm'].' | '.$info['ManufacturerName'].' | '.$info['IndicationTags'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-drug', $data);
						break;
					case 'brand_by_alphabetically':
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(REGULAR_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$all_new_brand = $this->BrandInformation_model->getSearchResult(REGULAR_PRODUCT, $option_type, $option_value);
						$data['AllBrands'] = $all_new_brand;
						$data['PerPageInformationNumber'] = config_item('per_page_information_number_for_brand_by_alphabetically_search');

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($all_new_brand AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-drug-alphabetically', $data);
						break;
					case 'generic':
						list($data['BrandData'], $data['GenericData']) = $this->BrandInformation_model->getSearchResult(REGULAR_PRODUCT, $option_type, $option_value);
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(REGULAR_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$data['PerPageInformationNumber'] = config_item('per_page_information_number_for_generic_search');

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($data['BrandData'] AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						foreach ($data['GenericData'] AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-generic', $data);
						break;
					case 'generic_by_alphabetically':
						$data['BrandData'] = $this->BrandInformation_model->getSearchResult(REGULAR_PRODUCT, $option_type, $option_value);
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(REGULAR_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$data['PerPageInformationNumber'] = config_item('per_page_information_number_for_generic_by_alphabetically_search');

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($data['BrandData'] AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-generic-alphabetically', $data);
						break;
					case 'indication':
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(REGULAR_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$all_new_brand = $this->BrandInformation_model->getSearchResult(REGULAR_PRODUCT, $option_type, $option_value);
						$data['AllIndications'] = $all_new_brand;
						$data['Indication'] = $option_value;
						$data['PerPageInformationNumber'] = config_item('per_page_information_number_for_indication_search');

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($all_new_brand AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-indication', $data);
						break;
					case 'manufacturer':
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(REGULAR_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$all_new_brand = $this->BrandInformation_model->getSearchResult(REGULAR_PRODUCT, $option_type, $option_value);
						$data['AllManufacturers'] = $all_new_brand;
						$data['Manufacturer'] = $option_value;
						$data['PerPageInformationNumber'] = config_item('per_page_information_number_for_manufacturer_search');

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($all_new_brand AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-manufacturer', $data);
						break;
					default:
						break;
				}
				break;
			case HERBAL_PRODUCT:
				switch ($option_type) {
					case 'brand':
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(HERBAL_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$all_new_brand = $this->BrandInformation_model->getSearchResult(HERBAL_PRODUCT, $option_type, $option_value);
						$data['AllBrands'] = $all_new_brand;
						$data['PerPageInformationNumber'] = config_item('per_page_information_number_for_brand_search');

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($all_new_brand AS $info) {
							$header_data['title'] .= $info['Name'].' | '.$info['GenericName'].' | '.$info['DosageForm'].' | '.$info['ManufacturerName'].' | '.$info['IndicationTags'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-herbal', $data);
						break;
					case 'brand_by_alphabetically':
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(HERBAL_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$all_new_brand = $this->BrandInformation_model->getSearchResult(HERBAL_PRODUCT, $option_type, $option_value);
						$data['AllBrands'] = $all_new_brand;
						$data['PerPageInformationNumber'] = config_item('per_page_information_number_for_brand_by_alphabetically_search');

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($all_new_brand AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-herbal-alphabetically', $data);
						break;
					case 'generic':
						list($data['BrandData'], $data['GenericData']) = $this->BrandInformation_model->getSearchResult(HERBAL_PRODUCT, $option_type, $option_value);
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(HERBAL_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$data['PerPageInformationNumber'] = config_item('per_page_information_number_for_generic_search');

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($data['BrandData'] AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						foreach ($data['GenericData'] AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-herbal-generic', $data);
						break;
					case 'generic_by_alphabetically':
						$data['BrandData'] = $this->BrandInformation_model->getSearchResult(HERBAL_PRODUCT, $option_type, $option_value);
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(HERBAL_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$data['PerPageInformationNumber'] = config_item('per_page_information_number_for_generic_by_alphabetically_search');

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($data['BrandData'] AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-herbal-generic-alphabetically', $data);
						break;
					case 'manufacturer':
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(HERBAL_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$all_new_brand = $this->BrandInformation_model->getSearchResult(HERBAL_PRODUCT, $option_type, $option_value);
						$data['AllManufacturers'] = $all_new_brand;
						$data['Manufacturer'] = $option_value;
						$data['PerPageInformationNumber'] = config_item('per_page_information_number_for_manufacturer_search');

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($all_new_brand AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-herbal-manufacturer', $data);
						break;
					default:
						break;
				}
				break;
			default:
				break;
		}

        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }

    public function showNewInformation() {
        $option_type = $this->input->get('Type');

        $data = array(
            'OptionType' => $option_type
        );

        $data['PerPageInformationNumber'] = config_item('per_page_information_number_for_brand_search');
        list($data['TotalBrand'], $data['AllBrands']) = $this->BrandInformation_model->getNewInformation($option_type);

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
        $this->load->view('front-end/new-information', $data);
        $this->load->view('front-end/general_popups');
        $this->load->view('front-end/footer');
    }

    public function getNewInformation() {
        $option_type = $this->input->get('Type');
        $data = array();
        list($data['TotalBrand'], $data['AllBrands']) = $this->BrandInformation_model->getNewInformation($option_type);
        $this->sendRestAPIResponse($data);
    }

    public function getSearchResult() {
        $option_type = $this->input->get('Type');
        $option_value = $this->input->get('Value');
        $data = $this->BrandInformation_model->getSearchResultForFrontend($option_type, $option_value);

        $this->sendRestAPIResponse($data);
    }

    public function getTotalManufacturerBrand() {
        $data = $this->BrandInformation_model->getTotalManufacturerBrand();
        $this->sendRestAPIResponse($data);
    }

    private function sendRestAPIResponse($response){
        $rest_api_response = array();
        $rest_api_response['response'] = $response;
        $callback = isset($_GET['callback']) ? $_GET['callback'] : 'test';
        echo $callback.'('.(json_encode($rest_api_response)).')';
    }

	public function searchBrandInformationForSEO() {
		$product_type = $this->input->get('ProductType');
		$product_type = is_numeric($product_type) ? $product_type : REGULAR_PRODUCT;
		$option_type = $this->input->get('Type');
		$option_value = $this->input->get('Value');

		$data = array(
			'OptionType' => $option_type,
			'OptionValue' => $option_value
		);

		$header_data = array();
		$header_data['UserDetail'] = $this->User_model->getLoggedInUserDetail();

		switch ($product_type) {
			case REGULAR_PRODUCT:
				switch ($option_type) {
					case 'brand':
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(REGULAR_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$all_new_brand = $this->BrandInformation_model->getSearchResultForSEO(REGULAR_PRODUCT, $option_type, $option_value);
						$data['AllBrands'] = $all_new_brand;
						$data['PerPageInformationNumber'] = 5000;

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($all_new_brand AS $info) {
							$header_data['title'] .= $info['Name'].' | '.$info['GenericName'].' | '.$info['DosageForm'].' | '.$info['ManufacturerName'].' | '.$info['IndicationTags'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-drug', $data);
						break;
					case 'brand_by_alphabetically':
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(REGULAR_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$all_new_brand = $this->BrandInformation_model->getSearchResultForSEO(REGULAR_PRODUCT, $option_type, $option_value);
						$data['AllBrands'] = $all_new_brand;
						$data['PerPageInformationNumber'] = 5000;

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($all_new_brand AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-drug-alphabetically', $data);
						break;
					case 'generic':
						list($data['BrandData'], $data['GenericData']) = $this->BrandInformation_model->getSearchResultForSEO(REGULAR_PRODUCT, $option_type, $option_value);
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(REGULAR_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$data['PerPageInformationNumber'] = 5000;

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($data['BrandData'] AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						foreach ($data['GenericData'] AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-generic', $data);
						break;
					case 'generic_by_alphabetically':
						$data['BrandData'] = $this->BrandInformation_model->getSearchResultForSEO(REGULAR_PRODUCT, $option_type, $option_value);
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(REGULAR_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$data['PerPageInformationNumber'] = 5000;

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($data['BrandData'] AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-generic-alphabetically', $data);
						break;
					case 'indication':
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(REGULAR_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$all_new_brand = $this->BrandInformation_model->getSearchResultForSEO(REGULAR_PRODUCT, $option_type, $option_value);
						$data['AllIndications'] = $all_new_brand;
						$data['Indication'] = $option_value;
						$data['PerPageInformationNumber'] = 5000;

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($all_new_brand AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-indication', $data);
						break;
					case 'manufacturer':
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(REGULAR_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$all_new_brand = $this->BrandInformation_model->getSearchResultForSEO(REGULAR_PRODUCT, $option_type, $option_value);
						$data['AllManufacturers'] = $all_new_brand;
						$data['Manufacturer'] = $option_value;
						$data['PerPageInformationNumber'] = 5000;

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($all_new_brand AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-manufacturer', $data);
						break;
					default:
						break;
				}
				break;
			case HERBAL_PRODUCT:
				switch ($option_type) {
					case 'brand':
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(HERBAL_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$all_new_brand = $this->BrandInformation_model->getSearchResultForSEO(HERBAL_PRODUCT, $option_type, $option_value);
						$data['AllBrands'] = $all_new_brand;
						$data['PerPageInformationNumber'] = 5000;

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($all_new_brand AS $info) {
							$header_data['title'] .= $info['Name'].' | '.$info['GenericName'].' | '.$info['DosageForm'].' | '.$info['ManufacturerName'].' | '.$info['IndicationTags'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-herbal', $data);
						break;
					case 'brand_by_alphabetically':
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(HERBAL_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$all_new_brand = $this->BrandInformation_model->getSearchResultForSEO(HERBAL_PRODUCT, $option_type, $option_value);
						$data['AllBrands'] = $all_new_brand;
						$data['PerPageInformationNumber'] = 5000;

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($all_new_brand AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-herbal-alphabetically', $data);
						break;
					case 'generic':
						list($data['BrandData'], $data['GenericData']) = $this->BrandInformation_model->getSearchResultForSEO(HERBAL_PRODUCT, $option_type, $option_value);
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(HERBAL_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$data['PerPageInformationNumber'] = 5000;

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($data['BrandData'] AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						foreach ($data['GenericData'] AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-herbal-generic', $data);
						break;
					case 'generic_by_alphabetically':
						$data['BrandData'] = $this->BrandInformation_model->getSearchResultForSEO(HERBAL_PRODUCT, $option_type, $option_value);
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(HERBAL_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$data['PerPageInformationNumber'] = 5000;

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($data['BrandData'] AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-herbal-generic-alphabetically', $data);
						break;
					case 'manufacturer':
						$total_brand = $this->BrandInformation_model->getTotalSearchResult(HERBAL_PRODUCT, $option_type, $option_value);
						$data['TotalBrand'] = $total_brand;
						$all_new_brand = $this->BrandInformation_model->getSearchResultForSEO(HERBAL_PRODUCT, $option_type, $option_value);
						$data['AllManufacturers'] = $all_new_brand;
						$data['Manufacturer'] = $option_value;
						$data['PerPageInformationNumber'] = 5000;

						$header_data['title'] = '';
						$header_data['keywords'] = '';
						foreach ($all_new_brand AS $info) {
							$header_data['title'] .= $info['Name'].' | ';
							$header_data['keywords'] .= $info['Name'].', ';
						}
						$header_data['title'] .= 'RxMiMSbd';
						$header_data['keywords'] .= 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd';

						$this->load->view('front-end/header', $header_data);
						$this->load->view('js/frontend-common-script');
						$this->load->view('js/frontend-user-script');
						$this->load->view('js/frontend-drug-script');
						$this->load->view('front-end/search-result-herbal-manufacturer', $data);
						break;
					default:
						break;
				}
				break;
			default:
				break;
		}

		$this->load->view('front-end/general_popups');
		$this->load->view('front-end/footer');
	}
}
