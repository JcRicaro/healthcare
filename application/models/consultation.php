<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultation extends Datamapper {
	var $has_one = array('patient', 'user');
	var $has_many = array('file');

	function __construct() {
		parent:: __construct();
	}
}