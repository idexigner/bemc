<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DrugInformationVO
{
    public function getDrugInformationVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['Name'] = addslashes($data['Name']);
        $vo['GenericID'] = intval($data['GenericID']);
        $vo['ManufacturerID'] = intval($data['ManufacturerID']);
        $vo['DosageFormID'] = intval($data['DosageFormID']);
        $vo['StrengthID'] = intval($data['StrengthID']);
        $vo['PackSizeID'] = intval($data['PackSizeID']);
        $vo['ImagePath'] = $data['ImagePath'];
        $vo['PriceInBDT'] = floatval($data['PriceInBDT']);
        $vo['IsHighlighted'] = intval($data['IsHighlighted']);
        $vo['IsNewProduct'] = intval($data['IsNewProduct']);
        $vo['IsNewBrand'] = intval($data['IsNewBrand']);
        $vo['IsNewPresentation'] = intval($data['IsNewPresentation']);
        return $vo;
    }
}