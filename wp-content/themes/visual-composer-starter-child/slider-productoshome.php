<div class="row flex-list">


<ul id="filters" >
				
			     <?php 

			$args = array('taxonomy' => 'product_cat'); // Or get queried object for ID
			$categories = get_categories( $args );
			$count = count($categories); //How many are they?
			if ( $count > 0 ){  //If there are more than 0 terms
			echo "<li><a style='color:#000000;' href='#' data-filter='.todos' class='selected'>Todos</a></li>\n";
		    foreach ( $categories as $term ) {  //for each term:
		    	if ($term->count>0) {
		    		
				echo "<li><a style='color:#000000;' href='#' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";
					
			}

			}
			}
			?>
			</ul>

<div id="isotope-list">
<?php 
    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
    );
    $query = new WP_Query($args);
    foreach($query->posts as $p):
    $pid = $p->ID;
    $product = wc_get_product($pid);
    


     $termsArray = get_the_terms( $p->ID, "product_cat" );  //Get the terms for this particular item
			 $termsString = ""; //initialize the string that will contain the terms
			 foreach ( $termsArray as $term ) { // for each term 
			 $termsString .= $term->slug.' '; //create a string that has all the slugs 
			 }
?>

<div class="col-sm-6 col-md-3 col-lg-3 productohome <?php echo $termsString; ?> item todos"> 
    <a class="contenedorprodc" href="<?php echo get_permalink($pid); ?>">
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $pid  ), 'single-post-thumbnail' );?>
    <img src="<?php  echo $image[0]; ?>">
        <div class="infoproducto">
            <p class="titulop"><?php echo $p->post_title; ?></p>
            <p class="precioprodc"><?php echo $product->get_price_html(); ?></p>
        </div>
        <?php
        
        ?>
        <span class="botonhm">VER PRODUCTO</span>
    </a>
</div>


<?php endforeach; ?>
</div>
</div>
