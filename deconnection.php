
<div id="registrationModal2" class="modal-overlay">
    <div class="modal">
        <div class="head_inscription">
            <h2>Déconnection</h2>
            <span class="closeModal"> ✕ </span>
        </div>
        <form id="signup-form" method="post" action="deconnection.php">
            <input type="hidden" name="logout" value="0">
            <button type="submit">ok</button>
        </form>
    </div>
</div>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($_POST['logout'] == 0){
            session_start();
            $_SESSION = array();
            session_destroy();
            header("Location: index.php");
            exit(); 
        }
        
    }
?>