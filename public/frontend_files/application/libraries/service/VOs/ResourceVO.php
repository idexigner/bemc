<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ResourceVO
{
    public function getResourceVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['Title'] = addslashes($data['Title']);
        $vo['ResourceType'] = addslashes($data['ResourceType']);
        $vo['ResourcePath'] = $data['ResourcePath'];
        return $vo;
    }
}
