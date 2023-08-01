<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Amalesh Debnath
 * Date: 2016/5/21
 * Time: 02:30 PM
 * All Right Reserved by the creator
 */

class Scroller_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        //log_message("debug",__CLASS__.'#'.__LINE__.' Method Name: '.$this->router->fetch_method());
    }

    public function update() {
        log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
        $data = array();
		$data['title'] = $this->input->post('ScrollerTitle');
		$data['scroller_text'] = $this->input->post('ScrollerText');
		$this->db->set($data);
		$this->db->where('title !=', '');
		return $this->db->update('scroller');
    }

	public function getScrollerData() {
		log_message('debug', __METHOD__.' Method Start with Arguments: '.print_r(func_get_args(), true));
		$this->db->select('title, scroller_text');
		$this->db->from('scroller');
		$this->db->limit(1, 0);
		$all_information = $this->db->get()->result_array();
	//        echo $this->db->last_query();
		log_message('debug', __METHOD__ . '#' . __LINE__ . ' Scroll Data: '.print_r($all_information, true));
		if (isset($all_information[0]['title'])) {
			$scroll_data = array(
				'scroll_title'	=> $all_information[0]['title'],
				'scroller_text'	=> $all_information[0]['scroller_text']
			);

			return $scroll_data;
		}

		return array(
			'scroll_title'	=> '',
			'scroller_text'	=> ''
		);
	}
}
