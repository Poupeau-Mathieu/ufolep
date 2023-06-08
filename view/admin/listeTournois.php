<?php require_once ROOT . DS . "view" . DS . "layout" . DS . "admin" . DS . "_admin_top.php"; ?>

    <h2>Liste des Tournois</h2>
    <hr>

    <a href="<?php echo BASE_URL . DS . "admin" . DS . "formTournois" ?>"
       class="button primarybuttonBlue">
        <i class="fas fa-plus fa-sm"></i>&nbsp Nouveau tournois</a>

    <table class="data-table sober">
        <?php  
        foreach ($Tournois as $t) : ?>
           <tr>
                <td class="text-left">
                        <?= $t->nomTournois  ?>
                        &nbsp;
                </td>
               <td>
                   <a href="<?= BASE_URL . DS . "admin" . DS . "modifTournois/?idtournois=" . $t->idTournois
                   ?>" class="button primarybuttonRed">Modifier</a>
               </td>
           </tr>
        <?php endforeach; ?>
    </table>

<?php require_once ROOT . DS . "view" . DS . "layout" . DS . "admin" . DS . "_admin_bottom.php"; ?>