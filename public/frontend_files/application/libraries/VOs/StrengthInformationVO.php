<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StrengthInformationVO
{
    public function getAddressCategoryVO (StrengthInformationEntity $strengthInformationEntity){
        $vo = array();
        $vo['StrengthID'] = intval($strengthInformationEntity->StrengthID);
        $vo['Name'] = addslashes($strengthInformationEntity->Name);
        return $vo;
    }
}