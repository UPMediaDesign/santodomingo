<?php
/*
Template Name: Servicios
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

<section class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
	                <?php $servicios = get_posts(array('post_type' => 'page' , 'post_parent' => 89  , 'numberposts' => -1 ))?>
	            
	                <?php foreach($servicios as $servicio):?>
	                	<div class="col-md-4">
	                        <a href="<?php echo get_permalink($servicio->ID)?>">
	                            <img src="<?php echo get_bloginfo('template_directory')?>/images/<?php echo $servicio->post_name?>.png" width="100" class="desktop service clr-<?php echo $servicio->post_name?>" alt="" />
	                        </a>
	                        <h3 class="service"><?php echo $servicio->post_title?></h3>
	                    </div>        
	                <?php endforeach?>
	                
	            </div>
			</div>
</section>

<div class="clear separator"></div>

<?php get_footer();?>