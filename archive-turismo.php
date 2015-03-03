<?php get_header()?>

<?php get_template_part('searchbar')?>

<script type="text/javascript">


var pins = [

<?php foreach($posts as $pinz):?>
	<?php $pins = get_field('ubicacion' , $pinz->ID)?>
	['<?php echo $pins['address']; ?>', <?php echo $pins['lat']; ?>, <?php echo $pins['lng']; ?> ,4,'<?php $tipo = wp_get_post_terms($pinz->ID , 'tipo'); echo $tipo[0]->slug?>' , '<?php echo get_permalink($pinz->ID)?>' , '<?php echo $pinz->post_title?>'],
		
	<?php endforeach;?>

];
function setMarkers(map, locations) {
  map.setCenter(new google.maps.LatLng(-33.634987, -71.630344));
	
  for (var i = 0; i < locations.length; i++) {
    var pin = locations[i];
    var myLatLng = new google.maps.LatLng(pin[1], pin[2]);
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: '<?php echo get_bloginfo('template_directory')?>/images/'+pin[4]+'.png',
        //shape: shape,
        title: pin[0],
        zIndex: pin[3]
    });

    
	
	var content = '<img src="<?php bloginfo('template_directory')?>/images/logo.png" height="50" alt="" /><div class="clear miniseparator"></div><h3 class="pincontent">'+pin[6]+'</h3><h5 class="">'+pin[0]+'</h5><div class="clear miniseparator"></div><a href="'+pin[5]+'" class="btn btn-block btn-success">Ver Más info <span class="fa fa-share"></span></a>';
	var infowindow = new google.maps.InfoWindow( {maxWidth: 320} )
	
	google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
        return function() {
           infowindow.setContent(content);
           infowindow.open(map,marker);
        };
    })(marker,content,infowindow));
	
  }
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div style="height:200px"></div>

<section id="btnz">
	<div class="megacontainer">
		<div class="row">
			<div class="col-md-3 col-md-offset-7">
            	<button type="button" class="clr-11 btn btn-default dropdown-toggle btn-block" data-toggle="dropdown" aria-expanded="false">
                  Ver lugares por tipo
                  <span class="fa fa-caret-down"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                
                
               		<?php $tipos = get_terms('tipo')?>
					<?php foreach($tipos as $tipo):?>
                        <li><a href="<?php echo get_post_type_archive_link('turismo')?>/?tipo=<?php echo $tipo->slug?>"><?php echo $tipo->name?></a></li>
                    <?php endforeach;?>
                
                </ul>
            </div>
			<div class="col-md-2 ">
            	<a href="" class="clr-3 btn btn-success btn-block">Ver lugares en mapa</a>
            </div>
		</div>
	</div>
</section>

<main id="turismo">
	<div class="megacontainer">
		<div class="row">
            <?php $pcount = 0?>
            <?php foreach($posts as $post):?>
            <?php $pcount++?>
            
			<?php
				$col = '';
				$reco = '';
				if($pcount == 1){$col = 'col-md-6'; $reco = 'mega';}
				elseif($pcount == 2){$col = 'col-md-4 col-sm-6'; $reco = 'square';}
				elseif($pcount >= 3){$col = 'col-md-2 col-sm-6'; $reco = 'square';}
			?>
            
            <figure class="<?php echo $col?> col-esp">
            	<a href="<?php echo get_permalink($place->ID)?>">
            		<?php echo get_the_post_thumbnail($post->ID , $reco , array('class' => 'img-responsive') )?>
            	</a>
                <figcaption>
                	<div class="link"><a href="<?php echo get_permalink($place->ID)?>">+</a></div>
                	<?php if($pcount == 1){?>
                		<h3><?php echo $post->post_title?></h3>
                    	<p><?php echo $post->post_excerpt?></p>
                    <?php }else{?>
                    	<h3><?php echo $post->post_title?></h3>
					<?php }?>
                    <div class="clear"></div>
                </figcaption>
            </figure>
            
            <?php endforeach?>

    </div>

    <!-- Paginador -->
    <div class="clear separator"></div>
          <div class="navigation">
                  <?php 
                  if(function_exists('wp_paginate')) {
                        wp_paginate();
                    }
          ?>
    </div>
	</div>
</main>

<section id="map">
	<div id="map_canvas"></div>
</section>

<?php get_footer()?>