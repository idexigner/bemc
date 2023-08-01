<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class GenericInformationEntity extends GeneralDataEntity
{
    public $GenericID;
    public $Name;
    public $Classification;
    public $SafetyRemark;
    public $Indication;
    public $IndicationTags;
    public $DosageAdministration;
    public $ContraindicationPrecaution;
    public $Composition;
	public $Pharmacology;
	public $Interaction;
    public $SideEffect;
	public $OverdoseEffect;
	public $StorageCondition;
    public $PregnancyLactation;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->GenericID = isset($data['ID']) ? $data['ID'] : '';
            $this->Name = $data['Name'];
            $this->Classification = $data['Classification'];
            $this->SafetyRemark = $data['SafetyRemark'];
            $this->Indication = $data['Indication'];
            $this->IndicationTags = $data['IndicationTags'];
            $this->DosageAdministration = $data['DosageAdministration'];
			$this->ContraindicationPrecaution = $data['ContraindicationPrecaution'];
			$this->Composition = $data['Composition'];
			$this->Pharmacology = $data['Pharmacology'];
			$this->Interaction = $data['Interaction'];
			$this->SideEffect = $data['SideEffect'];
			$this->OverdoseEffect = $data['OverdoseEffect'];
			$this->StorageCondition = $data['StorageCondition'];
			$this->PregnancyLactation = $data['PregnancyLactation'];
        }
    }

    public function getGenericEntity() {
        $generic_data = parent::getGeneralDataEntity();
        $generic_data['GenericID'] = intval($this->GenericID);
        $generic_data['Name'] = addslashes($this->Name);
        $generic_data['Classification'] = addslashes($this->Classification);
        $generic_data['SafetyRemark'] = addslashes($this->SafetyRemark);
        $generic_data['Indication'] = addslashes($this->Indication);
        $generic_data['IndicationTags'] = addslashes($this->IndicationTags);
        $generic_data['DosageAdministration'] = addslashes($this->DosageAdministration);
        $generic_data['ContraindicationPrecaution'] = addslashes($this->ContraindicationPrecaution);
		$generic_data['Composition'] = addslashes($this->Composition);
		$generic_data['Pharmacology'] = addslashes($this->Pharmacology);
		$generic_data['Interaction'] = addslashes($this->Interaction);
		$generic_data['SideEffect'] = addslashes($this->SideEffect);
		$generic_data['OverdoseEffect'] = addslashes($this->OverdoseEffect);
		$generic_data['StorageCondition'] = addslashes($this->StorageCondition);
		$generic_data['PregnancyLactation'] = addslashes($this->PregnancyLactation);

        return $generic_data;
    }

    public function getGenericEntityForCreate() {
        $generic_data = parent::getGeneralDataEntityForCreate();
        $generic_data['Name'] = addslashes($this->Name);
        $generic_data['Classification'] = addslashes($this->Classification);
        $generic_data['SafetyRemark'] = addslashes($this->SafetyRemark);
        $generic_data['Indication'] = addslashes($this->Indication);
        $generic_data['IndicationTags'] = addslashes($this->IndicationTags);
        $generic_data['DosageAdministration'] = addslashes($this->DosageAdministration);
        $generic_data['ContraindicationPrecaution'] = addslashes($this->ContraindicationPrecaution);
		$generic_data['Composition'] = addslashes($this->Composition);
		$generic_data['Pharmacology'] = addslashes($this->Pharmacology);
		$generic_data['Interaction'] = addslashes($this->Interaction);
		$generic_data['SideEffect'] = addslashes($this->SideEffect);
		$generic_data['OverdoseEffect'] = addslashes($this->OverdoseEffect);
		$generic_data['StorageCondition'] = addslashes($this->StorageCondition);
		$generic_data['PregnancyLactation'] = addslashes($this->PregnancyLactation);

        return $generic_data;
    }

    public function getGenericEntityForUpdate() {
        $generic_data = parent::getGeneralDataEntityForUpdate();
        $generic_data['Name'] = addslashes($this->Name);
        $generic_data['Classification'] = addslashes($this->Classification);
        $generic_data['SafetyRemark'] = addslashes($this->SafetyRemark);
        $generic_data['Indication'] = addslashes($this->Indication);
        $generic_data['IndicationTags'] = addslashes($this->IndicationTags);
        $generic_data['DosageAdministration'] = addslashes($this->DosageAdministration);
        $generic_data['ContraindicationPrecaution'] = addslashes($this->ContraindicationPrecaution);
		$generic_data['Composition'] = addslashes($this->Composition);
		$generic_data['Pharmacology'] = addslashes($this->Pharmacology);
		$generic_data['Interaction'] = addslashes($this->Interaction);
		$generic_data['SideEffect'] = addslashes($this->SideEffect);
		$generic_data['OverdoseEffect'] = addslashes($this->OverdoseEffect);
		$generic_data['StorageCondition'] = addslashes($this->StorageCondition);
		$generic_data['PregnancyLactation'] = addslashes($this->PregnancyLactation);
        $generic_data['LastUpdate'] = date('Y-m-d H:i:s');

        return $generic_data;
    }
}
