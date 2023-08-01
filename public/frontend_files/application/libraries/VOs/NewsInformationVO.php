<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NewsInformationVO
{
    public function getAddressCategoryVO (NewsInformationEntity $newsInformationEntity){
        $vo = array();
        $vo['NewsID'] = intval($newsInformationEntity->NewsID);
        $vo['Title'] = addslashes($newsInformationEntity->Title);
        $vo['Description'] = addslashes($newsInformationEntity->Description);
        $vo['ImagePath'] = (string)$newsInformationEntity->ImagePath;
        $vo['PublishDateTime'] = (string)$newsInformationEntity->PublishDateTime;
        $vo['UnpublishedDateTime'] = (string)$newsInformationEntity->UnpublishedDateTime;
        return $vo;
    }
}