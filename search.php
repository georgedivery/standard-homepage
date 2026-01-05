<?php
/**
 * Search results template
 *
 * @package Devrix
 */

get_header();
?>

<main id="main" class="site-content">
    <div class="container">
        <header class="search-header">
            <h1 class="search-title">
                <?php
                printf(
                    __('Search Results for: %s', 'devrix'),
                    '<span>' . get_search_query() . '</span>'
                );
                ?>
            </h1>
        </header>
        
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                    <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    
                    <div class="post-meta">
                        <span class="post-date"><?php echo get_the_date(); ?></span>
                        <span class="post-type"><?php echo get_post_type_object(get_post_type())->labels->singular_name; ?></span>
                    </div>
                    
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
                <p><?php _e('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'devrix'); ?></p>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_sidebar();
get_footer();

