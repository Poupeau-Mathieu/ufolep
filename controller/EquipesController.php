<?php 
class EquipesController extends Controller
{
    private $modEquipe = null;


    function liste() 
    {
        //$this->filterAndGetUser(1);

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
}
?>