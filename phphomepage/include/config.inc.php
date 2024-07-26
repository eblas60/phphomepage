<?php
/**
 * [fr]Fichier de configuration
 * [en]File configuration
 *
 * @copyright	11/06/2021
 * @since		09/01/2001
 * @version		1.10
 * @module		homepage
 * @modulegroup	homepage
 * @package		php_homepage
 * @access		public
 * @author		Eric BLAS <webmaster@phphomepage.net>
 */


// Paramètre de connexion à la base / Parameter of connection to the base
// MySQL

$cfg_Host       = 'localhost';               // Host MySQL
$cfg_User       = 'login';               // User MySQL
$cfg_Pass       = 'password';               // Pass MySQL
$cfg_Base       = 'phphomepage';               // Base MySQL
$cfg_API        = 'mysqli';               // Connexion type(mysqli, mysql) for PHP > 4.3.7

// Langues / Language
$cfg_Langue = 'fr'; // Choix de la langue français
//$cfg_Langue = 'en'; // Choice of the english language
//$cfg_Langue = 'ru'; // Choice of the russian language
if ($cfg_Langue == 'ru')
    $cfg_charset = 'windows-1251';
else
    $cfg_charset = 'utf-8';

// Environnement
// Environment
$cfg_Version     = 'Php Homepage v1.10';

// balise de fermeture
// closing balise
$cfg_font_fin    = '</font>';

// variable de nombre de lignes du tableau pour placer les rubriques dans la page
// variable of a number of lines of the table to place the headings in the page
$cfg_NbrLignes   = 2;
$cfg_NbrColonnes = 4;
$cfg_NbrCase     = $cfg_NbrLignes*$cfg_NbrColonnes;
