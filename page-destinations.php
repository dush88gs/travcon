<?php
/*
Template Name: Destinations
*/
?>

<?php get_header(); ?>

<?php
  $dest_pg_featured_img = get_field('dest_pg_featured_img');
?>

  <div class="inner-banner style-6 background-block" style="background-image: url('<?php echo $dest_pg_featured_img['url']; ?>');">
		<img class="center-image" src="<?php echo $dest_pg_featured_img['url']; ?>" alt="<?php echo $dest_pg_featured_img['alt']; ?>" style="display: none;">
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

	<div class="main-wraper">
		<div class="container-fluid">
			<div class="tlc-destinations about-sri-lanka">
				<div class="gridder destination-gridder row">
					<h2 class="color-blue-2"><?php the_title(); ?></h2>
					<?php
							$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
							$args = array(
								'post_type' => 'tlc_destinations',
								'post_status' => 'publish',
								'orderby'=> 'title',
								'order' => 'ASC',
								'posts_per_page' => 9,
								'paged' => $paged
							);

              $the_query = new WP_Query( $args );
              $i = 1;
              $j = 1;
						?>
          <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <div class="gridder-list col-lg-4 col-md-4 col-sm-6 col-xs-12" data-griddercontent="#gridder-content-<?php echo $i; ?>">
						<h3 class="tlc-destinations-heading color-blue-2"><?php the_title(); ?></h3>
						<div class="tlc-destinations-bg-img" style="background-image: url('<?php the_field('destination_image'); ?>');"></div>
          </div>
          <?php $i++; ?>
					<?php endwhile; else : ?>
							<p>There are no Destinations added yet.</p>
					<?php endif;
          wp_reset_postdata(); ?>
				</div>
      </div>

      <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <div id="gridder-content-<?php echo $j; ?>" class="gridder-content">
				<div class="row">
					<div class="col-sm-12">
						<h3><?php the_title(); ?></h3>
						<p><?php the_field('destination_description'); ?></p>
					</div>
				</div>
      </div>
      <?php $j++; endwhile; else : ?>
          <p>There are no Destinations added yet.</p>
      <?php endif;
      wp_reset_postdata(); ?>

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