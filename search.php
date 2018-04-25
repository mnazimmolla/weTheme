<?php get_header();?>


<div class="blog-content">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="post-container">
						
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'search' );

			// End the loop.
			endwhile;

		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->
						
						</div>
					</div><!-- /.col-md-8 -->

					<?php get_sidebar();?>
				</div>
		</div><!-- /.container -->
</div><!-- /.blog-content -->


<?php get_footer();?>