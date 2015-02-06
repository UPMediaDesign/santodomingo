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
                <div id="righted" class="inside col-lg-10 col-md-offset-2">
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
<!-- Contenido inicial -->
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
                            	<div class="panel panel-default">
                                	<div class="panel-heading clr-<?php echo $post->post_name?>" role="tab" id="aco-<?php echo $acoc?>">
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

<!-- Concejales  -->
<section class="container">
    
    <div class="col-md-8 col-md-offset-2 council">
        <?php $staffs = get_posts(array('post_type' => 'staff', 'numberposts' => 9)); ?>
        <?php $countstaffs = 0 ?>
        <?php foreach ($staffs as $staff): ?>
        <?php $countstaffs++ ?>

        <figure class="col-md-4 col-esp council">
            <?php echo get_the_post_thumbnail( $staff->ID ) ?>

            <figcaption>
                <h3><?php echo $staff->post_title ?></h3>
                <p><?php echo $staff->post_content ?></p>
            </figcaption>
        </figure>
                                
        <?php endforeach?>
    </div>
</section>

<div class="clear separator"></div>

<!-- Pestañas de contenido de Concejo Sociedad Civil -->
<section class="container">
    
	<div class="megacontainer ">
		<div class="row">
        	
            <div class="col-md-6 civilcouncil">
				<h2>Consejo de sociedad Civil</h2>
				<p>
                    <?php echo get_post_field('post_content', 235);?>
                </p>
            </div>
            <div class="col-md-6">
            	<?php echo get_the_post_thumbnail(235, 'col-6' , array('class' => 'img-responsive'))?>
            </div>
           	<div class="clear separator"></div>
            
            <div role="tabpanel">

              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#integrantes" aria-controls="integrantes" role="tab" data-toggle="tab">Integrantes del consejo</a></li>
                <li role="presentation"><a href="#funciones" aria-controls="funciones" role="tab" data-toggle="tab">Funciones del Consejo</a></li>
                <li role="presentation"><a href="#preguntas" aria-controls="preguntas" role="tab" data-toggle="tab">Preguntas Frecuentes</a></li>
              </ul>
            
              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="integrantes">
                	<?php $integrantes = get_field('integrantes' , 235 )?>
                    <?php foreach($integrantes as $integrante):?>
                    	<li><?php echo $integrante['integrante']?></li>
                    <?php endforeach;?>
                </div>
                
                <div role="tabpanel" class="tab-pane" id="funciones">
                	<?php $funciones = get_field('funciones' , 235 )?>
                    <?php foreach($funciones as $funcion):?>
                    	<li><?php echo $funcion['funcion']?></li>
                    <?php endforeach;?>
                </div>
                
                <div role="tabpanel" class="tab-pane" id="preguntas">
                	<?php $preguntas = get_field('preguntas_frecuentes' , 235 )?>
                    <?php foreach($preguntas as $pregunta):?>
                        <li>
                            <em><?php echo $pregunta['pregunta']?></em>
                            <?php echo $pregunta['respuesta']?>
                        </li>
                    <?php endforeach;?>
                </div>
              </div>
            
            </div>
                        
            
        </div>
	</div>

</section>

<!-- Galeria Alcaldes -->
<section class="megacontainer">
    <div class="col-md-12 major">
        <?php $alcaldes = get_posts(array('post_type' => 'alcaldes', 'numberposts' => 6)); ?>
        <?php $countalcaldes = 0 ?>
        <?php foreach ($alcaldes as $alcalde): ?>
        <?php $countalcaldes++ ?>

        <figure class="col-md-2 col-esp council">
            <?php echo get_the_post_thumbnail( $alcalde->ID ) ?>

            <figcaption>
               <h3><?php echo $alcalde->post_title ?></h3>
                <p><?php echo $alcalde->post_content ?></p> 
            </figcaption>

        </figure>
                                
        <?php endforeach?>
    </div>
</section>
<!-- Tabla de Staff -->
<section class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col md-6">
                    <?php the_field('tablaizquierda') ?>
            </div>
            <div class="col-md-6">
                    <?php the_field('tabladerecha')?>
            </div>
        </div>    
    </div>
</section>

<?php get_footer();?>