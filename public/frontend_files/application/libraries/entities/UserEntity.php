<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class UserEntity extends GeneralDataEntity
{
    public $UserID;
    public $UserName;
    public $EmailID;
    public $UserPass;
    public $FirstName;
    public $LastName;
    public $RoleID;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->UserID = $data['ID'];
            $this->UserName = $data['UserName'];
            $this->EmailID = $data['EmailID'];
            $this->UserPass = $data['UserPass'];
            $this->FirstName = $data['FirstName'];
            $this->LastName = $data['LastName'];
            $this->RoleID = $data['RoleID'];
        }
    }

    public function getUserEntity() {
        $user_data = parent::getGeneralDataEntity();
        $user_data['UserID'] = intval($this->UserID);
        $user_data['UserName'] = addslashes($this->UserName);
        $user_data['EmailID'] = (string)$this->EmailID;
        $user_data['UserPass'] = (string)$this->UserPass;
        $user_data['FirstName'] = addslashes($this->FirstName);
        $user_data['LastName'] = addslashes($this->LastName);
        $user_data['RoleID'] = intval($this->RoleID);

        return $user_data;
    }

    public function getUserEntityForCreate() {
        $user_data = parent::getGeneralDataEntityForCreate();

        if(filter_var($this->EmailID, FILTER_VALIDATE_EMAIL)) {
            $user_data['UserName'] = strtolower($this->UserName);
            $user_data['EmailID'] = strtolower($this->EmailID);
            $user_data['UserPass'] = (string)$this->UserPass;
            $user_data['FirstName'] = addslashes($this->FirstName);
            $user_data['LastName'] = addslashes($this->LastName);
            $user_data['RoleID'] = intval($this->RoleID);
            $user_data['CreatedBy'] = intval($this->CreatedBy);

            return $user_data;
        }

        return $user_data;
    }

    public function getUserEntityForUpdate() {
        $user_data = parent::getGeneralDataEntityForUpdate();

        if(filter_var($this->EmailID, FILTER_VALIDATE_EMAIL)) {
            $user_data['UserName'] = strtolower($this->UserName);
            $user_data['EmailID'] = strtolower($this->EmailID);
            $user_data['FirstName'] = addslashes($this->FirstName);
            $user_data['LastName'] = addslashes($this->LastName);
            $user_data['RoleID'] = intval($this->RoleID);

            return $user_data;
        }

        return $user_data;
    }
}
