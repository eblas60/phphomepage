<?
/**
 * [fr]Fichier qui g�n�re le code de fin de page HTML commun � tous les fichiers
 * [en]File which g�n�re the code of end of page HTML common to all the files
 *
 * @copyright    15/11/2003
 * @since	     09/08/2001
 * @version      1.5
 * @module       star_html
 * @modulegroup  include
 * @package      php_homepage
 * @access	     public
 * @author       Eric BLAS <webmaster@phphomepage.net>
 */
/**
 * [fr]Fichier de cl�ture de connection � la base
 */
require_once(LOCAL_INCLUDE.'close.inc.php');
echo "\n";
echo '    </BODY>'."\n";
echo '</HTML>'."\n";
/**
 * commande de fin de compression
 */
ob_end_flush() ;
?>