<?php
class Play extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function save_play($obj){
		$query = 'insert into plays ';
		$query.= '(question_id,answer_id,is_true,user_id) ';
		$query.= 'values ';
		$query.= '(' . $obj['question_id'] . ',' . $obj['answer_id'] . ',' . $obj['is_true'] . ',' . $obj['user_id'] . ')';
		$this->db->query($query);
	}
}