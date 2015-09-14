<?php 
  global $root, $base_url; 
  $cat = render($content['field_portfolio_category']);
  $cat = strip_tags($cat);
  $cat = str_replace(' ', ' / ', $cat);
?>

  <div class="<?php echo theme_get_setting('portfolio_columns');?> columns switch <?php print strip_tags(render($content['field_portfolio_category'])); ?>" data-category="<?php print strip_tags(render($content['field_portfolio_category'])); ?>">
    <div class="carousel_item_wrapper"> 
      <div class="carousel_item_content">
	      <div class="carousel_item_image">
	        <?php print render($content['field_portfolio_image']); ?>
	      </div>
	    </div>
      <div class="carousel_item_hover">
	      <p><?php echo $cat;?></p>
	      <p><a href="<?php echo file_create_url($node->field_portfolio_image['und'][0]['uri']); ?>" rel="lightbox" title="<?php print $title; ?>"><i class="general foundicon-search"></i></a><a href="<?php print $node_url;?>" > <i class="general foundicon-paper-clip"></i></a></p>
	    </div>
    </div>  
    <div class="carousel_item_description">
      <h3><a href="<?php print $node_url;?>"><?php print $title; ?></a></h3>
    </div>
  </div>