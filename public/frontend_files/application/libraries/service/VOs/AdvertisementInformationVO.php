<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdvertisementInformationVO
{
    public function getAdvertisementInformationVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['Organization'] = addslashes($data['Organization']);
        $vo['Title'] = addslashes($data['Title']);
        $vo['BodyText'] = addslashes($data['BodyText']);
        $vo['LinkURL'] = (string)$data['LinkURL'];
        $vo['ImagePath'] = (string)$data['ImagePath'];
        $vo['PublishDate'] = (string)$data['PublishDate'];
        $vo['UnpublishedDate'] = (string)$data['UnpublishedDate'];
        $vo['AdvertisementPositionID'] = intval($data['AdvertisementPositionID']);
        $vo['ContactPerson'] = (string)$data['ContactPerson'];
        if(!empty($data['EmailID']) && filter_var($data['EmailID'], FILTER_VALIDATE_EMAIL)) {
            $vo['EmailID'] = (string)$data['EmailID'];
        } else if(!empty($data['EmailID']) && !filter_var($data['EmailID'], FILTER_VALIDATE_EMAIL)) {
            return array();
        }
        $vo['MobileNo'] = (string)$data['MobileNo'];
        return $vo;
    }
}