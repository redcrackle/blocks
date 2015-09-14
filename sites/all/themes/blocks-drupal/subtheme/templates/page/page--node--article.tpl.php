<div id="main_wrapper">
  <header>
    <div class="container">
       
      <div id="top_header" > 
	      <div class="row">
	        <div class="six columns">
	          <?php if( ($page['header_login']) OR ($page['header_contact']) ) { ?>
	          <ul class="header_icons left">
	            <?php if($page['header_login']) { ?><li><a href="#" data-reveal-id="login_modal"><i class="general foundicon-settings"></i></a></li> <?php } ?>
	            <?php if($page['header_contact']) {?><li><a href="#" data-reveal-id="contact_modal"><i class="general foundicon-mail"></i></a></li> <?php } ?>
	          </ul>
	          <?php } ?>
	          <?php if($page['header_top_left']) { print render($page['header_top_left']); } ?>
	        </div>
	        <div class="six columns">
	          <?php if($page['header_top_right']) { print render($page['header_top_right']); } ?>
	        </div>
	      </div> 
      </div> 
      
      <div class="row">  
        <div class="three columns branding">
         
	        <?php if ($logo): ?>
			      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
			        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
			      </a>
		      <?php endif; ?>
				  <!--END LOGO -->   
				  
					<!-- NAME AND SLOGAN --> 
			    <?php if ($site_name || $site_slogan): ?>
			      <div id="name-and-slogan"<?php if ($disable_site_name && $disable_site_slogan) { print ' class="hidden"'; } ?>>
	
			        <?php if ($site_name): ?>
			          <h1 id="main_title_text"<?php if ($disable_site_name) { print ' class="hidden"'; } ?>>
			            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
			          </h1>
			        <?php endif; ?>
			
			        <?php if ($site_slogan): ?>
			          <h2 id="main_title_slogan"<?php if ($disable_site_slogan) { print ' class="hidden"'; } ?>>
			            <?php print $site_slogan; ?>
			          </h2>
			        <?php endif; ?>
		
			      </div>  
			    <?php endif; ?>
        </div>
        <!--END BRANDING -->
      	<div class="nine columns"> 
          <div id="nav">
            <!-- begin menu -->
             <nav class="top-bar">
              <ul class="left">
              <li class="name">
	              <h1>
	                <a href="#">
	                  Select a page 
	                </a>
	              </h1>
	            </li>
              <li class="toggle-topbar"><a href="#"></a></li>
              </ul>
              <section class="menu_wrap">
				        <?php if($page['header_menu']) { print render($page['header_menu']); } ?>
              </section>
             </nav>
				      </div> 
				        
				    </div> 
				 
            <!-- end menu -->   
          </div> 
        </div>
        <!-- end main span2 -->  
       
       <?php //blocks_style_switch(); ?>
          
  </header> 
  
  <!-- Header login modal (block region) -->    
  <div id="login_modal" class="reveal-modal medium">
    <?php print render($page['header_login']); ?>  
    <a class="close-reveal-modal">&#215;</a>
  </div>

  <!-- Header contact modal (block region) -->  
  <div id="contact_modal" class="reveal-modal medium">
    <?php print render($page['header_contact']); ?> 
    <a class="close-reveal-modal">&#215;</a>
  </div>

	<div id="heading_wrapper">
	  <div id="heading_wrapper_after">
		    <div class="row">
	      <div class="twelve columns">
	        <h2 class="page_heading_text"><?php print $title; ?></h2>
	        <div id="breadcrumbs"><h3><?php if (theme_get_setting('breadcrumbs') == '1') {print $breadcrumb . $title; } ?></h3></div>
	      </div>
	    </div>
	  </div> 
	</div>
     
	<div class="row">
	
	  <div id="main_content_wrap" class="<?php if (($page['sidebar_first']) OR ($page['sidebar_second'])) { echo "eight columns";} else { echo "twelve columns"; } ?>">    
	    <div id="main_content">
	      <?php print render($title_prefix); ?>
	      <?php print render($title_suffix); ?>
	      <?php if ($tabs = render($tabs)): ?>
			    <div id="drupal_tabs" class="tabs">
			    <?php print render($tabs); ?>
			    </div>
			  <?php endif; ?>
	      <?php print render($page['help']); ?>
	      <?php if ($action_links): ?>
	        <ul class="action-links">
	          <?php print render($action_links); ?>
	        </ul>
	      <?php endif; ?>
	      <?php print render($page['content']); ?>
	    </div>
	  </div>
	
	  <?php if (($page['sidebar_first']) OR ($page['sidebar_second'])): ?>
	  <div class="four columns">
	    <div id="sidebar_wrap">
		  	<?php if ($page['sidebar_first']): ?>
	  	  <aside id="sidebar-first" role="complementary" class="sidebar clearfix">
	        <?php print render($page['sidebar_first']); ?>
	      </aside>  <!-- /#sidebar-first -->
		    <?php endif; ?>
		    <?php if ($page['sidebar_second']): ?>
	      <aside id="sidebar-second" role="complementary" class="sidebar clearfix">
	        <?php print render($page['sidebar_second']); ?>
	      </aside>  <!-- /#sidebar-first -->
		    <?php endif; ?>
	    </div>        
	  </div>
	  <?php endif; ?>
	</div> 
	<?php print $messages; ?>   
</div>     
<!-- end main wrapper -->     
<?php print render($page['after_content']); ?>      
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