<?php
/**
 * Comments template
 *
 * @package Devrix
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ($comments_number == 1) {
                printf(__('One thought on &ldquo;%1$s&rdquo;', 'devrix'), get_the_title());
            } else {
                printf(
                    __('%1$s thoughts on &ldquo;%2$s&rdquo;', 'devrix'),
                    number_format_i18n($comments_number),
                    get_the_title()
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'short_ping' => true,
            ));
            ?>
        </ol>

        <?php
        the_comments_pagination(array(
            'prev_text' => __('&laquo; Older Comments', 'devrix'),
            'next_text' => __('Newer Comments &raquo;', 'devrix'),
        ));
        ?>
    <?php endif; ?>

    <?php
    comment_form(array(
        'title_reply' => __('Leave a Reply', 'devrix'),
        'title_reply_to' => __('Leave a Reply to %s', 'devrix'),
        'cancel_reply_link' => __('Cancel Reply', 'devrix'),
        'label_submit' => __('Post Comment', 'devrix'),
    ));
    ?>
</div>

