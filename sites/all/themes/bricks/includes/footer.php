<?php 
function blocks_footer($page){
  global $root; 
?>
<!-- begin footer -->        
<div id="footer"> 
  <div class="container">
    
    <?php if( (render($page['footer_1'])) OR (render($page['footer_2'])) OR (render($page['footer_3'])) OR (render($page['footer_4'])) ) { ?>
		<div class="row">
		
			<div class="three columns">
	      <?php print render($page['footer_1']); ?>
	    </div> 
	
	    <div class="three columns">
	      <?php print render($page['footer_2']); ?>
	    </div>
	    
	    <div class="three columns">
	      <?php print render($page['footer_3']); ?>
	    </div>
	    
	    <div class="three columns">
	      <?php print render($page['footer_4']); ?>
	    </div>
	    
		</div>
		<!-- END TOP ROW -->
		<?php } ?> 

   <?php if ( (render($page['footer_full'])) ) { ?>		
	 <div class="row">
	   <div class="twelve columns"> 
	     <?php print render($page['footer_full']); ?>  
	   </div> 	
	 </div>
	 <?php } ?> 

  </div> 
</div>
<!-- end footer --> 
    
<?php }
?>