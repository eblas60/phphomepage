<?
// Nom : Php_Homepage
// Version : 1.2
// Date : 10/01/2001
// Auteur : Eric BLAS
// email : ericb@newsinvest.fr
// Description : Fichier d'ajout de rubrique de la homepage

require("config.inc.php3");
require("lang_$cfgLang.inc.php3");
?>
 <html>
 <head>
 <title>
<?print $cfgVersion;?>
 </title>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 </head>
 <body bgcolor="#<?print $cfgFondIndex?>" link="#<?print $cfglienIndex?>" vlink="#<?print $cfglienIndex?>" alink="#<?print $cfglienIndex?>">
<?
$query1            = "SELECT * FROM homepage WHERE nom = '$homepage'";
$req1              = mysql_query ($query1);
$rubriques_id      = mysql_result($req1,0,"rubriques_id");
?>
<?
if (isset($creer_nom))
 {if ($creer_nom == "")
   {print "$cfgfont_1_r <b>$langErrorRubNom</b> $cfgfont_fin <br>";
   }
  if ($position == "")
   {print "$cfgfont_1_r <b>$langErrorRubPosition</b> $cfgfont_fin <br>";
   }
  if ($creer_nom != "" && $position != "")
   {print "$cfgfont_1_r <b>$langRubOK</b> $cfgfont_fin <br>";
    $query4          = "INSERT INTO rubriques VALUES('','','$creer_nom','$position')";
    mysql_query ($query4);
    $new_rubrique_id = mysql_insert_id();
    if ($rubriques_id != "")
     {$old_rubriques_id = mysql_result($req1,0,"rubriques_id");
      $new_rubriques_id = "$rubriques_id"."-"."$new_rubrique_id";
     }
    else
     {$new_rubriques_id = "$new_rubrique_id";
     }
    $query5          = "UPDATE homepage SET rubriques_id='$new_rubriques_id' WHERE nom='$homepage'";
    mysql_query ($query5);
    $rubriques_id    = $new_rubriques_id;
    $creer_nom = "";
    $position = "";
   }
 }
if (isset($sup_rubrique))
 {if ($sup_rubrique == "")
   {print "$cfgfont_1_r <b>$langErrorRubSupp</b> $cfgfont_fin <br>";
   }
  else
   {print "$cfgfont_1_r <b>$langRubSupp</b> $cfgfont_fin <br>";
    $query6          = "UPDATE rubriques SET actif='1' WHERE id='$sup_rubrique'";
    mysql_query ($query6);
   }
 }
if (isset($choix_rubrique))
 {if ($choix_rubrique == "")
   {print "$cfgfont_1_r <b>$langErrorRubModif</b> $cfgfont_fin <br>";
   }
  elseif ($new_nom == "" OR $nvelle_position == "")
   {print "$cfgfont_1_r <b>$langErrorRubNomPlace</b> $cfgfont_fin <br>";
   }
  else
   {print "$cfgfont_1_r <b>$langModifRubOK</b> $cfgfont_fin <br>";
    $query7          = "UPDATE rubriques SET titre='$new_nom', position='$nvelle_position' WHERE id='$choix_rubrique'";
    mysql_query ($query7);
   }
 }
// $choix_rubrique $new_nom $nvelle_position
?>
<?
function choix_rubrique()
 {GLOBAL $homepage;
  GLOBAL $cfgBase;
  $query2       = "SELECT * FROM homepage WHERE nom = '$homepage'";
  $req2         = mysql_db_query ($cfgBase,$query2);
  $rubriques_id = mysql_result($req2,0,"rubriques_id");
  $rubrique     = explode ("-",$rubriques_id);
  $i            = 0;
  WHILE($i<count($rubrique))
   {$query3       = "SELECT * FROM rubriques WHERE id = $rubrique[$i]";
    $req3         = mysql_db_query ($cfgBase,$query3);
    $res3         = mysql_numrows($req3);
    $id           = mysql_result($req3,0,"id");
    $titre        = mysql_result($req3,0,"titre");
    $actif        = mysql_result($req3,0,"actif");
    if ($actif != 1)
     {print "<option value=\"$id\"> $titre</option>\n";
     }
    $i++;
   };
 }
?>
<?print "$cfgfont_3_n <b>$langRubrique</b> $cfgfont_fin"?>
 <form method="post" action="ajout_rubrique.php3" name="ajout_rubrique">
  <input type="hidden" name="homepage" value="<? print $homepage ?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><?print "$cfgfont_2_n $langNvelleRubrique $cfgfont_fin"?><br><br>
          <?print "$cfgfont_1_n $langNom $cfgfont_fin"?><input type="text" <?print $cfgFormulaire?> name="creer_nom" size="20" maxlength="255" value="<?print $creer_nom?>"><br>
          <?print "$cfgfont_1_n $langPlacerRubrique $cfgfont_fin"?><input type="text" <?print $cfgFormulaire?> name="position" size="2" maxlength="2" value="<?print $position?>"><br>
        <input type="submit" <?print $cfgFormulaire?> name="Submit" value="<?print $langCreer?>">
      </td>
      <td><?print "$cfgfont_1_n $langPlacerRubrique $cfgfont_fin"?>
         <table width="50%" border="2" cellspacing="3" cellpadding="0" bgcolor="#<?print $cfgFondGauche?>">
<?       $k = 0;
         WHILE($cfgNbrLignes != $k)
         {print "<tr valign=\"top\">\n";
          $case    = 1+($k*$cfgNbrColonnes);
          $largeur = 100/$cfgNbrColonnes;
          $l       = 0;
          WHILE($cfgNbrColonnes != $l)
           {$case1 = $case+$l;
            print "<td width=\"$largeur%\" align=\"center\" bgcolor=\"#$cfgFondIndex\">\n";
            print "$cfgfont_2_n<b>$case1</b>$cfgfont_fin";
            print "</td>\n";
            $l++;
           };
          print "</tr>\n";
          $k++;
         };
?>
        </table>
      </td>
    </tr>
  </table>
  </form>
<?if ($rubriques_id != "")
   {
?>
  <form method="post" action="ajout_rubrique.php3" name="sup_rubrique">
  <input type="hidden" name="homepage" value="<? print $homepage ?>">
  <?print "$cfgfont_2_n $langSuppRubrique $cfgfont_fin"?><br><br>
    <select name="sup_rubrique" <?print $cfgFormulaire?> size="1">
    <option  value="" selected><?print $langChoixRubrique?></option>
    <?choix_rubrique();?>
  </select>
  <br>
  <input type="submit" <?print $cfgFormulaire?> name="Submit" value="<?print $langSupprimer?>">
  </form>
  <form method="post" action="ajout_rubrique.php3" name="modif_rubrique">
  <input type="hidden" name="homepage" value="<? print $homepage ?>">
  <?print "$cfgfont_2_n $langModifUneRubrique $cfgfont_fin"?><br><br>
    <select name="choix_rubrique" <?print $cfgFormulaire?> size="1">
    <option value="" selected><?print $langChoixRubrique?></option>
    <?choix_rubrique();?>
  </select>
  <br>
  <?print "$cfgfont_1_n $langNom $cfgfont_fin"?>
  <input type="text" <?print $cfgFormulaire?> name="new_nom" size="20" maxlength="255">
  <?print "$cfgfont_1_n $langPlace $cfgfont_fin"?>
  <input type="text" <?print $cfgFormulaire?> name="nvelle_position" size="2" maxlength="2"><br>
  <input type="submit" <?print $cfgFormulaire?> name="Submit" value="<?print $langModifier?>">
 </form>
 <? }?>
 </body>
 </html>