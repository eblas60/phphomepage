<?php
/**
 * [fr]Fichier de gestion des homepages
 * [en]File of management of the homepage
 *
 * @copyright    16/11/2003
 * @since	     09/01/2001
 * @version      1.5
 * @module       php_homepage
 * @modulegroup  php_homepage
 * @package      php_homepage
 * @access	     public
 * @author       Eric BLAS <webmaster@phphomepage.net>
 */
/**
 * [fr]Fichier qui contient divers param�tres locaux
 */
require_once('./local.inc.php');
/**
 * [fr]Fichier qui g�n�re le code de l'ent�te HTML commun � tous les fichiers
 */
require_once(LOCAL_INCLUDE.'start_html.inc.php');
echo "\n";
/**
 * [fr]Si le nom de la page n'est pas pass� par le formulaire on renvoie sur la page de d�marrage
 */
if (empty($homepage)) {
    echo '        '.$cfg_font_2_r.$lang_ErreurNom."<br>\n";
    echo '        <a href="index.php">index.php</a>'.$cfg_font_fin;
} else {
    echo '        <table width="100%" border="0" cellspacing="0" cellpadding="5">'."\n";
    echo '            <tr>'."\n";
    echo '                <td valign="top" bgcolor="#'.$cfg_FondGauche.'" width="'.$cfg_widthGauche.'">'."\n";
    /**
     * [fr]Fichier pour le menu de navigation
     */
    require_once(LOCAL_INCLUDE.'navig.inc.php');
    echo '                </td>'."\n";
    echo '                <td valign="top">'."\n";
    if (empty($page)) {
        $page = '';
    }
    if ($page == 'rubrique') {
        /**
         * [fr]Fichier pour la gestion des rubriques
         */
        require(LOCAL_INCLUDE.'rubrique.inc.php');
    } elseif ($page == 'liens') {
        /**
         * [fr]Fichier pour la gestion des liens
         */
        require(LOCAL_INCLUDE.'liens.inc.php');
    } elseif ($page == 'page') {
        /**
         * [fr]Fichier pour la gestion de la page
         */
        require(LOCAL_INCLUDE.'page.inc.php');
    } else {
        /**
         * [fr]Fichier par d�faut
         */
        require(LOCAL_INCLUDE.'main.inc.php');
    }
    echo '                </td>'."\n";
    echo '            </tr>'."\n";
    echo '        </table>';
}
/**
 * [fr]Fichier qui g�n�re le code de fin de page HTML commun � tous les fichiers
 */
require(LOCAL_INCLUDE.'stop_html.inc.php'); ?>