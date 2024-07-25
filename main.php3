<?
// Nom : Php_Homepage
// Version : 1.1
// Date : 09/01/2001
// Auteur : Eric BLAS
// email : ericb@newsinvest.fr
// Description : Fichier d'accueil de création de homepage

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
<?
$query1            = "SELECT * FROM homepage WHERE nom = '$homepage'";
$req1              = mysql_query ($query1);
$res1              = mysql_numrows($req1);
if ($res1 != "")
 {$rubriques_id      = mysql_result($req1,0,"rubriques_id");
 }
?>
 <body bgcolor="#<?print $cfgFondIndex?>" link="#<?print $cfglienIndex?>" vlink="#<?print $cfglienIndex?>" alink="#<?print $cfglienIndex?>">
<?
if ($res1 == "" OR $rubriques_id == "")
  {?>
<?$query1 = "INSERT INTO homepage VALUES('','$homepage','','')";
  mysql_query ($query1);
?>
 <p><?print "$cfgfont_3_n $langAccueil <b>$cfgVersion</b>$cfgfont_fin"?></p>
 <p><?print "$cfgfont_1_n $lang1 $cfgfont_fin"?></p>
 <p><?print "$cfgfont_1_n $lang2 $cfgfont_fin"?></p>
 <p><?print "$cfgfont_1_n $lang3 $cfgfont_fin"?></p>
 <p><?print "$cfgfont_1_n $lang4 $cfgfont_fin"?></p>
<?}
else
  {
  print "<p>$cfgfont_2_n $langConstituer1 <b>$homepage</b> $langConstituer2 $cfgfont_fin</p>";
  $query1       = "SELECT * FROM homepage WHERE nom = '$homepage'";
  $req1         = mysql_query ($query1);
  $rubriques_id = mysql_result($req1,0,"rubriques_id");
  $rubrique     = explode ("-",$rubriques_id);
  $i            = 0;
  WHILE($i<count($rubrique))
   {$query2         = "SELECT * FROM rubriques WHERE id = $rubrique[$i]";
    $req2           = mysql_query ($query2);
    $nom_rubrique   = mysql_result($req2,0,"titre");
    $place_rubrique = mysql_result($req2,0,"position");
    $actif          = mysql_result($req2,0,"actif");
    if ($actif != 1)
     {print "<p>$cfgfont_1_n <b>$nom_rubrique</b> $langPosition $place_rubrique $cfgfont_fin</p>\n";
      $query3         = "SELECT * FROM liens WHERE rubrique_id = '$rubrique[$i]'";
      $req3           = mysql_query ($query3);
      $res3           = mysql_numrows($req3);
      $j              = 0;
      WHILE($res3 != $j)
       {$nom_lien       = mysql_result($req3,$j,"titre");
        $url            =  mysql_result($req3,$j,"url");
        $actif          = mysql_result($req3,$j,"actif");
        if ($actif != 1)
         {print "$cfgfont_1_n <a href=\"$url\" target=\"_blank\">$nom_lien</a> - url = $url $cfgfont_fin<br>\n";
         }
        $j++;
       };
      }
    $i++;
   };
 }
?>
 </body>
 </html>