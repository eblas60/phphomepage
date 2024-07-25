<?php
/**
 * [fr]Fichier d'accueil de création de homepage
 * [en]File of greeting of creation of homepage
 *
 * @copyright	11/06/2021
 * @since		09/01/2001
 * @version		1.9
 * @module		homepage
 * @modulegroup	homepage
 * @package		php_homepage
 * @access		public
 * @author		Eric BLAS <webmaster@phphomepage.net>
 */
/**
 * [fr]Si première connexion on affiche les explications
 */
if ($res1 == '' OR $rubriques_id == '') {
    $query2 = 'INSERT INTO homepage VALUES'."('','".$homepage."','','')";
	if (strnatcmp(phpversion(),'4.3.7') >= 0)
	{
		// mysqli
		$mysqli->query("SET NAMES 'utf8'");
		$resultData2  = $mysqli->query($query2, MYSQLI_USE_RESULT);
	}
	else
	{
		mysqli_query ($link, $query2);
	}
    echo '                    <ol>'."\n";
    echo '                        <li>'.$lang_1."</li>\n";
    echo '                        <li>'.$lang_2."</li>\n";
    echo '                        <li>'.$lang_3."</li>\n";
    echo '                        <li>'.$lang_4."</li>\n";
    echo '                    </ol>'."\n";
} else {
    /**
     * [fr]si pas de mise en page on continue à afficher les explications
     */
    if ($mise_en_page_id == 0) {
    echo '                    <ol>'."\n";
        echo '                    <li>'.$lang_3."</li>\n";
        echo '                    <li>'.$lang_4."</li>\n";
    echo '                    </ol>'."\n";
    }
    /**
     * [fr]Enfin on récapitule les infos contenus dans la page
     */
    echo '                    <p>'.$lang_Constituer1.' <b>'.$homepage.'</b> '.$lang_Constituer2."</p>\n";
    if (substr($rubriques_id, 0 ,1) != '-') {
        $rubriques_id = '-'.$rubriques_id;
    }
    if (substr($rubriques_id, -1) != '-') {
        $rubriques_id = $rubriques_id.'-';
    }
    if (strstr(substr($rubriques_id, 1, -1),'-')) {
        $rubrique     = explode ('-',substr($rubriques_id, 1, -1));
    } else {
        $rubrique     = array(0=>substr($rubriques_id, 1, -1));
    }
    $i            = 0;
	$rubriqueArray = array();
    while($i < count($rubrique)) {
        $query2         = 'SELECT `id`, `titre`, `position`, `actif` FROM rubriques WHERE `id` = '.$rubrique[$i].' AND `actif` != \'1\' ORDER BY `position` ASC, `titre` ASC';
		if (strnatcmp(phpversion(),'4.3.7') >= 0)
		{
			// mysqli
			$mysqli->query("SET NAMES 'utf8'");
			$req2           = $mysqli->query($query2, MYSQLI_USE_RESULT);
			$dataRow2       = $req2->fetch_array(MYSQLI_ASSOC);
			$id_rub         = $dataRow2['id'];
			$nom_rubrique   = $dataRow2['titre'];
			$place_rubrique = $dataRow2['position'];
			$actif          = $dataRow2['actif'];
			$req2->free();
		}
		else
		{
			$req2           = mysqli_query ($link, $query2);
			$id_rub         = mysqli_result($req2,0,'id');
			$nom_rubrique   = mysqli_result($req2,0,'titre');
			$place_rubrique = mysqli_result($req2,0,'position');
			$actif          = mysqli_result($req2,0,'actif');
		}
        if ($actif != 1 && $nom_rubrique != '') {
            $rubriqueArray[$place_rubrique][$nom_rubrique] = '                    <div class="col-md-6"><p><strong>'.htmlentities($nom_rubrique, ENT_QUOTES, $cfg_charset).'</strong> <em>'.$lang_Position.' '.$place_rubrique."</em></p>\n                    <blockquote><p>";
            $query3         = 'SELECT `id`, `titre`, `url`, `actif` FROM liens WHERE `rubrique_id` = '.$rubrique[$i].' AND `actif` != \'1\' ORDER BY `titre` ASC';
			if (strnatcmp(phpversion(),'4.3.7') >= 0)
			{
				// mysqli
				$mysqli->query("SET NAMES 'utf8'");
				$req3           = $mysqli->query($query3);
				$res3           = $req3->num_rows;
			}
			else
			{
				$req3           = mysqli_query ($link, $query3);
				$res3           = mysqli_num_rows($req3);
			}
            $j              = 0;
//			echo '$query3 = '.$query3."<br />\n";
//            while($res3 != $j) {
			while ($dataRow3 = mysqli_fetch_assoc($req3)) {
				if (strnatcmp(phpversion(),'4.3.7') >= 0)
				{
					$id_lien      = $dataRow3['id'];
					$nom_lien     = $dataRow3['titre'];
					$url          = $dataRow3['url'];
					$actif        = $dataRow3['actif'];
				}
				else {
					$id_lien        = mysqli_result($req3,$j,'id');
					$nom_lien       = mysqli_result($req3,$j,'titre');
					$url            = mysqli_result($req3,$j,'url');
					$actif          = mysqli_result($req3,$j,'actif');
				}
                $rubriqueArray[$place_rubrique][$nom_rubrique] .=  '                    <small><a href="'.$url.'" target="_blank" title="'.htmlentities($nom_lien, ENT_QUOTES, $cfg_charset).'">'.htmlentities($nom_lien, ENT_QUOTES, $cfg_charset).'</a><br /> <span class="glyphicon glyphicon-globe"></span>&nbsp;&nbsp;url = '.$url."</small>\n";
                $j++;
            }
			$rubriqueArray[$place_rubrique][$nom_rubrique] .=  '                    </p></blockquote></div>';
        }
        $i++;
    }
	ksort($rubriqueArray);
//	print_r($rubriqueArray);
	foreach ($rubriqueArray as $place) {
		asort($place);
		foreach ($place as $lien) {
			echo $lien;
		}
	}
}
?>