<?php
$args = array(
    'post_type' => 'benefits',
    'meta_key' => 'oreder_num', // カスタムフィールドのキーを指定
    'orderby' => 'meta_value_num', // カスタムフィールドの値でソート
    'order' => 'ASC', // 昇順でソート
);
$benefits_order = new WP_Query($args);
?>
<div id="recruit-benefits" class="content-benefits">
    <div class="content-header contentHeader-spacing">
        <h3 class="content-header-title">BSSの福利厚生</h3>
        <h4 class="content-header-ruby">Employee Benefits</h4>
    </div>
    <div class="bg-inner">
        <div class="inner content-inner">
            <p class="uk-text-center uk-margin-large-bottom">今後も多種多様なBSSならではの手当てを検討中！</p>
            <ul uk-grid class="benefits-container">
                <?php
                if ($benefits_order->have_posts()) :
                    while ($benefits_order->have_posts()) : $benefits_order->the_post();
                ?>
                        <li class="benefits-list">
                            <div class="uk-flex uk-flex-wrap">
                                <div class="benefits-image">
                                    <?php echo get_the_post_thumbnail(); ?>
                                </div>
                                <div class="benefits-article">
                                    <div>
                                        <h3><?php the_title(); ?></h3>
                                    </div>
                                    <div class="benefits-body">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                <?php
                    endwhile;
                endif;
                ?>
            </ul>
        </div>
    </div>
</div><!-- /#recruit-message -->