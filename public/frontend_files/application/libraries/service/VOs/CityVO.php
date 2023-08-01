<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CityVO
{
    public function getCityVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['StateID'] = intval($data['StateID']);
        $vo['Name'] = (string)$data['Name'];
        return $vo;
    }
}