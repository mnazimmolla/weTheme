<?php get_header();?>



		<div class="blog-content">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="post-container">
						 
						 
						<?php 
							if(is_category()){
								
							echo 'Archive for: '; single_cat_title();
							
							}elseif(is_tag()){
								
								echo 'Archive for: '; single_tag_title();
								
							}elseif(is_author()){
								
								echo 'Archive for: '; the_author();
								
							}elseif(is_day()){
								
								echo 'Daily Archive ' .get_the_date();
								
							}elseif(is_month()){
								
								echo 'Monthly Archive ' .get_the_date();
								
							}elseif(is_year()){
								
								echo 'Yearly Archive' .get_the_date();
								
							}else{
								
								echo 'Archive';
								 
							}
							
						?> 
						<?php if(have_posts()): while(have_posts()): the_post(); ?>
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