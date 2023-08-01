<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/BaseEntity.php');

class LocationEntity extends BaseEntity
{
    public $LocationID;
    public $CountryID;
    public $StateID;
    public $CityID;
    public $Address;
    public $Longitude;
    public $Latitude;
    public $CreatedBy;

    function __construct ($data) {
        if (!empty($data)) {
            $this->LocationID = isset($data['ID']) ? $data['ID'] : '';
            $this->CountryID = $data['CountryID'];
            $this->StateID = $data['StateID'];
            $this->CityID = $data['CityID'];
            $this->Address = $data['Address'];
            $this->Longitude = $data['Longitude'];
            $this->Latitude = $data['Latitude'];
            $this->CreatedBy = $data['CreatedBy'];
        }
    }

    public function getLocationEntity() {
        $location_data = array();
        $location_data['LocationID'] = intval($this->LocationID);
        $location_data['CountryID'] = intval($this->CountryID);
        $location_data['StateID'] = intval($this->StateID);
        $location_data['CityID'] = intval($this->CityID);
        $location_data['Address'] = addslashes($this->Address);
        $location_data['Longitude'] = floatval($this->Longitude);
        $location_data['Latitude'] = floatval($this->Latitude);

        return $location_data;
    }

    public function getLocationEntityForCreate() {
        $location_data = array();
        $location_data['CountryID'] = intval($this->CountryID);
        $location_data['StateID'] = intval($this->StateID);
        $location_data['CityID'] = intval($this->CityID);
        $location_data['Address'] = addslashes($this->Address);
        $location_data['Longitude'] = floatval($this->Longitude);
        $location_data['Latitude'] = floatval($this->Latitude);
        $location_data['CreatedBy'] = intval($this->CreatedBy);
        return $location_data;
    }

    public function getLocationEntityForUpdate() {
        $location_data = array();
        $location_data['CountryID'] = intval($this->CountryID);
        $location_data['StateID'] = intval($this->StateID);
        $location_data['CityID'] = intval($this->CityID);
        $location_data['Address'] = addslashes($this->Address);
        $location_data['Longitude'] = floatval($this->Longitude);
        $location_data['Latitude'] = floatval($this->Latitude);
        $location_data['CreatedBy'] = intval($this->CreatedBy);
        $location_data['LastUpdate'] = date('Y-m-d H:i:s');
        return $location_data;
    }
}
