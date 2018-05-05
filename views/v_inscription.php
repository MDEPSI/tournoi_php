<meta charset="utf-8"><!-- TO DO : header -->
<h1>Pointage</h1>
<?php $i = 1?>
<form method="post" action="index.php?uc=inscription&action=inscription">
    <table border="1px" >
    <?php for ($i = 1; $i <= 16; $i++)
    { ?>
        <tr>
            <td><label><b>JOUEUR <?php echo $i?> : </b></label></td>
            <td><label>Nom : </label></td>
            <td><input name="nom<?php echo $i?>" type="text" placeholder="NOM" ></input></td>
            <td><label>Prénom : </label></td>
            <td><input name="prenom<?php echo $i?>" type="text" placeholder="PRÉNOM" ></input></td>
        </tr>
    <?php 
    } ?>
        <tr>
            <td colspan="5" align="center"><input type="submit" value="ENVOYER"></input></td>
        </tr>
    </table>
        

    
</form>
<!-- <a href="{{ path('tournoiMatch') }}">Match</a> -->