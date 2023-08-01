<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */

class ScheduleJob_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function updateVisitorCount() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $this->db->set('NumberOfVisitor', 'NumberOfVisitor + 1000', false);
        $this->db->where(1, 1, false);
        $this->db->update('visitor');
        log_message('debug', __METHOD__.'#'.__LINE__.' Method End.');
    }
}
