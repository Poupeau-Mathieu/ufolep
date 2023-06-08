<?php require_once ROOT . DS . "view" . DS . "layout" . DS . "admin" . DS . "_admin_top.php"; ?>

<h2>Nouveau tournois</h2>
<hr>

<table class="form-table">
    <form method="POST">
        <tr>
            <td><label>Nom</label></td>
            <td><input class="form-control" type="text" name="nomTournois" value="" size="20" required/></td>
        </tr>
        <tr>
            <td>
                <a class="button primarybuttonWhite" href="<?= BASE_URL . DS . "admin/listeTournois" ?>">Annuler</a>
                <input class="primarybuttonBlue" type="submit" value="Enregistrer" name="creerTournois" />
            </td>
        </tr>
    </form>
</table>

<?php require_once ROOT . DS . "view" . DS . "layout" . DS . "admin" . DS . "_admin_bottom.php"; ?>