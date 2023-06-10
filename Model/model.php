<?php
require "cnx.php";

class modelUsers{
    private $cnx;
    function __construct(){
        $this->cnx = connexion();
    }

    public function setData($email, $pass, $fname, $lname, $job, $projects, $followers, $rating, $fileDest){
        $stm = $this->cnx->prepare("INSERT INTO users(email, pass, fname, lname, job, projects, followers, rating, photo)
        VALUES (?,?,?,?,?,?,?,?,?)");
        $stm ->execute([$email, $pass, $fname, $lname, $job, $projects, $followers, $rating, $fileDest]);
    }

    function login($email, $pass){
        $statement = $this->cnx->prepare("SELECT COUNT(*) as count FROM users WHERE email = ? AND pass = ?");
        $statement->execute([$email, $pass]);
        $result = $statement->fetch()['count'];
        return ($result > 0);
    }

    function getData($email) {
        $statement = $this->cnx->prepare("SELECT * FROM users WHERE email = ?");
        $statement->execute([$email]);
        $data = $statement->fetchAll();
        return $data;
    }

    public function getDataUser($e){
        $stm = $this->cnx->prepare("SELECT * FROM users WHERE email = ?");
        $stm->execute([$e]);
        $user = $stm->fetch();
        return $user;
    }
    public function updateDataUser($fname, $lname, $pass, $job, $projects, $followers, $rating, $fileDest, $email){
        $stm = $this->cnx->prepare("UPDATE users SET fname=?, lname=?, pass=?, job=?, projects=?, followers=?, rating=?, photo=?     WHERE email = ?");
        $stm ->execute([$fname, $lname, $pass, $job, $projects, $followers, $rating, $fileDest, $email]);
    }

    function delete($email){
        $stm = $this->cnx->prepare("delete from users where email = ?");
        $stm->execute([$email]);
    }
}
?>