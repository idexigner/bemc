<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StrengthInformationVO
{
    public function getStrengthInformationVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['Name'] = addslashes($data['Name']);
        return $vo;
    }
}