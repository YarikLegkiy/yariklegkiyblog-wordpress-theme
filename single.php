<?php get_header(); ?>

<!-- post start -->
<section class="post">
    <div class="wrapper">
        <div class="post__content">
            <div class="post__header">
                <div class="post__header--links">
                    <a class="post__header--link" href="#" onclick="history.back();return false;">повернутися назад</a>
                    <a class="post__header--link post__header--link-share">
                        <p>поділитися</p>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/share.svg" alt="share">
                    </a>
                </div>
                <h1 class="post__title"><?php the_title(); ?></h1>
                <div class="card__bottom--left">
                    <time class="card__bottom--date" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('d.m.y') ?></time>
                    <span class="circle"></span>
                    <?php
                    $cat = get_the_category();
                    $category_id = $cat[0]->cat_ID;;
                    $category_link = get_category_link($category_id);
                    ?>
                    <a class="card__category" href="<?php echo $category_link; ?>"><?php $cat = get_the_category();
                                                                                    echo $cat[0]->cat_name; ?></a>
                    <div class="eye">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons8-eye-24.png" alt="eye">
                        <p><?php do_action('pageviews'); ?></p>
                    </div>
                </div>
            </div>
            <div class="post__center">
                <?php the_content(); ?>
            </div>
            <div class="post__interesting--block">
                <h1 class="post__interesting--title">Цікаво почитати</h1>
                <ul class="post__interesting--ul">
                    <li class="post__interesting--li">
                        <?php previous_post_link('%link', '%title'); ?>
                    </li>
                    <li class="post__interesting--li">
                        <?php next_post_link('%link', '%title'); ?>
                    </li>
                </ul>
            </div>
            <div class="comments">
                <?php comments_template($file, $separate_comments); ?>
            </div>
        </div>
</section>
<!-- post end -->

<!-- modal start -->
<section class="modal">
    <div class="modal__wrapper">
        <div class="modal__header">
            <div class="modal__crosses">
                <span class="cross__line-fisrt"></span>
                <span class="cross__line-right"></span>
            </div>
        </div>
        <div class="modal__content">
            <?php wp_nav_menu(array(
                'theme_location'  => 'modal-menu',
                'container'       => null,
                'items_wrap'      => '%3$s'
            )); ?>
        </div>
    </div>
</section>
<!-- modal end -->

<?php get_footer(); ?>