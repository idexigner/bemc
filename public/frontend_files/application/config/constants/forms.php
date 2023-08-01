<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
define('USER_INVALID_USER_ROLE', 0);
define('USER_SUPER_ADMIN_ROLE', 1);
define('USER_SITE_ADMIN_ROLE', 2);

define('FORM_ID_ADMIN_USER_REGISTRATION', 'admin-user-registration');
define('FORM_ID_ADMIN_USER_LOGIN', 'admin-user-login');

$config['user-access'] = array(
    USER_INVALID_USER_ROLE => array(
        FORM_ID_ADMIN_USER_LOGIN,
        FORM_ID_ADMIN_USER_REGISTRATION
    ),
    USER_SUPER_ADMIN_ROLE => array(
        FORM_ID_ADMIN_USER_LOGIN,
        FORM_ID_ADMIN_USER_REGISTRATION
    ),
    USER_SITE_ADMIN_ROLE => array(
        FORM_ID_ADMIN_USER_LOGIN,
        FORM_ID_ADMIN_USER_REGISTRATION
    )
);