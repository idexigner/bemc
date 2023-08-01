<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class AdvertisementInformationEntity extends GeneralDataEntity
{
    public $AdvertisementInformationID;
    public $Organization;
    public $Title;
    public $BodyText;
    public $LinkURL;
    public $ApplicableFor;
    public $PublishDate;
    public $UnpublishedDate;
    public $AdvertisementPositionID;
    public $ContactPerson;
    public $EmailID;
    public $MobileNo;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->AdvertisementInformationID = isset($data['ID']) ? $data['ID'] : '';
            $this->Organization = $data['Organization'];
            $this->Title = $data['Title'];
            $this->BodyText = $data['BodyText'];
            $this->LinkURL = $data['LinkURL'];
            $this->ApplicableFor = $data['ApplicableFor'];
            $this->PublishDate = $data['PublishDate'];
            $this->UnpublishedDate = $data['UnpublishedDate'];
            $this->AdvertisementPositionID = $data['AdvertisementPositionID'];
            $this->ContactPerson = $data['ContactPerson'];
            $this->EmailID = $data['EmailID'];
            $this->MobileNo = $data['MobileNo'];
        }
    }

    public function getAdvertisementInformationEntity() {
        $advertisement_information_data = parent::getGeneralDataEntity();
        $advertisement_information_data['Organization'] = addslashes($this->Organization);
        $advertisement_information_data['Title'] = addslashes($this->Title);
        $advertisement_information_data['BodyText'] = addslashes($this->BodyText);
        $advertisement_information_data['LinkURL'] = (string)$this->LinkURL;
        $advertisement_information_data['ApplicableFor'] = intval($this->ApplicableFor);
        $advertisement_information_data['PublishDate'] = (string)$this->PublishDate;
        $advertisement_information_data['UnpublishedDate'] = (string)$this->UnpublishedDate;
        $advertisement_information_data['AdvertisementPositionID'] = intval($this->AdvertisementPositionID);
        $advertisement_information_data['ContactPerson'] = (string)$this->ContactPerson;
        if(!empty($this->EmailID) && filter_var($this->EmailID, FILTER_VALIDATE_EMAIL)) {
            $advertisement_information_data['EmailID'] = (string)$this->EmailID;
        } else if(!empty($this->EmailID) && !filter_var($this->EmailID, FILTER_VALIDATE_EMAIL)) {
            return array();
        }
        $advertisement_information_data['MobileNo'] = (string)$this->MobileNo;

        return $advertisement_information_data;
    }

    public function getAdvertisementInformationEntityForCreate() {
        $advertisement_information_data = parent::getGeneralDataEntityForCreate();
        $advertisement_information_data['Organization'] = addslashes($this->Organization);
        $advertisement_information_data['Title'] = addslashes($this->Title);
        $advertisement_information_data['BodyText'] = addslashes($this->BodyText);
        $advertisement_information_data['LinkURL'] = (string)$this->LinkURL;
        $advertisement_information_data['ApplicableFor'] = intval($this->ApplicableFor);
        $advertisement_information_data['PublishDate'] = (string)$this->PublishDate;
        $advertisement_information_data['UnpublishedDate'] = (string)$this->UnpublishedDate;
        $advertisement_information_data['AdvertisementPositionID'] = intval($this->AdvertisementPositionID);
        $advertisement_information_data['ContactPerson'] = (string)$this->ContactPerson;
        if(!empty($this->EmailID) && filter_var($this->EmailID, FILTER_VALIDATE_EMAIL)) {
            $advertisement_information_data['EmailID'] = (string)$this->EmailID;
        } else if(!empty($this->EmailID) && !filter_var($this->EmailID, FILTER_VALIDATE_EMAIL)) {
            return array();
        }
        $advertisement_information_data['MobileNo'] = (string)$this->MobileNo;
        return $advertisement_information_data;
    }

    public function getAdvertisementInformationEntityForUpdate() {
        $advertisement_information_data = parent::getGeneralDataEntityForUpdate();
        $advertisement_information_data['Organization'] = addslashes($this->Organization);
        $advertisement_information_data['Title'] = addslashes($this->Title);
        $advertisement_information_data['BodyText'] = addslashes($this->BodyText);
        $advertisement_information_data['LinkURL'] = (string)$this->LinkURL;
        $advertisement_information_data['ApplicableFor'] = intval($this->ApplicableFor);
        $advertisement_information_data['PublishDate'] = (string)$this->PublishDate;
        $advertisement_information_data['UnpublishedDate'] = (string)$this->UnpublishedDate;
        $advertisement_information_data['AdvertisementPositionID'] = intval($this->AdvertisementPositionID);
        $advertisement_information_data['ContactPerson'] = (string)$this->ContactPerson;
        if(!empty($this->EmailID) && filter_var($this->EmailID, FILTER_VALIDATE_EMAIL)) {
            $advertisement_information_data['EmailID'] = (string)$this->EmailID;
        } else if(!empty($this->EmailID) && !filter_var($this->EmailID, FILTER_VALIDATE_EMAIL)) {
            return array();
        }
        $advertisement_information_data['MobileNo'] = (string)$this->MobileNo;
        $advertisement_information_data['LastUpdate'] = date('Y-m-d H:i:s');
        return $advertisement_information_data;
    }
}
