<?php get_header()?>
<?php $var = get_queried_object();?>

<?php get_template_part('searchbar')?>

	<?php $bgid = get_field('imagen_encabezado' , 'category_'.$var->term_id)?>
	<?php $bg = wp_get_attachment_image_src( $bgid, 'wider' ); ?>

<section id="slider" style="background-image:url(<?php echo $bg[0]?>)">
	<div class="inner">
        <div class="container">
            <div class="row">
                <div class="jumbotron">
                    <h1><?php echo $var->name ?></h1>
                    <p><?php echo $var->category_description?></p>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</section>
<div class="clear separator"></div>
<main>
	<div class="megacontainer">
		<div class="row">
        
        <?php //var_dump($var)?>
        
        	<div class="col-md-3">
			
				<?php wp_nav_menu( array( 'container' => 'none', 'menu_class' => 'asidemenu' , 'menu' => 'categorias' ) ); ?>
            
            </div>
        	<div class="col-md-9">
            	<?php $ncount = 0?>
                <?php foreach ($posts as $post):?>
                <?php $ncount++?>
                	<article class="col-md-6">
                    	<a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_post_thumbnail($post->ID , 'col-6-mid' , array('class' => 'img-responsive'))?> </a>
                    	<h4><?php echo $post->post_title?></h4>
                        <p><?php echo get_the_excerpt($post->ID)?></p>
                        <footer class="row">
                            <div class="col-md-9 dte">Fecha de publicación: <?php echo get_the_date('l, j \d\e F \d\e Y' , $post->ID)?></div>
                            <div class="col-md-3"><a href="<?php echo get_permalink($post->ID)?>" class="morelink"><span class="fa fa-circle"></span> Leer más</a></div>
                        </footer>
                    </article>
                    <?php if($ncount % 2 == 0){?><div class="clear separator"></div><?php }?>
                <?php endforeach;?>
                
                <div class="clear"></div>
                <div class="navigation">
                	<?php 
                	if(function_exists('wp_paginate')) {
                        wp_paginate();
                    }
					?>
                </div>
                
            </div>
            
        </div>
	</div>
</main>

<div class="clear separator "></div>



<?php get_footer();?>