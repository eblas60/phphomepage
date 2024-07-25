<?
// Nom           : Php_Homepage
// Version       : 1.4.a
// Date          : 20/11/2001
// Auteur        : Eric BLAS (d'après un script de Pyxos)
// email         : phphomepage@free.fr (pyxos@fairesuivre.com)
// Description   : Fichier de creation de table fonctionnant pour les bases local
//                 File of creation of table functioning for the bases room

//include ($cfgInclude."localisation/start_html.inc.php3");

if (!isset($file))
{
echo $cfgfont_2_n.$langErrorNomFichier." http://".$SERVER_NAME.$PATH_INFO."?<b>file=homepage.sql</b>".$cfgfont_fin."\n";
}
else
{
if (file_exists($file))
{

$fd = file($file);
$i = count($fd);

for ($i = 0; $i < count($fd); $i++)
{
$query = $fd[$i];
if (strlen(trim($query)))
{
// echo "- $query<br>\n";
mysql_db_query($cfgBase,$query);
$errno = mysql_errno();
$error = mysql_error();
//print("$errno - $error<br>\n");
}
}
//mysql_free_result();
}
else
{
echo $cfgfont_2_r.$langFichier." '<b>".$file."</b>' ".$langIntrouvable."<br>".$cfgfont_fin."\n";
}
}

//include ($cfgInclude."localisation/stop_html.inc.php3");
?>