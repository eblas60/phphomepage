<?php
/**
 * [fr]Fichier librairie de fonctions
 * [en]File of functions' library
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
 * [fr]Fonction listant les rubriques de la base
 *
 * @access	public
 * @version 	1.6
 * @param	string	[fr]0 ou 1 pour utilisation du paramètre selected dans un tag option
 * @return	string	[fr]Liste <option> des rubriques de la homepage
 */
function choix_rubrique($select = 0) {
	GLOBAL $mysqli, $cfg_Host, $cfg_User, $cfg_Pass, $cfg_Base,$homepage, $choix_rubrique, $rubriques_id, $rubrique, $new_rubrique,$cfg_charset;
	if (substr($rubriques_id, 0 ,1) != '-') {
		$rubriques_id = '-'.$rubriques_id;
	}
	if (substr($rubriques_id, -1) != '-') {
		$rubriques_id = $rubriques_id.'-';
	}
	$temp_rubrique		= explode ('-',substr($rubriques_id, 1, -1));
	$query1		= 'SELECT `id`, `titre`, `position` FROM `rubriques` WHERE (`actif` = \'\' OR `actif` is NULL) AND (';
	foreach ($temp_rubrique as $temp_id) {
		$query1		.= '`id` = \''.$temp_id . '\' OR ';
	}
	$query1		= substr($query1, 0, -3) . ') ORDER BY `position` ASC, `titre` ASC';
//echo __LINE__ . ' debug lib: <br>$query1 = '.$query1.'<br>'."\n";
	$id_array			= array();
	$titre_array		= array();
	$position_array		= array();
	$h = 0;
	if (strnatcmp(phpversion(),'4.3.7') >= 0)
	{
		// mysqli

		$mysqli->query("SET NAMES 'utf8'");
		$resultData1  = $mysqli->query($query1);
		while ($dataRow1 = $resultData1->fetch_assoc()) {
			$id_array[$h]			= $dataRow1['id'];
			$titre_array[$h]		= $dataRow1['titre'];
//echo __LINE__ . ' debug lib: <br>titre = '.$dataRow1['titre'].'<br>'."\n";
			$position_array[$h]		= $dataRow1['position'];
			$h++;
		}
		$resultData1->free();
	}
	else
	{
		$req1		= mysql_query ($query1);
		while ($dataRow1 = mysql_fetch_assoc($req1)) {
			$id_array[$h]			= $dataRow1['id'];
			$titre_array[$h]		= $dataRow1['titre'];
			$position_array[$h]		= $dataRow1['position'];
			$h++;
		}
	}
	$i			= 0;
	$rubriques = array();
	while($i < count($id_array)) {
		if ($titre_array[$i] != '') {
			$rubriques[$i] = '							<option value="'.$id_array[$i].'"';
			if (($choix_rubrique == $id_array[$i] && $select == 1) || ($rubrique == $id_array[$i] && $select == 0) || ($new_rubrique == $id_array[$i] && $select == 0)) {
				$rubriques[$i] .= 'selected';
			}
			$rubriques[$i] .= '>' . $position_array[$i] . ' &brvbar; ' . htmlentities($titre_array[$i], ENT_QUOTES, $cfg_charset).'</option>'."\n";
		}
		$i++;
	}
//	ksort ($rubriques);
	foreach ($rubriques as $key => $rubrique) {
		echo $rubrique;
	}
}
/**
 * [fr]Fonction listant les liens de la base
 *
 * @access	public
 * @version 1.5
 * @return	string	[fr]Liste <option> des liens de la homepage
 */
function choix_lien($select = 0) {
	GLOBAL $mysqli, $rubriques_id, $choix_lien, $cfg_charset;
	if (substr($rubriques_id, 0 ,1) != '-') {
		$rubriques_id = '-'.$rubriques_id;
	}
	if (substr($rubriques_id, -1) != '-') {
		$rubriques_id = $rubriques_id.'-';
	}
	$temp_rubrique	= explode ('-',substr($rubriques_id, 1, -1));
	$query1		= 'SELECT r.`id`, r.`position`, r.`titre`, l.`id` as id2, l.`titre` as titre2, l.`url` as url2 FROM `liens` as l LEFT JOIN `rubriques` as r ON l.`rubrique_id` = r.`id` WHERE (r.`actif` = \'\' OR r.`actif` is NULL) AND (l.`actif` = \'\' OR l.`actif` is NULL) AND (';
	foreach ($temp_rubrique as $temp_id) {
		$query1		.= '(r.`id` = \''.$temp_id . '\' AND l.`rubrique_id` = \''.$temp_id . '\') OR ';
	}
	$query1		= substr($query1, 0, -3) . ') ORDER BY r.`position` ASC, r.`titre` ASC, l.`titre` ASC';
echo __LINE__ . ' debug lib: <br>$query1 = '.$query1.'<br>' ."\n";
	$i			= 0;
	$rubriques	= array();
	$id_array			= array();
	$titre_array		= array();
	$position_array		= array();
	$id2_array			= array();
	$titre2_array		= array();
	$url2_array			= array();
	$old_titre			= '';
	$h = 0;
	if (strnatcmp(phpversion(),'4.3.7') >= 0)
	{
		// mysqli

		$mysqli->query("SET NAMES 'utf8'");
		$resultData1  = $mysqli->query($query1);
		while ($dataRow1 = $resultData1->fetch_assoc()) {
			$id_array[$h]			= $dataRow1['id'];
			$titre_array[$h]		= $dataRow1['titre'];
			$position_array[$h]		= $dataRow1['position'];
			$id2_array[$h]			= $dataRow1['id2'];
			$titre2_array[$h]		= $dataRow1['titre2'];
			$url2_array[$h]			= $dataRow1['url2'];
			$h++;
		}
		$resultData1->free();
	}
	else
	{
		$req1		= mysql_query ($query1);
		while ($dataRow1 = mysql_fetch_assoc($req1)) {
			$id_array[$h]			= $dataRow1['id'];
			$titre_array[$h]		= $dataRow1['titre'];
			$position_array[$h]		= $dataRow1['position'];
			$id2_array[$h]			= $dataRow1['id2'];
			$titre2_array[$h]		= $dataRow1['titre2'];
			$url2_array[$h]			= $dataRow1['url2'];
			$h++;
		}
	}
	while($i < count($id_array)) {
//echo __LINE__ . ' debug lib: <br>titre2 = '.$titre2_array[$i].'<br>' ."\n";
		$rubriques[$i] = '';
		if ($titre_array[$i] != $old_titre ) {
			$old_titre = $titre_array[$i];
			if ($old_titre != '') {
				$rubriques[$i] .= '							</optgroup>'."\n";
			}
			$rubriques[$i] = '							<optgroup label="'. $position_array[$i] . ' &brvbar; ' . htmlentities($titre_array[$i], ENT_QUOTES, $cfg_charset).'">'."\n";
		}
		$rubriques[$i] .= '								 <option';
		if (($choix_lien == $id_array[$i] && $select == 1)) {
			$rubriques[$i] .= ' selected';
		}
		$rubriques[$i] .= ' value="'.$id2_array[$i].'">' . htmlentities($titre2_array[$i], ENT_QUOTES, $cfg_charset) . ' &brvbar; ' . $url2_array[$i] . ' &brvbar; ' . $id_array[$i] . '</option>'."\n";
		$i++;
	}
	foreach ($rubriques as $key => $rubrique) {
		echo $rubrique;
	}
	echo '							</optgroup>'."\n";
}
/**
 * [fr]fonction générant autant de case que configuré dans le fichier config.inc.php et les remplis
 *
 * @access	public
 * @version 	1.7
 * @param	string	[fr]numéro de la case
 * @return	string	[fr]Affichage du contenu de la case
 */
function create_case($case) {
	GLOBAL $mysqli, $homepage, $font_rubrique, $font_lien, $cfg_font_fin, $target, $cfg_charset;
	$query1		= 'SELECT `rubriques_id` FROM `homepage` WHERE `nom` = \''.$homepage.'\'';
//echo __LINE__ . ' debug lib: <br>$query1 = '.$query1.'<br>' ."\n";
	if (strnatcmp(phpversion(),'4.3.7') >= 0)
	{
		// mysqli
		$mysqli->query("SET NAMES 'utf8'");
		$req1		= $mysqli->query($query1);
		$res1		= $req1->num_rows;
		if ($res1 !=0)
		{
			$dataRow1		= $req1->fetch_array(MYSQLI_ASSOC);
			$rubriques_id	= $dataRow1['rubriques_id'];
		}
	}
	else
	{
		$req1			= mysql_query ($query1);
		$rubriques_id	= mysql_result($req1,0,'rubriques_id');
	}
	$i			= 0;
	$array_display = array();
	if (isset($rubriques_id))
	{
		if (substr($rubriques_id, 0 ,1) != '-') {
			$rubriques_id = '-'.$rubriques_id;
		}
		if (substr($rubriques_id, -1) != '-') {
			$rubriques_id = $rubriques_id.'-';
		}
		$rubrique		= explode ('-',substr($rubriques_id, 1, -1));
		$nom_lien		= '';
		$nom_rubrique	= '';
		
		$query2		= 'SELECT `id`, `titre` FROM `rubriques` WHERE (`actif` = \'\' OR `actif` is NULL) AND `position` = '.$case.' AND (';
		foreach ($rubrique as $temp_id) {
			$query2		.= '`id` = \''.$temp_id . '\' OR ';
		}
		$query2		= substr($query2, 0, -3) . ') ORDER BY `titre` ASC';
//echo __LINE__ . ' debug lib: <br>$query2 = '.$query2.'<br>' ."\n";
		$id_array			= array();
		$titre_array		= array();
		$h = 0;
		if (strnatcmp(phpversion(),'4.3.7') >= 0)
		{
			// mysqli
			$mysqli->query("SET NAMES 'utf8'");
			$req2	= $mysqli->query($query2);
			$res2	= $req2->num_rows;
			if ($res2 != 0)
			{
				while ($dataRow2 = $req2->fetch_assoc()) {
					$id_array[$h]			= $dataRow2['id'];
					$titre_array[$h]		= $dataRow2['titre'];
					$h++;
				}
			}
		}
		else
		{
			$req2	= mysql_query ($query2);
			$res2	= mysql_num_rows($req2);
			if ($res2 !=0)
			{
				while ($dataRow2 = mysql_fetch_assoc($req2)) {
					$id_array[$h]			= $dataRow2['id'];
					$titre_array[$h]		= $dataRow2['titre'];
					$h++;
				}
			}
		}
		if ($res2 != 0) {
			$g = 0;
			while( $g < $res2 ) {
				$nom_rubrique = '					<p id="m'.$id_array[$g].'" class="rubrique">'.htmlentities($titre_array[$g], ENT_QUOTES, $cfg_charset)."</p>\n";
				$array_display[$rubrique[$i]]['titre'] = $nom_rubrique;
				$query3		= 'SELECT `titre`, `url` FROM `liens` WHERE `rubrique_id` = '.$id_array[$g].' AND (`actif` = \'\' OR `actif` is NULL) ORDER BY `titre` ASC';
//echo __LINE__ . ' debug lib: <br>$query3 = '.$query3.'<br>' ."\n";
				if (strnatcmp(phpversion(),'4.3.7') >= 0)
				{
					// mysqli
					$mysqli->query("SET NAMES 'utf8'");
					$req3	= $mysqli->query($query3);
					$res3	= $req3->num_rows;
				}
				else
				{
					$req3	= mysql_query ($query3);
					$res3	= mysql_num_rows($req3);
				}
				$j			= 0;
				$html		= '';
	//				while($res3 != $j) {
				while ($dataRow3 = mysqli_fetch_assoc($req3)) {
					$titre_admin = '';
					if (strnatcmp(phpversion(),'4.3.7') >= 0)
					{
						$titre		= $dataRow3['titre'];
						$url		= $dataRow3['url'];
					}
					else {
						$titre		= mysql_result($req3,$j,'titre');
						$url		= mysql_result($req3,$j,'url');
					}
					$titre_admin = explode(' - Admin',$titre);
					// pour les admin de cms
					if ( isset($nom_lien) && $nom_lien != '' && $titre_admin[0] == $nom_lien ) {
						$nom_lien	= str_replace( $nom_lien . ' - ', '',$titre );
						$html		= str_replace( '<a href="'.$lien.'" class="btn btn-default lien"','<a href="'.$lien.'" class="btn btn-default lien inline" ', $html) ;
						$lien		= $url;
						$class		= ' inline';
						$br			= '					<br />'."\n";
						$before		= '- ';
					} else {
						$nom_lien	= $titre;
						$lien		= $url;
						$class		= '';
						$br			= '';
						$before		= '';
					}
					if ($target != 1) {
						$html .= '					'.$before.'<a href="'.$lien.'" class="btn btn-default lien'.$class.'" title="'.$lien.'" target="_blank" role="button">'.htmlentities($nom_lien, ENT_QUOTES, $cfg_charset).'</a>'."\n";
					} else {
						$html .= '					'.$before.'<a href="'.$lien.'" class="btn btn-default lien'.$class.'" title="'.$lien.'" target="_self" role="button">'.htmlentities($nom_lien, ENT_QUOTES, $cfg_charset).'</a>'."\n";
					}
					$html .= $br;
					$j++;
				}
				$req3->free();
				$array_display[$rubrique[$i]]['liens'] = $html;
				$g++;
				$i++;
			}
		}
		$req2->free();
	}
	$req1->free();
//	$array_display = array_sort($array_display, 'titre', SORT_ASC);
	foreach($array_display as $value) {
		echo $value['titre'];
		echo $value['liens'];
	}
	echo '					<br />'."\n";
}
/**
 * Simple function to sort an array by a specific key. Maintains index association.
 *
 * array	array	Tableau a trier
 * on	string	valeur du tri
 * order	string Ordre du tri
 * Return	nouveau tableau
 */
function array_sort($array, $on, $order=SORT_ASC)
{
	$new_array = array();
	$sortable_array = array();

	if (count($array) > 0) {
		foreach ($array as $k => $v) {
			if (is_array($v)) {
				foreach ($v as $k2 => $v2) {
					if ($k2 == $on) {
						$sortable_array[$k] = $v2;
					}
				}
			} else {
				$sortable_array[$k] = $v;
			}
		}

		switch ($order) {
			case SORT_ASC:
				asort($sortable_array);
			break;
			case SORT_DESC:
				arsort($sortable_array);
			break;
		}

		foreach ($sortable_array as $k => $v) {
			$new_array[$k] = $array[$k];
		}
	}

	return $new_array;
}
/**
 * Fonction pour vérifier que l'URL est fonctionnel
 *
 * Url	string	L'url a tester
 * Return	true/false
 */
function http_file_exists($url)
{
	// first do some quick sanity checks:
	if (!$url || !is_string($url)) {
		return false;
	}
	// quick check url is roughly a valid http request: ( http://blah/... ) 
	if ( ! preg_match('/^http(s)?:\/\/[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $url) ){
		return false;
	}
	// the next bit could be slow:
	if (function_exists('curl_init')) {
		if(getHttpResponseCode_using_curl($url) != 200) {
			return false;
		}
	} else if(getHttpResponseCode_using_getheaders($url) != 200) { 
		return false;
	}
	// all good!
	return true;
}
function getHttpResponseCode_using_curl($url, $followredirects = true) {
	// returns int responsecode, or false (if url does not exist or connection timeout occurs)
	// NOTE: could potentially take up to 0-30 seconds , blocking further code execution (more or less depending on connection, target site, and local timeout settings))
	// if $followredirects == false: return the FIRST known httpcode (ignore redirects)
	// if $followredirects == true : return the LAST  known httpcode (when redirected)
	if(! $url || ! is_string($url)) {
		return false;
	}
	$ch = @curl_init($url);
	if($ch === false) {
		return false;
	}
	@curl_setopt($ch, CURLOPT_HEADER         ,true);    // we want headers
	@curl_setopt($ch, CURLOPT_NOBODY         ,true);    // dont need body
    @curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	// cUrl won't checkout the certificate
	@curl_setopt($ch, CURLOPT_USERAGENT, true); // some site needs that to function properly
	@curl_setopt($ch, CURLOPT_RETURNTRANSFER ,true);    // catch output (do NOT print!)
	if($followredirects){
		@curl_setopt($ch, CURLOPT_FOLLOWLOCATION ,true);
		@curl_setopt($ch, CURLOPT_MAXREDIRS      ,10);  // fairly random number, but could prevent unwanted endless redirects with followlocation=true
	}else{
		@curl_setopt($ch, CURLOPT_FOLLOWLOCATION ,false);
	}
//      @curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,5);   // fairly random number (seconds)... but could prevent waiting forever to get a result
//      @curl_setopt($ch, CURLOPT_TIMEOUT        ,6);   // fairly random number (seconds)... but could prevent waiting forever to get a result
//      @curl_setopt($ch, CURLOPT_USERAGENT      ,"Mozilla/5.0 (Windows NT 6.0) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1");   // pretend we're a regular browser
	@curl_exec($ch);
	if(@curl_errno($ch)) {   // should be 0
		@curl_close($ch);
		return false;
	}
	$code = @curl_getinfo($ch, CURLINFO_HTTP_CODE); // note: php.net documentation shows this returns a string, but really it returns an int
	@curl_close($ch);
	return $code;
}

function getHttpResponseCode_using_getheaders($url, $followredirects = true){
	// returns string responsecode, or false if no responsecode found in headers (or url does not exist)
	// NOTE: could potentially take up to 0-30 seconds , blocking further code execution (more or less depending on connection, target site, and local timeout settings))
	// if $followredirects == false: return the FIRST known httpcode (ignore redirects)
	// if $followredirects == true : return the LAST  known httpcode (when redirected)
	if(! $url || ! is_string($url)){
		return false;
	}
	$headers = @get_headers($url);
	if($headers && is_array($headers)){
		if($followredirects){
			// we want the the last errorcode, reverse array so we start at the end:
			$headers = array_reverse($headers);
		}
		foreach($headers as $hline){
			// search for things like "HTTP/1.1 200 OK" , "HTTP/1.0 200 OK" , "HTTP/1.1 301 PERMANENTLY MOVED" , "HTTP/1.1 400 Not Found" , etc.
			// note that the exact syntax/version/output differs, so there is some string magic involved here
			if(preg_match('/^HTTP\/\S+\s+([1-9][0-9][0-9])\s+.*/', $hline, $matches) ){// "HTTP/*** ### ***"
				$code = $matches[1];
				return $code;
			}
		}
		// no HTTP/xxx found in headers:
		return false;
	}
	// no headers :
	return false;
}
