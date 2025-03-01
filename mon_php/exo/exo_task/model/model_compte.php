<?php
    function userInfo($bdd){
        try {
            $req=$bdd->prepare("SELECT (name_user,firstname_user,email_user) FROM users");
            $req->execute();
            $data=$req->fetchAll();
            return $data;
        }catch(Exception $e){
            return $e->getMessage();
    }
}
?>