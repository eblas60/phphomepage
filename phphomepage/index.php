<?php
/**
 * [fr]Fichier d'accueil de php homepage
 * [en]File of reception of php homepage
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
 * [fr]Fichier qui contient divers paramètres locaux
 */
require_once('./local.inc.php');
/**
 * [fr]Fichier qui génére le code de l'entête HTML commun à tous les fichiers
 */
require_once(LOCAL_INCLUDE.'start_html.inc.php');
/**
 * [fr]Création des tables dans la base si elles n'y sont pas
 */
if (strnatcmp(phpversion(),'4.3.7') >= 0)
{
	// mysqli
	$query = "SHOW TABLES FROM $cfg_Base";
	if ($tmp_req = mysqli_prepare($link, $query)) {
		/* execute query */
		mysqli_stmt_execute($tmp_req);

		/* store result */
		mysqli_stmt_store_result($tmp_req);
		$tmp_table  = mysqli_stmt_num_rows($tmp_req);

		/* close statement */
		mysqli_stmt_close($tmp_req);
	}
}
else
{
	$tmp_req    = mysql_list_tables($cfg_Base);
	$tmp_table  = mysql_num_rows($tmp_req);
}
if ($tmp_table == 0) {
    $file = LOCAL_INCLUDE.'homepage.sql';
    /**
     * [fr]Fichier de création de table fonctionnant pour les bases local
     * [en]File of creation of table functioning for the bases room
     */
    require_once(LOCAL_INCLUDE.'create_table.inc.php');
}
/**
 * [fr] Nettoyage de la base de données
 */
$query_net         = 'SELECT `id` FROM `homepage` WHERE `mise_en_page_id` = 0 AND `rubriques_id` = \'\'';
if (strnatcmp(phpversion(),'4.3.7') >= 0)
{
	// mysqli
	if ($tmp_req = mysqli_prepare($link, $query_net)) {
		/* execute query */
		mysqli_stmt_execute($tmp_req);

		/* store result */
		mysqli_stmt_store_result($tmp_req);
		$res_net  = mysqli_stmt_num_rows($tmp_req);

		/* close statement */
		mysqli_stmt_close($tmp_req);
	}
} else {
	$req_net           = mysql_query ($query_net);
	$res_net           = mysql_num_rows($req_net);
}
//echo '$res_net='.$res_net;
if ($res_net > 9) {
    $query_delete      = 'DELETE FROM `homepage` WHERE `mise_en_page_id` = 0 AND `rubriques_id` = \'\'';
    mysql_query ($query_delete);
    $query_net            = 'SELECT `id` FROM rubriques WHERE actif = 1';
    $req_net              = mysql_query ($query_net);
    $res_net              = mysql_num_rows($req_net);
    if ($res_net != '') {
        for ($i=0;($i < $res_net);$i++) {
            $id                = mysql_result($req_net,$i,'id');
            $query_net1            = 'SELECT `id`,`rubriques_id` FROM homepage WHERE rubriques_id like \''.$id.'-%\' OR rubriques_id like \'%-'.$id.'-%\' OR rubriques_id like \'%-'.$id.'\'';
            $req_net1              = mysql_query ($query_net1);
            $res_net1              = mysql_num_rows($req_net1);
            if ($res_net1 > 0) {
                $rubriques_id2       = mysql_result($req_net1,0,'rubriques_id');
                if (substr($rubriques_id2, 0 ,1) != '-') {
                    $rubriques_id2 = '-'.$rubriques_id2;
                }
                if (substr($rubriques_id2, -1) != '-') {
                    $rubriques_id2 = $rubriques_id2.'-';
                }
                $rubriques_id2       = str_replace('-'.$id.'-','-',$rubriques_id2);
                $query_net2          = 'UPDATE homepage SET rubriques_id=\''.$rubriques_id2.'\' WHERE id = \''.mysql_result($req_net1,0,'id').'\'';
                mysql_query ($query_net2);
            }
            $query_liens         = 'UPDATE liens SET actif = 1 WHERE rubrique_id = '.$id ;
            mysql_query ($query_liens);    
        }
        $query_delete      = 'DELETE FROM `rubriques` WHERE actif = 1';
        mysql_query ($query_optimize);
        unset($query_net,$req_net,$res_net,$id,$query_net1,$req_net1,$res_net1,$rubriques_id2,$query_net2,$query_liens,$query_delete);
    }
    $query_delete      = 'DELETE FROM `liens` WHERE actif = 1';
    mysql_query ($query_delete);
    /**
     * [fr] optimisation de la base de données
     */
    $query_optimize    = 'OPTIMIZE TABLE `homepage`';
    mysql_query ($query_optimize);
    mysql_query ($query_delete);
    $query_optimize    = 'OPTIMIZE TABLE `rubriques`';
    mysql_query ($query_optimize);
    $query_optimize    = 'OPTIMIZE TABLE `liens`';
    mysql_query ($query_optimize);
    $query_optimize    = 'OPTIMIZE TABLE `mise_en_page`';
    mysql_query ($query_optimize);
    }
/**
 * [fr] Affichage du formulaire d'entrée
 */
echo "\n";
echo '                <div class="col-md-12">
                    <h2 class="text-center">'.$lang_NvellePage."</h2><br /> \n";
echo '                    <form role="form" class="form-inline text-center" name="identification" method="post" action="php_homepage.php">'."\n";
echo '                        <div class="form-group">'."\n";
echo '                            <label for="homepage">'.$lang_Nom.'</label>'."\n";
echo '                            <div class="input-group">'."\n";
echo '                                <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>'."\n";
echo '                                <input class="form-control" id="homepage" type="text" name="homepage" placeholder="'.$lang_NomPlaceolder.'" />'."\n";
echo '                            </div>'."\n";
echo '                            <button type="submit" class="btn btn-success">Valider <span class="glyphicon glyphicon-chevron-right icon-white"></span></button>'."\n";
echo '                        </div>'."\n";
echo '                    </form>
                </div>'."\n";
//echo '        <p><a href="http://validator.w3.org/check/referer"><img src="http://www.w3.org/Icons/valid-html401" alt="Valid HTML 4.01!" height="31" width="88" /></a></p>';
echo '                <div class="text-center" style="margin-top:20px;"> <br />&nbsp;<br /><a href="http://www.phphomepage.net" title="www.phphomepage.net" target="_blank" class="btn btn-mini">Copyright © 2001-'.date('Y').' phphomepage.net<br />All Rights Reserved.</a></div>';
/**
 * [fr]Fichier qui génére le code de fin de page HTML commun à tous les fichiers
 */
require_once(LOCAL_INCLUDE.'stop_html.inc.php');