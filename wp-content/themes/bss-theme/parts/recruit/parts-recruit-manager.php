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
            <div class="uk-flex uk-flex-wrap content-manager-wrap">
                <div class="content-manager-image pc">
                    <?php echo get_the_post_thumbnail(null, 'full') ?>
                </div>
                <div class="content-manager-body">
                    <h4 class="manager-head-ruby">Interview</h4>
                    <h3 class="manager-headline tc-white">採用担当者にインタビュー</h3>
                    <div class="content-manager-image sp">
                        <?php echo get_the_post_thumbnail(null, 'full') ?>
                    </div>
                    <div class="manager-body-title tc-white">
                        <?php the_title(); ?>
                    </div>
                    <div class="manager-body-article tc-white">
                        <?php the_content(); ?>
                    </div>        
                    <div class="manager-body-link">
                        <a href="https://recruit.bss-j.co.jp" target="_blank">採用専用サイトへ</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
</div><!-- /#recruit-message -->