<?php
function mytheme_regions() {
  return array(
	'nav' => t('primary links'),
	'left' => t('left sidebar'),
    'right' => t('right sidebar'),
	'hp_links' => t('homepage links'),
	'inside_links' => t('inside links'),
    'content' => t('content'),
	'continue_shopping' => t('continue shopping button'),
    'footer' => t('footer'),  
  );
}

function phptemplate_body_attributes($is_front = false, $layout = 'none') {

  if ($is_front) {
    $body_id = $body_class = 'front';
  }
  else {
    // Remove base path and any query string.
    global $base_path;
    list(,$path) = explode($base_path, $_SERVER['REQUEST_URI'], 2);
	list($path,) = explode('?', $path, 2);      
    $path = rtrim($path, '/');
    // Construct the id name from the path, replacing slashes with dashes.
    $body_id = str_replace('/', '-', $path);
    // Construct the class name from the first part of the path only.
    list($body_class,) = explode('/', $path, 2);
  }
  $body_id = 'page-'. $body_id;
  $body_class = 'section-'. $body_class;

  // Use the same sidebar classes as Garland.
  $sidebar_class = ($layout == 'both') ? 'sidebars' : "sidebar-$layout";

  return " id=\"$body_id\" class=\"$body_class $sidebar_class\"";
}
?>