<?php
/**
 * PHPMonkey's Ragnarok CP
 * An open source Ragnarok Control Panel.
 * This file is part of PHPMonkey's Ragnarok Control Panel
 * Project : PHPMonkey's Ragnarok CPanel
 * Author  : A.P.
 * Link    : https://github.com/phpmonkeys/ragnarokcp/
 * Since   : V 1.1
**/
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('user_model');
		($this->user_model->_login_session_check()) ? '' : redirect(site_url());
	}
	
	public function my_account(){
		$this->user_model->_service_avail_check('my_account_service');	
		$datan['navi'] = $this->user_model->_get_nav_menues();
		$data = $this->user_model->_get_acc_info($this->session->userdata('acc_id'));
		$this->load->view('Common/header', $datan);
		$this->load->view('User/my_account', $data);
		$this->load->view('Common/footer');
	}
	
	 public function change_password(){
		$this->user_model->_service_avail_check('change_password_service');	
		$this->load->helper(array('html', 'url', 'form'));
		$this->load->library(array('form_validation'));
		$this->form_validation->set_rules('old_password', 'Old Password', 'required|callback__check_old_pass');
		$this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[8]');
		$this->form_validation->set_rules('c_new_password', 'Confirm New Password', 'required|min_length[8]|matches[new_password]');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['navi'] = $this->user_model->_get_nav_menues();
			$this->load->view('Common/header', $data);
			$this->load->view('User/change_password');
			$this->load->view('Common/footer');
		} else {
			$this->user_model->_change_password($this->session->userdata('acc_id'), $this->input->post('new_password'));
			redirect(site_url().'logout/'.$this->session->userdata('session_id'));
		}
	}
	
	function _check_old_pass(){
		$old_pass = $this->input->post('old_password');
		$acc_id = $this->session->userdata('acc_id');
		$result = $this->user_model->_conf_old_pass($old_pass, $acc_id);
			if($result){
			return true;
			} else {
			$this->form_validation->set_message('_check_old_pass', 'Old password does not match.');
			return false;
			}
	}

}