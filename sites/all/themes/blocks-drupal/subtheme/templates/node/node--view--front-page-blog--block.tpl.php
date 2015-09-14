<?php 
global $root, $base_url;
$share_url = $base_url.'/node/'.$node->nid;
?>
	<div class="six columns">
	  <div class="recent_posts_wrap">
	       <?php 
				$uri = $content['field_image']['#object']->field_image['und'][0]['uri'];
                $img_path = file_create_url($uri);
            ?>
		<div class="recent_post_photo">
		  <img typeof="foaf:Image" src="<?php print $img_path; ?>" width="1200" height="400" alt="" thmr="thmr_188 thmr_189 thmr_190">
		</div>		
	    <div class="recent_post_info"> 
        <a href="<?php print $node_url; ?>">		
	      <div class="recent_post_info_text">
		  <a href="<?php print $node_url; ?>">
	          <h1><?php print $title; ?></h1>
	          <i class="general foundicon-calendar"></i><?php print format_date($node->created, 'custom', 'M d, Y'); ?>
	          <i class="general foundicon-mic"></i><a href="<?php print $node_url;?>/#comments"><?php print $comment_count; ?></a>
	      </a>
		  </div>
		   </a>
	      <div class="clearfix"></div>
	    </div>
		<a href="<?php print $node_url; ?>">
			<div class="recent_post_links">		    
			<p><i class="general foundicon-search"></i></p>	
            </div>				
        </a>		
			
	  </div>  
	</div>

  <div id="myModal_<?php print $node->nid; ?>" class="reveal-modal large blog_front three columns <?php if ( $user->uid ) { echo "front_blog_modal_user"; } ?>">
    <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

	  <?php if ($user_picture || $display_submitted || !$page): ?>
	    <?php print render($title_prefix); ?>
	    
	      <div class="modal_post_title"><?php print $title; ?></div>
	        <ul class="meta">
	          <li><i class="icon-user"></i> by <?php print $name; ?></li>
	          <li><i class="icon-calendar"></i> <?php print format_date($node->created, 'custom', 'M d, Y'); ?></li>
	          <li><i class="icon-comment"></i> <a href="<?php print $node_url;?>/#comments"><?php print $comment_count; ?> comments</a></li>        
		      </ul>
		    <?php if (render($content['field_tags'])): ?>  
		      <div class="tags"><i class="icon-tags"></i><?php print render($content['field_tags']); ?></div>
        <?php endif; ?>
	      <?php print render($title_suffix); ?>
	    
	      <?php if (render($content['field_image'])) : ?> 
		      <div class="featured">
				    <?php if (render($content['field_image'])) : ?>
				     <?php print render($content['field_image']); ?>
				    <?php endif; ?>  
				    <?php if (render($content['field_second_image'])) : // legacy support ?>
			        <?php print render($content['field_second_image']); ?>
			      <?php endif; ?> 
			    </div>
		    <?php endif; ?>
		    
	    <?php endif; ?>
  
	  <div class="blog_front_content"<?php print $content_attributes; ?>>
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

  <div class="read_more"> 
  	<?php if($teaser): ?>
  	<a class="small button" href="<?php print $node_url;?>">read more</a>
    <?php endif;?>
  </div>
	  <div class="clearfix"></div>
	  </article> <!-- end article -->

  <a class="close-reveal-modal">&#215;</a>
  </div>
