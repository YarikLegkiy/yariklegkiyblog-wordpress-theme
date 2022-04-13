<?php
/*
Template name: Контакти
*/ 
?>

<?php get_header();?>

    <!-- contacts start -->
    <section class="contacts">
        <div class="wrapper__contacts">
            <div class="card contacts__content">
                <?php
                    $my_posts = get_posts( array(
                        'numberposts' => 1,
                        'post_type'   => 'contacts',
                        'suppress_filters' => true,
                    ) );

                    foreach( $my_posts as $post ){
                        setup_postdata( $post ); 
                ?>
                <div class="contact__content--header">
                    <h1 class="contacts__title"><?php the_title(); ?></h1>
                    <div class="contacts__dev">
                        <h2 class="contacts__subtitle"><?php the_field('позиція_девелопера'); ?></h2>
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/check-mark.png" alt="Check-mark">
                    </div>
                    <div class="contacts__header--desc">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="contacts__contant">
                    <div class="contacts__left">
                        <div class="contacts__card">
                            <div class="contacts__card--header">
                                <h2 class="contacts__card--num">01</h2>
                                <h2 class="contacts__card--title">Personal Info</h2>
                            </div>
                            <div class="contacts__card--content">
                                <ul class="contacts__card--list">
                                    <li class="contacts__card--item">
                                        <h2 class="contacts__list--title">Phone</h2>
                                        <a href="tel:<?php the_field('лінк_для_номеру_телефону'); ?>" class="contacts__list--link"><?php the_field('номер_телефону'); ?></a>
                                    </li>
                                    <li class="contacts__card--item">
                                        <h2 class="contacts__list--title">E-mail</h2>
                                        <a href="mailto:<?php the_field('email'); ?>"
                                            class="contacts__list--link"><?php the_field('email'); ?></a>
                                    </li>
                                    <li class="contacts__card--item">
                                        <h2 class="contacts__list--title">LinkedIn</h2>
                                        <a href="<?php the_field('linkedin'); ?>"
                                            class="contacts__list--link"><?php the_field('linkedin'); ?></a>
                                    </li>
                                    <li class="contacts__card--item">
                                        <h2 class="contacts__list--title">GitHub</h2>
                                        <a href="<?php the_field('github'); ?>"
                                            class="contacts__list--link"><?php the_field('github'); ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="contacts__card">
                            <div class="contacts__card--header">
                                <h2 class="contacts__card--num">02</h2>
                                <h2 class="contacts__card--title">Skills</h2>
                            </div>
                            <div class="contacts__card--content">
                                <ul class="contacts__card--skills-list">
                                    <li class="contacts__card--skills-item">
                                        <h2 class="contacts__card--skills-name">HTML5</h2>
                                        <div class="circles">
                                            <span class="circle-bgd"></span>
                                            <span class="circle-bgd"></span>
                                            <span class="circle-bgd"></span>
                                            <span class="circle-bgd"></span>
                                            <span class="circle-bgd"></span>
                                            <span class="circle-not-bgd"></span>
                                        </div>
                                    </li>
                                    <li class="contacts__card--skills-item">
                                        <h2 class="contacts__card--skills-name">CSS3</h2>
                                        <div class="circles">
                                            <span class="circle-bgd"></span>
                                            <span class="circle-bgd"></span>
                                            <span class="circle-bgd"></span>
                                            <span class="circle-bgd"></span>
                                            <span class="circle-not-bgd"></span>
                                            <span class="circle-not-bgd"></span>
                                        </div>
                                    </li>
                                    <li class="contacts__card--skills-item">
                                        <h2 class="contacts__card--skills-name">SASS, SCSS, LESS</h2>
                                        <div class="circles">
                                            <span class="circle-bgd"></span>
                                            <span class="circle-bgd"></span>
                                            <span class="circle-bgd"></span>
                                            <span class="circle-not-bgd"></span>
                                            <span class="circle-not-bgd"></span>
                                            <span class="circle-not-bgd"></span>
                                        </div>
                                    </li>
                                    <li class="contacts__card--skills-item">
                                        <h2 class="contacts__card--skills-name">JS ES6</h2>
                                        <div class="circles">
                                            <span class="circle-bgd"></span>
                                            <span class="circle-bgd"></span>
                                            <span class="circle-bgd"></span>
                                            <span class="circle-not-bgd"></span>
                                            <span class="circle-not-bgd"></span>
                                            <span class="circle-not-bgd"></span>
                                        </div>
                                    </li>
                                    <li class="contacts__card--skills-item">
                                        <h2 class="contacts__card--skills-name">PHP</h2>
                                        <div class="circles">
                                            <span class="circle-bgd"></span>
                                            <span class="circle-bgd"></span>
                                            <span class="circle-bgd"></span>
                                            <span class="circle-not-bgd"></span>
                                            <span class="circle-not-bgd"></span>
                                            <span class="circle-not-bgd"></span>
                                        </div>
                                    </li>
                                    <li class="contacts__card--skills-item">
                                        <h2 class="contacts__card--skills-name">Wordpress</h2>
                                        <div class="circles">
                                            <span class="circle-bgd"></span>
                                            <span class="circle-bgd"></span>
                                            <span class="circle-bgd"></span>
                                            <span class="circle-bgd"></span>
                                            <span class="circle-not-bgd"></span>
                                            <span class="circle-not-bgd"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="contacts__card">
                            <div class="contacts__card--header">
                                <h2 class="contacts__card--num">03</h2>
                                <h2 class="contacts__card--title">Languages</h2>
                            </div>
                            <div class="contacts__card--content">
                                <ul class="contacts__card--skills-list">
                                    <li class="contacts__card--skills-item">
                                        <h2 class="contacts__card--skills-name">English</h2>
                                        <div class="circles">
                                            <span class="circle-bgd"></span>
                                            <span class="circle-bgd"></span>
                                            <span class="circle-not-bgd"></span>
                                            <span class="circle-not-bgd"></span>
                                            <span class="circle-not-bgd"></span>
                                            <span class="circle-not-bgd"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="contacts__right">
                        <div class="contacts__card">
                            <div class="contacts__card--header">
                                <h2 class="contacts__card--num">04</h2>
                                <h2 class="contacts__card--title">Education</h2>
                            </div>
                            <div class="contacts__card--content">
                            <?php
                                $my_posts = get_posts( array(
                                    'numberposts' => 10,
                                    'post_type'   => 'education',
                                    'suppress_filters' => true,
                                ) );

                                foreach( $my_posts as $post ){
                                    setup_postdata( $post );
                            ?>
                                <div class="contacts__eductn">
                                    <div class="contacts__eductn--left">
                                        <h2 class="contacts__eductn--date"><?php the_field('дата_рік'); ?></h2>
                                    </div>
                                    <div class="contacts__eductn--right">
                                        <h2><?php the_title(); ?></h2>
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            <?php  
                                }
                                wp_reset_postdata();
                            ?>
                            </div>
                        </div>
                        <div class="contacts__card">
                            <div class="contacts__card--header">
                                <h2 class="contacts__card--num">05</h2>
                                <h2 class="contacts__card--title">Certification</h2>
                            </div>
                            <div class="contacts__card--content">
                            <?php
                                $my_posts = get_posts( array(
                                    'numberposts' => 10,
                                    'post_type'   => 'certification',
                                    'suppress_filters' => true,
                                ) );

                                foreach( $my_posts as $post ){
                                    setup_postdata( $post );
                            ?>
                                <div class="contacts__eductn">
                                    <div class="contacts__eductn--left">
                                        <h2 class="contacts__eductn--date"><?php the_field('дата_рік'); ?></h2>
                                    </div>
                                    <div class="contacts__eductn--right">
                                        <h2><?php the_title(); ?></h2>
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            <?php  
                                }
                                wp_reset_postdata();
                            ?>
                            </div>
                        </div>
                        <div class="contacts__card">
                            <div class="contacts__card--header">
                                <h2 class="contacts__card--num">06</h2>
                                <h2 class="contacts__card--title">Experience</h2>
                            </div>
                            <div class="contacts__card--content">
                            <?php
                                $my_posts = get_posts( array(
                                    'numberposts' => 10,
                                    'post_type'   => 'experience',
                                    'suppress_filters' => true,
                                ) );

                                foreach( $my_posts as $post ){
                                    setup_postdata( $post );
                            ?>
                                <div class="contacts__eductn">
                                    <div class="contacts__eductn--left">
                                        <h2 class="contacts__eductn--date"><?php the_field('дата_рік'); ?></h2>
                                    </div>
                                    <div class="contacts__eductn--right">
                                        <h2><?php the_title(); ?></h2>
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            <?php  
                                }
                                wp_reset_postdata();
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } wp_reset_postdata(); ?>
            </div>    
        </div>
    </section>
    <!-- contacts end -->

<?php get_footer();?>