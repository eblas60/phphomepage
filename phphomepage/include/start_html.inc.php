<?php
/**
 * [fr]Fichier qui génére le code de l'entête HTML commun à tous les fichiers
 * [en]File which génére the code of heading HTML common to all the files
 *
 * @copyright	20/12/2016
 * @since		09/01/2001
 * @version		1.8
 * @module		homepage
 * @modulegroup	homepage
 * @package		php_homepage
 * @access		public
 * @author		Eric BLAS <webmaster@phphomepage.net>
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
 * [fr]Fichier qui contient la traduction de Php Homepage dans la langue choisi
 */
require_once (LOCAL_INCLUDE.'localisation/lang_'.$cfg_Langue.'.inc.php');
/**
 * [fr]Fichier qui contient la librairie des fonctions communes
 */
require_once (LOCAL_INCLUDE.'lib.inc.php');
/**
 * [fr]Fichier de connection à la base
 */
require_once (LOCAL_INCLUDE.'connect.inc.php');
/**
 * [fr]Entête HTML
 */
echo '<!DOCTYPE html>'."\n";
echo '<html lang="'.$cfg_Langue.'">'."\n";
echo '    <head>'."\n";
echo '        <title>'.$cfg_Version.'</title>'."\n";
echo '        <meta http-equiv="Content-Type" content="text/html; charset='.$cfg_charset.'" />'."\n";
echo '        <meta charset="'.$cfg_charset.'" />'."\n";
echo '        <meta http-equiv="X-UA-Compatible" content="IE=edge" />'."\n";
echo '        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />'."\n";
echo '        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />'."\n";
echo '        <link href="assets/css/bootstrap-theme.min.css" rel="stylesheet" />'."\n";
echo '        <link href="assets/css/bootstrap-colorpicker.css" rel="stylesheet" />'."\n";
if (empty($homepage)){
    if (!empty($_GET['homepage'])) {
        $homepage = $_GET['homepage'];
    } elseif (!empty($_POST['homepage'])){
        $homepage = $_POST['homepage'];
    }
}
echo '        <link href="include/style.css" rel="stylesheet" />'."\n";
echo '        <!--[if lt IE 9]>'."\n";
echo '            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>'."\n";
echo '            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>'."\n";
echo '        <![endif]-->'."\n";
echo '    </head>'."\n";
echo '    <body>'."\n";
echo '        <div class="navbar navbar-inverse">'."\n";
echo '            <div class="navbar-inner">'."\n";
echo '                <div class="container-fluid">'."\n";
echo '                     <h1>'.$lang_Accueil.' <b>'.$cfg_Version.'</b>'."</h1>\n";
echo '                </div>'."\n";
echo '            </div>'."\n";
echo '        </div>'."\n";
echo '        <div class="container-fluid">
            <div class="row">';
