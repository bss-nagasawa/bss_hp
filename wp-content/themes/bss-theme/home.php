<?php

/******
トップページテーマ
機能
- ヘッダー
- メインコンテンツ #home-content
-- メインビジュアル #main-visual
-- スライドコンテンツ #slide-content
-- お知らせ #news
-- BSSとは #about-bss
-- BSSの特徴 #feature-bss
-- 社長ブログ #president-blog
-- 社員インタビュー #staff-interview
- フッター
 ******/
get_header();
?>

<div class="conteiner">

	<div id="content" class="wrap">

		<main id="home-content" class="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPage">

			<div id="main-visual" class="wide-content">
			</div><!-- /#main-visual -->
			<div id="slide-content" class="wide-content">
			</div><!-- /#slide-content -->
			<div id="news" class="inner-content">
				<?php if (have_posts()): ?>
					<?php while (have_posts()) : the_post(); ?>
						<?php the_title(); ?>
					<?php endwhile; ?>
					<?php bones_page_navi(); ?>
				<?php endif; ?>
			</div><!-- /#news -->
			<div id="about-bss" class="wide-content">
			</div><!-- /#about-bss -->
			<div id="feature-bss" class="wide-content">
			</div><!-- /#feature-bss -->
			<div id="president-blog" class="inner-content">
			</div><!-- /#president-blog -->
			<div id="staff-interview" class="inner-content">
			</div><!-- /#staff-interview -->

		</main>

	</div>

</div>

<?php get_footer(); ?>