<?
// Nom           : Php_Homepage
// Version       : 1.4
// Date          : 03/08/2001
// Auteur        : Eric BLAS
// email         : phphomepage@free.fr
// Description   : Fichier de gestion des homepage
//                 File of management of the homepage

require("local.inc.php3");
require($cfgInclude."start_html.inc.php3");

if (empty($homepage))
    print $cfgfont_2_r.$langErreurNom.$cfgfont_fin;
else
   {
?>
  <table width="100%" height="100%"  border="0" cellspacing="0" cellpadding="5">
   <tr><td valign="top" bgcolor="#<?print $cfgFondGauche?>" height="100%" width="<?print $cfgwidthGauche?>">
     <?  require($cfgInclude."navig.inc.php3") ?>
   </td>
   <td  valign="top">
     <? if ($page == "rubrique")
             {require($cfgInclude."rubrique.inc.php3");}
        elseif ($page == "liens")
             {require($cfgInclude."liens.inc.php3");}
        elseif ($page == "page")
             {require($cfgInclude."page.inc.php3");}
        else
             {require($cfgInclude."main.inc.php3");} ?>
   </td>
    </tr>
</table>
<?  }
 require($cfgInclude."stop_html.inc.php3"); ?>