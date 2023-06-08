<?php require_once ROOT . DS . "view" . DS . "layout" . DS . "guest" . DS . "_guest_top.php"; ?>

    <h2>Joueurs de l'équipe</h2> <td><?= $j->nomEquipe ?></td> 

    <a href="<?= BASE_URL . DS . "/equipes/liste" ?>" class="button primarybuttonBlue">
        <i class="fas fa-sort-amount-up-alt"></i>
        &nbspRetour
    </a>


        <table class="data-table">
            <thead>
                <tr>
                    <th>Place</th>
                    <th>Joueurs</th>
                    <th>Score</th> 
                </tr>
            </thead>
            <?php $place = 1; foreach ($joueurs as $j) : ?>
                <tr>
                    <td><?= $place++ ?></td>
                    <td><a href="<?php echo BASE_URL . '/equipes/detail/' . $j->idJoueur; ?>" 
                           title="Cliquez pour modifier"><?= $j->nom . ' '. $j->prenom ?></a></td>
                    <td><?= $j->nbPoints ?></td>

                </tr>

            <?php endforeach; ?>
            <?php foreach ($equipes as $e) : ?>
                <tr>
                    <td><?= $e->nomEquipe ?></td>
                </tr>
            <?php endforeach; ?>
            
        </table>

<?php require_once ROOT . DS . "view" . DS . "layout" . DS . "guest" . DS . "_guest_bottom.php"; ?>