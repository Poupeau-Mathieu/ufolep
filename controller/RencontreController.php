<?php

class RencontreController extends Controller
{

    private $modRenc = null;

    function liste()
    {
        /*if (isset($_GET['nomPoule'])) {
            $idChampionnat = $_GET['idChampionnat'];
            $nomPoule = $_GET['nomPoule'];
            $j = array();
            $de = array();

            $modPoule = $this->loadModel('Poule');
            $conditions = array('idChampionnat' => $idChampionnat, 'nomPoule' => $nomPoule);
            $params = array('conditions' => $conditions);
            $equipesPoule = $modPoule->find($params);


            $this->modRenc = $this->loadModel('Rencontre');
            $conditions = array('championnat.idChampionnat' => $idChampionnat);
            $orderby = 'journee.numJournee';
            $params = array('conditions' => $conditions, 'orderby' => $orderby);
            $rencontres = $this->modRenc->find($params);

            foreach ($rencontres as $rencontre) {
                $r = array();
                foreach ($equipesPoule as $equipePoule) {
                    if ($rencontre->idEquipeA == $equipePoule->idEquipe) {
                        $de['rencontre'] = $rencontre;
                        array_push($r, $de);
                    //var_dump($r);
                    }
                }
                if (!empty($r)) {
                    $r['idJournee'] = $rencontre->idJournee;
                    $r['datePrev'] = $rencontre->date;
                    array_push($j, $r);
                    unset($r);
                }
            }
            $d['rencontres'] = $j;
            $d['nomPoule'] = $nomPoule;
        //var_dump($d);
        } else {*/
            $idChampionnat = $_GET['idChampionnat'];
            $j = array();
            $de = array();

            $modEnga = $this->loadModel('Engagement');
            $conditions = array('idChampionnat' => $idChampionnat);
            $params = array('conditions' => $conditions);
            $equipesEngagees = $modEnga->find($params);

            $this->modRenc = $this->loadModel('Rencontre');
            $conditions = array('championnat.idChampionnat' => $idChampionnat);
            $orderby = 'journee.numJournee';
            $params = array('conditions' => $conditions, 'orderby' => $orderby);
            $rencontres = $this->modRenc->find($params);

            foreach ($rencontres as $rencontre) {
                $r = array();
                foreach ($equipesEngagees as $equipeEngagee) {
                    if ($rencontre->idEquipeA == $equipeEngagee->idEquipe) {
                        $de['rencontre'] = $rencontre;
                        array_push($r, $de);
                    //var_dump($r);
                    }
                }
                if (!empty($r)) {
                    $r['idJournee'] = $rencontre->idJournee;
                    $r['datePrev'] = $rencontre->date;
                    array_push($j, $r);
                    unset($r);
                }
            }
            $d['rencontres'] = $j;
       // }

        if (empty($d['rencontres'])) {
            $this->e404('Le calendrier du championnat sera prochainement publié');
        }

        $modChamp = $this->loadModel('Championnat');
        $conditions = array('championnat.idChampionnat' => $idChampionnat);
        $params = array('conditions' => $conditions);
        $d['championnat'] = $modChamp->findFirst($params);

        $modEquipe = $this->loadModel('Equipe');
        $d['equipes'] = $modEquipe->find(array('conditions' => 1));

        $this->set($d);
    }

    function listeEquipePoule()
    {
        $equipes = array();
        $equipesPoules = array();
        if (isset($_GET['nomPoule'])) {
            $idChampionnat = $_GET['idChampionnat'];
            $nomPoule = $_GET['nomPoule'];

            $modPoule = $this->loadModel('Poule');
            $projection = 'nomPoule';
            $conditions = array('idChampionnat' => $idChampionnat, 'nomPoule' => $nomPoule);
            $groupby = 'nomPoule';
            $params = array('projection' => $projection, 'conditions' => $conditions, 'groupby' => $groupby);
            $poule = $modPoule->find($params);
            $d['poule'] = $poule;

            if (empty($d['poule'])) {
                $this->e404('Poule introuvable');
            } else {
                $modEquipe = $this->loadModel('Equipe');
                $d['equipes'] = $modEquipe->find(array('conditions' => 1));
                $modEquipe->table .= " INNER JOIN poule ON poule.idEquipe = equipe.IdEquipe";
                $conditions = array('nomPoule' => $poule[0]->nomPoule);
                $groupby = "equipe.idEquipe";
                $orderby = "equipe.nbPoints desc";
                $params = array('conditions' => $conditions, 'groupby' => $groupby, 'orderby' => $orderby);
                $equipes = $modEquipe->find($params);
                //var_dump($equipes);
            }

        } else {
            $idChampionnat = $_GET['idChampionnat'];
            $modEnga = $this->loadModel('Engagement');
            $modEnga->table .= " INNER JOIN championnat ON engagement.idChampionnat = championnat.idChampionnat 
            INNER JOIN equipe ON equipe.idEquipe = engagement.idEquipe";
            $orderby = "equipe.nbPoints desc";
            $conditions = array('championnat.idChampionnat' => $idChampionnat);
            $params = array('conditions' => $conditions, 'orderby' => $orderby);
            $equipes = $modEnga->find($params);
            if (empty($equipes)) {
                $this->e404('Equipes Introuvable');
            }
        }
        array_push($equipesPoules, $equipes);
        $d['equipesPoules'] = $equipesPoules;

        $modChamp = $this->loadModel('Championnat');
        $conditions = array('championnat.idChampionnat' => $idChampionnat);
        $params = array('conditions' => $conditions);
        $d['championnat'] = $modChamp->findFirst($params);
        $this->set($d);
    }

    function detail()
    {
        if (isset($_GET['nomPoule'])) {
            $nomPoule = $_GET['nomPoule'];
        } else {
            $nomPoule = "";
        }
        $d['nomPoule'] = $nomPoule;

        $idRencontre = $_GET['idRencontre'];
        $this->modRenc = $this->loadModel('Rencontre');
        $conditions = array('idRencontre' => $idRencontre);
        $params = array('conditions' => $conditions);
        $rencontre = $this->modRenc->find($params);
        $d['rencontre'] = $rencontre;

        $d['typeRencontre'] = array('A-X', 'B-Y', 'C-Z', 'B-X', 'A-Z', 'C-Y', 'B-Z', 'C-X', 'A-Y');

        $modEquipe = $this->loadModel('Equipe');
        $equipes = $modEquipe->find(array('conditions' => 1));
        $d['equipes'] = $equipes;

        $modPoule = $this->loadModel('Poule');
        $projection = 'nomPoule';
        $conditions = array('idChampionnat' => $rencontre[0]->idChampionnat, 'idEquipe' => $equipes[0]->idEquipe);
        $groupby = 'nomPoule';
        $params = array('projection' => $projection, 'conditions' => $conditions, 'groupby' => $groupby);
        $d['poules'] = $modPoule->find($params);

        $modJoueur = $this->loadModel('Joueur');
        $d['joueurs'] = $modJoueur->find(array('conditions' => 1));

        $modDivision = $this->loadModel('Division');
        $d['divisions'] = $modDivision->find(array('conditions' => 1));

        $modDetailMatch = $this->loadModel('DetailMatch');
        $conditions = array('idRencontre' => $idRencontre);
        $params = array('conditions' => $conditions);
        $d['matchs'] = $modDetailMatch->find($params);

        if (empty($d['matchs'])) {
            $this->e404('Les résultats de la rencontre seront prochainement publiés.');
        }

        $this->set($d);
    }
}
?>