<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddressCategoryVO
{
    public function getAddressCategoryVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['Name'] = addslashes($data['Name']);
        return $vo;
    }
}