<?php

 $host = "localhost";
 $user = "root";
 $pass = "Roberto0611#";
 $db = "kitchensync";
 $port = "3307";

 $conexion = new mysqli($host,$user,$pass,$db,$port);

 if(!$conexion){
    echo "conexion fallida";
 }

