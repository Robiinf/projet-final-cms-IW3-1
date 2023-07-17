<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h3 class="comments-title">
            Commentaires (<?php echo get_comments_number(); ?>)
           
    </h3>

        <ul class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ul',
                'short_ping'  => true,
                'avatar_size' => 0,
            ));
            ?>
        </ul>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav id="comment-nav-below" class="comment-navigation" role="navigation">
                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'textdomain')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'textdomain')); ?></div>
            </nav>
        <?php endif; ?>

    <?php endif; ?>

    <?php
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
    ?>
        <p class="no-comments"><?php _e('Comments are closed.', 'textdomain'); ?></p>
    <?php endif; ?>

    <?php comment_form(); ?>
</div>