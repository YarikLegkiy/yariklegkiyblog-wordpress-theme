<?php get_header();?>

    <!-- categoty start -->
    <section class="category">
        <?php wp_nav_menu(array(
                'theme_location'  => 'categories',
                'container'       => null,
                'menu_class'      => 'category__nav',
            )); 
        ?>
    </section>
    <!-- category end -->

    <!-- posts start -->
    <section class="posts">
        <div class="wrapper">
            <div class="cards">
                <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                <div class="card">
                    <div class="card__top">
                        <a class="card__top--link" href="<?php the_permalink() ?>">
                            <img src="<?php echo get_the_post_thumbnail_url();?>" alt="img">
                        </a>
                    </div>
                    <div class="card__center">
                        <a href="<?php the_permalink() ?>" class="card__title"><?php the_title(); ?></a>
                        <div class="card__desc">
                            <?php the_excerpt();?>
                        </div>
                    </div>
                    <div class="card__bottom">
                        <div class="card__bottom--left">
                            <time class="card__bottom--date" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('d.m.y') ?></time>
                            <span class="circle"></span>
                            <?php
                                $cat = get_the_category();
                                $category_id = $cat[0]->cat_ID;;
                                $category_link = get_category_link( $category_id );
                            ?>
                            <a class="card__category" href="<?php echo $category_link; ?>"><?php $cat = get_the_category(); echo $cat[0]->cat_name; ?></a>
                            <div class="eye">
                                <img src="<?php echo get_template_directory_uri();?>/assets/images/open-eye.png" alt="eye">
                                <p><?php do_action( 'pageviews' ); ?></p>
                            </div>
                        </div>
                        <a class="card__bottom--link" href="<?php the_permalink() ?>">Читати</a>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php else: ?>
                    <div class="search__smile">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/sad.png" alt="smile">
                        <p>Нажаль нічого не знайдено</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- posts end -->

    <?php
    $args = array(
        'show_all'     => false, // показаны все страницы участвующие в пагинации
        'end_size'     => 1,     // количество страниц на концах
        'mid_size'     => 1,     // количество страниц вокруг текущей
        'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
        'prev_text'    => __('<'),
        'next_text'    => __('>'),
        'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
        'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
        'screen_reader_text' => false,
    );
    ?>
    
    <?php the_posts_pagination($args); ?>

<?php get_footer();?>