<html>
<head>
<title>PadiNET Game</title>
<style type='text/css'>
body{
	background:url('<?php echo base_url();?>media/bg1.jpg') no-repeat center center fixed;
}
#questions{
	width: 500px;
	margin-left: auto;
	margin-right: auto;
	background:gold;
	opacity: 0.8;
	padding: 3px;
	border-radius: 10px 10px 10px 10px;
}
#q{
color: black;
opacity:1;
}
#main{
}
#header{
	background:url('<?php echo base_url();?>media/logo_padinet.png') no-repeat;
	height: 400px;
	z-index: -100;
}
.question_text{
	text-align:right;
}

#show_players :link{
	float: right;
	color: black;
	text-decoration: none;
}
</style>
</head>
<body>

<div id='main'>
<div id='questions'>
<div id='q'>
<form method='post' action='<?php echo base_url();?>index.php/questions/handler'>
<table>
<tr>
<td class='question_text'>Nama</td><td>:</td><td><input type='text' name='name' /></td>
</tr>
<tr>
<td class='question_text'>Email</td><td>:</td><td><input type='text' name='email' /></td>
</tr>
<tr>
<td class='question_text'>Alamat</td><td>:</td><td><input type='text' name='address' /></td>
</tr>
<tr>
<td class='question_text'>Telp</td><td>:</td><td><input type='text' name='phone' /></td>
</tr>
<tr>
<td class='question_text'>Perusahaan</td><td>:</td><td><input type='text' name='company'></td>
</tr>
<tr>
<td class='question_text'>Layanan yang diinginkan</td><td>:</td><td><input type='text' name='service'></td>
</tr>
</table>
<input type=image src='<?php echo base_url();?>media/start_game.png' name='save' value='Start game' />
</form>
<label id='show_players'><a href='<?php echo base_url();?>index.php/visitors/show' >players</a></label>
</div>
</div>
</div>
</body>
</html>
