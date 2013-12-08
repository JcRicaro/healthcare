<?php

class File extends Datamapper {
	var $has_one = array('consultation');

	function __construct() {
		parent::__construct();
	}
}