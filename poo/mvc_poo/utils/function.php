<?php
     function dbConnect(){
        $bdd=new PDO("mysql:host=localhost;dbname=users","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    }
    function sanitize($data){
        return $data=htmlentities(strip_tags(stripcslashes(trim($data))));
    }
?>