<?php

require_once("../config/mysql.php");

function checkAddParams($title, $content, $categorie) {

    global $error;
    $title =  htmlspecialchars(strip_tags($title));
    $content =  htmlspecialchars(strip_tags($content));
    $categorie =  htmlspecialchars(strip_tags($categorie));

    if ( empty($title) || empty($content) || empty($categorie) ){
        $error["message"] .= "veuillez renseigner les champs";
        $error["exist"] = true;
    }
}