<?php
class Comparison_signs extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_signs(){
		$out = array(
			'>'=>'>',
			'>='=>'>=',
			'='=>'=',
			'<'=>'<',
			'<='=>'<='
		);
		return $out;
	}
}