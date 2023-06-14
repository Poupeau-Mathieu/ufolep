<?php require_once ROOT . DS . "view" . DS . "layout" . DS . "admin" . DS . "_admin_top.php"; ?>

<h2>Nouveau Match</h2>
<hr>

<table class="form-table">
    <form method="POST">
        <tr>
            <td><label for="JR">Joueur 1</label></td>
            <td><input class="form-control" type="text" name="JR" value="" required/></td>
        </tr>
        <tr>
            <td><label for="JV">Joueur 2</label></td>
            <td><input class="form-control" type="text" name="JV" value="" required/></td>
        </tr>
        <tr>
            <td><label for="date">Date</label></td>
            <td><input class="form-control" type="date" name="date" value="" required/></td>
        </tr>
        <tr>
            <td><label for="lieu">Lieu</label></td>
            <td><input class="form-control" type="text" name="lieu" value="" required/></td>
        </tr>
        <tr>
            <td colspan="2">
                <a class="button primarybuttonWhite" href="<?= BASE_URL . DS . "admin/listeMatchindividuel" ?>">Annuler</a>
                <input class="primarybuttonBlue" type="submit" value="Enregistrer" name="CreerLeMatch" />
            </td>
        </tr>
    </form>
</table>

<?php require_once ROOT . DS . "view" . DS . "layout" . DS . "admin" . DS . "_admin_bottom.php"; ?>
