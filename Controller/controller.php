<?php
require "../Model/model.php";
$modelUsers = new modelUsers();

$cmd = $_REQUEST["cmd"];

if($cmd == 'create'){
    $fname = $_REQUEST["fname"];
    $lname = $_REQUEST["lname"];
    $email = $_REQUEST["email"];
    $pass = $_REQUEST["pass"];
    $job = $_REQUEST["job"];
    $projects = $_REQUEST["projects"];
    $followers = $_REQUEST["followers"];
    $rating = $_REQUEST["rating"];

    // Profile Picture
    $pp = $_FILES['pp'];
    $fileName = $_FILES['pp']['name'];
    $fileTmpName = $_FILES['pp']['tmp_name'];
    $fileType = $_FILES['pp']['type'];
    $fileExt = explode('.', $fileName);
    $fileActExt = strtolower(end($fileExt));
    $allowed = ['jpg', 'jpeg', 'png'];
    if (in_array($fileActExt, $allowed)) {
        $fileNewName = uniqid('', true) . "." . $fileActExt;
        $fileDest = "../Profile Picture/" . $fileNewName;
        move_uploaded_file($fileTmpName, $fileDest);
    }
    
    $modelUsers->setData($email, $pass, $fname, $lname, $job, $projects, $followers, $rating, $fileDest);

    header("Location: controller.php?cmd=read&email=".urlencode($email));
    exit();    
}

if($cmd == 'login'){
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $valid = $modelUsers->login($email, $pass);
    if ($valid) {
        header("Location: controller.php?cmd=read&email=".urlencode($email));
        exit();       

    } else {
        header("Location: ../index.html?e=er"); 
        exit();
    }
}

if ($cmd == 'read') {
    $email = $_REQUEST['email'];
    $users = $modelUsers->getData($email);
    require "../View/read.php";
}

if($cmd == 'delete'){
    $email = $_REQUEST['email'];
    $modelUsers->delete($email);

    header("Location: ../View/create.php");
    exit();  
}

if($cmd == 'upadte'){
    $e = $_REQUEST['email'];

    $user = $modelUsers->getDataUser($e);
    require '../View/update.php';
}

if($cmd == 'okupdate'){
    $fname = $_REQUEST["fname"];
    $lname = $_REQUEST["lname"];
    $email = $_REQUEST["email"];
    $pass = $_REQUEST["pass"];
    $job = $_REQUEST["job"];
    $projects = $_REQUEST["projects"];
    $followers = $_REQUEST["followers"];
    $rating = $_REQUEST["rating"];

    // Profile Picture
    $pp = $_FILES['pp'];
    $fileName = $_FILES['pp']['name'];
    $fileTmpName = $_FILES['pp']['tmp_name'];
    $fileType = $_FILES['pp']['type'];
    $fileExt = explode('.', $fileName);
    $fileActExt = strtolower(end($fileExt));
    $allowed = ['jpg', 'jpeg', 'png'];
    if (in_array($fileActExt, $allowed)) {
        $fileNewName = uniqid('', true) . "." . $fileActExt;
        $fileDest = "../Profile Picture/" . $fileNewName;
        move_uploaded_file($fileTmpName, $fileDest);
    }
    if(isset($fileDest)){
        $fileDest ;
    }else{
        $fileDest = 'https://img.icons8.com/ios-glyphs/900/000000/user--v1.png';
    }

    $modelUsers->updateDataUser($fname, $lname, $pass, $job, $projects, $followers, $rating, $fileDest, $email);

    $users = $modelUsers->getData($email);
    require "../View/read.php";
}

?>