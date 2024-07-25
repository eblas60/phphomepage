/**
 * Php_Homepage
 *
 * @copyright    20/12/2016
 * @since        15/11/2003
 * @version      1.8
 * @author       Eric BLAS <webmaster@phphomepage.net>
 */

-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
English

Explanation
-----------

This application makes it possible to generate a homepage for the Internet navigator

Install
-------

1.Create a database
2.Configure the file "include/config.inc.php3" with the parameters of your table
  (Configure the file "local.inc.php3" with parameter of include if necessary)
3.Open the " index.php3 " page in a navigator
4.Table are generate on the first print of the index.php3
5.you can amuse yourself with the application

If the table is not create use the file "include/homepage.sql" to generate it.

Use
---

1.Once that you displayed the homepage
2.Make on your homepage by default (you can record it locally if you want)

-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
Update
------

V 1.8 (20/12/2016)
- Added Bootstrap (graphical improvement of the admin)
- Added a BDD class to be PHP compatible> 5.3
- Fix HTML5 source code to make it more W3C compliante
- Fixed some bugs
- Improved link listing page for touchscreen

v 1.7 (04/01/2013) 
- Small optimization for the smartphones and tablet tactile
- Correction of source code HTML5 to return it W3C
- Addition of Meta Robot noindex
- Modification of the sorting of the categories so that it is in the alphabetical order
- Addition of the double management of link on the same line example (the beginning of the 2nd bond must be identical to the precedent):
link 1 = My Web site
link 2 = My Web site - Administration (or another link)
give to posting
<a href="http://lien-1/">My Web site</a> - <a href="http://lien-2/">Administration (or another link)</a>

v 1.6a (21/09/2005) 
- Correction of some bug

v 1.6 (20/03/2004)
- grammatical Correction of the comentaires 
- correction of the bug of addition of a new account for a compatibility PHP4 > = 4.1
- automatic cleaning of the base
- modify the links

v 1.5 (11/16/2003)
- Comment to the standard of phpdoc (http://www.phpdoc.de/)
- Improvement of coding for a faster posting
- Passage in PHP4
- Coding on the w3c norm
- Some corrections of bug minor
- Addition of the Russian language provided by Lord (Kox@smtp.ru)

v 1.4a (11/19/2001)
- Reorganization of phphomepage (appearance of the file include)
- Some corrections of bug minor for better an installation

v 1.4 (08/09/2001)
- Reorganization of phphomepage (appearance of the file localisation)
- Better integration of the language
- Improvement of coding

v 1.3 (01/11/2001)
- Inclusion of the English file
- Correction of some bug

v 1.2 (01/10/2001)
- Creation of a file of language
- Possibility of putting in English (not provided)
- Correction of some bug

v 1.1 (01/09/2001)
- First version on line
- French exclusively 
