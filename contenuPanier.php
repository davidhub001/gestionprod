<div id="registrationModal3" class="modal-overlay">
    <div class="modal">
        <div class="head_inscription">
            <h2 style="width:500px;">Panier</h2>
            <span class="closeModal"> ✕ </span>
        </div>
        <table>
            <tr>
                <th>Réf</th>
                <th>Titre</th>
                <th>Prix</th>
            </tr>
            <?php 
            $total = 0;
                if(isset($_SESSION["panier"])){
                    foreach($_SESSION["panier"] as $val){
                        $data = explode("|",$val);
                        $total += (int)$data[2];
                        ?>
                        <tr>
                            <td><?=$data[0]?></td>
                            <td><?=$data[1]?></td>
                            <td><?=$data[2]?></td>
                        </tr>
                        <?php
                    }
                }
            ?>
            <tr>
                <td colspan="2">Total</td>
                <td><?=$total?></td>
            </tr>
        </table>
    </div>
</div>
