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

			<div id="staff-interview" class="slide-content">
				<?php get_template_part('parts/home/parts-home-interview'); ?>
			</div><!-- /#staff-interview -->

			<div class="home-blog-content">
				<div class="content-header contentHeader-spacing">
					<h3 class="content-header-title">BSSのことがもっとわかる！</h3>
					<h4 class="content-header-ruby">Blog</h4>
				</div>
				<div id="president-blog" class="inner-content">
					<!-- Note Blogの読み込み -->
					<div class="inner uk-margin-large-bottom">
						<?php get_template_part('parts/home/parts-note-blog'); ?>
					</div>
				</div><!-- /#president-blog -->

				<div id="staff-blog" class="inner-content">
					<div class="inner uk-margin-large-bottom">
						<?php get_template_part('parts/home/parts-home-blog'); ?>
					</div>
				</div><!-- /#staff-blog -->
			</div>

			<div id="news" class="inner-content">
				<div class="round-bg-container uk-background-default">
					<div class="inner">
						<div class="uk-flex uk-felx-wrap">
							<div class="news-header news uk-flex uk-flex-center uk-flex-middle uk-flex-column">
								<div class="content-header">
									<h3 class="content-header-title">お知らせTEST</h3>
									<h4 class="content-header-ruby">News</h4>
								</div>
								<div class="news-link-more">
									<a href="#" class="btn btn-more tc-em uk-flex uk-flex-wrap uk-flex-center">もっと見る</a>
								</div>
							</div>

							<div class="news-body">
								<?php
								// カスタムクエリを使用して投稿を取得
								$args = array(
									'post_type' => 'post',
									'posts_per_page' => 4,
								);
								$news_query = new WP_Query($args);
								if ($news_query->have_posts()):
								?>
									<div class="news-grid">
										<?php
										while ($news_query->have_posts()) : $news_query->the_post();
											global $post;
										?>
											<div class="news-item">
												<div class="news-item-tags">
													<span class="date"><?php echo get_the_time('Y.m.d'); ?></span>
													<?php
													$categories = get_the_category();
													if (!empty($categories)) {
														foreach ($categories as $category) {
															echo '<span class="category">' . esc_html($category->name) . '</span>';
														}
													} else {
														echo 'カテゴリがありません';
													}
													?>
												</div>
												<p><?php the_title(); ?></p>
											</div>
										<?php
										endwhile;
										wp_reset_postdata(); // クエリをリセット
										?>
									</div>
								<?php else : ?>
									<p>投稿が見つかりません。</p>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /#news -->
		</main>

	</div>

</div>

<?php get_footer(); ?>