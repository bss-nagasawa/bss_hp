<?php
// カスタム投稿タイプ 'staff-interview' のクエリ
$args_staff_interview = array(
    'post_type' => 'staff-interview',
    'posts_per_page' => 1, // 表示する投稿数を指定
    'cat' => 13, // カテゴリーIDを指定
);
$staff_interview_query = new WP_Query($args_staff_interview);
?>
<div id="recruit-manager" class="content-manager">
    <?php if ($staff_interview_query->have_posts()) : ?>
        <?php while ($staff_interview_query->have_posts()) : $staff_interview_query->the_post(); ?>
            <div class="uk-flex uk-flex-wrap">
                <div>
                    <?php echo get_the_post_thumbnail(null, 'full') ?>
                </div>
                <div>
                    <h4>Interview</h4>
                    <h3>採用担当者にインタビュー</h3>
                    <?php the_title(); ?>
                    <?php the_content(); ?>
                    <a href="https://recruit.bss-j.co.jp" target="_blank">採用専用サイトへ</a>
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
</div><!-- /#recruit-message -->