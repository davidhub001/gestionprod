<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}
$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);
session_start();
if (isset($_SESSION['nom']) || isset($_SESSION['email']) || isset($_SESSION['telephone'])) {
    if(!isset($_SESSION["panier"])){
        $_SESSION["panier"] = array();
    }
    if(!in_array($data["ref"],$_SESSION["panier"])){
        array_push($_SESSION["panier"], $data["ref"]);
        echo count($_SESSION["panier"]);
    }else{
        echo 0;
    }
}else{
    echo "Connectez-vous";
}
?>
