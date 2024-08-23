<?php get_header(); ?>

<div class="conteiner">

	<div id="inner-content" class="wrap">

		<main id="artive-content" class="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPage">

			<?php
			the_archive_title('<h1 class="page-title">', '</h1>');
			the_archive_description('<div class="taxonomy-description">', '</div>');
			?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" role="article">

						<?php the_title(); ?>
						<?php the_excerpt('<span class="read-more">' . __('Read more &raquo;', 'bonestheme') . '</span>'); ?>

					</article>
				<?php endwhile; ?>

				<?php bones_page_navi(); ?>

			<?php else : ?>

				<article id="post-not-found" class="hentry">
					該当ページが見つかりませんでした。
				</article>

			<?php endif; ?>

		</main>

		<?php get_sidebar(); ?>

	</div>

</div>

<?php get_footer(); ?>