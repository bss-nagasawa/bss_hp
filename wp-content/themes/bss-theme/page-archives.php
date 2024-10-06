<?php
/*
Template Name: 投稿一覧ページテーマ
*/
get_header();
?>
<div class="news-archive">
    <div class="inner content-inner">
        <div class="content-header contentHeader-spacing-small">
            <h3 class="content-header-title ">お知らせ一覧</h3>
            <h4 class="content-header-ruby ">News</h4>
        </div>
        
        <div class="uk-margin-top uk-margin-large-bottom">
            <?php
                // カスタムクエリを使用して投稿を取得
                $args = array(
                'post_type' => 'post',
                'posts_per_page' => 10,
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
                            <p><a href="<?php permalink_link();?>"><?php the_title(); ?></a></p>
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
<?php get_footer(); ?>