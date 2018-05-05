<?php

if(!isset($_REQUEST['action']))
     $action = 'accueil';
else
	$action = $_REQUEST['action'];

switch($action)
{
    case 'match':
    {
        $matchs = $api->getMatchs();
        include("views/v_match.php");
        break;
    }
    case 'valider':
    {
        $classementJoueur = 0;
        
        /**changer les tours ? */
        /**if moitié du tour */
        if ($_POST['index'] <= (16 / ($_POST['tour']+1))) {
            if ($_POST['index'] <= (16 / (($_POST['tour']+1)*2))) {
                $_j = 1;
                $_j_p = 2;
            } else {
                $_j = 2;
                $_j_p = 1;
            }

        } /** else if moitié base du tour */ elseif ($_POST['index'] > (16 / ($_POST['tour']+1))) {
            if ($_POST['index'] <= ((16 / ($_POST['tour']+1))+(16/(($_POST['tour'])+1)*2))) {
                $_j = 2;
                $_j_p = 1;
            } else {
                $_j = 1;
                $_j_p = 2;
            }

        }
        if ($_POST['tour']>8 && $_POST['tour']<=11) {
            $classementJoueur = 0;
        } else if ($_POST['tour']>11 && $_POST['tour']<=15) {
            $classementJoueur = 8;
        }
        $tour = $_POST['tour']*2; /***2+1 si perdant */

        /**déterminer vainqueur et perdant */
        $idJoueur = $_POST['vainqueur'];
        if ($idJoueur == $_POST['joueur1']) {
            $idPerdant = $_POST['joueur2'];
        } elseif ($idJoueur == $_POST['joueur2']) {
            $idPerdant = $_POST['joueur1'];
        }

        /**on récupère les joueurs */
        $joueur = $api->getJoueur($idJoueur);
        $joueurPerdant = $api->getJoueur($idPerdant);

        /**mettre à jour le vainqueur */
        $classementJoueur = $classementJoueur + ($tour%(16/2)) + 1;
        $rang = MIN($joueur['rang'],$joueurPerdant['rang']);
        $match = $api->updateMatch($idJoueur, $tour, $rang, $_j);
        $jou = $api->updateJoueur($classementJoueur, $idJoueur);
        $jou = $api->updateJoueurRang($rang, $idJoueur);
        $mat = $api->updateMatchEnd($idJoueur, $_POST['tour'], true);
        var_dump($idJoueur, $tour, $joueur['rang'], $_j, $joueur);
        var_dump($match);

        /**mettre à jour le perdant */
        $classementPerdant = $classementJoueur+1;
        $rangPerdant = MAX($joueur['rang'],$joueurPerdant['rang']);
        $match = $api->updateMatch($idPerdant, $tour+1, $rangPerdant, $_j_p);
        $jou = $api->updateJoueur($classementPerdant, $idPerdant);
        $jou = $api->updateJoueurRang($rangPerdant, $idPerdant);
        // $mat = $api->updateMatchEnd($idPerdant, $_POST['tour'], true);
        var_dump($idPerdant, $tour, $joueurPerdant['rang'], $_j_p, $joueurPerdant);
        var_dump($match);
        // die;
        header('location: ?uc=match&action=match');
        break;
    }
}
?>