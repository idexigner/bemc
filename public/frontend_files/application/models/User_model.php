<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */

require_once APPPATH.'models/GeneralData_model.php';
require_once APPPATH.'libraries/entities/UserEntity.php';
require_once APPPATH.'libraries/VOs/UserVO.php';

class User_model extends GeneralData_model {
    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function userLogin($user_name, $user_pass) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $user_id = '';
        $role_id = '';

        $this->db->select('ID, RoleID');
        $this->db->get('userinformation');
        if (strpos($user_name, '@')) {
            $this->db->where('EmailID', $user_name);
        } else {
            $this->db->where('UserName', $user_name);
        }
        $this->db->where('UserPass', md5($user_pass));
        $this->db->where('IsActive', 1);
        $this->db->limit(1);
        $query = $this->db->get();
//        log_message('debug', __METHOD__.'#'.__LINE__.'SQL statement: '.$this->db->last_query());
        foreach ($query->result() as $row) {
            $user_id = $row->ID;
            $role_id = $row->RoleID;
        }

        return array($user_id, $role_id);
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function createUser() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->require_fields = array('UserName', 'EmailID', 'UserPass', 'RoleID');
        $this->request_type = 'post';
        $check_require_field_erro = parent::create();
        if ($check_require_field_erro != NO_ERROR) return $check_require_field_erro;

        $data = array();
        $data['UserName'] = $this->input->post('UserName');
        $data['EmailID'] = strtolower($this->input->post('EmailID'));
        $data['UserPass'] = $this->input->post('UserPass');
        $data['FirstName'] = $this->input->post('FirstName');
        $data['LastName'] = $this->input->post('LastName');
        $data['RoleID'] = $this->input->post('RoleID');

        $check_email_id = $this->checkEmailID($data['EmailID']);
        if ($check_email_id != NO_ERROR) {
            return $check_email_id;
        }

        $user_entity = new UserEntity($data);

        $user_data = $user_entity->getUserEntityForCreate();

        if (empty($user_data)) {
            return ERROR_INVALID_EMAIL_ID;
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        if($this->db->insert('userinformation', $user_data)) {
            return NO_ERROR;
        } else {
            return ERROR_UNKNOWN;
        }
    }

    public function changePassword() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $user_id = $this->input->get('UserID');
        $user_pass = $this->input->get('UserPass');
        if (!empty($user_id) && !empty($user_pass)) {
            $check_email_id = $this->checkEmailID($user_pass);
            if ($check_email_id != NO_ERROR) {
                return $check_email_id;
            }

            $this->db->set('UserPass', md5($user_pass));
            $this->db->where('ID', $user_id);
            if ($this->db->update('userinformation')) {
                return NO_ERROR;
            } else {
                return ERROR_UNKNOWN;
            }
        }

        return ERROR_INVALID_REQUEST;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function getUserDetail() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $user_id = $this->input->get('UserID');
        if ($user_id) {
            $user_detail = parent::getDetail('user', $user_id);
            if (empty($user_detail)) {
                return ERROR_INVALID_REQUEST;
            }

            $user_entity = new UserEntity($user_detail);
            return $user_entity->getUserEntity();
        }

        return ERROR_INVALID_REQUEST;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function getAllUserDetail() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $all_information = parent::getAllActiveInformation();
        $all_user_information = array();
        $total = 0;
        foreach ($all_information AS $information) {
            $user_entity = new UserEntity($information);
            $all_user_information[$total++] = $user_entity->getUserEntity();
        }

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return $all_user_information;
    }

    public function getLoggedInUser() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
        $user_role = isset($_SESSION['user_role_id']) ? $_SESSION['user_role_id'] : '';
        $user_pass = isset($_SESSION['user_pass']) ? $_SESSION['user_pass'] : '';
        $user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';
        if ($user_id) {
            $array = array(
                'user_id' => $user_id,
                'user_email' => $user_email,
                'user_pass' => $user_pass,
                'user_role_id' => $user_role
            );
            $this->session->set_tempdata($array, NULL, config_item('session_expiry_time'));
        }
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return array($user_id, $user_role);
    }

    private function isValidEmailForRegister($email_id) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('ID');
        $this->db->from('userinformation');
        $this->db->where('EmailID', $email_id);
        $this->db->where('IsActive', 1);
        $this->db->limit(1);
        $user_detail = $this->db->get()->row();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return empty($user_detail) ? true : false;
    }

    private function isValidUserNameForRegister($user_name) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('ID');
        $this->db->from('userinformation');
        $this->db->where('UserName', $user_name);
        $this->db->where('IsActive', 1);
        $this->db->limit(1);
        $user_detail = $this->db->get()->row();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return empty($user_detail) ? true : false;
    }

    public function isValidUserNameForUpdate($userID, $user_name) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('ID');
        $this->db->from('userinformation');
        $this->db->where('ID !=', $userID);
        $this->db->where('UserName', $user_name);
        $this->db->where('IsActive', 1);
        $this->db->limit(1);
        $user_detail = $this->db->get()->row();

        return empty($user_detail) ? true : false;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function isValidEmailForUpdate($userID, $email) {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->select('ID');
        $this->db->from('userinformation');
        $this->db->where('ID !=', $userID);
        $this->db->where('EmailID', $email);
        $this->db->where('IsActive', 1);
        $this->db->limit(1);
        $user_detail = $this->db->get()->row();

        return empty($user_detail) ? true : false;
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }

    public function updateUserInformation() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $user_id = $this->input->get('UserID');
        if (empty($user_id)) {
            return false;
        }

        $data = array();
        $data['UserName'] = $this->input->post('UserName');
        $data['EmailID'] = strtolower($this->input->post('EmailID'));
        $data['FirstName'] = $this->input->post('FirstName');
        $data['LastName'] = $this->input->post('LastName');
        $data['RoleID'] = $this->input->post('RoleID');

        $require_fields = array('UserName', 'EmailID', 'RoleID');
        $check_require_field_erro = $this->checkRequireFilds($require_fields, 'post');
        if ($check_require_field_erro != NO_ERROR) {
            return $check_require_field_erro;
        }

        $check_email_id = $this->checkEmailID($data['EmailID']);
        if ($check_email_id != NO_ERROR) {
            return $check_email_id;
        }

        $user_entity = new UserEntity($data);

        $user_data = $user_entity->getUserEntityForUpdate();

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');

        $this->db->set($user_data);
        $this->db->where('ID', $user_id);
        if($this->db->update('userinformation')) {
            return NO_ERROR;
        } else {
            return ERROR_UNKNOWN;
        }

        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
        return false;
    }

    public function deleteUserInformation() {
        return parent::deleteInformation('user');
    }

    public function getUserInformation() {
        log_message('info', __METHOD__.' Method Start at: '.date("Y-m-d H:i:s").' with Arguments: '.print_r(func_get_args(), true));
        $user_id = $this->input->get('UserID');
        $user_pass = $this->input->get('UserPass');
        $this->db->select('u.ID, u.UserName, u.EmailID, u.UserPass, u.RoleID');
        $this->db->from('userinformation as u');
        if (strpos($user_id, '@')) {
            $this->db->where('EmailID', strtolower($user_id));
        } else {
            $this->db->where('UserName', $user_id);
        }
        $this->db->where('u.UserPass', md5($user_pass));
        $this->db->where('u.IsActive', 1, false);
        $user_info = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('info', __METHOD__.'#'.__LINE__.' Method End at: '.date("Y-m-d H:i:s"));
        return isset($user_info[0]['ID']) ? $user_info[0] : array();
    }

    public function incrementVisitorCount() {
        log_message('info', __METHOD__.' Method Start at: '.date("Y-m-d H:i:s").' with Arguments: '.print_r(func_get_args(), true));
        $this->db->set('NumberOfVisitor', 'NumberOfVisitor + 1', FALSE);
        $this->db->limit(1);
        log_message('info', __METHOD__.'#'.__LINE__.' Method End at: '.date("Y-m-d H:i:s"));
        return $this->db->update('visitor');
    }

    public function getNumberOfVisitor() {
        $this->db->select('NumberOfVisitor');
        $this->db->from('visitor');
        $this->db->limit(1);
        $user_info = $this->db->get()->result_array();
//        echo $this->db->last_query();
        log_message('info', __METHOD__.'#'.__LINE__.' Method End at: '.date("Y-m-d H:i:s"));
        return isset($user_info[0]['NumberOfVisitor']) ? $user_info[0]['NumberOfVisitor'] : 0;
    }

    public function unsubscribeNotification($unsubscribeLink) {
        log_message('info', __METHOD__.' Method Start at: '.date("Y-m-d H:i:s").' with Arguments: '.print_r(func_get_args(), true));
        $unsubscribe_info = $this->openssl->decryptValue(str_replace(' ','+', $unsubscribeLink));
        if (empty($unsubscribe_info)) return false;

        $temp = explode('&', $unsubscribe_info);
        if (count($temp) != 2) return false;

        $part1 = explode('=', $temp[0]);
        $part2 = explode('=', $temp[1]);
        $user_id = $part1[1];
        $from = $part2[1];

        $data = array();

        switch ($from) {
            case 'Job':
                $data['JobCircular'] = 0;
                break;
            case 'Product':
                $data['NewProduct'] = 0;
                break;
            case 'Brand':
                $data['NewBrand'] = 0;
                break;
            case 'Presentation':
                $data['NewPresentation'] = 0;
                break;
            case 'Doctor':
                $data['NewDoctor'] = 0;
                break;
            default:
                break;
        }

        if (empty($data)) return false;

        $this->db->set($data);
        $this->db->where('UserID', $user_id);
        $can_update = $this->db->update('user_notification_subscription');

        log_message('info', __METHOD__.'#'.__LINE__.' Method End at: '.date("Y-m-d H:i:s"));
        return $can_update;
    }

    public function registerUser() {
        $response = array(
            'error' => '',
            'result' => false
        );

        $user_data = array();
        $user_data['Title'] = $this->input->post('Title');
        if (strcmp($user_data['Title'], 'Other') == 0) {
            $user_data['Title'] = $this->input->post('OtherTitle');
        }
        $user_data['FirstName'] = $this->input->post('FirstName');
        $user_data['LastName'] = $this->input->post('LastName');
        $user_data['UserName'] = $this->input->post('UserName');
        $user_data['EmailID'] = strtolower($this->input->post('EmailID'));
        $user_data['UserPass'] = md5($this->input->post('UserPass'));
        $user_data['Profession'] = $this->input->post('Profession');
        $user_data['Organisation'] = $this->input->post('Organisation');
        $user_data['CountryID'] = $this->input->post('CountryID');
        $user_data['State'] = $this->input->post('State');
        $user_data['City'] = $this->input->post('City');
        $user_data['ZipCode'] = $this->input->post('ZipCode');
        $user_data['Address'] = $this->input->post('Address');
        $user_data['Telephone'] = $this->input->post('Telephone');
        $user_data['Fax'] = $this->input->post('Fax');

        if(!$this->isValidUserNameForRegister($user_data['UserName'])) {
            $response['error'] = $this->prepareErrorResponse(ERROR_INVALID_USER_NAME_FOR_REGISTRATION);
            return $response;
        }

        if(!$this->isValidEmailForRegister($user_data['EmailID'])) {
            $response['error'] = $this->prepareErrorResponse(ERROR_INVALID_EMAIL_FOR_REGISTRATION);
            return $response;
        }

        $success = $this->db->insert('userinformation', $user_data);
        if ($success) {
            $user_id = $this->db->insert_id();
            $data = array();
            $data['UserID'] = $user_id;
            $this->db->insert('user_notification_subscription', $data);

            $response['result'] = 1;
            $array = array(
                'user_id' => $user_id,
                'user_name' => $user_data['UserName'],
                'user_email' => $user_data['UserName'],
                'user_pass' => $user_data['UserPass'],
                'user_role_id' => 3
            );

            $expire_time = config_item('session_expiry_time');
            $this->session->set_tempdata($array, NULL, $expire_time);
        } else {
            $response['error'] = $this->prepareErrorResponse(ERROR_UNKNOWN);
        }

        return $response;
    }

    public function getLoggedInUserDetail() {
        log_message('info', __METHOD__.' Method Start at: '.date("Y-m-d H:i:s").' with Arguments: '.print_r(func_get_args(), true));
        list($user_id, $user_role) = $this->getLoggedInUser();
        if ($user_id) {
            $this->db->select('u.ID, u.UserName, u.EmailID, u.UserPass, u.RoleID, u.Title, u.FirstName, u.LastName, u.Profession, u.Organisation, u.CountryID, u.State, u.City, u.ZipCode, u.Address, u.Telephone, u.Fax');
            $this->db->from('userinformation as u');
            $this->db->where('u.ID', $user_id, false);
            $this->db->where('u.IsActive', 1, false);
            $this->db->limit(1);
            $user_info = $this->db->get()->result_array();
            log_message('debug', __METHOD__.'#'.__LINE__.'User Detail: '. print_r($user_info[0], true));
            log_message('info', __METHOD__.'#'.__LINE__.' Method End at: '.date("Y-m-d H:i:s"));
            return isset($user_info[0]['ID']) ? $user_info[0] : array();
        }

        return array();
    }

    public function updateProfile() {
        $response = array(
            'error' => '',
            'result' => false
        );

        list($user_id, $user_role) = $this->getLoggedInUser();

        $user_data = array();
        $user_data['Title'] = $this->input->post('Title');
        if (strcmp($user_data['Title'], 'Other') == 0) {
            $user_data['Title'] = $this->input->post('OtherTitle');
        }
        $user_data['FirstName'] = $this->input->post('FirstName');
        $user_data['LastName'] = $this->input->post('LastName');
        $user_data['UserName'] = $this->input->post('UserName');
        $user_data['EmailID'] = strtolower($this->input->post('EmailID'));
        //$user_data['UserPass'] = $this->input->post('UserPass');
        $user_data['Profession'] = $this->input->post('Profession');
        $user_data['Organisation'] = $this->input->post('Organisation');
        $user_data['CountryID'] = $this->input->post('CountryID');
        $user_data['State'] = $this->input->post('State');
        $user_data['City'] = $this->input->post('City');
        $user_data['ZipCode'] = $this->input->post('ZipCode');
        $user_data['Address'] = $this->input->post('Address');
        $user_data['Telephone'] = $this->input->post('Telephone');
        $user_data['Fax'] = $this->input->post('Fax');

        if(!$this->isValidUserNameForUpdate($user_id, $user_data['UserName'])) {
            $response['error'] = $this->prepareErrorResponse(ERROR_INVALID_USER_NAME_FOR_UPDATE);
            return $response;
        }

        if(!$this->isValidEmailForUpdate($user_id, $user_data['EmailID'])) {
            $response['error'] = $this->prepareErrorResponse(ERROR_INVALID_EMAIL_FOR_UPDATE);
            return $response;
        }

        $this->db->where('ID', $user_id);

        $success = $this->db->update('userinformation', $user_data);
        if ($success) {
            $response['result'] = 1;
        } else {
            $response['error'] = $this->prepareErrorResponse(ERROR_UNKNOWN);
        }

        return $response;
    }

    public function resetPassword($userID, $password) {
        log_message('info', __METHOD__.' Method Start at: '.date("Y-m-d H:i:s").' with Arguments: '.print_r(func_get_args(), true));
        $data = array();
        $data['Password'] = $password;
        $data['UserID'] = $userID;
        $return = $this->updateUserData($data, 5);
        log_message('info', __METHOD__.'#'.__LINE__.' Method End at: '.date("Y-m-d H:i:s"));
        return $return;
    }

    public function resetUserPassword($userID, $password) {
        log_message('info', __METHOD__.' Method Start at: '.date("Y-m-d H:i:s").' with Arguments: '.print_r(func_get_args(), true));
        $where = sprintf("UserID = %s", $userID);
        $data = array();
        $data['Password'] = md5($password);
        $return = $this->CI->azure->update($this->user_table, $data, $where);

        log_message('info', __METHOD__.'#'.__LINE__.' Method End at: '.date("Y-m-d H:i:s"));
        return $return;
    }
}
