<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

define('NO_ERROR', 0);
define('ERROR_INVALID_REQUEST', 1);
define('ERROR_UNKNOWN', 2);
define('ERROR_INVALID_PARAMS', 3);
define('ERROR_INVALID_USER_NAME_FOR_REGISTRATION', 4);
define('ERROR_INVALID_USER_NAME_FOR_UPDATE', 5);
define('ERROR_INVALID_EMAIL_FOR_REGISTRATION', 6);
define('ERROR_INVALID_EMAIL_FOR_UPDATE', 7);
define('ERROR_INVALID_LOGIN_INFORMATION', 8);
define('ERROR_WHILE_PASSWORD_RESET', 9);
define('ERROR_INVALID_OLD_PASSWORD', 10);
define('ERROR_REQUIRE_FIELD_MISSING', 11);
define('ERROR_INVALID_EMAIL_ID', 12);
define('ERROR_INVALID_SESSION_TOKEN', 13);
define('ERROR_SESSION_EXPIRE', 14);

$config['api_error_messages'] = array(
    NO_ERROR => array(
        'code' => NO_ERROR,
        'message' => ''
    ),
    ERROR_INVALID_REQUEST => array(
        'code' => ERROR_INVALID_REQUEST,
        'message' => 'Invalid Request!'
    ),
    ERROR_UNKNOWN => array(
        'code' => ERROR_UNKNOWN,
        'message' => 'Oops! Something went wrong! The application has encountered an unknown error.'
    ),
    ERROR_INVALID_PARAMS => array(
        'code' => ERROR_INVALID_PARAMS,
        'message' => 'Invalid Params!'
    ),
    ERROR_INVALID_USER_NAME_FOR_REGISTRATION => array(
        'code' => ERROR_INVALID_USER_NAME_FOR_REGISTRATION,
        'message' => ''
    ),
    ERROR_INVALID_USER_NAME_FOR_UPDATE => array(
        'code' => ERROR_INVALID_USER_NAME_FOR_UPDATE,
        'message' => ''
    ),
    ERROR_INVALID_EMAIL_FOR_UPDATE => array(
        'code' => ERROR_INVALID_EMAIL_FOR_UPDATE,
        'message' => 'This email address has already been used. Please enter a different email address.'
    ),
    ERROR_INVALID_EMAIL_FOR_REGISTRATION => array(
        'code' => ERROR_INVALID_EMAIL_FOR_REGISTRATION,
        'message' => 'This email address has already been used. Please enter a different email address.'
    ),
    ERROR_INVALID_LOGIN_INFORMATION => array(
        'code' => ERROR_INVALID_LOGIN_INFORMATION,
        'message' => 'Invalid login information.'
    ),
    ERROR_WHILE_PASSWORD_RESET => array(
        'code' => ERROR_WHILE_PASSWORD_RESET,
        'message' => 'There is an error when we try to reset your password. Please try again.'
    ),
    ERROR_INVALID_OLD_PASSWORD => array(
        'code' => ERROR_INVALID_OLD_PASSWORD,
        'message' => 'Invalid old password.'
    ),
    ERROR_REQUIRE_FIELD_MISSING => array(
        'code' => ERROR_REQUIRE_FIELD_MISSING,
        'message' => 'Require field(s) missing.'
    ),
    ERROR_INVALID_EMAIL_ID => array(
        'code' => ERROR_INVALID_EMAIL_ID,
        'message' => 'Invalid email id.'
    ),
    ERROR_INVALID_SESSION_TOKEN => array(
        'code' => ERROR_INVALID_SESSION_TOKEN,
        'message' => 'Invalid session token.'
    ),
    ERROR_SESSION_EXPIRE => array(
        'code' => ERROR_SESSION_EXPIRE,
        'message' => 'Session expire.'
    )
);
