<?php
/**
 * [fr]Fichier de cloture de connection a la base
 * [en]File closing database conexion
 *
 * @copyright	11/06/2021
 * @since		09/01/2001
 * @version		1.10
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
	mysqli_close();
}
