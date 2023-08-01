<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GenericInformationVO
{
    public function getAddressCategoryVO (GenericInformationEntity $genericInformationEntity){
        $vo = array();
        $vo['GenericID'] = intval($genericInformationEntity->GenericID);
        $vo['Name'] = addslashes($genericInformationEntity->Name);
        return $vo;
    }
}