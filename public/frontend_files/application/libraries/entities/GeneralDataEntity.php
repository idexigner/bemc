<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/BaseEntity.php');

class GeneralDataEntity extends BaseEntity
{
//    public $IsActive = 1;
    public $CreatedBy;

    function __construct ($data) {
        if (!empty($data)) {
//            $this->IsActive = $data['IsActive'];
            $this->CreatedBy = $data['CreatedBy'];
        }
    }

    public function getGeneralDataEntity() {
        $general_data = array();
        return $general_data;
    }

    public function getGeneralDataEntityForCreate() {
        $general_data = array();

        $general_data['CreatedBy'] = intval($this->CreatedBy);
        return $general_data;
    }

    public function getGeneralDataEntityForUpdate() {
        $general_data = array();
        return $general_data;
    }
}
