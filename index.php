
		<?php get_header();?>

		<div class="main-menu-container"></div>
		
		<!-- Slider Section -->
		<section id="heading">
			<div class="overlay">
				<div class="container">
					<h1 class="title">Blog</h1>
				</div><!-- /.container -->
			</div><!-- /.overlay -->
		</section><!-- /#slider -->
		<!-- Slider Section End -->


		<div class="blog-content">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="post-container">
						
						<?php 
							query_posts(array(
							'post_type' => 'post'
							));
							
							if(have_posts()): while(have_posts()): the_post();
						?>
							<div class="single-post">
								<p class="entry-date"><?php the_time('F, j, Y');?></p>
								<a href="<?php the_permalink();?>" class="entry-title"><?php the_title();?></a>
								<span class="auther">Posted By: <a href="#"><?php the_author(); ?></a></span>
								<p class="entry-comtent"><?php echo wp_trim_words(get_the_content(), 10);?><a href="<?php the_permalink();?>" class="more-link">Read More...</a></p>
							</div><!-- /.single-post -->
							<hr>
						<?php endwhile; endif;?>
						</div>
						<hr>
					</div><!-- /.col-md-8 -->

					<?php get_sidebar();?>
				</div>
			</div><!-- /.container -->
		</div><!-- /.blog-content -->

		
		<?php get_footer();?>