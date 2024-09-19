<?php
// カスタム投稿タイプ 'staff-blog' のクエリ
$args_blog = array(
    'post_type' => 'staff-blog',
    'posts_per_page' => 10, // 表示する投稿数を指定
);
$blog_query = new WP_Query($args_blog);
?>

<h3>Blog</h3>
<?php if ($blog_query->have_posts()) : ?>
    <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
        <div class="custom-post-item">
            <?php if (has_post_thumbnail()) : ?>
                <div class="custom-post-thumbnail">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </a>
                </div>
            <?php endif; ?>
            <div class="custom-post-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </div>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p>投稿が見つかりませんでした。</p>
<?php endif; ?>