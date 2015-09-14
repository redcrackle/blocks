<?php 
	global $root, $base_url;
	$cat = render($content['field_portfolio_category']);
  $cat = strip_tags($cat);
  $cat = str_replace(' ', ' / ', $cat);
?>

	<li>
	<a href="<?php print $node_url;?>">
		<div class="carousel_item_wrapper"> 
      <div class="carousel_item_content">
	      <div class="carousel_item_image">
	        <?php 
				$uri = $content['field_portfolio_image']['#object']->field_portfolio_image['und'][0]['uri'];			  
				$image = array(
					'style_name' => 'recent_projects', 
					'path' =>  $uri, 
					'alt' => 'Recent Projects',
					'title' => 'Recent Projects',
				);			 
				print theme('image_style', $image);?>
	      </div>
	    </div>
      <div class="carousel_item_hover">
	      <p><?php echo $cat;?></p>
	      <p><i class="general foundicon-search"></i> </p>
	    </div> 
    </div>  
   <div class="carousel_item_description">
    <h3><?php print $title; ?></h3>
   </div> 
 </a>   
 </li>