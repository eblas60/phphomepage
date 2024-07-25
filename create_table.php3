<?
// Nom : Php_Homepage
// Version : 1.1
// Date : 09/01/2001
// Auteur : Eric BLAS (d'après un script de Pyxos)
// email : ericb@newsinvest.fr (pyxos@fairesuivre.com)
// Description : Fichier de creation de table fonctionnant pour les bases local

require("config.inc.php3");
require("lang_$cfgLang.inc.php3");
?>
 <html>
 <head>
 <title>
<?print $cfgVersion;?>
 </title>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 </head>
 <body bgcolor=<? print $cfgFondIndex?> link=<?print $cfglienIndex?> vlink=<?print $cfglienIndex?> alink=<?print $cfglienIndex?>>
<?
if (!isset($file))
{
echo "$cfgfont_2_n $langErrorNomFichier http://$SERVER_NAME$PATH_INFO?<b>file=homepage.sql</b>$cfgfont_fin\n";
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
echo "- $query<br>\n";

mysql_query($query, $cfgdb) ;
$errno = mysql_errno($cfgdb);
$error = mysql_error($cfgdb);
print("$errno - $error<br>\n");
}
}
mysql_free_result($result);
}
else
{
echo "$cfgfont_2_r $langFichier '<b>$file</b>' $langIntrouvable <br>$cfgfont_fin\n";
}
}
?>
 </body>
 </html>