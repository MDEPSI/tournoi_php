<?php
/**
 * Classe d'accès aux données.

 * Utilise les services de la classe PDO
 * pour l'application Workshop2
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO
 * $monPdoGsb qui contiendra l'unique instance de la classe
 *
*/
class ApiTournoi
{
    private static $serveur='mysql:host=localhost';
    private static $bdd='dbname=tournoi_php';
    private static $user='root' ;
    private static $mdp='' ;
    private static $monPdo;
    private static $monApiTournoi = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */
private function __construct()
    {try{
            ApiTournoi::$monPdo = new PDO(ApiTournoi::$serveur.';'.ApiTournoi::$bdd, ApiTournoi::$user, ApiTournoi::$mdp);
            ApiTournoi::$monPdo->query("SET CHARACTER SET utf8");
           } catch (PDOException $e) {
        echo 'Échec lors de la connexion : ' . $e->getMessage();
    }
    }
    public function _destruct(){
        ApiTournoi::$monPdo = null;
    }
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instanceApiTournoi = ApiTournoi::getApiTournoi();
 * @return l'unique objet de la classe ApiTournoi
 */
	public  static function getApiTournoi()
	{
		if(ApiTournoi::$monApiTournoi == null)
		{
			ApiTournoi::$monApiTournoi= new ApiTournoi();
		}
		return ApiTournoi::$monApiTournoi;
    }

    /**login */
    // public function checkLogin($table, $login, $password) {
    //     $req = 'Select * from '.$table.' where login="'.$login.'" and password ="'.$password.'"';
    //     $res = ApiTournoi::$monPdo->query($req);
    //     $checkLogin = $res->fetch();
    //     if (empty($checkLogin)) {
    //         $rep = false;
    //     } else {
    //         $rep = true;
    //     }
	// 	return $rep;
    // }
    /** */

    /**joueurs */
    public function getJoueurs()
	{
		$req = "select * from joueur order by classement, id";
		$res = ApiTournoi::$monPdo->query($req);
		$joueurs = $res->fetchAll();
		return $joueurs;
    }
    public function createJoueur($rang, $nom, $prenom, $classement)
	{
		$req = "insert into joueur (RANG, NOM, PRENOM, CLASSEMENT) values ('$rang', '$nom', '$prenom', '$classement')" ;
        $res = ApiTournoi::$monPdo->exec($req);
        return $res;

    }
    public function updateJoueur($classement, $id)
    {
        $req = "update joueur set CLASSEMENT = '".$classement."' where id ='".$id."' ";
        $res = ApiTournoi::$monPdo->exec($req);
    }
    public function updateJoueurRang($rang, $id)
    {
        $req = "update joueur set RANG = '".$rang."' where id ='".$id."' ";
        $res = ApiTournoi::$monPdo->exec($req);
    }
    public function getJoueurRang($rang)
	{
		$req = "select * from joueur where rang='".$rang."'";
		$res = ApiTournoi::$monPdo->query($req);
		$joueur = $res->fetch();
		return $joueur;
    }
    public function getJoueur($id)
	{
		$req = "select * from joueur where id='".$id."'";
		$res = ApiTournoi::$monPdo->query($req);
		$joueur = $res->fetch();
		return $joueur;
    }
    public function deleteJoueurs()
    {
        $req = "delete from joueur";
        $res = ApiTournoi::$monPdo->exec($req);
    }
    /** */

    /**match */
    public function getMatchs()
	{
		$req = "select num, tour, tournoi_php.match.end as end, tournoi_php.match.index as index_match, joueur1, rang_joueur1, j1.nom as j1_nom, j1.prenom as j1_prenom, joueur2, rang_joueur2, j2.nom as j2_nom, j2.prenom as j2_prenom from tournoi_php.match join joueur as j1 on match.joueur1=j1.id join joueur as j2 on match.joueur2=j2.id order by num";
		$res = ApiTournoi::$monPdo->query($req);
		$matchs = $res->fetchAll();
		return $matchs;
    }
    public function createMatch($rang, $nom, $prenom, $classement)
	{
        $req = "insert into match (RANG, NOM, PRENOM, CLASSEMENT)
                values ('$rang', '$nom', '$prenom', '$classement')" ;
        $res = ApiTournoi::$monPdo->exec($req);
        return $res;

    }
    public function updateMatch($idJoueur, $tour, $rangJoueur, $_j)
    {
        $req = "update tournoi_php.match set joueur".$_j." = ".$idJoueur." where rang_joueur".$_j." ='".$rangJoueur."' and tour='".$tour."' ";
        $res = ApiTournoi::$monPdo->exec($req);
        return $res;
    }
    public function updateMatchEnd($idJoueur, $tour, $end)
    {
        $req = "update tournoi_php.match set end = ".$end." where tour='".$tour."' and (joueur1 ='".$idJoueur."' or joueur2 ='".$idJoueur."') ";
        $res = ApiTournoi::$monPdo->exec($req);
        return $res;
    }
    public function updateMatchs()
    {
        $req = "update tournoi_php.match set joueur1 = null, joueur2 = null, end = null";
        $res = ApiTournoi::$monPdo->exec($req);
        return $res;
    }
    public function getMatch($num)
	{
		$req = "select * from match where num='".$num."'";
		$res = ApiTournoi::$monPdo->query($req);
		$match = $res->fetch();
		return $match;
    }
    /** */

    /**joueur order by classement */
}