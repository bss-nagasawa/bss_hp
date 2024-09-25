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

			<div id="main-visual" class="parallax-content">
				<?php get_template_part('parts/home/parts-home-mv'); ?>
			</div><!-- /#main-visual -->

			<div id="about-bss" class="wide-content bg-bgray">
				<div class="inner">
					<?php get_template_part('parts/home/parts-home-about'); ?>
				</div>
			</div><!-- /#about-bss -->

			<div id="feature-bss" class="parallax-content">
				<div class="inner">
					<?php get_template_part('parts/home/parts-home-features'); ?>
				</div>
			</div><!-- /#feature-bss -->

			<div id="staff-interview" class="parallax-content">
				<?php get_template_part('parts/home/parts-home-interview'); ?>
			</div><!-- /#staff-interview -->

			<div class="home-blog-content">
				<div class="content-header">
					<h3 class="content-header-title">BSSのことがもっとわかる！</h3>
					<h4 class="content-header-ruby">Blog</h4>
				</div>
				<div id="president-blog" class="inner-content">
					<!-- Note Blogの読み込み -->
					<div class="inner">
						<?php get_template_part('parts/home/parts-note-blog'); ?>
					</div>
				</div><!-- /#president-blog -->

				<div id="staff-blog" class="inner-content">
					<div class="inner">
						<?php get_template_part('parts/home/parts-home-blog'); ?>
					</div>
				</div><!-- /#staff-blog -->
			</div>
			<div id="news" class="wide-content">
				<div class="inner">
					<div class="content-header">
						<h3 class="content-header-title">お知らせ</h3>
						<h4 class="content-header-ruby">News</h4>
					</div>
					<?php if (have_posts()): ?>
						<?php while (have_posts()) : the_post(); ?>
							<?php the_title(); ?>
						<?php endwhile; ?>
						<?php bones_page_navi(); ?>
					<?php else : ?>
						<p>投稿が見つかりません。</p>
					<?php endif; ?>
				</div>
			</div><!-- /#news -->
		</main>

	</div>

</div>

<?php get_footer(); ?>