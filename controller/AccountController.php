<?php
require_once("../config/config.php");
require_once("../model/SignUpModel.php");
require_once("../model/LoginModel.php");

$error = false ;

//le formulaire est-il bien renseigner?
if ( 
    isset(
    $_POST['pseudo'], //Lory
    $_POST['email'],
    $_POST['password'],
    $_POST['comfirm_password'],
    $_POST['user_type'],
    $_POST['accepted']
    )
){
    $isValid = checkSignUp(
        $_POST['pseudo'],
        $_POST['email'],
        $_POST['password'],
        $_POST['comfirm_password'],
        $_POST['user_type'],
        $_POST['accepted']
    );
        
    // si oui, on leur donne un nom

    if ($isValid['exist']) {
        
        header('Location: http://localhost/blog_amelie/vue/account/signup.php');
        //header("Location:". $domaine ."/vues/account/signup.php");

        return ;
    }

        header('Location: http://localhost/blog_amelie/');
        //header("Location:". $domaine ."/vues/account/successfully.php");

        return;
}

if (isset( $_POST['email'], $_POST['password'])) {
    $isValid = checkLogin(
    $_POST['email'],
    $_POST['password']
);

if (!$isValid['exist']) {
    header("Location:" . $domaine . "/index.php");
    return;
}

header("Location:" . $domaine . "/vues/account/login.php?error=". $isValid['message']);
}


if (isset( $_POST['email'], $_POST['password'])) {
    $isValid = checkLogin(
        $_POST['email'],
        $_POST['password']
    );

    if (!$isValid['exist']) {
        
        header("Location:" . $domaine . "/index.php");
        return;
    }

    header("Location:" . $domaine . "/vues/account/login.php?error=". $isValid['message']);
}