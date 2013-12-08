<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DoctorController extends CI_Controller {
	function __construct() {
		parent:: __construct();
		if(!($this->session->userdata('user_id'))) {
			redirect('login');
		}
	}

	function index() {
		$page['title'] = "Health Care Doctors";
		$page['page'] ="doctors";

		$o = new User();
		$data['doctors'] = $o->where('usertype_id', 1)->get();

		$this->load->view('header',$page);
		$this->load->view('doctors/doctors',$data);
		$this->load->view('footer');

	}

	function add() {
		$page['title'] = "Health Care Add Doctor";
		$page['page'] = "doctors";

		$this->load->view('header', $page);
		$this->load->view('doctors/add');
		$this->load->view('footer');
	}

	function add_post() {
		$o = new User();

		$o->lastname = $this->input->post('lastnane');
		$o->firstname = $this->input->post('firstname');
		$o->middlename = $this->input->post('middlename');
		$o->gender = $this ->input->post('gender');
		$o->birthdate = date("Y-m-d", strtotime($this->input->post('birthdate')));
		$o->specialization = $this->input->post('specialization');
		$o->email = $this->input->post('email');
		$o->phone = $this->input->post('phone');
		$o->age = $this->input->post('age');
		$o->username = $this->input->post('username');
		$o->password = sha1($this->input->post('password'));

		if($o->save()) {
			echo json_encode(array('status' => true));
		}
	}


	function view($id) {
		$page['title'] = "Health Care Doctors";
		$page['page'] ="doctors";

		$o = new User();
		$data['doctor'] = $o->where('id', $id)->get();

		$this->load->view('header', $page);
		$this->load->view('doctors/view', $data);
		$this->load->view('footer');
	}

	function view_post($id = null) {
		$o = new User();

		if($id !== null) {
			$o->where('id', $id)->get();	
		}
		$o->firstname = $this->input->post('firstname');
		$o->middlename = $this->input->post('middlename');
		$o->lastname = $this->input->post('lastname');
		$o->age = $this->input->post('nationality');
		$o->birthdate = date("Y-m-d", strtotime($this->input->post('birthdate')));
		$o->address = $this->input->post('address');
		$o->phone = $this->input->post('phone');
		$o->email = $this->input->post('email');
		$o->gender = $this->input->post('gender');
		$o->specialization = $this->input->post('specialization');
		$o->consultation = $this->input->post('consultation');


		if($this->input->post('oldpassword')) {
			if(sha1($this->input->post('oldpassword')) == $o->password) {
				$o->password = sha1($this->input->post('oldpassword'));
				$o->username = $this->input->post('username');
			}
		}

		if($o->save()) {
			echo json_encode(array('status' => true));
		}
	}

	function delete($id) {
		$o = new User();
		$o->where('id', $id)->where('id !=', $this->session->userdata('user_id'))->get();
		$o->delete();

		redirect('doctors');
	}
}