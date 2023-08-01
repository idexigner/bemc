<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PackSizeInformationVO
{
    public function getAddressCategoryVO (PackSizeInformationEntity $packSizeInformationEntity){
        $vo = array();
        $vo['PackSizeID'] = intval($packSizeInformationEntity->PackSizeID);
        $vo['Name'] = addslashes($packSizeInformationEntity->Name);
        return $vo;
    }
}