<?php
/**
 * Footer
 *
 * @package WordPress
 * @subpackage Visual Composer Starter
 * @since Visual Composer Starter 1.0
 */

if ( visualcomposerstarter_is_the_footer_displayed() ) : ?>
	<?php visualcomposerstarter_hook_before_footer(); ?>
	<footer id="footer">	
		<div class="row">
			<div class="container">
				<div class="col-md-4 text-center redesf">
					<a href="<?php echo site_url(); ?>/aviso-de-privacidad">Aviso de privacidad</a>
				</div>
				<div class="col-md-4 text-center redesf">
					
					
					Sitio desarrollado por <a href="https://estrategasdigitales.com/">Estrategas Digitales</a>
					
					
				</div>
				
				<div class="col-md-4 text-center redesf">
					<span>2020. Nanoxen. Todos los derechos reservados</span>
						
				</div>
				
			</div>
		</div>
		
	</footer>






<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>


<script type="text/javascript">
	jQuery(document).ready(function ($) {

 
 var $container = $('#isotope-list'); //The ID for the list with all the blog posts
 $container.isotope({ //Isotope options, 'item' matches the class in the PHP
 filter: '.item',
 itemSelector : '.item', 
   layoutMode : 'masonry'
 });
 
 //Add the class selected to the item that is clicked, and remove from the others
 var $optionSets = $('#filters'),
 $optionLinks = $optionSets.find('a');
 
 $optionLinks.click(function(){
 var $this = $(this);
 // don't proceed if already selected
 if ( $this.hasClass('selected') ) {
   return false;
 }
 var $optionSet = $this.parents('#filters');
 $optionSets.find('.selected').removeClass('selected');
 $this.addClass('selected');
 
 //When an item is clicked, sort the items.
 var selector = $(this).attr('data-filter');
 $container.isotope({ filter: selector });
 
 return false;
 });
 
});
</script>

	<?php visualcomposerstarter_hook_after_footer(); ?>
<?php endif; ?>
<?php wp_footer(); ?>



</body>
</html>




