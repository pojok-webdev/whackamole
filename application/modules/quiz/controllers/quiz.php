<?php
class Quiz extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function index(){
		$uri = $this->uri->uri_to_assoc();
		$visitor = new Visitor();
		$visitor->where('id',$uri['id'])->get();
		$data = array('uri'=>$uri);
		$this->load->view('show',$data);
	}
	
}