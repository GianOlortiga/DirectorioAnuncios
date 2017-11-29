<head>
	<title>Ahora Vender y comprar en el Valle es más facil | Vendeloenelvalle.com</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery-1.11.0.min.js"></script>
  <script src="js/bootstrap.js"></script>
	<style>
		   .input-img{
		   background: url(img/img-imput.jpg) no-repeat 100% -3px;   
           width: 165px;
           height: 160px;
           border: 1px dashed #1D6DA6;
           overflow: hidden;
		   }		   
		   .input-img-min {
		   	background: url(img/img-imput-min.jpg) no-repeat 100% -3px;
        width: 76px;
        height: 74px;
        margin-left: 10px;
        margin-bottom: 10px;
        border: 1px dashed #1D6DA6;
        overflow: hidden;
		   }
       #list, #list2, #list3{
       	height: 160px;
       	position: relative;
       	top: -87px;
        width: 165px;
       }
       #list4{
        height: 74px;
        position: relative;
        top: -87px;
        width: 46px;
       }
       .list-preview, .list-preview-min{
        position: absolute;
        z-index: 1;
       }
       .list-preview-min{
        left: 15%;
        top: -32%;
       }

       .thumb, .thumb-min{
        z-index: -99;
       }
       .thumb {
        width: 165px;
        height: 160px;   
       }
       .thumb-min {
       	position: relative;
       	height: 74px;
       	top: 27px;
        width: 76px;
        z-index: 1;
       }
      
       .files, .files-min{
       	cursor:pointer;
        opacity: 0;
        filter:alpha(opacity=0);
       }
       .files{
        width: 79px;
        height: 86px;
        position: relative;
       	left: 35px;
       	top: 32px;
       	z-index: 9999;
       }

       .files-min{
       	width: 55px;
       	height: 60px;
       	position: relative;
       	top: 16px;
       	z-index: 9999;

       }
       .files-2-edit{
        position: absolute;
        float: right;
        z-index: 10;
        padding: 10px;
        bottom: 79%;
        right: -5%;
       }
       .files-2, .files-2-min{
        position: relative;
        float: right;    
        z-index: 10;
        padding: 10px;
       }
       .files-2{
       	bottom:105%;
       	left: 4%;
       }
       .files-2-min{
       	bottom: 77%;
       	left: 88%;
       }
       .files-2-min-edit{
        position: absolute;
        float: right;
        z-index: 10;
        padding: 10px;
        bottom: 21%;
        left: 51%;
       }
       .files-2:hover, .files-2-min{
        opacity: 0.7;
       }
       .files-a{
        position: relative;
        z-index: 99;
        float: right;
       }
       .button-img{
       	background-image: url(img/iconocerrar.png);
       	background-color: transparent;
       	background-repeat: no-repeat;
       	border: 0;
       	position: relative;
       	left: 5px;
       	top: 4px;
       	width: 28px;
       }

  
  </style>
  <script>
  function valida(f){

    if(f.files.length==1){
      if(f.files[0].size<2097152){
      var ext=['gif','jpg','jpeg','png'];
      var v=f.value.split('.').pop().toLowerCase();
      for(var i=0,n;n=ext[i];i++){
        if(n.toLowerCase()==v)
          return
      }
      var t=f.cloneNode(true);
      t.value='';
      f.parentNode.replaceChild(t,f);
      alert('extensión no válida');
      }else{
        f.value="";
        alert('El tamaño maximo es 2MB');
      }
    }else{
      f.value="";
      alert('seleccione solo un archivo');
    }
  }

  </script>
</head>