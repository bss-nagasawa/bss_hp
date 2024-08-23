<?php get_header(); ?>

<div class="conteiner">

	<div id="inner-content" class="wrap">

		<main id="single-content" class="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPage">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php
					get_template_part('post-formats/format', get_post_format());
					?>

				<?php endwhile; ?>

			<?php else : ?>
				該当ページが見つかりませんでした。
			<?php endif; ?>

		</main>

	</div>

</div>

<?php get_footer(); ?>