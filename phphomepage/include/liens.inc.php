<?php
/**
 * [fr]Fichier d'ajout des liens de la homepage
 * [en]File of addition of the links of the homepage
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
 * [fr]Gestion des diverses erreurs
 */
?>
						<div class="row">
							<div class="col-md-12">
<?php
echo '								<h2><strong>'.$lang_Lien."</strong></h2>\n";
if (empty($titre) && !empty($_POST['titre'])) {
	$titre = str_replace('¦', '&#166;', $_POST['titre']);
}
if (empty($url) && !empty($_POST['url']) && http_file_exists($_POST['url']) != false) {
	$url = $_POST['url'];
} elseif (isset($_POST['url']) && http_file_exists($_POST['url']) == false) {
	$url = '';
	echo '						<p class="text-danger">'.$lang_ErrorLienUrl."</p>\n";
}
if (empty($rubrique) && !empty($_POST['rubrique'])) {
	$rubrique = $_POST['rubrique'];
}
if (empty($sup_lien) && !empty($_POST['sup_lien'])) {
	$sup_lien = $_POST['sup_lien'];
}
if (empty($new_titre) && !empty($_POST['new_titre'])) {
	$new_titre = $_POST['new_titre'];
}
if (empty($new_rubrique) && !empty($_POST['new_rubrique'])) {
	$new_rubrique = $_POST['new_rubrique'];
}
if (empty($new_url) && !empty($_POST['new_url']) && http_file_exists($_POST['new_url']) != false) {
	$new_url = $_POST['new_url'];
} elseif (isset($_POST['new_url']) && http_file_exists($_POST['new_url']) == false) {
	$new_url = '';
	echo '						<p class="text-danger">'.$lang_ErrorLienUrl."</p>\n";
}
if (empty($choix_lien) && !empty($_POST['choix_lien'])) {
	$choix_lien = $_POST['choix_lien'];
}
if (empty($rubriques_id) OR $rubriques_id == '') {
	echo '						<p class="text-danger">'.$lang_ErrorLienRub."</p>\n";
}
if (isset($sup_lien) OR isset($_POST['sup_lien'])) {
	if (empty($_POST['sup_lien']) OR $sup_lien == '') {
		echo '						<p class="text-danger">'.$lang_ErrorRubNom."</p>\n";
	} else {
		echo '						<p class="text-success">'.$lang_LienSupOK."</p>\n";
		$query2 = 'UPDATE `liens` SET `actif` = \'1\' WHERE `id` = '.$sup_lien;
//echo __LINE__ . ' debug rubrique: <br>$query2 = '.$query2.'<br>';
		if (strnatcmp(phpversion(),'4.3.7') >= 0)
			$result2 = $mysqli->query($query2);
		else
			$result2 = mysqli_query($link, $query2);
		if (!$result2) {
			if (strnatcmp(phpversion(),'4.3.7') >= 0)
				$error = $mysqli->error;
			else
				$error = mysqli_error();
			die('						<p class="text-danger">' . $lang_error_query . $error."</p>\n");
		}
	}
}
if (isset($titre) || isset($_POST['titre'])) {
	if ((empty($_POST['titre']) || $titre == '') || $url == 'http://' || $url == '' || (empty($_POST['rubrique']) || $rubrique == '')) {
		if (empty($_POST['titre']) || $titre == '') {
			echo '						<p class="text-danger">'.$lang_LienNom."</p>\n";
		}
		if ($url == '' || $url == 'http://') {
			echo '						<p class="text-danger">'.$lang_LienURL."</p>\n";
		}
		if (empty($_POST['rubrique']) || $rubrique == "") {
			echo '						<p class="text-danger">'.$lang_LienRub."</p>\n";
		}
	} else {
		echo '						<p class="text-success">'.$lang_LienOK."</p>\n";
		$query3			= 'INSERT INTO `liens` (`id`, `actif`, `titre`, `rubrique_id`, `url`) VALUES'."(NULL,NULL,'".$titre."','".$rubrique."','".$url."')";
//echo __LINE__ . ' debug rubrique: <br>$query3 = '.$query3.'<br>';
		if (strnatcmp(phpversion(),'4.3.7') >= 0) {
			$mysqli->query("SET NAMES 'utf8'");
			$result3 = $mysqli->query($query3);
		} else
			$result3 = mysqli_query($link, $query3);
		if (!$result3) {
			if (strnatcmp(phpversion(),'4.3.7') >= 0)
				$error = $mysqli->error;
			else
				$error = mysqli_error();
			die('						<p class="text-danger">' . $lang_error_query . $error."</p>\n");
		}
		$titre = '';
		$url = 'http://';
		$rubrique = '';
	}
}
if (isset($choix_lien) || isset($_POST['choix_lien'])) {
	if (empty($_POST['choix_lien']) || $choix_lien == '') {
		echo '						<p class="text-danger">'.$lang_ErrorLienModif."</p>\n";
	}
	if ((empty($_POST['new_titre']) || $new_titre == '') || $new_url == 'http://' || $new_url == '' || (empty($_POST['new_rubrique']) || $new_rubrique == '')) {
		if (empty($_POST['new_titre']) || $new_titre == '') {
			echo '						<p class="text-danger">'.$lang_LienNom."</p>\n";
		$new_titre = '';
		}
		if ($new_url == '' || $new_url == 'http://') {
			echo '						<p class="text-danger">'.$lang_LienURL."</p>\n";
		}
		if (empty($_POST['new_rubrique']) || $new_rubrique == "") {
			echo '						<p class="text-danger">'.$lang_LienRub."</p>\n";
		}
	} else {
		echo '						<p class="text-success">'.$lang_ModifLienOK."</p>\n";
		$query5			= "UPDATE liens SET titre='".$new_titre."', rubrique_id='".$new_rubrique."', url='".$new_url."' WHERE id='".$choix_lien."'";
		if (strnatcmp(phpversion(),'4.3.7') >= 0) {
			$mysqli->query("SET NAMES 'utf8'");
			$result5 = $mysqli->query($query5);
		} else
			$result5 = mysqli_query($link, $query5);
		if (!$result5) {
			if (strnatcmp(phpversion(),'4.3.7') >= 0)
				$error = $mysqli->error;
			else
				$error = mysqli_error();
			die('						<p class="text-danger">' . $lang_error_query . $error."</p>\n");
		}
	}
}
/**
 * [fr]Ajout d'un lien
 */
if (!isset($url)) {
	$url		= 'http://';
}
if (!isset($titre)) {
	$titre		= '';
}
if (!isset($rubrique)) {
	$rubrique	= '';
}
?>
								<div class="row">
									<div class="col-md-6">
<?php
echo '										<form role="form" class="form" method="post" action="'.$_SERVER['PHP_SELF'].'" name="ajout_lien">'."\n";
echo '											<fieldset>'."\n";
echo '												<legend>'.$lang_LienNew."</legend>\n";
echo '												<input type="hidden" name="homepage" value="'.$homepage.'" />'."\n";
echo '												<input type="hidden" name="page" value="'.$page.'" />'."\n";
echo '												<div class="form-group">'."\n";
echo '													<label class="control-label" for="titre">'.$lang_Nom.'</label>'."\n";
echo '													<div class="controls">'."\n";
echo '														<input class="form-control input-large" type="text" id="titre" name="titre" value="'.$titre.'" />'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '												<div class="form-group">'."\n";
echo '													<label class="control-label" for="url">'.$lang_URL.'</label>'."\n";
echo '													<div class="controls">'."\n";
echo '														<input class="form-control input-xlarge" type="text" id="url" name="url" value="'.$url.'" />'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '												<div class="form-group">'."\n";
echo '													<div class="controls">'."\n";
echo '														<select class="form-control input-large" id="rubrique" name="rubrique">'."\n";
echo '															<option value="" ';
if (empty($rubrique)) {
	echo 'selected="selected"';
}
echo '>'.$lang_ChoixRubrique.'</option>'."\n";
choix_rubrique();
echo '													</select>'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '												<div class="form-group">'."\n";
echo '													<div class="controls">'."\n";
echo '														<button type="submit" class="btn btn-success">'.$lang_Creer.' <span class="glyphicon glyphicon-chevron-right icon-white"></span></button>'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '											</fieldset>'."\n";
echo '										</form>'."\n";
?>
									</div>
									<div class="col-md-6">
<?php
/**
 * [fr]Modification d'une rubrique
 */
if (!isset($new_titre)) {
	$new_titre	= '';
}
if (!isset($new_url)) {
	$new_url	= '';
}

echo '										<form role="form" class="form" method="post" action="'.$_SERVER['PHP_SELF'].'" name="modif_lien">'."\n";
echo '											<fieldset>'."\n";
echo '												<legend>'.$lang_ModifUnLien."</legend>\n";
echo '												<input type="hidden" name="homepage" value="'.$homepage.'" />'."\n";
echo '												<input type="hidden" name="page" value="'.$page.'" />'."\n";
echo '												<div class="form-group">'."\n";
echo '													<div class="controls">'."\n";
echo '														<select class="form-control input-large" id="choix_lien" name="choix_lien" onchange="setinputname()">'."\n";
echo '															<option value="">'.$lang_LienChoix.'</option>'."\n";
choix_lien(1);
echo '													</select>'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '												<br>'."\n";
echo '												<div class="form-group">'."\n";
echo '													<label class="control-label" for="new_titre">'.$lang_Nom.'</label>'."\n";
echo '													<div class="controls">'."\n";
echo '														<input class="form-control input-large" type="text" id="new_titre" name="new_titre" value="'.$new_titre.'" />'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '												<div class="form-group">'."\n";
echo '													<label class="control-label" for="new_url">'.$lang_URL.'</label>'."\n";
echo '													<div class="controls">'."\n";
echo '														<input class="form-control input-xlarge" type="text" id="new_url" name="new_url" value="'.$new_url.'" />'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '												<div class="form-group">'."\n";
echo '													<div class="controls">'."\n";
echo '														<select class="form-control input-large" id="new_rubrique" name="new_rubrique">'."\n";
echo '															<option value="">'.$lang_ChoixRubrique.'</option>'."\n";
choix_rubrique();
echo '													</select>'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '												<div class="form-group">'."\n";
echo '													<div class="controls">'."\n";
echo '														<button type="submit" class="btn btn-success">'.$lang_Modifier.' <span class="glyphicon glyphicon-chevron-right icon-white"></span></button>'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '											</fieldset>'."\n";
echo '										</form>'."\n";
?>
<script type="text/javascript">
function setinputname() {
	var info_tmp = document.getElementById("choix_lien").options[document.getElementById('choix_lien').selectedIndex].text;
	var info_array = info_tmp.split(" ¦ ");
	document.getElementById("new_titre").value = info_array[0];
	document.getElementById("new_url").value = info_array[1];
	document.getElementById("new_rubrique").value = info_array[2];
}
</script>
									</div>
									<div class="col-md-6">
<?php
/**
 * [fr]Supprimer un lien
 */
echo '										<form role="form" class="form" method="post" action="'.$_SERVER['PHP_SELF'].'" name="sup_lien">'."\n";
echo '											<fieldset>'."\n";
echo '												<legend>'.$lang_LienSup."</legend>\n";
echo '												<input type="hidden" name="homepage" value="'.$homepage.'" />'."\n";
echo '												<input type="hidden" name="page" value="'.$page.'" />'."\n";
echo '												<div class="form-group">'."\n";
echo '													<div class="controls">'."\n";
echo '														<select class="form-control input-large" id="sup_lien" name="sup_lien">'."\n";
echo '															<option value="" selected="selected">'.$lang_LienChoix.'</option>'."\n";
choix_lien();
echo '													</select>'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '												<div class="form-group">'."\n";
echo '													<div class="controls">'."\n";
echo '														<button type="submit" class="btn btn-danger">'.$lang_Supprimer.' <span class="glyphicon glyphicon-chevron-right icon-white"></span></button>'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '											</fieldset>'."\n";
echo '										</form>'."\n";
?>
							</div>
							</div>
							</div>
						</div>