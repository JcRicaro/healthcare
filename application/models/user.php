<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Datamapper {
	var $has_many = array('patient', 'consultation');

	function __construct() {
		parent:: __construct();
	}
}