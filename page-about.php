<?php
/*
Template Name: About Us
*/
?>

<?php get_header(); ?>

<?php
	$about_slider_image_one = get_field('about_slider_image_one');
	$about_slider_image_two = get_field('about_slider_image_two');
  $about_slider_image_three = get_field('about_slider_image_three');
  $about_description = get_field('about_description');
?>
    <!-- <div class="inner-banner style-6 background-block" style="background-image: url('<?php //echo $about_slider_image_one['url']; ?>');">
		<img class="center-image" src="<?php //echo $about_slider_image_one['url']; ?>" alt="<?php //echo $about_slider_image_one['alt']; ?>" style="display: none;">
		<div class="vertical-align">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<h2 class="color-white heading-text-shadow"><?php //the_title(); ?></h2>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<div class="tlc-about-slider no-padd">
	     <div class="arrows">
	     	 <div class="swiper-container best-slider" data-autoplay="3000" data-loop="1" data-speed="1500" data-center="0" data-slides-per-view="1" id="tour-slide-2">
			    <div class="swiper-wrapper">
				  <div class="swiper-slide">
				       <div class="clip">
						  <div class="bg bg-bg-chrome act" style="background-image:url(<?php echo $about_slider_image_one['url']; ?>)">
						  </div>
					   </div>
				  </div>
				  <div class="swiper-slide">
				       <div class="clip">
						  <div class="bg bg-bg-chrome act" style="background-image:url(<?php echo $about_slider_image_two['url']; ?>)">
						  </div>
					   </div>
					</div>
					<div class="swiper-slide">
				       <div class="clip">
						  <div class="bg bg-bg-chrome act" style="background-image:url(<?php echo $about_slider_image_three['url']; ?>)">
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

	<div class="main-wraper about-wrapper">
		<div class="container-fluid">
			<div class="row tlc-about-us">
				<div class="col-md-12">
					<h3 class="color-blue-2"><?php the_field('about_heading'); ?></h3>
					<?php echo $about_description; ?>
				</div>
			</div>
		</div>
	</div>

	<!-- <div class="main-wraper about-wrapper padd-40">
		<div class="container-fluid">
			<div class="row tlc-team-title">
				<div class="col-md-12">
					<h3 class="color-blue-2">Our Team</h3>
				</div>
			</div>
			<div class="row">
				<?php //if( have_rows('team_members') ): ?>
					<?php //while( have_rows('team_members') ): the_row(); 
					//	$member_name = get_sub_field('member_name');
					//	$member_role = get_sub_field('member_role');
					//	$member_image = get_sub_field('member_image');
					//	$member_description = get_sub_field('member_description');
					?>
				<div class="col-md-4 col-sm-6">
					<div class="tlc-card">
						<img src="<?php //echo $member_image['url']; ?>" alt="<?php //echo $member_image['alt']; ?>" style="width:100%">
						<div class="tlc-team-info">
							<h3><?php //echo $member_name; ?></h3>
							<h6><?php //echo $member_role; ?></h6>
							<p><?php //echo $member_description; ?></p>
						</div>
					</div>
				</div>				
					<?php //endwhile; ?>
				<?php //endif; ?>
			</div>
		</div>
  </div> -->
  
  <div class="main-wraper">
		<div class="container-fluid">
			<div class="tlc-destinations about-sri-lanka">
				<div class="gridder team-gridder row">
          <div class="tlc-team-title">
            <h3 class="color-blue-2">Our Team</h3>
          </div>
          <?php $i = 1; ?>
          <?php $j = 1; ?>
					<?php if( have_rows('team_members') ): ?>
					<?php while( have_rows('team_members') ): the_row(); 
						$member_name = get_sub_field('member_name');
						$member_role = get_sub_field('member_role');
						$member_image = get_sub_field('member_image');
					?>
          <div class="gridder-list col-lg-5ths col-md-3 col-sm-6 col-xs-12" data-griddercontent="#gridder-content-<?php echo $i; ?>">
            <div class="tlc-card clearfix">
              <img src="<?php echo $member_image['url']; ?>" alt="<?php echo $member_image['alt']; ?>" style="width:100%">
              <div class="tlc-team-info equal-member">
                <h4><?php echo $member_name; ?></h4>
                <h6><?php echo $member_role; ?></h6>
              </div>
            </div>
          </div>
          <?php $i++; ?>
					<?php endwhile; else : ?>
							<p>There are no Team Members added yet.</p>
					<?php endif; ?>
				</div>
      </div>

      <?php if( have_rows('team_members') ): ?>
      <?php while( have_rows('team_members') ): the_row(); 
        // $member_name = get_sub_field('member_name');
        // $member_role = get_sub_field('member_role');
        $member_description = get_sub_field('member_description');
      ?>
      <div id="gridder-content-<?php echo $j; ?>" class="gridder-content">
				<div class="row">
					<div class="col-sm-12">
            <!-- <h3><?php //echo $member_name; ?></h3>
            <h6><?php //echo $member_role; ?></h6> -->
						<p><?php echo $member_description; ?></p>
					</div>
				</div>
      </div>
      <?php $j++; endwhile; else : ?>
          <p>There are no Team Members added yet.</p>
      <?php endif; ?>
		</div>
	</div>

<?php get_footer(); ?>