<?php
/*
Template Name: Cruise
*/
?>

<?php get_header(); ?>

<?php
	$cruise_slider_image_one = get_field('cruise_slider_image_one');
	$cruise_slider_image_two = get_field('cruise_slider_image_two');
  $cruise_slider_image_three = get_field('cruise_slider_image_three');
  $cruise_serv_prog = get_field('cruise_serv_prog');
?>
  <!-- <div class="inner-banner style-6 background-block" style="background-image: url('<?php //echo $cruise_featured_image['url']; ?>');">
		<img class="center-image" src="<?php //echo $cruise_featured_image['url']; ?>" alt="<?php //echo $cruise_featured_image['alt']; ?>" style="display: none;">
		<div class="vertical-align">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<h2 class="color-white heading-text-shadow"><?php //the_title(); ?></h2>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<div class="inner-banner no-padd">
	     <div class="arrows">
	     	 <div class="swiper-container best-slider excursion-slider" data-autoplay="3000" data-loop="1" data-speed="1500" data-center="0" data-slides-per-view="1" id="tour-slide-2">
			    <div class="swiper-wrapper">
				  <div class="swiper-slide">
				       <div class="clip">
						  <div class="bg bg-bg-chrome act" style="background-image:url(<?php echo $cruise_slider_image_one['url']; ?>)">
						  </div>
					   </div>
				  </div>
				  <div class="swiper-slide">
				       <div class="clip">
						  <div class="bg bg-bg-chrome act" style="background-image:url(<?php echo $cruise_slider_image_two['url']; ?>)">
						  </div>
					   </div>
					</div>
					<div class="swiper-slide">
				       <div class="clip">
						  <div class="bg bg-bg-chrome act" style="background-image:url(<?php echo $cruise_slider_image_three['url']; ?>)">
						  </div>
					   </div>
				  </div>				  
				</div>
				<div class="pagination poin-style-1"></div>
			 </div>
        <!-- <div class="arrow-wrapp arr-s-1">
				<div class="cont-1170">
					<div class="swiper-arrow-left sw-arrow"><span class="fa fa-angle-left"></span></div>
					<div class="swiper-arrow-right sw-arrow"><span class="fa fa-angle-right"></span></div>
				</div>
			 </div> -->
	     </div>
	 </div>

	<div class="main-wraper about-wrapper padd-40">
		<div class="container-fluid">
			<div class="row tlc-about-us tlc-cruise">
				<div class="col-md-12">
					<h3 class="color-blue-2"><?php the_field('cruise_heading'); ?></h3>
						<?php if('cruise_description'): ?>
							<?php the_field('cruise_description'); ?>
						<?php endif; ?>
				</div>
			</div>
			<div class="row include-exclude-section padd-15">
				<div class="include-exclude col-md-6">
					<h3 class="color-blue-2">Services &amp; programs provided</h3>
					<div class="include-list">
						<ul class="fa-ul">
							<?php if( have_rows('cruise_serv_prog') ): ?>
								<?php while( have_rows('cruise_serv_prog') ): the_row();
										$cruise_serv_prog_list = get_sub_field('cruise_serv_prog_list');
								?>
									<li>
											<i class="fa-li fa fa-hand-o-right"></i> <?php echo $cruise_serv_prog_list; ?>
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