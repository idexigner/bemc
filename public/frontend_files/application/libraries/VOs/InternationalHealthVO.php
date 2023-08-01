<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InternationalHealthVO
{
    public function getInternationalHealthVO (InternationalHealthEntity $InternationalHealthEntity){
        $vo = array();
        $vo['InternationalHealthID'] = intval($InternationalHealthEntity->InternationalHealthID);
        $vo['Title'] = addslashes($InternationalHealthEntity->Title);
        $vo['Description'] = addslashes($InternationalHealthEntity->Description);
        $vo['ImagePath'] = (string)$InternationalHealthEntity->ImagePath;
        $vo['PublishDateTime'] = (string)$InternationalHealthEntity->PublishDateTime;
        $vo['UnpublishedDateTime'] = (string)$InternationalHealthEntity->UnpublishedDateTime;
        return $vo;
    }
}