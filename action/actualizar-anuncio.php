<?php
include("../modulos/conexion.php");
$categoriahija = mysql_real_escape_string(stripslashes($_POST['categoriahija']));
$titulo = mysql_real_escape_string(stripslashes($_POST['titulo_anuncio_txt']));
$descripcion = mysql_real_escape_string(stripslashes($_POST['descripcion_anuncio_txtarea']));
$precio = mysql_real_escape_string(stripslashes($_POST['precio_articulo_txt']));
$date = "fecha_publicacion";
$nombre = mysql_real_escape_string(stripslashes($_POST['nombre_anunciante_txt']));
$email = mysql_real_escape_string(stripslashes($_POST['email_anunciante_txt']));
$telefono = mysql_real_escape_string(stripslashes($_POST['telefono_anunciante_txt']));
$localidad = mysql_real_escape_string(stripslashes($_POST['localidad_anunciante_slc']));
$codigo=mysql_real_escape_string(stripslashes($_POST['codigo']));
$d_img1=mysql_real_escape_string(stripslashes($_POST['d-img1']));
$d_img2=mysql_real_escape_string(stripslashes($_POST['d-img2']));
$d_img3=mysql_real_escape_string(stripslashes($_POST['d-img3']));
$img_file_hdn=mysql_real_escape_string(stripslashes($_POST['img_file_hdn']));
$img2_file_hdn=mysql_real_escape_string(stripslashes($_POST['img2_file_hdn']));
$img3_file_hdn=mysql_real_escape_string(stripslashes($_POST['img3_file_hdn']));
$hdn_img1=$codigo-12345;
$hdn_img2=$codigo-23451;
$hdn_img3=$codigo-34512;

$tamañoimg1 = $_FILES['img_anuncio_fls']['size'];
$tamañoimg2 = $_FILES['img_anuncio2_fls']['size'];
$tamañoimg3 = $_FILES['img_anuncio3_fls']['size'];

$verificar=mysql_query("SELECT * FROM anuncios WHERE codigo=$codigo");
$num_reg=mysql_num_rows($verificar);
$reg_v=mysql_fetch_array($verificar);

if (empty($categoriahija) || empty($titulo) || empty($descripcion) || empty($precio) || empty($nombre) || empty($email) || empty($localidad)){
	header("Location: ../success.php?re=f-posting-edit&ck=$codigo");
}else{

if($num_reg==1){

	if((empty($d_img1)&&empty($_FILES['img_anuncio_fls']['tmp_name'])) && (empty($d_img2)&&empty($_FILES['img_anuncio2_fls']['tmp_name'])) && (empty($d_img3)&&empty($_FILES['img_anuncio3_fls']['tmp_name']))){
		mysql_query("UPDATE anuncios SET categoriahija_id='$categoriahija', titulo='$titulo', descripcion='$descripcion', precio='$precio', nombre_anunciante='$nombre', telefono='$telefono', email='$email', distrito_id='$localidad' WHERE codigo='$codigo'");
		header("Location: ../success.php?re=v-true-edit&ck-ck=$codigo");
	}else{

	if(!empty($d_img1)){
		if($d_img1!=$hdn_img1){
			header("Location: ../success.php?re=no-edit-cki-f&ck=$codigo");
		}else{
			$d_img_1=$reg_v['imagen1'];
			$ruta="../img/anuncios/$d_img_1";
			if(file_exists($ruta)){
				unlink($ruta);
				mysql_query("UPDATE anuncios SET imagen1='' WHERE codigo='$codigo'");
			}
		}
		if(empty($_FILES['img_anuncio_fls']['tmp_name'])){
			$imagen1_vacia=$_FILES['img_anuncio_fls']['tmp_name'];
		}elseif($tamañoimg1>3145728){
			header("Location: ../result-posting.php?re=f-size-edit&ck=$codigo"); //error: excede el tamaño permitido de 3MB
		}elseif ($_FILES["img_anuncio_fls"]["type"] =="image/jpeg" || $_FILES["img_anuncio_fls"]["type"] =="image/gif" || $_FILES["img_anuncio_fls"]["type"] =="image/png"){
			$imagen1_1 = time()."-1.jpg";
			$resultado1 = @move_uploaded_file($_FILES['img_anuncio_fls']['tmp_name'], "../img/anuncios/".$imagen1_1);
			mysql_query("UPDATE anuncios SET imagen1='$imagen1_1' WHERE codigo='$codigo'");
		}else{
			header("Location: ../result-posting.php?re=f-type-edit&ck=$codigo"); //error: No es tipo de archivo permitido
		}

	}
	if(!empty($d_img2)){
		if($d_img2!=$hdn_img2){
			header("Location: ../result-posting.php?re=no-edit-cki-f&ck=$codigo");
		}else{
			$d_img_2=$reg_v['imagen2'];
			$ruta2="../img/anuncios/$d_img_2";
			if(file_exists($ruta2)){
				unlink($ruta2);
				mysql_query("UPDATE anuncios SET imagen2='' WHERE codigo='$codigo'");
			}
		}
		if(empty($_FILES['img_anuncio2_fls']['tmp_name'])){
			$imagen2_vacia=$_FILES['img_anuncio2_fls']['tmp_name'];
		}elseif($tamañoimg2>3145728){
			header("Location: ../result-posting.php?re=f-size-edit&ck=$codigo"); //error: excede el tamaño permitido de 3MB
		}elseif ($_FILES["img_anuncio2_fls"]["type"] =="image/jpeg" || $_FILES["img_anuncio2_fls"]["type"] =="image/gif" || $_FILES["img_anuncio2_fls"]["type"] =="image/png"){
			$imagen2_2 = time()."-2.jpg";
			$resultado2 = @move_uploaded_file($_FILES['img_anuncio2_fls']['tmp_name'], "../img/anuncios/".$imagen2_2);
			mysql_query("UPDATE anuncios SET imagen2='$imagen2_2' WHERE codigo='$codigo'");
		}else{
			header("Location: ../result-posting.php?re=f-type-edit&ck=$codigo"); //error: No es tipo de archivo permitido
		}
	}
	if(!empty($d_img3)){
		if($d_img3!=$hdn_img3){
			header("Location: ../result-posting.php?re=no-edit-cki-f");
		}else{
			$d_img_3=$reg_v['imagen3'];
			$ruta3="../img/anuncios/$d_img_3";
			if(file_exists($ruta3)){
				unlink($ruta3);
				mysql_query("UPDATE anuncios SET imagen3='' WHERE codigo='$codigo'");
			}
		}
		if(empty($_FILES['img_anuncio3_fls']['tmp_name'])){
			$imagen3_vacia=$_FILES['img_anuncio3_fls']['tmp_name'];
		}elseif($tamañoimg3>3145728){
			header("Location: ../result-posting.php?re=f-size-edit&ck=$codigo"); //error: excede el tamaño permitido de 3MB
		}elseif ($_FILES["img_anuncio3_fls"]["type"] =="image/jpeg" || $_FILES["img_anuncio3_fls"]["type"] =="image/gif" || $_FILES["img_anuncio3_fls"]["type"] =="image/png"){
			$imagen3_3 = time()."-3.jpg";
			$resultado3 = @move_uploaded_file($_FILES['img_anuncio3_fls']['tmp_name'], "../img/anuncios/".$imagen3_3);
			mysql_query("UPDATE anuncios SET imagen3='$imagen3_3' WHERE codigo='$codigo'");
		}else{
			header("Location: ../result-posting.php?re=f-type-edit&ck?$codigo"); //error: No es tipo de archivo permitido
		}
	}

	if ($imagen1_vacia && $imagen2_vacia && $imagen3_vacia){
		$imagen_generica = "generica.jpg";
		$imagen1_1 = $imagen_generica;
	}

	if ($imagen_generica){
		mysql_query("UPDATE anuncios SET categoriahija_id='$categoriahija', titulo='$titulo', descripcion='$descripcion', imagen1='$imagen1_1', precio='$precio', nombre_anunciante='$nombre', telefono='$telefono', email='$email', distrito_id='$localidad' WHERE codigo='$codigo'");
		header("Location: ../result-posting.php?re=v-true-edit-cki&ck=$codigo");
	}else{
		if(!isset($img_file_hdn)){
			if($tamañoimg1>3145728){
				header("Location: ../result-posting.php?re=f-size-edit&ck=$codigo"); //error: excede el tamaño permitido de 3MB
			}elseif ($_FILES["img_anuncio_fls"]["type"] =="image/jpeg" || $_FILES["img_anuncio_fls"]["type"] =="image/gif" || $_FILES["img_anuncio_fls"]["type"] =="image/png"){
				$imagen1_2 = time()."-1.jpg";
				$resultado1_2 = @move_uploaded_file($_FILES['img_anuncio_fls']['tmp_name'], "../img/anuncios/".$imagen1_2);
				mysql_query("UPDATE anuncios SET imagen1='$imagen1_2' WHERE codigo='$codigo'");
			}else{
				header("Location: ../result-posting.php?re=f-type-edit&ck=$codigo"); //error: No es tipo de archivo permitido
			}
		}

		if(!isset($img2_file_hdn)){
			if($tamañoimg2>3145728){
				header("Location: ../result-posting.php?re=f-size-edit"); //error: excede el tamaño permitido de 3MB
			}elseif ($_FILES["img_anuncio2_fls"]["type"] =="image/jpeg" || $_FILES["img_anuncio2_fls"]["type"] =="image/gif" || $_FILES["img_anuncio2_fls"]["type"] =="image/png"){
				$imagen2_2 = time()."-2.jpg";
				$resultado2_2 = @move_uploaded_file($_FILES['img_anuncio2_fls']['tmp_name'], "../img/anuncios/".$imagen2_2);
				mysql_query("UPDATE anuncios SET imagen2='$imagen2_2' WHERE codigo='$codigo'");
			}else{
				header("Location: ../result-posting.php?re=f-type-edit"); //error: No es tipo de archivo permitido
			}
		}

		if(!isset($img3_file_hdn)){
			if($tamañoimg3>3145728){
				header("Location: ../result-posting.php?re=f-size-edit"); //error: excede el tamaño permitido de 3MB
			}elseif ($_FILES["img_anuncio3_fls"]["type"] =="image/jpeg" || $_FILES["img_anuncio3_fls"]["type"] =="image/gif" || $_FILES["img_anuncio3_fls"]["type"] =="image/png"){
				$imagen3_2 = time()."-3.jpg";
				$resultado3_2 = @move_uploaded_file($_FILES['img_anuncio3_fls']['tmp_name'], "../img/anuncios/".$imagen3_2);
				mysql_query("UPDATE anuncios SET imagen3='$imagen3_2' WHERE codigo='$codigo'");
			}else{
				header("Location: ../result-posting.php?re=f-type-edit"); //error: No es tipo de archivo permitido
			}
		}
			mysql_query("UPDATE anuncios SET categoriahija_id='$categoriahija', titulo='$titulo', descripcion='$descripcion', precio='$precio', nombre_anunciante='$nombre', telefono='$telefono', email='$email', distrito_id='$localidad' WHERE codigo='$codigo'");
			$q=mysql_query("SELECT * FROM anuncios WHERE codigo='$codigo'");
			$reg_q=mysql_fetch_array($q);
			$imagen1=$reg_q['imagen1'];
			$imagen2=$reg_q['imagen2'];
			$imagen3=$reg_q['imagen3'];
			if (empty($imagen1)&&empty($imagen2)&&empty($imagen3)){
				mysql_query("UPDATE anuncios SET imagen1='generica.jpg' WHERE codigo='$codigo'");
			}
			header("Location: ../result-posting.php?re=v-true-edit-ckii&ck=$codigo");
		}
	}
	
}else{
	header("Location ../result-posting.php?re=no-edit-num&ck=$codigo");
}
}
?>