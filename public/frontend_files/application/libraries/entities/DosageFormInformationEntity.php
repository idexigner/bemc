<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class DosageFormInformationEntity extends GeneralDataEntity
{
    public $DosageFormID;
    public $Name;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->DosageFormID = isset($data['ID']) ? $data['ID'] : '';
            $this->Name = $data['Name'];
        }
    }

    public function getDosageFormEntity() {
        $dosage_form_data = parent::getGeneralDataEntity();
        $dosage_form_data['DosageFormID'] = intval($this->DosageFormID);
        $dosage_form_data['Name'] = addslashes($this->Name);

        return $dosage_form_data;
    }

    public function getDosageFormEntityForCreate() {
        $dosage_form_data = parent::getGeneralDataEntityForCreate();
        $dosage_form_data['Name'] = addslashes($this->Name);
        return $dosage_form_data;
    }

    public function getDosageFormEntityForUpdate() {
        $dosage_form_data = parent::getGeneralDataEntityForUpdate();
        $dosage_form_data['Name'] = addslashes($this->Name);
        $dosage_form_data['LastUpdate'] = date('Y-m-d H:i:s');
        return $dosage_form_data;
    }
}
