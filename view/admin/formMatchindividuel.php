<?php require_once ROOT . DS . "view" . DS . "layout" . DS . "admin" . DS . "_admin_top.php"; ?>

<h2>Nouveau Match</h2>
<hr>

<table class="form-table">
    <form method="POST">
        <tr>
            <td><label>Nom Joueur 1</label></td>
            <td><input class="form-control" type="text" name="JR" value="" size="60" required/></td>
            <td><label>Nom Joueur 2</label></td>
            <td><input class="form-control" type="text" name="JV" value="" size="60" required/></td>
            <td><label>Date</label></td>
            <td><input class="form-control" type="date" name="date" value="" size="60" required/></td>
            <td><label>Lieu</label></td>
            <td><input class="form-control" type="text" name="lieu" value="" size="60" required/></td>
        </tr>
        <tr>
            <td>
                <a class="button primarybuttonWhite" href="<?= BASE_URL . DS . "admin/listeMatchindividuel" ?>">Annuler</a>
                <input class="primarybuttonBlue" type="submit" value="Enregistrer" name="CreerLeMatch" />
            </td>
        </tr>
    </form>
</table>

<?php require_once ROOT . DS . "view" . DS . "layout" . DS . "admin" . DS . "_admin_bottom.php"; ?>