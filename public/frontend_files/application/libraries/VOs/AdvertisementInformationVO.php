<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdvertisementInformationVO
{
    public function getAddressCategoryVO (AdvertisementInformationEntity $advertisementInformationEntity){
        $vo = array();
        $vo['Organization'] = addslashes($advertisementInformationEntity->Organization);
        $vo['Title'] = addslashes($advertisementInformationEntity->Title);
        $vo['BodyText'] = addslashes($advertisementInformationEntity->BodyText);
        $vo['LinkURL'] = (string)$advertisementInformationEntity->LinkURL;
        $vo['ImagePath'] = (string)$advertisementInformationEntity->ImagePath;
        $vo['PublishDate'] = (string)$advertisementInformationEntity->PublishDate;
        $vo['UnpublishedDate'] = (string)$advertisementInformationEntity->UnpublishedDate;
        $vo['AdvertisementInformationID'] = intval($advertisementInformationEntity->AdvertisementInformationID);
        $vo['ContactPerson'] = (string)$advertisementInformationEntity->ContactPerson;
        if(!empty($advertisementInformationEntity->EmailID) && filter_var($advertisementInformationEntity->EmailID, FILTER_VALIDATE_EMAIL)) {
            $vo['EmailID'] = (string)$advertisementInformationEntity->EmailID;
        } else if(!empty($advertisementInformationEntity->EmailID) && !filter_var($advertisementInformationEntity->EmailID, FILTER_VALIDATE_EMAIL)) {
            return array();
        }
        $vo['MobileNo'] = (string)$advertisementInformationEntity->MobileNo;
        return $vo;
    }
}