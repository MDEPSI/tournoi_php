<?php

if(!isset($_REQUEST['action']))
     $action = 'accueil';
else
	$action = $_REQUEST['action'];

switch($action)
{
    case 'tableau':
    {
        // $classements = $api->getJoueurs();
        // var_dump($classements);
        include("views/v_tableau.php");
        break;
    }
}