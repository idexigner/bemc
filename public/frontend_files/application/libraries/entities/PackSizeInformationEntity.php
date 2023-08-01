<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class PackSizeInformationEntity extends GeneralDataEntity
{
    public $PackSizeID;
    public $Name;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->PackSizeID = isset($data['ID']) ? $data['ID'] : '';
            $this->Name = $data['Name'];
        }
    }

    public function getPackSizeEntity() {
        $pack_size_data = parent::getGeneralDataEntity();
        $pack_size_data['PackSizeID'] = intval($this->PackSizeID);
        $pack_size_data['Name'] = addslashes($this->Name);

        return $pack_size_data;
    }

    public function getPackSizeEntityForCreate() {
        $pack_size_data = parent::getGeneralDataEntityForCreate();
        $pack_size_data['Name'] = addslashes($this->Name);
        return $pack_size_data;
    }

    public function getPackSizeEntityForUpdate() {
        $pack_size_data = parent::getGeneralDataEntityForUpdate();
        $pack_size_data['Name'] = addslashes($this->Name);
        $pack_size_data['LastUpdate'] = date('Y-m-d H:i:s');
        return $pack_size_data;
    }
}
