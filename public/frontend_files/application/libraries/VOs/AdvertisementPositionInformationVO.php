<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdvertisementPositionInformationVO
{
    public function getAddressCategoryVO (AdvertisementPositionInformationEntity $advertisementPositionInformationEntity){
        $vo = array();
        $vo['AdvertisementPositionID'] = intval($advertisementPositionInformationEntity->AdvertisementPositionID);
        $vo['Name'] = addslashes($advertisementPositionInformationEntity->Name);
        $vo['ClassName'] = (string)$advertisementPositionInformationEntity->ClassName;
        $vo['ImageWidth'] = (string)$advertisementPositionInformationEntity->ImageWidth;
        $vo['ImageHeight'] = (string)$advertisementPositionInformationEntity->ImageHeight;
        $vo['NumberOfAdvertisement'] = intval($advertisementPositionInformationEntity->NumberOfAdvertisement);
        $vo['Interval'] = intval($advertisementPositionInformationEntity->Interval);
        $vo['PriceInBDT'] = floatval($advertisementPositionInformationEntity->PriceInBDT);
        return $vo;
    }
}