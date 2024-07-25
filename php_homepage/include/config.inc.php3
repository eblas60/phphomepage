<?
// Nom           : Php_Homepage
// Version       : 1.4.a
// Date          : 20/11/2001
// Auteur        : Eric BLAS
// email         : phphomepage@free.fr
// Description   : Fichier de configuration / File configuration

// Paramètre de connexion à la base / Parameter of connection to the base
// MySQL

$cfgHost = 'localhost';               // Host MySQL
$cfgUser = 'User';               // User MySQL
$cfgPass = 'Password';               // Pass MySQL
$cfgBase = 'php_homepage';               // Base MySQL

// Langues / Language
$cfgLangue = 'fr'; // Choix de la langue français
// $cfgLangue = 'en'; // Choice of the language english

// Environnement
// Environment
$cfgVersion     = "Php_Homepage 1.4.a";

// Couleur de fond de cellule pour les tableaux
// Background color of cell for the table
$cfgTableau     = "EEEEEE";

// Colonne de gauche
// Left-hand column
$cfgwidthGauche = "170px";         // Taille de la colonne en pixels ou en %
                                   // Column size in pixels or in %
$cfgFondGauche  = "3399CC";        // Couleur de fond
                                   // Background color
$cfglienGauche  = "FFCC66";        // Couleur des liens
                                   // Links color
// Colonne de droite et index
// Column of right-hand side and index
$cfgwidthDroit  = "*";             // taille de la colonne en pixels ou en %
                                   // column size in pixels or in %
$cfgFondIndex   = "FFFFFF";        // Couleur de fond
                                   // Background color
$cfglinkIndex   = "0000FF";       // Couleur des liens
                                   // Links color
$cfgVlinkIndex   = "0000FF";       // Couleur des liens
                                   // Links color
$cfgAlinkIndex   = "0000FF";       // Couleur des liens
                                   // Links color

// Polices
// Fonts
$cfgfont_1_n    = "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#000000\">";
$cfgfont_2_n    = "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"#000000\">";
$cfgfont_3_n    = "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"3\" color=\"#000000\">"; // pour l'index et la colonne droite
                                                                                                        // for the index and the column right
$cfgfont_1_b    = "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#FFFFFF\">";
$cfgfont_2_b    = "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"#FFFFFF\">";
$cfgfont_3_b    = "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"#FFFFFF\">"; // pour la colonne Gauche
                                                                                                        // for the column Left
$cfgfont_1_r    = "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\" color=\"#FF0000\">";
$cfgfont_2_r    = "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" color=\"#FF0000\">"; // pour les messages d'erreur
                                                                                                        // for the error messages
$cfgFormulaire  = "style=\"font-size:10px; font-family: verdana, arial, helvetica, sans-serif;\"";      // pour les formulaires
                                                                                                        // for the forms
$cfgfont_fin    = "</font>";

// variable de nombre de lignes du tableau pour placer les rubriques dans la page
// variable of a number of lines of the table to place the headings in the page
$cfgNbrLignes   = "2";
$cfgNbrColonnes = "4";
?>