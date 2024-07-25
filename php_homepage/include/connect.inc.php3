<?
// Nom           : Php_Homepage
// Version       : 1.4
// Date          : 03/08/2001
// Auteur        : Eric BLAS
// email         : phphomepage@free.fr
// Description   : Fichier de connection à la base / File database conexion

$cfg_db = mysql_connect("$cfgHost","$cfgUser","$cfgPass") or die("<b><font color=\"#FF0000\">".$langConnexBase."</font><b>\n");
mysql_select_db("$cfgBase",$cfg_db);
?>