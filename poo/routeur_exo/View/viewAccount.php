<?php
class ViewAccount{
    //METHOD
    public function displayView():string{
        return"
            <main>
                <h1>Mon Compte</h1>
                <h2>{$_SESSION['nickname']}</h2>
                <p>{$_SESSION['email']}</p>
            </main>
        ";
    }
}