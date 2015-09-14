<?php

drupal_add_js(drupal_get_path('theme', 'blocks') .'/js/theme_settings.js'); 
 
function blocks_form_system_theme_settings_alter(&$form, &$form_state) {

  // Container
  $form['options'] = array(
    '#type' => 'vertical_tabs',
    '#default_tab' => 'defaults',
    '#weight' => '-10',
    '#attached' => array(
      'css' => array(drupal_get_path('theme', 'blocks') . '/css/theme-options.css'),
    ),
  );
 
  // General
  $form['options']['general'] = array(
    '#type' => 'fieldset',
    '#title' => 'General',
  );
  
    // Breadcrumbs
    $form['options']['general']['breadcrumbs'] = array(
      '#type' => 'checkbox',
      '#title' => 'Breadcrumbs',
      '#default_value' => theme_get_setting('breadcrumbs'),
    );
    
    // Load Screen
    $form['options']['general']['loader'] = array(
      '#type' => 'checkbox',
      '#title' => 'Loading Screen (front page)',
      '#default_value' => theme_get_setting('loader'),
    );
    
    // Menu Description
    $form['options']['general']['menu_description'] = array(
      '#type' => 'checkbox',
      '#title' => 'Check to display menu descriptions',
      '#default_value' => theme_get_setting('menu_description'),
    );
    
    // Share Icons
    $form['options']['general']['share_icons'] = array(
      '#type' => 'checkbox',
      '#title' => 'Check to display post "share icons"',
      '#default_value' => theme_get_setting('share_icons'),
    );
        
  // Layout
  $form['options']['layout'] = array(
    '#type' => 'fieldset',
    '#title' => 'Layout',
  );
  
    // Enable boxed layout
    $form['options']['layout']['enable_boxed_layout'] = array(
      '#type' => 'checkbox',
      '#title' => 'Enable boxed layout',
      '#default_value' => theme_get_setting('enable_boxed_layout'),
    );
              
    // Portfolio Columns
      $form['options']['layout']['portfolio_columns'] = array(
        '#type' => 'select',
        '#title' => 'Portfolio Columns',
        '#default_value' => theme_get_setting('portfolio_columns'),
        '#options' => array(
          'six' => 'Two',
          'four' => 'Three',
          'three' => 'Four (default)',
        ),
      );

  // Design
  $form['options']['design'] = array(
    '#type' => 'fieldset',
    '#title' => 'Design',
  );
  
   // Colors
    $form['options']['design']['colors'] = array(
      '#type' => 'fieldset',
      '#title' => '<div class="plus"></div><h3 class="options_heading">Color Scheme</h3>',
    );
  
      // Color Scheme
      $form['options']['design']['colors']['color_scheme'] = array(
        '#type' => 'select',
        '#title' => 'Color Scheme',
        '#default_value' => theme_get_setting('color_scheme'),
        '#options' => array(
          'black' => 'Black',
          'blue' => 'Blue (default)',
          'teal' => 'Teal',
          'green' => 'Green',
          'yellow' => 'Yellow',
          'purple' => 'Purple',
          'orange' => 'Orange',
          'red' => 'Red',
        ),
      );
      
    // Background
    $form['options']['design']['background'] = array(
      '#type' => 'fieldset',
      '#title' => '<div class="plus"></div><h3 class="options_heading">Background</h3>',
    );
    
      // Background Color
      $form['options']['design']['background']['body_background'] =array(
        '#type' => 'textfield',
        '#title' => 'Body background color',
        '#default_value' => theme_get_setting('body_background'),
      );    
      
     // Enable background pattern
      $form['options']['design']['background']['enable_background_pattern'] = array(
        '#type' => 'checkbox',
        '#title' => 'Enable background pattern',
        '#default_value' => theme_get_setting('enable_background_pattern'),
      );
    
      // Background
    $form['options']['design']['background']['background_select'] = array(
      '#type' => 'radios',
      '#title' => 'Select a background pattern:',
      '#default_value' => theme_get_setting('background_select'),
      '#options' => array(
        'gplaypattern' => 'item',
        'grey' => 'item',
        'retina_wood' => 'item',
        'noisy_grid' => 'item',
        'cartographer' => 'item',
        'bedge' => 'item',
        'illusion' => 'item',
        'nistri' => 'item',
      ),
      
      '#states' => array (
          'invisible' => array(
            'input[name="enable_background_pattern"]' => array('checked' => FALSE)
          )
        )

    );  
    
    // Background
    $form['options']['design']['page_heading'] = array(
      '#type' => 'fieldset',
      '#title' => '<div class="plus"></div><h3 class="options_heading">Page Heading</h3>',
    );
    
      // Background Color
      $form['options']['design']['page_heading']['heading_background'] =array(
        '#type' => 'textfield',
        '#title' => 'Page/slider heading background color',
        '#default_value' => theme_get_setting('heading_background'),
      );    
      
     // Enable background pattern
      $form['options']['design']['page_heading']['enable_heading_pattern'] = array(
        '#type' => 'checkbox',
        '#title' => 'Enable heading pattern',
        '#default_value' => theme_get_setting('enable_heading_pattern'),
      );
    
      // Background
    $form['options']['design']['page_heading']['heading_background_select'] = array(
      '#type' => 'radios',
      '#title' => 'Select a heading background pattern:',
      '#default_value' => theme_get_setting('heading_background_select'),
      '#options' => array(
        'shattered' => 'item',
        'tile' => 'item',
        'checkered' => 'item',
        'bullseyes' => 'item',
        'gplaypattern' => 'item',
        'cartographer' => 'item',
        'linen' => 'item',
        'dark_wood' => 'item',
      ),
        '#states' => array (
          'invisible' => array(
            'input[name="enable_heading_pattern"]' => array('checked' => FALSE)
          )
        )

    );  

    // CSS
    $form['options']['design']['css'] = array(
      '#type' => 'fieldset',
      '#title' => '<div class="plus"></div><h3 class="options_heading">CSS</h3>',
    );
      
      // User CSS
      $form['options']['design']['css']['user_css'] = array(
        '#type' => 'textarea',
        '#title' => 'Add your own CSS',
        '#default_value' => theme_get_setting('user_css'),
      ); 
  
        
    // Twitter
  $form['options']['twitter'] = array(
    '#type' => 'fieldset',
    '#title' => 'Twitter',
  );    
  
     // Twitter App Consumer Key
    $form['options']['twitter']['twitter_app_consumer_key'] =array(
      '#type' => 'textfield',
      '#title' => 'Twitter App Consumer Key',
      '#default_value' => theme_get_setting('twitter_app_consumer_key'),
      '#states' => array (
        'invisible' => array(
          'input[name="enable_twitter_feed"]' => array('checked' => FALSE)
        )
      )
    );
    
    // Twitter App Consumer Secret
    $form['options']['twitter']['twitter_app_consumer_secret'] =array(
      '#type' => 'textfield',
      '#title' => 'Twitter App Consumer Secret',
      '#default_value' => theme_get_setting('twitter_app_consumer_secret'),
      '#states' => array (
        'invisible' => array(
          'input[name="enable_twitter_feed"]' => array('checked' => FALSE)
        )
      )
    );
    
    // Twitter App Access Token
    $form['options']['twitter']['twitter_app_access_token'] =array(
      '#type' => 'textfield',
      '#title' => 'Twitter App Access Token',
      '#default_value' => theme_get_setting('twitter_app_access_token'),
      '#states' => array (
        'invisible' => array(
          'input[name="enable_twitter_feed"]' => array('checked' => FALSE)
        )
      )
    );
    
    // Twitter App Access Token Secret
    $form['options']['twitter']['twitter_app_access_secret'] =array(
      '#type' => 'textfield',
      '#title' => 'Twitter App Access Token Secret',
      '#default_value' => theme_get_setting('twitter_app_access_secret'),
      '#states' => array (
        'invisible' => array(
          'input[name="enable_twitter_feed"]' => array('checked' => FALSE)
        )
      )
    );

}
?>