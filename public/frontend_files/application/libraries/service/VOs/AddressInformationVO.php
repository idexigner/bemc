<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddressInformationVO
{
    public function getAddressInformationVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['Name'] = addslashes($data['Name']);
        $vo['Address'] = addslashes($data['Address']);
        $vo['ContactNumber'] = (string)$data['ContactNumber'];
        return $vo;
    }
}