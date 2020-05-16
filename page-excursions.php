<?php
/*
Template Name: Excursions
*/
?>

<?php get_header(); ?>

<?php
  $exc_pg_featured_img = get_field('exc_pg_featured_img');
?>

  <div class="inner-banner style-6 background-block" style="background-image: url('<?php echo $exc_pg_featured_img['url']; ?>');">
		<img class="center-image" src="<?php echo $exc_pg_featured_img['url']; ?>" alt="<?php echo $exc_pg_featured_img['alt']; ?>" style="display: none;">
		<!-- <div class="vertical-align">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<h2 class="color-white heading-text-shadow">Holiday Packages</h2>
					</div>
				</div>
			</div>
		</div> -->
	</div>

	<?php
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => 'tlc_excursions',
			'post_status' => 'publish',
			'orderby'=> 'title',
			'order' => 'ASC',
			'posts_per_page' => 9,
			'paged' => $paged
		);

		$the_query = new WP_Query( $args );
	?>

	<div class="main-wraper">
		<div class="container-fluid">
			<div class="row tlc-holiday-packages">
				<div class="col-sm-12">
					<h3 class="color-blue-2">Choose your dream excursion</h3>
				</div>
			</div>
			<div class="excursions tour-item-grid row">
			<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="tour-item style-4">
					<?php
						$excursion_details = get_field('excursion_details');
						$excursion_grid_image = $excursion_details['excursion_grid_image'];
					?>
						<div class="radius-top">
							<img src="<?php echo $excursion_grid_image['url']; ?>" alt="<?php echo $excursion_grid_image['alt']; ?>">
						</div>
						<div class="tour-desc bg-white">
              <h4><a class="tour-title color-dark-2 link-blue-2" href="<?php echo get_post_permalink(); ?>"><?php the_title(); ?></a></h4>
							<a href="<?php echo get_post_permalink(); ?>" class="c-button bg-red-3 hv-red-3-o delay-2 b-40"><span>view more</span></a>
						</div>
					</div>
				</div>
				<?php endwhile; else : ?>
						<p>There are no Excursion Packages exist</p>
				<?php endif;
				wp_reset_postdata(); ?>	
			</div>
			<?php if (function_exists(custom_pagination)): ?>
				<?php if ($the_query->max_num_pages > 1): ?>
					<div class="c_pagination clearfix">
							<?php
								custom_pagination($the_query->max_num_pages,"",$paged);
							?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>

<?php get_footer(); ?>