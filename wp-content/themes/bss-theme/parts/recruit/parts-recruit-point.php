<?php
$args = array(
    'post_type' => 'point',
    'meta_key' => 'oreder_num', // カスタムフィールドのキーを指定
    'orderby' => 'meta_value_num', // カスタムフィールドの値でソート
    'order' => 'ASC', // 昇順でソート
    'posts_per_page' => -1
);
$point_order = new WP_Query($args);
?>
<div id="recruit-point" class="content-point">
    <div class="content-header contentHeader-spacing">
        <h3 class="content-header-title">BSSの一押しポイント</h3>
        <h4 class="content-header-ruby">Highlights</h4>
    </div>
    <div class="inner content-inner">
        <ul uk-grid class="point-container">
            <?php
            if ($point_order->have_posts()) :
                while ($point_order->have_posts()) : $point_order->the_post();
            ?>
                    <li class="point-list">
                        <?php echo get_the_post_thumbnail(null, 'full'); ?>
                    </li>
            <?php
                endwhile;
            endif;
            ?>

        </ul>
    </div>

</div><!-- /#recruit-message -->