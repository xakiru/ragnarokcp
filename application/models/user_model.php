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
	$password = ($this->config->item('pass_md5')) ? md5($password) : $password;
	return $password;
	}
	
	function _service_avail_check($service){
		($this->config->item($service)) ? '' : die($this->config->item($service.'_message'));
	}
	
	function _user_validate($username, $password){
		$user_pass = $this->db->get_where('login', array('userid' => $username, 'user_pass'=>$this->_pass_md5($password)));
		return (sizeof($user_pass->result()) == 1) ? true : false;
	}
	
	function _set_login_session($username, $password){
	
		$user_pass_sess = $this->db->get_where('login', array('userid' => $username, 'user_pass'=>$this->_pass_md5($password)))->result();
		$userdata = array(
			'acc_id'=>$user_pass_sess[0]->account_id,
			'user_id'=>$user_pass_sess[0]->userid,
			'password'=>$user_pass_sess[0]->user_pass,
			'sex'=>$user_pass_sess[0]->sex,
			'email'=>$user_pass_sess[0]->email,
			'group_id'=>$user_pass_sess[0]->group_id,
			'logged_in'=>true
		);

		
		$this->session->set_userdata($userdata);
	}
	
	function _login_session_check(){
		$session = ($this->session->userdata('logged_in')) ? true : false;
		return $session;
	}
	
	function _get_nav_menues(){
		if($this->_login_session_check()){
		$menu[1]['name'] = 'Home';	
		$menu[1]['link'] = site_url();
		$menu[2]['name'] = 'Forum';	
		$menu[2]['link'] = site_url().'forum';
		$menu[3]['name'] = 'Downloads';	
		$menu[3]['link'] = 'http://client_url';
		$menu[4]['name'] = 'My Account';	
		$menu[4]['link'] = site_url().'my_account';	
		$menu[5]['name'] = 'Item DB';	
		$menu[5]['link'] = '#';	
		$menu[6]['name'] = 'Server Info';	
		$menu[6]['link'] = '#';	
		$menu[7]['name'] = 'Logout';	
		$menu[7]['link'] = site_url().'logout/'.$this->session->userdata('session_id');	
		} else {
		$menu[1]['name'] = 'Home';	
		$menu[1]['link'] = site_url();
		$menu[2]['name'] = 'Forum';	
		$menu[2]['link'] = site_url().'forum';
		$menu[3]['name'] = 'Downloads';	
		$menu[3]['link'] = 'http://client_url';
		$menu[4]['name'] = 'Login';	
		$menu[4]['link'] = site_url().'login';	
		$menu[5]['name'] = 'Item DB';	
		$menu[5]['link'] = '#';	
		$menu[6]['name'] = 'Server Info';	
		$menu[6]['link'] = '#';	
		$menu[7]['name'] = 'Register';	
		$menu[7]['link'] = site_url().'register';
		}
		return $menu;
	}
	
	function _get_acc_info($acc_id){
	$info = $query = $this->db->get_where('login', array('account_id' => $acc_id))->result_array();
	$acc_level = $info[0]['group_id'];
	$data['account_id'] = ($acc_level >= $this->config->item('account_id_view')) ? $info[0]['account_id'] : 'NA';
	$data['username'] = $info[0]['userid'];
	$data['gender'] = ($info[0]['sex'] == 'M') ? 'Male' : 'Female';
	$data['email'] = $info[0]['email'];
	$data['lastlogin'] = $info[0]['lastlogin'];
	$group_id = $info[0]['group_id'];
	$group_id = $this->db->get_where('pm_acc_level', array('level' => $group_id))->result_array();
	$data['acc_type'] = (isset($group_id[0]['acc_type_name']))? $group_id[0]['acc_type_name'] : 'NA';
	$data['logincount'] = $info[0]['logincount'];
	$data['last_ip'] = (isset($info[0]['last_ip']) && strlen($info[0]['last_ip']) > 0) ? $info[0]['last_ip'] : 'Lot Logged In Yet';
	return $data;
	}
	
	function _conf_old_pass($old_pass, $acc_id){
		$user_pass = $this->db->get_where('login', array('account_id' => $acc_id, 'user_pass'=>$this->_pass_md5($old_pass)));
		return (sizeof($user_pass->result()) == 1) ? true : false;
	}
	
	function _change_password($acc_id, $new_pass){
		$this->db->update('login', array('user_pass'=>$this->_pass_md5($new_pass)), array('account_id'=>$acc_id));
	}
}