<?php
/**
 * [fr]Fichier de creation de table fonctionnant pour les bases local
 * [en]File of creation of table functioning for the bases room
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

if (!isset($file)) {
    echo '                        <p class="text-danger">' . $lang_ErrorNomFichier.' http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'].'?<strong>file=homepage.sql</strong>'."</p>\n";
} else {
    if (file_exists($file)) {
        $fd = file($file);
        $i = count($fd);
        for ($i = 0; $i < count($fd); $i++) {
            $query = $fd[$i];
            if (strlen(trim($query))) {
                //echo "- $query<br>\n";
				if (strnatcmp(phpversion(),'4.3.7') >= 0 && $cfg_API == 'mysqli')
				{
					/* close connection */
					$link->query($query);
				}
				else
				{
					$result = mysqli_query($link, $query);
					if (!$result) {
						die('                        <p class="text-danger">' . $lang_error_query . mysqli_error()."</p>\n");
					}
				}
            }
        }
        //mysqli_free_result();
    } else {
        echo '                        <p class="text-danger">' . $lang_Fichier.' "<b>'.$file.'</b>" '.$lang_Introuvable.'</p>'."\n";
    }
}
?>