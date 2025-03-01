<?php
    function nettoyage($data){
        return $data=htmlentities(strip_tags(stripcslashes(trim($data))));
    }
    function dbConnect(){
        $bdd=new PDO("mysql:host=localhost;dbname=tasks","antony2","Kaibacorp1.",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    }
    
?>