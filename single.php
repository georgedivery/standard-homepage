<?php
/**
 * Single post template
 *
 * @package Devrix
 */

get_header();
?>

<main id="main" class="site-content">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                <header class="entry-header">
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    
                    <div class="post-meta">
                        <span class="post-date"><?php echo get_the_date(); ?></span>
                        <span class="post-author"><?php _e('by', 'devrix'); ?> <?php the_author(); ?></span>
                        <?php if (has_category()) : ?>
                            <span class="post-categories"><?php _e('in', 'devrix'); ?> <?php the_category(', '); ?></span>
                        <?php endif; ?>
                        <?php if (has_tag()) : ?>
                            <span class="post-tags"><?php the_tags(__('Tags: ', 'devrix'), ', '); ?></span>
                        <?php endif; ?>
                    </div>
                </header>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="post-content">
                    <?php the_content(); ?>
                    
                    <?php
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('Pages:', 'devrix'),
                        'after' => '</div>',
                    ));
                    ?>
                </div>
            </article>
            
            <?php
            // Post navigation
            the_post_navigation(array(
                'prev_text' => '<span class="nav-subtitle">' . __('Previous:', 'devrix') . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . __('Next:', 'devrix') . '</span> <span class="nav-title">%title</span>',
            ));
            ?>
            
            <?php
            // Comments
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>
        <?php endwhile; ?>
    </div>
</main>

<?php
get_sidebar();
get_footer();

