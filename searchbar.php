<div class="searchandsocial navbar-fixed-top">
	<div class="megacontainer">
		<div class="row">
			
            <?php if(!is_home()){?>
            <div class="col-xs-12 col-md-6 bred">
            	<div class="breadcrumb">
                	<!--<span><strong>Usted está en:</strong></span> -->
                    <?php if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<p id="breadcrumbs">','</p>');
					} ?>
                </div>
            </div>
            <?php }?>
            
            <div class="col-xs-12 col-md-6">
            	<div class="row">
                    <div class="searchh col-xs-5">
                        <form method="get" id="searchform" action="<?php bloginfo('url')?>">
                            <label class="hidden" for="s"></label>
                            <a onclick="document.getElementById('searchform').submit();"><span class="fa fa-search"></span></a>
                            <input type="text" placeholder="¿Qué buscas?..." value="" name="s" id="s">
                            <!--<input type="submit" id="searchsubmit" value="" class="fa fa-search"> -->
                        </form>
                    </div>
                    
                    <div class="date col-xs-2 col-esp skw clr-3">
                    	<div class="inskw">
                            <div class="mes izq">Septiembre</div>
                            <div class="dia der">29</div>
                        </div>
                    </div>
                   
                    <div class="condition col-xs-2 skw col-esp">
                    	<div class="inskw">
                            <div class="mindeg izq">13ª <span class="fa fa-cloud fa-fw"></span></div>
                            <div class="maxdeg der">28ª <span class="fa fa-cloud fa-fw actdeg"></span></div>
                        </div>
                    </div> 
                   
                    <div class="socials col-xs-3 skw clr-3 col-esp">
                    	<div class="inskw">
                            <ul>
                                <li><a href="#"><span class="fa fa-facebook fa-fw"></span></a></li>
                                <li><a href="#"><span class="fa fa-twitter fa-fw"></span></a></li>
                                <li><a href="#"><span class="fa fa-youtube fa-fw"></span></a></li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
				
                
			</div>
		</div>
	</div>
</div>