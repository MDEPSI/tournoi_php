<?php
require_once("models/api.php");
$api = ApiTournoi::getApiTournoi();
// session_start();

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

switch($uc)
{
    // default
    // case 'connexion':
	// 	{
    //         include("controllers/cSeConnecter.php");
    //         break;
    //     }

	case 'accueil':
		{
            // include("views/bandeau.php");
            include("views/v_accueil.php");
            break;
        }

	case 'inscription':
		{
            // include("views/bandeau.php");
            include("controllers/c_inscription.php");
            break;
        }

	case 'match':
		{
            // include("views/bandeau.php");
            include("controllers/c_match.php");
            break;
        }

	case 'tableau':
		{
            // include("views/bandeau.php");
            include("controllers/c_tableau.php");
            break;
        }

	case 'classement':
		{
            // include("views/bandeau.php");
            include("controllers/c_classement.php");
            break;
        }

}
?>