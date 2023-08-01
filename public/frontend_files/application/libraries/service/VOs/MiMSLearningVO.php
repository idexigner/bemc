<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MiMSLearningVO
{
    public function getMiMSLearningVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['Title'] = addslashes($data['Title']);
        $vo['MiMSLearningType'] = addslashes($data['MiMSLearningType']);
        $vo['MiMSLearningPath'] = $data['MiMSLearningPath'];
        return $vo;
    }
}
