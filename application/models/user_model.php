<?php

class User_model extends CI_Model {
	
	
	function _complete_register(){
	
			$data = array(
				'userid' => $this->input->post('username'),
				'user_pass' => $this->_pass_md5($this->input->post('password')),
				'sex' => $this->input->post('gender'),
				'email' => $this->input->post('email')
			);
			$this->db->insert('login', $data);
	}
	

	function _pass_md5($password){
	$password = ($this->config->item('pass_md5')) ? md5($this->input->post('password')) : $this->input->post('password');
	return $password;
	}
	
	function _service_avail_check($service){
		($this->config->item($service)) ? '' : die($this->config->item($service.'_message'));
	}
	
}