<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class SafetyRemarksEntity extends GeneralDataEntity
{
    public $SafetyRemarkID;
    public $Remarks;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->SafetyRemarkID = isset($data['ID']) ? $data['ID'] : '';
            $this->Remarks = $data['Remarks'];
        }
    }

    public function getSafetyRemarkEntity() {
        $safety_remarks_data = parent::getGeneralDataEntity();
        $safety_remarks_data['SafetyRemarkID'] = intval($this->SafetyRemarkID);
        $safety_remarks_data['Remarks'] = addslashes($this->Remarks);

        return $safety_remarks_data;
    }

    public function getSafetyRemarkEntityForCreate() {
        $safety_remarks_data = parent::getGeneralDataEntityForCreate();
        $safety_remarks_data['Remarks'] = addslashes($this->Remarks);
        return $safety_remarks_data;
    }

    public function getSafetyRemarkEntityForUpdate() {
        $safety_remarks_data = parent::getGeneralDataEntityForUpdate();
        $safety_remarks_data['Remarks'] = addslashes($this->Remarks);
        $safety_remarks_data['LastUpdate'] = date('Y-m-d H:i:s');
        return $safety_remarks_data;
    }
}
