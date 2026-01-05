<?php
/**
 * Main template file
 *
 * @package Devrix
 */

get_header();
?>

<main id="main" class="site-content">
    <div class="container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                    <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    
                    <div class="post-meta">
                        <span class="post-date"><?php echo get_the_date(); ?></span>
                        <span class="post-author"><?php _e('by', 'devrix'); ?> <?php the_author(); ?></span>
                        <?php if (has_category()) : ?>
                            <span class="post-categories"><?php _e('in', 'devrix'); ?> <?php the_category(', '); ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <div class="post-content">
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More', 'devrix'); ?> &rarr;</a>
                    </div>
                </article>
            <?php endwhile; ?>
            
            <div class="pagination">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('&laquo; Previous', 'devrix'),
                    'next_text' => __('Next &raquo;', 'devrix'),
                ));
                ?>
            </div>
        <?php else : ?>
            <div class="no-posts">
                <h2><?php _e('Nothing Found', 'devrix'); ?></h2>
                <p><?php _e('It seems we can\'t find what you\'re looking for.', 'devrix'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_sidebar();
get_footer();

