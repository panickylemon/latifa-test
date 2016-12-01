<?php
/**
 * Template Name: Success stories Page
 */

?>


<?php get_header(); ?>

<main class="page-success-stories page-free ">

    <h1>Тренинги:</h1>

    <?php get_sidebar('search'); ?>

    <ul class="content-list">
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
    <li>
        <?php get_sidebar('subscribe'); ?>
    </li>
    </ul>

</main>
<?php get_footer(); ?>
