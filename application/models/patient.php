<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patient extends Datamapper {
	var $has_one = array('consultation', 'user');

	function __constuct() {
		parent::__construct();
	}
}