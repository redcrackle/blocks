<?php
/**
 * Define $root global variable.
 */
global $root, $theme_path;
$root = base_path() . drupal_get_path('theme', 'blocks');

include_once(drupal_get_path('theme', 'blocks').'/includes/switch.php');

/**
 * Preprocess variables for the username.
 */
function blocks_preprocess_username(&$vars) {
  global $theme_key;
  $theme_name = $theme_key;
  
  // Add rel=author for SEO and supporting search engines
  if (isset($vars['link_path'])) {
    $vars['link_attributes']['rel'][] = 'author';
  }
  else {
    $vars['attributes_array']['rel'][] = 'author';
  }
}

/**
 * Assign theme hook suggestions for custom templates.
 */  
function blocks_preprocess_page(&$vars, $hook) {
  if (isset($vars['node'])) {
    $suggest = "page__node__{$vars['node']->type}";
    $vars['theme_hook_suggestions'][] = $suggest;
  }
  
  $status = drupal_get_http_header("status");  
  if($status == "404 Not Found") {      
    $vars['theme_hook_suggestions'][] = 'page__404';
  }
}


/**
 * Define some variables for use in theme templates.
 */
function blocks_process_page(&$variables) {	
  // Assign site name and slogan toggle theme settings to variables.
  $variables['disable_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['disable_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
   // Assign site name/slogan defaults if there is no value.
  if ($variables['disable_site_name']) {
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['disable_site_slogan']) {
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
}	


/**
 * Assign top level menu list items an ascending class of menu_$number.
 */
function blocks_menu_link(array $variables) {
  unset($variables['element']['#attributes']['class']);
  $element = $variables['element'];
  static $item_id = 0;
  $menu_name = $element['#original_link']['menu_name'];
  $element['#localized_options']['html'] = TRUE;
  
  if ($element['#original_link']['depth'] == 1 && $menu_name == variable_get('menu_main_links_source', 'main-menu')) {
	  $element['#attributes']['class'][] = 'menu_' . (++$item_id);
	}
  
  if ($element['#below']) {
    $element['#attributes']['class'][] = 'has-dropdown';
  }
  
  if (theme_get_setting('menu_description') == '1' && $element['#original_link']['menu_name'] == "main-menu" && isset($element['#localized_options']['attributes']['title'])){
    $element['#title'] .= $element['#localized_options']['attributes']['title'] ;
  }
  
  $sub_menu = $element['#below'] ? drupal_render($element['#below']) : '';
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);

  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . '</li>';
}



/**
 * Allow sub-menu items to be displayed.
 */
function blocks_links($variables) {
  if (array_key_exists('id', $variables['attributes']) && $variables['attributes']['id'] == 'main-menu-links') {
  	$pid = variable_get('menu_main_links_source', 'main-menu');
	$tree = menu_tree($pid);
	return drupal_render($tree);
  }
  return theme_links($variables);
}

/**
 * Add a comma delimiter between several field types.
 */
function blocks_field($variables) {
 
  $output = '';
 
  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';  
  }
 
  // Render the items.
  if ($variables['element']['#field_name'] == 'field_tags') {
    // For tags, concatenate into a single, comma-delimitated string.
    foreach ($variables['items'] as $delta => $item) {
      $rendered_tags[] = drupal_render($item);
    }
    $output .= implode(', ', $rendered_tags);
  }
  
  elseif ($variables['element']['#field_name'] == 'field_portfolio_category') {
    // For tags, concatenate into a single, comma-delimitated string.
    foreach ($variables['items'] as $delta => $item) {
      $rendered_tags[] = drupal_render($item);
    }
    $output .= implode(' ',$rendered_tags);
  }
  
  elseif ($variables['element']['#field_name'] == 'field_color') {
    // For tags, concatenate into a single, comma-delimitated string.
    foreach ($variables['items'] as $delta => $item) {
      $rendered_tags[] = drupal_render($item);
    }
    $output .= implode(', ', $rendered_tags);
  }
  
  elseif ($variables['element']['#field_name'] == 'field_icon') {
    // For tags, concatenate into a single, comma-delimitated string.
    foreach ($variables['items'] as $delta => $item) {
      $rendered_tags[] = drupal_render($item);
    }
    $output .= implode(', ', $rendered_tags);
  }
  
  elseif ($variables['element']['#field_name'] == 'field_text_color') {
    // For tags, concatenate into a single, comma-delimitated string.
    foreach ($variables['items'] as $delta => $item) {
      $rendered_tags[] = drupal_render($item);
    }
    $output .= implode(', ', $rendered_tags);
  }
  
  elseif ($variables['element']['#field_name'] == 'field_tile_url') {
    // For tags, concatenate into a single, comma-delimitated string.
    foreach ($variables['items'] as $delta => $item) {
      $rendered_tags[] = drupal_render($item);
    }
    $output .= implode(', ', $rendered_tags);
  }
  
  elseif ($variables['element']['#field_name'] == 'field_tile_size') {
    // For tags, concatenate into a single, comma-delimitated string.
    foreach ($variables['items'] as $delta => $item) {
      $rendered_tags[] = drupal_render($item);
    }
    $output .= implode(', ', $rendered_tags);
  }
  
  elseif ($variables['element']['#field_name'] == 'field_image') {
    // For tags, concatenate into a single, comma-delimitated string.
    foreach ($variables['items'] as $delta => $item) {
      $rendered_tags[] = drupal_render($item);
    }
    $output .= implode(', ', $rendered_tags);
  }
  
  elseif ($variables['element']['#field_name'] == 'field_second_image') {
    // For tags, concatenate into a single, comma-delimitated string.
    foreach ($variables['items'] as $delta => $item) {
      $rendered_tags[] = drupal_render($item);
    }
    $output .= implode(', ', $rendered_tags);
  }

  elseif ($variables['element']['#field_name'] == 'field_portfolio_tags') {
    // For tags, concatenate into a single, comma-delimitated string.
    foreach ($variables['items'] as $delta => $item) {
      $rendered_tags[] = drupal_render($item);
    }
    $output .= implode(', ', $rendered_tags);
  }
  
  elseif ($variables['element']['#field_name'] == 'field_portfolio_image') {

    // For tags, concatenate into a single, comma-delimitated string.
    foreach ($variables['items'] as $delta => $item) {
      $rendered_tags[] = drupal_render($item);
    }
    $output .= implode(', ', $rendered_tags);
  }
   
  else {
    $output .= '<div class="field-items"' . $variables['content_attributes'] . '>';
    // Default rendering taken from theme_field().
    foreach ($variables['items'] as $delta => $item) {
      $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
      $output .= '<div class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
    }
    $output .= '</div>';
    // Render the top-level DIV.
    $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';
  }
  
  // Render the top-level DIV.
  return $output;
}

/**
 * Put Breadcrumbs in a ul li structure and add descending z-index style to each <a href> tag.
 */
function blocks_breadcrumb($variables) {
  $count = '100';
  $breadcrumb = $variables['breadcrumb'];
  $crumbs = '';

  if (!empty($breadcrumb)) {
   
    foreach($breadcrumb as $value) {
      $count = $count - 1;
      $style = ' style="z-index:'.$count.';"';
      $pos = strpos( $value, ">"); 
      $temp1=substr($value,0,$pos);
      $temp2=substr($value,$pos,$pos);
      $crumbs = $value.'/ ';
    }
  
  }
  return $crumbs;
}

/**
 * Add various META tags to HTML head..
 */
function blocks_preprocess_html(&$vars){
  global $root;

  $font = array(
    '#tag' => 'link', 
    '#weight' => 1,
    '#attributes' => array( 
      'href' => 'http://fonts.googleapis.com/css?family=Open+Sans', 
      'rel' => 'stylesheet',
      'type' => 'text/css',
    ),
  );
  
  $condensed= array(
    '#tag' => 'link', 
    '#weight' => 2,
    '#attributes' => array( 
      'href' => 'http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300', 
      'rel' => 'stylesheet',
      'type' => 'text/css',
    ),
  );
  
  $color = array(
    '#tag' => 'link', 
    '#weight' => 6,
    '#attributes' => array( 
      'href' => ''.$root.'/css/colors/'.theme_get_setting('color_scheme').'.css', 
      'rel' => 'stylesheet',
      'type' => 'text/css',
      'media' => 'screen',
    ),
  );
  
  $viewport = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#weight' => 7,
    '#attributes' => array(
      'name' => 'viewport',
      'content' =>  'width=device-width, initial-scale=1, maximum-scale=1',
    )
  );
  
  $font_family = array(
    '#type' => 'markup',
    '#markup' => "<style type='text/css'>body {font-family:".theme_get_setting('font_family')." !important;}</style> ",
    '#weight' => 8,
  );
  
  $headings_font_family = array(
    '#type' => 'markup',
    '#markup' => "<style type='text/css'>h1, h2, h3, h4, h5, h6 {font-family:".theme_get_setting('headings_font_family')." !important;}</style> ",
    '#weight' => 9,
  );
  
  $headings = array(
    '#type' => 'markup',
    '#markup' => "<style type='text/css'>h1 {font-size:".theme_get_setting('h1').";} h2 {font-size:".theme_get_setting('h2').";} h3 {font-size:".theme_get_setting('h3').";} h4 {font-size:".theme_get_setting('h4').";} h5 {font-size:".theme_get_setting('h5').";} h6 {font-size:".theme_get_setting('h6').";}</style> ",
    '#weight' => 10,
  );
  
  $box_layout = array(
    '#type' => 'markup',
    '#markup' => "<style type='text/css'>#main_wrapper, #footer, #after-content { max-width: 1120px !important; margin: 0 auto !important; } header {left: 0; right: 0; max-width: 1120px; margin: 0 auto;} #heading_wrapper { box-shadow: none; }</style> ",
    '#weight' => 11,
  );

  $background_color = array(
    '#type' => 'markup',
    '#markup' => "<style type='text/css'>body {background:".theme_get_setting('body_background').";}</style> ",
    '#weight' => 12,
  );

  $background_image = array(
    '#type' => 'markup',
    '#markup' => "<style type='text/css'>body {background-image:url(".$root."/images/backgrounds/".theme_get_setting('background_select').".png);}</style> ",
    '#weight' => 13,
  );
  
  $heading_background_color = array(
    '#type' => 'markup',
    '#markup' => "<style type='text/css'>#heading_wrapper {background:".theme_get_setting('heading_background').";}</style> ",
    '#weight' => 14,
  );

   $heading_background_image = array(
    '#type' => 'markup',
    '#markup' => "<style type='text/css'>#heading_wrapper {background-image:url(".$root."/images/heading-backgrounds/".theme_get_setting('heading_background_select').".png);}</style> ",
    '#weight' => 15,
  );
  
  if (theme_get_setting('enable_boxed_layout') == "1") {
    drupal_add_html_head( $box_layout, 'box_layout' );
  }

  drupal_add_html_head( $font, 'google_font_open_sans' );
  drupal_add_html_head( $condensed, 'google_font_condensed' );
  drupal_add_html_head( $color, 'color_style' );
  drupal_add_html_head( $viewport, 'meta_viewport' );

  drupal_add_html_head( $headings_font_family, 'headings_font_family');
  drupal_add_html_head( $headings, 'headings');
  drupal_add_html_head( $background_color, 'background_color');
  
  if (theme_get_setting('enable_background_pattern') == "1") {
    drupal_add_html_head( $background_image, 'background_image');
  }  
  
  drupal_add_html_head( $heading_background_color, 'heading_background_color');
  
  if (theme_get_setting('enable_heading_pattern') == "1") {
    drupal_add_html_head( $heading_background_image, 'heading_background_image');
  }  
}

/**
 * User CSS function. Separate from blocks_preprocess_html so function can be called directly before </head> tag.
 */
function blocks_user_css() {
  echo "<!-- User defined CSS -->";
  echo "<style type='text/css'>";
  echo theme_get_setting('user_css');
  echo "</style>";
  echo "<!-- End user defined CSS -->";	
}
?>