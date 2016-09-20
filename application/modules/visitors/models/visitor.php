<?php
class Visitor extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function save_visitor($obj){
		$visitor = new Visitor();
		$visitor->name = $obj['name'];
		$visitor->address = $obj['address'];
		$visitor->phone = $obj['phone'];
		$visitor->company = $obj['company'];
		$visitor->service = $obj['service'];
		$visitor->save();
	}
	
	function update_detil($obj){
		$visitor = new Visitor();
		$visitor->where('id',$obj['id'])->update(array('detil'=>$obj['detil']));
	}
	
	function get_visitors($id=null){
		$visitors = new Visitor();
		if($id==null){
			$visitors->get();
		}
		else 
		{
			$visitors->where('id',$id)->get();
		}
		return $visitors;
	}
}