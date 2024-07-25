<?php
/**
 * [fr]Votre page de d�marrage
 * [en]Your homepage
 *
 * @copyright    12/03/2012
 * @since	 09/01/2001
 * @version      1.7
 * @module       homepage
 * @modulegroup  homepage
 * @package      php_homepage
 * @access	 public
 * @author       Eric BLAS <webmaster@phphomepage.net>
 */
if (empty($homepage)){
    if (!empty($_REQUEST['homepage'])) {
        $homepage = $_REQUEST['homepage'];
    }
}
if (empty($homepage)){
    header ("Location: index.php");
}
/**
 * [fr]Fichier qui contient divers param�tres locaux
 */
require_once('./local.inc.php');
/**
 * [fr]Fichier de configuration de Php homepage
 */
require_once (LOCAL_INCLUDE.'config.inc.php');
/**
 * [fr]Fichier qui contient la librairie des fonctions communes
 */
require_once (LOCAL_INCLUDE.'lib.inc.php');
/**
 * [fr]Fichier de connection � la base
 */
require_once (LOCAL_INCLUDE.'connect.inc.php');
/**
 * [fr]Fichier qui contient la traduction de Php Homepage dans la langue choisi
 */
require_once (LOCAL_INCLUDE.'localisation/lang_'.$cfg_Langue.'.inc.php');
/**
 * [fr]R�cup�ration des infos pour g�n�rer la page
 */
$query1          = 'SELECT mise_en_page_id FROM homepage WHERE nom = \''.$homepage.'\'';
$req1            = mysql_query ($query1);
$mise_en_page_id = mysql_result($req1,0,"mise_en_page_id");
$query2          = 'SELECT fond, couleur_titre, taille_titre, couleur_lien, taille_lien, police, titre, target FROM mise_en_page WHERE id = \''.$mise_en_page_id.'\'';
$req2            = mysql_query ($query2);
$fond            = mysql_result($req2,0,'fond');
$couleur_titre   = mysql_result($req2,0,'couleur_titre');
$taille_titre    = mysql_result($req2,0,'taille_titre');
$couleur_lien    = mysql_result($req2,0,'couleur_lien');
$taille_lien     = mysql_result($req2,0,'taille_lien');
$police          = mysql_result($req2,0,'police');
$titre           = mysql_result($req2,0,'titre');
$target          = mysql_result($req2,0,'target');
$font_rubrique   = '<font face="'.$police.'" size="'.$taille_titre.'" color="#'.$couleur_titre.'">';
$font_lien       = '<font face="'.$police.'" size="'.$taille_lien.'" color="#'.$couleur_lien.'">';
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'."\n";
echo '<html>'."\n";
echo '    <head>'."\n";
echo '        <title>';
if ($titre != '') {
    echo $titre;
} else {
    echo $cfg_Version;
   }
echo '</title>'."\n";
echo '        <meta http-equiv="Content-Type" content="text/html; charset='.$cfg_charset.'" />'."\n";
echo '        <meta name="robots" content="noindex, nofollow" />'."\n";
echo '        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />'."\n";
echo '        <style type="text/css">'."\n";
echo '            <!--'."\n";
echo '                body {'."\n";
echo '                    background-color: #'.$fond.";\n";
echo '                }'."\n";
echo '                a, a:focus, a:hover {'."\n";
echo '                    display: block;'."\n";
echo '                    color: #'.$couleur_lien.";\n";
echo '                    text-decoration: none;'."\n";
echo '                }'."\n";
echo '                a.inline {'."\n";
echo '                    display: inline-block;'."\n";
echo '                }'."\n";
echo '                a:hover {'."\n";
echo '                    text-decoration: underline;'."\n";
echo '                }'."\n";
echo '                table {'."\n";
echo '                    width: 100%;'."\n";
echo '                }'."\n";
echo '                tr {'."\n";
echo '                    margin: 5px;'."\n";
echo '                    vertical-align: top;'."\n";
echo '                }'."\n";
echo '                td {'."\n";
echo '                    color: #'.$couleur_lien.";\n";
echo '                    vertical-align: top;'."\n";
echo '                }'."\n";
echo '            -->'."\n";
echo '          </style>'."\n";
echo '    </head>'."\n";
echo '    <body>'."\n";
echo '        <table>'."\n";
$k = 0;
while($cfg_NbrLignes != $k) {
    echo '            <tr>'."\n";
    $case    = 1 + ($k * $cfg_NbrColonnes);
    $largeur = 100 / $cfg_NbrColonnes;
    $l       = 0;
    while($cfg_NbrColonnes != $l) {
        $case1 = $case + $l;
        echo '                <td width="'.$largeur.'%">'."\n";
        create_case($case1);
        echo '                </td>'."\n";
        $l++;
    }
    echo "            </tr>\n";
    $k++;
}
echo '        </table>'."\n";
echo '        <br />'."\n";
echo '        <p align="right"><font face="'.$police.'" color="#'.$couleur_titre.'" size="1">'.$homepage.' - '.$lang_Realiser.' '.$cfg_Version.$cfg_font_fin.'</p>';
require_once(LOCAL_INCLUDE.'stop_html.inc.php') ?>
