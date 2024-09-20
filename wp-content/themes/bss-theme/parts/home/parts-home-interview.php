<?php
// カスタム投稿タイプ 'staff-interview' のクエリ
$args_staff_interview = array(
    'post_type' => 'staff-interview',
    'posts_per_page' => 10, // 表示する投稿数を指定
);
$staff_interview_query = new WP_Query($args_staff_interview);
?>

<h3>社員インタビュー</h3>
<?php if ($staff_interview_query->have_posts()) : ?>
    <?php while ($staff_interview_query->have_posts()) : $staff_interview_query->the_post(); ?>
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