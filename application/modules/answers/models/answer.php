<?php
class Answer extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function get_answers($question_id){
		$answers = new Answer();
		$answers->get();
//		$answers->where('question_id',$question_id)->get();
		return $answers;
	}
}