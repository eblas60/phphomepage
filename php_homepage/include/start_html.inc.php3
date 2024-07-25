<?
// Nom           : Php_Homepage
// Version       : 1.4
// Date          : 03/08/2001
// Auteur        : Eric BLAS
// email         : phphomepage@free.fr
// Description   : Code html commun

include ($cfgInclude."config.inc.php3");
include ($cfgInclude."lib.inc.php3");
include ($cfgInclude."connect.inc.php3");
include ($cfgInclude."localisation/lang_".$cfgLangue.".inc.php3");
?>
 <html>
 <head>
 <title>
<? print $cfgVersion ?>
 </title>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 </head>
 <body bgcolor=<? print $cfgFondIndex?> link=<?print $cfglinkIndex?> vlink=<?print $cfgVlinkIndex?> alink=<?print $cfgAlinkIndex?> leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" >
