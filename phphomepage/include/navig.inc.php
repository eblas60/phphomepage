<?php
/**
 * [fr]Fichier de navigation pour un ajout de homepage
 * [en]File of navigation for an addition of homepage
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
 * [fr] Récupération des infos
 */
$query1			= 'SELECT `rubriques_id`,`mise_en_page_id` FROM `homepage` WHERE `nom` = \''.$homepage.'\'';

if (strnatcmp(phpversion(),'4.3.7') >= 0)
{
	// mysqli
	$req1	= $link->query($query1, MYSQLI_USE_RESULT);
	$res1	= $req1->fetch_array(MYSQLI_ASSOC);
}
else
{
	$req1	= mysql_query ($query1);
	$res1	= mysql_num_rows($req1);
}
if ($res1 != '') {
	if (strnatcmp(phpversion(),'4.3.7') >= 0)
	{
		$rubriques_id		= $res1['rubriques_id'];
		$mise_en_page_id	= $res1['mise_en_page_id'];
	}
	else
	{
		$rubriques_id		= mysql_result($req1,0,'rubriques_id');
		$mise_en_page_id	= mysql_result($req1,0,'mise_en_page_id');
	}
	// mysqli
	/*if (strlen(trim($query))) {
		//echo "- $query<br>\n";
		if (strnatcmp(phpversion(),'4.3.7') >= 0 && $cfg_API == 'mysqli')
		{
			// close connection 
			$link->query($query);
		}
		else
		{
			$result = mysql_query($query);
			if (!$result) {
				die('						<p class="text-danger">' . $lang_error_query . mysql_error()."</p>\n");
			}
		}
	}//*/
}
echo '						<p><span class="glyphicon glyphicon-home"></span> '.$lang_PourNom.'<a href="php_homepage.php?homepage='.$homepage.'"><strong>'.$homepage.'</strong>';
if ($page != '')
	echo '<span class="glyphicon glyphicon-chevron-right"></span>';
else
	echo '<span class="glyphicon glyphicon glyphicon-ok"></span>';
echo '</a>'."</p>\n";
/**
 * [fr]Menu d'accès aux rubriques et aux liens
 */
?>
						<div id="sidebar" class="sidebar-offcanvas" role="navigation">
							<div class="list-group">
<?php
echo '										<form role="form" class="form" method="post" action="'.$_SERVER['PHP_SELF'].'" name="menu-rubrique" accept-charset="UTF-8">'."\n";
echo '											<input type="hidden" name="homepage" value="'.$homepage.'" />'."\n";
echo '											<input type="hidden" name="page" value="rubrique" />'."\n";
if ($res1 == '' OR $rubriques_id == '') {
	echo '							<button type="submit"  class="list-group-item'; 
	if ($page == 'rubrique') {
		echo ' active';
	}
	echo'"><span class="glyphicon glyphicon-chevron-right"></span> '.$lang_AjoutRubrique.'</button>'."\n";
} else {
	echo '							<button type="submit" class="list-group-item'; 
	if ($page == 'rubrique') {
		echo ' active';
	}
	echo'"><span class="glyphicon glyphicon-chevron-right"></span> '.$lang_ModifRubrique.'</button>'."\n";
	echo '										</form>'."\n";
	echo '										<form role="form" class="form" method="post" action="'.$_SERVER['PHP_SELF'].'" name="menu-lien" accept-charset="UTF-8">'."\n";
	echo '											<input type="hidden" name="homepage" value="'.$homepage.'" />'."\n";
	echo '											<input type="hidden" name="page" value="liens" />'."\n";
	echo '							<button type="submit" class="list-group-item'; 
	if ($page == 'liens') {
		echo ' active';
	}
	echo'"><span class="glyphicon glyphicon-chevron-right"></span> '.$lang_ModifLiens.'</button>'."\n";
}
echo '										</form>'."\n";
echo '										<form role="form" class="form" method="post" action="'.$_SERVER['PHP_SELF'].'" name="menu-page" accept-charset="UTF-8">'."\n";
echo '											<input type="hidden" name="homepage" value="'.$homepage.'" />'."\n";
echo '											<input type="hidden" name="page" value="page" />'."\n";
/**
 * [fr]Menu d'accès à la mise en page
 */
	echo '							<button type="submit" class="list-group-item'; 
	if ($page == 'page') {
		echo ' active';
	}
	echo'"><span class="glyphicon glyphicon-chevron-right"></span> '.$lang_MiseEnPage.'</button>'."\n";
echo '										</form>'."\n";
/**
 * [fr]Menu pour afficher la page de démarrage s'il existe une rubrique et une mise en page
 */
if ($res1 != '' AND $rubriques_id != '' AND $mise_en_page_id != 0) {
	echo '							<a class="list-group-item" href="homepage.php?homepage='.$homepage.'" target="blanck"><span class="glyphicon glyphicon-chevron-right"></span> '.$lang_AffHomepage.'</a>'."\n";
}
/**
 * [fr]Menu pour retour à la choix de la homepage
 */
echo '							<a class="list-group-item" href="index.php" target="_parent"><span class="glyphicon glyphicon-chevron-left"></span> '.$lang_RetourIndex.'</a>'."\n";
//echo '					<p>&nbsp;</p>'."\n";
?>
							</div>
						</div>
