<?php get_header()?>

<?php get_template_part('searchbar')?>

<script type="text/javascript">
var pins = [
	<?php foreach($pins as $pin):?>
  	['<?php echo $pin['ubicacion']['address']; ?>', <?php echo $pin['ubicacion']['lat']; ?>, <?php echo $pin['ubicacion']['lng']; ?>, '<?php echo $pin['tipo']?>' , '<?php echo $pin['info']?>' ,4],
  	<?php endforeach;?>
];
function setMarkers(map, locations) {
  //map.setCenter(new google.maps.LatLng(-33.634987, -71.630344));

  var image = {
    url: 'https://google-developers.appspot.com/maps/documentation/javascript/examples/full/images/beachflag.png',
    // This marker is 20 pixels wide by 32 pixels tall.
    size: new google.maps.Size(20, 32),
    // The origin for this image is 0,0.
    origin: new google.maps.Point(0,0),
    // The anchor for this image is the base of the flagpole at 0,32.
    anchor: new google.maps.Point(0, 32)
  };
  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Hello World!'
  });
  var shape = {
      coords: [1, 1, 1, 20, 18, 20, 18 , 1],
      type: 'poly'
  };

  for (var i = 0; i < locations.length; i++) {
    var pin = locations[i];
    var myLatLng = new google.maps.LatLng(pin[1], pin[2]);
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: image,
        shape: shape,
        title: pin[0],
        zIndex: pin[5]
    });

    
	
	var content = '<img src="<?php bloginfo('template_directory')?>/images/logo.png" height="50" alt="" /><h4>'+pin[0]+'</h4><h5>'+pin[3]+'</h5><p>'+pin[4]+'</p>';
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
                  <li><a href="#">Texto extendido desde un Lorem Ipsum</a></li>
                  <li><a href="#">Dropdown link</a></li>
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