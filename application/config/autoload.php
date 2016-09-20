<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	$autoload['packages'] = array(APPPATH.'third_party');
	$autoload['libraries'] = array(
		'database',
		'datamapper',
		'pagination',
		'session',
		'common',
		'auth',
		'authentication',
		'email',
		'template',
		'form_validation'
	);
	$autoload['helper'] = array('url','form','date','file','directory','text','array');
	$autoload['config'] = array();
	$autoload['language'] = array();
	$autoload['model'] = array(array('Visitors/visitor','Questions/question','Json/mjson','Plays/play'
	));
