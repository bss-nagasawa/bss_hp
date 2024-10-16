<?php
// カスタム投稿タイプ 'staff-blog' のクエリ
$args_blog = array(
    'post_type' => 'staff-blog',
    'posts_per_page' => 3, // 表示する投稿数を指定
);
$blog_query = new WP_Query($args_blog);
?>
<div class="uk-flex uk-felx-wrap uk-flex-row-reverse uk-flex-right">
    <div class="blog-body uk-flex uk-flex-wrap uk-flex-left">
        <?php if ($blog_query->have_posts()) : ?>
            <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                <div class="custom-post-item-blog">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                                    <div class="custom-post-thumbnail">
                                        <?php the_post_thumbnail('thumbnail'); ?>
                                    </div>
                            <?php endif; ?>
                            <div class="custom-post-title">
                                <p>
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
                                </p>
                                <p class="tc-bk post-title uk-margin-small-top"><?php the_title(); ?></p>
                            </div>
                    </a>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p>投稿が見つかりませんでした。</p>
        <?php endif; ?>
    </div>
    <div class="blog-header employ uk-flex uk-flex-center uk-flex-middle">
        <h3 class="uk-text-bold">社員ブログ</h3>
        <div class="blog-link-more">
            <a href="<?php echo get_post_type_archive_link('staff-blog'); ?>" class="btn btn-more tc-white">もっと見る</a>
        </div>
    </div>
</div>