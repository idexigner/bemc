<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:25 PM
 */

class ScheduleJob extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ScheduleJob_model');
    }

    public function updateVisitorCount () {
        $this->ScheduleJob_model->updateVisitorCount();
    }
}