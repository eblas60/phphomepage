<?php
/**
 * [fr]Fichier de clôture de connection à la base
 * [en]File closing database conexion
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
	/* close connection */
	if (isset($link))
		mysqli_close($link);
}
else
{
	mysql_close();
}
