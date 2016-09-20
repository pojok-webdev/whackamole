<?php
class Answers extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function get_answers(){
		$uri = $this->uri->uri_to_assoc();
		$answer_array = array();
		foreach(Answer::get_answers($uri['question_id']) as $answer){
			array_push($answer_array, '"' . $answer->id . '":"' . $answer->content . '"');
		}
		$out = implode(',', $answer_array);
		echo '{' . $out . '}';//'{"data1":"testy","data2":"testz"}';
		//echo '{"data1":"testy","data2":"testz"}';
	}
}