<?php

if(!isset($_REQUEST['action']))
     $action = 'accueil';
else
	$action = $_REQUEST['action'];

switch($action)
{
    case 'init':
    {
        // include("views/bandeau.php");
        include("views/v_inscription.php");
        break;
    }
	case 'inscription':
		{
            $api->updateMatchs();
            $api->deleteJoueurs();
            $tour = 1;
            // include("views/bandeau.php");
            for ($i = 1; $i <= 16; $i++) {
                $rang = $i;
                $nom = $_POST['nom'.$i];
                $prenom = $_POST['prenom'.$i];
                $classement = 0;
                $api->createJoueur($rang, $nom, $prenom, $classement);
                $joueur = $api->getJoueurRang($rang);
                // var_dump($joueur);
                for ($j=1; $j <= 8; $j++) { 
                    if ($rang == $j) {
                        $_j = 1;
                    } elseif ($rang+$j == 17) {
                        $_j = 2;
                    }
                    $match = $api->updateMatch($joueur['id'], $tour, $rang, $_j);
                    /**if $_j == 1 --> rang j1 */
                    /**if $_j == 2 --> rang j2 */
                }
                
                /**joueur / tour (ici -> 1) / match /j1 ou j2 */
                /**where tour 1 ? / $i --> num du match ? / $_j -> j1 ou j2*/
            }
            // die;
            
            header('location: ?uc=match&action=match');
            
            break;
        }
}
?>