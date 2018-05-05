<?php

if(!isset($_REQUEST['action']))
     $action = 'accueil';
else
	$action = $_REQUEST['action'];

switch($action)
{
    case 'classement':
    {
        $classements = $api->getJoueurs();
        // var_dump($classements);
        include("views/v_classement.php");
        break;
    }
}