<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: amalesh
 * Date: 5/4/14
 * Time: 8:31 PM
 */
class OpenSSL {
    var $supported_encryption = true;
    var $method = 'AES-256-CBC';
    var $password;
    var $iv;
    var $options = 0;

    function __construct() {
        $this->password = config_item('openssl_encryption_key');
        $this->iv = config_item('openssl_encryption_iv');
    }

    public function apiResponse($response) {
        $result = openssl_encrypt(json_encode($response), $this->method, $this->password, false, $this->iv);
        log_message('info', __METHOD__.'#'.__LINE__.' Response Value: ' . $result);
        echo $result;
    }

    public function encryptValue($response) {
        $result = openssl_encrypt(json_encode($response), $this->method, $this->password, false, $this->iv);
        log_message('info', __METHOD__.'#'.__LINE__.' Response Value: ' . print_r($result, true));
        return $result;
    }

    public function decryptValue($value, $jsonDecode = true) {
        log_message('info', __METHOD__.' Method Start at: '.date("Y-m-d H:i:s").' with Arguments: '.print_r(func_get_args(), true));
        $result = openssl_decrypt($value, $this->method, $this->password, false, $this->iv);
        log_message('info', __METHOD__.'#'.__LINE__.' Response Value: ' . print_r($result, true));
        return $jsonDecode ? json_decode($result) : $result;
    }

    public function decryptValueService($value) {
        log_message('info', __METHOD__.'#'.__LINE__.' Response Value: ' . print_r($value, true));
        $result = openssl_decrypt($value, $this->method, $this->password, false, $this->iv);
        log_message('info', __METHOD__.'#'.__LINE__.' Response Value: ' . print_r($result, true));
        return $result;
    }

    public function isEncryptionSupported(){
        $platform = isset($_GET['Platform']) ? $_GET['Platform'] : '';
        return strcmp('android', $platform) == 0 ? true : false;
    }

    public function getQueryString($string){
        $length = strpos($string, 'Platform');
        $queryString = substr($string, 0, $length - 1);
        return $queryString;
    }
}
?>
