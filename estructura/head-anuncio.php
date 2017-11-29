<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/jquery.jqzoom.css" type="text/css">
	<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script language="JavaScript" src="js/jquery-1.5.1.min.js"></script>
	<script language="JavaScript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
	<script src="js/jquery.jqzoom-core.js" type="text/javascript"></script>

	<?php include("modulos/buscar-ajax.php");?>
	<?php if ($n==0){?>
	<?echo "<title>No se ha encontrado el anuncio</title>";
	}else{
	$head_titulo=mysql_fetch_array($q_title);
	$titulo=$head_titulo['titulo'];
	echo "<title>$titulo</title>";}?>
	<style type"text/css">
	body{margin:0px;padding:0px;font-family:Arial;}
	a img,:link img,:visited img { border: none; }
	table { border-collapse: collapse; border-spacing: 0; }
	:focus { outline: none; }
	*{margin:0;padding:0;}
	p, blockquote, dd, dt{margin:0 0 8px 0;line-height:1.5em;}
	fieldset {padding:0px;padding-left:7px;padding-right:7px;padding-bottom:7px;}
	fieldset legend{margin-left:15px;padding-left:3px;padding-right:3px;color:#333;}
	dl dd{margin:0px;}
	dl dt{}

	.clearfix:after{clear:both;content:".";display:block;font-size:0;height:0;line-height:0;visibility:hidden;}
	.clearfix{display:block;zoom:1}


	ul#thumblist{display:block;}
	ul#thumblist li{float:left;margin-right:2px;list-style:none;}
	ul#thumblist li a{display:block;border:1px solid #CCC;}
	ul#thumblist li a.zoomThumbActive{
	    border:1px solid red;
	}

	.jqzoom{

		text-decoration:none;
		float:left;
	}
	

	
	</style>
</head>