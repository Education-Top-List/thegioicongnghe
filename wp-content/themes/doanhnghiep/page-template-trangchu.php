
<?php 
/*
Template Name: page-template-trangchu
*/
get_header(); 
?>	

<div class="page-wrapper">

	<div class="g_content">
		
		<div class="content_left">
			<div class="banner_idx">
				<div class="container">
					<div class="row">
						<div class="col-sm-9">
							<?php echo do_shortcode('[metaslider id="312"]'); ?>
						</div>
					</div>
				</div>
			</div>

			<div class="product_area_index">
				<div class="container">
					<?php
						  $taxonomy     = 'product_cat';
						  $orderby      = 'name';  
						  $show_count   = 0;      // 1 for yes, 0 for no
						  $pad_counts   = 0;      // 1 for yes, 0 for no
						  $hierarchical = 0;      // 1 for yes, 0 for no  
						  $title        = '';  
						  $empty        = 0;
						  $args = array(
						  	'taxonomy'     => $taxonomy,
						  	'orderby'      => $orderby,
						  	'show_count'   => $show_count,
						  	'pad_counts'   => $pad_counts,
						  	'hierarchical' => $hierarchical,
						  	'title_li'     => $title,
						  	'hide_empty'   => $empty,
						 
						  );
						  $all_categories = get_categories( $args );
						  ?>
						  <div class="loop_post_category_idx">
						  	<?php foreach ($all_categories as $cat) { ?>
						  		<?php   	
						  		if($cat->category_parent == 0) {
						  			$category_id = $cat->term_id;       
						  			?>
						  			
						  			<div class="item_loop_post_category_idx">
						  				<div class="top_menu_list_product">
						  					<div class="parent_catgories_idx">
						  						<?php echo '<a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .' <span>('. $cat->count .')</span></a>';?>
						  					</div>
						  					<?php
						  					$args2 = array(
						  						'taxonomy'     => $taxonomy,
						  						'child_of'     => 0,
						  						'parent'       => $category_id,
						  						'orderby'      => $orderby,
						  						'show_count'   => $show_count,
						  						'pad_counts'   => $pad_counts,
						  						'hierarchical' => $hierarchical,
						  						'title_li'     => $title,
						  						'hide_empty'   => $empty
						  					);
						  					$sub_cats = get_categories( $args2 );
						  					if($sub_cats) {
						  						?>
						  						<ul class="sub_product_category">
						  							<?php
						  							foreach($sub_cats as $sub_category) {
						  								echo  '<li><a href="'.get_term_link($sub_category->slug, 'product_cat')  .'">'.$sub_category->name.' <span class="count_pd_subpd">('. $sub_category->count .')</span>  </a></li>' ;
						  							}?>
						  						</ul>
						  						<?php   
						  					}
						  					?>
						  				</div>
						  				<?php 
						  				$args_list_product_category = array(
						  					'posts_per_page' => 4,
						  					'tax_query' => array(
						  						array(
						  							'taxonomy' => 'product_cat',
						  							'field' => 'slug',
						  							'terms' => $cat->slug
						  						)
						  					),
						  					'post_type' => 'product',
						  					'orderby' => 'title,'
						  				);
						  				$products = new WP_Query( $args_list_product_category );
						  				?>
						  				<ul class="list_product_category row">

						  					<?php 
						  					while ( $products->have_posts() ) { $products->the_post();global $product;
						  						?>
						  						<li class="list_item_product col-sm-3">
						  							<div class="product_inner">
						  								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $products->post->ID ), 'single-post-thumbnail' );?>
						  								<figure class="thumbnail" style="background:url(<?php  echo $image[0]; ?>);" class="thumb_product" >
						  									<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

						  										<?php woocommerce_show_product_sale_flash( $post, $product ); ?>
						  									</a>
						  								</figure>

						  								<div class="product_meta">
						  									<h3><a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>"><?php the_title(); ?></a></h3>

						  									<div class="price">
						  										<span>
						  											<?php echo $product->get_price_html(); ?>
						  										</span>      
						  									</div>
						  									<?php woocommerce_template_loop_add_to_cart( $products->post, $product ); ?>
						  								</div>
						  								
						  							</div>

						  						</li>
						  						<?php
						  					}
						  					?>
						  				</ul>
						  			</div>
						  			<?php 
						  		} //endif
						  	}//end foreach ?>
						  </div>

						 
						</div>

					</div>
				</div><!-- content_left -->

			</div>

		</div>


		<?php get_footer(); ?>




