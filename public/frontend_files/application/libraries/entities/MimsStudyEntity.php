<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class MimsStudyEntity extends GeneralDataEntity
{
    public $MimsStudyID;
    public $Title;
    public $LinkAddress;
//    public $ImagePath;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->MimsStudyID = isset($data['ID']) ? $data['ID'] : '';
            $this->Title = $data['Title'];
            $this->Description = $data['Description'];
            $this->LinkAddress = $data['LinkAddress'];
//            $this->ImagePath = $data['ImagePath'];
        }
    }

    public function getMimsStudyEntity() {
        $news_data = parent::getGeneralDataEntity();
        $news_data['MimsStudyID'] = intval($this->MimsStudyID);
        $news_data['Title'] = addslashes($this->Title);
        $news_data['Description'] = addslashes($this->Description);
        $news_data['LinkAddress'] = addslashes($this->LinkAddress);
//        $news_data['ImagePath'] = (string)$this->ImagePath;

        return $news_data;
    }

    public function getMimsStudyEntityForCreate() {
        $news_data = parent::getGeneralDataEntityForCreate();
        $news_data['Title'] = addslashes($this->Title);
        $news_data['Description'] = addslashes($this->Description);
        $news_data['LinkAddress'] = addslashes($this->LinkAddress);
//        $news_data['ImagePath'] = (string)$this->ImagePath;
        return $news_data;
    }

    public function getMimsStudyEntityForUpdate() {
        $news_data = parent::getGeneralDataEntityForUpdate();
        $news_data['Title'] = addslashes($this->Title);
        $news_data['Description'] = addslashes($this->Description);
        $news_data['LinkAddress'] = addslashes($this->LinkAddress);
        $news_data['LastUpdate'] = date('Y-m-d H:i:s');
        return $news_data;
    }
}
