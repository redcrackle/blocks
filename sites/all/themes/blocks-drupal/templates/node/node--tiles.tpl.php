<?php if (render($content['field_color'])): ?>

<div class="tile <?php print render($content['field_tile_size']); ?> columns" style="background: <?php print render($content['field_color']); ?>;">
 <a href="<?php if (render($content['field_tile_url'])) { print render($content['field_tile_url']); } else { echo "#"; } ?>" <?php if (render($content['field_modal_content'])): ?> data-reveal-id="tile_modal_<?php print $node->nid; ?>"<?php endif; ?> style="color: <?php print render($content['field_text_color']); ?>;">
   <div class="tile-title"> <?php print $title;?></div>
	 <i class="<?php print render($content['field_icon']); ?>"></i>
 </a>	   
</div>
<?php endif; ?>

<?php if (render($content['field_image'])): ?>

<div class="tile-photo <?php print render($content['field_tile_size']); ?> columns">
  <div class="services_content">  
		<div class="team_image"> 
		  <?php print render($content['field_image']); ?>
	  </div>
   <div class="team_image_hover">
     <h3 class="image-tile-title"><?php print $title;?></h3>
       <p><a href="<?php if (render($content['field_tile_url'])) { print render($content['field_tile_url']); } else { echo "#"; } ?>" <?php if (render($content['field_modal_content'])): ?> data-reveal-id="tile_modal_<?php print $node->nid; ?>"<?php endif; ?>><i class="general foundicon-search"></i></a></p>
     </div>
   </div>        
</div>


<?php endif; ?>

<?php if (render($content['field_modal_content'])): ?>
<div id="tile_modal_<?php print $node->nid; ?>" class="reveal-modal large tile-modal">
<?php print render($content['field_modal_content']); ?>
<a class="close-reveal-modal">&#215;</a>
</div>
<?php endif; ?>