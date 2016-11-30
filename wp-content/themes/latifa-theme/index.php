<?php get_header(); ?>

    <div class="wrapper-inner">

        <?php get_sidebar(); ?>

        <main class="content-panel">

            <?php if (have_posts()) : ?>
                <ul class="articles-list">
                    <?php while (have_posts()) : the_post(); ?>
                        <li>
                            <article class="clearfix">
                                <time>
                                    <span class="month"><?php the_time('M') ?></span>
                                    <span class="day"><?php the_time('d') ?></span>
                                </time>

                                <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

                                <p class="article-details">
                                    Запись опубликована
                                    <time><?php the_time('d.m.Y') ?></time>
                                    , в
                                    <span class="class text-tag"><?php the_category(', ') ?></span>
                                </p>

                                <?php the_content(''); ?>

                                <a href="<?php the_permalink() ?>"
                                   class="comments"><?php comments_number('0', '1', '%'); ?></a>

                                <a href="<?php the_permalink() ?>" class="button-filled">читать дальше</a>

                            </article>
                        </li>
                    <?php endwhile; ?>
                </ul>


                <div class="pagination">
                    <ul>
                        <li class="older"><?php next_posts_link('Предыдущие') ?></li>
                        <li class="newer"><?php previous_posts_link('Следующие') ?></li>
                    </ul>
                </div>

            <?php else : ?>
                <p>Нет постов</p>

            <?php endif; ?>

        </main>


    </div>

<?php get_footer(); ?>