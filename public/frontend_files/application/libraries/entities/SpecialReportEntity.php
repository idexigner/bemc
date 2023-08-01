<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class SpecialReportEntity extends GeneralDataEntity
{
    public $SpecialReportID;
    public $Title;
    public $LinkAddress;
//    public $ImagePath;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->SpecialReportID = isset($data['ID']) ? $data['ID'] : '';
            $this->Title = $data['Title'];
            $this->Description = $data['Description'];
            $this->LinkAddress = $data['LinkAddress'];
//            $this->ImagePath = $data['ImagePath'];
        }
    }

    public function getSpecialReportEntity() {
        $news_data = parent::getGeneralDataEntity();
        $news_data['SpecialReportID'] = intval($this->SpecialReportID);
        $news_data['Title'] = addslashes($this->Title);
        $news_data['Description'] = addslashes($this->Description);
        $news_data['LinkAddress'] = addslashes($this->LinkAddress);
//        $news_data['ImagePath'] = (string)$this->ImagePath;

        return $news_data;
    }

    public function getSpecialReportEntityForCreate() {
        $news_data = parent::getGeneralDataEntityForCreate();
        $news_data['Title'] = addslashes($this->Title);
        $news_data['Description'] = addslashes($this->Description);
        $news_data['LinkAddress'] = addslashes($this->LinkAddress);
//        $news_data['ImagePath'] = (string)$this->ImagePath;
        return $news_data;
    }

    public function getSpecialReportEntityForUpdate() {
        $news_data = parent::getGeneralDataEntityForUpdate();
        $news_data['Title'] = addslashes($this->Title);
        $news_data['Description'] = addslashes($this->Description);
        $news_data['LinkAddress'] = addslashes($this->LinkAddress);
        $news_data['LastUpdate'] = date('Y-m-d H:i:s');
        return $news_data;
    }
}
