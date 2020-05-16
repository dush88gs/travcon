<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<div class="slider-area">
    <div class="slider-active">
      <?php if( have_rows('main_slider') ): ?>
        <?php while( have_rows('main_slider') ): the_row();
          $main_slider_title = get_sub_field('main_slider_title');
          $main_slider_image = get_sub_field('main_slider_image');
        ?>
        <div class="single-slider">
          <img src="<?php echo $main_slider_image; ?>" alt="" />
          <?php if( $main_slider_image ): ?>
          <div class="slider-content text-center">

            <div class="table">
              <div class="table-cell">
                <div class="container">
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-xs-12">
                      <h3 class="heading-text-shadow"><?php echo $main_slider_title; ?></h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endif; ?>
        </div>
        <?php endwhile; ?>
			<?php endif; ?>
    </div>
    <div class="tt_date_time">
      <div class="tt_time_wrapper">
        <!-- <p class="tt_time"><?php //echo do_shortcode('[tt_time]'); ?></p> -->
        <p class="tt_time" id="tt_time"></p>
        <span>Local Time</span>
      </div>
      <div class="tt_date_wrapper">
        <p class="tt_date"><?php echo do_shortcode('[tt_date]'); ?></p>
        <span>Date</span>
      </div>
    </div>
  </div>

  <section class="tlc-filter-section search-tours">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12">
          <?php get_sidebar(); ?>
        </div>
      </div>
    </div>
  </section>

  <div class="main-wraper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
          <div class="second-title special-offers">
            <h2 class="subtitle color-blue-2">Special Offers</h2>
            <p class="fs-15 text-center">Have the maximum value for your holiday in Sri Lanka. Check our amazing offers to get the best deals available.</p>
          </div>
        </div>
      </div>
      <div class="row isotope-container">
      <?php
        $special_offers = get_field('special_offers');

        $first = $special_offers[0];
        $second = $special_offers[1];
        $third = $special_offers[2];
        $fourth = $special_offers[3];
      ?>
        <div class="grid-sizer col-mob-12 col-xs-6 col-sm-3"></div>
        <?php if ($first): ?>
        <?php
          $first_offer_name = $first['offer_name'];
          $first_offer_image = $first['offer_image'];
          $first_offer_price = $first['offer_price'];
          $first_offer_discount = $first['offer_discount'];
          $first_offer_discount_colour = $first['offer_discount_colour'];
          $first_offer_start_date = $first['offer_start_date'];
          $first_offer_end_date = $first['offer_end_date'];
        ?>
        <div class="item col-xs-12 col-md-6">
            <div class="tour-block tour-block-s-2 radius-5 hover-blue">
              <div class="tour-layer delay-1"></div>
              <img class="center-image" src="<?php echo $first_offer_image['url']; ?>" alt="<?php echo $first_offer_image['alt']; ?>">
              <div class="tour-caption">
                <div class="tour-offer" style="background: <?php echo $first_offer_discount_colour; ?>"><?php echo $first_offer_discount; ?></div>
                <div class="vertical-align">
                  <h3 class="hover-it"><?php echo $first_offer_name; ?></h3>
                  <!-- <h4>From
                    <b>$475</b>
                  </h4> -->
                </div>
                <div class="vertical-bottom">
                  <div class="text-center">
                    <div class="tour-info">
                      <i class="fa fa-calendar" aria-hidden="true"></i>
                      <span class="font-style-2"><?php echo $first_offer_start_date; ?> to <?php echo $first_offer_end_date; ?>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($second): ?>
        <?php
          $second_offer_name = $second['offer_name'];
          $second_offer_image = $second['offer_image'];
          $second_offer_price = $second['offer_price'];
          $second_offer_discount = $second['offer_discount'];
          $second_offer_discount_colour = $second['offer_discount_colour'];
          $second_offer_start_date = $second['offer_start_date'];
          $second_offer_end_date = $second['offer_end_date'];
        ?>
        <div class="item col-xs-12 col-md-6">
            <div class="tour-block tour-block-s-4 radius-5 underline-block hover-blue">
              <div class="tour-layer delay-1"></div>
              <img class="center-image" src="<?php echo $second_offer_image['url']; ?>" alt="<?php echo $second_offer_image['alt']; ?>">
              <div class="tour-caption">
                <div class="tour-offer" style="background: <?php echo $second_offer_discount_colour; ?>"><?php echo $second_offer_discount; ?></div>
                <div class="vertical-align">
                  <h3 class="hover-it"><?php echo $second_offer_name; ?></h3>
                  <!-- <h4>From
                    <b>$600</b>
                  </h4> -->
                </div>
                <div class="vertical-bottom">
                  <div class="text-center">
                    <div class="tour-info">
                      <i class="fa fa-calendar" aria-hidden="true"></i>
                      <span class="font-style-2"><?php echo $second_offer_start_date; ?> to <?php echo $second_offer_end_date; ?>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($third): ?>
        <?php
          $third_offer_name = $third['offer_name'];
          $third_offer_image = $third['offer_image'];
          $third_offer_price = $third['offer_price'];
          $third_offer_discount = $third['offer_discount'];
          $third_offer_discount_colour = $third['offer_discount_colour'];
          $third_offer_start_date = $third['offer_start_date'];
          $third_offer_end_date = $third['offer_end_date'];
        ?>
        <div class="item col-mob-12 col-xs-6 col-sm-6 col-md-3">
            <div class="tour-block tour-block-s-2 radius-5 hover-blue">
              <div class="tour-layer delay-1"></div>
              <img class="center-image" src="<?php echo $third_offer_image['url']; ?>" alt="<?php echo $third_offer_image['alt']; ?>">
              <div class="tour-caption">
                <div class="tour-offer" style="background: <?php echo $third_offer_discount_colour; ?>"><?php echo $third_offer_discount; ?></div>
                <div class="vertical-align">
                  <h3 class="hover-it"><?php echo $third_offer_name; ?></h3>
                  <!-- <h4>From
                    <b>$550</b>
                  </h4> -->
                </div>
                <div class="vertical-bottom">
                  <div class="text-center">
                    <div class="tour-info">
                      <i class="fa fa-calendar" aria-hidden="true"></i>
                      <span class="font-style-2"><?php echo $third_offer_start_date; ?> to <?php echo $third_offer_end_date; ?>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($fourth): ?>
        <?php
          $fourth_offer_name = $fourth['offer_name'];
          $fourth_offer_image = $fourth['offer_image'];
          $fourth_offer_price = $fourth['offer_price'];
          $fourth_offer_discount = $fourth['offer_discount'];
          $fourth_offer_discount_colour = $fourth['offer_discount_colour'];
          $fourth_offer_start_date = $fourth['offer_start_date'];
          $fourth_offer_end_date = $fourth['offer_end_date'];
        ?>
        <div class="item col-mob-12 col-xs-6 col-sm-6 col-md-3">
            <div class="tour-block tour-block-s-2 radius-5 hover-blue">
              <div class="tour-layer delay-1"></div>
              <img class="center-image" src="<?php echo $fourth_offer_image['url']; ?>" alt="<?php echo $fourth_offer_image['alt']; ?>">
              <div class="tour-caption">
                <div class="tour-offer" style="background: <?php echo $fourth_offer_discount_colour; ?>"><?php echo $fourth_offer_discount; ?></div>
                <div class="vertical-align">
                  <h3 class="hover-it"><?php echo $fourth_offer_name; ?></h3>
                  <!-- <h4>From
                    <b>$860</b>
                  </h4> -->
                </div>
                <div class="vertical-bottom">
                  <div class="text-center">
                    <div class="tour-info">
                      <i class="fa fa-calendar" aria-hidden="true"></i>
                      <span class="font-style-2"><?php echo $fourth_offer_start_date; ?> to <?php echo $fourth_offer_end_date; ?>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="main-wraper meet-team">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
          <div class="second-title">
            <?php
              $why_choose = get_field('why_choose');
              $why_choose_heading = $why_choose['why_choose_heading'];
            ?>
            <h2 class="subtitle color-blue-2"><?php echo $why_choose_heading; ?></h2>
          </div>
        </div>
      </div>
      <div class="row">
        <?php if( have_rows('why_choose') ): ?>
          <?php while( have_rows('why_choose') ): the_row(); ?>
            <?php if( have_rows('why_choose_content') ): ?>
              <?php while( have_rows('why_choose_content') ): the_row();
                $why_choose_title = get_sub_field('why_choose_title');
                $why_choose_description = get_sub_field('why_choose_description');
                $why_choose_image = get_sub_field('why_choose_image');
              ?>
              <div class="icon-block-entry col-xs-12 col-sm-6 col-md-3">
                <div class="icon-block style-4">
                  <!-- <div class="icon-img-entry"><img class="icon-img" src="<?php //echo $why_choose_image['url']; ?>" alt="<?php //echo $why_choose_image['alt']; ?>" width="50"
                      height="auto" alt=""></div> -->
                  <div class="icon-content">
                    <h5 class="icon-title color-dark-2"><?php echo $why_choose_title; ?></h5>
                    <div class="icon-text color-dark-2-light"><?php echo $why_choose_description; ?></div>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>
            <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="main-wraper tlc-popular-tours">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
          <div class="second-title">
            <h2 class="subtitle color-blue-2">Popular Tours</h2>
          </div>
        </div>
      </div>
      <?php
        $args = array(
          'post_type' => 'tlc_holiday_packages',
          'post_status' => 'publish',
          'orderby'=> 'date',
          'order' => 'DESC',
          'posts_per_page' => 6,
          'meta_query' => array(
            array(
              'key' => 'is_popular_package',
              'value' => '1',
              'compare' => '=='
            )
          )
        );

        $the_query = new WP_Query( $args );
      ?> 
      <div class="tour-item-grid row">
        <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <div class="col-md-4 col-sm-6 col-xs-12 clear-sm-3">
          <div class="tour-item style-4">
            <?php
              $package_details = get_field('package_details');
              $discount = $package_details['package_discount'];
              $discount_color = $package_details['package_discount_colour'];
              $nights = $package_details['package_duration'];
              $days = $nights + 1;
              $package_image = $package_details['package_grid_image'];
              $custom_duration = $package_details['custom_duration'];
              $is_custom = get_field('is_custom_package');
            ?>
            <div class="radius-top">
              <img src="<?php echo $package_image['url']; ?>" alt="<?php echo $package_image['alt']; ?>">
              <div class="tour-weather red" style="background: <?php echo $discount_color; ?>">Save <?php echo $discount; ?></div>
            </div>
            <div class="tour-desc bg-white">
              <a href="<?php echo get_post_permalink(); ?>" class="c-button bg-red-3 hv-red-3-o delay-2 b-40"><span>Write to us</span></a>
              <h4><a class="tour-title color-dark-2 link-blue-2" href="<?php echo get_post_permalink(); ?>"><?php the_title(); ?></a></h4>
              <?php if(!$is_custom): ?>
                <div class="tour-price"><span class="color-blue-2"><?php echo $nights; ?> Nights</span> / <span class="color-blue-2"><?php echo $days; ?> Days</span></div>
              <?php else: ?>
                <div class="tour-price"><span class="color-blue-2"><?php echo $custom_duration; ?></span></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php endwhile; else : ?>
						<p>There are no Popular Tours exist</p>
				<?php endif;
				wp_reset_postdata(); ?>
      </div>
    </div>
  </div>

  <!-- <div class="main-wraper">
    <?php
      // $testimonials = get_field('testimonials');
      // $testimonial_heading = $testimonials['testimonial_heading'];
      // $testimonial_background = $testimonials['testimonial_background'];
      // $testimonial_content = $testimonials['testimonial_content'];
      // $testimonial_count = count($testimonial_content);
      // $data_val = 1;
    ?>
    <img class="center-image" src="<?php //echo $testimonial_background['url']; ?>" alt="<?php //echo $testimonial_background['alt']; ?>">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
          <div class="second-title">
            <h2 class="subtitle color-white"></h2>
          </div>
        </div>
      </div>
      <div class="arrows">
        <div class="swiper-container tweet-slider" data-autoplay="0" data-loop="1" data-speed="900" data-center="0"
          data-slides-per-view="1">
          <div class="swiper-wrapper">
          <?php //if( have_rows('testimonials') ): ?>
					<?php //while( have_rows('testimonials') ): the_row(); ?>
            <?php //if( have_rows('testimonial_content') ): ?>
            <?php //while( have_rows('testimonial_content') && ($data_val <= $testimonial_count) ): the_row(); ?>
              <?php
                // $testimonial_person = get_sub_field('testimonial_person');
                // $testimonial_description = get_sub_field('testimonial_description');
                // $testimonial_image = get_sub_field('testimonial_image');
              ?>
              <?php
                // if($data_val == 1 ) : 
                //   $active = ' active';
                // else:
                //   $active = '';
                // endif;
              ?>
              <div class="swiper-slide<?php //echo $active; ?>" data-val="<?php //echo $data_val; ?>">
                <div class="container">
                  <div class="row">
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                      <div class="slider-tweet">
                        <div class="s-tweet-icon"><img src="<?php //echo $testimonial_image['url']; ?>" alt="<?php //echo $testimonial_image['alt']; ?>" width="100" heigh="auto"></div>
                        <div class="s-tweet-title color-white">~ <?php //echo $testimonial_person; ?> ~</div>
                        <p class="color-white"><?php //echo $testimonial_description; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                //$data_val++;
              ?>
            <?php //endwhile; ?>
            <?php //endif; ?>
          <?php //endwhile; ?>
          <?php //endif; ?>
          </div>
          <div class="pagination pagination-hidden poin-style-1"></div>
          <div class="arrow-wrapp arr-s-7">
            <div class="cont-1170">
              <div class="swiper-arrow-left sw-arrow"><span class="fa fa-angle-left"></span></div>
              <div class="swiper-arrow-right sw-arrow"><span class="fa fa-angle-right"></span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->

<?php get_footer(); ?>

<script>
  $(document).ready(function(){
    $('#tt_time').jClocksGMT({ 
      offset: '+5.5',
      digital: true,
      analog: false,
      timeformat: 'hh:mm A',
      date: false
    });
  });
</script>