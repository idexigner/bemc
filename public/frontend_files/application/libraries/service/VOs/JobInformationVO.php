<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JobInformationVO
{
    public function getJobInformationVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['Title'] = addslashes($data['Title']);
        $vo['Description'] = addslashes($data['Description']);
        $vo['Organization'] = addslashes($data['Organization']);
        $vo['OrganizationLogo'] = addslashes($data['OrganizationLogo']);
        $vo['Position'] = addslashes($data['Position']);
        $vo['ApplicationDeadline'] = (string)$data['ApplicationDeadline'];
        $vo['Salary'] = intval($data['Salary']);
        $vo['EducationalRequirement'] = addslashes($data['EducationalRequirement']);
        $vo['ExperienceRequirement'] = addslashes($data['ExperienceRequirement']);
        $vo['NumberOfVacancy'] = intval($data['NumberOfVacancy']);
        $vo['AgeLimit'] = intval($data['AgeLimit']);
        $vo['Location'] = addslashes($data['Location']);
        $vo['JobSource'] = addslashes($data['JobSource']);
        $vo['JobType'] = addslashes($data['JobType']);
        $vo['EmploymentType'] = addslashes($data['EmploymentType']);
        $vo['JobNature'] = addslashes($data['JobNature']);
        $vo['ApplicationDeadline'] = (string)$data['ApplicationDeadline'];
        $vo['PublishDate'] = (string)$data['PublishDate'];
        $vo['JobCircularImagePath'] = $data['JobCircularImagePath'];
        return $vo;
    }
}