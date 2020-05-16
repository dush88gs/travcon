<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<?php
	$contact_featured_image = get_field('contact_featured_image');
?>
    <div class="inner-banner style-6 background-block" style="background-image: url('<?php echo $contact_featured_image['url']; ?>');">
		<img class="center-image" src="<?php echo $contact_featured_image['url']; ?>" alt="<?php echo $contact_featured_image['alt']; ?>" style="display: none;">
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
			<div class="container-fluid">
				<div class="row tlc-contact-details">
					<div class="col-sm-12">
						<h3 class="color-blue-2"><?php the_title(); ?></h3>
					</div>
				</div>
				<div class="row tlc-contact-details">
					<div class="col-xs-12 col-sm-7">
						<?php echo do_shortcode( '[contact-form-7 id="190" title="Contact form" html_class="contact-form"]' ); ?>
					</div>
					<div class="col-xs-12 col-sm-5">
						<div class="contact-info">
							<?php
								$sl_office = get_field('sl_office');
								$sl_land_phone = $sl_office['sl_land_phone'];
								$sl_land_phone_trimmed = str_replace(' ', '', $sl_land_phone);
								$sl_mobile = $sl_office['sl_mobile'];
								$sl_mobile_trimmed = str_replace(' ', '', $sl_mobile);
								$sl_email = $sl_office['sl_email'];
								$sl_address = $sl_office['sl_address'];
								$sl_whatsapp = $sl_office['sl_whatsapp'];
								$sl_whatsapp_trimmed = str_replace(' ', '', $sl_whatsapp);
								$sl_viber = $sl_office['sl_viber'];
								$sl_viber_trimmed = str_replace(' ', '', $sl_viber);
							?>
							<h4 class="color-blue-2"><strong>Sri Lanka Office</strong></h4>
							<div class="contact-line"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/contact/phone.svg" alt=""><a href="tel:<?php echo $sl_land_phone_trimmed; ?>"><?php echo $sl_land_phone; ?></a></div>
							<div class="contact-line"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/contact/mobile.svg" alt=""><a href="tel:<?php echo $sl_mobile_trimmed; ?>"><?php echo $sl_mobile; ?></a></div>
							<div class="contact-line"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/contact/email.svg" alt=""><a href="mailto:<?php echo $sl_email; ?>"><?php echo $sl_email; ?></a></div>
							<div class="contact-line"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/contact/address.svg" alt=""><span><?php echo $sl_address; ?></span></div>
							<div class="contact-line"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/contact/whatsapp.svg" alt=""><a href="tel:<?php echo $sl_whatsapp_trimmed; ?>"><?php echo $sl_whatsapp; ?></a></div>
							<div class="contact-line"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/contact/viber.svg" alt=""><a href="tel:<?php echo $sl_viber_trimmed; ?>"><?php echo $sl_viber; ?></a></div>
							<div class="qr-code"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/contact/qr-sri-lanka.png" width="75" height="auto" alt=""></div>
						</div>

						<div class="contact-info">
							<?php
								$mv_office = get_field('mv_office');
								$mv_land_phone = $mv_office['mv_land_phone'];
								$mv_land_phone_trimmed = str_replace(' ', '', $mv_land_phone);
								$mv_mobile = $mv_office['mv_mobile'];
								$mv_mobile_trimmed = str_replace(' ', '', $mv_mobile);
								$mv_email = $mv_office['mv_email'];
								$mv_address = $mv_office['mv_address'];
								$mv_whatsapp = $mv_office['mv_whatsapp'];
								$mv_whatsapp_trimmed = str_replace(' ', '', $mv_whatsapp);
								$mv_viber = $mv_office['mv_viber'];
								$mv_viber_trimmed = str_replace(' ', '', $mv_viber);
							?>
							<h4 class="color-blue-2"><strong>Maldives Office</strong></h4>
							<div class="contact-line"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/contact/phone.svg" alt=""><a href="tel:<?php echo $mv_land_phone_trimmed; ?>"><?php echo $mv_land_phone; ?></a></div>
							<div class="contact-line"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/contact/mobile.svg" alt=""><a href="tel:<?php echo $mv_mobile_trimmed; ?>"><?php echo $mv_mobile; ?></a></div>
							<div class="contact-line"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/contact/email.svg" alt=""><a href="mailto:<?php echo $mv_email; ?>"><?php echo $mv_email; ?></a></div>
							<div class="contact-line"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/contact/address.svg" alt=""><span><?php echo $mv_address; ?></span></div>
							<div class="contact-line"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/contact/whatsapp.svg" alt=""><a href="tel:<?php echo $mv_whatsapp_trimmed; ?>"><?php echo $mv_whatsapp; ?></a></div>
							<div class="contact-line"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/contact/viber.svg" alt=""><a href="tel:<?php echo $mv_viber_trimmed; ?>"><?php echo $mv_viber; ?></a></div>
							<div class="qr-code"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/travcon/contact/qr-maldives.png" width="75" height="auto" alt=""></div>
						</div>

						<div class="contact-socail">
							<?php if( have_rows('contact_icons') ): ?>
								<?php while( have_rows('contact_icons') ): the_row();
									$social_link = get_sub_field('social_link');
									$social_icon = get_sub_field('social_icon');
								?>
								<a class="link-dr-blue-2" href="<?php echo $social_link; ?>"><?php echo $social_icon; ?></a>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>

	<div class="map-block">
		<?php the_field('contact_map'); ?>
	</div>

<?php get_footer(); ?>