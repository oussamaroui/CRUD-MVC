<?php
foreach($users as $user){
    $email = $user['email'];
    $fname = $user['fname'];
    $lname = $user['lname'];
    $job = $user['job'];
    $projects = $user['projects'];
    $followers = $user['followers'];
    $rating = $user['rating'];    
    if($user['photo'] != NULL){
        $photo = $user['photo'];
    }else{
        $photo = 'https://img.icons8.com/ios-glyphs/900/000000/user--v1.png';
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$fname.' '.$lname;?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {

            background-color: #bdd1d8;
            border-radius: 10px;
        }

        .card {
            width: 400px;
            border: none;
            border-radius: 10px;
            background-color: #fff;
        }

        .stats {
            background: #f2f5f8 !important;
            color: #000 !important;
        }

        .articles {
            font-size: 10px;
            color: #a1aab9;
        }

        .number1 {
            font-weight: 500;
        }

        .followers {
            font-size: 10px;
            color: #a1aab9;
        }

        .number2 {
            font-weight: 500;
        }

        .rating {
            font-size: 10px;
            color: #a1aab9;
        }

        .number3 {
            font-weight: 500;
        }
        a{ text-decoration:none; color:none;}
        .bg{background-color:#dfdfdf;}
    </style>
</head>

<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card p-3">
            <div class="d-flex align-items-center">
                <div class="image bg rounded-lg" >
                    <img src="<?=$photo?>" width="150" height="150" class="bi bi-person-fill rounded-lg"  alt="Profile Picture">
                </div>
                <div class="ml-3 w-100">
                    <h4 class="mb-0 mt-0"><?= $fname.' '.$lname ;?></h4>
                    <span><?= $job ;?></span>
                    <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                        <div class="d-flex flex-column">
                            <span class="articles">Projects</span>
                            <span class="number1"><?= $projects ;?></span>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="followers">Followers</span>
                            <span class="number2"><?= $followers ;?></span>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="rating">Rating</span>
                            <span class="number3"><?= $rating ;?></span>
                        </div>
                    </div>

                    <?php 
                            $myLink = "../Controller/controller.php?cmd=upadte&email=".$email;
                            $del = '../Controller/controller.php?cmd=delete&email='.$email;
                            ?>
                    <form action="<?=$myLink?>" method="GET" class="button mt-2 d-flex flex-row align-items-center">
                        <a class="btn btn-sm btn-outline-primary w-100" href="<?=$myLink?>">Edit</a>
                        <a href='<?=$del?>' class="btn btn-sm btn-primary w-100 ml-2"><div name="delete">Delete</div></a>
                    </form>
                </div>
            </div>
        </div>
    </div>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
