<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LocationVO
{
    public function getLocationVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['CountryID'] = intval($data['CountryID']);
        $vo['StateID'] = intval($data['StateID']);
        $vo['CityID'] = intval($data['CityID']);
        $vo['Address'] = addslashes($data['Address']);
        $vo['Longitude'] = floatval($data['Longitude']);
        $vo['Latitude'] = floatval($data['Latitude']);
        return $vo;
    }
}