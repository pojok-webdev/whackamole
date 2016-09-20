<!DOCTYPE html>
<html>
<head>
	<title>PadiNET whack a mole b4o</title>
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel='stylesheet' href='<?php echo base_url();?>css/padi_game.css'/>
	<link rel='stylesheet' href='<?php echo base_url();?>css/smoothness/jquery-ui-1.8.14.custom.css'/>
	<script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.5.1.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/jquery-ui-1.8.14.custom.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/jquery.vbutton.js'></script>
	<style type="text/css">
		html,
		body {
			background: #000;
			display: block;
			margin: 0;
			padding: 0;
			cursor:crosshair;
		}
		canvas {
			image-rendering: optimizeSpeed;
			image-rendering: -moz-crisp-edges;
			image-rendering: -o-crisp-edges;
			image-rendering: -webkit-optimize-contrast;
			image-rendering: optimize-contrast;
			-ms-interpolation-mode: nearest-neighbor;
		}
		#mycursor {
		 	cursor: none;
		 	background: url("<?php echo base_url();?>media/hammer1.png") no-repeat;
		 	position: absolute;
		 	top: 0;
		 	left: 0;
			border:none;
		 	z-index: 10000;
		 	width: 320px;
		 	height: 230px;
		}
		@font-face {
		    font-family: 'DavysRegular';
			src: url('<?php echo base_url();?>css/TungusFont_Tinet.ttf');
		    font-weight: normal;
		    font-style: normal;
		
		}

		#sisa_pukulan{
			color: gold;
			float: left;
			margin-left: 20px;
			font: 18px/27px 'DavysRegular', Arial, sans-serif;letter-spacing: 0;
		}
		#qdialog{
			background: url('<?php echo base_url();?>media/background8.jpeg') center center no-repeat;
			color: black;
		}
	</style>
	<script type='text/javascript'>
	var sisa_pukul = 5;
	get_question = function(id,arr,mole){
		$.ajax(
				{
					url: "<?php echo base_url();?>index.php/json/questions",
					dataType: "json",
					async: false,
					success: function(data)
					{
						arr['question_id'] = data[id]['question_id'];
						arr['question'] = data[id]['question'];
						arr['answer_a'] = data[id]['answer']['a']['name'];
						arr['answer_b'] = data[id]['answer']['b']['name'];
						arr['answer_c'] = data[id]['answer']['c']['name'];
						arr['answer_d'] = data[id]['answer']['d']['name'];

						arr['answered_a'] = data[id]['answer']['a']['answered'];
						arr['answered_b'] = data[id]['answer']['b']['answered'];
						arr['answered_c'] = data[id]['answer']['c']['answered'];
						arr['answered_d'] = data[id]['answer']['d']['answered'];
					}
				});
		return arr;
	}

	get_jackpot_question = function(id,arr,mole){
		$.ajax(
				{
					url: "<?php echo base_url();?>index.php/json/jackpot_questions",
					dataType: "json",
					async: false,
					success: function(data)
					{
						arr['question_id'] = data[id]['question_id'];
						arr['question'] = data[id]['question'];
						arr['answer_a'] = data[id]['answer']['a']['name'];
						arr['answer_b'] = data[id]['answer']['b']['name'];
						arr['answer_c'] = data[id]['answer']['c']['name'];
						arr['answer_d'] = data[id]['answer']['d']['name'];

						arr['answered_a'] = data[id]['answer']['a']['answered'];
						arr['answered_b'] = data[id]['answer']['b']['answered'];
						arr['answered_c'] = data[id]['answer']['c']['answered'];
						arr['answered_d'] = data[id]['answer']['d']['answered'];
					}
				});
		return arr;
	}

	send_answer = function(question_id,answerid,is_true,user_id){
		q=answerid;
		$.post('<?php echo base_url();?>index.php/plays/insert_answer',{'question_id':question_id,'answer_id':q,'is_true':'2','user_id':2});
	}
	function create_array(key,val){
		out[key] = val;
	}

	changecursor = function(){
		$('#mycursor').css('background','url("<?php echo base_url();?>media/hammer2.png") no-repeat');
	}

	mymousedown = function(){
		$('#mycursor').css('background','url("<?php echo base_url();?>media/hammer2.png") no-repeat');
		if(sisa_pukul<1){
			$('#mycursor').css('display','none');
			$('#game_over').html('<img src="<?php echo base_url();?>media/gameover.png" />');
			$('#game_over').dialog({
				title:'PadiNET GAME',
				width:'1025',
				height:'320',
				buttons:{'play again':function(){
					window.location.replace('<?php echo base_url();?>index.php/questions/');
					$(this).dialog('close');
				}},
				'close':function(){
					window.location.replace('<?php echo base_url();?>index.php/questions/');
				}
			});
		}
		sisa_pukul=sisa_pukul - 1;
		$('#sisa_pukulan').html('Sisa pukulan : '+sisa_pukul);
	}
	
	$(document).ready(function(){
		$('#utama').mousemove(function(e){
			$('#mycursor').css('left', e.clientX - 250).css('top', e.clientY - 250);
			$('#mycursor').css('background','url("<?php echo base_url();?>media/hammer1.png") no-repeat');
			});
			$('#utama').mousedown(function(){
				mymousedown();
			});
			$('#utama').mouseup(function(){
				$('#mycursor').css('background','url("<?php echo base_url();?>media/hammer1.png") no-repeat');
			});
			$('#qdialog').mouseover(function(){
				$('#mycursor').css('display','none');
			});
	});
	</script>
</head>
<body>
<div id='qdialog'></div>
<div id='mycursor'></div>
<div id='utama'>
<center>
<div id='sisa_pukulan'>Sisa pukulan : 5</div>
<div id='game_over'></div>
	<div id="jsapp"></div>
	<script type="text/javascript" src="<?php echo base_url();?>js/melonJS-0.9.6-min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/main.js"></script>
</center>
</div>
</body>
</html>