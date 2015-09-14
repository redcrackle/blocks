<?php 
global $root, $base_url;
$share_url = $base_url.'/node/'.$node->nid;

if ($items = field_get_items('node', $node, 'field_image')) {
  if (count($items) == 1) {
    $image_slide = 'false';
  }
  elseif (count($items) > 1) {
    $image_slide = 'true';
  }
}

?>

<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h3 class="post_title" <?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
    
  <?php if ($display_submitted): ?>
    <ul class="meta">
      <li><i class="icon-user"></i> by <?php print render($content['field_name']); ?></li>
      <li><i class="icon-calendar"></i> <?php print format_date($node->created, 'custom', 'M d, Y'); ?></li>
      <li><i class="icon-comment"></i> <a href="<?php print $node_url;?>/#comments"><?php print $comment_count; ?> comments</a></li>
    </ul>
    <?php if (render($content['field_tags'])): ?>  
      <div class="tags"><i class="icon-tags"></i><?php print render($content['field_tags']); ?></div>
    <?php endif; ?>  
  <?php endif; ?>
   
  <?php if (render($content['field_image'])) : ?> 
	  
	  <?php if ($image_slide == 'true'): ?>
		  <div class="featured">
			  <?php if (render($content['field_image'])) : ?>
			    <?php print render($content['field_image']); ?>
			  <?php endif; ?>
			  <?php if (render($content['field_second_image'])) : // legacy support ?>
			    <?php print render($content['field_second_image']); ?>
			  <?php endif; ?>    
			</div>
		<?php endif; ?>
			
		<?php if ($image_slide == 'false'): ?>
		  <?php print render($content['field_image']); ?>
		<?php endif; ?>
			
  <?php endif; ?>
	
  <div class="article_content"<?php print $content_attributes; ?>>
    <?php
      // Hide comments, tags, and links now so that we can render them later.
      hide($content['taxonomy_forums']);
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_tags']);
      hide($content['field_image']);
      print render($content);
    ?>
  </div>
  
  <?php if (!$page): ?>
    <?php if (theme_get_setting('share_icons') == '1'): ?>
	  <div class="post_share_wrap">
	    <ul class="post_share">
	      <li><a href="http://twitter.com/home?status=<?php print $share_url; ?>"><i class="social foundicon-twitter"></i></a></li>
	      <li><a href="http://www.facebook.com/sharer.php?u=<?php print $share_url; ?>"><i class="social foundicon-facebook"></i></a></li>
	      <li><a href="http://www.stumbleupon.com/submit?url=<?php print $share_url; ?>&amp;title=<?php print $title; ?>"><i class="social foundicon-stumble-upon"></i></a></li>
	      <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php print $share_url; ?>&amp;title=<?php print $title; ?>&amp;summary={articleSummary}&amp;source=<?php print $base_url; ?>"><i class="social foundicon-linkedin"></i></a></li>
	      <li><a href="http://reddit.com/submit?url=<?php print $share_url; ?>"><i class="social foundicon-reddit"></i></a></li>
	      <li><a href="mailto:user@domain.com?subject=Check%20out%20this%20great%20post&amp;body=<?php print $share_url; ?>"><i class="general foundicon-mail"></i></a></li>
	    </ul>  
	  </div>
	  <?php endif; ?>
	  <div class="read_more"> 
	  	<?php if($teaser): ?>
	  	<a class="small button" href="<?php print $node_url;?>">read more</a>
	    <?php endif;?>
	  </div>
	  <?php if (!$page): ?>
	    <hr class="article-break">
	  <?php endif; ?>  
  <?php endif; ?>
  
  <?php print render($content['comments']); ?>

</article>
<!-- /node -->
