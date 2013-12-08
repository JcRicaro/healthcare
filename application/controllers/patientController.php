<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PatientController extends CI_Controller {
	function __constuct() {
		parent:: __construct();
		if(!($this->session->userdata('user_id'))) {
			redirect('login');
		}
	}

	function index() {
		$page['title'] = "Health Care Patients";
		$page['page'] = "patients";

		$o = new Patient();
		$data['patients'] = $o->get();

		$this->load->view('header',$page);
		$this->load->view('patients/patients', $data);
		$this->load->view('footer');
	}

	function add() {
		$page['title'] = "Health Care Add Patient";
		$page['page'] = "patients";

		$this->load->view('header', $page);
		$this->load->view('patients/add');
		$this->load->view('footer');
	}

	function add_post() {
		$this->form_validation->set_rules('firstname', 'firstname Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('age', 'Age', 'required');
		$this->form_validation->set_rules('nationality', 'Nationality', 'required');
		$this->form_validation->set_rules('birthday', 'Birthday', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');

		if($this->form_validation->run() !== FALSE) {
			$o = new Patient();
			$o->firstname = $this->input->post('firstname');
			$o->lastname = $this->input->post('lastname');
			$o->middlename = $this->input->post('middlename');
			$o->age = $this->input->post('age');
			$o->nationality = $this->input->post('nationality');
			$o->birthday = date("Y-m-d", strtotime($this->input->post('birthday')));
			$o->address = $this->input->post('address');
			$o->civilstatus = $this->input->post('status');
			$o->gender = $this->input->post('gender');
			$o->weight = $this->input->post('weight');
			$o->height = $this->input->post('height');
			$o->blood_type = $this->input->post('blood_type');
			$o->user_id = $this->session->userdata('user_id');

			
			if($o->save())
				echo json_encode(array('status' => true));
		}
	}

	function save_post($id) {
		$o = new Patient();

		$o->get_by_id($id);
		$o->firstname = $this->input->post('firstname');
		$o->lastname = $this->input->post('lastname');
		$o->middlename = $this->input->post('middlename');
		$o->age = $this->input->post('age');
		$o->nationality = $this->input->post('nationality');
		$o->birthday = $this->input->post('birthday');
		$o->address = $this->input->post('address');
		$o->civilstatus = $this->input->post('status');
		$o->gender = $this->input->post('gender');
		$o->weight = $this->input->post('weight');
		$o->height = $this->input->post('height');
		$o->blood_type = $this->input->post('blood_type');
		$o->user_id = $this->session->userdata('user_id');


		if($o->save()) {
			$response = array('status' => true);
		}
		else {
			$response = array('status' => false);	
		}

		echo json_encode($response);

	}

	function view($id) {
		$o = new Patient();
		$data['patient']  = $o->get_by_id($id);

		$page['title'] = "Health Care -".$data['patient']->lastname.' '.$data['patient']->firstname;
		$page['page'] = "patients";

		$this->load->view('header', $page);
		$this->load->view('patients/view', $data);
		$this->load->view('footer');
	}

	function consult($id) {
		$page['title'] = "Health Care Consultation";
		$page['page'] = "patients";

		$o = new Patient();

		$data['patient'] = $o->get_by_id($id);

		$this->load->view('header', $page);
		$this->load->view('patients/consult', $data);
		$this->load->view('footer');
	}

	function consult_post($id) {

		$o = new Consultation();
		$o->date = date("Y-m-d H:i:s");
		$o->patient_id = 			$id;
		$o->observation = 			$this->input->post('observation');
		$o->examination =  			$this->input->post('examination');
		$o->prescription =			$this->input->post('prescription');
		$o->user_id =	 			$this->session->userdata('user_id');
		
		if($o->save()) {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'pdf';
			$config['encrypt_name'] = true;

			$this->load->library('upload', $config);

			if($this->upload->do_upload()) {
				$upload = $this->upload->data();

				$f = new File();
				$f->consultation_id = $o->id;
				$f->filename = $upload['orig_name'];
				$f->storagename = $upload['file_name'];

				$f->save();

				redirect('patients/view/'.$id);
			}
			else {

			}
		}
		else {
			$response = array('status' => false);
		}

		echo json_encode($response);

	}	

	function delete($id) {
		$o = new Patient();
		$o->where('id', $id)->get()->delete();
		
		$this->session->set_flashdata(array(
			'info' => 'Patient Deleted!'
			));

		redirect('patients');
	}
}