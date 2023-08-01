<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/entities/GeneralDataEntity.php');

class JobInformationEntity extends GeneralDataEntity
{
    public $JobID;
    public $JobCategory;
    public $Title;
    public $Description;
    public $Organization;
    public $Position;
    public $ApplicationDeadline;
    public $Salary;
    public $EducationalRequirement;
    public $ExperienceRequirement;
    public $NumberOfVacancy;
    public $AgeLimit;
    public $Location;
    public $JobSource;
    public $JobType;
    public $EmploymentType;
    public $JobNature;
    public $ApplyingProcedure;
    public $PublishDate;

    function __construct ($data) {
        parent::__construct($data);
        if (!empty($data)) {
            $this->JobID = isset($data['ID']) ? $data['ID'] : '';
            $this->JobCategory = $data['JobCategory'];
            $this->Title = $data['Title'];
            $this->Description = $data['Description'];
            $this->Organization = $data['Organization'];
            $this->Position = $data['Position'];
            $this->ApplicationDeadline = $data['ApplicationDeadline'];
            $this->Salary = $data['Salary'];
            $this->EducationalRequirement = $data['EducationalRequirement'];
            $this->ExperienceRequirement = $data['ExperienceRequirement'];
            $this->NumberOfVacancy = $data['NumberOfVacancy'];
            $this->AgeLimit = $data['AgeLimit'];
            $this->Location = $data['Location'];
            $this->JobSource = $data['JobSource'];
            $this->JobType = $data['JobType'];
            $this->EmploymentType = $data['EmploymentType'];
            $this->JobNature = $data['JobNature'];
            $this->ApplyingProcedure = $data['ApplyingProcedure'];
            $this->PublishDate = $data['PublishDate'];
        }
    }

    public function getJobEntity() {
        $job_data = parent::getGeneralDataEntity();
        $job_data['JobID'] = intval($this->JobID);
        $job_data['JobCategory'] = intval($this->JobCategory);
        $job_data['Title'] = addslashes($this->Title);
        $job_data['Description'] = addslashes($this->Description);
        $job_data['Organization'] = addslashes($this->Organization);
        $job_data['Position'] = addslashes($this->Position);
        $job_data['ApplicationDeadline'] = (string)$this->ApplicationDeadline;
        $job_data['Salary'] = addslashes($this->Salary);
        $job_data['EducationalRequirement'] = addslashes($this->EducationalRequirement);
        $job_data['ExperienceRequirement'] = addslashes($this->ExperienceRequirement);
        $job_data['NumberOfVacancy'] = addslashes($this->NumberOfVacancy);
        $job_data['AgeLimit'] = intval($this->AgeLimit);
        $job_data['Location'] = addslashes($this->Location);
        $job_data['JobSource'] = addslashes($this->JobSource);
        $job_data['JobType'] = addslashes($this->JobType);
        $job_data['EmploymentType'] = addslashes($this->EmploymentType);
        $job_data['JobNature'] = addslashes($this->JobNature);
        $job_data['ApplyingProcedure'] = (string)$this->ApplyingProcedure;
        $job_data['PublishDate'] = (string)$this->PublishDate;

        return $job_data;
    }

    public function getJobEntityForCreate() {
        $job_data = parent::getGeneralDataEntityForCreate();
        $job_data['JobCategory'] = intval($this->JobCategory);
        $job_data['Title'] = addslashes($this->Title);
        $job_data['Description'] = addslashes($this->Description);
        $job_data['Organization'] = addslashes($this->Organization);
        $job_data['Position'] = addslashes($this->Position);
        $job_data['ApplicationDeadline'] = (string)$this->ApplicationDeadline;
        $job_data['Salary'] = addslashes($this->Salary);
        $job_data['EducationalRequirement'] = addslashes($this->EducationalRequirement);
        $job_data['ExperienceRequirement'] = addslashes($this->ExperienceRequirement);
        $job_data['NumberOfVacancy'] = addslashes($this->NumberOfVacancy);
        $job_data['AgeLimit'] = intval($this->AgeLimit);
        $job_data['Location'] = addslashes($this->Location);
        $job_data['JobSource'] = addslashes($this->JobSource);
        $job_data['JobType'] = addslashes($this->JobType);
        $job_data['EmploymentType'] = addslashes($this->EmploymentType);
        $job_data['JobNature'] = addslashes($this->JobNature);
        $job_data['ApplyingProcedure'] = (string)$this->ApplyingProcedure;
        $job_data['PublishDate'] = (string)$this->PublishDate;
        return $job_data;
    }

    public function getJobEntityForUpdate() {
        $job_data = parent::getGeneralDataEntityForUpdate();
        $job_data['JobCategory'] = intval($this->JobCategory);
        $job_data['Title'] = addslashes($this->Title);
        $job_data['Description'] = addslashes($this->Description);
        $job_data['Organization'] = addslashes($this->Organization);
        $job_data['Position'] = addslashes($this->Position);
        $job_data['ApplicationDeadline'] = (string)$this->ApplicationDeadline;
        $job_data['Salary'] = addslashes($this->Salary);
        $job_data['EducationalRequirement'] = addslashes($this->EducationalRequirement);
        $job_data['ExperienceRequirement'] = addslashes($this->ExperienceRequirement);
        $job_data['NumberOfVacancy'] = addslashes($this->NumberOfVacancy);
        $job_data['AgeLimit'] = intval($this->AgeLimit);
        $job_data['Location'] = addslashes($this->Location);
        $job_data['JobSource'] = addslashes($this->JobSource);
        $job_data['JobType'] = addslashes($this->JobType);
        $job_data['EmploymentType'] = addslashes($this->EmploymentType);
        $job_data['JobNature'] = addslashes($this->JobNature);
        $job_data['ApplyingProcedure'] = (string)$this->ApplyingProcedure;
        $job_data['PublishDate'] = (string)$this->PublishDate;
        $job_data['LastUpdate'] = date('Y-m-d H:i:s');

        return $job_data;
    }
}
