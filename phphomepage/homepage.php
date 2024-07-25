<?php
/**
 * [fr]Votre page de démarrage
 * [en]Your homepage
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
if (empty($homepage)){
	if (!empty($_REQUEST['homepage'])) {
		$homepage = $_REQUEST['homepage'];
	}
}
if (empty($homepage)){
	header ("Location: index.php");
}
/**
 * [fr]Fichier qui contient divers paramètres locaux
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
 * [fr]Fichier de connection à la base
 */
require_once (LOCAL_INCLUDE.'connect.inc.php');
/**
 * [fr]Fichier qui contient la traduction de Php Homepage dans la langue choisi
 */
require_once (LOCAL_INCLUDE.'localisation/lang_'.$cfg_Langue.'.inc.php');
/**
 * [fr]Récupération des infos pour générer la page
 */
$query1			= 'SELECT mise_en_page_id FROM homepage WHERE nom = \''.$homepage.'\'';
if (strnatcmp(phpversion(),'4.3.7') >= 0)
{
	// mysqli
	if (mysqli_connect_errno()) {
		$error = $lang_error_query . mysqli_connect_error() . "\n";
	} else {
		$req1			= $mysqli->query($query1);
		$res1			= $req1->num_rows;
		if ($res1 !=0) {
			$dataRow1		= $req1->fetch_array(MYSQLI_ASSOC);
			$mise_en_page_id = $dataRow1['mise_en_page_id'];
		}
		$req1->free();
	}
}
else
{
	$req1			= mysql_query ($query1);
	$mise_en_page_id = mysql_result($req1,0,'id');
}
echo '<!DOCTYPE html>'."\n";
echo '<html>'."\n";
echo '	<head>'."\n";
echo '		<meta http-equiv="Content-Type" content="text/html; charset='.$cfg_charset.'" />'."\n";
echo '		<meta charset="utf-8" />'."\n";
echo '		<meta http-equiv="X-UA-Compatible" content="IE=edge">'."\n";
echo '		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">'."\n";
echo '		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />'."\n";
echo '		<link href="assets/css/bootstrap-theme.min.css" rel="stylesheet">'."\n";
if (isset($error)) {"\n";
	echo '		<link href="include/style.css" rel="stylesheet" />'."\n";
	echo '	</head>'."\n";
	echo '	<body>'."\n";
	echo '		<div class="col-md-12 text-center"><br />'."\n";
	echo '			<div class="col-md-2 text-center">&nbsp;</div>'."\n";
	echo '			<div class="col-md-8 text-center">'."\n";
	die('				<div class="alert alert-danger" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					<span class="sr-only">Error:</span>
					' . $error . "\n");
	echo '				<div class="col-md-2 text-center">&nbsp;</div>'."\n";
	echo '			</div>'."\n";
	echo '		</div>'."\n";
} else {
	$query2			= 'SELECT fond, couleur_titre, taille_titre, couleur_lien, taille_lien, police, titre, target FROM mise_en_page WHERE id = \''.$mise_en_page_id.'\'';
	if (strnatcmp(phpversion(),'4.3.7') >= 0)
	{
		// mysqli
		$req2			= $mysqli->query($query2);
		$res2			= $req2->num_rows;
		if ($res2 != 0) {
			$dataRow2		= $req2->fetch_array(MYSQLI_ASSOC);
			$fond			= $dataRow2['fond'];
			$couleur_titre	= $dataRow2['couleur_titre'];
			$taille_titre	= $dataRow2['taille_titre'];
			$couleur_lien	= $dataRow2['couleur_lien'];
			$taille_lien	= $dataRow2['taille_lien'];
			$police			= $dataRow2['police'];
			$titre			= $dataRow2['titre'];
			$target			= $dataRow2['target'];
		}
		$req2->free();
	}
	else
	{
		$req2			= mysql_query ($query2);
		$fond			= mysql_result($req2,0,'fond');
		$couleur_titre	= mysql_result($req2,0,'couleur_titre');
		$taille_titre	= mysql_result($req2,0,'taille_titre');
		$couleur_lien	= mysql_result($req2,0,'couleur_lien');
		$taille_lien	= mysql_result($req2,0,'taille_lien');
		$police			= mysql_result($req2,0,'police');
		$titre			= mysql_result($req2,0,'titre');
		$target			= mysql_result($req2,0,'target');
	}
	if ($taille_titre == 1) {
		$taille_titre = '10px';
		$mobile_taille_titre = '14px';
	} else if ($taille_titre == 2) {
		$taille_titre = '13px';
		$mobile_taille_titre = '18px';
	} else if ($taille_titre == 3) {
		$taille_titre = '16px';
		$mobile_taille_titre = '22px';
	} else if ($taille_titre == 4) {
		$taille_titre = '18px';
		$mobile_taille_titre = '28px';
	} else if ($taille_titre == 5) {
		$taille_titre = '24px';
		$mobile_taille_titre = '34px';
	} else if ($taille_titre == 6) {
		$taille_titre = '32px';
		$mobile_taille_titre = '42px';
	} else if ($taille_titre == 7) {
		$taille_titre = '48px';
		$mobile_taille_titre = '50px';
	}
	if ($taille_lien == 1) {
		$taille_lien = '10px';
		$mobile_taille_lien = '14px';
	} else if ($taille_lien == 2) {
		$taille_lien = '13px';
		$mobile_taille_lien = '18px';
	} else if ($taille_lien == 3) {
		$taille_lien = '16px';
		$mobile_taille_lien = '22px';
	} else if ($taille_lien == 4) {
		$taille_lien = '18px';
		$mobile_taille_lien = '28px';
	} else if ($taille_lien == 5) {
		$taille_lien = '24px';
		$mobile_taille_lien = '34px';
	} else if ($taille_lien == 6) {
		$taille_lien = '32px';
		$mobile_taille_lien = '42px';
	} else if ($taille_lien == 7) {
		$taille_lien = '48px';
		$mobile_taille_lien = '50px';
	}
}
echo '		<title>';
if ($titre != '') {
	echo $titre;
} else {
	echo $cfg_Version;
}
echo '</title>'."\n";
echo '		<style type="text/css">'."\n";
echo '			<!--'."\n";
echo '				html, body {font-family: '.$police.';}'."\n";
echo '				body { background-color: #'.$fond.'; color: #'.$couleur_lien.'; }'."\n";
echo '				p.rubrique { display: block; color: #'.$couleur_titre.'; font-size:'.$taille_titre.'; text-decoration: none; font-weight: bold;}'."\n";
echo '				a.btn.lien, a.btn.lien:focus, a.btn.lien:hover { display: block; width:100%; color: #'.$couleur_lien.'; font-size:'.$taille_lien.'; text-decoration: none; }'."\n";
echo '				a.btn.lien.inline, a.btn.lien.inline:focus, a.btn.lien.inline:hover { display: inline-block !important; width:auto; }'."\n";
echo '				a.btn.lien:hover { text-decoration: underline; }'."\n";
echo '				p { margin: 10px 0; }
				a, a:focus, a:hover { }
				a.inline, a.inline:focus, a.inline:hover { display: inline-block !important; width:auto; }
				.btn { text-align:left; padding: 0; }
				.btn-danger, .btn-default, .btn-info, .btn-primary, .btn-success, .btn-warning { box-shadow: none !important; }
				.btn-default { background-color: transparent; background-image: none; background-repeat: repeat-x; border: medium none; text-shadow: none; }
				.btn-default:focus, .btn-default:hover { background-color: transparent; background-position: 0;}' . "\n";
/*echo '				.navbar-default {background-color: #'.$fond.'; background-image: linear-gradient(to bottom, #'.$fond.' 0, #'.$fond.' 100%); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=\'#'.$fond.'\', endColorstr=\'#'.$fond.'\', GradientType=0);border-color:#'.$fond.';}
				.navbar-default .navbar-brand {color: #'.$couleur_titre.';}
				.navbar-default .navbar-nav>li>a {color: #'.$couleur_lien.';}//*/
echo '
				@media handheld, only screen and (max-width: 685px), only screen and (max-device-width: 685px) {
					.btn { text-align:left; padding: 10px; }' . "\n";
echo '					p.rubrique { font-size:'.$mobile_taille_titre.'; }'."\n";
echo '					a.btn.lien, a.btn.lien:focus, a.btn.lien:hover { font-size:'.$mobile_taille_lien.'; }'."\n";
echo '				}
			-->
		</style>' ."\n";
echo '	</head>'."\n";
echo '	<body>'."\n";
echo '		<div class="container-fluid">' ."\n";
/*echo '	<!-- Static navbar -->
		<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			<a class="navbar-brand" href="#">'.$homepage.'</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div><!--/.container-fluid -->
		</nav>'."\n";//*/
echo '			<div class="col-md-12">'."\n";
$k = 0;
while($cfg_NbrLignes != $k) {
	echo '			<div class="row">'."\n";
	$case		= 1 + ($k * $cfg_NbrColonnes);
	$largeur	= 12 / $cfg_NbrColonnes;
	$l			= 0;
	while($cfg_NbrColonnes != $l) {
		$case1 = $case + $l;
		echo '				<div class="col-md-' . $largeur . '">'."\n";
		create_case($case1);
		echo '				</div>'."\n";
		$l++;
	}
	echo "			</div>\n";
	$k++;
}
echo '		<br />'."\n";
echo '		<p style="text-align:right;"><span style="font-family:'.$police.';color:#'.$couleur_titre.';font-size:10px;">'.$homepage.' - '.$lang_Realiser.' '.$cfg_Version.$cfg_font_fin.'</p>';
if (strnatcmp(phpversion(),'4.3.7') >= 0)
{
	mysqli_close($mysqli);
}

require_once(LOCAL_INCLUDE.'stop_html.inc.php');
