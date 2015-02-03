<?php get_header()?>

<?php get_template_part('searchbar')?>

	<?php $bgid = get_post_thumbnail_id($post->ID)?>
	<?php $bg = wp_get_attachment_image_src( $bgid, 'wider' ); ?>

<section id="slider" style="background-image:url(<?php echo $bg[0]?>)">
	<div class="inner">
        <div class="megacontainer">
            <div class="row">
            	<div class="col-md-9 col-md-offset-3">
                    <h1 class="clr-5"><?php echo $post->post_title ?></h1>
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
        	<div class="col-md-3">
			
				<?php wp_nav_menu( array( 'container' => 'none', 'menu_class' => 'asidemenu' , 'menu' => 'categorias' ) ); ?>
            
            </div>
        	<div class="col-md-8">
            	<?php echo apply_filters('the_content' , $post->post_content)?>
            </div>
            <div class="col-md-1">
            	<div class="date clr-5">
                	<div class="dday"><?php  the_date('j')?></div>
                    <div class="dmes"><?php  the_time('F')?></div>
                </div>
                <div class="miniseparator clear"></div>
                <div class="sfbook sslc">
                	<div class="btn btn-success btn-lg">
                    	<div class="fa fa-facebook fa-fw"></div>
                    </div>
                </div>
                <div class="miniseparator clear"></div>
                <div class="stwitter sslc">
                	<div class="btn btn-success btn-lg">
                		<div class="fa fa-twitter fa-fw"></div>
                	</div>
                </div>
                
            </div>
        </div>
	</div>
</main>

<div class="clear separator "></div>



<?php get_footer();?>