<?php
/*
Template Name: Historia
*/
?>
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

<!-- Slider Gallery -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">


          <?php $gallery = get_field('slide_gallery') ?>

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators page">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>
                
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                
                <?php $imcount = 0 ?>
                <?php foreach($gallery as $image): ?>
                <?php $imcount++ ?>

                <?php if($imcount == 1){?>
                <div class="item <?php if($imcount == 1){echo 'active';} ?>">
                <?php } ?>

                  <div class="col-md-3 col-xs-3">
                      <a href="<?php echo $image['url'] ?>" rel="shadowbox[gal]">
                        <img src="<?php echo $image['sizes']['midbox'] ?>" class="img-responsive" alt="...">
                      </a>
                  </div>
                  
                  <?php if($imcount % 4 == 0 && $imcount < 12){?>
                    </div><div class="item">
                  <?php } ?>

                <?php endforeach; ?>

                </div>

                

              </div>

            </div>
        </div>
    </div>
    <div class="clear separator"></div>
</div>
<!-- Fin slider gallery -->

<div class="clear separator"></div>
<div class="clear separator"></div>

<!-- Fin Slider Test -->


<?php get_footer();?>