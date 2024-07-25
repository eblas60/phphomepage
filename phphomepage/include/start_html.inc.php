<?php
/**
 * [fr]Fichier qui génére le code de l'entête HTML commun à tous les fichiers
 * [en]File which génére the code of heading HTML common to all the files
 *
 * @copyright    12/03/2012
 * @since	 09/08/2001
 * @version      1.7
 * @module       start_html
 * @modulegroup  include
 * @package      php_homepage
 * @access	 public
 * @author       Eric BLAS <webmaster@phphomepage.net>
 */
/**
 * [fr]Pour empècher le Hacking du serveur via ce script je rajoute une condition pour vérifier la variable LOCAL_INCLUDE
 */
if (strstr(LOCAL_INCLUDE, 'http')) {
    /**
     * [fr]Variable pour fixer le dossier d'include
     * Laisser vide si vous pouvez utiliser un fichier .htaccess, sinon mettre les chemins réels
     * [en]Variable to fix the file of include
     * To leave empty if you could use a .htaccess file, if not put the real path
     *
     * @const LOCAL_INCLUDE 
     */
    define('LOCAL_INCLUDE', './include/');
}      
/**
 * [fr]Fichier de configuration de Php homepage
 */
require_once (LOCAL_INCLUDE.'config.inc.php');
/**
 * [fr]Fichier qui contient la librairie des fonctions communes
 */
require_once (LOCAL_INCLUDE.'lib.inc.php');
/**
 * [fr]Fichier de connection à la base
 */
require_once (LOCAL_INCLUDE.'connect.inc.php');
/**
 * [fr]Fichier qui contient la traduction de Php Homepage dans la langue choisi
 */
require_once (LOCAL_INCLUDE.'localisation/lang_'.$cfg_Langue.'.inc.php');
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
                      "http://www.w3.org/TR/html4/loose.dtd">'."\n";
echo '<html>'."\n";
echo '    <head>'."\n";
echo '        <title>'.$cfg_Version.'</title>'."\n";
echo '        <meta http-equiv="Content-Type" content="text/html; charset='.$cfg_charset.'" />'."\n";
echo '        <meta http-equiv="viewport" content="with=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />'."\n";

if (empty($homepage)){
    if (!empty($_GET['homepage'])) {
        $homepage = $_GET['homepage'];
    } elseif (!empty($_POST['homepage'])){
        $homepage = $_POST['homepage'];
    }
}
if (!empty($homepage)) {
    echo '        <link rel="stylesheet" href="include/style.css" />'."\n";
}
echo '    </head>'."\n";
echo '    <body bgcolor="'.$cfg_FondIndex.'" link="'.$cfg_linkIndex.'" vlink="'.$cfg_VlinkIndex.'" alink="'.$cfg_AlinkIndex.'">';
