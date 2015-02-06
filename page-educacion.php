<?php
/*
Template Name: Educación
*/
?>
<?php get_header()?>

<?php get_template_part('searchbar')?>

<div class="clear separator"></div>

<main id="turismo">

	<div class="megacontainer">
		<div class="row">
        	
            <figure class="col-md-12 col-esp">
              
              <?php $teachs = get_field('titular_educacion')?>
              
                  <a href="<?php echo get_permalink($teachs->ID) ?>"><?php echo get_the_post_thumbnail($teachs->ID , 'wider' , array('class' => 'img-responsive')); ?></a>
                  <figcaption class="teach">
                    <img src="<?php bloginfo('template_directory')?>/images/teach.png" alt="">
                    <a href="<?php echo get_permalink($teachs->ID) ?>"><p><?php echo $teachs->post_title ?></p></a>
                  </figcaption>
                
            </figure>

    	</div>
	</div>

	<div class="clear separator"></div>

	<div class="megacontainer">
		<div class="row">
			<!-- Pestañas de Información -->
			<div class="col-md-9">
				<div role="tabpanel">

					  	<?php wp_nav_menu( array( 'container' => 'none', 'menu_class' => 'nav nav-tabs col-md-12'  , 'menu' => 'educacion' ) ); ?>

					  	<!-- Tab panes -->

						<div class="tab-content">
						    <div role="tabpanel" class="tab-pane active teachtab" id="home">
								<?php the_content(); ?>
						    </div>    
						</div>

				</div>				
			</div>

			<!-- Sidebar de Noticias -->
			<div class="col-md-3 teachnews">
				<div class="row">
	              <h2>Noticias</h2>

	              <?php $posts = get_posts(array( 'post_type' => 'post', 'servicios' => 'educacion', 'numberposts' => 2 ))?>
	                <?php $count = 0?>
	                <?php foreach($posts as $post):?>
	                <?php $count++?>

<!--  					<?php //var_dump($post); ?>  -->

	                <div class="col-md-12 col-sm-6 pright10 pd0 bootpd15mob">
	                  <a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_post_thumbnail($post->ID , 'minibox' , array('class' => 'img-responsive'))?></a>
	                  <h3><?php echo get_the_title($post->ID)?></h3>
	                  <p><?php echo substr($post->post_content , 0, 85)?>...</p>
	                </div>
	                
	              <?php endforeach;?>
              </div>
			</div>

		</div>
	</div>

</main>



<?php get_footer();?>