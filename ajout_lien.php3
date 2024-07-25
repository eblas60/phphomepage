<?
// Nom : Php_Homepage
// Version : 1.2
// Date : 10/01/2001
// Auteur : Eric BLAS
// email : ericb@newsinvest.fr
// Description : Fichier d'ajout de liens de la homepage

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
<?
function choix_lien()
 {GLOBAL $rubriques_id;
  GLOBAL $cfgBase;
  $rubrique     = explode ("-",$rubriques_id);
  $i            = 0;
  WHILE($i<count($rubrique))
   {$query3       = "SELECT * FROM liens WHERE rubrique_id = $rubrique[$i]";
    $req3         = mysql_db_query ($cfgBase,$query3);
    $res3         = mysql_numrows($req3);
    $j            = 0;
    WHILE($res3 != $j)
     {
      $id           = mysql_result($req3,$j,"id");
      $titre        = mysql_result($req3,$j,"titre");
      $actif        = mysql_result($req3,$j,"actif");
      if ($actif != 1)
       {print "<option value=\"$id\"> $titre</option>\n";
       }
     $j++;
     }

    $i++;
   };
 }
?>
<?
if ($rubriques_id == "")
   {print "$cfgfont_1_r <b>$langErrorLienRub</b> $cfgfont_fin <br>";
   }
if (isset($sup_lien))
 {if ($sup_lien == "")
   {print "$cfgfont_1_r <b>$langErrorRubNom</b> $cfgfont_fin <br>";
   }
  else
   {print "$cfgfont_1_r <b>$langLienSupOK</b> $cfgfont_fin <br>";
    $query6          = "UPDATE liens SET actif='1' WHERE id='$sup_lien'";
    mysql_query ($query6);
   }
 }
if (isset($titre))
 {if ($titre == "" OR $url == "http://" OR $url == "" OR $rubrique == "")
   {if ($titre == "")
     {print "$cfgfont_1_r <b>$langLienNom</b> $cfgfont_fin <br>";
     }
    if ($url == "" OR $url == "http://")
     {print "$cfgfont_1_r <b>$langLienURL</b> $cfgfont_fin <br>";
     }
    if ($rubrique == "")
     {print "$cfgfont_1_r <b>$langLienRub</b> $cfgfont_fin <br>";
    }
   }
  else
   {print "$cfgfont_1_r <b>$langLienOK</b> $cfgfont_fin <br>";
    $query7          = "INSERT INTO liens VALUES('','','$titre','$rubrique','$url')";
    mysql_query ($query7);
   }
 }
?>
<?print "$cfgfont_3_n <b>$langLien</b> $cfgfont_fin"?>
 <form method="post" action="ajout_lien.php3" name="ajout_lien">
  <input type="hidden" name="homepage" value="<? print $homepage ?>">
  <?print "$cfgfont_2_n $langLienNew $cfgfont_fin"?><br><br>
  <?print "$cfgfont_1_n $langNom $cfgfont_fin"?><input type="text" <?print $cfgFormulaire?> name="titre"  size="20" maxlength="255"><br>
  <input type="text" <?print $cfgFormulaire?> name="url" size="50" maxlength="255" value="http://">
  <br>
  <select name="rubrique" <?print $cfgFormulaire?> size="1">
    <option  value="" selected><?print $langChoixRubrique?></option>
    <?choix_rubrique();?>
  </select><br>
  <input type="submit" <?print $cfgFormulaire?> name="Submit" value="<?print $langCreer?>">
 </form>
 <form method="post" action="ajout_lien.php3" name="sup_lien">
  <input type="hidden" name="homepage" value="<? print $homepage ?>">
  <?print "$cfgfont_2_n $langLienSup $cfgfont_fin"?><br><br>
  <select name="sup_lien" <?print $cfgFormulaire?> size="1">
    <option selected><?print $langLienChoix?></option>
    <?choix_lien();?>
  </select><br>
  <input type="submit" <?print $cfgFormulaire?> name="Submit" value="<?print $langSupprimer?>">
 </form>
 </body>
 </html>