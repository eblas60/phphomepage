<?php
/**
 * [fr]Fichier de configuration
 * [en]File configuration
 *
 * @copyright    04/01/2013
 * @since	     09/01/2001
 * @version      1.7
 * @module       config
 * @modulegroup  include
 * @package      php_homepage
 * @access	     public
 * @author       Eric BLAS <webmaster@phphomepage.net>
 */


// Param�tre de connexion � la base / Parameter of connection to the base
// MySQL

$cfg_Host       = 'localhost';               // Host MySQL
$cfg_User       = 'login';               // User MySQL
$cfg_Pass       = 'password';               // Pass MySQL
$cfg_Base       = 'phphomepage';               // Base MySQL

// Langues / Language
$cfg_Langue = 'fr'; // Choix de la langue fran�ais
//$cfg_Langue = 'en'; // Choice of the english language
//$cfg_Langue = 'ru'; // Choice of the russian language
if ($cfg_Langue == 'ru')
    $cfg_charset = 'windows-1251';
else
    $cfg_charset = 'iso-8859-1';

// Environnement
// Environment
$cfg_Version     = 'Php Homepage v1.7';

// Couleur de fond de cellule pour les tableaux
// Background color of cell for the table
$cfg_Tableau     = 'EEEEEE';

// Colonne de gauche
// Left-hand column
$cfg_widthGauche = '170px';         // Taille de la colonne en pixels ou en %
                                   // Column size in pixels or in %
$cfg_FondGauche  = '3399CC';        // Couleur de fond
                                   // Background color
$cfg_lienGauche  = 'FFCC66';        // Couleur des liens
                                   // Links color
// Colonne de droite et index
// Column of right-hand side and index
$cfg_widthDroit  = '*';             // taille de la colonne en pixels ou en %
                                   // column size in pixels or in %
$cfg_FondIndex   = 'FFFFFF';        // Couleur de fond
                                   // Background color
$cfg_linkIndex   = '0000FF';       // Couleur des liens
                                   // Links color
$cfg_VlinkIndex  = '0000FF';       // Couleur des liens
                                   // Links color
$cfg_AlinkIndex  = '0000FF';       // Couleur des liens
                                   // Links color

// Polices
// Fonts
    // pour l'index et la colonne droite
    // for the index and the column right
$cfg_font_1_n    = '<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#000000">';
$cfg_font_2_n    = '<font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#000000">';
$cfg_font_3_n    = '<font face="Verdana, Arial, Helvetica, sans-serif" size="3" color="#000000">';
    // pour la colonne Gauche
    // for the column Left
$cfg_font_1_b    = '<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FFFFFF">';
$cfg_font_2_b    = '<font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FFFFFF">';
$cfg_font_3_b    = '<font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FFFFFF">';
    // pour les messages d'erreur
    // for the error messages
$cfg_font_1_r    = '<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#FF0000">';
$cfg_font_2_r    = '<font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FF0000">';
    // si les infos pass� sont bonnes
    // if the informations are good
$cfg_font_1_v    = '<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#22CC22">';
    // pour les formulaires
    // for the forms
$cfg_Formulaire  = 'style="font-size:10px; font-family: verdana, arial, helvetica, sans-serif;"';
    // balise de fermeture
    // closing balise
$cfg_font_fin    = '</font>';

// variable de nombre de lignes du tableau pour placer les rubriques dans la page
// variable of a number of lines of the table to place the headings in the page
$cfg_NbrLignes   = 2;
$cfg_NbrColonnes = 4;
?>