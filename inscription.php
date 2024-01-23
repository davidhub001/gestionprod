
<div id="registrationModal" class="modal-overlay">
    <div class="modal">
        <div class="head_inscription">
            <h2>Inscription</h2>
            <span class="closeModal"> ✕ </span>
        </div>
        <form id="signup-form" method="post" action="inscription.php">
            <input type="text" name="nom" placeholder="Nom" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="tel" name="telephone" placeholder="Téléphone" required>
            <button type="submit">S'inscrire</button>
        </form>
    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $_SESSION['nom'] = $_POST['nom'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['telephone'] = $_POST['telephone'];
    header("Location: index.php");
    exit();
}
?>
