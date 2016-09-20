<head>
<link rel='stylesheet' href='<?php echo base_url();?>css/smoothness/jquery-ui-1.8.14.custom.css' />
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.5.1.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-ui-1.8.14.custom.min.js'></script>
<script type='text/javascript'>
var question='';
player_answer = function(boole){
	alert(boole);
	$('#qdialog').dialog('close');
}
get_question = function(id){
	
	$.getJSON('<?php echo base_url();?>index.php/json/questions',function(data){
		question = data[id]['question'];
		answer_a = '<button onclick="player_answer('+data[id]['answer']['a']['answered']+')">a</button> ' + data[id]['answer']['a']['name'] + '<br />';
		answer_b = '<button onclick="player_answer('+data[id]['answer']['b']['answered']+')">b</button> ' + data[id]['answer']['b']['name'] + '<br />';
		answer_c = '<button onclick="player_answer('+data[id]['answer']['c']['answered']+')">c</button> ' + data[id]['answer']['c']['name'] + '<br />';
		answer_d = '<button onclick="player_answer('+data[id]['answer']['d']['answered']+')">d</button> ' + data[id]['answer']['d']['name'] + '<br />';
		$('<div id="qdialog" >'+question+' '+answer_a+' '+answer_b+' '+answer_c+' '+answer_d+'</div>').dialog({
			'title':'PadiNET Quiz'
		});
	});
}
</script>
</head>

<body onload='get_question(2)'>
<h1>DIALOG</h1>
</body>