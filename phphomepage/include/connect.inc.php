<?php
/**
 * [fr]Fichier de connection à la base
 * [en]File database conexion
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
if (strnatcmp(phpversion(),'4.3.7') >= 0)
{
	// mysqli
	$link = new mysqli($cfg_Host, $cfg_User, $cfg_Pass, $cfg_Base);
	$mysqli =  new mysqli($cfg_Host, $cfg_User, $cfg_Pass, $cfg_Base);
	/* check connection */
	if (mysqli_connect_errno()) {
		printf("$lang_ConnexBase: %s\n", mysqli_connect_error());
		exit();
	}
}
else
{
	$connect_db = mysql_connect($cfg_Host,$cfg_User,$cfg_Pass) or die('                        <p class="text-danger">' . $lang_error_connect . mysql_error()."</p>\n");
	if (!mysql_select_db($cfg_Base,$connect_db)) {
		die('                        <p class="text-danger">' . $lang_error_database . mysql_error()."</p>\n");
	}
}
