xNews 1.68 UTF-8, CLonable & SEO **** BETA ****

On request I decided to add SEO functionality to xNews. I made it 1.68 Beta.

Here is a short help explaining how to update original and uprgade clones.

The original xNews module is the Main Manager for cloning, uprading and removing cloned modules. And in case of version updates it must be the first one to be updated.

For example: you now have "xNews" original plus "Library" and "Info" clones v 1.67
you get xNews 1.68 and overwrite xNews 1.67 ( *** original xNews only!!! ***) with new files. You can update from xNews admin Clone Manager or directly from Modules Admin. Once updated you will see that in Clone Manager the clones in the list will have Upgrade ACTION active now. Click on each one at a time to upgrade them to new verison then go to Modules Admin and update them normally.

Now all your clones are ready to work with the new 1.68 version.

I have added a Topics Display enable/disable preferences option. In case of an info clone where I can add general infomation to the site I did not want topic selection and navigation to be viewed.

On request I added SEO functionality to xNews. No installation is needed. Everything is controlled by new SEO Enable module preferences settings. yes/enabled no/disabled.

Everything works from xnews or cloned module dirs not from root so you can have one clone seo and others not.

To get SEO working be sure that server is mod-rewrite enabled and symlinks are correctly configured.
Controll if .htaccess file has been copied during upgrade. If not get the one in seo folder and copy it from htaccess.txt to .htaccess in modules/xnews modules/clone dirs

I use xlanguage alot and use function.xoLanguage.php in xoops/class/smarty/xoops_plugins so to have my language controls where i want on my themes, i modified it to work with SEO urls reparsing them to normal when needed. I included this file in xNews.

I want to thank all who are translating xNews, I will add all languages when major changes will come to an end and we have a stable realease (have not added my italian translation yet either). In the meantime Thank you again.

**** Thanks to voltan for his new nifty admin/index interface included now in 1.68.

ENJOY!!

- Added SEO
   - preferences Seo Enable config option
   - htaccess in modules/xnews folder
   - seo.php in modules/xnews
   - function.xoLanguage.php in xoops/class/smarty/xoops_plugins 
- Added new admin/index interface by voltan (thank you!)
- Added new config option in module preferences Dispay topics title yes no this will hide topics 
  from header title and also disable topic image clicking.
- Language file changes
    main.php 
      changed define("_AM_NW_GROUPPERM", "Permissions");     
      added   define("_MA_NW_SP", ":");
      added   define("_MA_NW_POSTED", "Posted");
    modinfo.php 
      added   define("_MI_NW_TOPICDISPLAY", "Display Topics");
      added   define("_MI_NW_TOPICDISPLAYDESC", "This will enable/disable Topics title in block headers");
      added   define("_MI_NW_SEOENABLE", "SEO enable");
      added   define("_MI_NW_SEOENABLEDESC", "This will enable/disable SEO activity");
- Fixed item width to 100% when short scoop and extended item block shrunk on some themes
- Fixed topic image alignment
- Many other small fixes




What is news Module ?
======================

With this Xoops module, you can create an unlimited count of news on your site.

You can create all articles you want and attach them to topics.

With a very powerfull permissions management, you can create groups authorized
to submit articles and a group authorized to approve them and decide who can see
what.

The module can :
. Manage topics and sub-topics
. Create strict permissions (who can read, who can publish, who can approve)
. Possibility to validate articles by some users groups
. You can emphasize you content with some blocks
. Possibility to read articles in RSS feeds
. Use automated articles and expired articles
. Integrated search
. Various statistics for the module's administrator
. Option to add advertising to your articles
. Documentation (in French for this moment)
. Multi pages articles with a personalized title for each page
. Possibility to use Dublin Core Metadata
. Possibility to use FireFox 2 micro summaries
. Social bookmarking on Web 2 sites like del.icio.us, nwvine.com, yahoo search
. Link to the previous and next article (and a summary table)
. Use an integrated alert system (for example when an article is published)
. Several blocks
. etc

The module will also help you to have search engines friendly pages by using
significative pages titles (created from your content) and to have meta keywords
and meta descriptions also created from your content.

The module can also be used, as it's the case on some sites, to create a blog


How to install news
====================

news is installed as a regular XOOPS module, which means you should copy the
complete /news folder into the /modules directory of your website. Then log in
to your site as administrator, go to System Admin > Modules, look for the news
icon in the list of uninstalled modules and click in the install icon. Follow
the directions in the screen and you'll be ready to go.

Please verify that the modules\news\images\topics directory is writable on the
server (read+write e.g. chmod=777).

After having created your first topic (category), and before creating your first
article/news, you need to click on Permission Tab to set groups permissions.



Xoops supported versions
==========================
You can use this new version on all the recent versions of Xoops 2.0.
We did not tested the module with Xoops 2.2 but it should run.

PHP/MYSQL supported versions
=============================
 Mysql >= 3.23, 4.x, 5.x Php 4 & 5


How to upgrade
==============

Copy all the files to your site (and be sure to erase the old files), then
go in the Xoops modules manager and upgrade the module.
In case of troubles, consult the file UPGRADE.txt present in the module.

