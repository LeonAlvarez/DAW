<?php

$opcion=null;
if(isset($_POST["opcion"]))
  $opcion = $_POST["opcion"];
if(isset($_POST["texto"])){
  $cadena =$_POST["texto"];
  $cadenaEncriptada = $cadena;
}
else{
  $cadena= "En un lugar de la Mancha, de cuyo nombre no quiero acordarme";
  $cadenaEncriptada= "Ernu  n cyna dhoocuea  on ,nqr l oudladmiau ebergM rrmaaceoe";
}

if(isset($_POST["ancho"]))
  $ancho =$_POST["ancho"];
else
  $ancho= 10;


function encriptar($cadena,$ancho){
  $columnas = ceil(strlen($cadena)/$ancho);
  $cadenaCifrada=" ";
  $descifrado = [];
  
  for($i=0;$i<$columnas;$i++){
    array_push($descifrado,substr($cadena, $i*($ancho), $ancho));
  }

  for($i=0;$i<sizeof($descifrado);$i++){
    echo "<pre>".$descifrado[$i]."</pre>";
  }

  for($i=0;$i<$ancho;$i++) {
   for($j=0;$j<$columnas;$j++)
     $cadenaCifrada=$cadenaCifrada.(substr($descifrado[$j],$i,1));
  }
  return $cadenaCifrada;
};


function desencriptar($cadenaCifrada,$ancho){
  $columnas = ceil(strlen($cadenaCifrada)/$ancho);
  $cadenaDescifrada=" ";
  $cifrado = [];
  for($i=0;$i<$ancho;$i++){
    array_push($cifrado,substr($cadenaCifrada, $i*($columnas), $columnas));
  }
  
  for($i=0;$i<sizeof($cifrado);$i++){
    echo "<pre>".$cifrado[$i]."</pre>";
  }
  
  for($i=0;$i<$columnas;$i++) {
   for($j=0;$j<$ancho;$j++)
     $cadenaDescifrada=$cadenaDescifrada.(substr($cifrado[$j],$i,1));
  }
  return $cadenaDescifrada;
}

//Meta
echo "<!DOCTYPE html><html lang='es'><head><meta charset='utf-8'><meta http-equiv='X-UA-Compatible' content='IE=edge'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1'><title>Escitala</title>";
//Botstrap CSS
echo "    <!-- Bootstrap -->";
echo "    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>";
//FontAwesome CSS
echo "    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>";
//Styles
echo "    <style>body{text-align:center;}.centrado{margin:0 auto;float:none;padding:40px;}</style>";
//Jquery JS
echo "    </head><body><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->";
echo "       <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>";
//Botstrap JS
echo "        <!-- Include all compiled plugins (below), or include individual files as needed -->";
echo "        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>";
//Contenido
echo "<div class='container'>";
echo "<div class='centrado col-lg-8 col-md-8 col-sm-10 col-xs-11'>";
if($opcion != null)
  echo "<button onClick='history.go(-1);return true;'class='btn  pull-left btn-success '>Volver</button>";
echo "<h4>Cadena Original:</h4>";
echo "<div><pre class='bg-info pre-scrollable'><b>".$cadena."</b></pre></div>";
echo "<h4>Ancho:</h4>";
echo "<pre><b>".$ancho."</b></pre>";
echo "<hr>";

if ($opcion=="cifrar"){
  echo "<h4>Cifrado:</h4>";
  echo "<pre class='bg-primary pre-scrollable'>".encriptar($cadena,$ancho)."</pre>";
  echo "</br>";
  echo "<button onClick='history.go(-1);return true;'class='btn  pull-left btn-success '>Volver</button>";
  echo "<hr>";
}
else if($opcion=="descifrar"){
  echo "<h4>Descifrado:</h4>";
  echo "<pre class='bg-primary pre-scrollable'>".desencriptar($cadenaEncriptada,$ancho)."</pre>";
  echo "</br>";
  echo "<button onClick='history.go(-1);return true;'class='btn  pull-left btn-success '>Volver</button>";
  echo "<hr>";
}
else{
  echo "<h4>Cifrado:</h4>";
  echo "<pre class='bg-primary'>".encriptar($cadena,$ancho)."</pre>";
  echo "</br>";
  echo "<hr>";
  echo "<h4>Descifrado:</h4>";
  echo "<pre class='bg-primary'>".desencriptar($cadenaEncriptada,$ancho)."</pre>";
  echo "</br>";
  echo "<hr>";
}
echo "</div>";
echo "</div>";
echo "      </body></html>";
?> 
