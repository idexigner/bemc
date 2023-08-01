<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH.'libraries/service/VOs/AddressCategoryVO.php';
require_once APPPATH.'libraries/service/VOs/AddressInformationVO.php';
require_once APPPATH.'libraries/service/VOs/AdvertisementInformationVO.php';
require_once APPPATH.'libraries/service/VOs/AdvertisementPositionInformationVO.php';
require_once APPPATH.'libraries/service/VOs/BrandInformationVO.php';
require_once APPPATH.'libraries/service/VOs/CategoryWiseAdvertisementVO.php';
require_once APPPATH.'libraries/service/VOs/CityVO.php';
require_once APPPATH.'libraries/service/VOs/CountryVO.php';
require_once APPPATH.'libraries/service/VOs/DoctorInformationVO.php';
require_once APPPATH.'libraries/service/VOs/DosageFormInformationVO.php';
require_once APPPATH.'libraries/service/VOs/DrugInformationVO.php';
require_once APPPATH.'libraries/service/VOs/GenericInformationVO.php';
require_once APPPATH.'libraries/service/VOs/InternationalHealthVO.php';
require_once APPPATH.'libraries/service/VOs/JobInformationVO.php';
require_once APPPATH.'libraries/service/VOs/LocationVO.php';
require_once APPPATH.'libraries/service/VOs/ManufacturerInformationVO.php';
require_once APPPATH.'libraries/service/VOs/NewsInformationVO.php';
require_once APPPATH.'libraries/service/VOs/PackSizeInformationVO.php';
require_once APPPATH.'libraries/service/VOs/ResourceInformationVO.php';
require_once APPPATH.'libraries/service/VOs/SpecialReportVO.php';
require_once APPPATH.'libraries/service/VOs/StateVO.php';
require_once APPPATH.'libraries/service/VOs/StrengthInformationVO.php';

class RestAPI_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllData() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $t = $this->input->get('t');
        $last_update = $this->openssl->decryptValue($t);
        $response = array();

        if ($last_update === '') return $response;

        $sql = sprintf("CALL spUpdatedData('%s')", date('Y-m-d H:i:s', $last_update));
        $result = $this->mydb->Query($sql);
        /****** Prepare AddressCategoryVO Start ******/
        $all_information = $result[0];
        $address_category_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsActive'] == 0 || $information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $address_vo = new AddressCategoryVO();

                $address_category_vos[] = $address_vo->getAddressCategoryVO($information);
            }
        }

        $response['AddressCategory'] = array(
            'VOs' => $address_category_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare AddressCategoryVO End ******/

        /****** Prepare AddressVO Start ******/
        $all_information = $result[1];
        $address_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsActive'] == 0 || $information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $address_vo = new AddressInformationVO();

                $address_vos[] = $address_vo->getAddressInformationVO($information);
            }
        }

        $response['Address'] = array(
            'VOs' => $address_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare AddressVO End ******/

        /****** Prepare AdvertisementVO Start ******/
        $all_information = $result[2];
        $advertisementinformation_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsActive'] == 0 || $information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $advertisementinformation_vo = new AdvertisementInformationVO();

                $advertisementinformation_vos[] = $advertisementinformation_vo->getAdvertisementInformationVO($information);
            }
        }

        $response['Advertisement'] = array(
            'VOs' => $advertisementinformation_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare AdvertisementVO End ******/

        /****** Prepare AdvertisementPositionVO Start ******/
        $all_information = $result[3];
        $advertisement_position_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsActive'] == 0 || $information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $advertisement_position_vo = new AdvertisementPositionInformationVO();

                $advertisement_position_vos[] = $advertisement_position_vo->getAdvertisementPositionInformationVO($information);
            }
        }

        $response['AdvertisementPosition'] = array(
            'VOs' => $advertisement_position_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare AdvertisementPositionVO End ******/

        /****** Prepare BrandVO Start ******/
        $all_information = $result[4];
        $brand_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsActive'] == 0 || $information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $brand_vo = new BrandInformationVO();

                $brand_vos[] = $brand_vo->getBrandInformationVO($information);
            }
        }

        $response['Brand'] = array(
            'VOs' => $brand_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare BrandVO End ******/

        /****** Prepare CategoryWiseAdvertisementVO Start ******/
        $all_information = $result[5];
        $brand_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsActive'] == 0 || $information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $brand_vo = new CategoryWiseAdvertisementVO();

                $brand_vos[] = $brand_vo->getCategoryWiseAdvertisementVO($information);
            }
        }

        $response['CategoryWiseAdvertisement'] = array(
            'VOs' => $brand_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare CategoryWiseAdvertisementVO End ******/

        /****** Prepare CityVO Start ******/
        $all_information = $result[6];
        $brand_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsActive'] == 0 || $information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $brand_vo = new CityVO();

                $brand_vos[] = $brand_vo->getCityVO($information);
            }
        }

        $response['City'] = array(
            'VOs' => $brand_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare CityVO End ******/

        /****** Prepare CountryVO Start ******/
        $all_information = $result[7];
        $brand_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsActive'] == 0 || $information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $brand_vo = new CountryVO();

                $brand_vos[] = $brand_vo->getCountryVO($information);
            }
        }

        $response['Country'] = array(
            'VOs' => $brand_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare CountryVO End ******/

        /****** Prepare DoctorVO Start ******/
        $all_information = $result[8];
        $brand_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsActive'] == 0 || $information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $brand_vo = new DoctorInformationVO();

                $brand_vos[] = $brand_vo->getDoctorInformationVO($information);
            }
        }

        $response['Doctor'] = array(
            'VOs' => $brand_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare DoctorVO End ******/

        /****** Prepare DosageVO Start ******/
        $all_information = $result[9];
        $brand_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsActive'] == 0 || $information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $brand_vo = new DosageFormInformationVO();

                $brand_vos[] = $brand_vo->getDosageFormInformationVO($information);
            }
        }

        $response['Dosage'] = array(
            'VOs' => $brand_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare DosageVO End ******/

        /****** Prepare GenericVO Start ******/
        $all_information = $result[10];
        $brand_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsActive'] == 0 || $information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $brand_vo = new GenericInformationVO();

                $brand_vos[] = $brand_vo->getGenericInformationVO($information);
            }
        }

        $response['Generic'] = array(
            'VOs' => $brand_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare GenericVO End ******/

        /****** Prepare InternationalHealthVO Start ******/
        $all_information = $result[11];
        $brand_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsActive'] == 0 || $information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $brand_vo = new InternationalHealthVO();

                $brand_vos[] = $brand_vo->getInternationalHealthVO($information);
            }
        }

        $response['InternationalHealth'] = array(
            'VOs' => $brand_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare InternationalHealthVO End ******/

        /****** Prepare JobVO Start ******/
        $all_information = $result[12];
        $brand_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsActive'] == 0 || $information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $brand_vo = new JobInformationVO();

                $brand_vos[] = $brand_vo->getJobInformationVO($information);
            }
        }

        $response['Job'] = array(
            'VOs' => $brand_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare JobVO End ******/

        /****** Prepare LocationVO Start ******/
        $all_information = $result[13];
        $brand_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $brand_vo = new LocationVO();

                $brand_vos[] = $brand_vo->getLocationVO($information);
            }
        }

        $response['Location'] = array(
            'VOs' => $brand_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare LocationVO End ******/

        /****** Prepare ManufacturerVO Start ******/
        $all_information = $result[14];
        $brand_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsActive'] == 0 || $information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $brand_vo = new ManufacturerInformationVO();

                $brand_vos[] = $brand_vo->getManufacturerInformationVO($information);
            }
        }

        $response['Manufacturer'] = array(
            'VOs' => $brand_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare ManufacturerVO End ******/

        /****** Prepare NewsVO Start ******/
        $all_information = $result[15];
        $brand_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsActive'] == 0 || $information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $brand_vo = new NewsInformationVO();

                $brand_vos[] = $brand_vo->getNewsInformationVO($information);
            }
        }

        $response['News'] = array(
            'VOs' => $brand_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare NewsVO End ******/

        /****** Prepare PackSizeVO Start ******/
        $all_information = $result[16];
        $brand_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsActive'] == 0 || $information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $brand_vo = new PackSizeInformationVO();

                $brand_vos[] = $brand_vo->getPackSizeInformationVO($information);
            }
        }

        $response['PackSize'] = array(
            'VOs' => $brand_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare PackSizeVO End ******/

        /****** Prepare ResourceVO Start ******/
        $all_information = $result[17];
        $brand_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsActive'] == 0 || $information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $brand_vo = new ResourceInformationVO();

                $brand_vos[] = $brand_vo->getResourceInformationVO($information);
            }
        }

        $response['Resource'] = array(
            'VOs' => $brand_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare ResourceVO End ******/

        /****** Prepare SpecialReportsVO Start ******/
        $all_information = $result[18];
        $brand_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsActive'] == 0 || $information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $brand_vo = new SpecialReportVO();

                $brand_vos[] = $brand_vo->getSpecialReportVO($information);
            }
        }

        $response['SpecialReports'] = array(
            'VOs' => $brand_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare SpecialReportsVO End ******/

        /****** Prepare StateVO Start ******/
        $all_information = $result[19];
        $brand_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsActive'] == 0 || $information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $brand_vo = new StateVO();

                $brand_vos[] = $brand_vo->getStateVO($information);
            }
        }

        $response['State'] = array(
            'VOs' => $brand_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare StateVO End ******/

        /****** Prepare StrengthVO Start ******/
        $all_information = $result[20];
        $brand_vos = array();
        $deleted_ids = array();
        if (!empty($all_information)) {
            foreach ($all_information AS $information) {
                if ($information['IsActive'] == 0 || $information['IsDeleted'] == 1) {
                    $deleted_ids[] = $information['ID'];
                    continue;
                }

                $brand_vo = new StrengthInformationVO();

                $brand_vos[] = $brand_vo->getStrengthInformationVO($information);
            }
        }

        $response['Strength'] = array(
            'VOs' => $brand_vos,
            'DeletedIDs' => implode(',', $deleted_ids)
        );
        /****** Prepare StrengthVO End ******/

        $response['LastUpdate'] = time();

        $this->db->select('IndicationTags');
        $this->db->distinct();
        $this->db->from('genericinformation');
        $this->db->where('IsActive', 1);
        $this->db->where('IsDeleted', 0);
        $result = $this->db->get()->result_array();
        $indication_information = array();
        foreach ($result AS $data) {
            $indication_information = array_merge($indication_information, explode(',',$data['IndicationTags']));
        }

        $tags = array();
        foreach ($indication_information AS $tag) {
            $tags[] = trim($tag);
        }
        $indication_information = array_unique($tags);
        sort($indication_information);
        $response['IndicationTags'] = $indication_information;

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End with Response value:'.print_r($response, true));
        return $response;
    }
}
