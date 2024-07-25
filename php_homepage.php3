<?
// Nom : Php_Homepage
// Version : 1.2
// Date : 10/01/2001
// Auteur : Eric BLAS
// email : ericb@newsinvest.fr
// Description : Fichier de gestion des homepage

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
<?if (empty($homepage))
   {?>
    <body bgcolor="#<?print $cfgFondIndex?>" link="#<?print $cfglienIndex?>" vlink="#<?print $cfglienIndex?>" alink="#<?print $cfglienIndex?>">
    <?print "$cfgfont_2_r $langErreurNom $cfgfont_fin";?>
    </body>
<? }
  else
   {
?>
 <frameset cols="<?print $cfgwidthGauche?>,<?print $cfgwidthDroit?>" frameborder="NO" border="0" framespacing="0">
  <frame name="navigation" scrolling="NO"  frameborder="NO" marginwidth="5" marginheight="5" src="<?echo "navig.php3?homepage=$homepage";?>">
  <frame name="action" scrolling="AUTO" marginwidth="5" marginheight="5" src="<?echo "main.php3?homepage=$homepage";?>">
 </frameset>

 <noframes>
 <body bgcolor=<?print $cfgFondIndex?> link=<?print $cfglienIndex?> vlink=<?print $cfglienIndex?> alink=<?print $cfglienIndex?>>
<?print "$cfgfont_2_r $langFrame $cfgfont_fin";?>
 </body>
 </noframes>
<?   }
   }?>
 </html>