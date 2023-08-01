<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JobInformationVO
{
    public function getJobInformationVO (JobInformationEntity $jobInformationEntity){
        $vo = array();
        $vo['JobID'] = intval($jobInformationEntity->JobID);
        $vo['JobCategory'] = intval($jobInformationEntity->JobCategory);
        $vo['Title'] = addslashes($jobInformationEntity->Title);
        $vo['Description'] = addslashes($jobInformationEntity->Description);
        $vo['Organization'] = addslashes($jobInformationEntity->Organization);
        $vo['OrganizationLogo'] = addslashes($jobInformationEntity->OrganizationLogo);
        $vo['Position'] = addslashes($jobInformationEntity->Position);
        $vo['ApplicationDeadline'] = (string)$jobInformationEntity->ApplicationDeadline;
        $vo['Salary'] = addslashes($jobInformationEntity->Salary);
        $vo['EducationalRequirement'] = addslashes($jobInformationEntity->EducationalRequirement);
        $vo['ExperienceRequirement'] = addslashes($jobInformationEntity->ExperienceRequirement);
        $vo['NumberOfVacancy'] = addslashes($jobInformationEntity->NumberOfVacancy);
        $vo['AgeLimit'] = intval($jobInformationEntity->AgeLimit);
        $vo['Location'] = addslashes($jobInformationEntity->Location);
        $vo['JobSource'] = addslashes($jobInformationEntity->JobSource);
        $vo['JobType'] = addslashes($jobInformationEntity->JobType);
        $vo['EmploymentType'] = addslashes($jobInformationEntity->EmploymentType);
        $vo['JobNature'] = addslashes($jobInformationEntity->JobNature);
        $vo['ApplicationDeadline'] = (string)$jobInformationEntity->ApplicationDeadline;
        $vo['PublishDate'] = (string)$jobInformationEntity->PublishDate;
        $vo['JobCircularImagePath'] = addslashes($jobInformationEntity->JobCircularImagePath);
        return $vo;
    }
}