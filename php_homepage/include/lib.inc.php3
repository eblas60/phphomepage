<?
// Nom           : Php_Homepage
// Version       : 1.4
// Date          : 03/08/2001
// Auteur        : Eric BLAS
// email         : phphomepage@free.fr
// Description   : librairie de fonctions

// fonction listant les ruriques de la base

function choix_rubrique($select)
 {GLOBAL $homepage;
  GLOBAL $cfgBase;
  GLOBAL $choix_rubrique;
  $query2       = "SELECT * FROM homepage WHERE nom = '$homepage'";
  $req2         = mysql_db_query ($cfgBase,$query2);
  $rubriques_id = mysql_result($req2,0,"rubriques_id");
  $rubrique     = explode ("-",$rubriques_id);
  $i            = 0;
  WHILE($i<count($rubrique))
   {$query3       = "SELECT * FROM rubriques WHERE id = $rubrique[$i]";
    $req3         = mysql_db_query ($cfgBase,$query3);
    $res3         = mysql_numrows($req3);
    $id           = mysql_result($req3,0,"id");
    $titre        = mysql_result($req3,0,"titre");
    $actif        = mysql_result($req3,0,"actif");
    if ($actif != 1)
     {print "<option value=\"$id\"";
      if ($choix_rubrique == $id  && $select == 1)
       {print "selected";
       }
      print "> $titre</option>\n";
     }
    $i++;
   };
 }

// Fonction listant les liens dans la base

function choix_lien()
 {GLOBAL $rubriques_id;
  GLOBAL $cfgBase;
  $rubrique     = explode ("-",$rubriques_id);
  $i            = 0;
  WHILE($i<count($rubrique))
   {$query3       = "SELECT * FROM liens WHERE rubrique_id = $rubrique[$i]";
    $req3         = mysql_db_query ($cfgBase,$query3);
    $res3         = mysql_numrows($req3);
    $j            = 0;
    WHILE($res3 != $j)
     {
      $id           = mysql_result($req3,$j,"id");
      $titre        = mysql_result($req3,$j,"titre");
      $actif        = mysql_result($req3,$j,"actif");
      if ($actif != 1)
       {print "<option value=\"$id\"> $titre</option>\n";
       }
     $j++;
     }

    $i++;
   };
 }

// fonction générant autant de case que configure dans le fichier config.inc.php3 et les remplis

function create_case($case)
 {GLOBAL $homepage;
  GLOBAL $cfgBase;
  GLOBAL $font_rubrique;
  GLOBAL $font_lien;
  GLOBAL $cfgfont_fin;
  GLOBAL $target;
  $query3       = "SELECT * FROM homepage WHERE nom = '$homepage'";
  $req3         = mysql_db_query ($cfgBase,$query3);
  $rubriques_id = mysql_result($req3,0,"rubriques_id");
  $rubrique     = explode ("-",$rubriques_id);
  $i            = 0;
  WHILE($i<count($rubrique))
   {$query4       = "SELECT * FROM rubriques WHERE id = $rubrique[$i] AND actif = '' AND position = '$case' ORDER BY titre";
    $req4         = mysql_db_query ($cfgBase,$query4);
    $res4         = mysql_numrows($req4);
    if ($res4 !=0)
     {$nom_rubrique = mysql_result($req4,0,"titre");
      print "<p> $font_rubrique <b>$nom_rubrique</b> $cfgfont_fin</p>\n";
      $query5       = "SELECT * FROM liens WHERE rubrique_id = '$rubrique[$i]' ORDER BY titre";
      $req5         = mysql_db_query ($cfgBase,$query5);
      $res5         = mysql_numrows($req5);
      $j            = 0;
      WHILE($res5 != $j)
       {$nom_lien     = mysql_result($req5,$j,"titre");
        $url          = mysql_result($req5,$j,"url");
        $actif        = mysql_result($req5,$j,"actif");
        if ($actif != 1)
         {if ($target != 1)
           {print "$font_lien<a href=\"$url\" target=\"_blank\">$nom_lien</a>$cfgfont_fin<br>\n";
           }
          else
           {print "$font_lien<a href=\"$url\" target=\"_self\">$nom_lien</a>$cfgfont_fin<br>\n";
           }
         }
        $j++;
       };
     }
    $i++;
   };
  print "<br>";
 }

// fonction qui décompose une coueur rrvvbb en rr vv bb

function eclat_couleur($couleur,$ident)
   {GLOBAL $cfgFormulaire;
    $couleur1          = substr ("$couleur", 0, 2);
    $couleur2          = substr ("$couleur", 2, 2);
    $couleur3          = substr ("$couleur", 4, 2);
    print "<input type=\"text\" $cfgFormulaire name=\"rouge$ident\" size=\"2\" maxlength=\"2\" value=\"$couleur1\">
           -
           <input type=\"text\" $cfgFormulaire name=\"vert$ident\" size=\"2\" maxlength=\"2\" value=\"$couleur2\">
           -
           <input type=\"text\" $cfgFormulaire name=\"bleu$ident\" size=\"2\" maxlength=\"2\"  value=\"$couleur3\">";
   }
?>