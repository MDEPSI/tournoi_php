<meta charset="utf-8"><!-- TO DO : header -->

<h1 align="center">Classement</h1>
<a href="index.php?uc=accueil"><input type="button" value="Accueil" ></input></a>

<table border="4px" align="center" width="50%">
        <tr>
            <td>Classement</td>
            <td>Nom</td>
            <td>Prénom</td>
        </tr>
        <?php foreach ($classements as $classement) {
        ?>
        <tr>
            <td>
                <?php echo $classement['classement']?>
            </td>
            <td>
                <?php echo $classement['nom'].' '.$classement['prenom']?>
            </td>
            <td>
                <?php echo $classement['prenom']?>
            </td>
        </tr>
        <?php
        }
        ?>
</table>