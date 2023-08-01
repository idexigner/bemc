<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class InternationalHealthEntity extends GeneralDataEntity
{
    public $InternationalHealthID;
    public $Title;
    public $Description;
    public $ImagePath;
    public $PublishDateTime;
    public $UnpublishedDateTime;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->InternationalHealthID = isset($data['ID']) ? $data['ID'] : '';
            $this->Title = $data['Title'];
            $this->Description = $data['Description'];
            $this->ImagePath = $data['ImagePath'];
            $this->PublishDateTime = $data['PublishDateTime'];
            $this->UnpublishedDateTime = $data['UnpublishedDateTime'];
        }
    }

    public function getInternationalHealthEntity() {
        $news_data = parent::getGeneralDataEntity();
        $news_data['InternationalHealthID'] = intval($this->InternationalHealthID);
        $news_data['Title'] = addslashes($this->Title);
        $news_data['Description'] = addslashes($this->Description);
        $news_data['ImagePath'] = (string)$this->ImagePath;
        $news_data['PublishDateTime'] = (string)$this->PublishDateTime;
        $news_data['UnpublishedDateTime'] = (string)$this->UnpublishedDateTime;

        return $news_data;
    }

    public function getInternationalHealthEntityForCreate() {
        $news_data = parent::getGeneralDataEntityForCreate();
        $news_data['Title'] = addslashes($this->Title);
        $news_data['Description'] = addslashes($this->Description);
        $news_data['ImagePath'] = (string)$this->ImagePath;
        $news_data['PublishDateTime'] = (string)$this->PublishDateTime;
        $news_data['UnpublishedDateTime'] = (string)$this->UnpublishedDateTime;
        return $news_data;
    }

    public function getInternationalHealthEntityForUpdate() {
        $news_data = parent::getGeneralDataEntityForUpdate();
        $news_data['Title'] = addslashes($this->Title);
        $news_data['Description'] = addslashes($this->Description);
        $news_data['ImagePath'] = (string)$this->ImagePath;
        $news_data['PublishDateTime'] = (string)$this->PublishDateTime;
        $news_data['UnpublishedDateTime'] = (string)$this->UnpublishedDateTime;
        $news_data['LastUpdate'] = date('Y-m-d H:i:s');
        return $news_data;
    }
}
