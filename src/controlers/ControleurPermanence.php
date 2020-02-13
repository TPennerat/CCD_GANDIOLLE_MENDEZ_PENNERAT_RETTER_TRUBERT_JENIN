<?php
namespace epicerie\controlers;

use \epicerie\models\AssurePermanence as Permanence;
use \epicerie\models\Creneau as Creneau;
use \epicerie\models\Role as Role;

use epicerie\views\VuePermanence;
use epicerie\views\VueBesoins as VueBesoins;

use \Exception;
use Slim\Slim;


class ControleurPermanence {
  //Affiche la page de création d'un besoin
  function afficherCreationBesoin() {

    $creneaux = Creneau::select("*")->get();
    $roles = Role::select("*")->get();

    $tab = array();
    $tab[] = $creneaux;
    $tab[] = $roles;

    $view = new VuePermanence($tab);
    $view->render(1);

  }

  function creerBesoin() {

      $creneau = $_POST["creneau"];
      $role = $_POST["role"];

      $perm = new Permanence();
      $perm->idCreneau = $creneau;
      $perm->idRole = $role;
      $perm->save();

      $view = new VuePermanence();
      $view->render(1);

  }


  function afficherMesPermanences($id) {

    $perms = Permanence::where('idUtil','=',$_SESSION['id_connect'])->get();
    $view = new VuePermanence($perms);
    $view->render(2);

  }

  function afficherToutesLesPermanences() {

    $perms = Permanence::where('idUtil','=',null)->get();
    $view = new VueBesoins($perms);

    $view->render(1);

  }
}
