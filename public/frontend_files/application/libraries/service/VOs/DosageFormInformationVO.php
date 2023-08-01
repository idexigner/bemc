<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DosageFormInformationVO
{
    public function getDosageFormInformationVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['Name'] = addslashes($data['Name']);
        return $vo;
    }
}