<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StateVO
{
    public function getStateVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['CountryID'] = intval($data['CountryID']);
        $vo['Name'] = (string)$data['Name'];
        return $vo;
    }
}