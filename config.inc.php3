<?
// Nom : Php_Homepage
// Version : 1.1
// Date : 09/01/2001
// Auteur : Eric BLAS
// email : ericb@newsinvest.fr
// Description : Fichier de configuration

// paramètre de connexion à la base
// MySQL

$cfgHost = 'localhost';               // Host MySQL
$cfgUser = '';               // User MySQL
$cfgPass = '';               // Pass MySQL
$cfgBase = 'phphomepage';               // Base MySQL
$cfgdb = mysql_connect("$cfgHost","$cfgUser","$cfgPass") or die("<b><font color=\"#FF0000\">Problème avec la base de données \n Veuillez essayer plus tard.</font><b>\n");
mysql_select_db("$cfgBase",$cfgdb);

// Langues
$cfgLang = 'fr'; // choix de la langue fr

// Environnement
$cfgVersion     = "Php_Homepage 1.0";
$cfgTableau     = "EEEEEE";        // Couleur de fond de cellule pour les tableau
// Colonne de gauche
$cfgwidthGauche = "170px";         // taille de la colonne en pixels ou en %
$cfgFondGauche  = "3399CC";        // Couleur de fond
$cfglienGauche  = "FFCC66";        // Couleur des liens
// Colonne de droite et index
$cfgwidthDroit  = "*";             // taille de la colonne en pixels ou en %
$cfgFondIndex   = "FFFFFF";        // Couleur de fond
$cfglienIndex   = "0000FF";        // Couleur des liens
// Polices
$cfgfont_1_n    = "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#000000\">"; // pour l'index et la colonne droite
$cfgfont_2_n    = "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"#000000\">"; // pour l'index et la colonne droite
$cfgfont_3_n    = "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"3\" color=\"#000000\">"; // pour l'index et la colonne droite
$cfgfont_1_b    = "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#FFFFFF\">"; // pour la colonne Gauche
$cfgfont_2_b    = "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"#FFFFFF\">"; // pour la colonne Gauche
$cfgfont_3_b    = "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"#FFFFFF\">"; // pour la colonne Gauche
$cfgfont_1_r    = "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#FF0000\">"; // pour les messages d'erreur
$cfgfont_2_r    = "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"#FF0000\">"; // pour les messages d'erreur
$cfgFormulaire  = "style=\"font-size:10px; font-family: verdana, arial, helvetica, sans-serif;\"";      // pour les formulaires
$cfgfont_fin    = "</font>";

// variable de nombre de lignes du tableau pour placer les rubriques dans la page
$cfgNbrLignes   = "2";
$cfgNbrColonnes = "4";
?>