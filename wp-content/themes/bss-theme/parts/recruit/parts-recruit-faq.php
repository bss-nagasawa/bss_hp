<div id="recruit-faq" class="content-faq">
    <h3>採用Q＆A</h3>
    <h4>Q&A</h4>
    <p>採用についての疑問・お悩みに採用担当者がお答えします。</p>
    <?php
    // カスタム投稿タイプ 'faq' のクエリ
    $args = array(
        'post_type' => 'faq',
        'posts_per_page' => 3, // 表示する投稿数を指定
        'meta_key' => 'oreder_num', // カスタムフィールドのキーを指定
        'orderby' => 'meta_value_num', // カスタムフィールドの値でソート
        'order' => 'ASC', // 昇順でソート
    );
    $faq_query = new WP_Query($args);
    ?>

    <?php if ($faq_query->have_posts()) : ?>
        <div class="faq-list">
            <?php while ($faq_query->have_posts()) : $faq_query->the_post(); ?>
                <div class="faq-item">
                    <h3 class="faq-title"><?php the_title(); ?></h3>
                    <div class="faq-content"><?php the_content(); ?></div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p>FAQが見つかりませんでした。</p>
    <?php endif; ?>
</div><!-- /#recruit-message -->