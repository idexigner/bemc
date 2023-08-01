<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LocationVO
{
    public function getAddressCategoryVO (LocationEntity $locationEntity){
        $vo = array();
        $vo['LocationID'] = intval($locationEntity->LocationID);
        $vo['CountryID'] = intval($locationEntity->CountryID);
        $vo['StateID'] = intval($locationEntity->StateID);
        $vo['CityID'] = intval($locationEntity->CityID);
        $vo['Address'] = addslashes($locationEntity->Address);
        $vo['Longitude'] = floatval($locationEntity->Longitude);
        $vo['Latitude'] = floatval($locationEntity->Latitude);
        return $vo;
    }
}