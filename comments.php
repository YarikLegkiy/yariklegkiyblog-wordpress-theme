<?php
                        $defaults = [
                            'fields'               => [
                                'author' => '<p class="comment-form-author comments__form--group">
                                    <input class="comments__form--textarea comment__input" placeholder="Ім`я" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' />
                                </p>',
                                'email'  => '<p class="comment-form-email comments__form--group">
                                    <input class="comments__form--textarea comment__input" placeholder="Email" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' />
                                </p>',
                                'url'    => '<p class="comment-form-url comments__form--group">
                                    <input class="comments__form--textarea comment__input" placeholder="Ваш сайт" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />
                                </p>',
                                'cookies' => '<p class="comments__form--group">'.
                                     sprintf( '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />', $consent ) .'
                                     <label for="wp-comment-cookies-consent">'. __( 'Save my name, email, and website in this browser for the next time I comment.' ) .'</label>
                                </p>',
                            ],
                            'comment_field'        => '<div class="comments__form--group">
                                <textarea class="comments__form--textarea" id="comment" name="comment" placeholder="Tекст коментаря" data-autoresize></textarea>
                            </div>',
                            'must_log_in'          => '<p class="must-log-in">' .
                                 sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '
                             </p>',
                            'logged_in_as'         => '<p class="logged-in-as post__center">' .
                                 sprintf( __( '<a href="%1$s" aria-label="Ви увійшли як %2$s.">Ви увійшли як %2$s</a> <a href="%3$s">Вийти?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '
                             </p>',
                            'comment_notes_before' => '<p class="comment-notes comments__form--group">
                                <span id="email-notes" class="comment__center">' . __( 'Your email address will not be published.' ) . '</span>'.
                                ( $req ? $required_text : '' ) . '
                            </p>',
                            'comment_notes_after'  => '',
                            'id_form'              => 'commentform',
                            'id_submit'            => 'submit',
                            'class_container'      => 'comment-respond',
                            'class_form'           => 'comment-form',
                            'class_submit'         => 'submit comments__btn',
                            'name_submit'          => 'submit',
                            'title_reply'          => '',
                            'title_reply_to'       => '',
                            'title_reply_before'   => '<h1 class="comments__title">Обговорення',
                            'title_reply_after'    => '</h1>',
                            'cancel_reply_before'  => ' <small>',
                            'cancel_reply_after'   => '</small>',
                            'cancel_reply_link'    => __( 'Cancel reply' ),
                            'label_submit'         => 'Відправити',
                            'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
                            'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
                            'format'               => 'xhtml',
                        ];
                        
                        comment_form( $defaults );
                    ?>
                </div>
                <?php
                    $comments = get_comments(array(
                        'post_id' => get_the_ID()
                    ));
                    foreach ($comments as $comment) {
                ?>
                <div class="comment">
                    <div class="comment__header">
                        <?php
                            $url = get_avatar_url( 'asd@dsf.df', array(
                                'default'=>'identicon',
                            ) );
                        ?>
                        <img class="comment__avatar" src="<?php echo $url ?>" alt="avatar">
                        <div class="comment__header--title">
                            <h1 class="comment__header--name"><?php echo $comment->comment_author; ?></h1>
                            <time class="card__bottom--date" datetime="2022-01-24"><?php comment_date('d.m.y'); ?></time>
                        </div>
                    </div>
                    <div class="comment__center">
                        <p>
                            <?php echo $comment->comment_content; ?>
                        </p>
                    </div>
                </div>
                <?php } ?>