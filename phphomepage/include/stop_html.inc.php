<?
/**
 * [fr]Fichier qui g�n�re le code de fin de page HTML commun � tous les fichiers
 * [en]File which g�n�re the code of end of page HTML common to all the files
 *
 * @copyright    12/03/2012
 * @since	 09/08/2001
 * @version      1.7
 * @module       star_html
 * @modulegroup  include
 * @package      php_homepage
 * @access	 public
 * @author       Eric BLAS <webmaster@phphomepage.net>
 */
/**
 * [fr]Pour emp�cher le Hacking du serveur via ce script je rajoute une condition pour v�rifier la variable LOCAL_INCLUDE
 */
if (strstr(LOCAL_INCLUDE, 'http')) {
    /**
     * [fr]Variable pour fixer le dossier d'include
     * Laisser vide si vous pouvez utiliser un fichier .htaccess, sinon mettre les chemins r�els
     * [en]Variable to fix the file of include
     * To leave empty if you could use a .htaccess file, if not put the real path
     *
     * @const LOCAL_INCLUDE 
     */
    define('LOCAL_INCLUDE', './include/');
}    
/**
 * [fr]Fichier de cl�ture de connection � la base
 */
require_once(LOCAL_INCLUDE.'close.inc.php');
echo "\n";
echo '    </body>'."\n";
echo '</html>'."\n";
?>
