<?php 
class EquipesController extends Controller
{
    private $modEquipe = null;

    function liste()
    {
        $this->modEquipe = $this->loadModel('Equipe');
        $groupby = "equipe.idEquipe";
        $orderby = "idDivision, equipe.nomEquipe ";
        $params = array();
        $params = array('groupby' => $groupby, 'orderby'=>$orderby);
        $d['equipes'] = $this->modEquipe->find($params);
        // var_dump ($d['equipes']);

        if (empty($d['equipes'])) {
            $this->e404('Page introuvable');
        }

        $this->set($d);
        $this->render("liste");
    }

    private $modJoueur = null;
    
    function Equipe() {
        $this->modJoueur = $this->loadModel('Joueur');
        $projection = 'personne.nom, personne.prenom, joueur.idJoueur, equipe.nomEquipe, joueur.nbPoints';
        $orderby = 'joueur.nbPoints desc';
        if (isset($_GET["idEquipe"])) {
            $id=$_GET["idEquipe"];

    }
        if (isset($id)){
            $condition = "joueur.idEquipe=".$id; }
        else{
            $id ="";
            $condition = 1;
    }

        $params = array('conditions' => $condition, 'projection' => $projection, 'orderby' => $orderby);
        $d['joueurs'] = $this->modJoueur->find($params);

        if (empty($d['joueurs'])) {
            $this->e404('Page introuvable');
            $this->render ("Equipe");
        }

        //var_dump ($d['joueurs']);
       // var_dump ($id);

        $this->set($d);
    }

    function detail($id) {
        $idJoueur = trim($id);
        $visible = 1;
        $this->modJoueur = $this->loadModel('Joueur');
        $params = array();
        $projection = 'personne.nom, personne.prenom, personne.age, personne.mail, personne.adresse, joueur.licenceJoueur, joueur.nbPoints, equipe.nomEquipe, joueur.idJoueur';
        $conditions = array('idJoueur' => $idJoueur, 'visible' => $visible);
        $params = array('projection'=>$projection, 'conditions' => $conditions);
        $d['joueur'] = $this->modJoueur->findFirst($params);

        if (empty($d['joueur'])) {
            $this->e404('Informations inaccessibles');
        }
        $this->set($d);
    }
}
?>
