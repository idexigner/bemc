<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: amalesh
 * Date: 5/4/14
 * Time: 8:31 PM
 */
class Util {
    var $CI;

    function __construct() {
        $this->CI = & get_instance();
    }

    public function convertToUTF8($data){
        $records = array();
        foreach($data AS $key => $value){
            $records[$key] = iconv("UTF-8", "ISO-8859-1//IGNORE", $value);
        }
        return $records;
    }

    public function generateRandomString($length = 0) {
        if ($length == 0) {
            $length = rand(8,20);
        }
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public function getStandardDeviation(array $a, $sample = false) {
        $n = count($a);
        if ($n === 0) {
//            trigger_error("The array has zero elements", E_USER_WARNING);
            return '';
        }
        if ($sample && $n === 1) {
//            trigger_error("The array has only 1 element", E_USER_WARNING);
            return false;
        }
        $mean = array_sum($a) / $n;
        $carry = 0.0;
        foreach ($a as $val) {
            $d = ((double) $val) - $mean;
            $carry += $d * $d;
        };
        if ($sample) {
            --$n;
        }
        return $n > 1 ? sprintf("%01.5f", sqrt($carry / $n)) : 'Not applicable. Only 1 response given.';
    }

    public function getMeanValue(array $a, $sample = false) {
        $n = count($a);
        if ($n === 0) {
//            trigger_error("The array has zero elements", E_USER_WARNING);
            return false;
        }
        if ($sample && $n === 1) {
//            trigger_error("The array has only 1 element", E_USER_WARNING);
            return false;
        }

        return sprintf("%01.5f", array_sum($a) / $n);
    }

    public function echoObject($object, $fileWrite = false){
        if ($fileWrite) {
            $fileName = 'logs.txt';
            $file = fopen($fileName,"a+");
            $logString = date("Y-m-d H:i:s "). json_encode($object);
            fwrite($file, $logString);
            fclose($file);
        }
        echo '<pre>';
        print_r($object);
        echo '</pre>';
    }

    public function getPercentage($values){
        $total = 0;
        $count = 0;
        $valuePercentage = array();
        foreach($values AS $value){
            if (is_nan($value)){
                $total = 0;
                break;
            }
            $total += $value;
            $valuePercentage[$count++]["value"] = $value;
        }

        if ($total == 0) return $valuePercentage;

        $count = 0;
        foreach ($values AS $value) {
            $percentage = ($value / $total) * 100;
            $valuePercentage[$count++]["percentage"] = sprintf("%1\$.2f", $percentage);
        }

        return $valuePercentage;
    }

    public function upload($upload_dir, $object_name, $max_width = 0, $max_height = 0, $max_size = 0){
        try {
            $config['upload_path'] = './' . $upload_dir . '/';
            $config['allowed_types'] = implode('|', config_item('allowedExts'));
            if ($max_size) $config['max_size']	= $max_size;
            if ($max_width) $config['max_width']  = $max_width;
            if ($max_height) $config['max_height']  = $max_height;
            $config['encrypt_name'] = true;
            $config['overwrite'] = true;

            $this->CI->load->library('upload', $config);

            if ( ! $this->CI->upload->do_upload($object_name)) {
                log_message('error', __METHOD__ . $this->CI->upload->display_errors('',''));
                return false;
            } else {
                return $this->CI->upload->data();
            }
        }  catch (Exception $e) {
            log_message('error', __METHOD__ . ' ' . $e);
            return false;
        } catch (ErrorException $e) {
            log_message('error', __METHOD__ . ' ' . $e);
            return false;
        }
    }

    public function duplicateImage($file, $newfile){
        try {
            if (!file_exists($file)) return false;

            if (!copy($file, $newfile)) {
                log_message('error', __METHOD__ . "failed to copy $file...");
                return false;
            }

            return true;
        }  catch (Exception $e) {
            log_message('error', __METHOD__ . ' ' . $e);
            return false;
        } catch (ErrorException $e) {
            log_message('error', __METHOD__ . ' ' . $e);
            return false;
        }
    }

    public function duplicateImageFromOtherEnv($file, $newfile, $origin_env){
        try {
            $ftp_azure = config_item("ftp_azure");
            $ftp_azure = $ftp_azure[$origin_env];
            $domainURL = $ftp_azure[config_item("domainURL")];
            $path = 'http://' . $domainURL;
            if (!file_exists($path . $file)) return false;

            if (!copy($path . $file, $newfile)) {
                log_message('error', __METHOD__ . "failed to copy $path $file...");
                return false;
            }

            return true;
        }  catch (Exception $e) {
            log_message('error', __METHOD__ . ' ' . $e);
            return false;
        } catch (ErrorException $e) {
            log_message('error', __METHOD__ . ' ' . $e);
            return false;
        }
    }

    public function createCSVFile($fileName, $titles, $values){
        try {
            $file_path = './dataReports/'.$fileName.'.csv';
            $file = fopen($file_path, 'w');
            // output the column headings
            $titles = array_map("utf8_decode", $titles);
            fputcsv($file, $titles);

            foreach($values AS $value) {
                $value = array_map("utf8_decode", $value);
                fputcsv($file, $value);
//                $this->echoObject($value);
            }

            fclose($file);
        }  catch (Exception $e) {
            echo "Error: <br>";
            $this->echoObject($e);
            return false;
        } catch (ErrorException $e) {
            echo "Error: <br>";
            $this->echoObject($e);
            return false;
        }
    }

    public function getEncryptedFileName($key){
        return md5(config_item('invoice_encryption_key') . $key);
    }

    public function sendSuccessEmail($email_from, $email_to, $email_subject, $email_body, $file_path = ''){
        try {
//            $email_to = 'amalesh.debnath@gmail.com';
            $CI =& get_instance();

            $CI->load->library('email');
            $CI->email->clear(TRUE);

            $CI->email->initialize(array(
                'protocol' => config_item('protocol'),
                'smtp_host' => config_item('smtp_host'),
                'smtp_user' => config_item('smtp_user'),
                'smtp_pass' => config_item('smtp_pass'),
                'smtp_port' => config_item('smtp_port'),
                'priority' => 1,
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'newline' => '\r\n',
                'crlf' => '\n'
            ));
            $CI->email->from($email_from);
            $CI->email->to($email_to);
            $CI->email->subject($email_subject);
            $CI->email->message($email_body);
            if (!empty($file_path)) {
                $file_path = FCPATH.$file_path;
                $CI->email->attach($file_path);
            }
            $CI->email->send();
        }  catch (Exception $e) {
            echo "Error: <br>";
            $this->echoObject($e);
            return false;
        } catch (ErrorException $e) {
            echo "Error: <br>";
            $this->echoObject($e);
            return false;
        }
    }

    public function sendAdminEmail($email_from, $email_to, $email_subject, $email_body){
        try {
            $CI =& get_instance();

            $CI->load->library('email');
            $CI->email->clear(TRUE);

            $CI->email->initialize(array(
                'protocol' => config_item('protocol'),
                'smtp_host' => config_item('smtp_host'),
                'smtp_user' => config_item('smtp_user'),
                'smtp_pass' => config_item('smtp_pass'),
                'smtp_port' => config_item('smtp_port'),
                'priority' => 1,
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'newline' => '\r\n',
                'crlf' => '\n'
            ));
            $CI->email->from($email_from);
            $CI->email->to($email_to);
            $CI->email->subject($email_subject);
            $CI->email->message($email_body);
            return $CI->email->send();
        }  catch (Exception $e) {
            echo "Error: <br>";
            $this->echoObject($e);
            return false;
        } catch (ErrorException $e) {
            echo "Error: <br>";
            $this->echoObject($e);
            return false;
        }
    }

    public function makeInvoicePDFContent($userDetail, $invoice, $order_no, $last4, $discount = 0, $subscription_title, $buy_download_bundle, $payment_date){
        try {
            $CI =& get_instance();
            $data = array();
            $data['invoice_id'] = $order_no;
            $data['first_name'] = $userDetail['FirstName'];
            $data['organization'] = $userDetail['Organization'];
            $data['last_name'] = $userDetail['LastName'];
            $data['start_date'] = date("F d, Y", $invoice->data->object->lines->data[0]->period->start);
            $data['end_date'] = date("F d, Y", $invoice->data->object->lines->data[0]->period->end);
            $data['plan'] = $subscription_title;
            $data['amount'] = sprintf("%.2f", $invoice->data->object->amount_due / 100);
            $data['address_line1'] = empty($userDetail['Address2']) ? $userDetail['Address1'] : $userDetail['Address1'] . ', ' . $userDetail['Address2'];
            $data['address_line2'] = $userDetail['City'] . ', ' . $userDetail['State'] . ', ' . $userDetail['Zipcode'];
            $data['address_line3'] = $userDetail['Country'];

//            $discount = $invoice->discount > 0 ? $invoice->discount : 0;
            $data['discount'] = sprintf("%.2f", $discount / 100);

            $data['total_amount'] = sprintf("%.2f", ($invoice->data->object->amount_due - $discount) / 100);
            $data['last4'] = $last4;
            $data['buy_download_bundle'] = $buy_download_bundle;
            $data['payment_date'] = $payment_date;

//        echo 'makeInvoicePDFContent Start';
            $emailBody = $CI->load->view('user/invoiceTemplate', $data, true);
//        echo 'makeInvoicePDFContent End';

            return $emailBody;
        }  catch (Exception $e) {
            echo "Error: <br>";
            $this->echoObject($e);
            return false;
        } catch (ErrorException $e) {
            echo "Error: <br>";
            $this->echoObject($e);
            return false;
        }
    }

    public function makeSuccessEmailBody($first_name, $last_name, $plan, $user_email, $order_no){
        $CI =& get_instance();
        $data = array();
        $data['first_name'] = $first_name;
        $data['last_name'] = $last_name;
        $data['plan'] = $plan;
        $data['user_email'] = $user_email;
        $data['invoice_id'] = $order_no;
//        echo 'makeSuccessEmailBody Start';
        $emailBody = $CI->load->view('user/subscribeEmailTemplate', $data, true);
//        echo 'makeSuccessEmailBody End';

        return $emailBody;
    }

    public function mergeValues ($array1, $array2){
        for ($i = 0; $i < count($array2); $i++) {
            for ($j = 1; $j < count($array2[$i]); $j++) {
                $array1[$i][count($array1[$i])] = $array2[$i][$j];
            }
        }

        return $array1;
    }

    public function formatBytes($bytes, $precision = 2) {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    public function sendEmailValidationLink($validation_string, $email_to){
        try {
//            $email_to = 'amalesh.debnath@gmail.com';
            $email_subject = 'Validate Your Email Address';
            $CI =& get_instance();

            $data = array();
            $data['validation_link'] = $validation_string;
            $email_body = $CI->load->view('user/emailValidation', $data, true);

            $CI->load->library('email');
            $CI->email->clear(TRUE);

            $CI->email->initialize(array(
                'protocol' => config_item('protocol'),
                'smtp_host' => config_item('smtp_host'),
                'smtp_user' => config_item('smtp_user'),
                'smtp_pass' => config_item('smtp_pass'),
                'smtp_port' => config_item('smtp_port'),
                'priority' => 1,
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'newline' => '\r\n',
                'crlf' => '\n'
            ));
            $CI->email->from(config_item('accounts_email_id'));
            $CI->email->to($email_to);
            $CI->email->subject($email_subject);
            $CI->email->message($email_body);
            $CI->email->send();
        }  catch (Exception $e) {
            echo "Error: <br>";
            $this->echoObject($e);
            return false;
        } catch (ErrorException $e) {
            echo "Error: <br>";
            $this->echoObject($e);
            return false;
        }
    }

    public function removeHTMLCode($string) {
        for ($i = 0; $i < 3; $i++) {
            $current_length = strlen($string);
            $string = html_entity_decode($string, ENT_QUOTES, "UTF-8");
            if ($current_length == strlen($string)) break;
        }

        return $string;
    }

    public function convertToDate($date) {
        $temp = explode('/', $date);
        $day = $temp[2];
        $month = $temp[1];
        $year = $temp[0];
        return $year.'-'.$month.'-'.$day;
    }

	public function sortMultidimensionalArray($array, $key) {
		if (!isset($array[0][$key])) return array();

		$total_record = count($array);
		for ($i = 0; $i < $total_record - 1; $i++) {
			for ($j = $i + 1; $j < $total_record; $j++) {
				if (strcmp(strtolower($array[$i][$key]), strtolower($array[$j][$key])) > 0) {
					$temp = $array[$i][$key];
					$array[$i][$key] = $array[$j][$key];
					$array[$j][$key] = $temp;
				}
			}
		}

		return $array;
	}

	public function RemoveSpecialChar($str){

		// Using preg_replace() function
		// to replace the word
		$res = preg_replace('/[^a-zA-Z0-9_]/s','-',$str);

		// Returning the result
		return $res;
	}
}
?>
