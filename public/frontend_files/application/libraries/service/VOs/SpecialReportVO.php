<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SpecialReportVO
{
    public function getSpecialReportVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['Title'] = addslashes($data['Title']);
        $vo['Description'] = addslashes($data['Description']);
        $vo['LinkAddress'] = $data['LinkAddress'];
        $vo['ImagePath'] = $data['ImagePath'];
        return $vo;
    }
}