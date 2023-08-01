<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class ClassificationInformationEntity extends GeneralDataEntity
{
    public $ClassificationID;
    public $Name;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->ClassificationID = isset($data['ID']) ? $data['ID'] : '';
            $this->Name = $data['Name'];
        }
    }

    public function getClassificationEntity() {
        $classification_data = parent::getGeneralDataEntity();
        $classification_data['ClassificationID'] = intval($this->ClassificationID);
        $classification_data['Name'] = addslashes($this->Name);

        return $classification_data;
    }

    public function getClassificationEntityForCreate() {
        $classification_data = parent::getGeneralDataEntityForCreate();
        $classification_data['Name'] = addslashes($this->Name);
        return $classification_data;
    }

    public function getClassificationEntityForUpdate() {
        $classification_data = parent::getGeneralDataEntityForUpdate();
        $classification_data['Name'] = addslashes($this->Name);
        $classification_data['LastUpdate'] = date('Y-m-d H:i:s');
        return $classification_data;
    }
}
