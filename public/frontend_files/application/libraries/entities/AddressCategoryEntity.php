<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class AddressCategoryEntity extends GeneralDataEntity
{
    public $AddressCategoryID;
    public $Name;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->AddressCategoryID = isset($data['ID']) ? $data['ID'] : '';
            $this->Name = $data['Name'];
        }
    }

    public function getAddressCategoryEntity() {
        $address_category_data = parent::getGeneralDataEntity();
        $address_category_data['AddressCategoryID'] = intval($this->AddressCategoryID);
        $address_category_data['Name'] = addslashes($this->Name);

        return $address_category_data;
    }

    public function getAddressCategoryEntityForCreate() {
        $address_category_data = parent::getGeneralDataEntityForCreate();
        $address_category_data['Name'] = addslashes($this->Name);
        return $address_category_data;
    }

    public function getAddressCategoryEntityForUpdate() {
        $address_category_data = parent::getGeneralDataEntityForUpdate();
        $address_category_data['Name'] = addslashes($this->Name);
        $address_category_data['LastUpdate'] = date('Y-m-d H:i:s');
        return $address_category_data;
    }
}
