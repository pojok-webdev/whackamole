<?php
class Menus extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_menus(){
		$menus = '<div class="menus">';
		$menus.= anchor('properties','Home','class="menu_button"');
		$menus.= anchor('owners','Pemilik','class="menu_button"');
		$menus.= anchor('users/index/perpage/3/search/all/order/asc/orderby/username/page','Users','class="menu_button"');
		$menus.= '</div>';
		return $menus;
	}
	function get_bottom_menus(){
		$toyear = date('Y');
		$tomonth= date('m');
		return  
		anchor('back_end/index','Home','class="button_home"') . 
		anchor('properties/index/page','Calendar','class="button_calendar"').
		anchor('back_end/logout','Log Out','class="button_logout"');
	}
}
