<?php get_header()?>

<?php get_template_part('searchbar')?>


<?php if($post->post_parent == '89'){?>
	<?php $bgid = get_field('head_image' , $post->ID)?>
	<?php $bg = wp_get_attachment_image_src( $bgid, 'wider' ); ?>
<?php }else{?>
	<?php $bgid = get_post_thumbnail_id($post->ID)?>
	<?php $bg = wp_get_attachment_image_src( $bgid, 'wider' ); ?>
<?php }?>

<section id="slider" style="background-image:url(<?php echo $bg[0]?>)">
	<div class="inner">
        <div class="container">
            <div class="row">
                <div class="jumbotron">
                    <h1><?php echo $post->post_title ?></h1>
                    <p><?php echo get_the_excerpt()?></p>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</section>
<div class="clear separator"></div>
<main>
	<div class="container">
		<div class="row">
        	<div class="col-md-8 col-md-offset-2">
            	<?php echo apply_filters('the_content' , $post->post_content)?>
            </div>
        </div>
	</div>
</main>
<div class="clear separator"></div>

<?php $boxes = get_field('boxes')?>
<?php if($boxes){?>

	<?php foreach($boxes as $box):?>
		
        
        <?php if($box['acf_fc_layout'] == 'col-md-8'){?>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
                    	<?php echo apply_filters('the_content' , $box['editor'])?>
                    </div>
				</div>
			</div>
		</section>
        <?php }elseif($box['acf_fc_layout'] == 'col-md-12'){?>
        <section>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
                    	<?php echo apply_filters('the_content' , $box['editor'])?>
                    </div>
				</div>
			</div>
		</section>
        <?php }elseif($box['acf_fc_layout'] == 'col-md-12-plus'){?>
        
        <section>
			<div class="megacontainer">
				<div class="row">
					<div class="col-md-12">
                    	<?php echo apply_filters('the_content' , $box['editor'])?>
                    </div>
				</div>
			</div>
		</section>
        
        <?php }elseif($box['acf_fc_layout'] == 'separador'){?>
        	<div class="clear separator"></div>
        <?php }elseif($box['acf_fc_layout'] == 'acordeones'){?>
        	<section>
        		<div class="container">
        			<div class="row">
        				<div class="col-md-8 col-md-offset-2">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            
                            <?php $acoc = 0?>
							<?php foreach($box['acordeon'] as $acordeon):?>
                            <?php $acoc++?>
                            	<div class="panel panel-default" id="control">
                                	<div class="panel-heading clr-<?php echo $post->post_name?>" style="{width: 100%; max-width: none; border-radius: 0; padding: 11px; border: 1px solid #ddd;}" role="tab" id="aco-<?php echo $acoc?>">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $acoc?>" aria-expanded="true" aria-controls="collapse-<?php echo $acoc?>">
                                          <?php echo $acordeon['titulo_acordeon']?>
                                        </a>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $acoc?>" aria-expanded="true" aria-controls="collapse-<?php echo $acoc?>" class="pull-right"><span class="fa fa-caret-right"></span></a>
                                      </h4>
                                    </div>
                                    <div id="collapse-<?php echo $acoc?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="aco-<?php echo $acoc?>">
                                      <div class="panel-body">
                                        <?php echo apply_filters('the_content', $acordeon['contenido_acordeon'])?>
                                      </div>
                                    </div>
                                  </div>
                            
                                <h5></h5>
                                <p></p>
                            <?php endforeach;?>
                        	</div>
                        </div>
        			</div>
        		</div>
        	</section>
            
            
        <?php }?>
        
	<?php endforeach?>
    <div class="clear separator "></div>
<?php }?>

<?php if($post->post_parent == '89'){?>

<?php $docs = get_posts(array('post_type' => 'documentos' , 'servicios' => $post->post_name ,'numberposts' => 3))?>
<?php if($docs){?>
<section id="documentos">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-8">
                    <h3>Documentos disponibles</h3>
                </div>
                <div class="col-md-4">
                    <h5><a href="<?php echo get_post_type_archive_link('documentos')?>" class="view-all btn btn-sm btn-primary btn-block">Ver todos los documentos</a></h5>
                </div>
            </div>
            <div class="clear separator border"></div>
            	<?php foreach($docs as $doc):?>
                	<article>
                        <div class="row">
                            <div class="col-md-1 col-esp">
                                <a href="<?php echo wp_get_attachment_url(get_field('documento',$doc->ID))?>" class="ico-link clr-<?php echo $post->post_name?>">
                                	<span class="fa fa-lg <?php echo get_icon_for_attachment(get_field('documento',$doc->ID))?>">
                                        <h4><?php echo $doc->post_title?></h4>
                                    </span>
                                </a> 
                                <?php //echo get_type_for_attachment(get_field('documento',$doc->ID))?>
                            </div>
                            <div class="col-md-11">
                                <h4 class="hide-on-mobile"><a href="<?php echo wp_get_attachment_url(get_field('documento',$doc->ID))?>"><?php echo $doc->post_title?></a></h4>
                                <p><?php echo $doc->post_content?></p>
                                <footer class="row">
                                <div class="col-md-9 dte">Publicado el: <?php echo get_the_date('l, j \d\e F \d\e Y' , $doc->ID)?></div>
                                <div class="col-md-3"><a href="<?php echo wp_get_attachment_url(get_field('documento',$doc->ID))?>" class="morelink"><span class="fa fa-circle"></span> Leer más</a></div>
                            </footer>
                            </div>
                        </div>
                        <div class="clear border separator"></div>
                    </article>
                	
                <?php endforeach;?>
                <div class="row">
                    <div class="col-md-8">
                        <h3>&nbsp;</h3>
                    </div>
                    <div class="col-md-4">
                        <h5><a href="<?php echo get_post_type_archive_link('documentos')?>" class="view-all btn btn-sm btn-primary btn-block">Ver todos los documentos</a></h5>
                    </div>
            	</div>
                
            </div>
		</div>
	</div>
</section>
<div class="clear separator"></div>
<?php }?>

<section id="servicios_page">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
            
            	<div class="clear separator border"></div>
            	
                <?php $servicios = get_posts(array('post_type' => 'page' , 'post_parent' => 89  , 'numberposts' => -1 , 'exclude' => 105 ))?>
                <h3>Otros Servicios</h3>
                <ul>
                <?php foreach($servicios as $servicio):?>
                	<li class="serv">
                        <a href="<?php echo get_permalink($servicio->ID)?>">
                            <img src="<?php echo get_bloginfo('template_directory')?>/images/<?php echo $servicio->post_name?>.png" width="100" class="desktop clr-<?php echo $servicio->post_name?>" alt="" />
                        </a>
                    </li>        
                <?php endforeach?>
                </ul>
            </div>
		</div>
	</div>
</section>
<div class="clear separator"></div>
<?php }?>

<div class="clear separator"></div>

<!-- Fin Slider Test -->


<?php get_footer();?>