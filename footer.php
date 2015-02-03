<footer id="footer" class="clr-2">
	<div class="container">
		<div class="row">
       		<div class="col-md-4 info">
            	Plaza del Cabildo s/n Rocas de Santo Domingo, Chile.<br />
                Fono: (35)2200610 Fax: (35)2441726<br />
                <br />
                Envíenos un correo electrónico con sus inquietudes a: <br />
                <br />
                <a href="#">secretaria@santodomingo.cl</a>
            </div>
            
       		<div class="col-md-8">
				<?php wp_nav_menu( array( 'container' => 'none' , 'theme_location' => 'third' ) ); ?>
            </div>
                        
         
        </div>
	</div>
</footer>
<section id="copy" class="clr-1">
	<div class="container">
		<div class="row">
        	<div class="col-xs-6 col-md-offset-3"><img src="<?php bloginfo('template_directory')?>/images/bottom.png" class="img-responsive" alt="" /></div>
        </div>
	</div>
</section>

</body>
<?php wp_footer()?>
</html>