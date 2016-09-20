<?php
class Question extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function get_questions(){
		$questions = new Question();
		$questions->get();
		return $questions;
	}
}