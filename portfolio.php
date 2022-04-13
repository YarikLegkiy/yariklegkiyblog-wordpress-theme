<?php
/*
Template name: Проєкти
*/ 
?>

<?php get_header();?>

<!-- projects start -->
<section class="projects">
        <div class="wrapper">
            <div class="cards projects__cards">

            <?php
                $my_posts = get_posts( array(
                    'numberposts' => 3,
                    'post_type'   => 'portfolio',
                    'suppress_filters' => true,
                ) );

                foreach( $my_posts as $post ){
                    setup_postdata( $post );
            ?>
                <div class="card project__card">
                    <div class="project__card--left">
                        <img src="<?php echo get_the_post_thumbnail_url();?>" alt="img">
                    </div>
                    <div class="project__card--right">
                        <a href="<?php the_field('лінк_на_сайт_роботи'); ?>" class="project__card--link"><?php the_title(); ?></a>
                        <div class="project__card--desc">
                            <?php the_content(); ?>
                        </div>
                        <a href="<?php the_field('лінк_на_сайт_роботи'); ?>" class="project__card--btn">Перейти на сайт</a>
                    </div>
                </div>
            <?php  
                }
                wp_reset_postdata();
            ?>
            </div>
        </div>
    </section>
    <!-- projects end -->

<?php get_footer();?>