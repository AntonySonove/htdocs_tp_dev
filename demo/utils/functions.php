<?php
    function sanitize($data){
        return $data=htmlentities(strip_tags(stripcslashes(trim($data))));
    }
    function dbConnect(){
        $bdd=new PDO("mysql:host=localhost;dbname=articles","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    }
?>