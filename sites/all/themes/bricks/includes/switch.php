<?php function blocks_style_switch() { global $root; ?>
	
	<div id="slideout">
	      <div id="slidecontent">
	      
		      <h6 class="switch_heading">Colors</h6>
		        <div class="color_switch_wrap">
					    <ul id="color-nav">
					      <li class="<?php echo $root;?>/css/colors/default.css"><div class="switch_tile blue"></div></li>
					      <li class="<?php echo $root;?>/css/colors/black.css"><div class="switch_tile black"></div></li>
					      <li class="<?php echo $root;?>/css/colors/green.css"><div class="switch_tile green"></div></li>
					      <li class="<?php echo $root;?>/css/colors/orange.css"><div class="switch_tile orange"></div></li>
					      <li class="<?php echo $root;?>/css/colors/red.css"><div class="switch_tile red"></div></li>
					      <li class="<?php echo $root;?>/css/colors/teal.css"><div class="switch_tile teal"></div></li>
					      <li class="<?php echo $root;?>/css/colors/purple.css"><div class="switch_tile purple"></div></li>
					 		  <li class="<?php echo $root;?>/css/colors/yellow.css"><div class="switch_tile yellow"></div></li>
					    </ul>
			      </div>
			      
			      <h6 class="switch_heading">Heading Patterns</h6>  
			        <ul id="heading-bg-nav">
			          <li class="shattered-bg"><div class="switch_tile shattered"></div></li>
			          <li class="tile-bg"><div class="switch_tile tile_bg"></div></li>
			          <li class="checkered-bg"><div class="switch_tile checkered"></div></li>  
			          <li class="bullseyes-bg"><div class="switch_tile bullseyes-bg"></div></li>  
			          <li class="gplay-head"><div class="switch_tile gplay-head"></div></li>  
			          <li class="cartographer-head"><div class="switch_tile cartographer-head"></div></li>  
			          <li class="linen-bg"><div class="switch_tile linen-bg"></div></li>  
			          <li class="dark-wood-bg"><div class="switch_tile dark-wood-bg"></div></li>  
			        </ul>
			      
			    <h6 class="switch_heading">Layout</h6>  
			      <ul id="layout-nav">
			        <li class="switch_wide"><a class="tiny secondary button">Wide</a></li>
			        <li class="switch_boxed"><a class="tiny secondary button">Boxed</a></li>
			      </ul>  
	  
			    <div class="bg_patterns_wrap">
				    <h6 class="switch_heading">Background Patterns</h6>
				    <ul class="bg-nav">
				      <li class="grey-bg"><div class="switch_tile grey-bg"></div></li>
				      <li class="grid-bg"><div class="switch_tile grid-bg"></div></li>
				      <li class="wood-bg"><div class="switch_tile wood-bg"></div></li>
				      <li class="gplay-bg"><div class="switch_tile gplay-bg"></div></li>
				      <li class="cartographer-bg"><div class="switch_tile cartographer-bg"></div></li>
				      <li class="bedge-bg"><div class="switch_tile bedge-bg"></div></li>
				      <li class="illusion-bg"><div class="switch_tile illusion-bg"></div></li>
				      <li class="nistri-bg"><div class="switch_tile nistri-bg"></div></li>
				    </ul>
				   </div>
				   
				   <div class="bg_patterns_wrap">
				    <h6 class="switch_heading">Background Colors</h6>
				    <ul class="bg-nav">
				      <li class="blue-bg"><div class="switch_tile blue"></div></li>
				      <li class="black-bg"><div class="switch_tile black"></div></li>
				      <li class="green-bg"><div class="switch_tile green"></div></li>
				      <li class="orange-bg"><div class="switch_tile orange"></div></li>
				      <li class="red-bg"><div class="switch_tile red"></div></li>
				      <li class="teal-bg"><div class="switch_tile teal"></div></li>
				      <li class="purple-bg"><div class="switch_tile purple"></div></li>
				      <li class="yellow-bg"><div class="switch_tile yellow"></div></li>
				    </ul>
			    </div>
			    
	      </div>
      
	      <div id="clickme">
	       <img src="<?php echo $root;?>/images/switch/edit.png" alt="switch">
	      </div>
      
        </div>

	
	
<?php } ?>