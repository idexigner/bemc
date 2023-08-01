<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManufacturerInformationVO
{
    public function getManufacturerInformationVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['Name'] = addslashes($data['Name']);
        $vo['AddressID'] = intval($data['AddressID']);
        $vo['EmailID'] = (string)$data['EmailID'];
        $vo['PhoneNo'] = (string)$data['PhoneNo'];
        $vo['MobileNo'] = (string)$data['MobileNo'];
        $vo['FaxNo'] = (string)$data['FaxNo'];
        return $vo;
    }
}