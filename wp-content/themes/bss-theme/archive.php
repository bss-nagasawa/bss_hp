<?php get_header(); ?>

<div class="conteiner">

	<div id="inner-content" class="wrap">

		<main id="artive-content" class="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPage">
			<div class="inner content-inner">
				<div class="content-header contentHeader-spacing-small">
					<h3 class="content-header-title "><?php echo get_the_archive_title();?></h3>
					<h4 class="content-header-ruby "><?php echo esc_html(get_archive_slug()); ?></h4>
				</div>
				<div class="uk-flex uk-flex-wrap">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" class="post-archive-list" role="article">
							<div class="archive-list-image">
								<?php echo get_the_post_thumbnail(null,'thumbnail');?>
							</div>
							<div class="archive-list-body">
								<a href="<?php the_permalink();?>" class="archive-body-title">
									<span class="date"><?php echo the_time('Y.m.d');?></span>｜
									<sapn class="name"><?php the_title(); ?></span>
								</a>
							</div>
						</article>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</main>

	</div>

</div>

<?php get_footer(); ?>