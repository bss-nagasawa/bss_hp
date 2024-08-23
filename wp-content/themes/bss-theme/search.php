<?php get_header(); ?>

<div class="conteiner">

	<div id="inner-content" class="wrap">

		<main id="search-content" class="main" role="main">
			<h1 class="archive-title"><?php echo esc_attr(get_search_query()); ?></h1>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" role="article">

						<?php the_title(); ?>
						<?php the_excerpt('<span class="read-more">' . __('Read more &raquo;', 'bonestheme') . '</span>'); ?>

					</article>

				<?php endwhile; ?>

				<?php bones_page_navi(); ?>

			<?php else : ?>

				<article id="post-not-found" class="hentry">
					お探しのキーワードで該当ページが見つかりませんでした。
				</article>

			<?php endif; ?>

		</main>

	</div>

</div>

<?php get_footer(); ?>