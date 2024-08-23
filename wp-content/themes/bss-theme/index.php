<?php get_header(); ?>

<div class="conteiner">

	<div id="inner-content" class="wrap">

		<main id="home-content" class="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPage">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php endwhile; ?>

				<?php bones_page_navi(); ?>

			<?php endif; ?>


		</main>

	</div>

</div>

<?php get_footer(); ?>