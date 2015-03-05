<?php
/*
Template Name: Municipio
*/
?>
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
    <?php $bg = wp_get_attachment_image_src( $bgid, 'wider' ); ?>
        <div class="item <?php if($count == 1){?>active<?php }?>" style="background-image:url(<?php echo $bg[0]?>);">
            <div class="col-md-3 col-md-push-9 clr-2 base">
                <div class="inside col-lg-10 col-md-offset-2">
                    <div class="clear"></div>
                    <h2><a href="<?php echo get_permalink($post->ID)?>"><?php echo $post->post_title?></a></h2>
                    <p><?php echo get_the_excerpt($post->ID)?></p>
                   
                </div>
            </div>
            <div class="col-md-1 col-md-offset-6 clr-2 skk desktop"></div>
            <div class="clear"></div>
        </div>
    <?php array_push($idds , $post->ID)?>
	<?php }?>
    <?php endforeach;?>
    
  	</div>
 
</div>
    
</section>

<?php get_footer();?>