<?php
// $Id: page.tpl.php,v 1.11.2.2 2010/08/06 11:13:42 goba Exp $

/**
 * @file
 * Displays a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or
 *   'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   element.
 * - $head: Markup for the HEAD element (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the
 *   current path, whether the user is logged in, and so on.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled in
 *   theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been
 *   disabled in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been
 *   disabled.
 * - $primary_links (array): An array containing primary navigation links for
 *   the site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links
 *   for the site, if they have been configured.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the
 *   view and edit tabs when displaying a node).
 * - $content: The main content of the current Drupal page.
 * - $right: The HTML for the right sidebar.
 * - $node: The node object, if there is an automatically-loaded node associated
 *   with the page, and the node ID is the second argument in the page's path
 *   (e.g. node/12345 and node/12345/revisions, but not comment/reply/12345).
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic
 *   content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
	<head>
	  <?php print $head; ?>
	  <title><?php print $head_title; ?></title>
	  <?php print $styles; ?>
	  <?php print $scripts; ?>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald">
	  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> 		</script>
	</head>
	<body<?php print phptemplate_body_attributes($is_front, $layout); ?>>
		<div id="wrapper">
			<div id="leftSide">
				<div id="header">
					<h1><a href="<?php print $front_page; ?>"><?php print $site_name; ?> - <?php print $site_slogan; ?></a></h1>
				</div>
				<div id="leftCol">
					<?php print $left; ?>
				</div>	
			</div>
			<div id="rightSide">
				<div id="nav">
					<?php print $nav; ?>
					<!-- <a href="http://www.google.com" class="twitterLink">Follow us on twitter</a> -->
				</div>
				<div id="main">
					<!--drupal features-->
			          <?php if (!empty($tabs)): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>
			          <?php if (!empty($messages)): print $messages; endif; ?>
			          <?php if (!empty($help)): print $help; endif; ?>
					<!--end drupal features-->
					<?php if ($node->taxonomy[182]): ?> 
					    <div id="pageLinks">
							<?php print $inside_links; ?>
						</div>
					<?php endif; ?> 
					<div id="contentWrap">
						<?php print $breadcrumb; ?>
						<?php if (!empty($title)): ?><h3 class="title" id="page-title"><?php print $title; ?></h3><?php endif; ?>					
							<?php print $content; ?>
						<?php print $continue_shopping; ?>
					</div>
					<div id="hpLinks">
						<?php print $hp_links; ?>
					</div>
				</div>
				<div id="rightCol">
					<?php print $right; ?>
				</div>			
				<div class="clear"></div>
			</div>
			<div id="footer">
				<span><?php print $footer_message; ?></span>
			</div>	
		<?php print $closure; ?>
	</body>
</html>


