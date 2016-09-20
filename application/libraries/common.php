<?php
class Common {

	var $obj;
	
	function __construct(){
		$this->obj = & get_instance();
	}
	
	function check_is_install_folder_exist(){
		if(get_dir_file_info('./application/modules/install')){
			return true;
		}
		else 
		{
			return false;
		}
	}
	
	function remove_single_quote($string){
		return str_replace("'","''",$string);
	}
	
	function show_single_quote($string){
		return str_replace("''","'",$string);	
	}
	
	function thousand_separator($number=''){
		if($number==''){
		return '0.00';
		}
		$out='';
		$exploded = explode(".",$number);
		$k=0;
		for($c=strlen($exploded[0]);$c>=0;$c--){
			$out = substr($exploded[0],$c,1) . $out;
			if(($k%3==0) && ($k!=strlen($exploded[0]))&&($k!=0)){
				$out = ',' . $out;
			}
			$k++;
		}
		if(!empty($exploded[1])){
			$out.='.' . $exploded[1];
		}
		else 
		{
			$out.='.00';
		}
		return $out;
	}
	
	function de_decimalize($value){
		$output=$value;
		return str_replace(',','',$output);
	}
	
	function decimalize($value){
		return $value;
	}
	
	function sql_to_human_datetime($datetime){
		$datetimearray = explode(' ', $datetime);
		$date_array = explode('-',$datetimearray[0]);
		$output = $date_array[2] . '/' . $date_array[1] . '/' . $date_array[0];
		return $output;
	}
	
	function sql_to_human_date($date){
		$date_array = explode('-',$date);
		$output = $date_array[2] . '/' . $date_array[1] . '/' . $date_array[0];
		return $output;
	}
	
	function human_to_sql_date($date){
		$date_array = explode('/', $date);
		$output = $date_array[2] . '-' . $date_array[1] . '-' . $date_array[0];
		return $output;
	}
	
	function check_login(){
		if (!$this->obj->auth->is_logged_in()){
			redirect('front_end/show_login');
		}
	}
	
	function send_mail($recipient,$subject,$message){
		$config['smtp_host']='202.6.233.16';
		$config['smtp_port']='25';
		$config['protocol']='smtp';
		$config['mailtype']='html';
		$this->obj->email->initialize($config);
		$this->obj->email->from('puji@padi.net.id');
		$this->obj->email->to($recipient);
		$this->obj->email->subject($subject);
		$this->obj->email->message($message);
		$this->obj->email->send();
	}
	
	function get_hours_array(){
		$out_array = array();
		for($c=1;$c<=24;$c++){
			for($x=strlen($c);$x<2;$x++){
				$c='0' . $c;
			}
			$out_array[$c] = $c;
		}
		return $out_array;
	}
	
	function get_minutes_array(){
		$out_array = array();
		for($c=0;$c<60;$c++){
			for($x=strlen($c);$x<2;$x++){
				$c='0' . $c;
			}
			$out_array[$c]=$c;
		}
		return $out_array;
	}
	
	function validate_url($key_array,$valid_url){
		$uri = $this->obj->uri->uri_to_assoc();
		$keys = array_keys($uri); 
		if($keys!=$key_array){
			redirect($valid_url);
		}
	}
	
	function unset_session(){
		$search_data = array(
		'property_type'=>'',
		'transaction_type'=>'',
		'min_price'=>'',
		'max_price'=>'',
		'alamat'=>'',
		'key'=>'',
		'city_parts'=>'',
		'lt'=>'',
		'lt_val'=>'',
		'lb'=>'',
		'lb_val'=>'',
		'key'=>'',
		'tingkat'=>'',
		'tingkat_val'=>'',
		'bedroom'=>'',
		'bedroom_val'=>'',
		'bathroom'=>'',
		'bathroom_val'=>'',
		'listrik'=>'',
		'listrik_val'=>'',
		'water_providers'=>'',
		'directions'=>'',
		'documents'=>'',
		);
		$this->obj->session->unset_userdata($search_data);
	}

	function get_property_data(){
		$out = array(
		'property_type'=>(isset($this->obj->session->userdata['property_type']))?$this->obj->session->userdata['property_type']:'Semua',
		'transaction_type'=>(isset($this->obj->session->userdata['transaction_type']))?$this->obj->session->userdata['transaction_type']:'Semua',
		'min_price'=>(isset($this->obj->session->userdata['min_price']))?$this->obj->session->userdata['min_price']:'0',
		'max_price'=>(isset($this->obj->session->userdata['max_price']))?$this->obj->session->userdata['max_price']:'0',
		'alamat'=>(isset($this->obj->session->userdata['alamat']))?$this->obj->session->userdata['alamat']:'',
		'key'=>(isset($this->obj->session->userdata['key']))?$this->obj->session->userdata['key']:'',
		'city'=>(isset($this->obj->session->userdata['city']))?$this->obj->session->userdata['city']:'',
		'city_part'=>(isset($this->obj->session->userdata['city_part']))?$this->obj->session->userdata['city_part']:'Semua',
		'lt'=>(isset($this->obj->session->userdata['lt']))?$this->obj->session->userdata['lt']:'>=',
		'lt_val'=>(isset($this->obj->session->userdata['lt_val']))?(($this->obj->session->userdata['lt_val']=='')?'0':$this->obj->session->userdata['lt_val']):'0',
		'lb'=>(isset($this->obj->session->userdata['lb_val']))?$this->obj->session->userdata['lb']:'>=',
		'lb_val'=>(isset($this->obj->session->userdata['lb_val']))?(($this->obj->session->userdata['lb_val']=='')?'0':$this->obj->session->userdata['lb_val']):'0',
		'key'=>(isset($this->obj->session->userdata['key']))?$this->obj->session->userdata['key']:'',
		'tingkat'=>(isset($this->obj->session->userdata['tingkat']))?$this->obj->session->userdata['tingkat']:'>=',
		'tingkat_val'=>(isset($this->obj->session->userdata['tingkat_val']))?$this->obj->session->userdata['tingkat_val']:'0',
		'bedroom'=>(isset($this->obj->session->userdata['bedroom']))?$this->obj->session->userdata['bedroom']:'>=',
		'bedroom_val'=>(isset($this->obj->session->userdata['bedroom_val']))?$this->obj->session->userdata['bedroom_val']:'0',
		'bathroom'=>(isset($this->obj->session->userdata['bathroom']))?$this->obj->session->userdata['bathroom']:'>=',
		'bathroom_val'=>(isset($this->obj->session->userdata['bathroom_val']))?$this->obj->session->userdata['bathroom_val']:'0',
		'listrik'=>(isset($this->obj->session->userdata['listrik']))?$this->obj->session->userdata['listrik']:'>=',
		'listrik_val'=>(isset($this->obj->session->userdata['listrik_val']))?$this->obj->session->userdata['listrik_val']:'0',
		'water_provider'=>(isset($this->obj->session->userdata['water_provider']))?$this->obj->session->userdata['water_provider']:'Semua',
		'directions'=>(isset($this->obj->session->userdata['directions']))?$this->obj->session->userdata['directions']:'Semua',
		'document'=>(isset($this->obj->session->userdata['document']))?$this->obj->session->userdata['document']:'Semua',
		'order1'=>' TGLMULAI ',
		'order2'=>'KOTA',
		'order3'=>'STATUS',
		'order1_value'=>'desc',
		'order2_value'=>'asc',
		'order3_value'=>'asc',
		'filter'=>(isset($this->obj->session->userdata['filter']))?$this->obj->session->userdata['filter']:'TGLMULAI',
		'metode-filter'=>(isset($this->obj->session->userdata['metode-filter']))?$this->obj->session->userdata['metode-filter']:'desc',
		);
		return $out;
	}
	
	function get_common_pagination_conf($base_url,$uri_segment,$per_page,$row_count){
		$pagination_conf['base_url'] = $base_url;
		$pagination_conf['per_page'] = $per_page;
		$pagination_conf['total_rows'] = $row_count;
		$pagination_conf['uri_segment'] = $uri_segment;
		$pagination_conf['cur_tag_open'] = ' | <strong>';
		$pagination_conf['cur_tag_close'] = '</strong> ';
		$pagination_conf['num_tag_open'] = ' | ';
		$pagination_conf['next_tag_open'] = ' | ';
		$pagination_conf['last_tag_open'] = ' | ';
		$pagination_conf['first_tag_close'] = ' | ';
		$pagination_conf['next_link'] = $this->obj->lang->line('next');
		$pagination_conf['prev_link'] = $this->obj->lang->line('prev');
		$pagination_conf['first_link'] = $this->obj->lang->line('first');
		$pagination_conf['last_link'] = $this->obj->lang->line('last');
		return $pagination_conf;
	}
	
	function get_simple_pagination_conf($module_name){
		$app_setting = new App_setting();
		$app_setting->where('module_name',$module_name)->get();
		$pagination_conf['base_url'] = base_url() . $app_setting->default_url;
		$pagination_conf['per_page'] = $app_setting->per_page;
		$pagination_conf['uri_segment'] = $app_setting->page_segment;
		$pagination_conf['cur_tag_open'] = ' | ';
		$pagination_conf['cur_tag_close'] = '</strong> ';
		$pagination_conf['num_tag_open'] = ' | ';
		$pagination_conf['next_tag_open'] = ' | ';
		$pagination_conf['last_tag_open'] = ' | ';
		$pagination_conf['first_tag_close'] = ' | ';
		$pagination_conf['next_link'] = $this->obj->lang->line('next');
		$pagination_conf['prev_link'] = $this->obj->lang->line('prev');
		$pagination_conf['first_link'] = $this->obj->lang->line('first');
		$pagination_conf['last_link'] = $this->obj->lang->line('last');
		return $pagination_conf;
	}
	
	function get_metode_filter(){
		$out = array('asc'=>'Ascending','desc'=>'Descending');
		return $out;
	}
	
	function get_filter(){
		$out = array('TGLMULAI'=>'Tanggal Update','HARGA'=>'Harga','KOTA'=>'Kota','LB'=>'Luas Bangunan');
		return $out;
	}

	function datestring1(){
		return  "Year: %Y Month: %m Day: %d - %h:%i %a";
	}
}
