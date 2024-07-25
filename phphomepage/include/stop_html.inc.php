<?php
/**
 * [fr]Fichier qui génére le code de fin de page HTML commun à tous les fichiers
 * [en]File which génére the code of end of page HTML common to all the files
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
 * [fr]Pour empècher le Hacking du serveur via ce script je rajoute une condition pour vérifier la variable LOCAL_INCLUDE
 */
if (strstr(LOCAL_INCLUDE, 'http')) {
    /**
     * [fr]Variable pour fixer le dossier d'include
     * Laisser vide si vous pouvez utiliser un fichier .htaccess, sinon mettre les chemins réels
     * [en]Variable to fix the file of include
     * To leave empty if you could use a .htaccess file, if not put the real path
     *
     * @const LOCAL_INCLUDE 
     */
    define('LOCAL_INCLUDE', './include/');
}    
/**
 * [fr]Fichier de clôture de connection à la base
 */
require_once(LOCAL_INCLUDE.'close.inc.php');
echo "\n";
echo '            </div>'."\n";
echo '        </div>'."\n";
echo '        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-colorpicker.min.js"></script>
        <!--script>
            jQuery.noConflict(true);
        </script-->

        <script>
            $(function(){
                $(\'#colorpicker-fond\').colorpicker();
            });
        </script>

        <script>
            $(function(){
                $(\'#colorpicker-titre\').colorpicker();
            });
        </script>

        <script>
            $(function(){
                $(\'#colorpicker-lien\').colorpicker();
            });
        </script>
    </body>'."\n";
echo '</html>'."\n";