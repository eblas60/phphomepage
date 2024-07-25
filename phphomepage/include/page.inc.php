<?php
/**
 * [fr]Fichier de mise en page de la homepage
 * [en]File of formatting of the homepage
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
echo '								<h2><strong>'.$lang_MiseEnPage."</strong></h2>\n";
if (!isset($mise_en_page_id)) {
	$mise_en_page_id = '';
}
/**
 * [fr]Gestion des diverses erreurs
 */
if (empty($id) && !empty($_POST['id'])) {
	$id = $_POST['id'];
}
if (empty($rougeF) && !empty($_POST['rougeF'])) {
	$rougeF = $_POST['rougeF'];
}
if (empty($vertF) && !empty($_POST['vertF'])) {
	$vertF = $_POST['vertF'];
}
if (empty($bleuF) && !empty($_POST['bleuF'])) {
	$bleuF = $_POST['bleuF'];
}
if (empty($rougeR) && !empty($_POST['rougeR'])) {
	$rougeR = $_POST['rougeR'];
}
if (empty($vertR) && !empty($_POST['vertR'])) {
	$vertR = $_POST['vertR'];
}
if (empty($bleuR) && !empty($_POST['bleuR'])) {
	$bleuR = $_POST['bleuR'];
}
if (empty($rougeL) && !empty($_POST['rougeL'])) {
	$rougeL = $_POST['rougeL'];
}
if (empty($vertL) && !empty($_POST['vertL'])) {
	$vertL = $_POST['vertL'];
}
if (empty($bleuL) && !empty($_POST['bleuL'])) {
	$bleuL = $_POST['bleuL'];
}
if (empty($modif) && !empty($_POST['modif'])) {
	$modif = $_POST['modif'];
}
if (empty($taille_titre) && !empty($_POST['taille_titre'])) {
	$taille_titre = $_POST['taille_titre'];
}
if (empty($taille_lien) && !empty($_POST['taille_lien'])) {
	$taille_lien = $_POST['taille_lien'];
}
if (empty($police) && !empty($_POST['police'])) {
	$police = $_POST['police'];
}
if (empty($titre) && !empty($_POST['titre'])) {
	$titre = $_POST['titre'];
}
if (empty($target) && !empty($_POST['target'])) {
	$target = $_POST['target'];
}

/**
 * [fr]Gestion des diverses erreurs
 */
if (empty($modif)) {
	$modif = '';
}
if ($mise_en_page_id != 0 && $modif == 1) {
	$fond			= str_replace('#', '', $_POST['fond']);
	$couleur_titre	= str_replace('#', '', $_POST['couleur_titre']);
	$couleur_lien	= str_replace('#', '', $_POST['couleur_lien']);
	if ($modif == "1") {
		$query3		= "UPDATE `mise_en_page` SET `fond`='".$fond."', `couleur_titre`='".$couleur_titre."', `taille_titre`='".$taille_titre."', `couleur_lien`='".$couleur_lien."', `taille_lien`='".$taille_lien."', `police`='".$police."', `titre`='".$titre."', target='".$target."' WHERE `id`='".$id."'";
		if (strnatcmp(phpversion(),'4.3.7') >= 0) {
			$mysqli->query("SET NAMES 'utf8'");
			$result3 = $mysqli->query($query3);
		} else
			$result3 = mysql_query($query3);
		if (!$result3) {
			if (strnatcmp(phpversion(),'4.3.7') >= 0)
				$error = $mysqli->error;
			else
				$error = mysql_error();
			die('						<p class="text-danger">' . $lang_error_query . $error."</p>\n");
		}
		$query4		= "UPDATE `homepage` SET `mise_en_page_id`='".$mise_en_page_id."' WHERE `nom`='".$homepage."'";
		if (strnatcmp(phpversion(),'4.3.7') >= 0) {
			$mysqli->query("SET NAMES 'utf8'");
			$result4 = $mysqli->query($query4);
		} else
			$result4 = mysql_query($query4);
		if (!$result4) {
			if (strnatcmp(phpversion(),'4.3.7') >= 0)
				$error = $mysqli->error;
			else
				$error = mysql_error();
			die('						<p class="text-danger">' . $lang_error_query . $error."</p>\n");
		}
		$modif		= 2;
	}
} else {
	if ($modif == "1") {
		$fond			= str_replace('#', '', $_POST['fond']);
		$couleur_titre	= str_replace('#', '', $_POST['couleur_titre']);
		$couleur_lien	= str_replace('#', '', $_POST['couleur_lien']);
		if (empty($titre) && empty($_POST['titre'])) {
			$titre = '';
		}
		$query5		= "INSERT INTO `mise_en_page` (`id`, `fond`, `couleur_titre`, `taille_titre`, `couleur_lien`, `taille_lien`, `police`, `titre`, `target`) VALUES('','".$fond."','".$couleur_titre."','".$taille_titre."','".$couleur_lien."','".$taille_lien."','".$police."','".$titre."','".$target."')";
		if (strnatcmp(phpversion(),'4.3.7') >= 0) {
			$mysqli->query("SET NAMES 'utf8'");
			$result5 = $mysqli->query($query5);
		} else
			$result5 = mysql_query($query5);
		if (!$result5) {
			if (strnatcmp(phpversion(),'4.3.7') >= 0)
				$error = $mysqli->error;
			else
				$error = mysql_error();
			die('						<p class="text-danger">' . $lang_error_query . $error."</p>\n");
		} else {
			if (strnatcmp(phpversion(),'4.3.7') >= 0)
				$mise_en_page_id = $mysqli->insert_id;
			else
				$mise_en_page_id = mysql_insert_id();
		}
		$id = $mise_en_page_id;
		$query6		= "UPDATE `homepage` SET `mise_en_page_id`='".$mise_en_page_id."' WHERE `nom`='".$homepage."'";
		if (strnatcmp(phpversion(),'4.3.7') >= 0) {
			$mysqli->query("SET NAMES 'utf8'");
			$result6 = $mysqli->query($query6);
		} else
			$result6 = mysql_query($query6);
		if (!$result6) {
			if (strnatcmp(phpversion(),'4.3.7') >= 0)
				$error = $mysqli->error;
			else
				$error = mysql_error();
			die('						<p class="text-danger">' . $lang_error_query . $error."</p>\n");
		}
	}
}
if ($mise_en_page_id != 0) {
	$query2		= 'SELECT `id`, `fond`, `couleur_titre`, `taille_titre`, `couleur_lien`, `taille_lien`, `police`, `titre`, `target` FROM `mise_en_page` WHERE `id` = \''.$mise_en_page_id.'\'';
	if (strnatcmp(phpversion(),'4.3.7') >= 0)
	{
		// mysqli
		$req2			= $mysqli->query($query2);
		$res2			= $req2->num_rows;
		if ($res2 != 0) {
			$dataRow2		= $req2->fetch_array(MYSQLI_ASSOC);
			$id			= $dataRow2['id'];
			$fond			= '#'.$dataRow2['fond'];
			$couleur_titre	= '#'.$dataRow2['couleur_titre'];
			$taille_titre	= $dataRow2['taille_titre'];
			$couleur_lien	= '#'.$dataRow2['couleur_lien'];
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
		$id				= mysql_result($req2,0,'id');
		$fond			= '#'.mysql_result($req2,0,'fond');
		$couleur_titre	= '#'.mysql_result($req2,0,'couleur_titre');
		$taille_titre	= mysql_result($req2,0,'taille_titre');
		$couleur_lien	= '#'.mysql_result($req2,0,'couleur_lien');
		$taille_lien	= mysql_result($req2,0,'taille_lien');
		$police			= mysql_result($req2,0,'police');
		$titre			= mysql_result($req2,0,'titre');
		$target			= mysql_result($req2,0,'target');
	}
} else {
	$fond			= '#FFFFFF';
	$couleur_titre	= '#000000';
	$taille_titre	= '3';
	$couleur_lien	= '#0000FF';
	$taille_lien	= '2';
	$police			= 'Verdana';
	$titre			= '';
	$target			= '1';
}

?>
								<div class="row">
									<div class="col-md-6">
<?php
/**
 * [fr]Affichage des divers paramètres modifiables
 */
if ($mise_en_page_id != 0 && $modif == 2) {
	echo '						<p class="text-success">'.$lang_ModifOK."<br>\n";
} elseif ($mise_en_page_id != 0 && $modif == 1) {
	echo '						<p class="text-success">'.$lang_CreerOK."<br>\n";
}
echo '										<form role="form" class="form" method="post" action="'.$_SERVER['PHP_SELF'].'" name="mise_en_page">'."\n";
echo '											<fieldset>'."\n";
echo '												<legend>'.$lang_CreerMEP."</legend>\n";
if ($mise_en_page_id != 0) {
	echo '												<input type="hidden" name="id" value="'.$id.'" />'."\n";
}
echo '												<input type="hidden" name="homepage" value="'.$homepage.'" />'."\n";
echo '												<input type="hidden" name="page" value="'.$page.'" />'."\n";
echo '												<input type="hidden" name="modif" value="1" />'."\n";
echo '												<div class="form-group">'."\n";
echo '													<label class="control-label">'.$lang_CoulFond.'</label>'."\n";
echo '													<div id="colorpicker-fond" class="controls input-group colorpicker-component">'."\n";
echo '														<input type="text" class="form-control" id="fond" placeholder="#FFFFFF" name="fond" value="'.$fond.'" />
															<div class="input-group-addon"><i></i></div>'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '												<div class="form-group">'."\n";
echo '													<label class="control-label">'.$lang_CoulRub.'</label>'."\n";
echo '													<div id="colorpicker-lien" class="controls input-group colorpicker-component">'."\n";
echo '														<input type="text" class="form-control" id="couleur_lien" placeholder="#000000" name="couleur_lien" value="'.$couleur_lien.'" />
															<div class="input-group-addon"><i></i></div>'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '												<div class="form-group">'."\n";
echo '													<label class="control-label" for="taille_titre">'.$lang_TailleRub.'</label>'."\n";
echo '													<div class="controls">'."\n";
echo '														<select class="form-control input-mini" id="taille_titre" name="taille_titre">'."\n";
echo '															<option value="1"';
if ($taille_titre == 1) {
	echo ' selected';
}
echo '>1</option>'."\n";
echo '															<option value="2"';
if ($taille_titre == 2) {
	echo ' selected';
}
echo '>2</option>'."\n";
echo '															<option value="3"';
if ($taille_titre == 3) {
	echo ' selected';
}
echo '>3</option>'."\n";
echo '															<option value="4"';
if ($taille_titre == 4) {
	echo ' selected';
}
echo '>4</option>'."\n";
echo '															<option value="5"';
if ($taille_titre == 5) {
	echo ' selected';
}
echo '>5</option>'."\n";
echo '															<option value="6"';
if ($taille_titre == 6) {
	echo ' selected';
}
echo '>6</option>'."\n";
echo '															<option value="7"';
if ($taille_titre == 7) {
	echo ' selected';
}
echo '>7</option>'."\n";
echo '														</select>'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '												<div class="form-group">'."\n";
echo '													<label class="control-label" for="creer_nom">'.$lang_CoulRub.'</label>'."\n";
echo '													<div id="colorpicker-titre" class="controls input-group colorpicker-component">'."\n";
echo '														<input type="text" class="form-control" id="couleur_titre" placeholder="#0000FF" name="couleur_titre" value="'.$couleur_titre.'" />
															<div class="input-group-addon"><i></i></div>'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '												<div class="form-group">'."\n";
echo '													<label class="control-label" for="taille_lien">'.$lang_TailleLien.'</label>'."\n";
echo '													<div class="controls">'."\n";
echo '														<select class="form-control input-mini" name="taille_lien">'."\n";
echo '															<option value="1"';
if ($taille_lien == 1) {
	echo ' selected';
}
echo '>1</option>'."\n";
echo '															<option value="2"';
if ($taille_lien == 2) {
	echo ' selected';
}
echo '>2</option>'."\n";
echo '															<option value="3"';
if ($taille_lien == 3) {
	echo ' selected';
}
echo '>3</option>'."\n";
echo '															<option value="4"';
if ($taille_lien == 4) {
	echo ' selected';
}
echo '>4</option>'."\n";
echo '															<option value="5"';
if ($taille_lien == 5) {
	echo ' selected';
}
echo '>5</option>'."\n";
echo '															<option value="6"';
if ($taille_lien == 6) {
	echo ' selected';
}
echo '>6</option>'."\n";
echo '															<option value="7"';
if ($taille_lien == 7) {
	echo ' selected';
}
echo '>7</option>'."\n";
echo '									</select>'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '												<div class="form-group">'."\n";
echo '													<label class="control-label" for="police">'.$lang_Police.'</label>'."\n";
echo '													<div class="controls">'."\n";
echo '														<select class="form-control input-medium" id="police" name="police">'."\n";
echo '															<optgroup label="-- PC --">'."\n";
echo '																<option value="Arial"			';
if ($police == 'Arial') {
	echo 'selected';
}
echo '>Arial</option>'."\n";
echo '																<option value="Times New Roman"	 ';
if ($police == 'Times New Roman') {
	echo 'selected';
}
echo '>Times New Roman</option>'."\n";
echo '																<option value="Courier New"		';
if ($police == 'Courier New') {
	echo 'selected';
}
echo '>Courier New</option>'."\n";
echo '															</optgroup>'."\n";
echo '															<optgroup label="-- Mac --">'."\n";
echo '																<option value="Helvetica"		';
if ($police == 'Helvetica') {
	echo 'selected';
}
echo '>Helvetica</option>'."\n";
echo '																<option value="Georgia"			';
if ($police == 'Georgia') {
	echo 'selected';
}
echo '>Georgia</option>'."\n";
echo '																<option value="Times"			';
if ($police == 'Times') {
	echo 'selected';
}
echo '>Times</option>'."\n";
echo '																<option value="Courier"			';
if ($police == 'Courier') {
	echo 'selected';
}
echo '>Courier</option>'."\n";
echo '															</optgroup>'."\n";
echo '															<optgroup label="-- PC/Mac --">'."\n";
echo '																<option value="Verdana"			';
if ($police == 'Verdana') {
	echo 'selected';
}
echo '>Verdana</option>'."\n";
echo '															</optgroup>'."\n";
echo '														</select>'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '												<div class="form-group">'."\n";
echo '													<label class="control-label">'.$lang_Title.'</label>'."\n";
echo '													<div class="controls">'."\n";
echo '														<input class="form-control input-large" type="text" id="titre" name="titre" maxlength="255" value="'.$titre.'">'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '												<div class="form-group">'."\n";
echo '													<label class="control-label">'.$lang_Target.'</label>'."\n";
echo '													<div class="controls">'."\n";
echo '														<select class="form-control input-medium" id="target" name="target" size="1">'."\n";
echo '															<option value="1" ';
if ($target == 1) {
	echo 'selected';
}
echo '>'.$lang_Non.'</option>'."\n";
echo '															<option value="2" ';
if ($target == 2) {
	echo 'selected';
}
echo '>'.$lang_Oui.'</option>'."\n";
echo '														</select>'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
if ($mise_en_page_id != 0) {
	echo '									<button type="submit" class="btn btn-success">'.$lang_Modifier.' <span class="glyphicon glyphicon-chevron-right icon-white"></span></button>'."\n";
} else {
	echo '									<button type="submit" class="btn btn-success">'.$lang_Creer.' <span class="glyphicon glyphicon-chevron-right icon-white"></span></button>'."\n";
}
echo '											</fieldset>'."\n";
echo '										</form>'."\n";
?>
									</div>
									<div class="col-md-6 exemple">
<?php
/**
 * [fr]Exemple de mise en page pour facilité le choix
 */
$font_rubrique	= '<font face="'.$police.'" size="'.$taille_titre.'" color="'.$couleur_titre.'">';
$font_lien		= '<font face="'.$police.'" size="'.$taille_lien.'" color="'.$couleur_lien.'">';
echo '									<table class="table table-bordered">'."\n";
echo '										<tr>'."\n";
echo '											<td bgcolor="'.$fond.'">'."\n";
echo '												<p><br>&nbsp;&nbsp;'.$font_rubrique.'<b>'.$lang_Rubrique.'</b>'.$cfg_font_fin."</p>\n";
echo '												<p>&nbsp;&nbsp;<a href="#">'.$font_lien.$lang_Lien.$cfg_font_fin."</a></p>\n";
echo '											</td>'."\n";
echo '										</tr>'."\n";
echo '									</table>'."\n";
?>
									</div>
								</div>