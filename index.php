<?php 
session_start();
include "view.php";
include "header.php";
include "inscription.php";
include "deconnection.php";
if(isset($_SESSION["panier"])) {
    $nbpanier = count($_SESSION["panier"]);
    $contenu = $_SESSION["panier"];
}
else $nbpanier = 0;
?>
<div id="registrationModal3" class="modal-overlay">
    <?php include "contenuPanier.php"; ?>
</div>
<input type="hidden" id="urlsite" value="<?=$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"]?>">
    <header>
        <h1>Vente de Produits</h1>
    </header>

    <nav>
        <a href="index.php">Accueil</a>
        <a href="#Produits">Produits</a>
        <a href="collectifguide.php">Guide</a>
        <a href="#Contact">Contact</a>
        <?php
            if (!isset($_SESSION['nom']) || !isset($_SESSION['email']) || !isset($_SESSION['telephone'])) {
                $btn = "Login";
            }else{
                $btn = "Logout";
            }
        ?>
        <button id="btn<?=$btn?>"><?=$btn?></button>
        <button id="contenuPanier">
            <span id="nbrpanier"><?=$nbpanier?></span>
        </button>
    </nav>

    <div class="container">
       <?php 
         $data = json_decode(file_get_contents("data.json"));
         foreach($data as $cat=>$prod){
                viewRub($cat);
            ?>
            <div class="produitRB d-none" prod-rub="<?= $cat?>">
            <?php
                foreach($prod as $val){
                    viewProd($val[0], $val[1], $cat, $val[2]);
                }
                ?>
            </div>
            <?php
         }
       ?>
    </div>
    <script src="script.js"></script>
</body>
</html>
