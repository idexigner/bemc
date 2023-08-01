<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class ManufacturerInformationEntity extends GeneralDataEntity
{
    public $Manufacturer;
    public $Name;
    public $AddressID;
    public $EmailID;
    public $PhoneNo;
    public $MobileNo;
    public $FaxNo;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->Manufacturer = isset($data['ID']) ? $data['ID'] : '';
            $this->Name = $data['Name'];
            $this->AddressID = $data['AddressID'];
            $this->EmailID = $data['EmailID'];
            $this->PhoneNo = $data['PhoneNo'];
            $this->MobileNo = $data['MobileNo'];
            $this->FaxNo = $data['FaxNo'];
        }
    }

    public function getManufacturerEntity() {
        $manufacturer_data = parent::getGeneralDataEntity();
        $manufacturer_data['ManufacturerID'] = intval($this->ManufacturerID);
        $manufacturer_data['Name'] = addslashes($this->Name);
        $manufacturer_data['AddressID'] = intval($this->AddressID);
        if(!empty($this->EmailID) && filter_var($this->EmailID, FILTER_VALIDATE_EMAIL)) {
            $manufacturer_data['EmailID'] = (string)$this->EmailID;
        } else if(!empty($this->EmailID) && !filter_var($this->EmailID, FILTER_VALIDATE_EMAIL)) {
            return array();
        }
        $manufacturer_data['PhoneNo'] = (string)$this->PhoneNo;
        $manufacturer_data['MobileNo'] = (string)$this->MobileNo;
        $manufacturer_data['FaxNo'] = (string)$this->FaxNo;

        return $manufacturer_data;
    }

    public function getManufacturerEntityForCreate() {
        $manufacturer_data = parent::getGeneralDataEntityForCreate();
        $manufacturer_data['Name'] = addslashes($this->Name);
        $manufacturer_data['AddressID'] = intval($this->AddressID);
        if(!empty($this->EmailID) && filter_var($this->EmailID, FILTER_VALIDATE_EMAIL)) {
            $manufacturer_data['EmailID'] = (string)$this->EmailID;
        } else if(!empty($this->EmailID) && !filter_var($this->EmailID, FILTER_VALIDATE_EMAIL)) {
            return array();
        }
        $manufacturer_data['PhoneNo'] = (string)$this->PhoneNo;
        $manufacturer_data['MobileNo'] = (string)$this->MobileNo;
        $manufacturer_data['FaxNo'] = (string)$this->FaxNo;
        return $manufacturer_data;
    }

    public function getManufacturerEntityForUpdate() {
        $manufacturer_data = parent::getGeneralDataEntityForUpdate();
        $manufacturer_data['Name'] = addslashes($this->Name);
        $manufacturer_data['AddressID'] = intval($this->AddressID);
        if(!empty($this->EmailID) && filter_var($this->EmailID, FILTER_VALIDATE_EMAIL)) {
            $manufacturer_data['EmailID'] = (string)$this->EmailID;
        } else if(!empty($this->EmailID) && !filter_var($this->EmailID, FILTER_VALIDATE_EMAIL)) {
            return array();
        }
        $manufacturer_data['PhoneNo'] = (string)$this->PhoneNo;
        $manufacturer_data['MobileNo'] = (string)$this->MobileNo;
        $manufacturer_data['FaxNo'] = (string)$this->FaxNo;
        $manufacturer_data['LastUpdate'] = date('Y-m-d H:i:s');
        return $manufacturer_data;
    }
}
