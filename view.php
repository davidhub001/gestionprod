
        
<?php 
function viewRub($titre = "Titre vide", $categorie = "Categorie vide", $prix = 0){
?>
    <div class="rubriqueRB" nom-rub="<?=$titre?>">
        <img src="product.webp">
        <div class="product-info">
            <h2><?=$titre?></h2>
        </div>
    </div>
<?php
}

function viewProd($ref = "ref vide",$titre = "Titre vide", $categorie = "Categorie vide", $prix = 0){
?>
    <div class="product">
        <img src="product.webp">
        <div class="product-info">
            <h2><?=$titre?></h2>
            <p class="category"><?=$categorie?></p>
            <p>Prix : <?= $prix?></p>
            <button class="addpanier" ref=<?=$ref?> onclick="ajouter_panier('<?=$ref?>|<?=$titre?>|<?=$prix?>')">Ajouter au panier</button>
        </div>
    </div>
<?php
}