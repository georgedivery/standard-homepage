<?php
/**
 * Sidebar template
 *
 * @package Devrix
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside id="secondary" class="sidebar widget-area">
    <div class="container">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </div>
</aside><!-- #secondary -->

