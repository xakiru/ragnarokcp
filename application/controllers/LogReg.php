<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LogReg extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('user_model');
		if($this->uri->segment(1) != ''){
		($this->user_model->_login_session_check()) ? redirect(site_url()) : '';
		}
	}
	
	
	public function index(){
			$this->load->helper(array('url'));
			$data['navi'] = $this->user_model->_get_nav_menues();
			$this->load->view('Common/header', $data);
			$this->load->view('Home/main');
			$this->load->view('Common/footer');

	}
	
	public function register(){
		$this->load->helper(array('html', 'form', 'url'));
		$this->user_model->_service_avail_check('register_service');	
		$this->load->library(array('form_validation'));

		$this->form_validation->set_rules('username', 'Username', 'required|xss_clean|is_unique[login.userid]|min_length[5]|alpha_dash');
		$this->form_validation->set_rules('email', 'Email', 'required|xss_clean|is_unique[login.email]|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|xss_clean|matches[password]|min_length[8]');
		$this->form_validation->set_rules('gender', 'Gender', 'required|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			$data['navi'] = $this->user_model->_get_nav_menues();
			$this->load->view('Common/header', $data);
			$this->load->view('User/register_form');
			$this->load->view('Common/footer');
		}
		else
		{
			
			$this->user_model->_complete_register();
			$data['navi'] = $this->user_model->_get_nav_menues();
			$this->load->view('Common/header', $data);
			$this->load->view('User/register_success');
			$this->load->view('Common/footer');
			
		}
		
		
	}
	
	public function login(){
		$this->load->helper(array('html', 'url', 'form'));
		$this->user_model->_service_avail_check('login');
		$this->load->library(array('form_validation'));
		$this->form_validation->set_rules('username', 'Username', 'required|xss_clean|alpha_dash|callback__username_check');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean|min_length[8]');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['navi'] = $this->user_model->_get_nav_menues();
			$this->load->view('Common/header', $data);
			$this->load->view('User/login_form');
			$this->load->view('Common/footer');
		} else {
			$this->user_model->_set_login_session($this->input->post('username'), $this->input->post('password'));
			redirect(site_url());
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
	
	
	public function logout($key){
		$this->load->helper('url');
		if($key == $this->session->userdata('session_id')){
		$this->session->sess_destroy();
		redirect(site_url());
		} else {
		redirect(site_url());
		}
		
	}

}