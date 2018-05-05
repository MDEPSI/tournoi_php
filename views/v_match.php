<meta charset="utf-8"><!-- TO DO : header -->

<h1 align="center">Match</h1>
<a href="index.php?uc=classement&action=classement"><input type="button" value="Classement" ></input></a>

<table border="4px" align="center" width="50%">
        <tr>
            <td>Num du match</td>
            <td>Tour</td>
            <td>Joueur 1</td>
            <td>Joueur 2</td>
            <td>Vainqueur</td>
        </tr>
        <?php foreach ($matchs as $match) {
        ?>
        <tr>
            <td>
                <?php echo $match['num']?>
            </td>
            <td>
                <?php echo $match['tour']?>
            </td>
            <td>
                <?php echo $match['j1_nom'].' '.$match['j1_prenom']?>
            </td>
            <td>
                <?php echo $match['j2_nom'].' '.$match['j2_prenom']?>
            </td>
            <td>
                <form method="post" action="index.php?uc=match&action=valider">
                    <input type="hidden" name="num" value="<?php echo $match['num'] ?>"></input>
                    <input type="hidden" name="tour" value="<?php echo $match['tour']?>"></input>
                    <input type="hidden" name="index" value="<?php echo $match['index_match']?>"></input>
                    <input type="hidden" name="joueur1" value="<?php echo $match['joueur1']?>"></input>
                    <input type="hidden" name="joueur2" value="<?php echo $match['joueur2']?>"></input>
                    <?php 
                    if (!$match['end']) {
                    ?>
                    <input type="radio" name="vainqueur" value="<?php echo $match['joueur1']?>" required><?php echo $match['j1_nom']?></input>
                    <input type="radio" name="vainqueur" value="<?php echo $match['joueur2']?>" required><?php echo $match['j2_nom']?></input>
                    <button type="submit" name="valider" value="Valider">Valider</button>
                    <?php
                    } else {
                        echo "Match terminé !";
                    }
                    ?>
                </form>
            </td>
        </tr>
        <?php
        }
        ?>
</table>
<!-- <a href="index.php?uc=tableau&action=tableau">Tableau</a> -->