<?
// Nom : Php_Homepage
// Version : 1.1
// Date : 09/01/2001
// Auteur : Eric BLAS
// email : ericb@newsinvest.fr
// Description : Fichier de navigation pour un ajout de homepage

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
 <body bgcolor="#<?print $cfgFondGauche?>" link="#<?print $cfglienGauche?>" vlink="#<?print $cfglienGauche?>" alink="#<?print $cfglienGauche?>">
 <p><?print "$cfgfont_3_b<b>$cfgVersion</b>$cfgfont_fin"?></p>
 <p><?print "$cfgfont_1_b $langPourNom<b>$homepage</b>$cfgfont_fin"?></p>
<?
if ($res1 == "" OR $rubriques_id == "")
  {?>
 <p><?print $cfgfont_1_b;?><a href="ajout_rubrique.php3?homepage=<?print $homepage?>" target="action"><?print $langAjoutRubrique?></a><?print $cfgfont_fin?></p>
 <p><?print $cfgfont_1_b;?><a href="ajout_lien.php3?homepage=<?print $homepage?>" target="action"><?print $langAjoutLiens?></a><?print $cfgfont_fin?></p>
<?}
else
  {?>
 <p><?print $cfgfont_1_b;?><a href="ajout_rubrique.php3?homepage=<?print $homepage?>" target="action"><?print $langModifRubrique?></a><?print $cfgfont_fin?></p>
 <p><?print $cfgfont_1_b;?><a href="ajout_lien.php3?homepage=<?print $homepage?>" target="action"><?print $langModifLiens?></a><?print $cfgfont_fin?></p>
<?}?>
 <p><?print $cfgfont_1_b;?><a href="mise_en_page.php3?homepage=<?print $homepage?>" target="action"><?print $langMiseEnPage?></a><?print $cfgfont_fin?></p>
 <p><?print $cfgfont_1_b;?><a href="homepage.php3?homepage=<?print $homepage?>" target="_blanck"><?print $langAffHomepage?></a><?print $cfgfont_fin?></p>
 <p><?print $cfgfont_1_b;?><a href="index.php3" target="_parent"><?print $langRetourIndex?></a><?print $cfgfont_fin?></p>
 </body>
 </html>