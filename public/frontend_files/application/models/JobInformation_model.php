<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */
require_once APPPATH . 'models/GeneralData_model.php';
require_once APPPATH . 'libraries/entities/JobInformationEntity.php';
class JobInformation_model extends GeneralData_model
{
    public function __construct()
    {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }
    public function getAllActiveJobInformation()
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select('j.ID, j.Title, j.Description, j.Organization, j.OrganizationLogo, j.OrganizationLogo, j.Position, j.ApplicationDeadline, j.Salary, j.EducationalRequirement, j.ExperienceRequirement, j.NumberOfVacancy, j.AgeLimit, j.Location, j.JobSource, j.JobType, j.EmploymentType, j.JobNature, j.ApplyingProcedure, j.PublishDate, j.JobCircularImagePath, DATEDIFF(CURDATE(), j.PublishDate) AS NumberOfDatePublished');
        $this->db->from('jobinformation AS j');
        $this->db->where('j.IsActive', 1);
        $this->db->where('j.JobCategory', 1);
        $this->db->where('j.PublishDate <=', date('Y-m-d'));
        $this->db->where('j.ApplicationDeadline >=', date('Y-m-d'));
        $this->db->where('j.IsDeleted', 0);
        $this->db->order_by('j.PublishDate', 'desc');
        $this->db->limit(config_item('per_page_job_information_number'));
        $result = $this->db->get()->result_array();
        $job_information1 = array();
        $total = 0;
        foreach ($result as $info) {
            $info['ApplicationDeadline'] = substr($info['ApplicationDeadline'], 0, 10);
            $info['PublishDate'] = substr($info['PublishDate'], 0, 10);
            $temp = explode('-', $info['ApplicationDeadline']);
            $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
            $info['ApplicationDeadline'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';
            $temp = explode('-', $info['PublishDate']);
            $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
            $info['PublishDate'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';
            $job_information1[$total++] = $info;
        }
        $this->db->select('j.ID');
        $this->db->from('jobinformation AS j');
        $this->db->where('j.IsActive', 1);
        $this->db->where('j.JobCategory', 1);
        $this->db->where('j.PublishDate <=', date('Y-m-d'));
        $this->db->where('j.ApplicationDeadline >=', date('Y-m-d'));
        $this->db->where('j.IsDeleted', 0);
        $result1 = $this->db->get()->result_array();
        $this->db->select('j.ID, j.Title, j.Description, j.Organization, j.OrganizationLogo, j.OrganizationLogo, j.Position, j.ApplicationDeadline, j.Salary, j.EducationalRequirement, j.ExperienceRequirement, j.NumberOfVacancy, j.AgeLimit, j.Location, j.JobSource, j.JobType, j.EmploymentType, j.JobNature, j.ApplyingProcedure, j.PublishDate, j.JobCircularImagePath, DATEDIFF(CURDATE(), j.PublishDate) AS NumberOfDatePublished');
        $this->db->from('jobinformation AS j');
        $this->db->where('j.IsActive', 1);
        $this->db->where('j.JobCategory', 2);
        $this->db->where('j.PublishDate <=', date('Y-m-d'));
        $this->db->where('j.ApplicationDeadline >=', date('Y-m-d'));
        $this->db->where('j.IsDeleted', 0);
        $this->db->order_by('j.PublishDate', 'desc');
        $this->db->limit(config_item('per_page_job_information_number'));
        $result = $this->db->get()->result_array();
        $job_information2 = array();
        $total = 0;
        foreach ($result as $info) {
            $info['ApplicationDeadline'] = substr($info['ApplicationDeadline'], 0, 10);
            $info['PublishDate'] = substr($info['PublishDate'], 0, 10);
            $temp = explode('-', $info['ApplicationDeadline']);
            $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
            $info['ApplicationDeadline'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';
            $temp = explode('-', $info['PublishDate']);
            $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
            $info['PublishDate'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';
            $job_information2[$total++] = $info;
        }
        $this->db->select('j.ID');
        $this->db->from('jobinformation AS j');
        $this->db->where('j.IsActive', 1);
        $this->db->where('j.JobCategory', 2);
        $this->db->where('j.PublishDate <=', date('Y-m-d'));
        $this->db->where('j.ApplicationDeadline >=', date('Y-m-d'));
        $this->db->where('j.IsDeleted', 0);
        $result2 = $this->db->get()->result_array();
        //        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return array($job_information1, count($result1), $job_information2, count($result2));
    }
    public function getSimilarActiveJobInformation()
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $job_id = $this->input->get('JobID');
        $this->db->select('j.ID, j.Title, j.Description, j.Organization, j.OrganizationLogo, j.OrganizationLogo, j.Position, j.ApplicationDeadline, j.Salary, j.EducationalRequirement, j.ExperienceRequirement, j.NumberOfVacancy, j.AgeLimit, j.Location, j.JobSource, j.JobType, j.EmploymentType, j.JobNature, j.ApplyingProcedure, j.PublishDate, j.JobCircularImagePath, DATEDIFF(CURDATE(), j.PublishDate) AS NumberOfDatePublished');
        $this->db->from('jobinformation AS j');
        $this->db->join('jobinformation AS sj', 'j.JobCategory = sj.JobCategory AND j.Position = sj.Position AND sj.ID = ' . $job_id . ' AND j.ID <> ' . $job_id, 'inner');
        $this->db->where('j.IsActive', 1);
        $this->db->where('j.IsDeleted', 0);
        $this->db->where('j.PublishDate <=', date('Y-m-d'));
        $this->db->where('j.ApplicationDeadline >=', date('Y-m-d'));
        $this->db->where('sj.IsActive', 1);
        $this->db->where('sj.IsDeleted', 0);
        $this->db->where('sj.PublishDate <=', date('Y-m-d'));
        $this->db->where('sj.ApplicationDeadline >=', date('Y-m-d'));
        $this->db->order_by('j.PublishDate', 'desc');
        $this->db->limit(config_item('per_page_job_information_number'));
        $result = $this->db->get()->result_array();
        $job_information = array();
        $total = 0;
        foreach ($result as $info) {
            $info['ApplicationDeadline'] = substr($info['ApplicationDeadline'], 0, 10);
            $info['PublishDate'] = substr($info['PublishDate'], 0, 10);
            $temp = explode('-', $info['ApplicationDeadline']);
            $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
            $info['ApplicationDeadline'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';
            $temp = explode('-', $info['PublishDate']);
            $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
            $info['PublishDate'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';
            $job_information[$total++] = $info;
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $job_information;
    }
    public function getJobInformationForFrontend()
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $job_category = $this->input->get('JobCategory');
        $page_no = $this->input->get('PageNo');
        $page_no = empty($page_no) ? 1 : $page_no;
        $this->db->select('j.ID, j.Title, j.Description, j.Organization, j.OrganizationLogo, j.Position, j.ApplicationDeadline, j.Salary, j.EducationalRequirement, j.ExperienceRequirement, j.NumberOfVacancy, j.AgeLimit, j.Location, j.JobSource, j.JobType, j.EmploymentType, j.JobNature, j.ApplyingProcedure, j.PublishDate, j.JobCircularImagePath');
        $this->db->from('jobinformation AS j');
        $this->db->where('j.IsActive', 1);
        $this->db->where('j.PublishDate <=', date('Y-m-d'));
        $this->db->where('j.ApplicationDeadline >=', date('Y-m-d'));
        $this->db->where('j.JobCategory', $job_category, false);
        $this->db->where('j.IsDeleted', 0);
        $this->db->order_by('j.PublishDate', 'desc');
        $this->db->limit(config_item('per_page_job_information_number'), ($page_no - 1) * config_item('per_page_job_information_number'));
        $result = $this->db->get()->result_array();
        $job_information = array();
        $total = 0;
        foreach ($result as $info) {
            $info['ApplicationDeadline'] = substr($info['ApplicationDeadline'], 0, 10);
            $info['PublishDate'] = substr($info['PublishDate'], 0, 10);
            $temp = explode('-', $info['ApplicationDeadline']);
            $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
            $info['ApplicationDeadline'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';
            $temp = explode('-', $info['PublishDate']);
            $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
            $info['PublishDate'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';
            $job_information[$total++] = $info;
        }
        //        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $job_information;
    }
    public function createJobInformation($userID)
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->require_fields = array('Title', 'Description', 'Organization', 'Position', 'ApplicationDeadline', 'PublishDate');
        $this->request_type = 'post';
        $check_require_field_erro = parent::create();
        if ($check_require_field_erro != NO_ERROR)
            return $this->prepareErrorResponse($check_require_field_erro);
        $data = array();
        $data['JobCategory'] = $this->input->post('JobCategory');
        $data['Title'] = $this->input->post('Title');
        $data['Description'] = $this->input->post('Description');
        $data['Organization'] = $this->input->post('Organization');
        $data['Position'] = $this->input->post('Position');
        $data['ApplicationDeadline'] = $this->input->post('ApplicationDeadline');
        $data['Salary'] = $this->input->post('Salary');
        $data['EducationalRequirement'] = $this->input->post('EducationalRequirement');
        $data['ExperienceRequirement'] = $this->input->post('ExperienceRequirement');
        $data['NumberOfVacancy'] = $this->input->post('NumberOfVacancy');
        $data['AgeLimit'] = $this->input->post('AgeLimit');
        $data['Location'] = $this->input->post('Location');
        $data['JobSource'] = $this->input->post('JobSource');
        $data['JobType'] = $this->input->post('JobType');
        $data['EmploymentType'] = $this->input->post('EmploymentType');
        $data['JobNature'] = $this->input->post('JobNature');
        $data['ApplicationDeadline'] = $this->input->post('ApplicationDeadline');
        $data['PublishDate'] = $this->input->post('PublishDate');
        $data['ApplyingProcedure'] = $this->input->post('ApplyingProcedure');
        $data['CreatedBy'] = $userID;
        $job_information_entity = new JobInformationEntity($data);
        $job_information_data = $job_information_entity->getJobEntityForCreate();
        $job_information_data['IsActive'] = $this->input->post('IsActive');
        if (empty($job_information_data)) {
            return $this->prepareErrorResponse(ERROR_INVALID_EMAIL_ID);
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Job Data: ' . print_r($data, true));
        if ($this->db->insert('jobinformation', $job_information_data)) {
            $job_id = $this->db->insert_id();
            if (isset($_FILES["OrganizationLogo"]) && $_FILES["OrganizationLogo"]['tmp_name']) {
                $upload_data = $this->util->upload('JobImages', 'OrganizationLogo');
                if ($upload_data) {
                    $data = array();
                    $data['OrganizationLogo'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $job_id);
                    if ($this->db->update('jobinformation')) {
                        $this->load->model('Email_model');
                        $this->Email_model->sendJobCircularEmail($job_id);
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteJob($job_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteJob($job_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
            if (isset($_FILES["JobCircularImagePath"]) && $_FILES["JobCircularImagePath"]['tmp_name']) {
                $upload_data = $this->util->upload('JobImages', 'JobCircularImagePath');
                if ($upload_data) {
                    $data = array();
                    $data['JobCircularImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $job_id);
                    if ($this->db->update('jobinformation')) {
                        $this->load->model('Email_model');
                        $this->Email_model->sendJobCircularEmail($job_id);
                        $this->load->model('Email_model');
                        $this->Email_model->sendJobCircularEmail($job_id);
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteJob($job_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteJob($job_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
            $this->load->model('Email_model');
            $this->Email_model->sendJobCircularEmail($job_id);
            return $this->prepareErrorResponse(NO_ERROR);
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
    }
    public function getAllJobInformation()
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select('j.ID, j.JobCategory, j.Title, j.Description, j.Organization, j.OrganizationLogo, j.Position, j.ApplicationDeadline, j.Salary, j.EducationalRequirement, j.ExperienceRequirement, j.NumberOfVacancy, j.AgeLimit, j.Location, j.JobSource, j.JobType, j.EmploymentType, j.JobNature, j.ApplyingProcedure, j.PublishDate, j.JobCircularImagePath');
        $this->db->from('jobinformation AS j');
        //$this->db->where('j.IsDeleted', 0);
        $result = $this->db->get()->result_array();
        $job_information = array();
        $total = 0;
        foreach ($result as $info) {
            $info['ApplicationDeadline'] = substr($info['ApplicationDeadline'], 0, 10);
            $info['PublishDate'] = substr($info['PublishDate'], 0, 10);
            $job_information[$total++] = $info;
        }
        //        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $job_information;
    }
    /////////////////////////////////////////////
    public function getAllhomepharmajob()
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select('j.ID, j.JobCategory, j.Title, j.Description, j.Organization, j.OrganizationLogo, j.Position, j.ApplicationDeadline, j.Salary, j.EducationalRequirement, j.ExperienceRequirement, j.NumberOfVacancy, j.AgeLimit, j.Location, j.JobSource, j.JobType, j.EmploymentType, j.JobNature, j.ApplyingProcedure, j.PublishDate, j.JobCircularImagePath');
        $this->db->from('jobinformation AS j');
        $this->db->where('j.IsDeleted', 0);
        $this->db->where('j.IsActive', 1);
        $this->db->where('j.PublishDate <=', date('Y-m-d'));
        $this->db->where('j.ApplicationDeadline >=', date('Y-m-d'));
        $this->db->where('j.JobCategory', 1);
        $this->db->limit(5);
        $result = $this->db->get()->result_array();
        $job_information = array();
        $total = 0;
        foreach ($result as $info) {
            $info['ApplicationDeadline'] = substr($info['ApplicationDeadline'], 0, 10);
            $info['PublishDate'] = substr($info['PublishDate'], 0, 10);
            $job_information[$total++] = $info;
        }
        //        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $job_information;
    }
    public function getAllhomemedicaljob()
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select('j.ID, j.JobCategory, j.Title, j.Description, j.Organization, j.OrganizationLogo, j.Position, j.ApplicationDeadline, j.Salary, j.EducationalRequirement, j.ExperienceRequirement, j.NumberOfVacancy, j.AgeLimit, j.Location, j.JobSource, j.JobType, j.EmploymentType, j.JobNature, j.ApplyingProcedure, j.PublishDate, j.JobCircularImagePath');
        $this->db->from('jobinformation AS j');
        $this->db->where('j.IsDeleted', 0);
        $this->db->where('j.IsActive', 1);
        $this->db->where('j.PublishDate <=', date('Y-m-d'));
        $this->db->where('j.ApplicationDeadline >=', date('Y-m-d'));
        $this->db->where('j.JobCategory', 2);
        $this->db->limit(5);
        $result = $this->db->get()->result_array();
        $job_information = array();
        $total = 0;
        foreach ($result as $info) {
            $info['ApplicationDeadline'] = substr($info['ApplicationDeadline'], 0, 10);
            $info['PublishDate'] = substr($info['PublishDate'], 0, 10);
            $job_information[$total++] = $info;
        }
        //        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $job_information;
    }
    ///////////////////////////
    public function getJobDetailInformation()
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $job_id = $this->input->get('JobID');
        if ($job_id) {
            $this->db->select('j.ID, j.JobCategory, j.Title, j.Description, j.Organization, j.OrganizationLogo, j.Position, j.ApplicationDeadline, j.Salary, j.EducationalRequirement, j.ExperienceRequirement, j.NumberOfVacancy, j.AgeLimit, j.Location, j.JobSource, j.JobType, j.EmploymentType, j.JobNature, j.ApplyingProcedure, j.PublishDate, j.JobCircularImagePath, DATEDIFF(CURDATE(), j.PublishDate) AS NumberOfDatePublished');
            $this->db->from('jobinformation AS j');
            $this->db->where('j.ID', $job_id);
            $this->db->where('j.IsDeleted', 0);
            $this->db->limit(1);
            $job_information = $this->db->get()->result_array();
            if (isset($job_information[0]['ID'])) {
                $job_information[0]['ApplicationDeadline'] = substr($job_information[0]['ApplicationDeadline'], 0, 10);
                $job_information[0]['ApplicationDeadline'] = str_replace('-', '/', $job_information[0]['ApplicationDeadline']);
                $job_information[0]['PublishDate'] = substr($job_information[0]['PublishDate'], 0, 10);
                $job_information[0]['PublishDate'] = str_replace('-', '/', $job_information[0]['PublishDate']);
                return $job_information[0];
            }
            return array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
    }
    public function getJobDetail()
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $job_id = $this->input->get('JobID');
        if ($job_id) {
            $this->db->select('j.ID, j.JobCategory, j.Title, j.Description, j.Organization, j.OrganizationLogo, j.Position, j.ApplicationDeadline, j.Salary, j.EducationalRequirement, j.ExperienceRequirement, j.NumberOfVacancy, j.AgeLimit, j.Location, j.JobSource, j.JobType, j.EmploymentType, j.JobNature, j.ApplyingProcedure, j.PublishDate, j.JobCircularImagePath, DATEDIFF(CURDATE(), j.PublishDate) AS NumberOfDatePublished');
            $this->db->from('jobinformation AS j');
            $this->db->where('j.ID', $job_id);
            $this->db->where('j.IsDeleted', 0);
            $this->db->limit(1);
            $job_information = $this->db->get()->result_array();
            if (isset($job_information[0]['ID'])) {
                $job_information[0]['ApplicationDeadline'] = substr($job_information[0]['ApplicationDeadline'], 0, 10);
                $job_information[0]['PublishDate'] = substr($job_information[0]['PublishDate'], 0, 10);
                $temp = explode('-', $job_information[0]['ApplicationDeadline']);
                $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
                $job_information[0]['ApplicationDeadline'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';
                $temp = explode('-', $job_information[0]['PublishDate']);
                $mktime_value = mktime(0, 0, 0, $temp[1], $temp[2], $temp[0]);
                $job_information[0]['PublishDate'] = count($temp) == 3 ? date("dS F Y", $mktime_value) : '';
                return $job_information[0];
            }
            return array();
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return $this->prepareErrorResponse(ERROR_INVALID_REQUEST);
    }
    public function updateJobInformation($userID)
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $job_id = $this->input->get('JobID');
        if (empty($job_id)) {
            return false;
        }
        $data = array();
        $data['JobCategory'] = $this->input->post('JobCategory');
        $data['Title'] = $this->input->post('Title');
        $data['Description'] = $this->input->post('Description');
        $data['Organization'] = $this->input->post('Organization');
        $data['Position'] = $this->input->post('Position');
        $data['ApplicationDeadline'] = $this->input->post('ApplicationDeadline');
        $data['Salary'] = $this->input->post('Salary');
        $data['EducationalRequirement'] = $this->input->post('EducationalRequirement');
        $data['ExperienceRequirement'] = $this->input->post('ExperienceRequirement');
        $data['NumberOfVacancy'] = $this->input->post('NumberOfVacancy');
        $data['AgeLimit'] = $this->input->post('AgeLimit');
        $data['Location'] = $this->input->post('Location');
        $data['JobSource'] = $this->input->post('JobSource');
        $data['JobType'] = $this->input->post('JobType');
        $data['EmploymentType'] = $this->input->post('EmploymentType');
        $data['JobNature'] = $this->input->post('JobNature');
        $data['ApplicationDeadline'] = $this->input->post('ApplicationDeadline');
        $data['PublishDate'] = $this->input->post('PublishDate');
        $data['ApplyingProcedure'] = $this->input->post('ApplyingProcedure');
        $data['CreatedBy'] = $userID;
        $require_fields = array('Title', 'Description', 'Organization', 'Position', 'ApplicationDeadline', 'PublishDate');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) {
            return $this->prepareErrorResponse($check_require_field_erro);
        }
        $job_information_entity = new JobInformationEntity($data);
        $job_information_data = $job_information_entity->getJobEntityForUpdate();
        $job_information_data['IsActive'] = $this->input->post('IsActive');
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        $this->db->set($job_information_data);
        $this->db->where('ID', $job_id);
        if ($this->db->update('jobinformation')) {
            if (isset($_FILES["OrganizationLogo"]) && $_FILES["OrganizationLogo"]['tmp_name']) {
                $upload_data = $this->util->upload('JobImages', 'OrganizationLogo');
                if ($upload_data) {
                    $data = array();
                    $data['OrganizationLogo'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $job_id);
                    if ($this->db->update('jobinformation')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteJob($job_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteJob($job_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
            if (isset($_FILES["JobCircularImagePath"]) && $_FILES["JobCircularImagePath"]['tmp_name']) {
                $upload_data = $this->util->upload('JobImages', 'JobCircularImagePath');
                if ($upload_data) {
                    $data = array();
                    $data['JobCircularImagePath'] = $upload_data['file_name'];
                    $this->db->set($data);
                    $this->db->where('ID', $job_id);
                    if ($this->db->update('jobinformation')) {
                        return $this->prepareErrorResponse(NO_ERROR);
                    } else {
                        $this->deleteJob($job_id);
                        return $this->prepareErrorResponse(ERROR_UNKNOWN);
                    }
                } else {
                    $this->deleteJob($job_id);
                    return $this->prepareErrorResponse(ERROR_UNKNOWN);
                }
            }
        } else {
            return $this->prepareErrorResponse(ERROR_UNKNOWN);
        }
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
    }
    public function deleteJob()
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $id = $this->input->get('JobID');
        $data = array();
        $data['IsActive'] = 0;
        $data['IsDeleted'] = 1;
        $data['LastUpdate'] = date('Y-m-d H:i:s');
        $this->db->set($data);
        $this->db->where('ID', $id);
        $return = $this->db->update('jobinformation');
        return $return;
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
    }
    public function getJobInformationForSidebar()
    {
        log_message('debug', __METHOD__ . ' Method Start with Arguments: ' . print_r(func_get_args(), true));
        $this->db->select('ID');
        $this->db->select('Title');
        $this->db->select('Organization');
        $this->db->select('OrganizationLogo');
        $this->db->select('DATEDIFF(CURDATE(), PublishDate) AS NumberOfDatePublished');
        $this->db->from('jobinformation');
        $this->db->where('IsActive', 1);
        $this->db->where('JobCategory', 1);
        $this->db->where('PublishDate <=', date('Y-m-d'));
        $this->db->where('ApplicationDeadline >=', date('Y-m-d'));
        $this->db->where('IsDeleted', 0);
        $this->db->order_by('PublishDate', 'desc');
        $this->db->limit(config_item('side_bar_link_limit'));
        $result1 = $this->db->get()->result_array();
        $this->db->select('ID');
        $this->db->select('Title');
        $this->db->select('Organization');
        $this->db->select('OrganizationLogo');
        $this->db->select('DATEDIFF(CURDATE(), PublishDate) AS NumberOfDatePublished');
        $this->db->from('jobinformation');
        $this->db->where('IsActive', 1);
        $this->db->where('JobCategory', 2);
        $this->db->where('PublishDate <=', date('Y-m-d'));
        $this->db->where('ApplicationDeadline >=', date('Y-m-d'));
        $this->db->where('IsDeleted', 0);
        $this->db->order_by('PublishDate', 'desc');
        $this->db->limit(config_item('side_bar_link_limit'));
        $result2 = $this->db->get()->result_array();
        //        echo $this->db->last_query();
        log_message('debug', __METHOD__ . '#' . __LINE__ . ' Method End.');
        return array($result1, $result2);
    }
}