<?php
/*
Template Name: Terms and Conditions
*/
?>

<?php get_header(); ?>

<?php
  $terms_featured_img = get_field('terms_featured_img');
?>

  <div class="inner-banner style-6 background-block" style="background-image: url('<?php echo $terms_featured_img['url']; ?>');">
		<img class="center-image" src="<?php echo $terms_featured_img['url']; ?>" alt="<?php echo $terms_featured_img['alt']; ?>" style="display: none;">
	</div>

	<div class="main-wraper about-wrapper padd-40">
		<div class="container-fluid">
			<div class="row include-exclude-section padd-15">
				<div class="include-exclude col-md-12">
					<h3 class="color-blue-2">Terms &amp; Conditions</h3>
					<div class="include-list">
						<ul class="fa-ul">
							<?php if( have_rows('terms_conditions') ): ?>
								<?php while( have_rows('terms_conditions') ): the_row();
										$terms_list = get_sub_field('terms_list');
								?>
									<li>
											<i class="fa-li fa fa-hand-o-right"></i> <?php echo $terms_list; ?>
									</li>
								<?php endwhile; ?>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>

		</div>
	</div>

<?php get_footer(); ?>