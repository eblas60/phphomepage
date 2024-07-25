<?
// Nom : Php_Homepage
// Version : 1.2
// Date : 10/01/2001
// Auteur : Eric BLAS
// email : ericb@newsinvest.fr
// Description : Votre homepage

require("config.inc.php3");
require("lang_$cfgLang.inc.php3");

$query1          = "SELECT * FROM homepage WHERE nom = '$homepage'";
$req1            = mysql_query ($query1);
$mise_en_page_id = mysql_result($req1,0,"mise_en_page_id");
$query2          = "SELECT * FROM mise_en_page WHERE id = '$mise_en_page_id'";
$req2            = mysql_query ($query2);
$fond            = mysql_result($req2,0,"fond");
$couleur_titre   = mysql_result($req2,0,"couleur_titre");
$taille_titre    = mysql_result($req2,0,"taille_titre");
$couleur_lien    = mysql_result($req2,0,"couleur_lien");
$taille_lien     = mysql_result($req2,0,"taille_lien");
$police          = mysql_result($req2,0,"police");
$titre           = mysql_result($req2,0,"titre");
$target          = mysql_result($req2,0,"target");
$font_rubrique   = "<font face=\"$police\" size=\"$taille_titre\" color=\"#$couleur_titre\">";
$font_lien       = "<font face=\"$police\" size=\"$taille_lien\" color=\"#$couleur_lien\">";
?>
 <html>
 <head>
 <title>
<?if ($titre != "")
   {print "$titre";
   }
  else
   {print "$cfgVersion";
   }?>
 </title>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 </head>
 <body bgcolor="#<?print $fond?>" link="#<?print $couleur_lien?>" vlink="#<?print $couleur_lien?>" alink="#<?print $couleur_lien?>">
<?
function create_case($case)
 {GLOBAL $homepage;
  GLOBAL $cfgBase;
  GLOBAL $font_rubrique;
  GLOBAL $font_lien;
  GLOBAL $cfgfont_fin;
  GLOBAL $target;
  $query3       = "SELECT * FROM homepage WHERE nom = '$homepage'";
  $req3         = mysql_db_query ($cfgBase,$query3);
  $rubriques_id = mysql_result($req3,0,"rubriques_id");
  $rubrique     = explode ("-",$rubriques_id);
  $i            = 0;
  WHILE($i<count($rubrique))
   {$query4       = "SELECT * FROM rubriques WHERE id = $rubrique[$i] AND actif = '' AND position = '$case' ORDER BY titre";
    $req4         = mysql_db_query ($cfgBase,$query4);
    $res4         = mysql_numrows($req4);
    if ($res4 !=0)
     {$nom_rubrique = mysql_result($req4,0,"titre");
      print "<p> $font_rubrique <b>$nom_rubrique</b> $cfgfont_fin</p>\n";
      $query5       = "SELECT * FROM liens WHERE rubrique_id = '$rubrique[$i]' ORDER BY titre";
      $req5         = mysql_db_query ($cfgBase,$query5);
      $res5         = mysql_numrows($req5);
      $j            = 0;
      WHILE($res5 != $j)
       {$nom_lien     = mysql_result($req5,$j,"titre");
        $url          = mysql_result($req5,$j,"url");
        $actif        = mysql_result($req5,$j,"actif");
        if ($actif != 1)
         {if ($target != 1)
           {print "$font_lien<a href=\"$url\" target=\"_blank\">$nom_lien</a>$cfgfont_fin<br>\n";
           }
          else
           {print "$font_lien<a href=\"$url\" target=\"_self\">$nom_lien</a>$cfgfont_fin<br>\n";
           }
         }
        $j++;
       };
     }
    $i++;
   };
  print "<br>";
 }
?>
 <table width="100%" border="0" cellspacing="5" cellpadding="0">
<?$k = 0;
  WHILE($cfgNbrLignes != $k)
     {print "<tr valign=\"top\">\n";
      $case    = 1+($k*$cfgNbrColonnes);
      $largeur = 100/$cfgNbrColonnes;
      $l       = 0;
      WHILE($cfgNbrColonnes != $l)
         {$case1 = $case+$l;
          print "<td width=\"$largeur%\">\n";
          create_case($case1);
          print "</td>\n";
          $l++;
         };
      print "</tr>\n";
      $k++;
     };
?>
 </table>
 <br>
 <div align="right"><font face="<? print $police?>" color="#<? print $couleur_titre?>" size="1"><?print "$homepage - $langRealiser $cfgVersion $cfgfont_fin";?></div>
 </body>
 </html>