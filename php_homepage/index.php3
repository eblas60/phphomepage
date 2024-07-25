<?
// Nom           : Php_Homepage
// Version       : 1.4
// Date          : 03/08/2001
// Auteur        : Eric BLAS
// email         : phphomepage@free.fr
// Description   : Fichier d'identification
//                 File of identification

require("local.inc.php3");
require($cfgInclude."start_html.inc.php3");

// creation des tables dans la base
$req = mysql_list_tables ($cfgBase );
$tables = mysql_num_rows ($req);

if ($tables == 0 )
 {$file = $cfgInclude."homepage.sql";
  require($cfgInclude."create_table.inc.php3");
 }
?>
 <p><? print $cfgfont_3_n.$langAccueil." <b>".$cfgVersion."</b>".$cfgfont_fin ?></p>
 <p><? print $cfgfont_2_n.$langNvellePage.$cfgfont_fin ?></p>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <form name="identification" method="post" action="php_homepage.php3">
  <tr>
    <td width="70"><? print $cfgfont_1_n.$langNom.$cfgfont_fin ?></td>
      <td align="left">
        <input type="text" <? print $cfgFormulaire ?> name="homepage" maxlength="255" size="20">
        <input type="submit" <? print $cfgFormulaire ?> name="Submit" value="<? print $langCreer ?>">
      </td>
  </tr>
  </form>
 </table>
<? require($cfgInclude."stop_html.inc.php3") ?>