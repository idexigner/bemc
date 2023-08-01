<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BrandInformationVO
{
    public function getAddressCategoryVO (BrandInformationEntity $brandInformationEntity){
        $vo = array();
        $vo['BrandID'] = intval($brandInformationEntity->BrandID);
        $vo['Name'] = addslashes($brandInformationEntity->Name);
        return $vo;
    }
}