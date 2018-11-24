			<?php
			/**
			 * Featured Content area in Front Page Template.
			 *
			 * @package Toivo Lite
			 */

				$toivo_featured_area = esc_attr( get_theme_mod( 'front_page_featured', 'blog-posts' ) );
				
				if( 'blog-posts' == $toivo_featured_area ) :
					
					/* Blog Posts Query. */
					$featured_content = new WP_Query( apply_filters( 'toivo_lite_blog_posts_arguments', array(
					'post_type'      => 'post',
					'posts_per_page' => 4,
					'no_found_rows'  => true,
					) ) );
					
				elseif( 'portfolios' == $toivo_featured_area ) :
					
					/* Portfolios Query. */
					$featured_content = new WP_Query( apply_filters( 'toivo_lite_portfolio_arguments', array(
					'post_type'      => 'jetpack-portfolio',
					'orderby'        => 'rand',
					'posts_per_page' => 4,
					'no_found_rows'  => true,
					) ) );
					
				else :
				
					/* Child Pages Query. */
					$featured_content = new WP_Query( apply_filters( 'toivo_lite_child_pages_arguments',array(
						'post_type'      => 'page',
						'orderby'        => 'menu_order',
						'order'          => 'ASC',
						'post_parent'    => $post->ID,
						'posts_per_page' => 500,
						'no_found_rows'  => true,
					) ) );
					
				endif; // End check for featured content.
			?>

			<?php if ( $featured_content->have_posts() ) : ?>

				<div id="featured-area" class="featured-area <?php echo $toivo_featured_area; ?>-area">			
					<div class="featured-wrapper <?php echo $toivo_featured_area; ?>-wrapper">

						<?php while ( $featured_content->have_posts() ) : $featured_content->the_post(); ?>

							<div class="featured-area-grid <?php echo $toivo_featured_area; ?>-grid">
								<?php
									if( 'blog-posts' == $toivo_featured_area ) :
										get_template_part( 'content', ( post_type_supports( get_post_type(), 'post-formats' ) ? get_post_format() : get_post_type() ) );
									elseif( 'portfolios' == $toivo_featured_area ) :
										get_template_part( 'content', 'jetpack-portfolio' );
									else :
										get_template_part( 'content', 'child-pages' );
									endif;
								?>
							</div><!-- .featured-area-grid -->

						<?php endwhile; ?>

					</div><!-- .featured-wrapper -->
				</div><!-- #featured-area -->

			<?php
				endif; // End loop.
				wp_reset_postdata(); // Reset post data.
			?>