<?php
/**
 * [fr]Fichier d'ajout des liens de la homepage
 * [en]File of addition of the links of the homepage
 *
 * @copyright    16/11/2003
 * @since	     09/01/2001
 * @version      1.5
 * @module       liens
 * @modulegroup  include
 * @package      php_homepage
 * @access	     public
 * @author       Eric BLAS <webmaster@phphomepage.net>
 */
/**
 * [fr]Gestion des diverses erreurs
 */
if ($rubriques_id == '') {
    echo '                    '.$cfg_font_1_r.'<b>'.$lang_ErrorLienRub.'</b>'.$cfg_font_fin.'<br>'."\n";
}
if (isset($sup_lien)) {
    if ($sup_lien == '') {
        echo '                    '.$cfg_font_1_r.'<b>'.$lang_ErrorRubNom.'</b>'.$cfg_font_fin.'<br>'."\n";
    } else {
        echo '                    '.$cfg_font_1_r.'<b>'.$lang_LienSupOK.'</b>'.$cfg_font_fin.'<br>'."\n";
        $query2 = 'UPDATE liens SET actif = \'1\' WHERE id = '.$sup_lien;
        mysql_query ($query2);
    }
}
if (isset($titre)) {
    if ($titre == '' OR $url == 'http://' OR $url == '' OR $rubrique == '') {
        if ($titre == '') {
            echo '                    '.$cfg_font_1_r.'<b>'.$lang_LienNom.'</b>'.$cfg_font_fin.'<br>'."\n";
        }
    if ($url == '' OR $url == 'http://') {
        echo '                    '.$cfg_font_1_r.'<b>'.$lang_LienURL.'</b>'.$cfg_font_fin.'<br>'."\n";
     }
    if ($rubrique == "") {
        echo '                    '.$cfg_font_1_r.'<b>'.$lang_LienRub.'</b>'.$cfg_font_fin.'<br>'."\n";
    }
} else {
    echo '                    '.$cfg_font_1_r.'<b>'.$lang_LienOK.'</b>'.$cfg_font_fin.'<br>'."\n";
    $query3          = 'INSERT INTO liens VALUES'."('','','".$titre."','".$rubrique."','".$url."')";
    mysql_query ($query3);
    $titre = '';
    $url = 'http://';
    $rubrique = '';
    }
}
/**
 * [fr]Ajout d'un lien
 */
echo '                    '.$cfg_font_3_n.'<b>'.$lang_Lien.'</b>'.$cfg_font_fin."<br>\n";
if (!isset($url)) {
    $url  = 'http://';
}
if (!isset($titre)) {
    $titre  = '';
}
if (!isset($rubrique)) {
    $rubrique  = '';
}
echo '                    <form method="post" action="'.$_SERVER['PHP_SELF'].'" name="ajout_lien">'."\n";
echo '                        <input type="hidden" name="homepage" value="'.$homepage.'">'."\n";
echo '                        <input type="hidden" name="page" value="'.$page.'">'."\n";
echo '                        '.$cfg_font_2_n.$lang_LienNew.$cfg_font_fin.'<br><br>'."\n";
echo '                        '.$cfg_font_1_n.$lang_Nom.$cfg_font_fin.'<input type="text" '.$cfg_Formulaire.' name="titre"  size="20" maxlength="255" value="'.$titre.'"><br>'."\n";
echo '                        <input type="text" '.$cfg_Formulaire.' name="url" size="50" maxlength="255" value="'.$url."\"><br>\n";
echo '                        <select name="rubrique" '.$cfg_Formulaire.'>'."\n";
echo '                            <option  value="" ';
if (empty($rubrique)) {
    echo "selected";
}
echo '>'.$lang_ChoixRubrique.'</option>'."\n";
choix_rubrique();
echo '                        </select><br>'."\n";
echo '                        <input type="submit" '.$cfg_Formulaire.' name="Submit" value="'.$lang_Creer.'">'."\n";
echo '                    </form>'."\n";
/**
 * [fr]Supprimer un lien
 */
echo '                    <form method="post" action="'.$_SERVER['PHP_SELF'].'" name="sup_lien">'."\n";
echo '                        <input type="hidden" name="homepage" value="'.$homepage.'">'."\n";
echo '                        <input type="hidden" name="page" value="'.$page.'">'."\n";
echo '                        '.$cfg_font_2_n.$lang_LienSup.$cfg_font_fin.'<br><br>'."\n";
echo '                        <select name="sup_lien" '.$cfg_Formulaire.' size="1">'."\n";
echo '                            <option selected>'.$lang_LienChoix.'</option>'."\n";
choix_lien();
echo '                        </select><br>'."\n";
echo '                        <input type="submit" '.$cfg_Formulaire.' name="Submit" value="'.$lang_Supprimer.'">'."\n";
echo '                    </form>'."\n";
?>