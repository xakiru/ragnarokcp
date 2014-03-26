<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LogReg extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
	}
	
	
	public function index(){
			$this->load->helper(array('url'));
			$this->load->view('Common/header');
			$this->load->view('Home/main');
			$this->load->view('Common/footer');

	}
	
	public function register(){
		$this->load->helper(array('html', 'form', 'url'));
		$this->load->model('user_model');
		$this->user_model->_service_avail_check('register_service');	
		$this->load->library(array('form_validation'));

		$this->form_validation->set_rules('username', 'Username', 'required|xss_clean|is_unique[login.userid]|min_length[5]|alpha_dash');
		$this->form_validation->set_rules('email', 'Email', 'required|xss_clean|is_unique[login.email]|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|xss_clean|matches[password]|min_length[8]');
		$this->form_validation->set_rules('gender', 'Gender', 'required|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Common/header');
			$this->load->view('User/register_form');
			$this->load->view('Common/footer');
		}
		else
		{
			
			$this->user_model->_complete_register();
			$this->load->view('Common/header');
			$this->load->view('User/register_success');
			$this->load->view('Common/footer');
			
		}
		
		
	}
	
	function _username_check(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('user_model');
		$result = $this->user_model->_user_validate($username, $password);
			if($result){
			return true;
			} else {
			$this->form_validation->set_message('_username_check', 'Username OR Password is incorrect.');
			return false;
			}
	}
	

}