<?php
/**
 * [fr]Fichier de connection à la base
 * [en]File database conexion
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
	$connect_db = mysqli_connect($cfg_Host,$cfg_User,$cfg_Pass) or die('                        <p class="text-danger">' . $lang_error_connect . mysqli_error()."</p>\n");
	if (!mysqli_select_db($cfg_Base,$connect_db)) {
		die('                        <p class="text-danger">' . $lang_error_database . mysqli_error()."</p>\n");
	}
}
