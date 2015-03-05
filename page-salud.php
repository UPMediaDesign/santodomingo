<?php
/*
Template Name: Salud
*/
?>
<?php get_header()?>

<?php get_template_part('searchbar')?>

<div class="clear separator"></div>

<main id="turismo">
	<div class="megacontainer">
		<div class="row">
        	
            <figure class="col-md-12 col-esp">
              
              <?php $saluds = get_field('titular_salud')?>
              
                  <a href="<?php echo get_permalink($saluds->ID) ?>"><?php echo get_the_post_thumbnail($saluds->ID , 'wider' , array('class' => 'img-responsive')); ?></a>
                  <figcaption class="health">
                    <img src="<?php bloginfo('template_directory')?>/images/health.png" alt="">
                    <a href="<?php echo get_permalink($saluds->ID) ?>"><p><?php echo $saluds->post_title ?></p></a>
                  </figcaption>
                
            </figure>

    </div>
	</div>
</main>

<section class="megacontainer">
  <div class="clear separator"></div>
        <div class="row">

          <aside class="col-md-3 col-esp">
            <div class="postas col-md-12 col-xs-6">
              
                <a href="<?php echo get_permalink(174)?>"><div class="circle clr-2"></div></a>
                <h3><a href="<?php echo get_permalink(174)?>">Postas Rurales</a></h3>
                <p>Consecutir adipicing elit</p>

            </div>
            <div class="cesfam col-md-12 col-xs-6">
              <a href="<?php echo get_permalink(176)?>"><div class="circle clr-14"></div></a>
              <h3><a href="<?php echo get_permalink(176)?>">Cesfam</a></h3>
              <p>Consecutir adipicing elit</p>
            </div>
          </aside>

          <div class="col-md-9">
            <article class="health-content col-md-12">
              <?php the_content(); ?>
            </article>

            <div class="clear separator"></div>

            <section class="health-prefoot col-md-12">
              <div class="row">
              <h2>Noticias</h2>

              <?php $posts = get_posts(array( 'post_type' => 'post', 'servicios' => 'salud', 'numberposts' => 2 ))?>
                <?php $count = 0?>
                <?php foreach($posts as $post):?>
                <?php $count++?>

                <div class="col-md-6 col-sm-6 pright10 pd0 bootpd15mob">
                  <a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_post_thumbnail($post->ID , 'minibox' , array('class' => 'img-responsive'))?></a>
                  <h3><?php echo get_the_title($post->ID)?></h3>
                  <p><?php echo get_the_excerpt($post->ID)?></p>
                </div>
                
              <?php endforeach;?>
              </div>
            </section>
          </div>
        </div>
        <div class="clear separator"></div>

</section>


<?php get_footer();?>