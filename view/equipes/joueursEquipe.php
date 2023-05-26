<?php
require_once ROOT . DS . "view" . DS . "layout" . DS . "guest" . DS . "_guest_top.php";

$idEquipe = $_GET['idEquipe'];
$sql = "SELECT * FROM joueurs WHERE idEquipe = $idEquipe";

?>

<h2>Liste des joueurs de l'équipe</h2>
<hr>

<?php foreach ($joueurs as $joueur) : ?>
    <div>
        <h3><?= mb_strtoupper($joueur->nom) .' '. $joueur->prenom ?></h3>
        <div>
            <b>Équipe :</b>
            <label><?= $joueur->nomEquipe ?></label>
        </div>
        <div>
            <b>Âge :</b>
            <label><?= $joueur->age . ' ans'?></label>
        </div>
        <div>
            <b>Licence :</b>
            <label><?= mb_strtoupper($joueur->licenceJoueur) ?></label>
        </div>
        <div>
            <b>Classement :</b>
            <label><?= $joueur->nbPoints ?></label>
        </div>
        <hr>
    </div>
<?php endforeach; ?>

<?php require_once ROOT . DS . "view" . DS . "layout" . DS . "guest" . DS . "_guest_bottom.php"; ?>
