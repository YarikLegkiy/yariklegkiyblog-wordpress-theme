<form class="form" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
	<input class="form__input" type="text" placeholder="Пошук" value="<?php echo get_search_query() ?>" name="s" id="s" />
	<button class="form__btn" type="submit" id="searchsubmit" value="найти">
		<img class="form__btn--img" src="<?php echo get_template_directory_uri();?>/assets/images/search.png" alt="search">
	</button>
</form>