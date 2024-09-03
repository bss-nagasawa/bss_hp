<?php
/*
Template Name: 会社概要ページテーマ
*/
get_header();
?>

<div class="container">

	<div id="content" class="wrap">

		<main id="page-content" class="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPage">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<section class="company-content" itemprop="articleBody">
						<?php the_content(); ?>
					</section>
			<?php endwhile;
			endif; ?>

		</main>

	</div>

</div>

<?php get_footer(); ?>