<?php
class Tests extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array(
		));
	}
	function index(){
		$this->load->view('common/header');
		$this->load->view('test/index');
		$this->load->view('common/footer');
	}
	function editor(){
		$this->load->view('ckeditor/_samples');
	}
	function teat(){
		echo '{"a":"satoe"}';
	}
	function get_events(){
		$url = $this->uri->uri_to_assoc();
		$year = $url['year'];
		$month = $url['month'];
		$day = $url['day'];
		$query = 'select id,name,time(follow_up)tm from clients where ';
		$query.= 'year(follow_up)=' . $year . ' and ';
		$query.= 'month(follow_up)=' . $month . ' and ';
		$query.= 'day(follow_up)=' . $day;
		$result = $this->db->query($query);
		$string_array = array();
		$out = '{';
		$c=0;
		foreach ($result->result() as $row){
			array_push($string_array,'"' . $c . '":"' . $row->name . '(' . $row->tm . ')"');
			$c++;
		}
		$out.=implode(',',$string_array);
		$out.='}';
		echo $out;
	}
	function get_jenis_bisnis(){
		echo '{"arr":["Badan Usaha","Perorangan","Institusi","Wargame"]}';
	}
	function get_operators(){
		$operators = new Operator();
		$operators->get();
		$out_array = array();
		foreach ($operators as $operator){
			array_push($out_array, $operator->name);
		}
		$out_string = implode('","', $out_array);
		$output = '{"arr":["' . $out_string . '"]}';
		echo $output;
	}
	function get_internet_problems(){
		$internet_problems = new Internet_problem();
		$internet_problems->get();
		$out_array = array();
		foreach ($internet_problems as $internet_problem){
			array_push($out_array, $internet_problem->name);
		}
		$out_string = implode('","', $out_array);
		$output = '{"arr":["' . $out_string . '"]}';
		echo $output;
	}
	function get_positions(){
		$positions = new Position();
		$positions->get();
		$out_array = array();
		foreach ($positions as $position){
			array_push($out_array, $position->name);
		}
		$out_string = implode('","', $out_array);
		$output = '{"arr":["' . $out_string . '"]}';
		echo $output;
	}
	function get_medias(){
		$medias = new Media();
		$medias->get();
		$out_array = array();
		foreach ($medias as $media){
			array_push($out_array, $media->name);
		}
		$out_string = implode('","', $out_array);
		$output = '{"arr":["' . $out_string . '"]}';
		echo $output;
	}
	function testt(){
		$this->load->view('common/header');
		$this->load->view('common/common');
		$this->load->view('test/testt');
	}
	
	function CheckAuthentication(){    
			return isset($_SESSION['IsAuthorized']) && $_SESSION['IsAuthorized'];
	}

	
	function ckedit(){
		session_start();
		$_SESSION['IsAuthorized'] = TRUE;
		if($this->CheckAuthentication()){
			echo 'authenticated';
			
		}
		$this->load->view('common/ckedit');
	}
}