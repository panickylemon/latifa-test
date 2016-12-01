<aside>

	<form action="blog/" class="form-search clearfix">

		<label>
			<input name="s" type="text" placeholder="Поиск...">
		</label>

		<button type="submit"></button>

	</form>

	<form action="#" class="form-mailing">

		<p class="title">Подпишитесь на рассылку,<br> это бесплатно</p>

		<p class="sub-title">Больше полезных статей еще впереди</p>

		<label>
			<input type="text" placeholder="Ваш e-mail">
		</label>

		<button type="submit" class="button-filled">Подписаться!</button>

	</form>

	<div class="soon">

		<div class="title-block"><span>скоро</span></div>

		<ul>
			<?php
			$n_query = new WP_Query( array(
					'category__in' => 3,
					'posts_per_page' => 5,
					'paged' => $paged
			) );
			while ($n_query->have_posts()) : $n_query->the_post(); ?>
				<li class="clearfix">
					<div class="image-wrap">
						<?php
						$image = get_field('sidebar_image');
						if( !empty($image) ): ?>
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						<?php endif; ?>
					</div>
					<div class="event-info">
						<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
						<time><?php echo get_field('course_date'); ?></time>
					</div>
				</li>
			<?php endwhile; ?>

		</ul>

	</div>

</aside>