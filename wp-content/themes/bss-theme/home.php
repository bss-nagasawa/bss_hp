<?php

/******
トップページテーマ
機能
- ヘッダー
- メインコンテンツ #home-content
-- メインビジュアル #main-visual
-- BSSとは #about-bss
-- BSSの特徴 #feature-bss
-- 社員インタビュー #staff-interview
-- 社長ブログ #president-blog
-- 社員ブログ #staff-blog
-- お知らせ #news
- フッター
 ******/
get_header();
?>

<div class="conteiner">

	<div id="content" class="wrap">

		<main id="home-content" class="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPage">

			<div id="main-visual" class="wide-content">
				<?php get_template_part('parts/home/parts-home-mv'); ?>
			</div><!-- /#main-visual -->

			<div id="about-bss" class="wide-content">
				<?php get_template_part('parts/home/parts-home-about'); ?>
			</div><!-- /#about-bss -->

			<div id="feature-bss" class="wide-content">
				<?php get_template_part('parts/home/parts-home-features'); ?>
			</div><!-- /#feature-bss -->

			<div id="staff-interview" class="inner-content">
				<?php get_template_part('parts/home/parts-home-interview'); ?>
			</div><!-- /#staff-interview -->

			<div id="president-blog" class="inner-content">
				<!-- Note Blogの読み込み -->
				<?php get_template_part('parts/home/parts-note-blog'); ?>
			</div><!-- /#president-blog -->

			<div id="staff-blog" class="inner-content">
				<?php get_template_part('parts/home/parts-home-blog'); ?>
			</div><!-- /#staff-blog -->

			<div id="news" class="inner-content">
				<?php if (have_posts()): ?>
					<?php while (have_posts()) : the_post(); ?>
						<?php the_title(); ?>
					<?php endwhile; ?>
					<?php bones_page_navi(); ?>
				<?php else : ?>
					<p>投稿が見つかりません。</p>
				<?php endif; ?>
			</div><!-- /#news -->

		</main>

	</div>

</div>

<?php get_footer(); ?>