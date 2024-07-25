<?php
/**
 * [fr]Fichier d'ajout de rubrique de la homepage
 * [en]File of addition of headings of the homepage
 *
 * @copyright	20/12/2016
 * @since		09/01/2001
 * @version		1.8
 * @module		homepage
 * @modulegroup	homepage
 * @package		php_homepage
 * @access		public
 * @author		Eric BLAS <webmaster@phphomepage.net>
/**
 * [fr]Gestion des diverses erreurs
 */
?>
						<div class="row">
							<div class="col-md-12">
<?php
echo '								<h2><strong>'.$lang_Rubrique."</strong></h2>\n";
if (!isset($rubriques_id)) {
	$rubriques_id = '';
}
if (empty($creer_nom) && !empty($_POST['creer_nom'])) {
	$creer_nom = $_POST['creer_nom'];
}
if (empty($position) && !empty($_POST['position']) && is_int(intval($_POST['position'])) == true && intval($_POST['position']) > 0) {
	$position = $_POST['position'];
								print_r($_POST);
}
if (empty($sup_rubrique) && !empty($_POST['sup_rubrique'])) {
	$sup_rubrique = $_POST['sup_rubrique'];
}
if (empty($choix_rubrique) && !empty($_POST['choix_rubrique'])) {
	$choix_rubrique = $_POST['choix_rubrique'];
}
if (empty($new_nom) && !empty($_POST['new_nom'])) {
	$new_nom = $_POST['new_nom'];
}
if (empty($nvelle_position) && !empty($_POST['nvelle_position'])) {
	$nvelle_position = $_POST['nvelle_position'];
}
if (isset($creer_nom) || isset($_POST['creer_nom'])) {
	if (empty($_POST['creer_nom']) || $creer_nom == '') {
		echo '						<p class="text-danger">'.$lang_ErrorRubNom."</p>\n";
		$creer_nom = '';
	}
	if (empty($_POST['position']) || $position == '') {
		echo '						<p class="text-danger">'.$lang_ErrorRubPosition."</p>\n";
		$position = '';
	} elseif ($position > ($cfg_NbrLignes * $cfg_NbrColonnes)) {
		echo '						<p class="text-danger">'.$lang_ErrorRubPositionSup."</p>\n";
		$position = '';
	}
	if ($creer_nom != '' && $position != '') {
		$query2			= 'INSERT INTO `rubriques` (`id`, `actif`, `titre`, `position`) VALUES'."(NULL, NULL, '".$creer_nom."', '".$position."')";
//echo __LINE__ . ' debug rubrique: <br>$query2 = '.$query2.'<br>';
		if (strnatcmp(phpversion(),'4.3.7') >= 0) {
			$mysqli->query("SET NAMES 'utf8'");
			$result2 = $mysqli->query($query2);
		} else
			$result2 = mysql_query($query2);
		if (!$result2) {
			if (strnatcmp(phpversion(),'4.3.7') >= 0)
				$error = $mysqli->error;
			else
				$error = mysql_error();
			die('						<p class="text-danger">' . $lang_error_query . $error."</p>\n");
		} else {
			if (strnatcmp(phpversion(),'4.3.7') >= 0)
				$new_rubrique_id = $mysqli->insert_id;
			else
				$new_rubrique_id = mysql_insert_id();
		}
//echo __LINE__ . ' debug rubrique: <br>$new_rubrique_id = '.$new_rubrique_id.'<br>';
		if ($rubriques_id != '') {
			if (substr($rubriques_id, 0 ,1) != '-') {
				$rubriques_id = '-'.$rubriques_id;
			}
			if (substr($rubriques_id, -1) != '-') {
				$rubriques_id = $rubriques_id.'-';
			}
			$new_rubriques_id = $rubriques_id.$new_rubrique_id.'-';
		} else {
			$new_rubriques_id = '-'.$new_rubrique_id.'-';
		}
		$query2a			= 'UPDATE `homepage` SET `rubriques_id`=\''.$new_rubriques_id.'\' WHERE `nom` = \''.$homepage.'\'';
//echo __LINE__ . ' debug rubrique: <br>$query2a = '.$query2a.'<br>';
		if (strnatcmp(phpversion(),'4.3.7') >= 0)
			$result2a = $mysqli->query($query2a);
		else
			$result2a = mysql_query($query2a);

		if (!$result2a) {
			if (strnatcmp(phpversion(),'4.3.7') >= 0)
				$error = $mysqli->error;
			else
				$error = mysql_error();
			die('						<p class="text-danger">' . $lang_error_query . $error."</p>\n");
		}
		$rubriques_id = $new_rubriques_id;
		echo '						<p class="text-success">'.$lang_RubOK."</p>\n";
		$creer_nom = '';
		$position = '';
	}
}
if (isset($sup_rubrique) || isset($_POST['sup_rubrique'])) {
	if (empty($_POST['sup_rubrique']) || $sup_rubrique == '') {
		echo '						<p class="text-danger">'.$lang_ErrorRubSupp."</p>\n";
	} else {
		echo '						<p class="text-success">'.$lang_RubSupp."</p>\n";
		$query3			= 'UPDATE `rubriques` SET `actif` = 1 WHERE `id` = '.$sup_rubrique;
//echo __LINE__ . ' debug rubrique: <br>$query3 = '.$query3.'<br>';
		if (strnatcmp(phpversion(),'4.3.7') >= 0)
			$result3 = $mysqli->query($query3);
		else
			$result3 = mysql_query($query3);
		if (!$result3) {
			if (strnatcmp(phpversion(),'4.3.7') >= 0)
				$error = $mysqli->error;
			else
				$error = mysql_error();
			die('						<p class="text-danger">' . $lang_error_query . $error."</p>\n");
		}
		$query4			= 'UPDATE `liens` SET `actif` = 1 WHERE `rubrique_id` = '.$sup_rubrique;
//echo __LINE__ . ' debug rubrique: <br>$query4 = '.$query4.'<br>';
		if (strnatcmp(phpversion(),'4.3.7') >= 0)
			$result4 = $mysqli->query($query4);
		else
			$result4 = mysql_query($query4);
		if (!$result4) {
			if (strnatcmp(phpversion(),'4.3.7') >= 0)
				$error = $mysqli->error;
			else
				$error = mysql_error();
			die('						<p class="text-danger">' . $lang_error_query . $error."</p>\n");
		}
	}
}
if (isset($choix_rubrique) || isset($_POST['choix_rubrique'])) {
	if (empty($_POST['choix_rubrique']) || $choix_rubrique == '') {
		echo '						<p class="text-danger">'.$lang_ErrorRubModif."</p>\n";
	}
	if (empty($_POST['new_nom']) || $new_nom == '') {
		echo '						<p class="text-danger">'.$lang_ErrorRubNomPlace."</p>\n";
		$new_nom = '';
	} elseif (empty($_POST['nvelle_position']) || $nvelle_position == '') {
		echo '						<p class="text-danger">'.$lang_ErrorRubPosition."</p>\n";
		$nvelle_position = '';
	} elseif ($nvelle_position > ($cfg_NbrLignes * $cfg_NbrColonnes)) {
		echo '						<p class="text-danger">'.$lang_ErrorRubPositionSup."</p>\n";
		$nvelle_position = '';
	} else {
		echo '						<p class="text-success">'.$lang_ModifRubOK."</p>\n";
		$query5			= "UPDATE `rubriques` SET `titre`='$new_nom', `position`='$nvelle_position' WHERE `id`='$choix_rubrique'";
//echo __LINE__ . ' debug rubrique: <br>$query5 = '.$query5.'<br>';
		if (strnatcmp(phpversion(),'4.3.7') >= 0) {
			$mysqli->query("SET NAMES 'utf8'");
			$result5 = $mysqli->query($query5);
		}
		else
			$result5 = mysql_query($query5);
		if (!$result5) {
			if (strnatcmp(phpversion(),'4.3.7') >= 0)
				$error = $mysqli->error;
			else
				$error = mysql_error();
			die('						<p class="text-danger">' . $lang_error_query . $error."</p>\n");
		}
	}
}
/**
 * [fr]Ajout d'une rubrique
 */
if (!isset($creer_nom)) {
	$creer_nom = '';
}
if (!isset($position)) {
	$position = '';
}
?>
								<div class="row">
									<div class="col-md-6">
<?php
echo '										<form role="form" class="form" method="post" action="'.$_SERVER['PHP_SELF'].'" name="ajout_rubrique" accept-charset="UTF-8">'."\n";
echo '											<fieldset>'."\n";
echo '												<legend>'.$lang_NvelleRubrique."</legend>\n";
echo '												<input type="hidden" name="homepage" value="'.$homepage.'" />'."\n";
echo '												<input type="hidden" name="page" value="'.$page.'" />'."\n";
echo '												<div class="form-group">'."\n";
echo '													<label class="control-label" for="creer_nom">'.$lang_Nom.'</label>'."\n";
echo '													<div class="controls">'."\n";
echo '														<input class="form-control input-large" type="text" id="creer_nom" name="creer_nom" value="'.$creer_nom.'" />'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '												<div class="form-group">'."\n";
echo '													<label class="control-label" for="position">'.$lang_PlacerRubrique.'</label>'."\n";
echo '													<div class="controls">'."\n";
echo '														<select class="form-control input-large" id="position" name="position">'."\n";
echo '															<option value=""';
if ($position == 0)
	echo ' selected="selected"';
echo '>-</option>'."\n";
for ($i = 1;$i <= $cfg_NbrCase; $i++) {
	echo '															<option value="'.$i.'"';
	if ($i == $position)
		echo ' selected="selected"';
	echo '>'.$i.'</option>'."\n";
}
echo '														</select>'."\n";
//echo '														<input class="form-control input-mini" type="text" id="position" name="position" value="'.$position.'" />'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '												<div class="form-group">'."\n";
echo '													<div class="controls">'."\n";
echo '														<button type="submit" class="btn btn-success">'.$lang_Creer.' <span class="glyphicon glyphicon-chevron-right icon-white"></span></button>'."\n";
echo '													</div>'."\n";
echo '												</div>'."\n";
echo '											</fieldset>'."\n";
echo '										</form>'."\n";

if ($rubriques_id != '') {
	/**
	 * [fr]Modification d'une rubrique
	 */
	if (!isset($new_nom)) {
		$new_nom			= '';
	}
	if (!isset($nvelle_position)) {
		$nvelle_position	= '';
	}
	echo '										<form role="form" class="form" method="post" action="'.$_SERVER['PHP_SELF'].'" name="modif_rubrique" accept-charset="UTF-8">'."\n";
	echo '											<fieldset>'."\n";
	echo '												<legend>'.$lang_ModifUneRubrique."</legend>\n";
	echo '												<input type="hidden" name="homepage" value="'.$homepage.'" />'."\n";
	echo '												<input type="hidden" name="page" value="'.$page.'" />'."\n";
	echo '												<div class="form-group">'."\n";
	echo '													<div class="controls">'."\n";
	echo '														<select class="form-control input-large" id="choix_rubrique" name="choix_rubrique" onchange="setinputname()">'."\n";
	echo '															<option value="">'.$lang_ChoixRubrique.'</option>'."\n";
	choix_rubrique(1);
	echo '														</select>'."\n";
	echo '													</div>'."\n";
echo '													<label class="control-label" for="new_nom">'.$lang_Nom.'</label>'."\n";
echo '													<div class="controls">'."\n";
echo '														<input class="form-control input-large" type="text" id="new_nom" name="new_nom" value="'.$new_nom.'" />'."\n";
	echo '													</div>'."\n";

	echo '													<label class="control-label" for="new_nom">'.$lang_Place.'</label>'."\n";
	echo '													<div class="controls">'."\n";
	echo '														<select class="form-control input-large" id="nvelle_position" name="nvelle_position">'."\n";
	echo '															<option value=""';
		if ($nvelle_position == 0)
			echo ' selected="selected"';
		echo '>-</option>'."\n";
	for ($i = 1;$i <= $cfg_NbrCase; $i++) {
		echo '															<option value="'.$i.'"';
		if ($i == $nvelle_position)
			echo ' selected="selected"';
		echo '>'.$i.'</option>'."\n";
	}
	echo '														</select>'."\n";
//echo '														<input class="form-control input-mini" type="text" id="new_nom" name="nvelle_position" value="'.$nvelle_position.'" />'."\n";
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
	var info_tmp = document.getElementById("choix_rubrique").options[document.getElementById('choix_rubrique').selectedIndex].text;
	var info_array = info_tmp.split(" ¦ ");
	document.getElementById("nvelle_position").value = info_array[0];
	document.getElementById("new_nom").value = info_array[1];
}
</script>
<?php
	/**
	 * [fr]suppression d'une rubrique
	 */
	echo '										<form role="form" class="form" method="post" action="'.$_SERVER['PHP_SELF'].'" name="ajout_rubrique" accept-charset="UTF-8">'."\n";
	echo '											<fieldset>'."\n";
	echo '												<legend>'.$lang_SuppRubrique."</legend>\n";
	echo '												<input type="hidden" name="homepage" value="'.$homepage.'" />'."\n";
	echo '												<input type="hidden" name="page" value="'.$page.'" />'."\n";
	echo '												<div class="form-group">'."\n";
	echo '													<div class="controls">'."\n";
	echo '														<select class="form-control input-large" id="sup_rubrique" name="sup_rubrique">'."\n";
	echo '															<option value="" selected="selected">'.$lang_ChoixRubrique.'</option>'."\n";
	choix_rubrique(0);
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
}
?>
									</div>
									<div class="col-md-6">
<?php
echo '										<label>'.$lang_PlacerRubrique."</label>\n";

echo '		<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">'."\n";
$k = 0;
while($cfg_NbrLignes != $k) {
	echo '												<div class="row">'."\n";
	$case	= 1+($k*$cfg_NbrColonnes);
	$largeur = 12/$cfg_NbrColonnes;
	$l		= 0;
	while($cfg_NbrColonnes != $l) {
		$case1 = $case+$l;
		echo '													<div class="col-md-'.$largeur.' table-bordered" style="background-color: #FFFFFF;">';
		echo '<p class="text-center"><br /><strong>'.$case1.'</strong></p>';
		echo "</div>\n";
		$l++;
	};
	echo '												</div>'."\n";
	$k++;
};
echo '
						</div>
					</div>
					</div>'."\n";
?>
									</div>
								</div>
							</div>
						</div>
