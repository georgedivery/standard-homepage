<?php
/**
 * 404 error template
 *
 * @package Devrix
 */

get_header();
?>

<main id="main" class="site-content">
    <div class="container">
        <div class="error-404">
            <header class="page-header">
                <h1 class="page-title"><?php _e('404 - Page Not Found', 'devrix'); ?></h1>
            </header>
            
            <div class="page-content">
                <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'devrix'); ?></p>
                
                <?php get_search_form(); ?>
                
                <div class="widget">
                    <h2 class="widget-title"><?php _e('Recent Posts', 'devrix'); ?></h2>
                    <ul>
                        <?php
                        $recent_posts = wp_get_recent_posts(array(
                            'numberposts' => 5,
                            'post_status' => 'publish'
                        ));
                        foreach ($recent_posts as $post) :
                        ?>
                            <li>
                                <a href="<?php echo get_permalink($post['ID']); ?>">
                                    <?php echo $post['post_title']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                
                <div class="widget">
                    <h2 class="widget-title"><?php _e('Most Used Categories', 'devrix'); ?></h2>
                    <ul>
                        <?php
                        wp_list_categories(array(
                            'orderby' => 'count',
                            'order' => 'DESC',
                            'show_count' => 1,
                            'title_li' => '',
                            'number' => 10,
                        ));
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_sidebar();
get_footer();

