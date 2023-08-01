<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CategoryWiseAdvertisementVO
{
    public function getCategoryWiseAdvertisementVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['CategoryID'] = intval($data['CategoryID']);
        $vo['CategoryValue'] = addslashes($data['CategoryValue']);
        $vo['AdvertisementID'] = intval($data['AdvertisementID']);
        return $vo;
    }
}