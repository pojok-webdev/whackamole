<?php
class Visitors extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function show(){
		$data = array(
		'visitors'=>Visitor::get_visitors(),
		);
		$this->load->view('visitors',$data);
	}
	
	function add_detil(){
		$uri = $this->uri->uri_to_assoc();
		$data = array(
		'visitors'=>Visitor::get_visitors($uri['id']),
		);
		$this->load->view('visitors_detil',$data);
	}
	
	function handler(){
		$params = $this->input->post();
		if(isset($params['save'])){
		Visitor::update_detil($params);
		}
		if(isset($params['close'])){
			
		}
		redirect(base_url() . 'index.php/visitors/show');
	}
}