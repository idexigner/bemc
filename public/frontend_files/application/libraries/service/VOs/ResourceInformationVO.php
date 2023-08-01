<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ResourceInformationVO
{
    public function getResourceInformationVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['Title'] = addslashes($data['Title']);
        $vo['ResourceType'] = $data['ResourceType'];
        $vo['ResourcePath'] = $data['ResourcePath'];
        return $vo;
    }
}