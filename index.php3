<?
// Nom : Php_Homepage
// Version : 1.2
// Date : 10/01/2001
// Auteur : Eric BLAS
// email : ericb@newsinvest.fr
// Description : Fichier d'identification

require("config.inc.php3");
require("lang_$cfgLang.inc.php3");

// creation des tables dans la base
$req = mysql_list_tables ($cfgBase );
$tables = mysql_num_rows ($req);

if ($tables == 0 )
 {$file = "homepage.sql";
  require("create_table.inc.php3");
 }
?>
 <html>
 <head>
 <title>
<?print $cfgVersion;?>
 </title>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 </head>
 <body bgcolor=<? print $cfgFondIndex?> link=<?print $cfglienIndex?> vlink=<?print $cfglienIndex?> alink=<?print $cfglienIndex?>>
 <p><?print "$cfgfont_3_n $langAccueil <b>$cfgVersion</b>  $cfgfont_fin"?></p>
 <p><?print "$cfgfont_2_n $langNvellePage $cfgfont_fin"?></p>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <form name="identification" method="post" action="php_homepage.php3">
  <tr>
    <td width="70"><?print "$cfgfont_1_n $langNom $cfgfont_fin"?></td>
      <td align="left">
        <input type="text" <?print $cfgFormulaire?> name="homepage" maxlength="255" size="20">
        <input type="submit" <?print $cfgFormulaire?> name="Submit" value="<?print $langCreer?>">
      </td>
  </tr>
  </form>
 </table>
 <br>
 <br>
 </body>
 </html>