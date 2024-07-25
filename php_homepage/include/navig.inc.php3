<?
// Nom           : Php_Homepage
// Version       : 1.4
// Date          : 03/08/2001
// Auteur        : Eric BLAS
// email         : phphomepage@free.fr
// Description   : Fichier de navigation pour un ajout de homepage
//                 File of navigation for an addition of homepage

$query1            = "SELECT * FROM homepage WHERE nom = '$homepage'";
$req1              = mysql_query ($query1);
$res1              = mysql_numrows($req1);
if ($res1 != "")
    $rubriques_id      = mysql_result($req1,0,"rubriques_id");
?>
 <p><? print $cfgfont_3_b."<b>".$cfgVersion."</b>".$cfgfont_fin ?></p>
 <p><? print $cfgfont_1_b.$langPourNom."<b>".$homepage."</b>".$cfgfont_fin ?></p>
<?
if ($res1 == "" OR $rubriques_id == "")
  {?>
 <p><a href="php_homepage.php3?homepage=<?print $homepage?>&page=rubrique"><?print $cfgfont_1_b.$langAjoutRubrique.$cfgfont_fin ?></a></p>
 <p><a href="php_homepage.php3?homepage=<?print $homepage?>&page=lien"><?print $cfgfont_1_b.$langAjoutLien.$cfgfont_fin ?></a></p>
<?}
else
  {?>
 <p><a href="php_homepage.php3?homepage=<?print $homepage?>&page=rubrique"><?print $cfgfont_1_b.$langModifRubrique.$cfgfont_fin ?></a></p>
 <p><a href="php_homepage.php3?homepage=<?print $homepage?>&page=liens"><?print $cfgfont_1_b.$langModifLiens.$cfgfont_fin ?></a></p>
<?}?>
 <p><a href="php_homepage.php3?homepage=<?print $homepage?>&page=page"><?print $cfgfont_1_b.$langMiseEnPage.$cfgfont_fin ?></a></p>
<?
if ($res1 != "" AND $rubriques_id != "")
  {?>
 <p><a href="homepage.php3?homepage=<?print $homepage?>" target="_blanck"><?print $cfgfont_1_b.$langAffHomepage.$cfgfont_fin ?></a></p>
<?}?>
 <p><a href="index.php3" target="_parent"><?print $cfgfont_1_b.$langRetourIndex.$cfgfont_fin ?></a></p>