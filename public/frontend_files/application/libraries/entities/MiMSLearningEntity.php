<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class MiMSLearningEntity extends GeneralDataEntity
{
    public $MiMSLearningID;
    public $Title;
    public $MiMSLearningType;
    public $MiMSLearningPath;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->MiMSLearningID = isset($data['ID']) ? $data['ID'] : '';
            $this->Title = $data['Title'];
            $this->MiMSLearningType = $data['MiMSLearningType'];
            $this->MiMSLearningPath = $data['MiMSLearningPath'];
        }
    }

    public function getMiMSLearningEntity() {
        $news_data = parent::getGeneralDataEntity();
        $news_data['MiMSLearningID'] = intval($this->MiMSLearningID);
        $news_data['Title'] = addslashes($this->Title);
        $news_data['MiMSLearningType'] = addslashes($this->MiMSLearningType);
        $news_data['MiMSLearningPath'] = (string)$this->MiMSLearningPath;

        return $news_data;
    }

    public function getMiMSLearningEntityForCreate() {
        $news_data = parent::getGeneralDataEntityForCreate();
        $news_data['Title'] = addslashes($this->Title);
        $news_data['MiMSLearningType'] = addslashes($this->MiMSLearningType);
        $news_data['MiMSLearningPath'] = (string)$this->MiMSLearningPath;
        return $news_data;
    }

    public function getMiMSLearningEntityForUpdate() {
        $news_data = parent::getGeneralDataEntityForUpdate();
        $news_data['Title'] = addslashes($this->Title);
        $news_data['MiMSLearningType'] = addslashes($this->MiMSLearningType);
		$news_data['MiMSLearningPath'] = (string)$this->MiMSLearningPath;
        $news_data['LastUpdate'] = date('Y-m-d H:i:s');
        return $news_data;
    }
}
