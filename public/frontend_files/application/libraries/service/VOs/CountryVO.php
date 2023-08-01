<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CountryVO
{
    public function getCountryVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['Name'] = (string)$data['Name'];
        return $vo;
    }
}