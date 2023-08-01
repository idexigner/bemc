<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JournalVO
{
    public function getJournalVO ($data){
        $vo = array();
        $vo['ID'] = intval($data['ID']);
        $vo['Title'] = addslashes($data['Title']);
		$vo['JournalCategoryID'] = $data['JournalCategoryID'];
		$vo['JournalType'] = $data['JournalType'];
		$vo['JournalPath'] = $data['JournalPath'];
        return $vo;
    }
}
