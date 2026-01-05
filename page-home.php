<?php
/**
 * Template Name: Home Page
 *
 * @package Devrix
 */
get_header();
?>

 

<main class="main">
  <?php if (have_rows('sections')) : while (have_rows('sections')) : the_row(); ?> 

    <?php get_template_part('sections/hero_section/index'); ?>
    <?php get_template_part('sections/analytics_section/index'); ?>
    <?php get_template_part('sections/services_section/index'); ?> 
    <?php get_template_part('sections/news_section/index'); ?> 
    <?php get_template_part('sections/testimonials_section/index'); ?> 
    <?php get_template_part('sections/feed_section/index'); ?> 
    <?php get_template_part('sections/contact_section/index'); ?> 

  <?php endwhile; endif; ?> 
</main>



<?php
 
get_footer();