<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class ResourceEntity extends GeneralDataEntity
{
    public $ResourceID;
    public $Title;
    public $ResourceType;
    public $ResourcePath;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->ResourceID = isset($data['ID']) ? $data['ID'] : '';
            $this->Title = $data['Title'];
            $this->ResourceType = $data['ResourceType'];
            $this->ResourcePath = $data['ResourcePath'];
        }
    }

    public function getResourceEntity() {
        $news_data = parent::getGeneralDataEntity();
        $news_data['ResourceID'] = intval($this->ResourceID);
        $news_data['Title'] = addslashes($this->Title);
        $news_data['ResourceType'] = addslashes($this->ResourceType);
        $news_data['ResourcePath'] = (string)$this->ResourcePath;

        return $news_data;
    }

    public function getResourceEntityForCreate() {
        $news_data = parent::getGeneralDataEntityForCreate();
        $news_data['Title'] = addslashes($this->Title);
        $news_data['ResourceType'] = addslashes($this->ResourceType);
        $news_data['ResourcePath'] = (string)$this->ResourcePath;
        return $news_data;
    }

    public function getResourceEntityForUpdate() {
        $news_data = parent::getGeneralDataEntityForUpdate();
        $news_data['Title'] = addslashes($this->Title);
        $news_data['ResourceType'] = addslashes($this->ResourceType);
		$news_data['ResourcePath'] = (string)$this->ResourcePath;
        $news_data['LastUpdate'] = date('Y-m-d H:i:s');
        return $news_data;
    }
}
