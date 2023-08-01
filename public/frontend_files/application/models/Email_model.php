<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */

class Email_model extends CI_Model {

    private $CI;

    function __construct(){
        $this->CI =  & get_instance();
    }

    private function sendEmail ($from, $name, $to, $subject, $message) {
        $config=array(
            'charset'=>'utf-8',
            'wordwrap'=> TRUE,
            'mailtype' => 'html'
        );

        $this->CI->email->initialize($config);

        $this->CI->email->from($from, $name);
        $this->CI->email->to($to);
        $this->CI->email->subject($subject);
        $this->CI->email->message($message);
        $this->CI->email->send();
    }

    public function sendJobCircularEmail ($jobID) {
        $this->db->select('u.ID');
        $this->db->select('u.EmailID');
        $this->db->select('u.UserName');
        $this->db->select('u.FirstName');
        $this->db->select('u.LastName');
        $this->db->from('userinformation AS u');
        $this->db->join('user_notification_subscription AS uns', 'u.ID = uns.UserID', 'inner');
        $this->db->where('u.IsActive', 1);
        $where = sprintf("u.ID NOT IN (SELECT UserID FROM %s WHERE NotificationObjectID = %d AND NotificationFor = 1)", $this->db->dbprefix('user_notification_history'), $jobID);
        $this->db->where($where);
        $user_info = $this->db->get()->result_array();

        foreach ($user_info AS $user) {
            $email_id = $user['EmailID'];
            $email_name = $user['FirstName'].' '.$user['LastName'];
            if (strcmp($email_name, ' ') == 0) $email_name = $user['UserName'];
            $data = array();
            $data['Name'] = $email_name;
            $data['Item'] = 'New Job';
			$data['Link'] = site_url('Job/showJobDetail').'?JobID='.$jobID;
			$data['UnsubscribeLink'] = $this->CI->openssl->encryptValue(sprintf("UserID=%d&From=Job", $user['ID']));
            $email_subject = 'New Job Circular Added';
            $email_body = $this->CI->load->view('front-end/emailTemplate', $data, true);

            $this->sendEmail('mail@rxmimsbd.com', $email_name, $email_id, $email_subject, $email_body);
            $data = array();
            $data['UserID'] = $user['ID'];
            $data['NotificationFor'] = 1;
            $data['NotificationObjectID'] = $jobID;

            $this->CI->db->insert('user_notification_history', $data);
        }
    }

    public function sendNewProductsEmail ($brandID, $brandName, $link) {
        $this->db->select('u.ID');
        $this->db->select('u.EmailID');
        $this->db->select('u.UserName');
        $this->db->select('u.FirstName');
        $this->db->select('u.LastName');
        $this->db->from('userinformation AS u');
        $this->db->join('user_notification_subscription AS uns', 'u.ID = uns.UserID', 'inner');
        $this->db->where('u.IsActive', 1);
        $where = sprintf("u.ID NOT IN (SELECT UserID FROM %s WHERE NotificationObjectID = %d AND NotificationFor = 3)", $this->db->dbprefix('user_notification_history'), $brandID);
        $this->db->where($where);
        $user_info = $this->db->get()->result_array();

        foreach ($user_info AS $user) {
            $email_id = $user['EmailID'];
            $email_name = $user['FirstName'].' '.$user['LastName'];
            if (strcmp($email_name, ' ') == 0) $email_name = $user['UserName'];
            $data = array();
            $data['Name'] = $email_name;
            $data['Item'] = 'New Product: '.$brandName;
            $data['Link'] = $link;
            $data['UnsubscribeLink'] = $this->CI->openssl->encryptValue(sprintf("UserID=%d&From=Product", $user['ID']));
            $email_subject = 'New Product: '.$brandName.' Added';
            $email_body = $this->CI->load->view('front-end/emailTemplate', $data, true);

            $this->sendEmail('mail@rxmimsbd.com', $email_name, $email_id, $email_subject, $email_body);
            $data = array();
            $data['UserID'] = $user['ID'];
            $data['NotificationFor'] = 3;
            $data['NotificationObjectID'] = $brandID;

            $this->CI->db->insert('user_notification_history', $data);
        }
    }

    public function sendNewBrandEmail ($brandID, $brandName, $link) {
        $this->db->select('u.ID');
        $this->db->select('u.EmailID');
        $this->db->select('u.UserName');
        $this->db->select('u.FirstName');
        $this->db->select('u.LastName');
        $this->db->from('userinformation AS u');
        $this->db->join('user_notification_subscription AS uns', 'u.ID = uns.UserID', 'inner');
        $this->db->where('u.IsActive', 1);
        $where = sprintf("u.ID NOT IN (SELECT UserID FROM %s WHERE NotificationObjectID = %d AND NotificationFor = 2)", $this->db->dbprefix('user_notification_history'), $brandID);
        $this->db->where($where);
        $user_info = $this->db->get()->result_array();

        foreach ($user_info AS $user) {
            $email_id = $user['EmailID'];
            $email_name = $user['FirstName'].' '.$user['LastName'];
            if (strcmp($email_name, ' ') == 0) $email_name = $user['UserName'];
            $data = array();
            $data['Name'] = $email_name;
			$data['Item'] = 'New Brand: '.$brandName;
			$data['Link'] = $link;
			$data['UnsubscribeLink'] = $this->CI->openssl->encryptValue(sprintf("UserID=%d&From=Brand", $user['ID']));
            $email_subject = 'New Brand: '.$brandName.' Added';
            $email_body = $this->CI->load->view('front-end/emailTemplate', $data, true);

            $this->sendEmail('mail@rxmimsbd.com', $email_name, $email_id, $email_subject, $email_body);
            $data = array();
            $data['UserID'] = $user['ID'];
            $data['NotificationFor'] = 2;
            $data['NotificationObjectID'] = $brandID;

            $this->CI->db->insert('user_notification_history', $data);
        }
    }

    public function sendNewPresentationEmail ($brandID, $brandName, $link) {
        $this->db->select('u.ID');
        $this->db->select('u.EmailID');
        $this->db->select('u.UserName');
        $this->db->select('u.FirstName');
        $this->db->select('u.LastName');
        $this->db->from('userinformation AS u');
        $this->db->join('user_notification_subscription AS uns', 'u.ID = uns.UserID', 'inner');
        $this->db->where('u.IsActive', 1);
        $where = sprintf("u.ID NOT IN (SELECT UserID FROM %s WHERE NotificationObjectID = %d AND NotificationFor = 4)", $this->db->dbprefix('user_notification_history'), $brandID);
        $this->db->where($where);
        $user_info = $this->db->get()->result_array();

        foreach ($user_info AS $user) {
            $email_id = $user['EmailID'];
            $email_name = $user['FirstName'].' '.$user['LastName'];
            if (strcmp($email_name, ' ') == 0) $email_name = $user['UserName'];
            $data = array();
            $data['Name'] = $email_name;
			$data['Item'] = 'New Presentation: '.$brandName;
			$data['Link'] = $link;
			$data['UnsubscribeLink'] = $this->CI->openssl->encryptValue(sprintf("UserID=%d&From=Presentation", $user['ID']));
            $email_subject = 'New Presentation: '.$brandName.' Added';
            $email_body = $this->CI->load->view('front-end/emailTemplate', $data, true);

            $this->sendEmail('mail@rxmimsbd.com', $email_name, $email_id, $email_subject, $email_body);
            $data = array();
            $data['UserID'] = $user['ID'];
            $data['NotificationFor'] = 4;
            $data['NotificationObjectID'] = $brandID;

            $this->CI->db->insert('user_notification_history', $data);
        }
    }

    public function sendNewDoctorEntryEmail ($doctorID) {
        $this->db->select('u.ID');
        $this->db->select('u.EmailID');
        $this->db->select('u.UserName');
        $this->db->select('u.FirstName');
        $this->db->select('u.LastName');
        $this->db->from('userinformation AS u');
        $this->db->join('user_notification_subscription AS uns', 'u.ID = uns.UserID', 'inner');
        $this->db->where('u.IsActive', 1);
        $where = sprintf("u.ID NOT IN (SELECT UserID FROM %s WHERE NotificationObjectID = %d AND NotificationFor = 5)", $this->db->dbprefix('user_notification_history'), $doctorID);
        $this->db->where($where);
        $user_info = $this->db->get()->result_array();

        foreach ($user_info AS $user) {
            $email_id = $user['EmailID'];
            $email_name = $user['FirstName'].' '.$user['LastName'];
            if (strcmp($email_name, ' ') == 0) $email_name = $user['UserName'];
            $data = array();
            $data['Name'] = $email_name;
            $data['Item'] = 'New Doctor';
            $data['UnsubscribeLink'] = $this->CI->openssl->encryptValue(sprintf("UserID=%d&From=Doctor", $user['ID']));
            $email_subject = 'New Doctor Added';
            $email_body = $this->CI->load->view('front-end/emailTemplate', $data, true);

            $this->sendEmail('mail@rxmimsbd.com', $email_name, $email_id, $email_subject, $email_body);
            $data = array();
            $data['UserID'] = $user['ID'];
            $data['NotificationFor'] = 5;
            $data['NotificationObjectID'] = $doctorID;

            $this->CI->db->insert('user_notification_history', $data);
        }
    }
}

