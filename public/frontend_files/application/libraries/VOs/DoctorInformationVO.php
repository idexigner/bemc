<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DoctorInformationVO
{
    public function getAddressCategoryVO (DoctorInformationEntity $doctorInformationEntity){
        $vo = array();
        $vo['DoctorID'] = intval($doctorInformationEntity->DoctorID);
        $vo['Name'] = addslashes($doctorInformationEntity->Name);
        $vo['Specialization'] = addslashes($doctorInformationEntity->Specialization);
        $vo['ProfessionDegree'] = addslashes($doctorInformationEntity->ProfessionDegree);
        $vo['Gender'] = (string)$doctorInformationEntity->Gender;
        $vo['ImagePath'] = (string)$doctorInformationEntity->ImagePath;
        $vo['HomeAddressID'] = addslashes($doctorInformationEntity->HomeAddressID);
        $vo['ChamberAddressID'] = addslashes($doctorInformationEntity->ChamberAddressID);
        $vo['PhoneNo'] = (string)$doctorInformationEntity->PhoneNo;
        $vo['MobileNo1'] = (string)$doctorInformationEntity->MobileNo1;
        $vo['MobileNo2'] = (string)$doctorInformationEntity->MobileNo2;
        $vo['MobileNo3'] = (string)$doctorInformationEntity->MobileNo3;
        $vo['Hotline'] = (string)$doctorInformationEntity->Hotline;
        return $vo;
    }
}