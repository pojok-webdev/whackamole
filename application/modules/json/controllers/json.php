<?php
class Json extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function index(){
		$this->load->view('jsonview');
	}
	
	function xquestions(){
		echo '{
		"1":{"question":"di manakah alamat PadiNET ?","answer":{"a":{"name":"Jl Mayjen Sungkono 83","answered":"true"},"b":{"name":"Jl Mayjen Sungkono 38","answered":"false"},"c":{"name":"Jl Mayjen Sungkono 88","answered":"false"},"d":{"name":"Jl Mayjen Sungkono 33","answered":"false"}}},
		"2":{"question":"PadiNET bergerak di bidang apa ?","answer":{"a":{"name":"Pertanian","answered":"false"},"b":{"name":"Perkebunan","answered":"false"},"c":{"name":"Grosir","answered":"false"},"d":{"name":"Internet","answered":"true"}}},
		"3":{"question":"Manakah yang merupakan layanan PadiNET ?","answer":{"a":{"name":"Internet","answered":"false"},"b":{"name":"Supply Pangan","answered":"true"},"c":{"name":"Domain","answered":"false"},"d":{"name":"Hosting","answered":"false"}}},
		"4":{"question":"Apakah produk andalan PadiNET ?","answer":{"a":{"name":"Enterprise","answered":"true"},"b":{"name":"Community","answered":"false"},"c":{"name":"Domain","answered":"false"},"d":{"name":"Hosting","answered":"false"}}},
		"5":{"question":"Berapa jumlah bulir padi dalam logo PadiNET ?","answer":{"a":{"name":"10","answered":"false"},"b":{"name":"12","answered":"false"},"c":{"name":"14","answered":"false"},"d":{"name":"18","answered":"true"}}},
		"6":{"question":"Warna apa yang tidak terdapat dalam logo PadiNET ?","answer":{"a":{"name":"emas","answered":"false"},"b":{"name":"hitam","answered":"false"},"c":{"name":"hijau","answered":"true"},"d":{"name":"putih","answered":"false"}}},
		"7":{"question":"Apa perbedaan layanan Enterprise dan Community ?","answer":{"a":{"name":"Area Layanan","answered":"false"},"b":{"name":"Waktu Layanan","answered":"false"},"c":{"name":"Besar Bandwidth","answered":"false"},"d":{"name":"Besar rasio","answered":"true"}}},
		"8":{"question":"Berapa rasio maksimal u/ layanan Enterprise ?","answer":{"a":{"name":"5","answered":"true"},"b":{"name":"7","answered":"false"},"c":{"name":"9","answered":"false"},"d":{"name":"11","answered":"false"}}},
		"9":{"question":"Berapa rasio maksimal u/ layanan Community ?","answer":{"a":{"name":"10","answered":"true"},"b":{"name":"12","answered":"false"},"c":{"name":"14","answered":"false"},"d":{"name":"16","answered":"false"}}},
		"10":{"question":"Apakah yang dimaksud ADSL ?","answer":{"a":{"name":"Automatic Digital Subscriber Line","answered":"false"},"b":{"name":"Asynchronous Data Subscriber Line","answered":"false"},"c":{"name":"Automatic Data Subscriber Line","answered":"false"},"d":{"name":"Asynchronous Digital Subscriber Line","answered":"true"}}},
		"11":{"question":"Kapan PadiNET didirikan ?","answer":{"a":{"name":"2002","answered":"false"},"b":{"name":"2004","answered":"true"},"c":{"name":"2006","answered":"false"},"d":{"name":"2008","answered":"false"}}}
		}';
	}
	
	function questions(){
		$out = '';
		$jsons = Mjson::get_qa();
		$arr = array();
		foreach($jsons as $json){
			array_push($arr, '"' . $json->id . '":{"question_id":"' . $json->id . '","question":"' . $json->question . '","answer":{"a":{"name":"' . $json->aanswer . '","answered":"' . $json->aisanswer . '"},"b":{"name":"' . $json->banswer . '","answered":"' . $json->bisanswer . '"},"c":{"name":"' . $json->canswer . '","answered":"' . $json->cisanswer . '"},"d":{"name":"' . $json->danswer . '","answered":"' . $json->disanswer . '"}}}');
		}
		$out = implode(',', $arr);
		echo '{' . $out . '}';
	}


	function jackpot_questions(){
		$out = '';
		$jsons = Mjson::get_jackpot_qa();
		$arr = array();
		foreach($jsons as $json){
			array_push($arr, '"' . $json->id . '":{"question_id":"' . $json->id . '","question":"' . $json->question . '","answer":{"a":{"name":"' . $json->aanswer . '","answered":"' . $json->aisanswer . '"},"b":{"name":"' . $json->banswer . '","answered":"' . $json->bisanswer . '"},"c":{"name":"' . $json->canswer . '","answered":"' . $json->cisanswer . '"},"d":{"name":"' . $json->danswer . '","answered":"' . $json->disanswer . '"}}}');
		}
		$out = implode(',', $arr);
		echo '{' . $out . '}';
	}
}