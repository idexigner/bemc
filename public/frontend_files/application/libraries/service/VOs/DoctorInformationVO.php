<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DoctorInformationVO
{
    public function getDoctorInformationVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['Name'] = addslashes($data['Name']);
        $vo['Specialization'] = addslashes($data['Specialization']);
        $vo['ProfessionDegree'] = addslashes($data['ProfessionDegree']);
        $vo['Gender'] = (string)$data['Gender'];
        $vo['ImagePath'] = (string)$data['ImagePath'];
        $vo['HomeAddressID'] = addslashes($data['HomeAddressID']);
        $vo['ChamberAddressID'] = addslashes($data['ChamberAddressID']);
        $vo['PhoneNo'] = (string)$data['PhoneNo'];
        $vo['MobileNo1'] = (string)$data['MobileNo1'];
        $vo['MobileNo2'] = (string)$data['MobileNo2'];
        $vo['MobileNo3'] = (string)$data['MobileNo3'];
        $vo['Hotline'] = (string)$data['Hotline'];
        return $vo;
    }
}