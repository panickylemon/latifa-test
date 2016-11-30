<?php
/**
 * Template Name: Study Page
 */

?>


<?php get_header(); ?>

<div class="wrapper-inner">

    <?php get_sidebar(); ?>


    <main class="content-panel">

        <ul class="courses-list">
            <?php
            $wp_query = new WP_Query(array(
                'category__in' => 3,
                'posts_per_page' => 5,
                'paged' => $paged
            ));
            while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

                <li>
                    <article class="clearfix">

                        <?php
                        $image = get_field('course_image');
                        if (!empty($image)): ?>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
                        <?php endif; ?>

                        <p class="tag"><?php the_category(', ') ?></p>

                        <h2><?php the_title(); ?></h2>

                        <p class="course-info">
                            <time> <?php echo get_field('course_date'); ?></time>
                            / <span class="course-place"><?php echo get_field('course_place'); ?></span>
                        </p>

                        <p><?php the_content(''); ?></p>

                        <a href="<?php the_permalink() ?>" class="button-dark-rose">Читать дальше</a>

                    </article>
                </li>


            <?php endwhile; ?>
        </ul>
        <?php if ($paged > 1) { ?>
            <div class="pagination">
                <ul>
                    <li class="older"><?php next_posts_link('Предыдущие') ?></li>
                    <li class="newer"><?php previous_posts_link('Следующие') ?></li>
                </ul>
            </div>

        <?php } else { ?>

            <nav id="nav-posts">
                <div class="prev"><?php next_posts_link('Предыдущие'); ?></div>
            </nav>

        <?php } ?>

        <?php wp_reset_postdata(); ?>


    </main>


</div>

<?php get_footer(); ?>
