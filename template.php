	<?php get_header(); ?>
	<?php 
		/*
			Template Name: Home Page
		*/
			
	?>	
		
		<!-- Slider Section -->
		<?php
							query_posts(
								array(
									"post_type" => "slider",
									"post_per_page" => 3
								)
							);
							
							if(have_posts()): while(have_posts()): the_post();
							
						$slider_background = get_post_thumbnail_id(); 
						
						?>
		<section id="slider">
			<div class="slider-container text-center" style="background:url(<?php echo wp_get_attachment_url( $slider_background ); ?>)no-repeat;">
				<div class="overlay">
					<div class="container">
						
				    	<div class="slider-txt">
							<h2 class="title"><?php echo get_post_meta($post->ID, slihead, true);?></span></h2>
							<p class="slider-description"><?php echo get_post_meta($post->ID, sliderdes, true); ?></p>

							<div class="link">
								<a href="<?php echo get_post_meta($post->ID, sliderhref, true);?>" class="btn custom-btn"><?php echo get_post_meta($post->ID, slidertext, true);?></a>
							</div>
						</div><!-- /.slider-txt -->
							   
							 <?php endwhile; endif?> 
							   
							   
					</div><!-- /.container -->
				</div><!-- /.overlay -->
			</div><!-- /.slider-container -->
		</section><!-- /#slider -->
		<!-- Slider Section End -->


		<section id="features">
			<div class="features-section section-padding">
				<div class="container">

					<div class="section-head">
						<h2 class="section-title"><?php echo get_option('service_title');?></h2>
						<p class="section-description"><?php echo get_option('service_des');?></p>
					</div><!-- /.section-head -->

					<div class="section-content text-center">
						<div class="row">
						
						
													
						
					
						
						<?php 
						
							query_posts(array(
								'post_type' => 'service',
								'post_per_page' => 4,
							));
						if(have_posts()): while(have_posts()): the_post();
						?>
						
						

							<div class="col-md-3 col-sm-6">
								<div class="inner-item">
									<div class="icon">
										<i class="fa fa-<?php echo get_post_meta($post->ID, "s_icon", true);?>"></i>
									</div><!-- /.icon -->

									<div class="item-info">
										<div class="item-title">
											<a href="#" class="title"><?php the_title();?></a>
										</div><!-- /.item-title -->
										<p><?php the_content();?></p>
									</div><!-- /.item-info -->
								</div><!-- /.inner-item -->
							</div><!-- /.col-md-3 -->
						<?php endwhile; endif;?>

							

						

						</div><!-- /.row -->
					</div><!-- /.section-content -->
				</div><!-- /.container -->
			</div><!-- /.features-section -->
		</section><!-- /#features -->


		<section id="team">
			<div class="team-section section-padding">
				<div class="container">

					<div class="section-head">
						<h2 class="section-title"><?php echo get_option('profetional_title');?></h2>
						<p class="section-description"><?php echo get_option('profetional_des');?></p>
					</div><!-- /.section-head -->

					<div class="section-content text-center">
						<div class="row">
					
						<?php
						query_posts(array(
						'post_type'=>'team',
						'post_per_page'=>4,
						));
						if(have_posts()) : while(have_posts()): the_post();
						?>
						
						
							<div class="col-md-3 col-sm-6">
								<div class="inner-item">
									<div class="member-img">
										<?php the_post_thumbnail();?>
									</div>
									<div class="member-info">
										<div class="name">
											<a href="#" class="title"><?php the_title();?></a>
										</div><!-- /.item-title -->
										<p class="designation"><?php the_content();?></p>
									</div><!-- /.item-info -->
								</div><!-- /.inner-item -->
							</div><!-- /.col-md-3 -->

							<?php endwhile; endif;?>

						</div><!-- /.row -->
					</div><!-- /.section-content -->
				</div><!-- /.container -->
			</div><!-- /.team-section -->
		</section><!-- /#team -->


		<!-- Portfolio Section -->
		<section id="portfolio" class="portfolio-section section-padding">
			<div class="container">

				<div class="section-head">
					<h3 class="section-title"><?php echo get_option('portfolio_title');?></h3>
					<p class="section-description"><?php echo get_option('portfolio_des');?></p>
				</div><!-- /.section-head -->

				<div id="portfolio-container" class="clearfix">
					<div class="PortfolioFilter text-center">
						<a href="#" data-filter="" class="current">Show All</a>
						
						<?php 
						
							$terms = get_terms("c_cat");
							foreach($terms as $term){
								echo "<a href=\"#\" data-filter=\".$term->slug\">$term->name</a>";
							}
							
						?>
						
						
					</div>

					<div class="portfolio-items element-from-bottom">

					<?php 
						
							query_posts(array(
							
								"post_type"=>"items",
								"taxonomy"=>"c_cat",
							
							));
							if(have_posts()): while(have_posts()): the_post();
						
						?>
						<?php
						
							$terms = get_the_terms( get_the_ID(), 'c_cat' );
                         
							if ( $terms && ! is_wp_error( $terms ) ) : 
							 
								$draught_links = array();
							 
								foreach ( $terms as $term ) {
									$draught_links[] = $term->slug;
								}
													 
								$on_draught = join( " ", $draught_links );			
						
						?>
					
						<figure class="item <?php echo $on_draught; ?> single-item">
							<div class="portfolio-img">
					  			<?php the_post_thumbnail();?>
					  		</div><!-- /.portfolio-img -->
						</figure>

					<?php endif; ?>
					<?php endwhile; endif; ?>

						

						
					</div><!-- /.portfolio-items -->
				</div><!-- /#portfolio-container -->
			</div><!-- /.container -->
		</section><!-- #portfolio -->


		<!-- Pricint Section -->
		<section id="pricing" class="pricing-section section-padding text-center">
			<div class="container">
				<div class="section-head">
					<h3 class="section-title"><?php echo get_option('pricing_title');?></h3>
					<p class="section-description"><?php echo get_option('portfolio_des');?></p>
				</div><!-- /.section-head -->

				<div class="section-content">

					<?php query_posts(array(
						'post_type' => 'pricing',
						'post_per_page'=>4
					));
			
					if(have_posts()): while(have_posts()): the_post();
					?>
					
					
					
					<div class="col-md-3 col-sm-6">
						<div class="inner-item">
							<div class="item-title">
								<h3><?php echo get_post_meta($post->ID,'p_title',true);?></h3>
							</div>
							<div class="pricing-range picton-bluev">	
								<p class="currency-number">
									<span class="currency"><?php echo get_post_meta($post->ID, 'p_currancy', true);?></span> 
									<span class="number"><?php echo get_post_meta($post->ID,'p_amount',true);?></span>
								</p>
								<p class="duration"><?php echo get_post_meta($post->ID,'p_duration',true);?></p>
							</div><!-- /.pricing-range -->
							<div class="list-wrap">
								<ul class="pricing-list">
									<li><a href="#"><?php echo get_post_meta($post->ID,"p_service1", true);?></a></li>
									<li><a href="#"><?php echo get_post_meta($post->ID,"p_service2", true);?></a></li>
									<li><a href="#"><?php echo get_post_meta($post->ID,"p_service3", true);?></a></li>
									<li><a href="#"><?php echo get_post_meta($post->ID,"p_service4", true);?></a></li>
									<li><a href="#"><?php echo get_post_meta($post->ID,"p_service5", true);?></a></li>
								</ul>

								<div class="link">
									<a href="#" class="btn custom-btn picton-bluev">Order Now</a>
								</div>
							</div>
						</div><!-- /.inner-item -->
					</div><!-- /.col-md-3 -->
					
					
				<?php endwhile; endif;?>
					


				</div><!-- /.section-content -->
			</div>
		</section><!-- /#pricing -->
		<!-- Pricint Section End -->

		<?php get_footer(); ?>
		