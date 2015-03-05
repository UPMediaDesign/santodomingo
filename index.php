<?php get_header()?>

<?php get_template_part('searchbar')?>

<section id="slider">
    
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  	<div class="carousel-inner" role="listbox">
    <?php $idds = array();?>
    <?php $count = 0;?>
    <?php foreach($posts as $post):?>
    <?php $count++?>
    <?php if($count <= 3){?>
    <?php $bgid = get_post_thumbnail_id($post->ID)?>
    <?php $bg = wp_get_attachment_image_src( $bgid, 'slider' ); ?>
        <div class="item <?php if($count == 1){?>active<?php }?>" style="background-image:url(<?php echo $bg[0]?>);">
            <div class="col-md-6 clr-1 base">
                <div class="inside col-lg-8 col-md-offset-2">
                    <div class="cat">Noticias</div>
                    <div class="clear"></div>
                    <h2><a href="<?php echo get_permalink($post->ID)?>"><?php echo $post->post_title?></a></h2>
                    <p><?php echo substr($post->post_content , 0, 100)?>...</p>
                    <a href="<?php echo get_permalink($post->ID)?>" class="morelink"><span class="fa fa-circle"></span> Leer más</a>
                </div>
            </div>
            <div class="col-md-1 skk desktop"></div>
            <div class="clear"></div>
        </div>
    <?php array_push($idds , $post->ID)?>
	<?php }?>
    <?php endforeach;?>
    
  	</div>
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
 
</div>
    
</section>

<section id="infobox">
	<div class="container">
		<div class="row">
        	<div class="col-md-6 col-xs-6">
            	<div class="col-md-7 desktop phone">
                    <h3>800 444 2700</h3>
                </div>
            	<div class="col-md-5 col-xs-12 phone">
                    <h2>Fono ayuda</h2>
                    <span>Claritas est etiam processus.</span>
                </div>
            </div>
        	<div class="col-md-6 col-xs-6">
            	<div class="col-md-4 col-xs-12 trans">
                    <img src="<?php bloginfo('template_directory')?>/images/trans-eye.png" alt="">
                    <h2>Transparencia</h2>
                </div>
                <div class="col-xs-8 desktop ">
                    <a class="transtag" href=""><img style="max-width: 145px !important; width:100% !important; margin-top: 40px;" src="<?php bloginfo('template_directory')?>/images/leytransparencia.png" alt=""></a>
                    <a class="transtag" href=""><img style="max-width: 145px !important; width:100% !important; margin-top: 40px;" src="<?php bloginfo('template_directory')?>/images/transparencia-activa.png" alt=""></a>
                </div>
            </div>
        </div>
	</div>
</section>

<div class="clear separator"></div>

<section id="main">
	<div class="container">
    	<div class="row">
        	<div id="noticias" class="col-md-8">
            	<h3>Noticias</h3>
                <div class="clear sepatator border"></div> 
                
                <?php $posts = get_posts(array('category' => 'noticias' , 'numberposts' => 2 , 'post__not_in' => $idds))?>
                <?php $count = 0?>
                <?php foreach($posts as $post):?>
                <?php $count++?>
                
                <?php if($count == 1){?>
                    <article class="principal">
                        <div class="row">
                            <div class="col-md-4"><a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_post_thumbnail($post->ID , 'tall' , array('class' => 'img-responsive'))?></a></div>
                            <div class="col-md-8">
                                <h4><?php echo $post->post_title?></h4>
                                <p><?php echo get_the_excerpt($post->ID)?></p>
                                <footer class="row">
                                    <div class="col-md-8 col-xs-8 publish"><p>Publicado el: <?php echo get_the_date(); ?></p></div>
                                    <div class="col-md-4"><a href="<?php echo get_permalink($post->ID)?>" class="morelink"><span class="fa fa-circle"></span> Leer más</a></div>
                                </footer>
                            </div>
                        </div>
                    </article>
                    <div class="clear sepatator border"></div>
                <?php }else{?>
                    <article class="secundario">
                        <div class="row">
                            <div class="col-md-2"><a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_post_thumbnail($post->ID , 'square' , array('class' => 'img-responsive'))?></a></div>
                            <div class="col-md-10">
                                <h4><?php echo get_the_title($post->ID)?></h4>
                                <p><?php echo get_the_excerpt($post->ID)?></p>
                                <footer class="row">
                                    <div class="col-md-9 publish"><p>Publicado el: <?php echo get_the_date(); ?></p></div>
                                    <div class="col-md-3"><a href="<?php echo get_permalink($post->ID)?>" class="morelink"><span class="fa fa-circle"></span> Leer más</a></div>
                                </footer>
                            </div>
                        </div>
                    </article>
                    <div class="clear sepatator border"></div>
                <?php }?>
                
                <?php endforeach;?>
               	
                 
                
            </div>
            <aside class="col-md-4">
            	<h3>&nbsp;</h3>
                <div class="clear sepatator border"></div> 
            	<div class="box" id="box1">
                    <a href="<?php echo get_bloginfo('url')?>/santodomingotv/">
                	   <img src="<?php bloginfo('template_directory')?>/images/stdtv.png" width="100%" alt="" />
                    </a>
                </div>
            	<div class="box" id="box2">
                    <a href="<?php echo get_bloginfo('url')?>/servicio/seguridad-ciudadana/">
                	   <img src="<?php bloginfo('template_directory')?>/images/seguridad.png" width="100%" alt="" />
                    <a href=""></a>
                </div>
            </aside>
        </div>
    </div>
</section>

<div class="clear separator"></div>

<section id="servicios">
	<div class="container">
		<div class="row">
			<div id="servicio" class="col-md-8">
            	<div class="row">
                	<div class="col-md-12">
                        <h3>Servicios</h3>
                        <p class="subtitle">Formas humanitatis per seacula quarta decima et quinta.</p>
                    </div>
                	
                    <div role="tabpanel">
                     	
                      	<div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="servicios-1">
                            
                            	<?php $servicios = get_posts(array('post_type' => 'page' , 'post_parent' => 89  , 'numberposts' => -1 , 'exclude' => 105 ))?>
                                <?php $scoount = 0?>
                                <?php foreach($servicios as $servicio):?>
                            	<?php $scoount++?>
                                <div class="col-md-6 col-xs-6">
                                	<figure>
                                        <a href="<?php echo get_permalink($servicio->ID)?>"><?php echo get_the_post_thumbnail($servicio->ID , 'col-6' , array('class' => 'img-responsive'))?></a>
                                        <figcaption>
                                            <a href="<?php echo get_permalink($servicio->ID)?>"><img src="<?php echo get_bloginfo('template_directory')?>/images/<?php echo $servicio->post_name?>.png" width="100" class="alignleft desktop clr-<?php echo $servicio->post_name?>" alt="" /></a>
                                            <h3><?php echo $servicio->post_title?></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam congue fermentum. </p>
                                            <div class="clear"></div>
                                        </figcaption>
                                	</figure>
                                </div>
                                
                                <?php if($scoount %2 == 0){?><div class="clear separator"></div><?php }?>
                                <?php if($scoount == 4){?>
                                <div class="clear"></div>
                            </div>
                            
                            <div role="tabpanel" class="tab-pane" id="servicios-2">
                                <?php }?>
                                
                               	<?php endforeach?>
                            	
                                
                            </div>
                      	</div>
                    	<div class="col-md-12">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#servicios-1" aria-controls="servicios-1" role="tab" data-toggle="tab"><span class="fa fa-circle fa-fw"></span></a></li>
                                <li role="presentation"><a href="#servicios-2" aria-controls="servicios-2" role="tab" data-toggle="tab"><span class="fa fa-circle fa-fw"></span></a></li>
                            </ul>
                        </div>
                      	
                    	
                    </div>
					
                </div>
            </div>
            
			<aside id="turismo" class="col-md-4">
            	<div class="row">
                	<div class="col-md-12">
                        <h3>Turismo</h3>
                        <p class="subtitle">Formas humanitatis per decima.</p>
                    </div>
                	
                    <div role="tabpanel">
                        <div class="tab-content">
                             
							<?php wp_reset_query()?>
                        	<?php $turismo = get_posts(array('post_type' => 'turismo' , 'tipo' => 'lugar-turistico'))?>
                            <?php foreach($turismo as $place):?>
                            
                            <figure class="col-md-12">
                                     <a href="<?php echo get_permalink($place->ID)?>"><?php echo get_the_post_thumbnail($place->ID , 'col-6' , array('class' =>'img-responsive'))?></a>
                                    <figcaption>
                                    	<div class="link"><a href="<?php echo get_permalink($place->ID)?>">+</a></div>
                                        <h3><?php echo $place->post_title?></h3>
                                        <p><?php echo $place->post_excerpt?></p>
                                        <div class="clear"></div>
                                    </figcaption>
                                
                                <div class="clear separator"></div>
                            </figure>   
                            
                            <?php endforeach?>
                            
                                
                        </div>
                        
                    </div>
                    
                    <!--
                    <div class="col-md-12">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#turismo-1" aria-controls="turismo-1" role="tab" data-toggle="tab"><span class="fa fa-circle fa-fw"></span></a></li>
                                <li role="presentation"><a href="#turismo-2" aria-controls="turismo-2" role="tab" data-toggle="tab"><span class="fa fa-circle fa-fw"></span></a></li>
                            </ul>
                    </div>
                    -->

                </div>
            
            </aside>
		</div>
	</div>
</section>

<div class="clear separator"></div>

<section id="subscribe">
	<div class="container">
		<div class="row">
        	<div class="col-md-12 form">
            	<h3>Suscríbete al Newsletter</h3>
                <p class="subtitle">Formas humanitatis per seacula quarta decima et quinta.</p>
                <div class="row"><?php echo do_shortcode('[contact-form-7 id="10" title="Suscripción Newsletter"]')?></div>
            </div>
        </div>
	</div>
</section>

<?php get_footer()?>