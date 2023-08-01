<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class AdvertisementPositionInformationEntity extends GeneralDataEntity
{
    public $AdvertisementPositionID;
    public $Name;
    public $ClassName;
    public $ImageWidth;
    public $ImageHeight;
    public $NumberOfAdvertisement;
    public $Interval;
    public $PriceInBDT;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->AdvertisementPositionID = isset($data['ID']) ? $data['ID'] : '';
            $this->Name = $data['Name'];
            $this->ClassName = $data['ClassName'];
            $this->ImageWidth = $data['ImageWidth'];
            $this->ImageHeight = $data['ImageHeight'];
            $this->NumberOfAdvertisement = $data['NumberOfAdvertisement'];
            $this->Interval = $data['Interval'];
            $this->PriceInBDT = $data['PriceInBDT'];
        }
    }

    public function getAdvertisementPositionEntity() {
        $advertisement_position_data = parent::getGeneralDataEntity();
        $advertisement_position_data['AdvertisementPositionID'] = intval($this->AdvertisementPositionID);
        $advertisement_position_data['Name'] = addslashes($this->Name);
        $advertisement_position_data['ClassName'] = (string)$this->ClassName;
        $advertisement_position_data['ImageWidth'] = (string)$this->ImageWidth;
        $advertisement_position_data['ImageHeight'] = (string)$this->ImageHeight;
        $advertisement_position_data['NumberOfAdvertisement'] = intval($this->NumberOfAdvertisement);
        $advertisement_position_data['Interval'] = intval($this->Interval);
        $advertisement_position_data['PriceInBDT'] = floatval($this->PriceInBDT);

        return $advertisement_position_data;
    }

    public function getAdvertisementPositionEntityForCreate() {
        $advertisement_position_data = parent::getGeneralDataEntityForCreate();
        $advertisement_position_data['Name'] = addslashes($this->Name);
        $advertisement_position_data['ClassName'] = (string)$this->ClassName;
        $advertisement_position_data['ImageWidth'] = (string)$this->ImageWidth;
        $advertisement_position_data['ImageHeight'] = (string)$this->ImageHeight;
        $advertisement_position_data['NumberOfAdvertisement'] = intval($this->NumberOfAdvertisement);
        $advertisement_position_data['Interval'] = intval($this->Interval);
        $advertisement_position_data['PriceInBDT'] = floatval($this->PriceInBDT);
        return $advertisement_position_data;
    }

    public function getAdvertisementPositionEntityForUpdate() {
        $advertisement_position_data = parent::getGeneralDataEntityForUpdate();
        $advertisement_position_data['Name'] = addslashes($this->Name);
        $advertisement_position_data['ClassName'] = (string)$this->ClassName;
        $advertisement_position_data['ImageWidth'] = (string)$this->ImageWidth;
        $advertisement_position_data['ImageHeight'] = (string)$this->ImageHeight;
        $advertisement_position_data['NumberOfAdvertisement'] = intval($this->NumberOfAdvertisement);
        $advertisement_position_data['Interval'] = intval($this->Interval);
        $advertisement_position_data['PriceInBDT'] = floatval($this->PriceInBDT);
        return $advertisement_position_data;
    }
}
