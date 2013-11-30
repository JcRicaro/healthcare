<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
		parent:: __construct();

		if(($this->session->userdata('user_id'))) {
			redirect('');
		}
	}

	function index() {
		$this->load->view('login/login');
	}

	function validate() {
		$o = new User();

		$user = $o
			->where('username', $this->input->post('username'))
			->where('password', sha1($this->input->post('password')))
			->get();

		if($user->exists()) {
			$this->session->set_userdata(array(
				'user_id' => $user->id
				));

			$response = array('status' => true);
		}
		else {
			$response = array('status' => false);
		}

		echo json_encode($response);
	}
}