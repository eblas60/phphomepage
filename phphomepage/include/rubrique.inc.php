<?php
/**
 * [fr]Fichier d'ajout de rubrique de la homepage
 * [en]File of addition of headings of the homepage
 *
 * @copyright    16/11/2003
 * @since	     09/01/2001
 * @version      1.5
 * @module       rubrique
 * @modulegroup  include
 * @package      php_homepage
 * @access	     public
 * @author       Eric BLAS <webmaster@phphomepage.net>
 */
/**
 * [fr]Gestion des diverses erreurs
 */
if (isset($creer_nom)) {
    if ($creer_nom == '') {
        echo '                    '.$cfg_font_1_r.'<b>'.$lang_ErrorRubNom.'</b>'.$cfg_font_fin."<br>\n";
    }
    if ($position == '') {
        echo '                    '.$cfg_font_1_r.'<b>'.$lang_ErrorRubPosition.'</b>'.$cfg_font_fin."<br>\n";;
    }
    if ($creer_nom != '' AND $position != '') {
        echo '                    '.$cfg_font_1_r.'<b>'.$lang_RubOK.'</b>'.$cfg_font_fin."<br>\n";
        $query2          = 'INSERT INTO rubriques VALUES'."('','','".$creer_nom."','".$position."')";
        mysql_query ($query2);
        $new_rubrique_id = mysql_insert_id();
        if ($rubriques_id != '') {
            $old_rubriques_id = mysql_result($req1,0,'rubriques_id');
            $new_rubriques_id = $rubriques_id.'-'.$new_rubrique_id;
        } else {
            $new_rubriques_id = $new_rubrique_id;
        }
        $query2          = 'UPDATE homepage SET rubriques_id=\''.$new_rubriques_id.'\' WHERE nom = \''.$homepage.'\'';
        mysql_query ($query2);
        $rubriques_id    = $new_rubriques_id;
        $creer_nom = '';
        $position = '';
    }
}
if (isset($sup_rubrique)) {
    if ($sup_rubrique == '') {
        echo '                    '.$cfg_font_1_r.'<b>'.$lang_ErrorRubSupp.'</b>'.$cfg_font_fin."<br>\n";
    } else {
        echo '                    '.$cfg_font_1_r.'<b>'.$lang_RubSupp.'</b>'.$cfg_font_fin."<br>\n";
        $query3          = 'UPDATE rubriques SET actif = 1 WHERE id = '.$sup_rubrique;
        mysql_query ($query3);
    }
}
if (isset($choix_rubrique)) {
    if ($choix_rubrique == '') {
        echo '                    '.$cfg_font_1_r.'<b>'.$lang_ErrorRubModif.'</b>'.$cfg_font_fin."<br>\n";
    } elseif ($new_nom == '' OR $nvelle_position == '') {
        echo '                    '.$cfg_font_1_r.'<b>'.$lang_ErrorRubNomPlace.'</b>'.$cfg_font_fin."<br>\n";
    } else {
        echo '                    '.$cfg_font_1_r.'<b>'.$lang_ModifRubOK.'</b>'.$cfg_font_fin."<br>\n";
        $query4          = "UPDATE rubriques SET titre='$new_nom', position='$nvelle_position' WHERE id='$choix_rubrique'";
        mysql_query ($query4);
    }
}
/**
 * [fr]Ajout d'une rubrique
 */
echo '                    '.$cfg_font_3_n.'<b>'.$lang_Rubrique.'</b>'.$cfg_font_fin."<BR>\n";
if (!isset($creer_nom)) {
    $creer_nom  = '';
}
if (!isset($position)) {
    $position  = '';
}
echo '                    <form method="post" action="'.$_SERVER['PHP_SELF'].'" name="ajout_rubrique">'."\n";
echo '                        <input type="hidden" name="homepage" value="'.$homepage.'">'."\n";
echo '                        <input type="hidden" name="page" value="'.$page.'">'."\n";
echo '                        <table width="100%" border="0" cellspacing="0" cellpadding="0">'."\n";
echo '                            <tr>'."\n";
echo '                                <td>'.$cfg_font_2_n.$lang_NvelleRubrique.$cfg_font_fin."<br>\n";
echo '                                    <br>'."\n";
echo '                                    '.$cfg_font_1_n.$lang_Nom.$cfg_font_fin.'<input type="text" '.$cfg_Formulaire.' name="creer_nom" size="20" maxlength="255" value="'.$creer_nom.'"><br>'."\n";
echo '                                    '.$cfg_font_1_n.$lang_PlacerRubrique.$cfg_font_fin.'<input type="text" '.$cfg_Formulaire.' name="position" size="2" maxlength="2" value="'.$position.'"><br>'."\n";
echo '                                    <input type="submit" '.$cfg_Formulaire.' name="Submit" value="'.$lang_Creer.'">'."\n";
echo '                                </td>'."\n";
echo '                                <td>'.$cfg_font_1_n.$lang_PlacerRubrique.$cfg_font_fin."\n";
echo '                                    <table width="50%" border="2" cellspacing="3" cellpadding="0" bgcolor="#'.$cfg_FondGauche.'">'."\n";
$k = 0;
WHILE($cfg_NbrLignes != $k) {
    echo '                                        <tr valign="top">'."\n";
    $case    = 1+($k*$cfg_NbrColonnes);
    $largeur = 100/$cfg_NbrColonnes;
    $l       = 0;
    WHILE($cfg_NbrColonnes != $l) {
        $case1 = $case+$l;
        echo '                                            <td width="'.$largeur.'%" align="center" bgcolor="#'.$cfg_FondIndex.'">';
        echo $cfg_font_2_n.'<b>'.$case1.'</b>'.$cfg_font_fin;
        echo "</td>\n";
        $l++;
    };
    echo '                                        </tr>'."\n";
    $k++;
};
echo '                                    </table>'."\n";
echo '                                </td>'."\n";
echo '                            </tr>'."\n";
echo '                        </table>'."\n";
echo '                    </form>'."\n";
/**
 * [fr]suppression d'une rubrique
 */
if ($rubriques_id != '') {
    echo '                    <form method="post" action="'.$_SERVER['PHP_SELF'].'" name="sup_rubrique">'."\n";
    echo '                        <input type="hidden" name="homepage" value="'.$homepage.'">'."\n";
    echo '                        <input type="hidden" name="page" value="'.$page.'">'."\n";
    echo '                        '.$cfg_font_2_n.$lang_SuppRubrique.$cfg_font_fin.'<br><br>'."\n";
    echo '                        <select name="sup_rubrique" '.$cfg_Formulaire.' size="1">'."\n";
    echo '                            <option  value="" selected>'.$lang_ChoixRubrique.'</option>'."\n";
    choix_rubrique(0);
    echo '                        </select>'."\n";
    echo '                        <br>'."\n";
    echo '                        <input type="submit" '.$cfg_Formulaire.' name="Submit" value="'.$lang_Supprimer.'">'."\n";
    echo '                    </form>'."\n";
    /**
     * [fr]Modification d'une rubrique
     */
    if (!isset($new_nom)) {
        $new_nom  = '';
    }
    if (!isset($nvelle_position)) {
        $nvelle_position  = '';
    }
    echo '                    <form method="post" action="'.$_SERVER['PHP_SELF'].'" name="modif_rubrique">'."\n";
    echo '                        <input type="hidden" name="homepage" value="'.$homepage.'">'."\n";
    echo '                        <input type="hidden" name="page" value="'.$page.'">'."\n";
    echo '                        '.$cfg_font_2_n.$lang_ModifUneRubrique.$cfg_font_fin.'<br><br>'."\n";
    echo '                        <select name="choix_rubrique" '.$cfg_Formulaire.' size="1">'."\n";
    echo '                            <option value="">'.$lang_ChoixRubrique.'</option>'."\n";
    choix_rubrique(1);
    echo '                        </select>'."\n";
    echo '                        <br>'."\n";
    echo '                        '.$cfg_font_1_n.$lang_Nom.$cfg_font_fin."\n";
    echo '                        <input type="text" '.$cfg_Formulaire.' name="new_nom" size="20" maxlength="255" value="'.$new_nom.'">'."\n";
    echo '                        '.$cfg_font_1_n.$lang_Place.$cfg_font_fin."\n";
    echo '                        <input type="text" '.$cfg_Formulaire.' name="nvelle_position" size="2" maxlength="2"  value="'.$nvelle_position.'"><br>'."\n";
    echo '                        <input type="submit" '.$cfg_Formulaire.' name="Submit" value="'.$lang_Modifier.'">'."\n";
    echo '                    </form>'."\n";
}
?>