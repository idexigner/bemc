<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdvertisementPositionInformationVO
{
    public function getAdvertisementPositionInformationVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['Name'] = addslashes($data['Name']);
        $vo['ClassName'] = (string)$data['ClassName'];
        $vo['ImageWidth'] = (string)$data['ImageWidth'];
        $vo['ImageHeight'] = (string)$data['ImageHeight'];
        $vo['NumberOfAdvertisement'] = intval($data['NumberOfAdvertisement']);
        $vo['Interval'] = intval($data['Interval']);
        $vo['PriceInBDT'] = floatval($data['PriceInBDT']);
        return $vo;
    }
}