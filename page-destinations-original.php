<?php
/*
T Name: /Destinations/
*/
?>

<?php get_header(); ?>

  <div class="inner-banner style-6 background-block" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/travcon/destinations/destinations-bg.jpg');">
		<img class="center-image" src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/destinations/destinations-bg.jpg" alt="" style="display: none;">
		<!-- <div class="vertical-align">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<h2 class="color-white heading-text-shadow"><?php //the_title(); ?></h2>
					</div>
				</div>
			</div>
		</div> -->
	</div>

	<div class="main-wraper padd-40">
		<div class="container">
			<div class="row tlc-destinations about-sri-lanka">
				<div class="col-md-12">
					<h3 class="color-blue-2"><?php the_title(); ?></h3>
					<?php
							$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
							$args = array(
								'post_type' => 'tlc_destinations',
								'post_status' => 'publish',
								'orderby'=> 'title',
								'order' => 'ASC',
								'posts_per_page' => 8,
								'paged' => $paged
							);

							$the_query = new WP_Query( $args );
						?>
					<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="row tlc-destinations-content">
						<h3 class="tlc-destinations-heading color-blue-2 hidden-xs"><?php the_title(); ?></h3>
						<div class="col-md-4">
							<div class="tlc-destinations-bg-img" style="background-image: url('<?php the_field('destination_image'); ?>');"></div>
						</div>
						<h3 class="tlc-destinations-heading color-blue-2 visible-xs"><?php the_title(); ?></h3>
						<div class="col-md-8">
							<?php the_field('destination_description'); ?>
						</div>
					</div>
					<?php endwhile; else : ?>
							<p>There are no Destinations added yet.</p>
					<?php endif;
					wp_reset_postdata(); ?>
				</div>
			</div>
			<div class="c_pagination clearfix">
				<?php
					if (function_exists(custom_pagination)) {
						custom_pagination($the_query->max_num_pages,"",$paged);
					}
				?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>