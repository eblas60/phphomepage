<?
// Nom           : Php_Homepage
// Version       : 1.4
// Date          : 03/08/2001
// Auteur        : Eric BLAS
// email         : phphomepage@free.fr
// Description   : Votre homepage
//                 Your homepage

require("local.inc.php3");
include ($cfgInclude."config.inc.php3");
include ($cfgInclude."connect.inc.php3");
include ($cfgInclude."lib.inc.php3"); 
include ($cfgInclude."localisation/lang_".$cfgLangue.".inc.php3");

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
<? require($cfgInclude."stop_html.inc.php3") ?>