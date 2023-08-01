<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GenericInformationVO
{
    public function getGenericInformationVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['Name'] = addslashes($data['Name']);
        $vo['Classification'] = addslashes($data['Classification']);
        $vo['SafetyRemark'] = addslashes($data['SafetyRemark']);
        $vo['Indication'] = addslashes($data['Indication']);
        $vo['IndicationTags'] = addslashes($data['IndicationTags']);
        $vo['DosageAdministration'] = addslashes($data['DosageAdministration']);
		$vo['ContraindicationPrecaution'] = addslashes($data['ContraindicationPrecaution']);
		$vo['Composition'] = addslashes($data['Composition']);
		$vo['Pharmacology'] = addslashes($data['Pharmacology']);
		$vo['Interaction'] = addslashes($data['Interaction']);
		$vo['SideEffect'] = addslashes($data['SideEffect']);
		$vo['OverdoseEffect'] = addslashes($data['OverdoseEffect']);
		$vo['StorageCondition'] = addslashes($data['StorageCondition']);
		$vo['PregnancyLactation'] = addslashes($data['PregnancyLactation']);
        return $vo;
    }
}
