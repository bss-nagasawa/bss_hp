<?php
// カスタム投稿タイプ 'staff-interview' のクエリ
$args_staff_interview = array(
    'post_type' => 'staff-interview',
    'posts_per_page' => 3, // 表示する投稿数を指定
);
$staff_interview_query = new WP_Query($args_staff_interview);
?>
<div class="interview-content-container">
    <div class="content-header content-interview contentHeader-spacing-small">
        <h3 class="content-header-title ">社員インタビュー</h3>
        <h4 class="content-header-ruby ">Interview</h4>
    </div>
    <div class="slide-container">
        <div class="item-container uk-flex uk-flex-wrap">
            <?php if ($staff_interview_query->have_posts()) : ?>
                <?php while ($staff_interview_query->have_posts()) : $staff_interview_query->the_post(); ?>
                    <div class="custom-post-item-interview">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="custom-post-thumbnail">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="custom-post-head">
                                <div class="custom-post-title">
                                    <p><?php the_title(); ?>さん</p>
                                </div>
                                <div class="custom-post-tags">
                                    <?php
                                    // カスタムフィールドの情報を取得して表示
                                    $interview_sex = get_field('interview_sex');
                                    $interview_ehistory = get_field('interview_ehistory');
                                    if (is_array($interview_sex)) {
                                        echo $interview_sex['label'];
                                    }
                                    if ($interview_ehistory) {
                                        echo ' エンジニア歴' . $interview_ehistory . '年';
                                    }

                                    ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>投稿が見つかりませんでした。</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="interview-content-wrap">
    </div>
    <div class="archive-link uk-flex uk-flex-center uk-margin-top">
        <a href="<?php home_url(); ?>/archives/staff-interview" class="uk-margin-large-bottom btn tc-em">もっと見る</a>
    </div>
</div>