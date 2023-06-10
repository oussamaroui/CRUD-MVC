<?php
function connexion(){
    $host = 'localhost';
    $dbname = 'mvc';
    $username = 'root';
    $pass = '';
    
    try{
        $connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $pass);
        return $connexion;
    }catch(Exception $e){
        return "NNN".$e->getMessage();
    }
}
?>