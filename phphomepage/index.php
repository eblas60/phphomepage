<?php
/**
 * [fr]Fichier d'accueil de php homepage
 * [en]File of reception of php homepage
 *
 * @copyright    15/11/2003
 * @since	     09/01/2001
 * @version      1.5
 * @module       index
 * @modulegroup  identification
 * @package      php_homepage
 * @access	     public
 * @author       Eric BLAS <webmaster@phphomepage.net>
 */
/**
 * [fr]Fichier qui contient divers paramètres locaux
 */
require_once('./local.inc.php');
/**
 * [fr]Fichier qui génére le code de l'entête HTML commun à tous les fichiers
 */
require_once(LOCAL_INCLUDE.'start_html.inc.php');
/**
 * [fr]Création des tables dans la base si elle n'y en a pas
 */
$tmp_req    = mysql_list_tables($cfg_Base );
$tmp_table  = mysql_num_rows($tmp_req);
if ($tmp_table == 0) {
    $file = LOCAL_INCLUDE.'homepage.sql';
    /**
     * [fr]Fichier de création de table fonctionnant pour les bases local
     * [en]File of creation of table functioning for the bases room
     */
    require_once(LOCAL_INCLUDE.'create_table.inc.php');
}
echo "\n";
echo '        <p>'.$cfg_font_3_n.$lang_Accueil.' <b>'.$cfg_Version.'</b>'.$cfg_font_fin."</p>\n";
echo '        <p>'.$cfg_font_2_n.$lang_NvellePage.$cfg_font_fin."</p>\n";
echo '        <form name="identification" method="post" action="php_homepage.php">'."\n";
echo '            <table width="100%" border="0" cellspacing="0" cellpadding="0">'."\n";
echo '                <tr>'."\n";
echo '                    <td width="100">'.$cfg_font_1_n.$lang_Nom.$cfg_font_fin.'</td>'."\n";
echo '                    <td><input type="text" '.$cfg_Formulaire.' name="homepage" maxlength="255" size="20"></td>'."\n";
echo '                </tr>'."\n";
echo '                <tr>'."\n";
echo '                    <td width="100">&nbsp;</td>'."\n";
echo '                    <td><input type="submit" '.$cfg_Formulaire.' name="Submit" value="'.$lang_Creer.'"></td>'."\n";
echo '                </tr>'."\n";
echo '            </table>'."\n";
echo '        </form>'."\n";
echo '        <p><a href="http://validator.w3.org/check/referer"><img border="0" src="http://www.w3.org/Icons/valid-html401" alt="Valid HTML 4.01!" height="31" width="88"></a></p>';
/**
 * [fr]Fichier qui génére le code de fin de page HTML commun à tous les fichiers
 */
require_once(LOCAL_INCLUDE.'stop_html.inc.php');
?>