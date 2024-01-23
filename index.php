<?php 
session_start();
include "view.php";
include "header.php";
include "inscription.php";
include "deconnection.php";
if(isset($_SESSION["panier"])) $nbpanier = count($_SESSION["panier"]);
else $nbpanier = 0;
?>
<input type="hidden" id="urlsite" value="<?=$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"]?>">
    <header>
        <h1>Vente de Produits</h1>
    </header>

    <nav>
        <a href="#">Accueil</a>
        <a href="#">Produits</a>
        <a href="#">Contact</a>
        <?php
            if (!isset($_SESSION['nom']) || !isset($_SESSION['email']) || !isset($_SESSION['telephone'])) {
                $btn = "Login";
            }else{
                $btn = "Logout";
            }
        ?>
        <button id="btn<?=$btn?>"><?=$btn?></button>
        <span id="nbrpanier"><?=$nbpanier?></span>
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
