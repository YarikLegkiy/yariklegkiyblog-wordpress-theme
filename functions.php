<?php

add_theme_support( 'post-thumbnails', ['post', 'portfolio'] );

add_filter('show_admin_bar', '__return_false');

remove_action('wp_head',             'print_emoji_detection_script', 7 );
remove_action('admin_print_scripts', 'print_emoji_detection_script' );
remove_action('wp_print_styles',     'print_emoji_styles' );
remove_action('admin_print_styles',  'print_emoji_styles' );

remove_action('wp_head', 'wp_resource_hints', 2 ); //remove dns-prefetch
remove_action('wp_head', 'wp_generator'); //remove meta name="generator"
remove_action('wp_head', 'wlwmanifest_link'); //remove wlwmanifest
remove_action('wp_head', 'rsd_link'); // remove EditURI
remove_action('wp_head', 'rest_output_link_wp_head');// remove 'https://api.w.org/
remove_action('wp_head', 'rel_canonical'); //remove canonical
remove_action('wp_head', 'wp_shortlink_wp_head', 10); //remove shortlink
remove_action('wp_head', 'wp_oembed_add_discovery_links'); //remove alternate

add_action('wp_enqueue_scripts', 'site_scripts');
  function site_scripts() {
    $version = '0.0.0.2';

    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'global-styles' );

    wp_enqueue_style('main-style', get_stylesheet_uri(), [], $version);
    wp_enqueue_script('jquery-js', get_template_directory_uri() . '/assets/js/jquery.js', [], $version, true);
    wp_enqueue_script('header-js', get_template_directory_uri() . '/assets/js/header.js', [], $version, true);
    wp_enqueue_script('modal-js', get_template_directory_uri() . '/assets/js/modal.js', [], $version, true);
    wp_enqueue_script('scroll-js', get_template_directory_uri() . '/assets/js/scroll.js', [], $version, true);
    wp_enqueue_script('textarea-js', get_template_directory_uri() . '/assets/js/textarea.js', [], $version, true);
  }

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
  return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>
	';
}

the_posts_pagination( array(
	'end_size' => 2,
) );


function enqueue_comment_reply() {
	if( is_singular() )
		wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'enqueue_comment_reply' );

add_action( 'after_setup_theme', function() {
  add_theme_support( 'pageviews' );
});

add_action( 'after_setup_theme', 'theme_register_nav_menu' );
function theme_register_nav_menu() {
	register_nav_menu( 'header-menu', 'Header Menu' );
  	register_nav_menu( 'categories', 'Categories' );
	register_nav_menu( 'socials-menu', 'Socials Menu' );
	register_nav_menu( 'modal-menu', 'Modal Menu' );
}

add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type( 'portfolio', [
		'label'  => null,
		'labels' => [
			'name'               => 'Портфоліо', // основное название для типа записи
			'singular_name'      => 'Портфоліо', // название для одной записи этого типа
			'add_new'            => 'Додати роботу', // для добавления новой записи
			'add_new_item'       => 'Додавання роботи', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редагування роботи', // для редактирования типа записи
			'new_item'           => 'Нова робота', // текст новой записи
			'view_item'          => 'Дивитися роботу', // для просмотра записи этого типа.
			'search_items'       => 'Шукати у роботах', // для поиска по этим типам записи
			'not_found'          => 'Не знайдено роботи у портфоліо', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не знайдено роботи у корзині', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Портфоліо', // название меню
		],
		'description'         => 'Це наші роботи в портфоліо',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-editor-code',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'author', 'thumbnail', 'custom-fields'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
	
	register_post_type( 'contacts', [
		'label'  => null,
		'labels' => [
			'name'               => 'Контакти', // основное название для типа записи
			'singular_name'      => 'Контакти', // название для одной записи этого типа
			'add_new'            => 'Додати матеріал', // для добавления новой записи
			'add_new_item'       => 'Додавання матеріалу', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редагування матеріалу', // для редактирования типа записи
			'new_item'           => 'Новий матеріал', // текст новой записи
			'view_item'          => 'Дивитися сторінку', // для просмотра записи этого типа.
			'search_items'       => 'Шукати', // для поиска по этим типам записи
			'not_found'          => 'Не знайдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не знайденоу корзині', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Контакти', // название меню
		],
		'description'         => 'Матеріал для контактів',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-admin-users',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'author', 'thumbnail', 'custom-fields'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'education', [
		'label'  => null,
		'labels' => [
			'name'               => 'Записи про навчання', // основное название для типа записи
			'singular_name'      => 'Записи про навчання', // название для одной записи этого типа
			'add_new'            => 'Додати запис до резюме', // для добавления новой записи
			'add_new_item'       => 'Додавання запису до резюме', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редагування запису', // для редактирования типа записи
			'new_item'           => 'Новий запис', // текст новой записи
			'view_item'          => 'Дивитися сторінку', // для просмотра записи этого типа.
			'search_items'       => 'Шукати', // для поиска по этим типам записи
			'not_found'          => 'Не знайдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не знайденоу корзині', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Записи про навчання', // название меню
		],
		'description'         => 'Записи про навчання для сторінки контакти, у резюме',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-welcome-add-page',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'author', 'custom-fields'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'certification', [
		'label'  => null,
		'labels' => [
			'name'               => 'Записи про cертифікати', // основное название для типа записи
			'singular_name'      => 'Записи про cертифікати', // название для одной записи этого типа
			'add_new'            => 'Додати запис до резюме', // для добавления новой записи
			'add_new_item'       => 'Додавання запису до резюме', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редагування запису', // для редактирования типа записи
			'new_item'           => 'Новий запис', // текст новой записи
			'view_item'          => 'Дивитися сторінку', // для просмотра записи этого типа.
			'search_items'       => 'Шукати', // для поиска по этим типам записи
			'not_found'          => 'Не знайдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не знайденоу корзині', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Записи про cертифікати', // название меню
		],
		'description'         => 'Записи про cертифікати для сторінки контакти, у резюме',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-welcome-add-page',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'author', 'custom-fields'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'experience', [
		'label'  => null,
		'labels' => [
			'name'               => 'Записи про досвід', // основное название для типа записи
			'singular_name'      => 'Записи про досвід', // название для одной записи этого типа
			'add_new'            => 'Додати запис до резюме', // для добавления новой записи
			'add_new_item'       => 'Додавання запису до резюме', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редагування запису', // для редактирования типа записи
			'new_item'           => 'Новий запис', // текст новой записи
			'view_item'          => 'Дивитися сторінку', // для просмотра записи этого типа.
			'search_items'       => 'Шукати', // для поиска по этим типам записи
			'not_found'          => 'Не знайдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не знайденоу корзині', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Записи про досвід', // название меню
		],
		'description'         => 'Записи про досвід для сторінки контакти, у резюме',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-welcome-add-page',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'author', 'custom-fields'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}
