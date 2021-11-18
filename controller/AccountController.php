<?php
include_once("../model/SignUpModel.php");

$error = false ;

//le formulaire est-il bien renseigner?
if (
    (!isset($_POST['pseudo'])) || !isset($_POST['email'])
    || !isset($_POST['password']) || !isset($_POST['user_type']) 
    || !isset($_POST['accepted'])
) {
    
 // si oui, on leur donne un nom
    $isValid = checkSignUp(

        $_POST['pseudo'], 
        $_POST['email'],
        $_POST['password'], 
        $_POST['user_type'],
        $_POST['accepted']
    );

    $error = "il faut email et message pour soumettre formulaire.</br>";

    }

?>
