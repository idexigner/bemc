<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');



class DoctorInformationEntity extends GeneralDataEntity

{

    public $DoctorID;

    public $Name;

    public $Specialization;
    public $bio_notes;

    // public $ProfessionDegree;

    // public $Gender;

    // public $HomeAddressID;

    // public $ChamberAddressID;

    // public $PhoneNo;

    // public $MobileNo1;

    // public $MobileNo2;

    // public $MobileNo3;

    // public $Hotline;

    public $PhoneNo ;
    public $email_id;
    public $clinic_phone;
    public $achievement;
    public $experiance;
    public $clinic_address;
    public $clinic_country_id;
    public $clinic_state_id;
    public $clinic_city_id;
    public $clinic_zipcode;



    function __construct ($data) {

        parent::__construct($data);

        if (!empty($data)) {

            $this->DoctorID = isset($data['ID']) ? $data['ID'] : '';

            $this->Name = $data['Name'];

            $this->Specialization = $data['Specialization'];
            $this->bio_notes = $data['bio_notes'];

            // $this->ProfessionDegree = $data['ProfessionDegree'];

            // $this->Gender = $data['Gender'];

            // $this->HomeAddressID = $data['HomeAddressID'];

            // $this->ChamberAddressID = $data['ChamberAddressID'];

            // $this->PhoneNo = $data['PhoneNo'];

            // $this->MobileNo1 = $data['MobileNo1'];

            // $this->MobileNo2 = $data['MobileNo2'];

            // $this->MobileNo3 = $data['MobileNo3'];

            // $this->Hotline = $data['Hotline'];
            $this->PhoneNo  = $data['PhoneNo'];;
            $this->email_id = $data['email_id'];;
            $this->clinic_phone = $data['clinic_phone'];;
            $this->achievement = $data['achievement'];;
            $this->experiance = $data['experiance'];;
            $this->clinic_address = $data['clinic_address'];;
            $this->clinic_country_id = $data['clinic_country_id'];;
            $this->clinic_state_id = $data['clinic_state_id'];;
            $this->clinic_city_id = $data['clinic_city_id'];;
            $this->clinic_zipcode = $data['clinic_zipcode'];;

        }

    }



    public function getDoctorInformationEntity() {

        $doctor_data = parent::getGeneralDataEntity();

        $doctor_data['DoctorID'] = intval($this->DoctorID);

        $doctor_data['Name'] = addslashes($this->Name);

        $doctor_data['Specialization'] = addslashes($this->Specialization);

        // $doctor_data['ProfessionDegree'] = addslashes($this->ProfessionDegree);

        // $doctor_data['Gender'] = (string)$this->Gender;

        // $doctor_data['HomeAddressID'] = intval($this->HomeAddressID);

        // $doctor_data['ChamberAddressID'] = intval($this->ChamberAddressID);

        // $doctor_data['PhoneNo'] = (string)$this->PhoneNo;

        // $doctor_data['MobileNo1'] = (string)$this->MobileNo1;

        // $doctor_data['MobileNo2'] = (string)$this->MobileNo2;

        // $doctor_data['MobileNo3'] = (string)$this->MobileNo3;
 
        // $doctor_data['Hotline'] = (string)$this->Hotline;
        $doctor_data['bio_notes'] = (string)$this->bio_notes;
        $doctor_data['PhoneNo'] = (string)$this->PhoneNo;
        $doctor_data['email_id'] = (string)$this->email_id;
        $doctor_data['clinic_phone'] = (string)$this->clinic_phone;
        $doctor_data['achievement'] = (string)$this->achievement;
        $doctor_data['experiance'] = (string)$this->experiance;
        $doctor_data['clinic_address'] = (string)$this->clinic_address;
        $doctor_data['clinic_country_id'] = (string)$this->clinic_country_id;
        $doctor_data['clinic_state_id'] = (string)$this->clinic_state_id;
        $doctor_data['clinic_city_id'] = (string)$this->clinic_city_id;
        $doctor_data['clinic_zipcode'] = (string)$this->clinic_zipcode;



        return $doctor_data;

    }



    public function getDoctorEntityForCreate() {

        $doctor_data = parent::getGeneralDataEntityForCreate();

        $doctor_data['Name'] = addslashes($this->Name);

        $doctor_data['Specialization'] = addslashes($this->Specialization);

        // $doctor_data['ProfessionDegree'] = addslashes($this->ProfessionDegree);

        // $doctor_data['Gender'] = (string)$this->Gender;

        // $doctor_data['HomeAddressID'] = intval($this->HomeAddressID);

        // $doctor_data['ChamberAddressID'] = intval($this->ChamberAddressID);

        // $doctor_data['PhoneNo'] = (string)$this->PhoneNo;

        // $doctor_data['MobileNo1'] = (string)$this->MobileNo1;

        // $doctor_data['MobileNo2'] = (string)$this->MobileNo2;

        // $doctor_data['MobileNo3'] = (string)$this->MobileNo3;

        // $doctor_data['Hotline'] = (string)$this->Hotline;

        $doctor_data['bio_notes'] = (string)$this->bio_notes;
        $doctor_data['PhoneNo'] = (string)$this->PhoneNo;
        $doctor_data['email_id'] = (string)$this->email_id;
        $doctor_data['clinic_phone'] = (string)$this->clinic_phone;
        $doctor_data['achievement'] = (string)$this->achievement;
        $doctor_data['experiance'] = (string)$this->experiance;
        $doctor_data['clinic_address'] = (string)$this->clinic_address;
        $doctor_data['clinic_country_id'] = (string)$this->clinic_country_id;
        $doctor_data['clinic_state_id'] = (string)$this->clinic_state_id;
        $doctor_data['clinic_city_id'] = (string)$this->clinic_city_id;
        $doctor_data['clinic_zipcode'] = (string)$this->clinic_zipcode;
        return $doctor_data;

    }



    public function getDoctorEntityForUpdate() {

        $doctor_data = parent::getGeneralDataEntityForUpdate();

        $doctor_data['Name'] = addslashes($this->Name);

        $doctor_data['Specialization'] = addslashes($this->Specialization);

        // $doctor_data['ProfessionDegree'] = addslashes($this->ProfessionDegree);

        // $doctor_data['Gender'] = (string)$this->Gender;

        // $doctor_data['HomeAddressID'] = intval($this->HomeAddressID);

        // $doctor_data['ChamberAddressID'] = intval($this->ChamberAddressID);

        // $doctor_data['PhoneNo'] = (string)$this->PhoneNo;

        // $doctor_data['MobileNo1'] = (string)$this->MobileNo1;

        // $doctor_data['MobileNo2'] = (string)$this->MobileNo2;

        // $doctor_data['MobileNo3'] = (string)$this->MobileNo3;

        // $doctor_data['Hotline'] = (string)$this->Hotline;

        $doctor_data['bio_notes'] = (string)$this->bio_notes;
        $doctor_data['PhoneNo'] = (string)$this->PhoneNo;
        $doctor_data['email_id'] = (string)$this->email_id;
        $doctor_data['clinic_phone'] = (string)$this->clinic_phone;
        $doctor_data['achievement'] = (string)$this->achievement;
        $doctor_data['experiance'] = (string)$this->experiance;
        $doctor_data['clinic_address'] = (string)$this->clinic_address;
        $doctor_data['clinic_country_id'] = (string)$this->clinic_country_id;
        $doctor_data['clinic_state_id'] = (string)$this->clinic_state_id;
        $doctor_data['clinic_city_id'] = (string)$this->clinic_city_id;
        $doctor_data['clinic_zipcode'] = (string)$this->clinic_zipcode;

        $doctor_data['LastUpdate'] = date('Y-m-d H:i:s');

        return $doctor_data;

    }

}

