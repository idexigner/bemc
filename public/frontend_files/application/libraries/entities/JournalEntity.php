<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class JournalEntity extends GeneralDataEntity
{
    public $JournalID;
    public $Title;
	public $JournalCategoryID;
	public $JournalType;
	public $JournalPath;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->JournalID = isset($data['ID']) ? $data['ID'] : '';
            $this->Title = $data['Title'];
			$this->JournalCategoryID = $data['JournalCategoryID'];
			$this->JournalType = $data['JournalType'];
			$this->JournalPath = $data['JournalPath'];
        }
    }

    public function getJournalEntity() {
        $news_data = parent::getGeneralDataEntity();
        $news_data['JournalID'] = intval($this->JournalID);
        $news_data['Title'] = addslashes($this->Title);
		$news_data['JournalCategoryID'] = addslashes($this->JournalCategoryID);
		$news_data['JournalType'] = addslashes($this->JournalType);
		$news_data['JournalPath'] = (string)$this->JournalPath;

        return $news_data;
    }

    public function getJournalEntityForCreate() {
        $news_data = parent::getGeneralDataEntityForCreate();
        $news_data['Title'] = addslashes($this->Title);
		$news_data['JournalCategoryID'] = addslashes($this->JournalCategoryID);
		$news_data['JournalType'] = addslashes($this->JournalType);
		$news_data['JournalPath'] = (string)$this->JournalPath;
        return $news_data;
    }

    public function getJournalEntityForUpdate() {
        $news_data = parent::getGeneralDataEntityForUpdate();
        $news_data['Title'] = addslashes($this->Title);
		$news_data['JournalCategoryID'] = addslashes($this->JournalCategoryID);
		$news_data['JournalType'] = addslashes($this->JournalType);
		$news_data['JournalPath'] = (string)$this->JournalPath;
        $news_data['LastUpdate'] = date('Y-m-d H:i:s');
        return $news_data;
    }
}
