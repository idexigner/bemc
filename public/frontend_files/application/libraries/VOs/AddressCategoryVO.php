<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddressCategoryVO
{
    public function getAddressCategoryVO (AddressCategoryEntity $addressCategoryEntity){
        $vo = array();
        $vo['AddressCategoryID'] = intval($addressCategoryEntity->AddressCategoryID);
        $vo['Name'] = addslashes($addressCategoryEntity->Name);
        return $vo;
    }
}