<!-- <?php
?>
<style>
#talento img{
	 -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
    filter: grayscale(100%);
}
</style>
  <header class="scroll menuresponinterior" style="background-color:<?php echo $colormenu; ?>;text-color:#000000 !important;"> 
    <nav role="tablist" class="menusuptal">	  
	    <a role="presentation" class="active" href="#talento" aria-controls="talento" role="tab" data-toggle="tab">TALENTO BOBO</a>
	    <a role="presentation" href="#internacional" aria-controls="internacional" role="tab" data-toggle="tab">INTERNACIONAL</a>  
	    <a role="presentation" href="#nuevo" aria-controls="nuevo" role="tab" data-toggle="tab">NUEVO</a>	  
    </nav>
</header>
<div class=" contendtalent2" style="padding-bottom: 70px;text-align: center;">
	<div class="tab-content">  
	    <div role="tabpanel" class="tab-pane active col-xs-12 col-sm-12 col-md-12 col-lg-12" id="talento">
	    	<h1>TALENTO BOBO</h1>
	    	<?php echo do_shortcode( '[ajax_load_more repeater="template_1" post_type="posttalento" category="talentobobo" button_loading_label="CARGANDO" scroll="true" posts_per_page="12" button_label="Ver Más" order="ASC" orderby="title"]' ); ?>                
	    </div>	
	    <div role="tabpanel" class="tab-pane col-xs-12 col-sm-12 col-md-12 col-lg-12" id="internacional">
	    	<h1>INTERNACIONAL</h1>
	    	<?php echo do_shortcode( '[ajax_load_more post_type="posttalento" category="internacional" button_loading_label="CARGANDO" scroll="false" posts_per_page="8" button_label="Ver Más"]' ); ?>
	    </div>		
	    <div role="tabpanel" class="tab-pane col-xs-12 col-sm-12 col-md-12 col-lg-12" id="nuevo">
	   		<h1>NUEVO</h1>
	   		<?php echo do_shortcode( '[ajax_load_more post_type="posttalento" category="nuevo" button_loading_label="CARGANDO" scroll="false" posts_per_page="8" button_label="Ver Más"]' ); ?>
	    </div>
	</div>
</div>
 -->

 <?php
?>

<div class="row flex-list">
	    	<?php //echo do_shortcode( '[ajax_load_more repeater="template_1" post_type="posttalento" category="talentobobo" button_loading_label="CARGANDO" scroll="true" posts_per_page="12" button_label="Ver Más"]' ); ?>                
	    
	    	<!-- <ul id="filters" >
			    <li><a style="color:#000000;" href="#" data-filter="*" class="selected">TODOS</a></li>
				 <?php 
				 $terms = get_terms("clasitalento"); // get all categories, but you can use any taxonomy
				 $count = count($terms); //How many are they?
				 if ( $count > 0 ){  //If there are more than 0 terms
				 foreach ( $terms as $term ) {  //for each term:
				 if ($term->count>0) {
				 		 echo "<li><a style='color:#000000;' href='#' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";
				 	}	
				
				 //create a list item with the current term slug for sorting, and name for label
				 }
				 } 
				 ?>
			</ul> -->

			<ul id="filters" >
				<!-- <li><a style="color:#000000;" href="#" data-filter="*" class="selected">TODOS</a></li>
				 -->
			     <?php 

			$args = array('taxonomy' => 'product_cat'); // Or get queried object for ID
			$categories = get_categories( $args );
			$count = count($categories); //How many are they?
			if ( $count > 0 ){  //If there are more than 0 terms
			echo "<li><a style='color:#000000;' href='#' data-filter='.item' class='selected'>Todos</a></li>\n";
		    foreach ( $categories as $term ) {  //for each term:
		    	if ($term->count>0) {
		    		
				echo "<li><a style='color:#000000;' href='#' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";
					
			}

			}
			}
			?>
			</ul>

			<?php $the_query = new WP_Query( array( 'post_type' => 'product' ) ); //Check the WP_Query docs to see how you can limit which posts to display ?>
			<?php if ( $the_query->have_posts() ) : ?>
			    <div id="isotope-list">
			    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
			 $termsArray = get_the_terms( $post->ID, "product_cat" );  //Get the terms for this particular item
			 $termsString = ""; //initialize the string that will contain the terms
			 foreach ( $termsArray as $term ) { // for each term 
			 $termsString .= $term->slug.' '; //create a string that has all the slugs 
			 }
			 ?> 
			 <div class="col-sm-6 col-md-3 col-lg-3 productohome <?php echo $termsString; ?> item"> <?php // 'item' is used as an identifier (see Setp 5, line 6) ?>
			 

<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

 <?php if (! has_post_thumbnail() ) { ?>
<img  class="sinimagen1" src="<?php echo get_template_directory_uri(); ?>/images/default245.png">
<?php
} ?>
   <?php if ( has_post_thumbnail() ) { the_post_thumbnail(array(400,400));
}?>
<div class="contenedortituloartista">
<span><?php the_title(); ?> <img class="flechaficha" src="<?php echo get_template_directory_uri(); ?>/images/arrow_go_white.png">
</span>

</div>
</a>



			 </div> <!-- end item -->
			    <?php endwhile;  ?>
			    </div> <!-- end isotope-list -->
			<?php endif; ?>







</div>
