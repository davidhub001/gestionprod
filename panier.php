<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}
$request_body = file_get_contents('php://input');

$res = json_decode($request_body, true);
$data =  $res["data"];
$option = $res["options"];
session_start();

switch ($option) {
    case 'ajouter_panier':
        if (isset($_SESSION['nom']) || isset($_SESSION['email']) || isset($_SESSION['telephone'])) {
            if(!isset($_SESSION["panier"])){
                $_SESSION["panier"] = array();
            }
            if(!in_array($data,$_SESSION["panier"])){
                array_push($_SESSION["panier"], $data);
                echo count($_SESSION["panier"]);
            }else{
                echo 0;
            }
        }else{
            echo "Connectez-vous";
        }

        break;
    case 'supp_prod':
        $data = base64_decode($data);
        if(in_array($data,$_SESSION["panier"])){
            unset($_SESSION["panier"][array_search($data,$_SESSION["panier"])]);
        }
        echo count($_SESSION["panier"]);
        break;
    default:
        # code...
        break;
}

?>
