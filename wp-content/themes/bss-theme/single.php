<?php get_header(); ?>

<div class="conteiner">

	<div id="inner-content" class="wrap">

		<main id="single-content" class="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPage">
			<div class="inner content-inner">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<section class="entry-content page" itemprop="articleBody">
						<?php 
							if (get_post_type() == 'staff-interview') :
						?>
							<h1 class="staff-interview-post-title">
								<?php the_title();?> さんのインタビュー
							</h1>
						<?php else:?>
							<h1 class="post-title">
								<?php the_title();?>
							</h1>
						<?php endif;?>
						<div class="post-body">
							<?php if(get_post_type() != 'staff-blog') :?>
								<?php if (has_post_thumbnail()) {
									$thumbnail_id = get_post_thumbnail_id();
									$eye_img = wp_get_attachment_image_src($thumbnail_id, 'full');
									if ($eye_img) {
										echo '<img src="'. esc_url($eye_img[0]) .'" alt="'. get_the_title() .'">';
									}
								} ?>
							<?php endif;?>
							<div class="post-bod-article"><?php the_content();?></div>
						</div>
					</section>

					<?php endwhile; ?>

				<?php else : ?>
					該当ページが見つかりませんでした。
				<?php endif; ?>
			</div>
		</main>

	</div>

</div>

<?php get_footer(); ?>