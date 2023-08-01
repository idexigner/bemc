<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SafetyRemarksVO
{
    public function getAddressCategoryVO (SafetyRemarksEntity $safetyRemarksEntity){
        $vo = array();
        $vo['SafetyRemarkID'] = intval($safetyRemarksEntity->SafetyRemarkID);
        $vo['Remarks'] = addslashes($safetyRemarksEntity->Remarks);
        return $vo;
    }
}