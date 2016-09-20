<?php
class Plays extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function insert_answer(){
		$params = $this->input->post();
		$params['question_id'] = $params['question_id'];
		$params['answer_id'] = $params['answer_id'];
		$params['is_true'] = $params['is_true'];
		$params['user_id'] = $params['user_id'];
		$query = 'insert into plays ';
		$query.= '(question_id,answer_id,is_true,user_id) ';
		$query.= 'values ';
		$query.= '(' . $params['question_id'] . ',' . $params['answer_id'] . ',' . $params['is_true'] . ',' . $params['user_id'] . ')';
		$this->db->query($query);
		
//		Play::save_play($params);
//		$answer = new Answer();
//		$answer->question_id = $params['question_id'];
//		$answer->answer_id = $params['answer_id'];
//		$answer->
	}
}