<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManufacturerInformationVO
{
    public function getAddressCategoryVO (ManufacturerInformationEntity $manufacturerInformationEntity){
        $vo = array();
        $vo['ManufacturerID'] = intval($manufacturerInformationEntity->ManufacturerID);
        $vo['Name'] = addslashes($manufacturerInformationEntity->Name);
        $vo['AddressID'] = intval($manufacturerInformationEntity->AddressID);
        if(!empty($manufacturerInformationEntity->EmailID) && filter_var($manufacturerInformationEntity->EmailID, FILTER_VALIDATE_EMAIL)) {
            $vo['EmailID'] = (string)$manufacturerInformationEntity->EmailID;
        } else if(!empty($manufacturerInformationEntity->EmailID) && !filter_var($manufacturerInformationEntity->EmailID, FILTER_VALIDATE_EMAIL)) {
            return array();
        }
        $vo['PhoneNo'] = (string)$manufacturerInformationEntity->PhoneNo;
        $vo['MobileNo'] = (string)$manufacturerInformationEntity->MobileNo;
        $vo['FaxNo'] = (string)$manufacturerInformationEntity->FaxNo;
        return $vo;
    }
}