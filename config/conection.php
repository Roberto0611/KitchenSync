<?php

 $host = "localhost";
 $user = "root";
 $pass = "Roberto0611#";
 $db = "kitchensync";

 $conexion = new mysqli($host,$user,$pass,$db);

 if(!$conexion){
    echo "conexion fallida";
 }

