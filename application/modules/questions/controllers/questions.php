<?php
class Questions extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function index(){
		$this->load->view('questions');
	}
	
	function get_questions(){
		$question_array = array();
		foreach(Question::get_questions() as $question){
			array_push($question_array, '"' . $question->id . '":"' . $question->content . '"');
		}
		$out = implode(',', $question_array);
		echo '{' . $out . '}';//'{"data1":"testy","data2":"testz"}';
	}
	
	function handler(){
		$params = $this->input->post();
			if(isset($params['save_x'])){
			$this->form_validation->set_rules('name', 'name', 'required');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email');
			if($this->form_validation->run()==FALSE){
				echo 'salah';
				$this->load->view('questions');
			}	
			else 
			{		
				Visitor::save_visitor($params);
				$id = mysql_insert_id();
				redirect(base_url() . 'index.php/quiz/index/id/' . $id);
			}
		}
	}
	
}