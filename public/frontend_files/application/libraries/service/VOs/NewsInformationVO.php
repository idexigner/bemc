<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NewsInformationVO
{
    public function getNewsInformationVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['Title'] = addslashes($data['Title']);
        $vo['Description'] = addslashes($data['Description']);
        $vo['ImagePath'] = (string)$data['ImagePath'];
        $vo['PublishDateTime'] = (string)$data['PublishDateTime'];
        $vo['UnpublishedDateTime'] = (string)$data['UnpublishedDateTime'];
        return $vo;
    }
}