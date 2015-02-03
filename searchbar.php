<?php
    $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
    $yql_query = 'select item from weather.forecast where woeid = 350357';
    $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&u=c&format=json";
	
	$session = curl_init($yql_query_url);
    curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
    $json = curl_exec($session);
    // Convert JSON to PHP object
    $temps =  json_decode($json);
    //var_dump($temps->query->results->channel->item->condition);
	
	function to_celsius($f){
		$celsius=5/9*($f-32);
        return $celsius ;
	}
	
	$max = to_celsius($temps->query->results->channel->item->forecast[0]->high);
	$min = to_celsius($temps->query->results->channel->item->forecast[0]->low);
	
?>                                    
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
            	<div style="margin-right:-30px">
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
                            <div class="mes izq"><?php echo date('F')?></div>
                            <div class="clear"></div>
                            <div class="dia der"><?php echo date('j')?></div>
                        </div>
                    </div>
                   
                    <div class="condition col-xs-2 skw col-esp">
                    	<div class="inskw">
                            <div class="mindeg izq"><?php echo round($min);?>ª <span class="fa fa-cloud fa-fw"></span></div>
                            <div class="maxdeg der"><?php echo round($max);?>ª <span class="fa fa-cloud fa-fw actdeg"></span></div>
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