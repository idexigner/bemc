<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ClassificationInformationVO
{
    public function getAddressCategoryVO (ClassificationInformationEntity $classificationInformationEntity){
        $vo = array();
        $vo['ClassificationID'] = intval($classificationInformationEntity->ClassificationID);
        $vo['Name'] = addslashes($classificationInformationEntity->Name);
        return $vo;
    }
}