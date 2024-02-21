<?php 
session_start();
?>
<div class="modal">
    <div class="head_inscription">
        <h2 style="width:500px;">Panier</h2>
        <span class="closeModal2" onclick="close_btn()"> ✕ </span>
    </div>
    <table>
        <tr>
            <th>Réf</th>
            <th>Titre</th>
            <th>Prix</th>
            <th></th>
        </tr>
        <?php 
        
        $total = 0;
            if(isset($_SESSION["panier"])){
                foreach($_SESSION["panier"] as $val){
                    $data = explode("|",$val);
                    $total += (float)$data[2];
                    ?>
                    <tr data="<?=$val?>">
                        <td><?=$data[0]?></td>
                        <td><?=$data[1]?></td>
                        <td><?=$data[2]?></td>
                        <td><button onclick="supp_prod('<?php echo base64_encode($val) ?>',this)"></button></td>
                    </tr>
                    <?php
                }
            }
        ?>
        <tr>
            <td colspan="2">Total</td>
            <td><?=$total?></td>
            <td></td>
        </tr>
    </table>
</div>