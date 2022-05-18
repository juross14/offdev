<?php
/**
 * Template Name: Homepage Template
 * Description: A full-width template with no sidebar
 *
 * Declare ACF fields Variables 
 * @package WordPress
 * @subpackage WP-Skeleton
 */

get_header(); 
get_template_part( 'menu', 'index' ); //the  menu + logo/site title 

// Hero Banner
$Hero = get_field('hero_banner');
// Headline
$Headline = get_field('headline_section');
// Featured Article
$FeaturedArticle = get_field('featured_section');
// One Featured Article
$OnefeaturedArticle = get_field('first_col_1');
// Two Featured Article
$TwofeaturedArticle = get_field('second_col_2');
// Contact
$Contact = get_field('contact_form');
// Image Grid
$ImageGrid = get_field('image_grid_gallery');
// Social
$Social = get_field('social');


?>

<?php // ACF Hero Banner ?> 
    <div class="container-fluid hero-cont">
		<section class="Hero-Banner">
			<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<?php if($Hero['slider_1']):?> 
							<img src="<?= $Hero['slider_1']; ?>" class="d-block w-100" alt="...">
						<?php else: ?>	
							<img src="<?php echo get_template_directory_uri(); ?>/images/slider1.jpg" class="d-block w-100" alt="...">
						<?php endif;?> 
					</div>
					<div class="carousel-item">
						<?php if($Hero['slider_2']):?> 
							<img src="<?= $Hero['slider_2']; ?>" class="d-block w-100" alt="...">
						<?php else: ?>	
							<img src="<?php echo get_template_directory_uri(); ?>/images/slider1.jpg" class="d-block w-100" alt="...">
						<?php endif;?> 
					</div>
					<div class="carousel-item">
						<?php if($Hero['slider_3']):?> 
							<img src="<?= $Hero['slider_3']; ?>" class="d-block w-100" alt="...">
						<?php else: ?>	
							<img src="<?php echo get_template_directory_uri(); ?>/images/slider1.jpg" class="d-block w-100" alt="...">
						<?php endif;?> 
					</div>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</section>

		<?php // ACF Headline ?> 
		<section class="Headline-section">
			<div class="container">
				<div class="headline-cont">
					<h1><?php if( $Headline['title_div']) { echo $Headline['title_div']; }  else { echo 'Please Input headline'; } ?></h1>
					<p><?php if( $Headline['description_div']) { echo $Headline['description_div']; } else { echo 'Please Input Description'; } ?></p>
				</div>
			</div>	
		</section>

		<?php // ACF Featured Article ?> 
		<section class="Featured-Article">
			<div class="container">
				<div class="featured-cont">
					<div class="col-first">
						<img src="<?php if( $FeaturedArticle) { echo $FeaturedArticle['image_feat']; } ?>"  class="feat-img-one"/>
					</div>
					<div class="col-sec">
						<h3><?php if( $FeaturedArticle) { echo $FeaturedArticle['title_feat']; } ?></h3>
						<small><?php if( $FeaturedArticle) { echo $FeaturedArticle['category_feat']; } ?></small>
						<span><?php if( $FeaturedArticle) { echo $FeaturedArticle['subtitle_feat']; } ?></span>
						<p><?php if( $FeaturedArticle) { echo $FeaturedArticle['description_feat']; } ?></p>
						<a href="<?php if( $FeaturedArticle) { echo $FeaturedArticle['external_feat']; } ?>">read more</a>
					</div>
				</div>
			</div>	
		</section>

		<?php // ACF TWO Featured Article ?> 
		<section class="Featured-Article">
			<div class="container two-cols">
				<div class="featured-cont cols">
					<div class="col-first">
						<img src="<?php if( $OnefeaturedArticle) { echo $OnefeaturedArticle['image_feat']; } ?>"  class="feat-img-one"/>
					</div>
					<div class="col-sec">
						<h3><?php if( $OnefeaturedArticle) { echo $OnefeaturedArticle['title_feat']; } ?></h3>
						<small><?php if( $OnefeaturedArticle) { echo $OnefeaturedArticle['category_feat']; } ?></small>
						<span><?php if( $OnefeaturedArticle) { echo $OnefeaturedArticle['subtitle_feat']; } ?></span>
						<p><?php if( $OnefeaturedArticle) { echo $OnefeaturedArticle['description_feat']; } ?></p>
					</div>
				</div>
				<div class="featured-cont cols">
					<div class="col-sec alt">
						<h3><?php if( $TwofeaturedArticle) { echo $TwofeaturedArticle['title_feat']; } ?></h3>
						<small><?php if( $TwofeaturedArticle) { echo $TwofeaturedArticle['category_feat']; } ?></small>
						<span><?php if( $TwofeaturedArticle) { echo $TwofeaturedArticle['subtitle_feat']; } ?></span>
						<p><?php if( $TwofeaturedArticle) { echo $TwofeaturedArticle['description_feat']; } ?></p>
					</div>					
					<div class="col-first">
						<img src="<?php if( $TwofeaturedArticle) { echo $TwofeaturedArticle['image_feat']; } ?>"  class="feat-img-one"/>
					</div>

				</div>
			</div>	
		</section>

		<?php // ACF Featured Plugin ?> 
		<section class="Featured-Plugin">		
			<?php echo do_shortcode( '[rest_country]' ); ?>
		</section>

		<?php // ACF Featured Form ?> 
		<section class="Featured-Form">
			<div class="container">
				<div class="featured-cont-form">
					<div class="col-first red">
						<div class="contact-bg">
							<h4><?php if( $Contact['title_feat']) { echo $Contact['title_feat']; } else { echo 'Stay in Touch'; } ?></h4>
							<p><?php if( $Contact['description']) { echo $Contact['description']; } else { echo 'Further Info Contact us'; } ?></p>
								<form action="." method="post" class="vform">
								<fieldset>
									<span>
										<label><?php if( $Contact['first_label_input']) { echo $Contact['first_label_input']; } else { echo 'First Name'; } ?></label>
										<input type="text" name="name" value="" id="name">
									</span>
									<span>
										<label><?php if( $Contact['sec_label_input']) { echo $Contact['sec_label_input']; } else { echo 'Last Name'; } ?></label>
										<input type="text" name="address" value="" id="address">
									</span>
									<span>
										<label><?php if( $Contact['third_label_input']) { echo $Contact['third_label_input']; } else { echo 'Email'; } ?></label>
										<input type="text" name="city" value="" id="city">
									</span>
									<span class="checkbox">
										<input type="checkbox" name="remember" value="" id="remember"> <label><?php if( $Contact['checkbox_input']) { echo $Contact['checkbox_input']; } else { echo 'Click here you Agree the Fill Form'; } ?></label>
									</span>
								</fieldset>
									<span><input type="submit" name="submit" value="Send" class="button"></span>
								</form>
							<?php get_template_part( 'social', 'social-icons' ); ?>
						</div>
					</div>
					<div class="col-sec img-gallery">
						<h4><?php if( $ImageGrid['title_feat']) { echo $ImageGrid['title_feat']; } else { echo 'Instagram '; } ?></h4>
						<p><?php if( $ImageGrid['description']) { echo $ImageGrid['description']; } else { echo 'Image Gallery Grid '; } ?></p>
						<div class="img-grid-randon">
							<?php for ($grid = 0; $grid <= 8; $grid++) { ?>
								<img src="https://picsum.photos/150/150?random=<?= $grid; ?>">
							<?php } ?>		
						</div>		
					</div>
				</div>
			</div>	
		</section>
		<?php get_footer(); ?>
    </div>
              