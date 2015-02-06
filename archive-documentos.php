<?php get_header()?>
<?php $var = get_queried_object();?>

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
                                
                    <?php if(is_tax){?>
                    	<h1><?php echo $var->name ?></h1>
                    <?php }else{?>
                    	<h1><?php echo $var->label ?></h1>
                    <?php }?>
                    
                    <p><?php //echo get_the_excerpt()?>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel aliquet magna. Maecenas sed nisl blandit, lacinia libero in, lobortis odio.</p>
                    <img src="<?php bloginfo('template_directory')?>/images/transparencia-horizontal.png" alt="" />
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</section>
<div class="clear separator"></div>

<?php //$docs = get_posts(array('post_type' => 'documentos' , 'servicios' => $post->post_name ,'numberposts' => 3))?>

<section id="documentos">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
            <div class="row">
            	
                <div class="col-md-12">
                	<div class="form-group">
                    
                    </div>
                    <form method="get" id="searchform" action="<?php echo get_post_type_archive_link('documentos')?>">
                    	
                        
                        <div class="form-group">
                        	<div class="input-group">
                          		<div class="input-group-addon"><span class="fa fa-search"></span></div>
                          		<input type="text" class="form-control input-lg" placeholder="Buscador de documentos..." value="" name="s" id="s">
                                
                          
                          
                        	</div>
                        	
                       </div>
                    </form>
                    <div class="clear miniseparator"></div>
                    
                    <button type="button" class="btn btn-primary dropdown-toggle btn-block" data-toggle="dropdown" aria-expanded="false">
                     	Ver documentos por Servicio
                     	<span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                    	<?php $servicios = get_terms('servicios')?>
                        <?php foreach($servicios as $servicio):?>
                        	<li><a href="<?php echo get_post_type_archive_link('documentos')?>/?servicios=<?php echo $servicio->slug?>"><?php echo $servicio->name?></a></li>
                        <?php endforeach;?>
                    </ul>
                    
                </div>
                
                
                
            	<?php /* ?>
                <div class="col-xs-8">
                    <h3>Documentos disponibles</h3>
                </div>
                <div class="col-xs-4">
                    <h5><a href="" class="view-all btn btn-sm btn-primary btn-block">Ver todos los documentos</a></h5>
                </div>
                <?php  */?>
                
            </div>
            <div class="clear separator border"></div>
            	<?php foreach($posts as $doc):?>
                	<?php $t = wp_get_post_terms($doc->ID , 'servicios')?>
                	<article>
                        <div class="row">
                            <div class="col-md-1 col-esp">
                                <a href="<?php echo wp_get_attachment_url(get_field('documento',$doc->ID))?>" class="ico-link clr-<?php echo $t[0]->slug?>">
                                	<span class="fa fa-lg <?php echo get_icon_for_attachment(get_field('documento',$doc->ID))?>"></span>
                                </a> 
                                <?php //echo get_type_for_attachment(get_field('documento',$doc->ID))?>
                            </div>
                            <div class="col-md-11">
                                <h4><a href="<?php echo wp_get_attachment_url(get_field('documento',$doc->ID))?>"><?php echo $doc->post_title?></a></h4>
                                <p><?php echo $doc->post_content?></p>
                                <footer class="row">
                                <div class="col-md-9 dte">Fecha de publicación: <?php echo get_the_date('l, j \d\e F \d\e Y' , $doc->ID)?></div>
                                <div class="col-md-3"><a href="<?php echo wp_get_attachment_url(get_field('documento',$doc->ID))?>" class="morelink"><span class="fa fa-circle"></span> Leer más</a></div>
                            </footer>
                            </div>
                        </div>
                        <div class="clear border separator"></div>
                    </article>
                	
                <?php endforeach;?>
                <div class="row">
                    <div class="col-xs-8">
                        <h3>&nbsp;</h3>
                    </div>
                    <div class="col-xs-4">
                        <h5><a href="<?php echo get_post_type_archive_link('documentos')?>" class="view-all btn btn-sm btn-primary btn-block">Ver todos los documentos</a></h5>
                    </div>
            	</div>
                
            </div>
		</div>
	</div>
</section>
<div class="clear separator"></div>


<?php get_footer();?>