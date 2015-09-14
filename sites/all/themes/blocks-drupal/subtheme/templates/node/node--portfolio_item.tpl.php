<?php 
global $root, $base_url;
$share_url = $base_url.'/node/'.$node->nid;

?>
  <div class="row">  
  <div class="twelve columns">
    <div class="portfolio_image img_center"><?php print render($content['field_image']); ?></div>
  </div>
  
  <div class="four columns">  
	  <?php if (!$page): ?>
	  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
		<?php endif; ?>

  
    <?php print render($title_prefix); ?>

      <!-- <h3 class="post_title" <?php //print $title_attributes; ?>><a href="<?php //print $node_url; ?>"><?php //print $title; ?></a></h3>-->

    <?php print render($title_suffix); ?>
  
  <div class="article_content"<?php print $content_attributes; ?>>
  
  
  
    <?php
      // Hide comments, tags, and links now so that we can render them later.
      hide($content['taxonomy_forums']);
      hide($content['comments']);
      hide($content['links']);
      
      hide($content['field_portfolio_image']);
      hide($content['field_portfolio_tags']);
	        
    ?>
	
	
  </div>
  
<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>

  </div>
  </div>
  
    <div class="row">    
		 <div class="three-columns">
			<div id="clm1" class="column"><?php print render($content['field_need']); ?></div>
			<div id="clm2" class="column"><?php print render($content['field_solution']); ?></div>
			<div id="clm3" class="column"><?php print render($content['field_outcome']); ?></div>
		</div>
	</div>
<hr>
<div class="row">
<div class="eight columns">
 
<?php print render($content['body']); ?>
</div>

<div class="four columns">
<div class="field-label services-title">Services:&nbsp;</div>
<div class="services-wrapper">
  <?php print render($content['field_portfolio_category']); ?>
</div>
<div class="blank"></div>
<?php print render($content['field_testimonials']); ?>
</div>
</div>
<?php print render($content); ?>	
	
	
	
