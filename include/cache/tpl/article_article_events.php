<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <div id="fooexposeMask"></div>                    
                    <h2>当前位置：首页><?php echo $type['classname'] ?></h2>
                    
                    

                    <div id="bnvideo" class="overlay apple_overlay i_nav" style="display:none" ><a class="close" style="bottom: 20px;"></a>
	                    <!-- the external content is loaded inside this tag -->
	                    <div class="contentWrap">

                           <div class="footer_image" ></div>
                        </div>
                    </div>
                    
<!--ARTICLE-->      
                    <div class="scrollbar_content">
                    	
                        <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                        
                    	<h3><?php echo $article['title'] ?></h3>
               			 <div class="viewport">
                    		 <div class="overview">
                             
                        		<div class="image_article">
                        			<?php foreach( fileall($article['pics']) as $v){ ?>
                                     <IMG alt="<?php echo $v[1] ?>" 
                                    src="<?php echo $v[0] ?>" itemid="" > 
                                    <?php } ?>
                        		</div>
                                
                                <div class="social_side">
                                	
                                    
                                    
                                </div>

                                <div style="float:right;">
                                    
                                </div>

                                <div class="content_side">
									<?php echo $article['body'] ?>
                                </div>    
                        
                        		<br clear="all" />
                                      
                    		</div>
               			 </div>
           			</div>
