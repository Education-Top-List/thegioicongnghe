
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
								<?php echo do_shortcode('[metaslider id="315"]'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="product_area_index">
					<div class="container">
						<div class="row">
						<div class="col-md-3 col-sm-3">
							<h3 class="title_list_catpd">Danh mục sản phẩm <i></i></h3>
							<?php get_template_part('includes/product/list_product_categories'); ?>
						</div>
						<div class="col-md-9 col-sm-9">
							<h2 class="title_top_pdcat"><span>Sản phẩm mới nhất</span></h2>
							<div class="row">
								<ul class="list_products">
									<?php
									$args = array( 'post_type' => 'product', 'posts_per_page' => 9, 'orderby' => 'date' );
									$loop = new WP_Query( $args );
									while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
										<li class="col-md-4 col-sm -4 list_item_product">    
											<div class="product_inner">
												<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
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
												</div>
												<?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
											</div>
											
										</li>
									<?php endwhile; ?>
									<?php wp_reset_query(); ?>
								</ul><!--/.products-->
							</div>
						</div>
					</div>
					</div>
					
				</div>
			</div><!-- content_left -->

		</div>

	</div>


	<?php get_footer(); ?>




