<?php
//Importamos las variables del formulario de contacto
$nombre = addslashes($_POST['name_contactante']);
$email = addslashes($_POST['email_contactante']);
$telefono = addslashes($_POST['fono_contactante']);
$mensaje_post = addslashes($_POST['msj_contactante']);
$anunciante = $_POST['email_anunciante_hdn'];
$id = $_POST['id_anuncio_hdn'];
//Preparamos el mensaje de contacto
$cabeceras = "De: $email\n" //La persona que envia el correo
 . "Reply-To: $email\n";
$asunto = "$nombre interesado en tu anuncio en Vendeloenelvalle.com"; //asunto aparecera en la bandeja del servidor de correo
$email_to = "$anunciante"; //cambiar por tu email
$contenido = "$nombre quiere contactar contigo desde vendeloenelvalle.com\n"
. "\n"
. "Nombre: $nombre\n"
. "Email: $email\n"
. "Teléfono: $telefono\n"
. "Mensaje: $mensaje_post\n"
. "\n";
//Enviamos el mensaje y comprobamos el resultado
if (!empty($email)){
	if (@mail($email_to, $asunto ,$contenido ,$cabeceras )) {

	//Si el mensaje se envía muestra una confirmación
 		$cons=139+pow($id,2);
 		$m=$id+$cons;

	}else{
		$m=246+pow($id,2);
	}
}else{
	$m=246+pow($id,2);
}
header("Location: ../anuncio.php?id=$id&m=$m")
?>