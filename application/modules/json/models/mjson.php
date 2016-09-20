<?php
class Mjson extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function get_qa(){
		$query = 'select q.id,q.content question,a.item_text aitemtext, a.content aanswer,a.is_answer aisanswer ';
		$query.= ',b.item_text bitemtext, b.content banswer,b.is_answer bisanswer ';
		$query.= ',c.item_text citemtext, c.content canswer,c.is_answer cisanswer ';
		$query.= ',d.item_text ditemtext, d.content danswer,d.is_answer disanswer ';
		$query.= 'from questions q ';
		$query.= 'left outer join answers a on a.question_id = q.id and  a.item_text="a" ';
		$query.= 'left outer join answers b on b.question_id = q.id and  b.item_text="b" ';
		$query.= 'left outer join answers c on c.question_id = q.id and  c.item_text="c" ';
		$query.= 'left outer join answers d on d.question_id = q.id and  d.item_text="d" ';
		$query.= 'where q.category_id="1"';
		$result = $this->db->query($query);
		return $result->result();
	}

	function get_jackpot_qa(){
		$query = 'select q.id,q.content question,a.item_text aitemtext, a.content aanswer,a.is_answer aisanswer ';
		$query.= ',b.item_text bitemtext, b.content banswer,b.is_answer bisanswer ';
		$query.= ',c.item_text citemtext, c.content canswer,c.is_answer cisanswer ';
		$query.= ',d.item_text ditemtext, d.content danswer,d.is_answer disanswer ';
		$query.= 'from questions q ';
		$query.= 'left outer join answers a on a.question_id = q.id and  a.item_text="a" ';
		$query.= 'left outer join answers b on b.question_id = q.id and  b.item_text="b" ';
		$query.= 'left outer join answers c on c.question_id = q.id and  c.item_text="c" ';
		$query.= 'left outer join answers d on d.question_id = q.id and  d.item_text="d" ';
		$query.= 'where q.category_id="2"';
		$result = $this->db->query($query);
		return $result->result();
	}

}