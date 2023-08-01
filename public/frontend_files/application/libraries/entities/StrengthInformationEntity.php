<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class StrengthInformationEntity extends GeneralDataEntity
{
    public $StrengthID;
    public $Name;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->StrengthID = isset($data['ID']) ? $data['ID'] : '';
            $this->Name = $data['Name'];
        }
    }

    public function getStrengthEntity() {
        $strength_data = parent::getGeneralDataEntity();
        $strength_data['StrengthID'] = intval($this->StrengthID);
        $strength_data['Name'] = addslashes($this->Name);

        return $strength_data;
    }

    public function getStrengthEntityForCreate() {
        $strength_data = parent::getGeneralDataEntityForCreate();
        $strength_data['Name'] = addslashes($this->Name);
        return $strength_data;
    }

    public function getStrengthEntityForUpdate() {
        $strength_data = parent::getGeneralDataEntityForUpdate();
        $strength_data['Name'] = addslashes($this->Name);
        $strength_data['LastUpdate'] = date('Y-m-d H:i:s');
        return $strength_data;
    }
}
