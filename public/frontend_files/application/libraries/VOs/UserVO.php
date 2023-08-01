<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserVO
{
    public function getUserVO (UserEntity $userEntity){
        $vo = array();
        $vo['UserID'] = intval($userEntity->UserID);
        $vo['UserName'] = (string)($userEntity->UserName);
        $vo['EmailID'] = (string)($userEntity->EmailID);
        $vo['UserPass'] = (string)($userEntity->UserPass);
        $vo['FirstName'] = (string)($userEntity->FirstName);
        $vo['LastName'] = (string)($userEntity->LastName);
        $vo['RoleID'] = intval($userEntity->RoleID);
        return $vo;
    }
}