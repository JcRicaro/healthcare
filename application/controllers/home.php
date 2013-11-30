<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct() {
		parent::__construct();
		if(!($this->session->userdata('user_id'))) {
			redirect('login');
		}
	}

	function index() {
		$page['title'] = "Health Care Home";
		$page['page'] = "home";
		$this->load->view('header', $page);
		$this->load->view('home');
		$this->load->view('footer');		
	}

	function patients() {
		$this->load->model('patients_model');

		$page['title'] = "Health Care Patients";
		$page['page'] = "patients";

		$data['patients'] = $this->patients_model->get_all();
		$this->load->view('header', $page);
		$this->load->view('patients', $data);
		$this->load->view('footer');
	}

	function logout() {
		$this->session->sess_destroy();
		redirect('login');
	}
}