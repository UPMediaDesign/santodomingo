<?php
/*
Template Name: Contacto
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

<section id="subscribe">
	<div class="container">
		<div class="row">
        	<div class="col-md-12 form">
                <div class="row"><?php echo do_shortcode('[contact-form-7 id="9" title="Formulario de contacto 1"]')?></div>
            </div>
        </div>
	</div>
</section>


<?php get_footer();?>