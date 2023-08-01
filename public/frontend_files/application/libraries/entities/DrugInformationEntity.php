<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class DrugInformationEntity extends GeneralDataEntity
{
    public $DrugID;
    public $GenericID;
    public $BrandID;
    public $ManufacturerID;
    public $DosageFormID;
    public $StrengthID;
    public $PackSizeID;
    public $PriceInBDT;
    public $IsHighlighted;
    public $IsNewProduct;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->DrugID = isset($data['ID']) ? $data['ID'] : '';
            $this->GenericID = $data['GenericID'];
            $this->BrandID = $data['BrandID'];
            $this->ManufacturerID = $data['ManufacturerID'];
            $this->DosageFormID = $data['DosageFormID'];
            $this->StrengthID = $data['StrengthID'];
            $this->PackSizeID = $data['PackSizeID'];
            $this->PriceInBDT = $data['PriceInBDT'];
            $this->IsHighlighted = $data['IsHighlighted'];
            $this->IsNewProduct = $data['IsNewProduct'];
        }
    }

    public function getDrugEntity() {
        $drug_data = parent::getGeneralDataEntity();
        $drug_data['DrugID'] = intval($this->DrugID);
        $drug_data['GenericID'] = intval($this->GenericID);
        $drug_data['BrandID'] = intval($this->BrandID);
        $drug_data['ManufacturerID'] = intval($this->ManufacturerID);
        $drug_data['DosageFormID'] = intval($this->DosageFormID);
        $drug_data['StrengthID'] = intval($this->StrengthID);
        $drug_data['PackSizeID'] = intval($this->PackSizeID);
        $drug_data['PriceInBDT'] = floatval($this->PriceInBDT);
        $drug_data['IsHighlighted'] = intval($this->IsHighlighted);
        $drug_data['IsNewProduct'] = intval($this->IsNewProduct);

        return $drug_data;
    }

    public function getDrugEntityForCreate() {
        $drug_data = parent::getGeneralDataEntityForCreate();
        $drug_data['GenericID'] = intval($this->GenericID);
        $drug_data['BrandID'] = intval($this->BrandID);
        $drug_data['ManufacturerID'] = intval($this->ManufacturerID);
        $drug_data['DosageFormID'] = intval($this->DosageFormID);
        $drug_data['StrengthID'] = intval($this->StrengthID);
        $drug_data['PackSizeID'] = intval($this->PackSizeID);
        $drug_data['PriceInBDT'] = floatval($this->PriceInBDT);
        $drug_data['IsHighlighted'] = intval($this->IsHighlighted);
        $drug_data['IsNewProduct'] = intval($this->IsNewProduct);

        return $drug_data;
    }

    public function getDrugEntityForUpdate() {
        $drug_data = parent::getGeneralDataEntityForUpdate();
        $drug_data['GenericID'] = intval($this->GenericID);
        $drug_data['BrandID'] = intval($this->BrandID);
        $drug_data['ManufacturerID'] = intval($this->ManufacturerID);
        $drug_data['DosageFormID'] = intval($this->DosageFormID);
        $drug_data['StrengthID'] = intval($this->StrengthID);
        $drug_data['PackSizeID'] = intval($this->PackSizeID);
        $drug_data['PriceInBDT'] = floatval($this->PriceInBDT);
        $drug_data['IsHighlighted'] = intval($this->IsHighlighted);
        $drug_data['IsNewProduct'] = intval($this->IsNewProduct);
        $drug_data['LastUpdate'] = date('Y-m-d H:i:s');

        return $drug_data;
    }
}
