<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DosageFormInformationVO
{
    public function getAddressCategoryVO (DosageFormInformationEntity $dosageFormInformationEntity){
        $vo = array();
        $vo['DosageFormID'] = intval($dosageFormInformationEntity->DosageFormID);
        $vo['Name'] = addslashes($dosageFormInformationEntity->Name);
        return $vo;
    }
}