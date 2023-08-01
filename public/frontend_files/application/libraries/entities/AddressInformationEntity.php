<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class AddressInformationEntity extends GeneralDataEntity
{
    public $AddressInformationID;
    public $AddressCategoryID;
    public $Name;
    public $Address;
    public $ContactNumber;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->AddressInformationID = isset($data['ID']) ? $data['ID'] : '';
            $this->AddressCategoryID = $data['AddressCategoryID'];
            $this->Name = $data['Name'];
            $this->Address = $data['Address'];
            $this->ContactNumber = $data['ContactNumber'];
        }
    }

    public function getAddressInformationEntity() {
        $address_data = parent::getGeneralDataEntity();
        $address_data['AddressCategoryID'] = intval($this->AddressCategoryID);
        $address_data['Name'] = addslashes($this->Name);
        $address_data['Address'] = addslashes($this->Address);
        $address_data['ContactNumber'] = (string)$this->ContactNumber;

        return $address_data;
    }

    public function getAddressInformationEntityForCreate() {
        $address_data = parent::getGeneralDataEntityForCreate();
        $address_data['AddressCategoryID'] = intval($this->AddressCategoryID);
        $address_data['Name'] = addslashes($this->Name);
        $address_data['Address'] = addslashes($this->Address);
        $address_data['ContactNumber'] = (string)$this->ContactNumber;
        return $address_data;
    }

    public function getAddressInformationEntityForUpdate() {
        $address_data = parent::getGeneralDataEntityForUpdate();
        $address_data['AddressCategoryID'] = intval($this->AddressCategoryID);
        $address_data['Name'] = addslashes($this->Name);
        $address_data['Address'] = addslashes($this->Address);
        $address_data['ContactNumber'] = (string)$this->ContactNumber;
        $address_data['LastUpdate'] = date('Y-m-d H:i:s');
        return $address_data;
    }
}
