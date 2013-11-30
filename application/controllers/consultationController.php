<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ConsultationController extends CI_Controller {
	function __construct() {
		parent:: __construct();
		if(!($this->session->userdata('user_id'))) {
			redirect('login');
		}
	}

	function view($id) {
		$page['title'] = "Health Care Consultation";
		$page['page'] = "consultation";
		
		$o = new Consultation();
		$data['consultation'] = $o->where('id', $id)->get();

		$this->load->view('header', $page);
		$this->load->view('consultations/view', $data);
		$this->load->view('footer');
	}
}