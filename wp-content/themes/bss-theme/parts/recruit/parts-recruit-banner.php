<?php
// カスタム投稿タイプ 'banner' のクエリ
$bannerArgs = array(
    'post_type' => 'banner',
    'posts_per_page' => -1, // 表示する投稿数を指定
    'order' => 'DESC', // 昇順でソート
);
$banner_query = new WP_Query($bannerArgs);
?>
<?php if ($banner_query->have_posts()) :?>
    <div id="recruit-banner" class="content-banner">
        <div class="content-header contentHeader-spacing">
            <h3 class="content-header-title">掲載中の求人</h3>
            <h4 class="content-header-ruby">Job</h4>
        </div>
        <div class="inner content-inner">
            <ul uk-grid class="uk-flex-center">
                <?php  while ($banner_query->have_posts()) : $banner_query->the_post(); ?>
                    <?php
                    $banner_url = get_field('banner_url');
                    $banner_message = get_field('banner_message');
                    $image = get_field('banner_image');
                    // $image_url = $image ? $image['url'] : ''; // 画像URLが存在するか確認
                    ?>
                    <li class="banner-item">
                        <a href="<?php echo esc_url($banner_url); ?>" target="_blank">
                            <img src="<?php echo $image; ?>" alt="<?php echo $banner_message; ?>">
                        </a>
                        <p class="banner-comment uk-text-center tc-em"><?php echo esc_html($banner_message); ?></p>
                    </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>
<?php endif; ?>