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

	function register() {
		$o = new User();
		$data['doctors'] = $o->where('usertype_id',1)->get();
		$this->load->view('login/register', $data);
	}

	function register_post() {
		$o = new Patient();

		$o->firstname = $this->input->post('firstname');
		$o->lastname = $this->input->post('lastname');
		$o->middename = $this->input->post('middlename');
		$o->age = $this->input->post('age');
		$o->nationality= $this->input->post('nationality');
		$o->birthdate= $this->input->post('birthdate');
		$o->address= $this->input->post('address');
		$o->weight= $this->input->post('weight');
		$o->height= $this->input->post('height');
		$o->status= $this->input->post('status');
		$o->gender= $this->input->post('gender');
		
		$o->save();
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