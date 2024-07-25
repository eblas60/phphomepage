<?
// Nom           : Php_Homepage
// Version       : 1.4
// Date          : 03/08/2001
// Auteur        : Eric BLAS
// email         : phphomepage@free.fr
// Description   : Fichier de mise en page de la homepage
//                 File of formatting of the homepage

$query1          = "SELECT * FROM homepage WHERE nom = '$homepage'";
$req1            = mysql_query ($query1);
$res1            = mysql_numrows($req1);
$mise_en_page_id = mysql_result($req1,0,"mise_en_page_id");
if ($rougeF != "")
 {$fond            = "$rougeF"."$vertF"."$bleuF";
  $couleur_titre   = "$rougeR"."$vertR"."$bleuR";
  $couleur_lien    = "$rougeL"."$vertL"."$bleuL";
 }
if ($mise_en_page_id != 0)
 {if ($modif == "1")
   {$query3          = "UPDATE mise_en_page SET fond='$fond', couleur_titre='$couleur_titre', taille_titre='$taille_titre', couleur_lien='$couleur_lien', taille_lien='$taille_lien', police='$police', titre='$titre', target='$target' WHERE id='$id'";
    $res3            = mysql_query ($query3);

    $query5          = "UPDATE homepage SET mise_en_page_id='$mise_en_page_id' WHERE nom='$homepage'";
    mysql_query ($query5);
    $modif           = 2;
   }
 }
else
 {if ($modif == "1")
   {$query4          = "INSERT INTO mise_en_page VALUES('','$fond','$couleur_titre','$taille_titre','$couleur_lien','$taille_lien','$police','$titre','$target')";
    mysql_query ($query4);
    $mise_en_page_id = mysql_insert_id();
    $query6          = "UPDATE homepage SET mise_en_page_id='$mise_en_page_id' WHERE nom='$homepage'";
    mysql_query ($query6);
   }
 }
if ($mise_en_page_id != 0)
 {$query2          = "SELECT * FROM mise_en_page WHERE id = '$mise_en_page_id'";
  $req2            = mysql_query ($query2);
  $id              = mysql_result($req2,0,"id");
  $fond            = mysql_result($req2,0,"fond");
  $couleur_titre   = mysql_result($req2,0,"couleur_titre");
  $taille_titre    = mysql_result($req2,0,"taille_titre");
  $couleur_lien    = mysql_result($req2,0,"couleur_lien");
  $taille_lien     = mysql_result($req2,0,"taille_lien");
  $police          = mysql_result($req2,0,"police");
  $titre           = mysql_result($req2,0,"titre");
  $target          = mysql_result($req2,0,"target");
 }
else
 {
  $fond            = "FFFFFF";
  $couleur_titre   = "000000";
  $taille_titre    = "3";
  $couleur_lien    = "0000FF";
  $taille_lien     = "2";
  $police          = "Verdana";
  $target          = "1";
 }
$font_rubrique   = "<font face=\"".$police."\" size=\"".$taille_titre."\" color=\"#".$couleur_titre."\">";
$font_lien       = "<font face=\"".$police."\" size=\"".$taille_lien."\" color=\"#".$couleur_lien."\">";

if ($mise_en_page_id != 0 AND $modif == 2)
   {print "$cfgfont_1_r <b>$langModifOK</b> $cfgfont_fin <br>";
   }
  elseif ($mise_en_page_id != 0 AND $modif == 1)
   {print "$cfgfont_1_r <b>$langCreerOK</b> $cfgfont_fin <br>";
   }
?>
<?print "$cfgfont_3_n <b>$langMiseEnPage</b> $cfgfont_fin"?>
 <form method="post" action="php_homepage.php3" name="mise_en_page">
  <?print "$cfgfont_2_n $langCreerMEP $cfgfont_fin";?><br>
  <?
  if ($mise_en_page_id != 0)
     {
  ?>
  <input type="hidden" name="id" value="<? print $id ?>">
  <?
     }
  ?>
  <input type="hidden" name="homepage" value="<? print $homepage ?>">
  <input type="hidden" name="page" value="<? print $page ?>">
  <input type="hidden" name="modif" value="1">
  <table width="75%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>&nbsp;</td>
      <td align="center"><?print "$cfgfont_1_n $langRVB $cfgfont_fin";?></td>
    </tr>
    <tr>
      <td bgcolor="#<?print $cfgTableau?>"><?print "$cfgfont_1_n $langCoulFond $cfgfont_fin";?></td>
      <td align="center" bgcolor="#<?print $cfgTableau?>">
      <? eclat_couleur($fond,F);?>
      </td>
    </tr>
    <tr>
      <td><?print "$cfgfont_1_n $langCoulRub $cfgfont_fin";?></td>
      <td align="center">
      <? eclat_couleur($couleur_titre,R);?>
      </td>
    </tr>
    <tr>
      <td bgcolor="#<?print $cfgTableau?>"><?print "$cfgfont_1_n $langTailleRub $cfgfont_fin";?></td>
      <td bgcolor="#<?print $cfgTableau?>">
        <select <?print $cfgFormulaire?> name="taille_titre" size="1">
          <option value="1" <?if ($taille_titre == 1) print "selected"; ?>>1</option>
          <option value="2" <?if ($taille_titre == 2) print "selected"; ?>>2</option>
          <option value="3" <?if ($taille_titre == 3) print "selected"; ?>>3</option>
          <option value="4" <?if ($taille_titre == 4) print "selected"; ?>>4</option>
          <option value="5" <?if ($taille_titre == 5) print "selected"; ?>>5</option>
          <option value="6" <?if ($taille_titre == 6) print "selected"; ?>>6</option>
          <option value="7" <?if ($taille_titre == 7) print "selected"; ?>>7</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><?print "$cfgfont_1_n $langCoulLien $cfgfont_fin";?></td>
      <td align="center">
      <? eclat_couleur($couleur_lien,L);?>
      </td>
    </tr>
    <tr>
      <td width="40%" bgcolor="#<?print $cfgTableau?>"><?print "$cfgfont_1_n $langTailleLien $cfgfont_fin";?></td>
      <td bgcolor="#<?print $cfgTableau?>">
        <select <?print $cfgFormulaire?> name="taille_lien" size="1">
          <option value="1" <?if ($taille_lien == 1) print "selected"; ?>>1</option>
          <option value="2" <?if ($taille_lien == 2) print "selected"; ?>>2</option>
          <option value="3" <?if ($taille_lien == 3) print "selected"; ?>>3</option>
          <option value="4" <?if ($taille_lien == 4) print "selected"; ?>>4</option>
          <option value="5" <?if ($taille_lien == 5) print "selected"; ?>>5</option>
          <option value="6" <?if ($taille_lien == 6) print "selected"; ?>>6</option>
          <option value="7" <?if ($taille_lien == 7) print "selected"; ?>>7</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><?print "$cfgfont_1_n $langPolice $cfgfont_fin";?></td>
      <td>
        <select <?print $cfgFormulaire?> name="police" size="1">
          <option selected>-- PC --</option>
          <option value="Arial"           <?if ($police == "Arial")           print "selected"; ?>>Arial</option>
          <option value="Times New Roman" <?if ($police == "Times New Roman") print "selected"; ?>>Times New Roman</option>
          <option value="Courier New"     <?if ($police == "Courier New")     print "selected"; ?>>Courier New</option>
          <option>-- Mac --</option>
          <option value="Helvetica"       <?if ($police == "Helvetica")       print "selected"; ?>>Helvetica</option>
          <option value="Georgia"         <?if ($police == "Georgia")         print "selected"; ?>>Georgia</option>
          <option value="Times"           <?if ($police == "Times")           print "selected"; ?>>Times</option>
          <option value="Courier"         <?if ($police == "Courier")         print "selected"; ?>>Courier</option>
          <option>-- PC/Mac --</option>
          <option value="Verdana"         <?if ($police == "Verdana")         print "selected"; ?>>Verdana</option>
        </select>
      </td>
    </tr>
    <tr>
      <td bgcolor="#<?print $cfgTableau?>"><?print "$cfgfont_1_n $langTitle $cfgfont_fin";?></td>
      <td bgcolor="#<?print $cfgTableau?>">
        <input type="text" <?print $cfgFormulaire?> name="titre" size="20" maxlength="255" value="<?print $titre?>">
      </td>
    </tr>
    <tr>
      <td width="40%"><?print "$cfgfont_1_n $langTarget $cfgfont_fin";?></td>
      <td bgcolor="#<?print $cfgTableau?>">
        <select <?print $cfgFormulaire?> name="target" size="1">
          <option value="1" <?if ($target == 1) print "selected"; ?>><?print $langNon?></option>
          <option value="2" <?if ($target == 2) print "selected"; ?>><?print $langOui?></option>
        </select>
      </td>
    </tr>
  </table>
  <?if ($mise_en_page_id != 0)
     {print "<input type=\"submit\" name=\"Submit\" value=\"$langModifier\">";
     }
    else
     {print "<input type=\"submit\" name=\"Submit\" value=\"$langCreer\">";
     }
  ?>
  </form>
  <br>
  <table width="150px" border="1" cellspacing="0" cellpadding="10">
   <tr>
    <td bgcolor="#<?print $fond?>">
<?  print "<p><br>&nbsp;&nbsp;".$font_rubrique."<b>".$langRubrique."</b>".$cfgfont_fin."</p>\n";
    print "<p>&nbsp;&nbsp;<a href=\"#\">".$font_lien."<b>".$langLien."</b>".$cfgfont_fin."</a></p><br>\n";
?>
    </td>
   </tr>
  </table>