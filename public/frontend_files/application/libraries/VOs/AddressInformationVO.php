<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddressInformationVO
{
    public function getAddressCategoryVO (AddressInformationEntity $addressInformationEntity){
        $vo = array();
        $vo['AddressCategoryID'] = intval($addressInformationEntity->AddressCategoryID);
        $vo['Name'] = addslashes($addressInformationEntity->Name);
        $vo['Address'] = addslashes($addressInformationEntity->Address);
        $vo['ContactNumber'] = (string)$addressInformationEntity->ContactNumber;
        return $vo;
    }
}