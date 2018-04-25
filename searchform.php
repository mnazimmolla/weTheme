<!-- Search Bar -->
<div class="widget blog-search-bar">
	<form class="form-search" method="get" id="s" action="<?php bloginfo('url');?>/">
		<div class="input-append">
			<input class="form-control input-medium search-query" type="text" value="<?php the_search_query(); ?>" name="s" placeholder="Search" required>
			<button class="add-on" type="submit"><i class="fa fa-search"></i></button>
		</div><!-- /.input-append -->
	</form><!-- /.form-search -->
</div><!-- /.blog-search-bar -->
							<!-- Search Bar End -->