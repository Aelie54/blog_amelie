<?php

//pour connecter la db à localhost
$username = "root";
$password = "";
$host = "localhost"; 
$db="BLOG";
$port = "3306";

 $option =[
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
 ];

$dsn = "mysql:host=$host;dbname=$db;charset=utf-8;port=$port";

try{
    $connexion = new \PDO($dsn, $username, $password,$option);
} catch (\PDOException $error) { 
    $message = $error->getMessage();
    var_dump($message,);
    die("Erreur lors de ma connexion PDO");
}
